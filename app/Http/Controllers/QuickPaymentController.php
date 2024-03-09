<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Supplier;
use App\Models\Ledger;

class QuickPaymentController extends Controller
{
    private $type     =  "quickPayments";
    private $singular =  "Quick Payment";
    private $plural   =  "Quick Payments";
    private $view     =  "suppliers/quickPayments.";
    private $action   =  "/dashboard/suppliers/quickPayments";
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
    public function cleanData(&$data) {
        $unset = ['ConfirmPassword','q','_token'];
        foreach ($unset as $value) {
            if(array_key_exists ($value,$data))  {
                unset($data[$value]);
            }
        }
    }
    public function create(Request $request,$id=NULL)
    {
        if($request->isMethod('POST')){
            $data = $request->all();
            $this->cleanData($data);
            $data['office_id'] = Auth::user()->office;
            $data['company_id'] = Auth::user()->company;
            $data['created_user'] = Auth::id();
            
            // $is_save             = Categories::where('label','=',
            //                                     $data['label'])
            //                                     ->count();
            // if($is_save > 0)    {
            //     $response = array('flag'=>false,'msg'=>$this->singular.' with label already exist.');
            //     echo json_encode($response); return;
            // }
            $Areas         = new Ledger;
            $Areas->insert($data);
            $response = array('flag'=>true,'msg'=>$this->singular.' is added sucessfully.','action'=>'reload');
            echo json_encode($response); return;
        }

        $data   = array(
                    "page_title"=>"Add ".$this->singular,
                    "page_heading"=>"Add ".$this->singular,
                    "breadcrumbs"=>array("dashboard"=>"Dashboard","#"=>$this->plural." List"),
                    "supplier"=>Supplier::find($id),
                    "action"=> url($this->action.'/create')
                );
        return view($this->view.'create',$data);
    }

}
