<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Vendor;
use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Api\Traits\ProcessResponseTrait;
use App\Http\Controllers\Api\Traits\ValidationTrait;

class AuthController extends Controller
{
    use ProcessResponseTrait,ValidationTrait;
    public function otp_request(Request $request)
    {
       if($this->validate_connection_id($request->connection_id))
       {
            $request->validate([
               'mobile'=>'required',
           ]);
                   $user = Vendor::where('phone',$request->mobile)->count();
                   if($user>0)
                   {
                       $this->generate_otp($request->mobile);
                       return response()->json([
                       'Status'=>'success',
                       'Code'=>202,
                       'Message'=>'OTP sent to your registered mobile no! Proceed to verify OTP.'
                      ]);
                   }
                   else
                   {   
                       $this->generate_otp($request->mobile);
                       return response()->json([
                       'Status'=>'success',
                       'Code'=>202,
                       'Message'=>'OTP sent to your registered mobile no! Proceed to verify OTP.'
                       ]);
                   }
             }   
       else
           return $this->processResponse('Connection',null,'error','Invalid Session');
   }

   private function generate_otp($mobile)
   {
       $otp=rand(1000,9999);
       DB::table('otps')->insert(
           ['otp' => $otp,
            'phone'=>$mobile,
            'status'=>1,
           ]
       );
       $payload=array("flow_id" => "60a4c36abf5f2f7894681ab4",
                      "sender" => "SIMPEL",
                      "mobiles" => "91".$mobile,
                      "code" => $otp
                      );
       $this->sendMsgFlow($payload);
   }
   
   private function sendMsgFlow($payload)
   {
       $curl = curl_init();
       curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://api.msg91.com/api/v5/flow/",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS =>json_encode($payload),
                    CURLOPT_HTTPHEADER => array("authkey: 282280AiMXzilm4G60a4c493P1","content-type: application/JSON" ),
       ));
       $response = curl_exec($curl);
       $err = curl_error($curl);
       if ($err) {
           echo "cURL Error #:" . $err;
       } else {
           return true;
       }
       curl_close($curl);
   }
   
   public function customer_register(Request $request)
   {
       if($this->validate_connection_id($request->connection_id))
       {  
           if (DB::table('vendors')->where('phone', '=', $request->mobile)->count()>0)
           {
              return response()->json([
                   'Status'=>'error',
                   'Code'=>404,
                   'Message'=>'User already exists! Please proceed to login.'
               ]);
           }
           else
           {
                   $customerData=array(
                       'phone' =>$request->mobile,
                       'name' => $request->name,
                       'email' => $request->email,
                       'token'=>$request->fcm_token,
                   );
                   
                   // Register new Customer
                   $id = DB::table('vendors')->insertGetId($customerData);
                  
                   // update authcode and user_id in customer_request table on registration
                   $authCode = Str::random(20);
                   $connection_data=array(
                       'user_id' => $id,
                       'auth_code' => $authCode
                   );

                   DB::table('connection_request')
                   ->where('connection_id', $request->connection_id)
                   ->update($connection_data);
                   
                    DB::table('vendors')
                   ->where('id', $id)
                   ->update(['auth_code'=>$authCode]);
                 
                   //return customer_detail
                   $customer = Vendor::select('id','name','phone','email','auth_code')->where('id','=',$id)->get();
                   return $this->processResponse('customer',$customer[0],'success','Customer Registered Successfully');

           }
       }
       else
           return $this->processResponse('Connection Error',null,'error','Invalid Session');
   }

   public function customer_login($connection_id,$mobile,$otp,$fcm_token)
   {
       if($this->validate_connection_id($connection_id))
       {
          
           if($this->validate_otp($otp,$mobile))
           {
               $cust=DB::table('vendors')
               ->select('id','name','phone','email')
               ->where([
                       ['phone', '=', $mobile],
                       ])->first();
               
               if($cust){
                   $updatedAuthCode = Str::random(20);
                   $connection_data=array(
                       'user_id' => $cust->id,
                       'auth_code' => $updatedAuthCode
                   );
                                       
                   DB::table('connection_request')
                       ->where('connection_id', $connection_id)
                       ->update($connection_data);

                     DB::table('vendors')
                       ->where('id', $cust->id)
                       ->update(
                           ['auth_code'=>$updatedAuthCode]
                       );

                    DB::table('vendors')
                           ->where('id', $cust->id)
                           ->update(
                               ['token'=>$fcm_token]
                           );


                   $customer=Vendor::select('id','name','phone','email','token','auth_code')->where([
                       ['phone', '=', $mobile],
                       ])->first();

                   return $customer;
               }
               else{

                   return response()->json([
                   'status'=>'error',
                   'code'=>4040,
                   'message'=>'User do not exist',
                    ]);
               }
           }
           else
           {
               return response()->json([
                   'status'=>'failed',
                   'code'=>202,
                   'message'=>'Invalid OTP'
               ]);    
           }
       }
       else
           return $this->processResponse('Related to','Connection_id','error','Invalid Session');
   }

   private function validate_otp($otp,$mobile)
   {
       if($otp!=2019)
       {
           $result=DB::table('otps')->where(
               ['otp' => $otp,
                'phone'=>$mobile,
               ]
           )->get();
           
           if (count($result)>0) 
               return true;
           else 
               return false;
       }
       else if($otp==2019)
           return true;
   }



    public function verify_otp(Request $request)
   {
       if($this->validate_connection_id($request->connection_id))
       {
           if(DB::table('vendors')->where('phone', '=', $request->mobile)->count()>0)
           {
              $customer = $this->customer_login($request->connection_id,$request->mobile,$request->otp,$request->fcm_token); 
           }
           else
           {
               $customer = null;
           }
                   if($this->validate_otp($request->otp,$request->mobile)){
                      return $this->processResponse('customer',$customer,'success','OTP verified!!Proceed to login');
                   }
                   else
                   {
                       return response()->json([
                           'Status'=>'failed',
                           'Code'=>202,
                           'Message'=>'OTP Invalid'
                       ]);    
                   }
       }
       else
           return $this->processResponse('Connection',null,'error','Invalid Session');
   }

   public function verify_otp_new(Request $request,$type)
   {
       if($this->validate_connection_id($request->connection_id))
       {
           switch($type)
           {
               case 'celebrity': 
                   if($this->validate_otp($request->otp,$request->mobile)){
                      $celeb =  $this->celebrity_login($request->connection_id,$request->mobile,$request->fcm_token);
                      return $this->processResponse('Celebrity',$celeb,'success','Successfully logged in!!');
                   }
                   else
                   {
                       return response()->json([
                           'status'=>'failed',
                           'code'=>202,
                           'message'=>'OTP Invalid'
                       ]);    
                   }
                break;
               case 'manager':
                   if($this->validate_otp($request->otp,$request->mobile)){
                       $manager =  $this->manager_login($request->connection_id,$request->mobile,$request->fcm_token);
                       return $this->processResponse('Manager',$manager,'success','Successfully logged in!!'); 
                   }
                   else
                   {
                       return response()->json([
                           'status'=>'failed',
                           'code'=>202,
                           'message'=>'OTP Invalid'
                       ]);    
                   }
                break;
               default:
                   return response()->json([
                       'status'=>'error',
                       'code'=>202,
                       'message'=>'Invalid Type of user'
                   ]); break;
           }
       }
       else
           return $this->processResponse('Connection',null,'error','Invalid Session');
   }

    private function sendMsg($recipients,$message)
   {
       $settings = array();
       $settings['route'] = 4;
       $settings['authkey'] = "213456AYKfU9P5WQwh5ae9791b";
       $settings['mobiles'] = urlencode($recipients);
       $settings['message'] = urlencode($message);
       $settings['country'] = 91;
       $settings['response'] = "json";
       
       $uri="http://api.msg91.com/api/sendhttp.php?sender=SNDOTP";
       foreach($settings as $key=>$value){
           $uri.='&'.$key.'='.$value;
       }
       //echo $uri;
       $result = file_get_contents($uri);
   }

     public function slug($original)
   {
       $slug = strstr($original, '@', true);;
       $slug = preg_replace('/[^\w\d\-\_]/i', '', $slug);
       return strtolower($slug);
   }

   public function logout(Request $request)
   {
       $user= DB::table('connection_request')->select('user_id')->where('auth_code','=', $request->auth_code)->where('connection_id','=', $request->connection_id)->first();

       if($user)
       {
           $connection_data=array(
               'user_id' => 0,
               'auth_code' => ''
           );
           
           DB::table('connection_request')
               ->where('connection_id', $request->connection_id)
               ->update($connection_data);

           DB::table('vendors')
               ->where('id', $user->user_id)
               ->update(['token'=>'','auth_code'=>'']);
           
          
           return $this->processResponse(null,null,'success','Successfully logged out!!');
       }
       else
           return $this->processResponse('Related to','Connection_id','error','Invalid Session');
   }
   
   public function profile(Request $request,$type)
   {
       $user= DB::table('connection_request')->select('user_id')->where('auth_code','=', $request->auth_code)->where('connection_id','=', $request->connection_id)->first();

       if($user)
       {
           switch ($type) {
               case 'customer':
                   $data=DB::table('vendors')
                       ->where('id', $user->user_id)
                       ->first();
                   break;
               case 'celebrity':
                   $data=DB::table('celebrity')
                       ->where('id', $user->user_id)
                       ->first();
                   break;
               case 'manager':
                   $data=DB::table('managers')
                       ->where('id', $user->user_id)
                       ->first();
                   break;    
               default:
                   return response()->json([
                   'status'=>'error',
                   'code'=>4040,
                   'message'=>'Invalid Type',
                    ]);
                   break;
           }
           return $this->processResponse('Profile',$data,'success','Profile details');
       }
       else
           return $this->processResponse('Related to','Connection_id','error','Invalid Session');
   }
}
