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

class ZmallCart extends Controller
{
    //
    use ProcessResponseTrait,ValidationTrait;
    
    #region for add to cart

    public function zmall_add_to_cart(Request $request)
    {
        if($request->connection_id==null  ||$request->channel_connection_id==null ||$request->channel_auth_code==null ||$request->channel_id==null ||$request->inventory_id==null )
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
                $url=$this->EthenicBazaar_base_url."api/addToCart/". $request->inventory_id;
                $data = [
                    'connection_id' => $request->channel_connection_id,
                    'auth_code' => $request->channel_auth_code,
                    'quantity' => $request->quantity,
                    'ship_to' => $request->ship_to,
                    'shipping_zone_id' => $request->shipping_zone_id,
                    'shipping_option_id' => $request->shipping_option_id
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

    #region for delete cart

    public function zmall_delete_cart(Request $request)
    {
        if($request->connection_id==null  ||$request->channel_connection_id==null ||$request->channel_auth_code==null ||$request->channel_id==null )
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
                $url=$this->EthenicBazaar_base_url."api/cart/removeItem";
                $data = [
                    'cart' => $request->cart,
                    'item' => $request->item
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
                        return $this->processResponse('message',null,'success',$response->message);
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

    #region for show cart

    public function zmall_show_cart(Request $request)
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
                $url=$this->EthenicBazaar_base_url."api/cart/show";
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
                    return $this->processResponse('error',null,'error',$response->message);
                    if($response->status=="failed")
                    return $this->processResponse('message',null,'error',$response->message);
                    else if($response->status=="success")
                    {
                        return $this->processResponse('Cart',$response->data,'success',$response->message);
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

    #region for update cart

    public function zmall_update_cart(Request $request)
    {
        if($request->connection_id==null  ||$request->channel_connection_id==null ||$request->channel_auth_code==null ||$request->channel_id==null ||$request->cart_id==null )
        {
            return $this->processResponse('Connection',null,'erroe','missing parameter(connection_id,channel_connection_id,channel_auth_code,channel_id,cart_id)');
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
                $url=$this->EthenicBazaar_base_url."api/cart/".$request->cart_id."/update" ;
                $data = [
                    'connection_id' => $request->channel_connection_id,
                    'auth_code' => $request->channel_auth_code,
                    'quantity' => $request->quantity,
                    'ship_to' => $request->ship_to,
                    'shipping_zone_id' => $request->shipping_zone_id,
                    'shipping_option_id' => $request->shipping_option_id,
                    'item' => $request->item,
                    'packaging_id' => $request->packaging_id
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
                        return $this->processResponse('Cart',null,'success',$response->message);
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
