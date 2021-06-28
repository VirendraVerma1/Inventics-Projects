<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use DB;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function giveMeUnRepeated($inventory) 
    {
        // NOTE:
        // passing array must have main_id parameter else it will not work
        // or replace main_id from your id 
        $new_inventory=array();
        $unique_id=array();
        foreach($inventory as $inv)
        {
            $flag=false;
            foreach($unique_id as $id)
            {
                if($inv->id==$id)
                {
                    $flag=true;
                    break;
                }
            }
            if($flag==false)
            {
                array_push($new_inventory,$inv);
                array_push($unique_id,$inv->id);
            }
        }
        return $new_inventory;
    }

    public function getByDistance($lat, $lng, $distance)
    {
        $results = DB::select(DB::raw('SELECT *, ( 3959 * acos( cos( radians(' . $lat . ') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(' . $lng . ') ) + sin( radians(' . $lat .') ) * sin( radians(lat) ) ) ) AS distance FROM shops HAVING distance < ' . $distance . ' ORDER BY distance') );

        return $results;
    }

    public function getdata($url,$args=false) 
    { 
        global $session; 
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL,$url); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("REMOTE_ADDR: ".$this->fakeip(),"X-Client-IP: ".$this->fakeip(),"Client-IP: ".$this->fakeip(),"HTTP_X_FORWARDED_FOR: ".$this->fakeip(),"X-Forwarded-For: ".$this->fakeip())); 
        if($args) 
        { 
            curl_setopt($ch, CURLOPT_POST, 1); 
            curl_setopt($ch, CURLOPT_POSTFIELDS,$args); 
        } 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        //curl_setopt($ch, CURLOPT_PROXY, "127.0.0.1:8888"); 
        $result = curl_exec ($ch); 
        curl_close ($ch); 
        return $result; 
    } 

    public function fakeip()  
    {  
        return long2ip( mt_rand(0, 65537) * mt_rand(0, 65535) );   
    } 

    
}
