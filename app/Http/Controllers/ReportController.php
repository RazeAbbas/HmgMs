<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Order;
use App\Models\Miscellaneous;
use App\Models\Expense;
use App\Models\Employe;
use App\Models\Sale;
use App\Models\SaleDetail;
use App\Models\EmployeePayment;
use App\Models\Ledger;
use App\Models\SubDealer;
use App\Models\Transaction;
use App\Exports\LedgerExport;
use Response;
use PDF;
use Carbon\Carbon;


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

        // $data['bill_payment'] = Order::where("office_id","=",Auth::user()->office)->sum("advance_amount");
        $data['sales'] = Sale::where("office_id","=",Auth::user()->office)->sum("total");
        $data["expense"] = Expense::where("office_id","=",Auth::user()->office)->sum("amount");
        $data["miscellaneous"] = Miscellaneous::where("office_id","=",Auth::user()->office)->sum("amount");
        $data["supplier_payment"] = Ledger::where("office_id","=",Auth::user()->office)->sum("paid_amount");
        $data["employee_payment"] = EmployeePayment::where("office_id","=",Auth::user()->office)->sum("amount");
        $data["subdealer_payment"] = Transaction::where("office_id","=",Auth::user()->office)->sum("received_amount");
        
        return view($this->view.'summaryReports/list',$data);
    }

    
    public function DailyReportList(Request $request)
{
    $today = Carbon::today()->toDateString();

    $data = [
        "page_title" => "Daily " . $this->plural,
        "page_heading" => $this->plural,
        "breadcrumbs" => ["#" => $this->plural],
        "module" => [
            'type' => $this->type,
            'singular' => $this->singular,
            'plural' => $this->plural,
            'view' => $this->view,
            'action' => $this->action,
            'db_key' => $this->db_key
        ]
    ];
    $data['sale_wmp'] = SaleDetail::whereRaw('DATE(created_at) = ?', [$today])->where("office_id", "=", Auth::user()->office)->get();
    $data["supplier_payment"] = Ledger::with("getSupplier")->whereDate("ledger_date", $today)->where("office_id", "=", Auth::user()->office)->get();
    $data["expense"] = Expense::whereRaw('DATE(created_at) = ?', [$today])->where("office_id", "=", Auth::user()->office)->get();
    $data["miscellaneous"] = Miscellaneous::whereRaw('DATE(created_at) = ?', [$today])->where("office_id", "=", Auth::user()->office)->get();
    $data["employee_payment"] = EmployeePayment::with("getEmployee")->whereRaw('DATE(created_at) = ?', [$today])->where("office_id", "=", Auth::user()->office)->get();
    $data["subdealer_payment"] = Transaction::with("getSubDealer")->whereRaw('DATE(created_at) = ?', [$today])->where("office_id", "=", Auth::user()->office)->get();

    return view($this->view . 'dailyReport/list', $data);
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
        return view($this->view.'monthlyReport/list',$data);
    }
}

