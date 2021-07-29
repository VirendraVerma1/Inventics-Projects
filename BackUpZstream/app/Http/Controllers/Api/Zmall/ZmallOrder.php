<?php

namespace App\Http\Controllers\Api\Zmall;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;
use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Api\Traits\ProcessResponseTrait;
use App\Http\Controllers\Api\Traits\ValidationTrait;

class ZmallOrder extends Controller
{
    //
    use ProcessResponseTrait,ValidationTrait;

    #region for check out

    public function zmall_checkout(Request $request)
    {
        if($request->connection_id==null  ||$request->channel_connection_id==null ||$request->channel_auth_code==null ||$request->channel_id==null ||$request->cart_id==null||$request->shipping_option_id==null ||$request->packaging_id==null||$request->payment_method_id==null||$request->shipping_address==null||$request->address_id==null||$request->payment_status==null)
        {
            return $this->processResponse('Connection',null,'erroe','missing parameter(connection_id,channel_connection_id,channel_auth_code,channel_id,cart_id,shipping_option_id,packaging_id,payment_method_id,shipping_address,payment_status)');
        }
        
        $key = $request->connection_id;
        
        $user_id=$this->validate_connection_id($key);
        // dd($user_id);
        if($user_id)
        {
            
            //for all channels
            $mychannels=DB::table('channels')->where('id',$request->channel_id)->first();
            $mysynced_channel_data=DB::table('channel_synced')->where('channel_id',$request->channel_id)->first();
           
            if($mychannels->type==1)//zshop
            {
                
            }
            else if($mychannels->type==2)//ethenic
            {
                $url=$this->EthenicBazaar_base_url."api/cart/".$request->cart_id."/checkout";
                $data = [
                    'connection_id' => $request->channel_connection_id,
                    'auth_code' => $request->channel_auth_code,
                    'shipping_option_id' => $request->shipping_option_id,
                    'packaging_id' => $request->packaging_id,
                    'payment_method_id' => $request->payment_method_id,
                    'shipping_address' => $request->shipping_address,
                    'address_id' => $request->address_id,
                    'payment_status' => $request->payment_status
                ];
                
                $response=$this->get_responseDataFromURLPost($data,$url,true);

                dd($response);
                
                if($response==null)
                return $this->processResponse('API',null,'error','returning null from refrence api');
                elseif(isset($response->status))
                {
                    if($response->status=="error")
                    return $this->processResponse('Connection',null,'error','Invalid Session');
                    if($response->status=="failed")
                    return $this->processResponse('message',null,'error',$response->message);
                    else if($response->status=="success")
                    {
                        $temp= $response->Checkout;
                        return $this->processResponse('CheckOut',$temp,'success',"check done successfully");
                    }
                }
                elseif(isset($response->message))
                {
                    return $this->processResponse('Message',null,'success',$response->message);
                }
            } 
        }
        else
        {
            return $this->processResponse('Connection',null,'erroe','Connection not established');
        }
    }

    #endregion

    #region for orders

    public function zmall_orders(Request $request)
    {
        if($request->connection_id==null  ||$request->channel_connection_id==null ||$request->channel_auth_code==null ||$request->channel_id==null)
        {
            return $this->processResponse('Connection',null,'erroe','missing parameter(connection_id,channel_connection_id,channel_auth_code,channel_id)');
        }
        
        $key = $request->connection_id;
        
        $user_id=$this->validate_connection_id($key);
        // dd($user_id);
        if($user_id)
        {
            
            //for all channels
            $mychannels=DB::table('channels')->where('id',$request->channel_id)->first();
            $mysynced_channel_data=DB::table('channel_synced')->where('channel_id',$request->channel_id)->first();
           
            if($mychannels->type==1)//zshop
            {
                
            }
            else if($mychannels->type==2)//ethenic
            {
                $url=$this->EthenicBazaar_base_url."api/orders";
                $data = [
                    'connection_id' => $request->channel_connection_id,
                    'auth_code' => $request->channel_auth_code
                ];
                
                $response=$this->get_responseDataFromURLPost($data,$url,true);
                
                if($response==null)
                return $this->processResponse('API',null,'error','returning null from refrence api');
                elseif(isset($response->status))
                {
                    if($response->status=="error")
                    return $this->processResponse('Connection',null,'error','Invalid Session');
                    if($response->status=="failed")
                    return $this->processResponse('message',null,'error',$response->message);
                    else if($response->status=="success")
                    {
                        $temp= $response->Order_list;
                        return $this->processResponse('Order_list',$temp,'success','orders list');
                    }
                }
                elseif(isset($response->message))
                {
                    return $this->processResponse('Message',null,'success',$response->message);
                }
            } 
        }
        else
        {
            return $this->processResponse('Connection',null,'erroe','Connection not established');
        }
    }

    #endregion

    #region for order details

    public function zmall_order_details(Request $request)
    {
        if($request->connection_id==null  ||$request->channel_connection_id==null ||$request->channel_auth_code==null ||$request->channel_id==null ||$request->order_id==null)
        {
            return $this->processResponse('Connection',null,'erroe','missing parameter(connection_id,channel_connection_id,channel_auth_code,channel_id,order_id)');
        }
        
        $key = $request->connection_id;
        
        $user_id=$this->validate_connection_id($key);
        // dd($user_id);
        if($user_id)
        {
            
            //for all channels
            $mychannels=DB::table('channels')->where('id',$request->channel_id)->first();
            $mysynced_channel_data=DB::table('channel_synced')->where('channel_id',$request->channel_id)->first();
           
            if($mychannels->type==1)//zshop
            {
                
            }
            else if($mychannels->type==2)//ethenic
            {
                $url=$this->EthenicBazaar_base_url."api/order_details/".$request->order_id;
                $data = [
                    'connection_id' => $request->channel_connection_id,
                    'auth_code' => $request->channel_auth_code
                ];
                
                $response=$this->get_responseDataFromURLPost($data,$url,true);

                //dd($response);
                
                if($response==null)
                return $this->processResponse('API',null,'error','returning null from refrence api');
                elseif(isset($response->status))
                {
                    if($response->status=="error")
                    return $this->processResponse('Connection',null,'error','Invalid Session');
                    if($response->status=="failed")
                    return $this->processResponse('message',null,'error',$response->message);
                    else if($response->status=="success")
                    {
                        $temp= $response->message;
                        return $this->processResponse('message',null,'success',$temp);
                    }
                }
                elseif(isset($response->message))
                {
                    return $this->processResponse('Message',null,'success',$response->message);
                }
                elseif(isset($response->data))
                {
                    return $this->processResponse('Order_Details',$response->data,'success','order details');
                }
            } 
        }
        else
        {
            return $this->processResponse('Connection',null,'erroe','Connection not established');
        }
    }


    #endregion

    #region for cancel order

    public function zmall_cancel_order(Request $request)
    {
        if($request->connection_id==null  ||$request->channel_connection_id==null ||$request->channel_auth_code==null ||$request->channel_id==null ||$request->order_id==null||$request->shop_id==null ||$request->cancellation_reason_id==null)
        {
            return $this->processResponse('Connection',null,'erroe','missing parameter(connection_id,channel_connection_id,channel_auth_code,channel_id,order_id,shop_id,cancellation_reason_id)');
        }
        
        $key = $request->connection_id;
        
        $user_id=$this->validate_connection_id($key);
        // dd($user_id);
        if($user_id)
        {
            
            //for all channels
            $mychannels=DB::table('channels')->where('id',$request->channel_id)->first();
            $mysynced_channel_data=DB::table('channel_synced')->where('channel_id',$request->channel_id)->first();
           
            if($mychannels->type==1)//zshop
            {
                
            }
            else if($mychannels->type==2)//ethenic
            {
                $url=$this->EthenicBazaar_base_url."api/cancel_order/".$request->order_id;
                $data = [
                    'connection_id' => $request->channel_connection_id,
                    'auth_code' => $request->channel_auth_code,
                    'shop_id' => $request->shop_id,
                    'cancellation_reason_id' => $request->cancellation_reason_id
                ];
                
                $response=$this->get_responseDataFromURLPost($data,$url,true);

                dd($response);
                
                if($response==null)
                return $this->processResponse('API',null,'error','returning null from refrence api');
                elseif(isset($response->status))
                {
                    if($response->status=="error")
                    return $this->processResponse('Connection',null,'error','Invalid Session');
                    if($response->status=="failed")
                    return $this->processResponse('message',null,'error',$response->message);
                    else if($response->status=="success")
                    {
                        $temp= $response->message;
                        return $this->processResponse('message',null,'success',$temp);
                    }
                }
                elseif(isset($response->message))
                {
                    return $this->processResponse('Message',null,'success',$response->message);
                }
            } 
        }
        else
        {
            return $this->processResponse('Connection',null,'erroe','Connection not established');
        }
    }

    #endregion

}
