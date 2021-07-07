<?php

namespace App\Http\Controllers\Api\ZShop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Traits\ProcessResponseTrait;
use App\Http\Controllers\Api\Traits\ValidationTrait;

class ZShopCategoryController extends Controller
{
    use ProcessResponseTrait,ValidationTrait;

    public function master_category_list(Request $request)
    {
        $url=$this->ZShop_base_url."api/master_category_list";
        $data = [
            'connection_id' => $request->connection_id,
            'auth_code' => $request->auth_code
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
            foreach($response->master_category_list as $mcl)
            {
                $mcl->image=$this->ZShop_base_url."image/".$mcl->image;
            }
            $temp= $response->master_category_list;
            return $this->processResponse('master_category_list',$temp,'success','Product List');
        }
        
    }

    public function category_group_list(Request $request)
    {
        $url=$this->ZShop_base_url."api/category_group_list";
        $data = [
            'connection_id' => $request->connection_id,
            'auth_code' => $request->auth_code,
            'master_category_id' => $request->master_category_id
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
            foreach($response->category_group_list as $temp)
            {
                $temp->image=$this->ZShop_base_url."image/".$temp->image;
            }

            $temp= $response->category_group_list;
            return $this->processResponse('category_group_list',$temp,'success','Product List');
        }
        
    }

    public function sub_category_list(Request $request)
    {
        $subgroup_ids=array();



        $url=$this->ZShop_base_url."api/sub_category_list";
        $data = [
            'connection_id' => $request->connection_id,
            'auth_code' => $request->auth_code,
            'category_group_id' => $request->category_group_id
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
            foreach($response->sub_category_list as $temp)
            {
                $temp->image=$this->ZShop_base_url."image/"."image/".$temp->image;
            }

            $temp= $response->sub_category_list;
            return $this->processResponse('sub_category_list',$temp,'success','Product List');
        }
        
    }

    public function category_list(Request $request)
    {
        $url=$this->ZShop_base_url."api/category_list";
        $temp_array=array();
        array_push($temp_array,$request->category_id);
        $data = [
            'connection_id' => $request->connection_id,
            'auth_code' => $request->auth_code,
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
                if($request->category_id==$cl->category_sub_group_id)
                {
                    array_push($newcategory_list,$cl);
                }
            }
            $temp= $newcategory_list;
            return $this->processResponse('category_list',$temp,'success','Product List');
        }
        
    }
}
