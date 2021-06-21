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
        
        public function createmyChannel(Request $request)
        {
            if($request->connection_id==null || $request->auth_code==null ||$request->channel_data==null)
            {
                return $this->processResponse('Connection',null,'erroe','missing parameter(connection_id,auth_code,channel_data)');
            }
            
            $channel_data=json_decode($request->channel_data);
            
            $key = $request->connection_id;
            $auth=$request->auth_code;
            
            $user_id=$this->validate_connection_auth($key,$auth);
            if($user_id)
            {
                //check if current channel is synced
                $old_channel=DB::table('channel_synced')->where('user_id',$user_id)->where('channel_id',$channel_data->channel_id)->first();
                $channel_synced=null;
                if($old_channel)
                {
                    //means have channel
                    return $this->processResponse('Channel Synced',$channel_synced,'success','Channel already synced');
                }
                else
                {
                    //create new channel
                    $channel_synced=DB::table('channel_synced')->insert(['channel_id' => $channel_data->channel_id, 'auth_code' => $channel_data->auth_code, 'connection_id' => $channel_data->connection_id, 'user_id' => $user_id, 'synced' => 1]);
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
            if($request->connection_id==null || $request->auth_code==null )
            {
                return $this->processResponse('Connection',null,'erroe','missing parameter(connection_id,auth_code)');
            }
            
            $key = $request->connection_id;
            $auth=$request->auth_code;
            $user_id=$this->validate_connection_auth($key,$auth);
            // dd($user_id);
            if($user_id)
            {
                
                $mychannels=DB::table('channels')->get();
                
                $channels=array();
                foreach($mychannels as $ch)
                {
                    $ch->synced=0;
                    $ch->channel_connection_id=null;
                    $ch->channel_auth_code=null;
                    $temp=DB::table('channel_synced')->where('channel_id',$ch->id)->where('user_id',$user_id)->first();
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
        
        public function getSynced()
        {
            
        }
        
        
    }
