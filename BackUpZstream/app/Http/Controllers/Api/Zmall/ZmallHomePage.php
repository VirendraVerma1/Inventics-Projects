<?php

namespace App\Http\Controllers\Api\Zmall;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;
use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Api\Traits\ProcessResponseTrait;
use App\Http\Controllers\Api\Traits\ValidationTrait;

class ZmallHomePage extends Controller
{
    //
    use ProcessResponseTrait,ValidationTrait;

    
    #region zmall home page

    public function get_all_homepage_data(Request $request)
        {
            if($request->connection_id==null  )
            {
                return $this->processResponse('Connection',null,'erroe','missing parameter(connection_id)');
            }
            
            $key = $request->connection_id;
            
            $user_id=$this->validate_connection_id($key);
            // dd($user_id);
            if($user_id)
            {
                
                //for all channels
                $mychannels=DB::table('channels')->get();
               

                $slider=array();
                //get the banner from ethenic
                $url=$this->EthenicBazaar_base_url."api/home";
                $data = [
                    'connection_id' => 'G0emmL2jvdAzPGkzBPiKqjkzo'
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
                    $temp= $response->Home_page->sliders;
                    foreach($temp as $t)
                    {
                        array_push($slider,$t->image->path);
                    }
                }

                //get the banner from zshop
                $url=$this->ZShop_base_url."api/home";
                $data = [
                    'connection_id' => 'yihTAAURuUrkCoDxDFdfiwVnkF9Dqp',
                    'auth_code' => 'nDlSDhHiPILAlFftbrdX'
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
                    $temp= $response->shop_data->banner_image;
                    foreach($temp as $t)
                    {
                        array_push($slider,$this->ZShop_base_url."image/".$t->image);
                    }
                }

                $dashbord=[
                    'Channels'=>$mychannels,
                    'Slider'=>$slider
                ];
                return $this->processResponse('Home_Page',$dashbord,'success','zmall dashbord');
            }
            else
            {
                return $this->processResponse('Connection',null,'erroe','Connection not established');
            }
        }

   #endregion

}
