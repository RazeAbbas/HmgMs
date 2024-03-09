<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\Employe;
use App\Models\Company;
use App\User;

class EmployeController extends Controller
{
    private $type     =  "employes";
    private $singular =  "Employe";
    private $plural   =  "Employes";
    private $view     =  "employes.";
    private $action   =  "/dashboard/employes";
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
        $records   = Employe::where('office','=',Auth::user()->office)->where('company','=',Auth::user()->company);
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
            $data['company'] = Auth::user()->company;
            $data['office'] = Auth::user()->office;
            $data['created_user'] = Auth::id();
            
            if(isset($data['profile_image'])){
                $image = $data['profile_image'];
                $imageName = time().Str::random(6)."_".$image->getClientOriginalName();
                $image->move("public/uploads/employes",$imageName);
                $data['profile_image'] = $imageName;
            }
            
            if(isset($data['cnic_front'])){
                $cnic_front = $data['cnic_front'];
                $cnic_front_name = time().Str::random(6)."_".$cnic_front->getClientOriginalName();
                $cnic_front->move("public/uploads/employes",$cnic_front_name);
                $data['cnic_front'] = $cnic_front_name;
            }
            
            if(isset($data['cnic_back'])){
                $cnic_back = $data['cnic_back'];
                $cnic_back_name = time().Str::random(6)."_".$cnic_back->getClientOriginalName();
                $cnic_back->move("public/uploads/employes",$cnic_back_name);
                $data['cnic_back'] = $cnic_back_name;
            }
            
            if(isset($data['police_verification'])){
                $police_verification = $data['police_verification'];
                $police_verification_name = time().Str::random(6)."_".$police_verification->getClientOriginalName();
                $police_verification->move("public/uploads/employes",$police_verification_name);
                $data['police_verification'] = $police_verification_name;
                
            }
            
            $is_save             = Employe::where('cnic','=',
            $data['cnic'])
            ->count();
            if($is_save > 0)    {
                $response = array('flag'=>false,'msg'=>$this->singular.' already exist.');
                echo json_encode($response); return;
            }
            $Areas         = new Employe;
            $Areas->insert($data);
            $response = array('flag'=>true,'msg'=>$this->singular.' is added sucessfully.','action'=>'reload');
            echo json_encode($response); return;
        }
        
        $data   = array(
            "page_title"=>"Add ".$this->singular,
            "page_heading"=>"Add ".$this->singular,
            "breadcrumbs"=>array("dashboard"=>"Dashboard","#"=>$this->plural." List"),
            "action"=> url($this->action.'/create'),
        );
        return view($this->view.'create',$data);
    }
    public function update(Request $request,$id = NULL)
    {
        if($request->method() == "POST"){
            $user = Employe::find($id);
            $data = $request->all();
            $this->cleanData($data);
            
            if(isset($data['profile_image'])){
                if(File::exists("public/uploads/employes/".$user->profile_image)){
                    File::delete("public/uploads/employes/".$user->profile_image);
                }
                $image = $data['profile_image'];
                $imageName = time().Str::random(5)."_".$image->getClientOriginalName();
                $image->move("public/uploads/employes/",$imageName);
                $data['profile_image'] = $imageName;
            }
            
            if(isset($data['cnic_front'])){
                if(File::exists("public/uploads/employes/".$user->cnic_front)){
                    File::delete("public/uploads/employes/".$user->cnic_front);
                }
                $cnic_front = $data['cnic_front'];
                $cnic_front_name = time().Str::random(5)."_".$cnic_front->getClientOriginalName();
                $cnic_front->move("public/uploads/employes",$cnic_front_name);
                $data['cnic_front'] = $cnic_front_name;
            }
            
            if(isset($data['cnic_back'])){
                if(File::exists("public/uploads/employes/".$user->cnic_back)){
                    File::delete("public/uploads/employes/".$user->cnic_back);
                }
                $cnic_back = $data['cnic_back'];
                $cnic_back_name = time().Str::random(5)."_".$cnic_back->getClientOriginalName();
                $cnic_back->move("public/uploads/employes",$cnic_back_name);
                $data['cnic_back'] = $cnic_back_name;
            }
            
            if(isset($data['police_verification'])){
                if(File::exists("public/uploads/employes/".$user->police_verification)){
                    File::delete("public/uploads/employes/".$user->police_verification);
                }
                $police_verification = $data['police_verification'];
                $police_verification_name = time().Str::random(5)."_".$police_verification->getClientOriginalName();
                $police_verification->move("public/uploads/employes/",$police_verification_name);
                $data['police_verification'] = $police_verification_name;
            }
            
            if(isset($data['label'])) {
                $is_save             = Employe::where('cnic','=',
                $data['cnic'])
                ->where($this->db_key,'!=',
                $id)
                ->count();
                if($is_save > 0)    {
                    $response = array('flag'=>false,'msg'=>$this->singular.' with label already exist.');
                    echo json_encode($response); return;
                }
            }
            $obj         = Employe::find($id);
            $obj->update($data);
            $response = array('flag'=>true,'msg'=>$this->singular.' is updated sucessfully.','action'=>'reload');
            echo json_encode($response); return;
        }
        $data   = array(
            "page_title"=>"Edit ".$this->singular,
            "page_heading"=>"Edit ".$this->singular,
            "breadcrumbs"=>array("dashboard"=>"Dashboard","#"=>$this->plural." List"),
            "action"=> url($this->action.'/edit/'.$id),
            "row" => Employe::find($id)
        );
        return view($this->view.'edit',$data);
    }
    public function delete($id) {
        $employe = Employe::find($id);
        if(File::exists("public/uploads/employes/".$employe->profile_image)){
            File::delete("public/uploads/employes/".$employe->profile_image);
        }
        
        if(File::exists("public/uploads/employes/".$employe->cnic_front)){
            File::delete("public/uploads/employes/".$employe->cnic_front);
        }
        
        if(File::exists("public/uploads/employes/".$employe->cnic_back)){
            File::delete("public/uploads/employes/".$employe->cnic_back);
        }
        
        if(File::exists("public/uploads/employes/".$employe->police_verification)){
            File::delete("public/uploads/employes/".$employe->police_verification);
        }
        Employe::destroy($id);
        $response = array('flag'=>true,'msg'=>$this->singular.' has been deleted.');
        echo json_encode($response); return;
    }
    // public function _bulk(Request $request) {
        //     $data = $request->all();
        //     //Categories::destroy($id);
        //     $response = array('flag'=>true,'msg'=>$this->singular.' has been deleted.','action'=>'reload');
        //     echo json_encode($response); return;
        // }
        
        public function detail(Request $request,$id) {
            // $data['employee'] = Employe::find($id);
            
            $data   = array(
                "page_title"=>"Edit ".$this->singular,
                "page_heading"=>"Employee Details",
                "breadcrumbs"=>array("dashboard"=>"Dashboard","#"=>$this->plural." Details"),
                // "action"=> url($this->action.'/edit/'.$id),
                "employee" => Employe::find($id)
            );
            return view($this->view.'detail',$data);
        }
        
        public function employesDocument(Request $request,$id=NULL)
        {
            $data   = array(
                "page_title"=>"Employee Document List",
                "page_heading"=>"Employee Document List",
                "breadcrumbs"=>array("#"=>"Employee Document List"),
                "record"=> Employe::find($id),
                "module"=>array('type'=>$this->type,'singular'=>$this->singular,'plural'=>$this->plural,'view'=>$this->view,'action'=>$this->action,'db_key'=>$this->db_key)
            );
            
            return view($this->view.'employes-document',$data);
        }
    }
    