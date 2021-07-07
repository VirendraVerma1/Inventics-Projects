<?php

namespace App\Http\Controllers\Api\EthenicBazaar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Traits\ProcessResponseTrait;
use App\Http\Controllers\Api\Traits\ValidationTrait;

class EthenicBazaarInventoryController extends Controller
{
    use ProcessResponseTrait,ValidationTrait;
    
    public function inventory_lists(Request $request)
    {
        $category_id=$request->category_id;
        //TODO
        //get all the categories
        $data = [
            'connection_id' => $request->connection_id,
            'auth_code' => $request->auth_code
            
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
        
        foreach($category_response->Category_sub_group as $cat_res)
        {
            if($cat_res->id==$category_id)
            {
                $cat_slug=$cat_res->slug;
            }
        }


        $url=$this->EthenicBazaar_base_url."api/listing/category/".$cat_slug;
        
        $data = [
            'connection_id' => $request->connection_id,
            'auth_code' => $request->auth_code,
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
            foreach($response->Product_listings as $p)
            {
                if($p->has_offer==true)
                {
                    $p->price=$p->offer_price;
                }
                unset($p->offer_price);
            }
            $temp= $response->Product_listings;
            return $this->processResponse('inventory_detail',$temp,'success','Product List');
        }
        
    }

    public function inventory_details(Request $request)
    {
        $url=$this->EthenicBazaar_base_url."api/listing".$cat_slug;
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
                $mcl->path=$this->EthenicBazaar_base_url.$mcl->path;
            }
            $temp= $response->inventory_detail;
            return $this->processResponse('inventory_detail',$temp,'success','Product List');
        }
        
    }
}
