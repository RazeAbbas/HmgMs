<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use App\User;
use App\Models\Supplier;
use App\Models\Brand;
use App\Models\ItemType;
use App\Models\Item;

class ItemController extends Controller
{
    private $type     =  "items";
    private $singular =  "Item";
    private $plural   =  "Items";
    private $view     =  "items.";
    private $action   =  "/dashboard/items";
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
        $records   = Item::where("Office_id","=",Auth::user()->office);
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
        if($request->isMethod("POST")){
            $data = $request->all();
            $this->cleanData($data);

            $data['office_id'] = Auth::user()->office;
            $data['company_id'] = Auth::user()->company;
            $data['created_user'] = Auth::id();
            
            $is_save             = Item::where('name','=',
                                                $data['name'])
                                                ->count();
            if($is_save > 0)    {
                $response = array('flag'=>false,'msg'=>$this->singular.' with name already exist.');
                echo json_encode($response); return;
            }
            $Areas         = new Item;
            $Areas->insert($data);
            $response = array('flag'=>true,'msg'=>$this->singular.' is added sucessfully.','action'=>'reload');
            echo json_encode($response); return;
        }

        $data   = array(
                    "page_title"=>"Add ".$this->singular,
                    "page_heading"=>"Add ".$this->singular,
                    "breadcrumbs"=>array("dashboard"=>"Dashboard","#"=>$this->plural." List"),
                    "itemTypes"=>ItemType::where("office_id","=",Auth::user()->office)->get(),
                    "supplier"=>Supplier::where("office_id","=",Auth::user()->office)->get(),
                    "brands"=>Brand::where("office_id","=",Auth::user()->office)->where("company_id","=",Auth::user()->company)->get(),
                    "action"=> url($this->action.'/create')
                );
        return view($this->view.'create',$data);
    }
    public function update(Request $request,$id = NULL)
    {
        if($request->method() == "POST"){
            $data = $request->all();
            $this->cleanData($data);

            if(isset($data['name'])) {
                $is_save             = Item::where('name','=',
                                                    $data['name'])
                                                    ->where($this->db_key,'!=',
                                                    $id)
                                                    ->count();
                if($is_save > 0)    {
                    $response = array('flag'=>false,'msg'=>$this->singular.' with name already exist.');
                    echo json_encode($response); return;
                }
            }
            $obj         = Item::find($id);
            $obj->update($data);
            $response = array('flag'=>true,'msg'=>$this->singular.' is updated sucessfully.','action'=>'reload');
            echo json_encode($response); return;
        }
        $data   = array(
                    "page_title"=>"Edit ".$this->singular,
                    "page_heading"=>"Edit ".$this->singular,
                    "breadcrumbs"=>array("dashboard"=>"Dashboard","#"=>$this->plural." List"),
                    "action"=> url($this->action.'/edit/'.$id),
                    "itemTypes"=>ItemType::where("office_id","=",Auth::user()->office)->get(),
                    "supplier"=>Supplier::where("office_id","=",Auth::user()->office)->get(),
                    "brands"=>Brand::where("office_id","=",Auth::user()->office)->where("company_id","=",Auth::user()->company)->get(),
                    "row" => Item::find($id)
                );
        return view($this->view.'edit',$data);
    }
    public function delete($id) {
        Item::destroy($id);
        $response = array('flag'=>true,'msg'=>$this->singular.' has been deleted.');
        echo json_encode($response); return;
    }
    public function _bulk(Request $request) {
        $data = $request->all();
        return $data;
        //Categories::destroy($id);
        $response = array('flag'=>true,'msg'=>$this->singular.' has been deleted.','action'=>'reload');
        echo json_encode($response); return;
    }

}