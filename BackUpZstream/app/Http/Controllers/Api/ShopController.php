<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Api\Traits\ProcessResponseTrait;
use App\Http\Controllers\Api\Traits\ValidationTrait;
use App\Image;
use App\Shop;

class ShopController extends Controller
{
    use ProcessResponseTrait,ValidationTrait;

    #region show shop details for zmall

    public function showshopDetailsZmall(Request $request)
    {
        if($request->connection_id==null || $request->shop_id==null)
        {
            return $this->processResponse('Connection',null,'erroe','missing parameter(connection_id,shop_id)');
        }

        $key = $request->connection_id;
        
        $user_id=$this->validate_connection_id($key);
        if($user_id)
        {
            $shop=Shop::where('id',$request->shop_id)->first();
            $images_logo=Image::where('imageable_id',$shop->id)->where('imageable_type','App\Shop')->where('featured',0)->first();
            $images_banner=Image::where('imageable_id',$shop->id)->where('imageable_type','App\Shop')->where('featured',1)->select(DB::raw("CONCAT('http://zcommerce.online/image/',images.path) AS path"),'id')->get();
            $images_gallery=Image::where('imageable_id',$shop->id)->where('imageable_type','App\ShopGallery')->select(DB::raw("CONCAT('http://zstream.zmall.live/',images.path) AS path"),'id')->get();
            $channelDetails=DB::table('channel_synced')
            ->join('channels', 'channel_synced.channel_id', '=', 'channels.id')
            ->where('channel_synced.channel_id',$shop->channel_id)
            ->where('channel_synced.user_id',$shop->owner_id)
            ->select('channels.channel_name as channel_name','channels.channel_url as channel_url','channels.channel_logo as channel_logo','channel_synced.channel_connection_id as channel_connection_id','channel_synced.channel_auth_code as channel_auth_code')
            ->get();
            $shop->logo="http://zcommerce.online/image/".$images_logo->path;


            $channel_synced=DB::table('channel_synced')->where('user_id',$shop->owner_id)->where('channel_id',$shop->channel_id)->first();

            $url='http://zcommerce.online/api/shop_category_name?connection_id='.$channel_synced->channel_connection_id.'&auth_code='.$channel_synced->channel_auth_code;
            $result=$this->getdata($url);
            $data = json_decode($result,true);
            $related_categories=$data['shopcategory'];
            
            $gallery_images=array();
            foreach($images_gallery as $gallery)
            {
                array_push($gallery_images,$gallery->path);
            }
            $shop->banner=$images_banner;
            $shop->gallery=$images_gallery;
            $shop->channel_data=$channelDetails;
            $shop->categories=$related_categories;
            
            return $this->processResponse('ZmallShopDetails',$shop,'success','Fetched shop details successfully');
        }
        else
        {
            return $this->processResponse('Connection',null,'erroe','Connection not established');
        }
    }

    #endregion

    #region shop update

    public function shopUpdate(Request $request)
    {
        if($request->connection_id==null || $request->auth_code==null || $request->shop_address==null|| $request->open_time==null|| $request->close_time==null)
        {
            return $this->processResponse('Connection',null,'erroe','missing parameter(connection_id,auth_code,shop_address,open_time,close_time)');
        }

        $key = $request->connection_id;
        $auth=$request->auth_code;
        
        $user_id=$this->validate_connection_auth($key,$auth);
        if($user_id)
        {
            $shop=Shop::where('owner_id',$user_id)->first();
            $shop->address=$request->shop_address;
            $shop->open_time=$request->open_time;
            $shop->close_time=$request->close_time;
            $shop->save();

            return $this->processResponse('ShopUpdate',$shop,'success','Shop Updated Successfully');
        }
        else
        {
            return $this->processResponse('Connection',null,'erroe','Connection not established');
        }
    }

    public function showshopDetails(Request $request)
    {
        if($request->connection_id==null || $request->auth_code==null)
        {
            return $this->processResponse('Connection',null,'erroe','missing parameter(connection_id,auth_code)');
        }

        $key = $request->connection_id;
        $auth=$request->auth_code;
        
        $user_id=$this->validate_connection_auth($key,$auth);
        if($user_id)
        {
            $shop=Shop::where('owner_id',$user_id)->first();
            $images_logo=Image::where('imageable_id',$shop->id)->where('imageable_type','App\Shop')->where('featured',0)->first();
            $images_gallery=Image::where('imageable_id',$shop->id)->where('imageable_type','App\ShopGallery')->select(DB::raw("CONCAT('http://zstream.zmall.live/',images.path) AS path"),'id')->get();
            

            $shop->logo="http://zcommerce.online/image/".$images_logo->path;
            

            $gallery_images=array();
            foreach($images_gallery as $gallery)
            {
                array_push($gallery_images,$gallery->path);
            }
            $shop->gallery=$images_gallery;

            return $this->processResponse('ShopUpdate',$shop,'success','Shop Updated Successfully');
        }
        else
        {
            return $this->processResponse('Connection',null,'erroe','Connection not established');
        }
    }

    #endregion

    #region Shop Gallery CRUD
    
    public function storeShopGallery(Request $request)
    {
        if($request->connection_id==null || $request->auth_code==null  )
        {
            return $this->processResponse('Connection',null,'erroe','missing parameter(connection_id,auth_code)');
        }

        $key = $request->connection_id;
        $auth=$request->auth_code;
        
        $user_id=$this->validate_connection_auth($key,$auth);
        if($user_id)
        {
            $shop=DB::table('shops')->where('owner_id',$user_id)->first();
            //save new image
            $img_path="";
            $img_name="";
            $extention="";
            $img_size="";
            $order=0;
            $featured=0;

            $uri=$this->storeImagePath($request->file);
            $data=explode('images/', $uri);
            
            //echo '{"Status":"success","message":"Image Upload SucessFully data","error":"000000","data":"http://simpel.in/images/'.$data[1].'"}';
            $img_path=$uri;
            $img_name=$data[1];
            DB::table('images')->insert(['path' => $img_path, 'name' => $img_name, 'extension' => $extention, 'size' => $img_size, 'order' => $order, 'featured' => $featured, 'imageable_id' => $shop->id, 'imageable_type' => 'App\ShopGallery']);
                    
            return $this->processResponse('GalleryImage',$data[1],'success','Image Uploaded successfully');
        }
        else
        {
            return $this->processResponse('Connection',null,'erroe','Connection not established');
        }
    }

    public function showShopGallery(Request $request)
    {
        if($request->connection_id==null || $request->auth_code==null  )
        {
            return $this->processResponse('Connection',null,'erroe','missing parameter(connection_id,auth_code)');
        }

        $key = $request->connection_id;
        $auth=$request->auth_code;
        
        $user_id=$this->validate_connection_auth($key,$auth);
        if($user_id)
        {
            $shop=DB::table('shops')->where('owner_id',$user_id)->first();
            $images=DB::table('images')->where('imageable_id',$shop->id)->where('imageable_type','App\ShopGallery')->get();
            
            return $this->processResponse('GalleryImage',$images,'success','Gallery images');
        }
        else
        {
            return $this->processResponse('Connection',null,'erroe','Connection not established');
        }
    }

    public function updateShopGalleryImage(Request $request)
    {
        if($request->connection_id==null || $request->auth_code==null || $request->image_id==null)
        {
            return $this->processResponse('Connection',null,'erroe','missing parameter(connection_id,auth_code,image_id)');
        }

        $key = $request->connection_id;
        $auth=$request->auth_code;
        
        $user_id=$this->validate_connection_auth($key,$auth);
        if($user_id)
        {
            $images=Image::where('id', $request->image_id)->first();
            $this->delete_image($images->name);

            $uri=$this->storeImagePath($request->file);
            $data=explode('images/', $uri);
            
            $images->path=$uri;
            $images->name=$data[1];
            $images->save();
            
            return $this->processResponse('GalleryImage',$images,'success','Gallery images updated successfully');
        }
        else
        {
            return $this->processResponse('Connection',null,'erroe','Connection not established');
        }
    }

    public function deleteShopGalleryImage(Request $request)
    {
        if($request->connection_id==null || $request->auth_code==null || $request->image_id==null)
        {
            return $this->processResponse('Connection',null,'erroe','missing parameter(connection_id,auth_code,image_id)');
        }

        $key = $request->connection_id;
        $auth=$request->auth_code;
        
        $user_id=$this->validate_connection_auth($key,$auth);
        if($user_id)
        {
            $images=Image::where('id',$request->image_id)->first();
            // dd($images->path);
            $str=$images->path;
            $this->delete_image($str);
            $images->delete();
            
            return $this->processResponse('GalleryImage',null,'success','Gallery images deleted successfully');
        }
        else
        {
            return $this->processResponse('Connection',null,'erroe','Connection not established');
        }
    }

    #endregion

    public function storeImagePath($image){
        $folderPath = 'images/';
        
        //define('UPLOAD_DIR', 'uploads/customer/');
        
        $img = str_replace('data:image/jpeg;base64,', '', $image);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $file = $folderPath . uniqid() . '.jpeg';
        $success = file_put_contents($file, $data);
        return $success ? $file : 'Unable to save the file.';
    }

    private function delete_image($image)
    {
        $filename = public_path($image);
        unlink($filename);
    }
}
