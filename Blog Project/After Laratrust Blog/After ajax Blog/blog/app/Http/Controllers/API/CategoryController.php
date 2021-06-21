<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Str;
use DB;
use App\User;

class CategoryController extends Controller
{
    public function registration_process(Request $request)
    {
        if($request->key==12345678)//this will happen on the very first time for creating new connection id
        {
            //we will create new random string for connection id
            $str=Str::random(5);
            DB::table('connection_request')->insert(['connection_id'=>$str]);
            $response=$this->response('connection_id',$str,'1000');
        }
        else
        {
            if($request->email&&$request->password)
            {
                //it means android user has send his connection_id but not sure for auth_id
                $exist_user=User::where('email',$request->email)->first();
                if($exist_user)
                {
                    
                    //generate new authcode because he dont have at the starting time
                    $valid=$this->check_user($request->connection_id,$request->auth_code);
                }
                else    //from this we will create a new account and give new auth code for that
                {
                    $valid=$this->check_connection($request->connection_id,$request->name,$request->email,$request->password);
                }

            }else{
                $valid=true;
            }
            
            if($valid)
            {
            $data=[$valid];
            $response=$this->response('Category List',$data,'1000');
            }
            else
            $response=$this->response('Invalid User ',null,'1000');
            
        }
        return $response;
    }

    public function index(Request $request)
    {
        $dat=$this->check_user($request->connection_id,$request->auth_code);
        if($dat)
        {
            $categories=Category::all();
            $merger_dat=[$dat,$categories];
            $response=$this->response('Category List',$merger_dat,'1000');
        }
        else
        {
            $response=$this->response('auth code dosent match',null,'1000');
        }    
        return $response;
    }

    public function create(Request $request)
    {
        $category=new Category;
        if($request->name==null||$request->description==null)
        {
            return $this->response('Name or Description Missing',json_encode($category),'1001');
        }
        else if(Category::where('name',$request->name)->first())
        {
            return $this->response('Name already exist',json_encode($category),'1001');
        }
        $str=strtolower($request->name);
        $slug = preg_replace('/\s+/', '-', $str);
        $random = Str::random(5);
        $category->slug=$slug.$random;
        $category->name=$request->name;
        $category->description=$request->description;
        $category->save();  
        return $this->response('success',$category,'1001');
    }

    public function edit(Request $request)
    {
        if($request->name==null || $request->description==null)
        return $this->response('Name or Description Missing',null,'1002');
        $category=Category::where('slug',$request->slug)->first();
        if(!$category)
        return $this->response('category not found',null,'1002');
        $str=strtolower($request->name);
        $slug = preg_replace('/\s+/', '-', $str);
        $random = Str::random(5);
        $category->slug=$slug.$random;
        $category->name=$request->name;
        $category->description=$request->description;
        $category->save();
        return $this->response('category updated',$category,'1000');
    }

    public function delete(Request $request)
    {
        $category=Category::where('slug',$request->slug)->first();
        if(!$category)
        return $this->response('category not found',$category,'1002');
        $category->delete();
        return $this->response('category deleted',$category,'1000'); 
    }

    //--------------------------------------------common functions--------------

    private function response($msg,$data=null,$code)
    {
        if($data){
            $status='success';
            return ['status'=>$status,'message'=>$msg,'data'=>$data,'code'=>$code];
        }
        else
        {
        $status='failed';
        return ['status'=>$status,'message'=>$msg,'data'=>$data,'code'=>$code];
        }

    }

    public function check_connection($connection_id,$name,$email,$password)
    {
        $valid=DB::table('connection_request')->where('connection_id',$connection_id)->first();

        if($valid)
        {
            $user=new User;
            $user->name=$name;
            $user->email=$email;
            $temppassword = Hash::make($password);
            // $temppassword = bcrypt($temppassword);
            $user->password=$temppassword;
            //$user->remember_token=Str::random(100);
            $user->save();
            $a_code=Str::random(5);
            DB::table('connection_request')->where('connection_id',$connection_id)->update(['user_id'=>$user->id,'auth_code'=>$a_code]);
            $user->auth_code=$a_code;
            return $user;
        }
        else
        return false;      
    }

    public function check_user($connection_id,$auth_code)
    {
        $valid=DB::table('connection_request')->where('connection_id',$connection_id)->where('auth_code',$auth_code)->first();
        if($valid)
        {
            $a_code=Str::random(6);
            DB::table('connection_request')->where('connection_id',$connection_id)
            ->update(['auth_code'=>$a_code]);
            $connection= DB::table('connection_request')->where('connection_id',$connection_id)->first();
            return $connection;
        }
        else
        return false;
    }
}
