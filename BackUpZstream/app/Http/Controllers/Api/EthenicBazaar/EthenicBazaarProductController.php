<?php

namespace App\Http\Controllers\Api\EthenicBazaar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Traits\ProcessResponseTrait;
use App\Http\Controllers\Api\Traits\ValidationTrait;

class EthenicBazaarProductController extends Controller
{
    use ProcessResponseTrait,ValidationTrait;
    
    public function product_lists(Request $request)
    {
        $url="http://zcommerce.online/api/product_lists";
        $data = [
            'connection_id' => $request->connection_id,
            'auth_code' => $request->auth_code,
            'page' => $request->page,
            'order_by' => $request->order_by
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
            $temp= $response->product_list;
            return $this->processResponse('product_list',$temp,'success','Product List');
        }
        
    }
}
