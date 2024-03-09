<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;
use App\Models\Company;
use App\Models\Office;

class EmployeeController extends Controller
{
    private $type     =  "employees";
    private $singular =  "Employee";
    private $plural   =  "Employees";
    private $view     =  "employees.";
    private $action   =  "/dashboard/employees";
    private $db_key   =  "id";
    private $perpage = 5;
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function search($records,$request,&$data) {
        /*
        SET DEFAULT VALUES
        */
        if($request->perpage)
            $this->perpage  =   $request->perpage;
        $data['sindex']     = ($request->page != NULL)?($this->perpage*$request->page - $this->perpage+1):1;
        /*
        FILTER THE DATA
        */
        $params = [];
        if($request->is_active) {
            $params['is_active'] = $request->is_active;
            $records = $records->where("is_active",$params['is_active']);
        }
        $data['request'] = $params;
        return $records;    
    }
    public function list(Request $request)
    {
        $data   = array(
                    "page_title"=>$this->plural." List",
                    "page_heading"=>$this->plural.' List',
                    "breadcrumbs"=>array("#"=>$this->plural." List"),
                    "module"=>array('type'=>$this->type,'singular'=>$this->singular,'plural'=>$this->plural,'view'=>$this->view,'action'=>$this->action,'db_key'=>$this->db_key)
                );
        
        
        /*
        GET RECORDS
        */
        if(Auth::user()->roles == 1){
            $records   = User::with("getCompany")->where("roles","=",2);
        }else if(Auth::user()->roles == 2){
            $records = User::where("roles","=",3)->where("company","=",Auth::user()->company);
        }else if(Auth::user()->roles == 3){
            $records   = Employe::where('office','=',Auth::user()->office)->where('company','=',Auth::user()->company);
        }
        
        
        $records   = $this->search($records,$request,$data);
        /*
        GET TOTAL RECORD BEFORE BEFORE PAGINATE
        */
        $data['count']      = $records->count();
        /*
        PAGINATE THE RECORDS
        */
        $records            = $records->paginate($this->perpage);
        $records->appends($request->all())->links();
        $links = $records->links();

        $records = $records->toArray();
        $records['pagination'] = $links;
        /*
        ASSIGN DATA FOR VIEW
        */
        $data['list']   =   $records;

        //dd($data);
        return view($this->view.'list',$data);
    }
    public function cleanData(&$data) {
        $unset = ['ConfirmPassword','q','_token'];
        foreach ($unset as $value) {
            if(array_key_exists ($value,$data))  {
                unset($data[$value]);
            }
        }
    }
    public function create(Request $request)
    {
        if($request->isMethod("POST")){
            $data = $request->all();
            $this->cleanData($data);
            $data['password'] = Hash::make($request->password);
            if(Auth::user()->roles == 2){
                $data['company'] = Auth::user()->company;
            }
            if(isset($data['profile_image'])){
                $image = $data['profile_image'];
                $imageName = time().Str::random(6)."_".$image->getClientOriginalName();
                $image->move("public/uploads/images",$imageName);
                $data['profile_image'] = $imageName;
            }

            if(isset($data['cnic_front'])){
                $cnic_front = $data['cnic_front'];
                $cnic_front_name = time().Str::random(6)."_".$cnic_front->getClientOriginalName();
                $cnic_front->move("public/uploads/images",$cnic_front_name);
                $data['cnic_front'] = $cnic_front_name;
            }

            if(isset($data['cnic_back'])){
                $cnic_back = $data['cnic_back'];
                $cnic_back_name = time().Str::random(6)."_".$cnic_back->getClientOriginalName();
                $cnic_back->move("public/uploads/images",$cnic_back_name);
                $data['cnic_back'] = $cnic_back_name;
            }

            if(isset($data['police_verification'])){
                $police_verification = $data['police_verification'];
                $police_verification_name = time().Str::random(6)."_".$police_verification->getClientOriginalName();
                $police_verification->move("public/uploads/images",$police_verification_name);
                $data['police_verification'] = $police_verification_name;

            }

            
            $is_save = User::where('email','=',$data['email'])->count();
            if($is_save > 0)    {
                $response = array('flag'=>false,'msg'=>$this->singular.' with email or phone already exist.');
                echo json_encode($response); return;
            }

            // 
            if(Auth::user()->roles == 2){
                $result = User::where("office","=",$data['office'])->where("company","=",Auth::user()->company)->get();
                if(count($result) > 0){
                    $response = array('flag'=>false,'msg'=>'Office with Manager already exist.');
                    echo json_encode($response); return;
                }
            }

            $Areas         = new User;
            $Areas->insert($data);
            $response = array('flag'=>true,'msg'=>$this->singular.' is added sucessfully.','action'=>'reload');
            echo json_encode($response); return;
        }

        $data   = array(
                    "page_title"=>"Add ".$this->singular,
                    "page_heading"=>"Add ".$this->singular,
                    "breadcrumbs"=>array("dashboard"=>"Dashboard","#"=>$this->plural." List"),
                    "action"=> url($this->action.'/create'),
                    "companies"=> Company::all(),
                    "offices"=>Office::where("company_id","=",Auth::user()->company)->get()
                );
        return view($this->view.'create',$data);
    }
    public function update(Request $request,$id = NULL)
    { 
        if($request->method() == "POST"){
            $user = User::find($id);
            $data = $request->all();
            $data['password'] = Hash::make($request->password);
            // return $data;

            if(isset($data['profile_image'])){
                if(File::exists("public/uploads/images/".$user->profile_image)){
                    File::delete("public/uploads/images/".$user->profile_image);
                }
                $image = $data['profile_image'];
                $imageName = time().Str::random(5)."_".$image->getClientOriginalName();
                $image->move("public/uploads/images/",$imageName);
                $data['profile_image'] = $imageName;
            }

            if(isset($data['cnic_front'])){
                if(File::exists("public/uploads/images/".$user->cnic_front)){
                    File::delete("public/uploads/images/".$user->cnic_front);
                }
                $cnic_front = $data['cnic_front'];
                $cnic_front_name = time().Str::random(5)."_".$cnic_front->getClientOriginalName();
                $cnic_front->move("public/uploads/images",$cnic_front_name);
                $data['cnic_front'] = $cnic_front_name;
            }

            if(isset($data['cnic_back'])){
                if(File::exists("public/uploads/images/".$user->cnic_back)){
                    File::delete("public/uploads/images/".$user->cnic_back);
                }
                $cnic_back = $data['cnic_back'];
                $cnic_back_name = time().Str::random(5)."_".$cnic_back->getClientOriginalName();
                $cnic_back->move("public/uploads/images",$cnic_back_name);
                $data['cnic_back'] = $cnic_back_name;
            }

            if(isset($data['police_verification'])){
                if(File::exists("public/uploads/images/".$user->police_verification)){
                    File::delete("public/uploads/images/".$user->police_verification);
                }
                $police_verification = $data['police_verification'];
                $police_verification_name = time().Str::random(5)."_".$police_verification->getClientOriginalName();
                $police_verification->move("public/uploads/images/",$police_verification_name);
                $data['police_verification'] = $police_verification_name;
            }


            if(isset($data['email'])) {
                $is_save = User::where('email','=',$data['email'])->where($this->db_key,'!=',$id)->count();
                if($is_save > 0)    {
                    $response = array('flag'=>false,'msg'=>$this->singular.' with email or phone already exist.');
                    echo json_encode($response); return;
                }
            }

            $obj = User::find($id);
            
            $obj->update($data);
            $response = array('flag'=>true,'msg'=>$this->singular.' is updated sucessfully.','action'=>'reload');
            echo json_encode($response); return;
        }
        $data   = array(
                    "page_title"=>"Edit ".$this->singular,
                    "page_heading"=>"Edit ".$this->singular,
                    "breadcrumbs"=>array("dashboard"=>"Dashboard","#"=>$this->plural." List"),
                    "action"=> url($this->action.'/edit/'.$id),
                    "companies"=>Company::all(),
                    "offices"=>Office::where("company_id","=",Auth::user()->company)->where("created_user","=",Auth::id())->get(),
                    "row" => User::find($id)
                );
        return view($this->view.'edit',$data);
    }
    public function delete($id) {
        //Categories::destroy($id);
        $user = User::find($id);
        if(File::exists("public/uploads/images/".$user->profile_image)){
            File::delete("public/uploads/images/".$user->profile_image);
        }

        if(File::exists("public/uploads/images/".$user->cnic_front)){
            File::delete("public/uploads/images/".$user->cnic_front);
        }

        if(File::exists("public/uploads/images/".$user->cnic_back)){
            File::delete("public/uploads/images/".$user->cnic_back);
        }

        if(File::exists("public/uploads/images/".$user->police_verification)){
            File::delete("public/uploads/images/".$user->police_verification);
        }

        User::destroy($id);
        $response = array('flag'=>true,'msg'=>$this->singular.' has been deleted.');
        echo json_encode($response); return;
    }
    public function _bulk(Request $request) {
        $data = $request->all();
        //Categories::destroy($id);
        User::destroy($id);
        $response = array('flag'=>true,'msg'=>$this->singular.' has been deleted.','action'=>'reload');
        echo json_encode($response); return;
    }

    public function employeesDocument(Request $request,$id=NULL)
    {
        $data   = array(
                    "page_title"=>"Employee Document List",
                    "page_heading"=>"Employee Document List",
                    "breadcrumbs"=>array("#"=>"Employee Document List"),
                    "record"=> User::find($id),
                    "module"=>array('type'=>$this->type,'singular'=>$this->singular,'plural'=>$this->plural,'view'=>$this->view,'action'=>$this->action,'db_key'=>$this->db_key)
                );

        return view($this->view.'employees-document',$data);
    }

}
