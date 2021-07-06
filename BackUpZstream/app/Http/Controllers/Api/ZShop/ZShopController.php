<?php

namespace App\Http\Controllers\Api\ZShop;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Traits\ProcessResponseTrait;
use App\Http\Controllers\Api\Traits\ValidationTrait;

class ZShopController extends Controller
{
    use ProcessResponseTrait,ValidationTrait;

    #region Authentication: get_connection_id_ZShop,request_otp_ZShop,verify_otp_ZShop(login,signup)

    public function get_connection_id_ZShop(Request $request)
    {
        $url=$this->ZShop_base_url."api/get_connection_id";
        $data = [
            'api_key' => $request->api_key
        ];
        $response=$this->get_responseDataFromURLPost($data,$url,true);
        
        if($response->status=='error')
        return $this->processResponse('Api_key_matching',null,'error','API_key not matched');
        else
        return $this->processResponse('Connection_id',$response->Connection_id,'success','This is your connection id');
       
    }

    public function request_otp_ZShop(Request $request)
    {
        $url=$this->ZShop_base_url."api/request_otp";
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

    public function verify_otp_ZShop(Request $request)
    {
        if($request->token==null) //means signup
        {
            $url=$this->ZShop_base_url."api/verify_otp";
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
            return $this->processResponse('customer',$response->check_user_existance,'success','OTP verified!!Proceed to login');
            else if($response->status=="failure")
            return response()->json(['Status'=>'failed','Code'=>202,'Message'=>'OTP Invalid']);
            
    
        }
        else //means login
        {
            $url=$this->ZShop_base_url."api/app_shop_login";
            $data = [
                'connection_id' => $request->connection_id,
                'mobile' => $request->mobile,
                'otp' => $request->otp,
                'fcm_token' => $request->token
            ];
            $response=$this->get_responseDataFromURLPost($data,$url,true);
            
            if($response==null)
            return $this->processResponse('API',null,'error','returning null from refrence api');
            elseif($response->status=='error')
            return $this->processResponse('Connection',null,'error','Invalid Session');
            else if($response->status=="Connection Failure")
            return $this->processResponse('Connection',null,'error','Invalid Session');
            else if($response->status=="success")
            return $this->processResponse('customer',$response->Customer,'success','OTP verified!!Proceed to login');
            else if($response->status=="failure")
            return response()->json(['Status'=>'failed','Code'=>202,'Message'=>'OTP Invalid']);
        }
        
    }

    #endregion


}

