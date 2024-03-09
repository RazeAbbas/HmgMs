<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\User;
use App\Models\Office;
use App\Models\Document;

class DocumentController extends Controller
{
    private $type     =  "documents";
    private $singular =  "Document";
    private $plural   =  "Documents";
    private $view     =  "documents.";
    private $action   =  "/dashboard/documents";
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
        $records   = Document::where("office_id","=",Auth::user()->office);
        // $records   = Office::find(Auth::user()->office)->getDocuments;
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
            $data['office_id'] = Auth::user()->office;
            $data['company_id'] = Auth::user()->company;
            $data['created_user'] = Auth::id();

            if(isset($data['file'])){
                $file = $data['file'];
                $fileName = time()."_".$file->getClientOriginalName();
                $data['file'] = $fileName;
                $file->move("public/uploads/documents",$fileName);
            }
            
            $is_save             = Document::where('title','=',
                                                $data['title'])
                                                ->count();
            if($is_save > 0)    {
                $response = array('flag'=>false,'msg'=>$this->singular.' with title already exist.');
                echo json_encode($response); return;
            }
            $Areas         = new Document;
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
            $document = Document::find($id);

            if(isset($data['file'])){
                if(File::exists("public/uploads/documents/".$document->file)){
                    File::delete("public/uploads/documents/".$document->file);
                }
                $file = $data['file'];
                $fileName = time()."_".$file->getClientOriginalName();
                $data['file'] = $fileName;
                $file->move("public/uploads/documents",$fileName);
            }

            if(isset($data['title'])) {
                $is_save             = Document::where('title','=',
                                                    $data['title'])
                                                    ->where($this->db_key,'!=',
                                                    $id)
                                                    ->count();
                if($is_save > 0)    {
                    $response = array('flag'=>false,'msg'=>$this->singular.' with title already exist.');
                    echo json_encode($response); return;
                }
            }
            $obj         = Document::find($id);
            $obj->update($data);
            $response = array('flag'=>true,'msg'=>$this->singular.' is updated sucessfully.','action'=>'reload');
            echo json_encode($response); return;
        }
        $data   = array(
                    "page_title"=>"Edit ".$this->singular,
                    "page_heading"=>"Edit ".$this->singular,
                    "breadcrumbs"=>array("dashboard"=>"Dashboard","#"=>$this->plural." List"),
                    "action"=> url($this->action.'/edit/'.$id),
                    "row" => Document::find($id)
                );
        return view($this->view.'edit',$data);
    }
    public function delete($id) {
        $document = Document::find($id);
        if(File::exists("public/uploads/documents/".$document->file)){
            File::delete("public/uploads/documents/".$document->file);
        }
        Document::destroy($id);
        $response = array('flag'=>true,'msg'=>$this->singular.' has been deleted.');
        echo json_encode($response); return;
    }
    public function _bulk(Request $request) {
        $data = $request->all();
        //Categories::destroy($id);
        $response = array('flag'=>true,'msg'=>$this->singular.' has been deleted.','action'=>'reload');
        echo json_encode($response); return;
    }
    public function download($id){
        $document = Document::find($id);
        $file = public_path()."/uploads/documents/".$document->file;
        return response()->download($file, $document->file);
    }
}
