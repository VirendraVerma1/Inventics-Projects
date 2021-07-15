<?php

namespace App\Http\Controllers\Api;

use App\Channel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Traits\ProcessResponseTrait;
use App\Http\Controllers\Api\Traits\ValidationTrait;
use App\Webinar;
use DB;
use Illuminate\Support\Str;
use App\Comment;
use App\LikeDislike;
use Illuminate\Support\Collection;

class CartController extends Controller
{
    use ProcessResponseTrait,ValidationTrait;

    
    #region nearbyshops

    public function get_all_nearby_shops(Request $request)
    {
        if($request->connection_id==null || $request->latitude==null || $request->longitude==null )
        {
            return $this->processResponse('Connection',null,'erroe','missing parameter(connection_id,latitude,longitude)');
        }

        $key = $request->connection_id;
        $user_id=$this->validate_connection_id($key);

        if($user_id)
        {
            $nearbyRange=9999;//this is in kilo meter
            
            $nearbyShops=$this->getByDistance($request->latitude,$request->longitude,$nearbyRange);
            $images=DB::table('images')->where('imageable_type','App\Shop')->get();

            foreach($nearbyShops as $shops)
            {
                $image_path="";
                foreach($images as $img)
                {
                    if($shops->id==$img->imageable_id)
                    {
                        $image_path=$img->path;
                        break;
                    }
                }
                $shops->img_path="http://zcommerce.online/image/".$image_path;
            }

            for($i=0;$i<count($nearbyShops);$i++)
            {
                for($j=1;$j<count($nearbyShops)-1;$j++)
                {
                    if($nearbyShops[$j]>$nearbyShops[$j+1])
                    {
                        $temp=$nearbyShops[$j];
                        $nearbyShops[$j]=$nearbyShops[$j+1];
                        $nearbyShops[$j+1]=$temp;
                    }
                }
            }

            return $this->processResponse('NearbyShops',$nearbyShops,'success','Shops fetched successfully');
        }
        else
        {
            return $this->processResponse('Connection',null,'erroe','Connection not established');
        }
    }

    #endregion

    #region category_slider

    public function getall_HomePageDetails(Request $request)
    {
        if($request->connection_id==null)
        {
            return $this->processResponse('Connection',null,'erroe','missing parameter(connection_id,auth_code)');
        }

        $key = $request->connection_id;
        $user_id=$this->validate_connection_id($key);

        if($user_id)
        {
            $category=DB::table('categories')
            ->join('images', 'categories.id', '=', 'images.imageable_id')
            ->where('images.featured',1)
            ->where('images.imageable_type','App\Category')
            ->select('categories.*','images.path as img_path')
            ->get();

            $slider=DB::table('sliders')
            ->join('images', 'sliders.id', '=', 'images.imageable_id')
            ->where('images.featured',1)
            ->where('images.imageable_type','App\Slider')
            ->select('sliders.*','images.path as img_path')
            ->get();

            $category=$this->giveMeUnRepeated($category);
            $slider=$this->giveMeUnRepeated($slider);

            $collection=[
                'Categories'=>$category,
                'Slider'=>$slider
            ];

            return $this->processResponse('Home_Page',$collection,'success','Slider fetched successfully');
        }
        else
        {
            return $this->processResponse('Connection',null,'erroe','Connection not established');
        }
    }

    #endregion

    public function add_to_cart(Request $request)
    {
        if($request->connection_id==null || $request->auth_code==null || $request->room_id==null|| $request->inventory_id==null|| $request->inventory_description==null|| $request->quantity==null)
        {
            return $this->processResponse('Connection',null,'erroe','missing parameter(connection_id,auth_code,room_id,inventory_id,inventory_description,quantity)');
        }

        $key = $request->connection_id;
        $auth=$request->auth_code;
        $user_id=$this->validate_connection_auth($key,$auth);
        if($user_id)
        {
            $webinar= Webinar::where('user_id',$user_id)->where('room_id',$request->room_id)->first();
            
            if($webinar)
            {
                //first check if old cart exist or not on the bases of channel_id and customer_id
                $cart=Cart::where('customer_id',$user_id)->where('channel_id',$webinar->channel_id)->first();
                if(!$cart)
                {
                    //if not then create new cart
                    $cart=new Cart();
                    $cart->channel_id=$webinar->channel_id;
                    $cart->customer_id=$user_id;
                    $cart->ip_address=$request->ip();
                    $cart->item_count=1;
                    $cart->quantity=1;
                    $cart->payment_status=1;
                    $cart->save();
                }

                //we will get cart id here
                //now store in the cart items table
                $cart_items=new CartItem;

            
            }
            else
            {
                $like_dislike=null;
                return $this->processResponse('AddToCart',null,'success','Dont have webinar');
            }
            
            return $this->processResponse('AddToCart',$like_dislike,'success','Like Dislike added Successfully');
        }
        else
        {
            return $this->processResponse('Connection',null,'erroe','Connection not established');
        }
    }

    
}
