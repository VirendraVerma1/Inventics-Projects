<?php

namespace App\Http\Controllers\Api\EthenicBazaar;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Traits\ProcessResponseTrait;
use App\Http\Controllers\Api\Traits\ValidationTrait;
use Illuminate\Database\Eloquent\Collection;

class EthenicBazaarController extends Controller
{
    use ProcessResponseTrait,ValidationTrait;

    #region Authentication: get_connection_id_ethenicbazaar,request_otp_ethenicbazaar,verify_otp_ethenicbazaar(login,signup)

    public function get_connection_id_ethenicbazaar(Request $request)
    {
        $url=$this->EthenicBazaar_base_url."api/auth/get_connection_id";
        $data = [
            'api_key' => $request->api_key
        ];
        $response=$this->get_responseDataFromURLPost($data,$url,true);
        
        if($response->status=='error')
        return $this->processResponse('Api_key_matching',null,'error','API_key not matched');
        else
        return $this->processResponse('Connection_id',$response->Connection_id,'success','This is your connection id');
       
    }

    public function request_otp_ethenicbazaar(Request $request)//TODO
    {
        $url=$this->EthenicBazaar_base_url."api/auth/otp_request/register";
        $data = [
            'connection_id' => $request->connection_id,
            'mobile' => $request->mobile
        ];

        $response=$this->get_responseDataFromURLPost($data,$url,true);

        if($response==null)
        return $this->processResponse('API',null,'error','returning null from refrence api');
        elseif($response->status=='error')
        return $this->processResponse('Connection',null,'error','Invalid Session');
        else if($response->status=="Connection Failure")
        return $this->processResponse('Connection',null,'error','Invalid Session');
        else if($response->status=="success")
        return response()->json(['Status'=>'success','Code'=>202,'Message'=>'OTP sent to your registered mobile no! Proceed to verify OTP.']);
    }

    public function verify_otp_ethenicbazaar(Request $request)
    {
        if($request->token==null) //means signup
        {
            $url=$this->EthenicBazaar_base_url."api/auth/register";
            $temp_email=$request->mobile."@gmail.com";
            $data = [
            'connection_id' => $request->connection_id,
            'first_name' => 'new',
            'last_name' => 'user',
            'email' => $temp_email,
            'mobile' => $request->mobile,
            'agree' => 1,
            'otp' => $request->otp,
            'country_id' => 356,
            'state_id' => 276,
            'city_id' => 725,
            'pin_code' => 226021,
            'fcm_token' => 'dnfkdfkdmfkdfkdmkf'
            ];
            $response=$this->get_responseDataFromURLPost($data,$url,true);
            
            if($response==null)
            return $this->processResponse('API',null,'error','returning null from refrence api');
            elseif($response->status=='error')
            return $this->processResponse('Connection',null,'error','Invalid Session');
            else if($response->status=="Connection Failure")
            return $this->processResponse('Connection',null,'error','Invalid Session');
            else if($response->status=="success")
            {
                $temp=$response->customer->api_token;
                unset($response->customer->api_token);
                $response->customer->auth_code = $temp;
                return $this->processResponse('customer',$response->customer,'success','OTP verified!!Proceed to login');
            }
            
            else if($response->status=="failure")
            return response()->json(['Status'=>'failed','Code'=>202,'Message'=>'OTP Invalid']);
            
    
        }
        else //means login
        {
            $url=$this->EthenicBazaar_base_url."api/auth/login";
            $data = [
                'connection_id' => $request->connection_id,
                'mobile' => $request->mobile,
                'otp' => $request->otp
            ];
            $response=$this->get_responseDataFromURLPost($data,$url,true);
            
            if($response==null)
            return $this->processResponse('API',null,'error','returning null from refrence api');
            elseif($response->status=='error')
            return $this->processResponse('Connection',null,'error','Invalid Session');
            else if($response->status=="Connection Failure")
            return $this->processResponse('Connection',null,'error','Invalid Session');
            else if($response->status=="success")
            {
                $temp=$response->customer->api_token;
                unset($response->customer->api_token);
                $response->customer->auth_code = $temp;
                
                return $this->processResponse('customer',$response->customer,'success','OTP verified!!Proceed to login');
            }
            else if($response->status=="failure")
            return response()->json(['Status'=>'failed','Code'=>202,'Message'=>'OTP Invalid']);
        }
        
    }

    #endregion


}
