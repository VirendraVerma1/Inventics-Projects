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
        dd($explode_id);
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
        if($request->connection_id==null || $request->auth_code==null || $request->room_id==null|| $request->type==null)
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
                //check if user and webinar already exist or not
                $old_like_dislike=LikeDislike::where('user_id',$user_id)->where('webinar_id',$webinar->id)->first();
                if(!$old_like_dislike)
                {
                    $like_dislike=new LikeDislike;
                    $like_dislike->user_id=$user_id;
                    $like_dislike->webinar_id=$webinar->id;
                    $like_dislike->type=$request->type;
                    $like_dislike->save();
                }
                else
                {
                    //means exist if have same type then show this msg else change the type
                    if($old_like_dislike->type==$request->type)
                    return $this->processResponse('LikeDislike',null,'success','Already added this type');
                    else
                    {
                        //update the type
                        $old_like_dislike->user_id=$user_id;
                        $old_like_dislike->webinar_id=$webinar->id;
                        $old_like_dislike->type=$request->type;
                        $old_like_dislike->save();
                        return $this->processResponse('LikeDislike',$old_like_dislike,'success','Changed type successfully');
                    }
                }
            }
            else
            {
                $like_dislike=null;
            }
               
            return $this->processResponse('LikeDislike',$like_dislike,'success','Like Dislike added Successfully');
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


}
