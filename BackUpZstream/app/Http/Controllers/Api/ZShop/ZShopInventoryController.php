<?php

namespace App\Http\Controllers\Api\ZShop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Traits\ProcessResponseTrait;
use App\Http\Controllers\Api\Traits\ValidationTrait;

class ZShopInventoryController extends Controller
{
    use ProcessResponseTrait,ValidationTrait;
    
    public function inventory_lists(Request $request)
    {
        $url=$this->ZShop_base_url."api/inventory_lists";
        $data = [
            'connection_id' => $request->connection_id,
            'auth_code' => $request->auth_code,
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
            $temp= $response->inventory_list;
            return $this->processResponse('inventory_detail',$temp,'success','Product List');
        }
        
    }

    public function inventory_details(Request $request)
    {
        $url=$this->ZShop_base_url."api/inventory_details";
        $data = [
            'connection_id' => $request->connection_id,
            'auth_code' => $request->auth_code,
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
}
