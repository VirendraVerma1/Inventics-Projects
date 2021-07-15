<?php
    
    namespace App\Http\Controllers\Api;
    use App\Channel;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use DB;
    use App\Http\Controllers\Api\Traits\ProcessResponseTrait;
    use App\Http\Controllers\Api\Traits\ValidationTrait;
    
    class ChannelController extends Controller
    {
        use ProcessResponseTrait,ValidationTrait;
        
        public function index(Request $request)
        {
            if($request->connection_id==null )
            {
                return $this->processResponse('Connection',null,'erroe','missing parameter(connection_id)');
            }
            
            $key = $request->connection_id;
            if($this->validate_connection_id($key))
            {
                //fetch channels data
                $channels = Channel::all();
                return $this->processResponse('Channels',$channels,'success','Channels show successfully');
            }
            else
            {
                return $this->processResponse('Connection',null,'erroe','Connection not established');
            }
        }
        
        public function syncmyChannel(Request $request)
        {
            if($request->connection_id==null || $request->auth_code==null ||$request->channel_data==null||$request->latitude==null||$request->longitude==null)
            {
                return $this->processResponse('Connection',null,'erroe','missing parameter(connection_id,auth_code,channel_data,latitude,longitude)');
            }
            
            $channel_data=json_decode($request->channel_data);
            
            $key = $request->connection_id;
            $auth=$request->auth_code;
            
            $user_id=$this->validate_connection_auth($key,$auth);
            if($user_id)
            {
                //check if current channel is synced
                $old_channel=DB::table('channel_synced')->where('user_id',$user_id)->where('channel_id',$channel_data->channel_id)->where('synced',1)->first();
                $channel_synced=null;

                if($old_channel)
                {
                    //means have channel
                    return $this->processResponse('Channel Synced',$channel_synced,'success','Channel already synced');
                }
                else
                {
                    //check if this user already exist or not
                    // $old_user=DB::table('channel_synced')->where('user_id',$user_id)->first();
                    $old_shop=DB::table('shops')->where('owner_id',$user_id)->first();
                    if(!$old_shop)
                    {
                        // $url="http://zcommerce.online/api/shop_details?connection_id=WtYNjcTc0RDPjLYmcQvJMzTcLi9Ek3&auth_code=77Wuoqeihd97Onyufncf";
                        $url='http://zcommerce.online/api/shop_details?connection_id='.$channel_data->connection_id.'&auth_code='.$channel_data->auth_code;
                        $result=$this->getdata($url);
                        $data = json_decode($result,true);
                        
                        $image_data=$data['shopdetails']['imagedata'];
                        
                        //create new shop for this user
                        $user_data=DB::table('vendors')->where('id',$user_id)->first();
                        $user_slug=str_replace(" ","-",$user_data->name);
                        $new_shop=DB::table('shops')->insertGetId(['owner_id' => $user_id, 'name' => $data['shopdetails']['name'], 'slug' => $data['shopdetails']['slug'], 'email' => $user_data->email, 'lat' => $request->latitude, 'lng' => $request->longitude]);
                        $nw_shop_id=$new_shop;

                        
                        foreach($image_data as $images_d)
                        {
                            $img_path=$images_d['path'];
                            $img_name=$images_d['name'];
                            $extention=$images_d['extension'];
                            $img_size=$images_d['size'];
                            $order=$images_d['order'];
                            $featured=$images_d['featured'];
                            
                            DB::table('images')->insert(['path' => $img_path, 'name' => $img_name, 'extension' => $extention, 'size' => $img_size, 'order' => $order, 'featured' => $featured, 'imageable_id' => $new_shop, 'imageable_type' => 'App\Shop']);
                        
                        }
                    }

                    //create new channel
                    $channel_synced=DB::table('channel_synced')->insert(['channel_id' => $channel_data->channel_id, 'channel_auth_code' => $channel_data->auth_code, 'channel_connection_id' => $channel_data->connection_id, 'user_id' => $user_id, 'synced' => 1]);
                    return $this->processResponse('Channel Synced',$channel_data->channel_id,'success','Synced successfully');
                }
                
            }
            else
            {
                return $this->processResponse('Connection',null,'erroe','Connection not established');
            }
        }
        
        
        public function showmychannels(Request $request)
        {
            if($request->connection_id==null )
            {
                return $this->processResponse('Connection',null,'erroe','missing parameter(connection_id)');
            }
            
            $key = $request->connection_id;
           
            $user_id=$this->validate_connection_id($key);
            // dd($user_id);
            if($user_id)
            {
                if($request->channel_id==null)
                $mychannels=DB::table('channels')->get();
                else
                $mychannels=DB::table('channels')->where('id',$request->channel_id)->get();
                
                $channels=array();
                foreach($mychannels as $ch)
                {
                    $ch->synced=0;
                    $ch->channel_connection_id=null;
                    $ch->channel_auth_code=null;
                    
                    $temp=DB::table('channel_synced')->where('channel_id',$ch->id)->where('user_id',$user_id)->where('synced',1)->first();
                   
                    if($temp)
                    {
                        $ch->synced=1;
                        $ch->channel_connection_id=$temp->channel_connection_id;
                        $ch->channel_auth_code=$temp->channel_auth_code;
                    }
                    array_push($channels,$ch);
                }
                
                
                if(count($channels)>0)
                    return $this->processResponse('MyChannels',$channels,'success','Current User Channels');
                else
                    return $this->processResponse('MyChannels',null,'success','no channel synced');
            }
            else
            {
                return $this->processResponse('Connection',null,'erroe','Connection not established');
            }
        }
       
        public function uploadImage($image)
        {
            $random_name=time(); //random name
            $extension=$image->getClientOriginalExtension();
            $filename=$random_name.'.'.$extension;
            Photo::make($image)->save(public_path('image/'. $filename));
            return $filename;
        }
        
    }
