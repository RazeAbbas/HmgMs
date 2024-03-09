<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\Supplier;
use App\Models\Purchase;
use App\Models\Stock;
use App\Models\Ledger;

class PurchaseController extends Controller
{
    private $type     =  "purchases";
    private $singular =  "Purchase";
    private $plural   =  "Purchases";
    private $view     =  "purchases.";
    private $action   =  "/dashboard/purchases";
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
        $records   = new Purchase;
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
        if($request->isMethod('POST')){
            $data = $request->all();
            $this->cleanData($data);
            // return $data;

            // $data['office_id'] = Auth::user()->office;
            // $data['company_id'] = Auth::user()->company;
            // $data['created_user'] = Auth::id();

            // if(isset($data['purchase_receipt_image'])){
            //     $image = $data['purchase_receipt_image'];
            //     $imageName = time().Str::random(6)."_".$image->getClientOriginalName();
            //     $image->move("public/uploads/purchases",$imageName);
            //     // $data['purchase_receipt_image'] = $imageName;
            // }
            
            // $is_save             = Purchase::where('label','=',
            //                                     $data['label'])
            //                                     ->count();
            // if($is_save > 0)    {
            //     $response = array('flag'=>false,'msg'=>$this->singular.' with label already exist.');
            //     echo json_encode($response); return;
            // }
            $Areas         = new Purchase;
            $Areas->supplier = $data['supplier'];
            $Areas->title = $data['title'];
            $Areas->order_date = $data['order_date'];
            $Areas->receive_date = $data['receive_date'];
            $Areas->status = $data['status'];
            $Areas->total_bill = $data['total_bill'];
            $Areas->advance_payment = $data['advance_payment'];
            $Areas->cargo_service = $data['cargo_service'];
            $Areas->cargo_service_number = $data['cargo_service_number'];
            $Areas->bilter_number = $data['bilter_number'];
            $Areas->description = $data['description'];
            $Areas->office_id = Auth::user()->office;
            $Areas->company_id = Auth::user()->company;
            $Areas->created_user = Auth::id();
            if(isset($data['purchase_receipt_image'])){
                $image = $data['purchase_receipt_image'];
                $imageName = time().Str::random(6)."_".$image->getClientOriginalName();
                $image->move("public/uploads/purchases",$imageName);
                $Areas->purchase_receipt_image = $imageName;
            }
            $Areas->save();

            $pur_id = $Areas->id;
            $purchase = Purchase::find($pur_id);

            $ledger = new Ledger;
            $data   = array(
                "supplier_id"=>$purchase->supplier,
                "title"=>$purchase->title,
                "purchase_id"=>$purchase->id,
                "amount"=>$purchase->total_bill,
                "paid_amount"=>$purchase->advance_payment,
                "ledger_date"=>date('Y-m-d'),
                "office_id"=>Auth::user()->office,
                "company_id"=>Auth::user()->company,
                "created_user"=>Auth::id()
            );
            $ledger->insert($data);

            $response = array('flag'=>true,'msg'=>$this->singular.' is added sucessfully.','action'=>'reload');
            echo json_encode($response); return;
        }

        $data   = array(
                    "page_title"=>"Add ".$this->singular,
                    "page_heading"=>"Add ".$this->singular,
                    "breadcrumbs"=>array("dashboard"=>"Dashboard","#"=>$this->plural." List"),
                    "supplier"=>Supplier::where("office_id","=",Auth::user()->office)->get(),
                    "action"=> url($this->action.'/create')
                );
        return view($this->view.'create',$data);
    }
    public function update(Request $request,$id = NULL)
    {
        if($request->method() == "POST"){
            $data = $request->all();
            $this->cleanData($data);

            if(isset($data['purchase_receipt_image'])){
                $image = $data['purchase_receipt_image'];
                $imageName = time().Str::random(6)."_".$image->getClientOriginalName();
                $image->move("public/uploads/purchases",$imageName);
                $data['purchase_receipt_image'] = $imageName;
            }

            // if(isset($data['label'])) {
            //     $is_save             = Categories::where('label','=',
            //                                         $data['label'])
            //                                         ->where($this->db_key,'!=',
            //                                         $id)
            //                                         ->count();
            //     if($is_save > 0)    {
            //         $response = array('flag'=>false,'msg'=>$this->singular.' with label already exist.');
            //         echo json_encode($response); return;
            //     }
            // }
            $obj         = Purchase::find($id);
            $obj->update($data);
            $response = array('flag'=>true,'msg'=>$this->singular.' is updated sucessfully.','action'=>'reload');
            echo json_encode($response); return;
        }
        $data   = array(
                    "page_title"=>"Edit ".$this->singular,
                    "page_heading"=>"Edit ".$this->singular,
                    "breadcrumbs"=>array("dashboard"=>"Dashboard","#"=>$this->plural." List"),
                    "action"=> url($this->action.'/edit/'.$id),
                    "supplier"=>Supplier::where("office_id","=",Auth::user()->office)->get(),
                    "row" => Purchase::find($id)
                );
        return view($this->view.'edit',$data);
    }
    public function delete($id) {
        $purchase = Purchase::find($id);
        $ledger = Ledger::where("purchase_id","=",$purchase->id)->delete();
        if(File::exists("public/uploads/purchases/".$purchase->purchase_receipt_image)){
            File::delete("public/uploads/purchases/".$purchase->purchase_receipt_image);
        }
        Purchase::destroy($id);

        $response = array('flag'=>true,'msg'=>$this->singular.' has been deleted.');
        echo json_encode($response); return;
    }
    public function _bulk(Request $request) {
        $data = $request->all();
        //Categories::destroy($id);
        $response = array('flag'=>true,'msg'=>$this->singular.' has been deleted.','action'=>'reload');
        echo json_encode($response); return;
    }

    // public function stockList(Request $request)
    // {
    //     $data   = array(
    //                 "page_title"=>"Add Stock",
    //                 "page_heading"=>"Add Stock",
    //                 "breadcrumbs"=>array("#Stocks List"),
    //                 "module"=>array('type'=>'addStocks','singular'=>'Stock','plural'=>'Stocks','view'=>'addStocks.','action'=>'dashboard/addStocks','db_key'=>$this->db_key)
    //             );
        
        
    //     /*
    //     GET RECORDS
    //     */
    //     $records   = new Stock;
    //     $records   = $this->search($records,$request,$data)->orderBy('id','DESC');
    //     /*
    //     GET TOTAL RECORD BEFORE BEFORE PAGINATE
    //     */
    //     $data['count']      = $records->count();
    //     /*
    //     PAGINATE THE RECORDS
    //     */
    //     $records            = $records->paginate($this->perpage);
    //     $records->appends($request->all())->links();
    //     $links = $records->links();

    //     $records = $records->toArray();
    //     $records['pagination'] = $links;
    //     /*
    //     ASSIGN DATA FOR VIEW
    //     */
    //     $data['list']   =   $records;
    //     //dd($data);
    //     return view($this->view.'list',$data);
    // }

    // public function addStock(Request $request)
    // {
    //     if($request->isMethod('POST')){
    //         $data = $request->all();
    //         $this->cleanData($data);
            
    //         // $is_save             = Purchase::where('label','=',
    //         //                                     $data['label'])
    //         //                                     ->count();
    //         // if($is_save > 0)    {
    //         //     $response = array('flag'=>false,'msg'=>$this->singular.' with label already exist.');
    //         //     echo json_encode($response); return;
    //         // }
    //         $Areas         = new Stock;
    //         $Areas->insert($data);
    //         $response = array('flag'=>true,'msg'=>'Stock is added sucessfully.','action'=>'reload');
    //         echo json_encode($response); return;
    //     }

    //     $data   = array(
    //                 "page_title"=>"Add Stock",
    //                 "page_heading"=>"Add Stock",
    //                 "breadcrumbs"=>array("dashboard"=>"Dashboard","#Stocks List"),
    //                 "supplier"=>Supplier::where("office_id","=",Auth::user()->office)->get(),
    //                 "action"=> url('addStocks/create')
    //             );
    //     return view('addStocks.create',$data);
    // }

   

}
