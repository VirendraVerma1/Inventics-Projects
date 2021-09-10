<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        $this->updatedata();
        $img_url=$this->server_image_path;
        $current_currency=$this->current_currency;
        $categories=$this->getsubgroup();
        $sub_categories=$this->getsubgroupcategories();
        $cat_product=$this->getcategoriesproduct();
        
        return view('Account.Login.index',compact('cat_product','categories','sub_categories','img_url','current_currency'));
    }


    public function request_login_otp(Request $request)
    {
        //dd($request);
        $phone=$request->phone;
        //$otp = rand(1000,9999);
        $otp = 2021;
        $data = array(
            'otp'=>$otp,
            'phone'=>$phone,
            'status'=>1,
        );
        $customer_exist=DB::table('customers')->where('phone',$phone)->first();
        //dd($customer_exist);
        if($customer_exist)
        {
            $exiting_otp=DB::table('otps')->where('phone',$phone)->first();
            //dd($exiting_otp);
            if($exiting_otp)
            {
                DB::table('otps')->where('phone',$phone)->delete();     //deleting the exiting otp
            }
            $sentOtp= DB::table('otps')->insert($data);
            $payload=array("flow_id" => "60b914d20fbe5d266e3cc089",
                       "sender" => "SIMPEL",
                       "mobiles" => "91".$phone,
                       "code" => $otp,
                       "platform"=>"Zshop"
                       );
            //$this->sendMsgFlow($payload);
            DB::table('customers')->where('phone',$phone)->update(['password'=>bcrypt($otp)]);
            return array('message'=>'verified', 'phone'=>$phone);
        }
        else
        {
            return array('message'=>'please_register', 'phone'=>$phone);
        }
    }

    public function verify_login_otp(Request $request)
    {
        //dd($request);
        $otp=$request->password;
        $sentOtp=DB::table('otps')->where('phone',$request->phone)->first();
        
        if($otp ==$sentOtp->otp)
        {

            $customer= $this->guard()->attempt(
                    $request->only('phone','password'), $request->filled('remember')
                );
            if($customer)
            {
                return redirect()->route('Account','details')->with('success','Logged in successfully');
            }
            else
            {
                return redirect()->back()->with('warning', 'OTP matched but loginfailed| Retry '); 
            }
        }
        else
        {
            return redirect()->back()->with('warning', 'OTP not matched | Retry');
        }
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


    public function logout(Request $request)
    {
        $this->guard()->logout();

        // $request->session()->invalidate();

        // $request->session()->regenerateToken();

        return $this->loggedOut($request) ?: redirect('/');
    }
}
