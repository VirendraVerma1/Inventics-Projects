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

class ZmallCategory extends Controller
{
    //
    use ProcessResponseTrait,ValidationTrait;

    
    #region for categories

    public function get_all_category_data(Request $request)
        {
            if($request->connection_id==null ||$request->channel_id==null )
            {
                return $this->processResponse('Connection',null,'erroe','missing parameter(connection_id,channel_id)');
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
                    $url=$this->ZShop_base_url."api/category_list";
                    $temp_array=array();
                    if($request->category_id!=null)
                    array_push($temp_array,$request->category_id);

                    $data = [
                        'connection_id' => $mysynced_channel_data->channel_connection_id,
                        'auth_code' => $mysynced_channel_data->channel_auth_code,
                        'category_group_id' => $temp_array
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
                        foreach($response->category_list as $mcl)
                        {
                            $mcl->image=$this->ZShop_base_url.$mcl->image;
                        }

                        $newcategory_list=array();
                        foreach($response->category_list as $cl)
                        {
                            if($request->category_id!=null)
                            {
                                if($request->category_id==$cl->category_sub_group_id)
                                {
                                    array_push($newcategory_list,$cl);
                                }
                            }else{
                                array_push($newcategory_list,$cl);
                            }
                            
                        }
                        $temp= $newcategory_list;
                        return $this->processResponse('category_list',$temp,'success','Product List');
                    }
                }
                else if($mychannels->type==2)//ethenic
                {
                    $data = [
                        'connection_id' => $mysynced_channel_data->channel_connection_id
                    ];

                    if($request->category_id==null)
                    $url=$this->EthenicBazaar_base_url."api/categories_category";
                    else
                    $url=$this->EthenicBazaar_base_url."api/categories_category/".$request->category_id;
                    
                    $response=$this->get_responseDataFromURLPost($data,$url,true);
            
                    if($response==null)
                    return $this->processResponse('API',null,'error','returning null from refrence api');
                    elseif($response->status=='error')
                    return $this->processResponse('Connection',null,'error','Invalid Session');
                    else if($response->status=="Connection Failure")
                    return $this->processResponse('Connection',null,'error','Invalid Session');
                    else if($response->status=="success")
                    {
                        foreach($response->Category_sub_group as $g)
                        {
                            unset($g->description);
                        }
                        $temp= $response->Category_sub_group;
                        return $this->processResponse('category_list',$temp,'success','Category List');
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
