<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Order;
use App\Models\Miscellaneous;
use App\Models\Expense;
use App\Models\Employe;
use App\Models\EmployeePayment;
use App\Models\Ledger;
use App\Models\SubDealer;
use App\Models\Transaction;
use App\Exports\LedgerExport;
use Response;
use PDF;

class ReportController extends Controller
{
    private $type     =  "reports";
    private $singular =  "Report";
    private $plural   =  "Reports";
    private $view     =  "reports.";
    private $action   =  "/dashboard/reports";
    private $db_key   =  "id";
    private $perpage = 2;
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
    public function summaryReportList(Request $request)
    {
        $data   = array(
                    "page_title"=>"Summary ".$this->plural,
                    "page_heading"=>$this->plural,
                    "breadcrumbs"=>array("#"=>$this->plural),
                    "module"=>array('type'=>$this->type,'singular'=>$this->singular,'plural'=>$this->plural,'view'=>$this->view,'action'=>$this->action,'db_key'=>$this->db_key)
                );

        $data['bill_payment'] = Order::where("office_id","=",Auth::user()->office)->sum("advance_amount");
        $data["expense"] = Expense::where("office_id","=",Auth::user()->office)->sum("amount");
        $data["miscellaneous"] = Miscellaneous::where("office_id","=",Auth::user()->office)->sum("amount");
        $data["supplier_payment"] = Ledger::where("office_id","=",Auth::user()->office)->sum("paid_amount");
        $data["employee_payment"] = EmployeePayment::where("office_id","=",Auth::user()->office)->sum("amount");
        $data["subdealer_payment"] = Transaction::where("office_id","=",Auth::user()->office)->sum("received_amount");
        
        
        /*
        GET RECORDS
        */
        // $records   = Categories;
        // $records   = $this->search($records,$request,$data)->orderBy('id','DESC');
        // /*
        // GET TOTAL RECORD BEFORE BEFORE PAGINATE
        // */
        // $data['count']      = $records->count();
        // /*
        // PAGINATE THE RECORDS
        // */
        // $records            = $records->paginate($this->perpage);
        // $records->appends($request->all())->links();
        // $links = $records->links();

        // $records = $records->toArray();
        // $records['pagination'] = $links;
        // /*
        // ASSIGN DATA FOR VIEW
        // */
        // $data['list']   =   $records;
        //dd($data);
        return view($this->view.'summaryReports/list',$data);
    }

    public function DailyReportList(Request $request)
    {
        $data   = array(
                    "page_title"=>"Daily ".$this->plural,
                    "page_heading"=>$this->plural,
                    "breadcrumbs"=>array("#"=>$this->plural),
                    "module"=>array('type'=>$this->type,'singular'=>$this->singular,'plural'=>$this->plural,'view'=>$this->view,'action'=>$this->action,'db_key'=>$this->db_key)
                );
                // return date('Y-m-d');
        // $result = Ledger::whereMonth("ledger_date",date('m'))->get();
        // dd($result->toArray());
        // return $result;
        // $data['bill_payment'] = Order::where("office_id","=",Auth::user()->office)->sum("advance_amount");
        $data["supplier_payment"] = Ledger::with("getSupplier")->where("ledger_date","=",date("Y-m-d"))->where("office_id","=",Auth::user()->office)->get();
        // dd($data["supplier_payment"]->toArray());
        $data["expense"] = Expense::where("date","=",date("Y-m-d"))->where("office_id","=",Auth::user()->office)->get();
        $data["miscellaneous"] = Miscellaneous::where("date","=",date("Y-m-d"))->where("office_id","=",Auth::user()->office)->get();
        $data["employee_payment"] = EmployeePayment::with("getEmployee")->where("date","=",date("Y-m-d"))->where("office_id","=",Auth::user()->office)->get();
        // $data["subdealer_payment"] = Transaction::where("office_id","=",Auth::user()->office)->sum("received_amount");
        $data["subdealer_payment"] = Transaction::with("getSubDealer")->where("date","=",date("Y-m-d"))->where("office_id","=",Auth::user()->office)->get();
        // dd($data["subdealer_payment"]->toArray());
        
        
        /*
        GET RECORDS
        */
        // $records   = Categories;
        // $records   = $this->search($records,$request,$data)->orderBy('id','DESC');
        // /*
        // GET TOTAL RECORD BEFORE BEFORE PAGINATE
        // */
        // $data['count']      = $records->count();
        // /*
        // PAGINATE THE RECORDS
        // */
        // $records            = $records->paginate($this->perpage);
        // $records->appends($request->all())->links();
        // $links = $records->links();

        // $records = $records->toArray();
        // $records['pagination'] = $links;
        // /*
        // ASSIGN DATA FOR VIEW
        // */
        // $data['list']   =   $records;
        //dd($data);
        return view($this->view.'dailyReport/list',$data);
    }

    public function monthlyReportList(Request $request)
    {
        $data   = array(
                    "page_title"=>"Monthly ".$this->plural." List",
                    "page_heading"=>$this->plural.' List',
                    "breadcrumbs"=>array("#"=>$this->plural." List"),
                    "module"=>array('type'=>$this->type,'singular'=>$this->singular,'plural'=>$this->plural,'view'=>$this->view,'action'=>$this->action,'db_key'=>$this->db_key)
                );

                if($request->has('start_date') && $request->has('end_date')){
                    $data['bill_payment'] = Order::whereBetween("date",[$request->start_date,$request->end_date])->where("office_id","=",Auth::user()->office)->get();
                    $data["supplier_payment"] = Ledger::with("getSupplier")->whereBetween("ledger_date",[$request->start_date,$request->end_date])->where("office_id","=",Auth::user()->office)->get();
                    $data["expense"] = Expense::whereBetween("date",[$request->start_date,$request->end_date])->where("office_id","=",Auth::user()->office)->get();
                    $data["miscellaneous"] = Miscellaneous::whereBetween("date",[$request->start_date,$request->end_date])->where("office_id","=",Auth::user()->office)->get();
                    $data["employee_payment"] = EmployeePayment::with("getEmployee")->whereBetween("date",[$request->start_date,$request->end_date])->where("office_id","=",Auth::user()->office)->get();
                    $data["subdealer_payment"] = Transaction::with("getSubDealer")->whereBetween("date",[$request->start_date,$request->end_date])->where("office_id","=",Auth::user()->office)->get();
                    return view($this->view.'monthlyReport/list',$data);
                }else {
                    $data['bill_payment'] = Order::whereMonth("date",date('m'))->where("office_id","=",Auth::user()->office)->get();
                    $data["supplier_payment"] = Ledger::with("getSupplier")->whereMonth("ledger_date",date('m'))->where("office_id","=",Auth::user()->office)->get();
                    $data["expense"] = Expense::whereMonth("date",date('m'))->where("office_id","=",Auth::user()->office)->get();
                    $data["miscellaneous"] = Miscellaneous::whereMonth("date",date('m'))->where("office_id","=",Auth::user()->office)->get();
                    $data["employee_payment"] = EmployeePayment::with("getEmployee")->whereMonth("date",date('m'))->where("office_id","=",Auth::user()->office)->get();
                    $data["subdealer_payment"] = Transaction::with("getSubDealer")->whereMonth("date",date('m'))->where("office_id","=",Auth::user()->office)->get();
                    return view($this->view.'monthlyReport/list',$data);
                }
        
        
        /*
        GET RECORDS
        */
        // $records   = Categories;
        // $records   = $this->search($records,$request,$data)->orderBy('id','DESC');
        // /*
        // GET TOTAL RECORD BEFORE BEFORE PAGINATE
        // */
        // $data['count']      = $records->count();
        // /*
        // PAGINATE THE RECORDS
        // */
        // $records            = $records->paginate($this->perpage);
        // $records->appends($request->all())->links();
        // $links = $records->links();

        // $records = $records->toArray();
        // $records['pagination'] = $links;
        // /*
        // ASSIGN DATA FOR VIEW
        // */
        // $data['list']   =   $records;
        //dd($data);
        return view($this->view.'monthlyReport/list',$data);
    }

    // public function cleanData(&$data) {
    //     $unset = ['ConfirmPassword','q','_token'];
    //     foreach ($unset as $value) {
    //         if(array_key_exists ($value,$data))  {
    //             unset($data[$value]);
    //         }
    //     }
    // }
    // public function create(Request $request)
    // {
    //     if($request->input('label')){
    //         $data = $request->all();
    //         $this->cleanData($data);
            
    //         $is_save             = Categories::where('label','=',
    //                                             $data['label'])
    //                                             ->count();
    //         if($is_save > 0)    {
    //             $response = array('flag'=>false,'msg'=>$this->singular.' with label already exist.');
    //             echo json_encode($response); return;
    //         }
    //         $Areas         = new Categories;
    //         $Areas->insert($data);
    //         $response = array('flag'=>true,'msg'=>$this->singular.' is added sucessfully.','action'=>'reload');
    //         echo json_encode($response); return;
    //     }

    //     $data   = array(
    //                 "page_title"=>"Add ".$this->singular,
    //                 "page_heading"=>"Add ".$this->singular,
    //                 "breadcrumbs"=>array("dashboard"=>"Dashboard","#"=>$this->plural." List"),
    //                 "action"=> url($this->action.'/create')
    //             );
    //     return view($this->view.'create',$data);
    // }
    // public function update(Request $request,$id = NULL)
    // {
    //     if($request->method() == "POST"){
    //         $data = $request->all();
    //         $this->cleanData($data);

    //         if(isset($data['label'])) {
    //             $is_save             = Categories::where('label','=',
    //                                                 $data['label'])
    //                                                 ->where($this->db_key,'!=',
    //                                                 $id)
    //                                                 ->count();
    //             if($is_save > 0)    {
    //                 $response = array('flag'=>false,'msg'=>$this->singular.' with label already exist.');
    //                 echo json_encode($response); return;
    //             }
    //         }
    //         $obj         = Categories::find($id);
    //         $obj->update($data);
    //         $response = array('flag'=>true,'msg'=>$this->singular.' is updated sucessfully.','action'=>'reload');
    //         echo json_encode($response); return;
    //     }
    //     $data   = array(
    //                 "page_title"=>"Edit ".$this->singular,
    //                 "page_heading"=>"Edit ".$this->singular,
    //                 "breadcrumbs"=>array("dashboard"=>"Dashboard","#"=>$this->plural." List"),
    //                 "action"=> url($this->action.'/edit/'.$id),
    //                 "row" => Categories::find($id)
    //             );
    //     return view($this->view.'edit',$data);
    // }
    // public function delete($id) {
    //     //Categories::destroy($id);
    //     $response = array('flag'=>true,'msg'=>$this->singular.' has been deleted.');
    //     echo json_encode($response); return;
    // }
    // public function _bulk(Request $request) {
    //     $data = $request->all();
    //     //Categories::destroy($id);
    //     $response = array('flag'=>true,'msg'=>$this->singular.' has been deleted.','action'=>'reload');
    //     echo json_encode($response); return;
    // }

}

