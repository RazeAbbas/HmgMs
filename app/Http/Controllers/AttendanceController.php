<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Models\Attendance;
use App\Models\Employe;
use Auth,Carbon\Carbon,File,DB,Validator;

class AttendanceController extends Controller{
    private $type       =   "attendance";
    private $singular   =   "Attendance";
    private $plural     =   "Attendances";
    private $view       =   ".attendance.";
    private $action   =  "attendance";
    private $user       =   [];
    private $perpage    =   50;
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
        $data   =   array(
            "page_title"    =>  $this->plural,
            "page_heading"  =>  $this->plural,
            "breadcrumbs"   =>  array("#"=>$this->plural),
        );
        if($request->perpage) $this->perpage  =   $request->perpage;
        $roles              =   config('constants.Roles');
        $data['status']     =   config('constants.attendance_status_revert');
        $date               =   Attendance::groupBy('attendance_date')->orderBy('attendance_date','desc')->paginate(
                                $this->perpage);
        $attendance         =   [];
        foreach ($date->items() as $key => $value) {
            foreach ($data['status'] as $ikey => $ivalue) {
                $attendance[$value['attendance_date']][$ikey] = DB::table('attendance')
                    ->select(DB::raw('count(status) as total'))
                    ->join('users','users.id','=','attendance.emp_id')
                    ->where('attendance_date', $value['attendance_date'])
                    ->where('users.joining_date','<=',$value['attendance_date'])
                    ->where('status', $ivalue)
                    ->get();
            }
        }
        $data['attendance'] =   $attendance;
        $data['pagination'] =   $date;
        $data['module'] = ['type'=>$this->type,'singular'=>$this->singular,'plural'=>$this->plural,'view'=>$this->view,'action'=>$this->action,'db_key'=>$this->db_key];
        return view($this->view.'list',$data);
    }
    public function addView(Request $request) {
        $data   =   array(
            "page_title"    =>  'Add '.$this->plural,
            "page_heading"  =>  'Add '.$this->plural,
            "breadcrumbs"   =>  array(url('dashboard/attendance') => $this->plural, "#"=>'Add '.$this->plural),
            "directory"     =>  $this->directory,
        );
        $date               =   date('Y-m-d');
        if($request->get('date')) {
            $date = date('Y-m-d', strtotime($request->get('date')));
        }
        $roles              =   Config('constants.Roles');
        $role_ids           =   array_keys($roles);
        $data['list']       =   User::where('role','>',2)->where('is_contact','0')->where('com_id',Auth::user()->com_id)->where('joining_date','<=',$date)->where('active','1')->get()->toArray();
        $data['roles']      =   $roles;
        $data['date']       =   date('d-m-Y', strtotime($date));
        $data['module'] = ['type'=>$this->type,'singular'=>$this->singular,'plural'=>$this->plural,'view'=>$this->view,'action'=>$this->action,'db_key'=>$this->db_key];
        return view($this->view.'create-view',$data);
    }
    public function cleanData(&$data) {
        $unset  =   ['_token'];
        foreach ($unset as $value) {
            if(array_key_exists ($value,$data))  {
                unset($data[$value]);
            }
        }
        $date = ['attendance_date'];
        foreach ($date as $value) {
            if(@$data[$value] != "") $data[$value] = date("Y-m-d", strtotime($data[$value]));
        }
    }
    public function addAttendance(Request $request){
        $data           =   $request->all();
        $this->cleanData($data);
        $find           =   Attendance::where('attendance_date',$data['attendance_date'])->count();
        if($find != 0)
            return back()->with('warning-message', $this->singular . ' is already Added!');
        $statuses       =   config('constants.attendance_status');
        $leave_statuses =   config('constants.leave_statuses');
        $tmp            =   array();
        foreach ($statuses as $ok => $ov){ $tmp[$ov] = 0; }
        $leave_log      =   array();
        $i              =   0;
        foreach ($data['status'] as $key => $value) {
            $employees_att                      =   [];
            $exp                                =   explode("-", $value);
            $employees_att['emp_id']            =   $exp[0];
            $employees_att['status']            =   $exp[1];
            $employees_att['attendance_date']   =   $data['attendance_date'];
            Utility::appendRole($employees_att);
            $attendance                         =   new Attendance();
            $att_id                             =   $attendance->create($employees_att)->att_id;
            foreach ($leave_statuses as $key => $value) {
                if( $key == $exp[1] ){
                    $leave_log[$i] = ['emp_id'=>$exp[0],'att_id'=>$att_id,'status'=>$exp[1],'date'=>$data['attendance_date']];
                    $i++; 
                }
            }
        }
        $check_date    =   LeaveLog::where('date',$data['attendance_date'])->count();
        if($check_date == 0 && !empty($leave_log)) LeaveLog::insert($leave_log);
        return back()->with('success-message', $this->singular . ' added successfully!');
    }
    public function updateView(Request $request , $date = null){
        $data   =   array(
            "page_title"    =>  'Update '.$this->plural,
            "page_heading"  =>  'Update '.$this->plural,
            "breadcrumbs"   =>  array(url('/attendance') => $this->plural,"#"=>'Update '.$this->plural),
            "directory"     =>  $this->directory,
        );
        $data['status']     =   config('constants.attendance_status');
        $roles              =   Config('constants.Roles');
        $data['roles']      =   $roles;
        $role_ids           =   array_keys($roles);
        $data['attendance'] =   Attendance::where('attendance_date', $date)->get();
        $data['employees']  =   User::whereIn('role',$role_ids)->where('joining_date','<=',$date)->where('joining_date','!=','')->orderBy('id', 'asc')->get();
        $att_data = array();
        foreach($data['employees'] as $key => $employee){
            foreach($data['attendance'] as $attend_key => $attend){
                if( $employee->id == $attend->emp_id ){
                    $data['employees'][$key]->setAttribute('status' ,$attend->status);
                    $data['employees'][$key]->setAttribute('att_key',$attend_key);
                }
            }
        }
        $data['action']    =    url('dashboard/attendance/update/'.$date);
        $data['date']      =    Utility::covnertDateForUI($date);
        return view($this->view .'update-view', $data);
    }
    public function updateAttendance(Request $request){
        $data           =   $request->all();
        $this->cleanData($data);
        $statuses       =   config('constants.attendance_status');
        $leave_statuses =   config('constants.leave_statuses');
        $tmp            =   array();
        foreach ($statuses as $ok => $ov){ $tmp[$ov] = 0; }
        $leave_log      =   array();
        $i              =   0;
        foreach ($data['status'] as $key => $value) {
            if(empty($value)) continue; 
            $employees_att                      =   [];
            $exp                                =   explode("-", $value);
            $employees_att['emp_id']            =   $exp[0];
            $employees_att['status']            =   $exp[1];
            $employees_att['attendance_date']   =   $data['attendance_date'];
            $employees_att['created_user']      =   Auth::user()->id;
            $attendance                         =   Attendance::where(['attendance_date' => $data['attendance_date'], 'emp_id' => $employees_att['emp_id']]);
            if( $attendance->count() > 0){
                $att_record = $attendance->get(['att_id']);
                $att_id     = $att_record[0]['att_id'];
                $attendance->update($employees_att);
            }else{
                $attendance  =  new Attendance();
                $att_id      =  $attendance->create($employees_att)->att_id;
            }
            foreach ($leave_statuses as $key => $value) {
                if( $key == $exp[1] ){
                    $leave_log[$i] = ['emp_id'=>$exp[0],'att_id'=>$att_id,'status'=>$exp[1],'date'=>$data['attendance_date']];
                    $i++; 
                }
            }
        }
        $records        =  LeaveLog::where('date',$data['attendance_date']);
        if($records){
            $records->delete();
            LeaveLog::insert($leave_log);
        }else{           
            LeaveLog::insert($leave_log);
        }
        return back()->with('success-message', $this->singular . ' of '.$data['attendance_date'].' updated successfully!');
    }
    public function delete($date = ''){
        $affectedRows   =   Attendance::where('attendance_date', '=',$date)->delete();
        if($affectedRows > 0){
            $records    =  LeaveLog::where('date',$date);
            if($records) $records->delete();
            $response = array('flag' => true, 'msg' => $this->singular . ' of '.$date.' has been removed Permanently');
            echo json_encode($response);
        }
    }
    public function getHours($att_arr,$emp,$input,&$empattend){
        $days =  cal_days_in_month(CAL_GREGORIAN,$input['month'],$input['year']);
        for($i = 1; $i <= $days; $i++) {
            $j = ($i < 10)?'0'.$i:$i;
            $date = $input['year'].'-'.$input['month'].'-'.$j;
            //echo $date; die;
            foreach ($att_arr as $key=>$val) {
                //echo "<pre>";print_r($val);die;
                if(isset($val[2]) && isset($val[1]) && isset($val[3]))
                    if($val[2] == $date && $val[1] == $emp['machine_id']) {
                        $empattend[$emp['id']][$i][] = $val[3];
                    }
            }
        }
        
    }
    public function importAttendance(Request $request){
        if($request->method() == "POST"){
            $input          =   $request->all();
            $file           =   $request->file('attendance_file')->getRealPath();
            $fopen          =   fopen($file,'r');
            $fread          =   fread($fopen,filesize($file));
            fclose($fopen);
            $remove         =   "\n";
            $split          =   explode($remove, $fread);
            $data_array[]   =   null;
            $tab            =   "/\s+/";
            foreach ($split as $string){
                $row        =   preg_split('/\s+/', $string);
                array_push($data_array,$row);
            }
            $data_array  =   array_filter($data_array);
            $employees   =   Employees::where('role','>',1)->get()->toArray();
            //echo "<pre>";print_r($data_array);die;
            $empattend = [];
            foreach ($employees as $key=>$val) {
                $this->getHours($data_array,$val,$input,$empattend);
            }
            
            $min_hours = 6;
            //$all = [];
            foreach ($empattend as $key=>$val) {
                $duty_hours = [];
                $i = 0;
                //echo "<pre>";print_r($val);die;
                foreach ($val as $ikey=>$ival) {
                    //echo "<pre>";print_r($ival);die;
                    if(count($ival) == 1 || count($ival) == 0) {
                        $duty_hours[$i]['hours'] = 0;
                        $duty_hours[$i]['status'] = 0;
                    }else if(count($ival) == 2 || count($ival) == 3) {
                        $hours = Utility::getHoursDifference($ival[0],$ival[1]);
                        if($hours < $min_hours) {
                            $duty_hours[$i]['status'] = 0;
                        }else {
                            $duty_hours[$i]['status'] = 1;
                        }
                        $duty_hours[$i]['hours'] = $hours ;
                    }else if(count($ival) == 4) {
                        $fhours = Utility::getHoursDifference($ival[0],$ival[1]);
                        $shours = Utility::getHoursDifference($ival[2],$ival[3]);
                        $hours = $fhours + $shours;
                        if($hours < $min_hours) {
                            $duty_hours[$i]['status'] = 0;
                        }else {
                            $duty_hours[$i]['status'] = 1;
                        }
                        $duty_hours[$i]['hours'] = $hours ;
                    }else {
                        $end = count($ival) - 1;
                        
                        $hours = Utility::getHoursDifference($ival[0],$ival[$end]);
                        if($hours < $min_hours) {
                            $duty_hours[$i]['status'] = 0;
                        }else {
                            $duty_hours[$i]['status'] = 1;
                        }
                        $duty_hours[$i]['hours'] = $hours ;
                    }
                    $j = ($ikey < 10)?'0'.$ikey:$ikey;
                    $duty_hours[$i]['attendance_date'] = $input['year'].'-'.$input['month'].'-'.$j;
                    $duty_hours[$i]['emp_id'] = $key;
                    $duty_hours[$i]['thumbs'] = count($ival);
                    $duty_hours[$i]['thumb_detail'] = json_encode($ival);
                    Utility::appendRole($duty_hours[$i]);
                    $i++;
                }
                //echo "<pre>";print_r($duty_hours); 
                Attendance::insert($duty_hours);
            }
            die();
            
            
        }
        $data   =   array(
            "page_title"    =>  'Import '.$this->singular,
            "page_heading"  =>  'Import '.$this->singular,
            "breadcrumbs"   =>  array("#"=>$this->singular),
            "directory"     =>  $this->directory,
            'action'        =>  'dashboard/attendance/importer/machine'
        );
        $data['months'] =   config('constants.Months');
        $data['years']  =   [2018,2019];
        return view($this->view.'view-importer',$data);
    }
    public function check_attendanceData_header($file_header){
        $db_header = ['id','date'];
        return array_diff($file_header,$db_header);
    }
}