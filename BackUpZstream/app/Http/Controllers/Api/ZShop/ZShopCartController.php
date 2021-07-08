<?php

namespace App\Http\Controllers\Api\ZShop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Traits\ProcessResponseTrait;
use App\Http\Controllers\Api\Traits\ValidationTrait;


class ZShopCartController extends Controller
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

}
