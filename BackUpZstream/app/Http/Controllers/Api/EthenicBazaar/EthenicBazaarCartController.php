<?php

namespace App\Http\Controllers\Api\EthenicBazaar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Traits\ProcessResponseTrait;
use App\Http\Controllers\Api\Traits\ValidationTrait;

class EthenicBazaarCartController extends Controller
{
    use ProcessResponseTrait,ValidationTrait;

    public function addtocart(Request $request)
    {
        $url=$this->EthenicBazaar_base_url."api/addToCart/". $request->inventory_id;
        $data = [
            'connection_id' => $request->connection_id,
            'auth_code' => $request->auth_code,
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
            else if($response->status=="success")
            {
            
                dd($response);

                $temp= $response->Category_sub_group;
                return $this->processResponse('sub_category_list',$temp,'success','Product List');
            }
        }
        elseif(isset($response->message))
        {
            return $this->processResponse('Message',null,'success',$response->message);
        }
        
        
    }
}
