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

class ZmallInventory extends Controller
{
    //
    use ProcessResponseTrait,ValidationTrait;

    
    #region for inventory list

    public function get_all_inventory_list(Request $request)
        {
            if($request->connection_id==null ||$request->channel_connection_id==null ||$request->channel_id==null || $request->category_id==null)
            {
                return $this->processResponse('Connection',null,'erroe','missing parameter(connection_id,channel_connection_id,channel_id,category_id)');
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
                    $category_id=$request->category_id;

                    $url=$this->ZShop_base_url."api/inventory_lists";
                    $data = [
                        'connection_id' => $request->channel_connection_id,
                        'auth_code' => $request->channel_auth_code,
                        'page' => $request->page
                    ];
                    $response=$this->get_responseDataFromURLPost($data,$url,true);

                    // dd($response->product_list);
                    
                    if($response==null)
                    return $this->processResponse('API',null,'error','returning null from refrence api');
                    elseif($response->status=='error')
                    return $this->processResponse('Connection',null,'error','Invalid Session');
                    else if($response->status=="Connection Failure")
                    return $this->processResponse('Connection',null,'error','Invalid Session');
                    else if($response->status=="success")
                    {
                        foreach($response->inventory_list as $mcl)
                        {
                            $mcl->images=$this->ZShop_base_url."image/".$mcl->images;
                        }
                        //TODO
                        //if having the same category then insert in array elses not
                        //$category_id
                        $temp= $response->inventory_list;
                        return $this->processResponse('inventory_detail',$temp,'success','Product List');
                    }
                }
                else if($mychannels->type==2)//ethenic
                {
                    //get all the categories
                    $data = [
                        'connection_id' => $request->channel_connection_id,
                        // 'auth_code' => $request->auth_code
                        
                    ];
                    $url=$this->EthenicBazaar_base_url."api/categories_category";
                    
                    $category_response=$this->get_responseDataFromURLPost($data,$url,true);

                    if($category_response==null)
                    return $this->processResponse('API',null,'error','returning null from refrence api');
                    elseif($category_response->status=='error')
                    return $this->processResponse('Connection',null,'error','Invalid Session');
                    else if($category_response->status=="Connection Failure")
                    return $this->processResponse('Connection',null,'error','Invalid Session');

                    //get the slug from the category id
                    $cat_slug="";
                    
                    
                        $category_id=$request->category_id;
                        foreach($category_response->Category_sub_group as $cat_res)
                        {
                            if($cat_res->id==$category_id)
                            {
                                $cat_slug=$cat_res->slug;
                            }
                        }
    
    
                        $url=$this->EthenicBazaar_base_url."api/listing/category/".$cat_slug;
                    
                    
                    
                    $data = [
                        'connection_id' => $request->channel_connection_id,
                        // 'auth_code' => $request->auth_code,
                        'page' => $request->page
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
                        if(isset($response->Product_listings))
                        {
                            foreach($response->Product_listings as $p)
                            {
                                if($p->has_offer==true)
                                {
                                    $p->price=$p->offer_price;
                                }
                                unset($p->offer_price);
                            }
                            $temp= $response->Product_listings;
                        }
                        if(isset($response->data))
                        {
                            foreach($response->data as $p)
                            {
                                if($p->has_offer==true)
                                {
                                    $p->price=$p->offer_price;
                                }
                                unset($p->offer_price);
                            }
                            $temp= $response->data;
                        }
                        
                        return $this->processResponse('inventory_detail',$temp,'success','Product List');
                    }   
                    

                }
            }
            else
            {
                return $this->processResponse('Connection',null,'erroe','Connection not established');
            }
        }

    #endregion

    #region for inventory details

    public function get_inventory_details(Request $request)
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
                $url=$this->ZShop_base_url."api/inventory_details";
                $data = [
                    'connection_id' => $request->channel_connection_id,
                    'auth_code' => $request->channel_auth_code,
                    'inventory_id' => $request->inventory_id
                ];
                $response=$this->get_responseDataFromURLPost($data,$url,true);
        
                // dd($response->product_list);
                
                if($response==null)
                return $this->processResponse('API',null,'error','returning null from refrence api');
                elseif($response->status=='error')
                return $this->processResponse('Connection',null,'error','Invalid Session');
                else if($response->status=="Connection Failure")
                return $this->processResponse('Connection',null,'error','Invalid Session');
                else if($response->status=="success")
                {
                    foreach($response->inventory_detail->images as $mcl)
                    {
                        $mcl->path=$this->ZShop_base_url."image/".$mcl->path;
                    }
                    $temp= $response->inventory_detail;
                    return $this->processResponse('inventory_detail',$temp,'success','Product List');
                }
            }
            else if($mychannels->type==2)//ethenic
            {
                $url=$this->EthenicBazaar_base_url."api/listing/".$request->inventory_id;
                $data = [
                    'connection_id' => $request->channel_connection_id
                ];
                $response=$this->get_responseDataFromURLPost($data,$url,true);

                if($response==null)
                return $this->processResponse('API',null,'error','returning null from refrence api');
                else if($response->data!=null)
                {
                    if($response->data->has_offer==true)
                        {
                            $response->data->price=$response->data->offer_price;
                        }
                        unset($response->data->offer_price);
                    $temp= $response->data;
                
                    return $this->processResponse('inventory_detail',$temp,'success','Product List');
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
