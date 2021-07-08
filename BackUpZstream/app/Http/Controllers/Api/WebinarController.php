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

class WebinarController extends Controller
{
    use ProcessResponseTrait,ValidationTrait;

    public function test()
    {
        $str="[19324,21232]";
        $explode_id = json_decode($str);

        $sum=1000;
        $count=0;
        for($i=1;$i<10000;$i++)
        {
            $sum =$sum-$i;
            $count++;
            if($sum<0)
            $i=99999;
        }
        dd($count);
        //dd($explode_id);
    }

    #region webinar crud

    public function showmywebinar(Request $request)
    {
        if($request->connection_id==null || $request->auth_code==null )
        {
            return $this->processResponse('Connection',null,'erroe','missing parameter(connection_id,auth_code)');
        }
        $key = $request->connection_id;
        $auth=$request->auth_code;
        $user_id=$this->validate_connection_auth($key,$auth);
       
        if($user_id)
        {
            //get all the webinar related to the user
            $oldwebinar=DB::table('webinar')->where('user_id',$user_id)->get();
            $newwebinar=array();
            foreach($oldwebinar as $webinar)
            {
                $webinar->inventories_id=json_decode($webinar->inventories_id);
                $webinar->user_schedule=json_decode($webinar->user_schedule);
                array_push($newwebinar,$webinar);
            }
            return $this->processResponse('Webinar',$newwebinar,'success','webinar details fetched successfully');
        }
        else
        {
            return $this->processResponse('Connection',null,'erroe','Connection not established');
        }

    }

    public function createnewWebinar(Request $request)
    {
        if($request->connection_id==null || $request->auth_code==null || $request->channel_id==null ||$request->inventories_id==null||$request->topic==null||$request->description==null||$request->webinar_date==null||$request->webinar_from==null||$request->webinar_to==null)
        {
            return $this->processResponse('Connection',null,'erroe','missing parameter(connection_id,auth_code,channel_id,topic,description,webinar_time)');
        }
        
        $key = $request->connection_id;
        $auth=$request->auth_code;
        $user_id=$this->validate_connection_auth($key,$auth);
        if($user_id)
        {
            //save to the webinar
            $webinar= new Webinar;
            $webinar->channel_id=$request->channel_id;
            $webinar->user_id=$user_id;
            $webinar->inventories_id=$request->inventories_id;
            $webinar->status=1;
            $webinar->topic=$request->topic;
            $webinar->description=$request->description;
            $webinar->webinar_date=$request->webinar_date;//date
            $webinar->webinar_from=$request->webinar_from;//time
            $webinar->webinar_to=$request->webinar_to;//time
            $webinar->room_id=time();
            $webinar->save();
            $webinar->inventories_id=json_decode($webinar->inventories_id);
            return $this->processResponse('WebinarData',$webinar,'success','Webinar Created Successfully');
        }
        else
        {
            return $this->processResponse('Connection',null,'erroe','Connection not established');
        }
    }

    public function updateWebinar(Request $request)
    {
        if($request->connection_id==null || $request->auth_code==null || $request->room_id==null ||$request->inventories_id==null||$request->topic==null||$request->description==null||$request->webinar_date==null||$request->webinar_from==null||$request->webinar_to==null)
        {
            return $this->processResponse('Connection',null,'erroe','missing parameter(connection_id,auth_code,room_id,topic,description,webinar_date,webinar_from,webinar_to)');
        }

        $key = $request->connection_id;
        $auth=$request->auth_code;
        $user_id=$this->validate_connection_auth($key,$auth);
        if($user_id)
        {
            //save to the webinar
            $webinar= Webinar::where('user_id',$user_id)->where('room_id',$request->room_id)->first();
            $webinar->status=1;
            $webinar->inventories_id=$request->inventories_id;
            $webinar->topic=$request->topic;
            $webinar->description=$request->description;
            $webinar->webinar_date=$request->webinar_date;//date
            $webinar->webinar_from=$request->webinar_from;//time
            $webinar->webinar_to=$request->webinar_to;//time
            $webinar->save();
            $webinar->inventories_id=json_decode($webinar->inventories_id);
            return $this->processResponse('WebinarData',$webinar,'success','Webinar updated Successfully');
        }
        else
        {
            return $this->processResponse('Connection',null,'erroe','Connection not established');
        }
    }

    public function deleteWebinar(Request $request)
    {
        if($request->connection_id==null || $request->auth_code==null || $request->room_id==null)
        {
            return $this->processResponse('Connection',null,'erroe','missing parameter(connection_id,auth_code,room_id)');
        }

        $key = $request->connection_id;
        $auth=$request->auth_code;
        $user_id=$this->validate_connection_auth($key,$auth);
        if($user_id)
        {
            $webinar= Webinar::where('user_id',$user_id)->where('room_id',$request->room_id)->first();
            $webinar->delete();
            return $this->processResponse('Webinar',null,'success','Webinar deleted Successfully');
        }
        else
        {
            return $this->processResponse('Connection',null,'erroe','Connection not established');
        }
    }

    #endregion

    #region request for book an appointment

    public function show_all_booked_appointment(Request $request)
    {
        if($request->connection_id==null || $request->auth_code==null )
        {
            return $this->processResponse('Connection',null,'erroe','missing parameter(connection_id,auth_code)');
        }
        $key = $request->connection_id;
        $auth=$request->auth_code;
        $user_id=$this->validate_connection_auth($key,$auth);
       
        if($user_id)
        {
            $appointment=DB::table('book_appointment')->get();

            return $this->processResponse('BookAppointment',$appointment,'success','all apointment fetched successfully');
        }
        else
        {
            return $this->processResponse('Connection',null,'erroe','Connection not established');
        }
    }

    public function book_an_appointment(Request $request)
    {
        if($request->connection_id==null || $request->auth_code==null || $request->date==null|| $request->time==null|| $request->category==null|| $request->room_id==null|| $request->msg==null)
        {
            return $this->processResponse('Connection',null,'erroe','missing parameter(connection_id,auth_code,date,time,category,room_id,msg)');
        }
        $key = $request->connection_id;
        $auth=$request->auth_code;
        $user_id=$this->validate_connection_auth($key,$auth);
       
        if($user_id)
        {
            DB::table('book_appointment')->insert(['user_id' => $user_id, 'date' => $request->date, 'time' => $request->time, 'category' => $request->category, 'room_id' => $request->room_id, 'msg' => $request->msg]);
              
            return $this->processResponse('BookAppointment',null,'success','appointment done successfully');
        }
        else
        {
            return $this->processResponse('Connection',null,'erroe','Connection not established');
        }
    }

    #endregion

    #region webinar schedules

    public function schedule_my_webinar(Request $request)
    {
        if($request->connection_id==null || $request->auth_code==null || $request->room_id==null|| $request->schedule_user_id==null)
        {
            return $this->processResponse('Connection',null,'erroe','missing parameter(connection_id,auth_code,room_id,schedule_user_id)');
        }
        $key = $request->connection_id;
        $auth=$request->auth_code;
        $user_id=$this->validate_connection_auth($key,$auth);
       
        if($user_id)
        {
            $webinar=Webinar::where('user_id',$user_id)->where('room_id',$request->room_id)->first();
            $user_ids=$webinar->user_schedule;
            $useridarray=array();
            if($user_ids!=null)
            {
                $useridarray=json_decode($user_ids);
                array_push($useridarray,(int)$request->schedule_user_id);
            }
            else
            {
                array_push($useridarray,(int)$request->schedule_user_id);
            }
            $webinar->user_schedule=$useridarray;
            $webinar->save();

            return $this->processResponse('Schedule',$useridarray,'success','scheduled done successfully');
        }
        else
        {
            return $this->processResponse('Connection',null,'erroe','Connection not established');
        }
    }

    #endregion

    #region comments

    public function addComment(Request $request)
    {
        if($request->connection_id==null || $request->auth_code==null || $request->room_id==null|| $request->comment==null)
        {
            return $this->processResponse('Connection',null,'erroe','missing parameter(connection_id,auth_code,room_id,comment)');
        }

        $key = $request->connection_id;
        $auth=$request->auth_code;
        $user_id=$this->validate_connection_auth($key,$auth);
        if($user_id)
        {
            $webinar= Webinar::where('user_id',$user_id)->where('room_id',$request->room_id)->first();
            
            if($webinar)
            {
                $comment=new Comment;
                $comment->user_id=$user_id;
                $comment->webinar_id=$webinar->id;
                $comment->comment=$request->comment;
                $comment->save();
                return $this->processResponse('Comment',$comment,'success','Comment added Successfully');
            }
            else
            {
                $comment=null;
                return $this->processResponse('Comment',$comment,'success','Room id doesnot match ');
            }
               
            
        }
        else
        {
            return $this->processResponse('Connection',null,'erroe','Connection not established');
        }
    }

    public function getAllWebinarComments(Request $request)
    {
        if($request->connection_id==null || $request->auth_code==null || $request->room_id==null)
        {
            return $this->processResponse('Connection',null,'erroe','missing parameter(connection_id,auth_code,room_id)');
        }

        $key = $request->connection_id;
        $auth=$request->auth_code;
        $user_id=$this->validate_connection_auth($key,$auth);
        if($user_id)
        {
            $webinarComments= DB::table('webinar')
            ->join('comments', 'webinar.id', '=', 'comments.webinar_id')
            ->where('webinar.room_id',$request->room_id)
            ->select('comments.*')
            ->get();
           
            return $this->processResponse('Comment',$webinarComments,'success','All Webinar Comments');
        }
        else
        {
            return $this->processResponse('Connection',null,'erroe','Connection not established');
        }
    }

    #endregion

    #region like dislike

    public function addlike_dislike(Request $request)
    {
        if($request->connection_id==null || $request->auth_code==null || $request->room_id==null|| $request->inventory_id==null|| $request->type==null)
        {
            return $this->processResponse('Connection',null,'erroe','missing parameter(connection_id,auth_code,room_id,inventory_id,type)');
        }

        $key = $request->connection_id;
        $auth=$request->auth_code;
        $user_id=$this->validate_connection_auth($key,$auth);
        if($user_id)
        {
            $webinar= Webinar::where('user_id',$user_id)->where('room_id',$request->room_id)->first();
            
            if($webinar)
            {
                $like_dislike=new LikeDislike;
                $like_dislike->user_id=$user_id;
                $like_dislike->webinar_id=$webinar->id;
                $like_dislike->inventory_id=$request->inventory_id;
                $like_dislike->type=$request->type;
                $like_dislike->save();
               
            }
            else
            {
                $like_dislike=null;
                return $this->processResponse('LikeDislike',null,'success','Dont have webinar');
            }
               
            return $this->processResponse('LikeDislike',$like_dislike,'success','Like Dislike added Successfully');
        }
        else
        {
            return $this->processResponse('Connection',null,'erroe','Connection not established');
        }
    }

    public function get_like_dislike_inventory(Request $request)
    {
        if($request->connection_id==null || $request->auth_code==null || $request->room_id==null|| $request->inventory_id==null)
        {
            return $this->processResponse('Connection',null,'erroe','missing parameter(connection_id,auth_code,room_id,inventory_id)');
        }

        $key = $request->connection_id;
        $auth=$request->auth_code;
        $user_id=$this->validate_connection_auth($key,$auth);
        if($user_id)
        {
            $old_like_dislike= DB::table('webinar')
            ->join('like_dislike', 'webinar.id', '=', 'like_dislike.webinar_id')
            ->where('webinar.room_id',$request->room_id)
            ->where('like_dislike.inventory_id',$request->inventory_id)
            ->select('like_dislike.*')
            ->get();

            $total_likes=0;
            $total_dislike=0;
            
            foreach($old_like_dislike as $old)
            {
                
                if($old->type=="like")
                $total_likes++;
                if($old->type=="dislike")
                $total_dislike++;
            }

            $total_calculation=[
                'total_likes'=>$total_likes,
                'total_dislike'=>$total_dislike
            ];

            
            return $this->processResponse('LikeDislike',$total_calculation,'success','Count of like and dislike');
        }
        else
        {
            return $this->processResponse('Connection',null,'erroe','Connection not established');
        }
    }

    public function get_like_dislike_webinar(Request $request)
    {
        if($request->connection_id==null || $request->auth_code==null || $request->room_id==null)
        {
            return $this->processResponse('Connection',null,'erroe','missing parameter(connection_id,auth_code,room_id)');
        }

        $key = $request->connection_id;
        $auth=$request->auth_code;
        $user_id=$this->validate_connection_auth($key,$auth);
        if($user_id)
        {
            $old_like_dislike= DB::table('webinar')
            ->join('like_dislike', 'webinar.id', '=', 'like_dislike.webinar_id')
            ->where('webinar.room_id',$request->room_id)
            ->select('like_dislike.*')
            ->get();

            $total_likes=0;
            $total_dislike=0;
            
            foreach($old_like_dislike as $old)
            {
                
                if($old->type=="like")
                $total_likes++;
                if($old->type=="dislike")
                $total_dislike++;
            }

            $total_calculation=[
                'total_likes'=>$total_likes,
                'total_dislike'=>$total_dislike
            ];

            
            return $this->processResponse('LikeDislike',$total_calculation,'success','Count of like and dislike');
        }
        else
        {
            return $this->processResponse('Connection',null,'erroe','Connection not established');
        }
    }

    public function removelike_dislike(Request $request)
    {
        if($request->connection_id==null || $request->auth_code==null || $request->room_id==null)
        {
            return $this->processResponse('Connection',null,'erroe','missing parameter(connection_id,auth_code,room_id,type)');
        }

        $key = $request->connection_id;
        $auth=$request->auth_code;
        $user_id=$this->validate_connection_auth($key,$auth);
        if($user_id)
        {
            $webinar= Webinar::where('user_id',$user_id)->where('room_id',$request->room_id)->first();
            
            if($webinar)
            {
                $like_dislike=LikeDislike::where('user_id',$user_id)->where('webinar_id',$webinar->id)->first();
                $like_dislike->delete();
            }
            else
            {
                $like_dislike=null;
            }
               
            return $this->processResponse('LikeDislike',null,'success','Like Dislike deleted Successfully');
        }
        else
        {
            return $this->processResponse('Connection',null,'erroe','Connection not established');
        }
    }

    #endregion

    #region webinar dashbord

    public function webinar_dashbord(Request $request)
    {
        if($request->connection_id==null || $request->auth_code==null )
        {
            return $this->processResponse('Connection',null,'erroe','missing parameter(connection_id,auth_code)');
        }
        $key = $request->connection_id;
        $auth=$request->auth_code;
        $user_id=$this->validate_connection_auth($key,$auth);
       
        if($user_id)
        {
           //get all the webinars
           $webinar=DB::table('webinar')->get();
           $channel_data=DB::table('channels')
           ->join('channel_synced', 'channels.id', '=', 'channel_synced.channel_id')
           ->where('channel_synced.user_id',$user_id)->get();

           //get webinar counts
           $current_date = date('Y-m-d');
           $completed_webinar_count=0;
           $upcomming_webinar_count=0;
           $total_webinar_count=0;
           foreach($webinar as $web)
           {
                $subtract = strtotime($current_date) - strtotime($web->webinar_date);
                if($subtract>0)
                $completed_webinar_count++;
                else
                $upcomming_webinar_count++;
                
           }
           $total_webinar_count=$completed_webinar_count+$upcomming_webinar_count;
    
           //merge inventory
           $webinar=DB::table('webinar')->where('webinar.user_id',$user_id)
           ->join('channels', 'webinar.channel_id', '=', 'channels.id')
           ->join('channel_synced', 'channels.id', '=', 'channel_synced.channel_id')
           ->get();
           
           foreach($webinar as $web)
           {
                $webinar_ids=json_decode($web->inventories_id);
                $first_id=$webinar_ids[0];
                if($web->type==1)
                {
                    $url=$this->ZShop_base_url."api/inventory_details";
                    $data = [
                        'connection_id' => $web->channel_connection_id,
                        'auth_code' => $web->channel_auth_code,
                        'inventory_id' => $first_id
                    ];
                    $response=$this->get_responseDataFromURLPost($data,$url,true);

                    if($response->status=="Connection Failure")
                    $web->inventory_data=[];
                    elseif($response->status=="success")
                    $web->inventory_data=$response->inventory_detail;
                    else
                    $web->inventory_data=[];

                }else if($web->type==2)
                {
                    $url=$this->EthenicBazaar_base_url."api/listing/".$first_id;
                    $data = [
                        'connection_id' => $web->channel_connection_id
                    ];
                    $response=$this->get_responseDataFromURLPost($data,$url,true);

                    if($response==null)
                    $web->inventory_data=[];
                    else if($response->data!=null)
                    {
                        if($response->data->has_offer==true)
                            {
                                $response->data->price=$response->data->offer_price;
                            }
                            unset($response->data->offer_price);
                        $temp= $response->data;
                    
                        $web->inventory_data=$temp->product->image;
                    }else
                    {
                        $web->inventory_data=[];
                    }

                }else{
                    $web->inventory_data=[];
                }
           }
           $webinar=$this->giveMeUnRepeated($webinar);

           // ------- webinar graph
           $webinar_channel_id=array();
           $webinar_channel_counter=array();
           $channels=DB::table('channels')->get();
           $webinar_user=DB::table('webinar')->where('user_id',$user_id)->get();
           $new_channels=array();
           foreach($channels as $cl)
           {
               $counter=0;
               foreach($webinar_user as $web)
               {
                   if($web->channel_id==$cl->id)
                   {
                        $counter++;
                   }
               }
               $cl->webinar_count=$counter;
               if($counter>0)
               array_push($new_channels,$cl);
           }

           $webinar_dashbord=[
               'upcomming_webinar_count'=>$upcomming_webinar_count,
               'completed_webinar_count'=>$completed_webinar_count,
               'total_webinar_count'=>$total_webinar_count,
               'webinars'=>$webinar,
               'webinar_graph'=>$new_channels
           ];

            return $this->processResponse('Dashboard',$webinar_dashbord,'success','dashboard details fetched successfully');
        }
        else
        {
            return $this->processResponse('Connection',null,'erroe','Connection not established');
        }
    }

    #endregion

}
