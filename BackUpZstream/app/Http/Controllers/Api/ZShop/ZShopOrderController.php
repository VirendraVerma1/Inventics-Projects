<?php

namespace App\Http\Controllers\Api\ZShop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Traits\ProcessResponseTrait;
use App\Http\Controllers\Api\Traits\ValidationTrait;

class ZShopOrderController extends Controller
{
    use ProcessResponseTrait,ValidationTrait;
    
    public function zshop_orders(Request $request)
    {
        $url=$this->ZShop_base_url."api/orders";
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
            // foreach($response->order_data->images as $mcl)
            // {
            //     $mcl->path=$this->ZShop_base_url."image/".$mcl->path;
            // }
            $temp= $response->order_data;
            return $this->processResponse('order_data',$temp,'success','Order Data');
        }   
    }

    public function zshop_order_details(Request $request)//this one
    {
        $url=$this->ZShop_base_url."api/order_detail";
        $data = [
            'connection_id' => $request->connection_id,
            'auth_code' => $request->auth_code,
            'order_id' => $request->order_id
        ];
        $response=$this->get_responseDataFromURLPost($data,$url,true);

        dd($response);
        
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

    public function zshop_order_status_update(Request $request)//this one
    {
        $url=$this->ZShop_base_url."api/order_status_update";
        $data = [
            'connection_id' => $request->connection_id,
            'auth_code' => $request->auth_code,
            'order_id' => $request->order_id,
            'order_status' => $request->order_status
        ];
        $response=$this->get_responseDataFromURLPost($data,$url,true);

        dd($response);
        
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

    public function zshop_order_status_list(Request $request)
    {
        $url=$this->ZShop_base_url."api/order_status_list";
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
            // foreach($response->order_status_list->images as $mcl)
            // {
            //     $mcl->path=$this->ZShop_base_url."image/".$mcl->path;
            // }
            $temp= $response->order_status_list;
            return $this->processResponse('order_status_list',$temp,'success','Order List');
        }   
    }

    public function zshop_pdf_save(Request $request)
    {
        $url=$this->ZShop_base_url."api/pdf_save";
        $data = [
            'connection_id' => $request->connection_id,
            'auth_code' => $request->auth_code,
            'order_id' => $request->order_id,
            'file' => $request->file
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
            // foreach($response->order_pdf->images as $mcl)
            // {
            //     $mcl->path=$this->ZShop_base_url."image/".$mcl->path;
            // }
            $temp= $response->order_pdf;
            return $this->processResponse('order_pdf',$temp,'success','Order Pdf');
        }   
    }
}
