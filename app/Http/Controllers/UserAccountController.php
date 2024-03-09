<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\User;
use Hash;

class UserAccountController extends Controller
{
    private $type     =  "userAccounts";
    private $singular =  "Account";
    private $plural   =  "Accounts";
    private $view     =  "userAccounts.";
    private $action   =  "/dashboard/userAccounts";
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
    public function update(Request $request,$id = NULL)
    {
        if($request->method() == "POST"){
            $user = User::find($id);
            $data = $request->all();
            $this->cleanData($data);
            if(isset($data['password'])){
                $password = Hash::make($data['password']);
                $data['password'] = $password;
            }

            if(isset($data['profile_image'])){
                if(File::exists("public/uploads/images/".$user->profile_image)){
                    File::delete("public/uploads/images/".$user->profile_image);
                }
                $image = $data['profile_image'];
                $imageName = time().Str::random(5)."_".$image->getClientOriginalName();
                $image->move("public/uploads/images/",$imageName);
                $data['profile_image'] = $imageName;
            }
            // $obj         = User::find($id);
            $user->update($data);
            $response = array('flag'=>true,'msg'=>$this->singular.' is updated sucessfully.','action'=>'reload');
            echo json_encode($response); return;
        }
        if($id == Auth::id()){
            $data   = array(
                "page_title"=>"Edit ".$this->singular,
                "page_heading"=>"Edit ".$this->singular,
                "breadcrumbs"=>array("dashboard"=>"Dashboard","#"=>$this->plural." List"),
                "action"=> url($this->action.'/edit/'.$id),
                "row" => User::find($id)
            );
            return view($this->view.'edit',$data);
        }else {
            return redirect()->back();
        }
    }

}

