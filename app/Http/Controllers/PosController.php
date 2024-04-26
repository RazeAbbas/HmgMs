<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Stock;
use App\Models\Customer;
use App\Models\Sale;
use App\Models\Employe;
use App\Models\SaleDetail;
use App\Models\Order;
use App\Models\Package;

class PosController extends Controller
{
    private $type     =  "pos";
    private $singular =  "Point of Sale";
    private $plural   =  "Point of Sale";
    private $view     =  "pos.";
    private $action   =  "/dashboard/pos";
    private $db_key   =  "id";
    private $perpage = 50;
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
            "page_title"=>$this->plural,
            "page_heading"=>$this->plural.' List',
            "breadcrumbs"=>array("#"=>$this->plural." List"),
            "module"=>array('type'=>$this->type,'singular'=>$this->singular,'plural'=>$this->plural,'view'=>$this->view,'action'=>$this->action,'db_key'=>$this->db_key)
        );
        
        
        /*
        GET RECORDS
        */
        $records   = Package::where('office_id','=',Auth::user()->office);
        $records   = $this->search($records,$request,$data)->orderBy('id','DESC');
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
        $data['employees'] = Employe::where('roles', '6')->where('office','=',Auth::user()->office)->get();
        $data['list']   =   $records;
        //dd($data);
        return view($this->view.'list',$data);
    }
    public function getStock($id){
        $stock = Package::find($id);
        return $stock;
    }
    public function getCustomer(Request $request)
    {
        $searchValue = $request->search;
        $result = Customer::where('name', $searchValue)
        ->orWhere('name', 'like', '%' . $searchValue . '%')->get();
        return $result;
    }
    
    public function getItems(Request $request){
        $searchValue = $request->search;
        $result = Package::where('title', $searchValue)
        ->orWhere('title', 'like', '%' . $searchValue . '%')->get();
        return $result;
        return $searchValue;
    }
    
    public function saleProduct(Request $request){
        $data = $request->all();
        // $data = $request->input('emp_id');
        $this->cleanData($data);

        $detail = new SaleDetail;
        $detail->name = $data['name'];
        $detail->date = $data['date'];
        $detail->total_bill = $data['total_bill'];
        $detail->discount = $data['discount'];
        $detail->payable_amount = $data['payable_amount'];
        $detail->emp_id = $data['emp_id'];
        $detail->office_id = Auth::user()->office;
        $detail->company_id = Auth::user()->company;
        $detail->created_user = Auth::id();
        $detail->save();
        $detail_id = $detail->id;
        $detail_emp_id = $detail->emp_id;
        $packages = Package::whereIn('id', $data['item'])->get();
        
        for($i=0; $i<count($data['item']); $i++){
            $obj = new Sale;
            $obj->item = $data['item'][$i];
            $obj->qty = $data['qty'][$i];
            $stock = Package::find($data['item'][$i]);
            $stock_qty = $stock->qty;
            $stock->qty = $stock_qty - $data['qty'][$i];
            $stock->save();
            $obj->price = $data['price'][$i];
            $obj->total = $data['total'][$i];
            $data['item'][$i] = $packages->where('id', $data['item'][$i])->first()->title;
            $obj->sale_detail_id =  $detail_id;
            $obj->emp_id =  $detail_emp_id;
            $obj->office_id = Auth::user()->office;
            $obj->company_id = Auth::user()->company;
            $obj->created_user = Auth::id();
            $obj->save();
        }
        $data['emp'] = Employe::where('id', $obj->emp_id)->first();
        
        return view("pos/receipt",compact('data'));
        }
        
        public function cleanData(&$data) {
            $unset = ['ConfirmPassword','q','_token'];
            foreach ($unset as $value) {
                if(array_key_exists ($value,$data))  {
                    unset($data[$value]);
                }
            }
        }
        
        public function receipt(Request $request){
            return view("pos/receipt");
        }
        public function create(Request $request)
        {
            if($request->input('label')){
                $data = $request->all();
                $this->cleanData($data);
                $Areas         = new Categories;
                $Areas->insert($data);
                $response = array('flag'=>true,'msg'=>$this->singular.' is added sucessfully.','action'=>'reload');
                echo json_encode($response); return;
            }
            
            $data   = array(
                "page_title"=>"Add ".$this->singular,
                "page_heading"=>"Add ".$this->singular,
                "breadcrumbs"=>array("dashboard"=>"Dashboard","#"=>$this->plural." List"),
                "action"=> url($this->action.'/create')
            );
            return view($this->view.'create',$data);
        }
        public function update(Request $request,$id = NULL)
        {
            if($request->method() == "POST"){
                $data = $request->all();
                $this->cleanData($data);
                
                if(isset($data['label'])) {
                    $is_save             = Categories::where('label','=',
                    $data['label'])
                    ->where($this->db_key,'!=',
                    $id)
                    ->count();
                    if($is_save > 0)    {
                        $response = array('flag'=>false,'msg'=>$this->singular.' with label already exist.');
                        echo json_encode($response); return;
                    }
                }
                $obj         = Categories::find($id);
                $obj->update($data);
                $response = array('flag'=>true,'msg'=>$this->singular.' is updated sucessfully.','action'=>'reload');
                echo json_encode($response); return;
            }
            $data   = array(
                "page_title"=>"Edit ".$this->singular,
                "page_heading"=>"Edit ".$this->singular,
                "breadcrumbs"=>array("dashboard"=>"Dashboard","#"=>$this->plural." List"),
                "action"=> url($this->action.'/edit/'.$id),
                "row" => Categories::find($id)
            );
            return view($this->view.'edit',$data);
        }
        public function delete($id) {
            //Categories::destroy($id);
            $response = array('flag'=>true,'msg'=>$this->singular.' has been deleted.');
            echo json_encode($response); return;
        }
        public function _bulk(Request $request) {
            $data = $request->all();
            //Categories::destroy($id);
            $response = array('flag'=>true,'msg'=>$this->singular.' has been deleted.','action'=>'reload');
            echo json_encode($response); return;
        }
        
    }
    