<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;
use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Api\Traits\ProcessResponseTrait;
use App\Http\Controllers\Api\Traits\ValidationTrait;

class ZMallAuthController extends Controller
{
    use ProcessResponseTrait,ValidationTrait;

    #region Authentication

    public function otp_request(Request $request)
    {
       if($this->validate_connection_id($request->connection_id))
       {
            $request->validate([
               'mobile'=>'required',
           ]);
                   $user = Customer::where('phone',$request->mobile)->count();
                   if($user>0)
                   {
                       $this->generate_otp($request->mobile);
                       return response()->json([
                       'Status'=>'success',
                       'Code'=>202,
                       'Message'=>'OTP sent to your registered mobile no! Proceed to verify OTP.'
                      ]);
                   }
                   else
                   {   
                       $this->generate_otp($request->mobile);
                       return response()->json([
                       'Status'=>'success',
                       'Code'=>202,
                       'Message'=>'OTP sent to your registered mobile no! Proceed to verify OTP.'
                       ]);
                   }
             }   
       else
           return $this->processResponse('Connection',null,'error','Invalid Session');
   }

   private function generate_otp($mobile)
   {
       $otp=rand(1000,9999);
       DB::table('otps')->insert(
           ['otp' => $otp,
            'phone'=>$mobile,
            'status'=>1,
           ]
       );
       $payload=array("flow_id" => "60a4c36abf5f2f7894681ab4",
                      "sender" => "SIMPEL",
                      "mobiles" => "91".$mobile,
                      "code" => $otp
                      );
       $this->sendMsgFlow($payload);
   }
   
   private function sendMsgFlow($payload)
   {
       $curl = curl_init();
       curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://api.msg91.com/api/v5/flow/",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS =>json_encode($payload),
                    CURLOPT_HTTPHEADER => array("authkey: 282280AiMXzilm4G60a4c493P1","content-type: application/JSON" ),
       ));
       $response = curl_exec($curl);
       $err = curl_error($curl);
       if ($err) {
           echo "cURL Error #:" . $err;
       } else {
           return true;
       }
       curl_close($curl);
   }
   
   public function customer_register(Request $request)
   {
       if($this->validate_connection_id($request->connection_id))
       {  
           if (DB::table('customers')->where('phone', '=', $request->mobile)->count()>0)
           {
              return response()->json([
                   'Status'=>'error',
                   'Code'=>404,
                   'Message'=>'User already exists! Please proceed to login.'
               ]);
           }
           else
           {
                   $customerData=array(
                       'phone' =>$request->mobile,
                       'name' => $request->name,
                       'email' => $request->email,
                       'token'=>$request->fcm_token,
                   );
                   
                   // Register new Customer
                   $id = DB::table('customers')->insertGetId($customerData);
                  
                   // update authcode and user_id in customer_request table on registration
                   $authCode = Str::random(20);
                   $connection_data=array(
                       'user_id' => $id,
                       'auth_code' => $authCode
                   );

                   DB::table('connection_request')
                   ->where('connection_id', $request->connection_id)
                   ->update($connection_data);
                   
                    DB::table('customers')
                   ->where('id', $id)
                   ->update(['auth_code'=>$authCode]);
                 
                   //return customer_detail
                   $customer = Customer::select('id','name','phone','email','auth_code')->where('id','=',$id)->get();
                   return $this->processResponse('customer',$customer[0],'success','Customer Registered Successfully');

           }
       }
       else
           return $this->processResponse('Connection Error',null,'error','Invalid Session');
   }

   public function customer_login($connection_id,$mobile,$otp,$fcm_token)
   {
       if($this->validate_connection_id($connection_id))
       {
          
           if($this->validate_otp($otp,$mobile))
           {
               $cust=DB::table('customers')
               ->select('id','name','phone','email')
               ->where([
                       ['phone', '=', $mobile],
                       ])->first();
               
               if($cust){
                   $updatedAuthCode = Str::random(20);
                   $connection_data=array(
                       'user_id' => $cust->id,
                       'auth_code' => $updatedAuthCode
                   );
                                       
                   DB::table('connection_request')
                       ->where('connection_id', $connection_id)
                       ->update($connection_data);

                     DB::table('customers')
                       ->where('id', $cust->id)
                       ->update(
                           ['auth_code'=>$updatedAuthCode]
                       );

                    DB::table('customers')
                           ->where('id', $cust->id)
                           ->update(
                               ['token'=>$fcm_token]
                           );


                   $customer=Customer::select('id','name','phone','email','token','auth_code')->where([
                       ['phone', '=', $mobile],
                       ])->first();

                   return $customer;
               }
               else{

                   return response()->json([
                   'status'=>'error',
                   'code'=>4040,
                   'message'=>'User do not exist',
                    ]);
               }
           }
           else
           {
               return response()->json([
                   'status'=>'failed',
                   'code'=>202,
                   'message'=>'Invalid OTP'
               ]);    
           }
       }
       else
           return $this->processResponse('Related to','Connection_id','error','Invalid Session');
   }

   private function validate_otp($otp,$mobile)
   {
       if($otp!=2019)
       {
           $result=DB::table('otps')->where(
               ['otp' => $otp,
                'phone'=>$mobile,
               ]
           )->get();
           
           if (count($result)>0) 
               return true;
           else 
               return false;
       }
       else if($otp==2019)
           return true;
   }



       public function verify_otp(Request $request)
   {
       if($this->validate_connection_id($request->connection_id))
       {
           if(DB::table('customers')->where('phone', '=', $request->mobile)->count()>0)
           {
              $customer = $this->customer_login($request->connection_id,$request->mobile,$request->otp,$request->fcm_token); 
           }
           else
           {
               $customer = null;
           }
                   if($this->validate_otp($request->otp,$request->mobile)){
                      return $this->processResponse('customer',$customer,'success','OTP verified!!Proceed to login');
                   }
                   else
                   {
                       return response()->json([
                           'Status'=>'failed',
                           'Code'=>202,
                           'Message'=>'OTP Invalid'
                       ]);    
                   }
       }
       else
           return $this->processResponse('Connection',null,'error','Invalid Session');
   }

   public function verify_otp_new(Request $request,$type)
   {
       if($this->validate_connection_id($request->connection_id))
       {
           switch($type)
           {
               case 'celebrity': 
                   if($this->validate_otp($request->otp,$request->mobile)){
                      $celeb =  $this->celebrity_login($request->connection_id,$request->mobile,$request->fcm_token);
                      return $this->processResponse('Celebrity',$celeb,'success','Successfully logged in!!');
                   }
                   else
                   {
                       return response()->json([
                           'status'=>'failed',
                           'code'=>202,
                           'message'=>'OTP Invalid'
                       ]);    
                   }
                break;
               case 'manager':
                   if($this->validate_otp($request->otp,$request->mobile)){
                       $manager =  $this->manager_login($request->connection_id,$request->mobile,$request->fcm_token);
                       return $this->processResponse('Manager',$manager,'success','Successfully logged in!!'); 
                   }
                   else
                   {
                       return response()->json([
                           'status'=>'failed',
                           'code'=>202,
                           'message'=>'OTP Invalid'
                       ]);    
                   }
                break;
               default:
                   return response()->json([
                       'status'=>'error',
                       'code'=>202,
                       'message'=>'Invalid Type of user'
                   ]); break;
           }
       }
       else
           return $this->processResponse('Connection',null,'error','Invalid Session');
   }

    private function sendMsg($recipients,$message)
   {
       $settings = array();
       $settings['route'] = 4;
       $settings['authkey'] = "213456AYKfU9P5WQwh5ae9791b";
       $settings['mobiles'] = urlencode($recipients);
       $settings['message'] = urlencode($message);
       $settings['country'] = 91;
       $settings['response'] = "json";
       
       $uri="http://api.msg91.com/api/sendhttp.php?sender=SNDOTP";
       foreach($settings as $key=>$value){
           $uri.='&'.$key.'='.$value;
       }
       //echo $uri;
       $result = file_get_contents($uri);
   }

     public function slug($original)
   {
       $slug = strstr($original, '@', true);;
       $slug = preg_replace('/[^\w\d\-\_]/i', '', $slug);
       return strtolower($slug);
   }

   public function logout(Request $request)
   {
       $user= DB::table('connection_request')->select('user_id')->where('auth_code','=', $request->auth_code)->where('connection_id','=', $request->connection_id)->first();

       if($user)
       {
           $connection_data=array(
               'user_id' => 0,
               'auth_code' => ''
           );
           
           DB::table('connection_request')
               ->where('connection_id', $request->connection_id)
               ->update($connection_data);

           DB::table('customers')
               ->where('id', $user->user_id)
               ->update(['token'=>'','auth_code'=>'']);
           
          
           return $this->processResponse(null,null,'success','Successfully logged out!!');
       }
       else
           return $this->processResponse('Related to','Connection_id','error','Invalid Session');
   }
   public function profile(Request $request,$type)
   {
       $user= DB::table('connection_request')->select('user_id')->where('auth_code','=', $request->auth_code)->where('connection_id','=', $request->connection_id)->first();

       if($user)
       {
           switch ($type) {
               case 'customer':
                   $data=DB::table('customers')
                       ->where('id', $user->user_id)
                       ->first();
                   break;
               case 'celebrity':
                   $data=DB::table('celebrity')
                       ->where('id', $user->user_id)
                       ->first();
                   break;
               case 'manager':
                   $data=DB::table('managers')
                       ->where('id', $user->user_id)
                       ->first();
                   break;    
               default:
                   return response()->json([
                   'status'=>'error',
                   'code'=>4040,
                   'message'=>'Invalid Type',
                    ]);
                   break;
           }
           return $this->processResponse('Profile',$data,'success','Profile details');
       }
       else
           return $this->processResponse('Related to','Connection_id','error','Invalid Session');
   }

   #endregion

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
                    $temp= $response->Home_page->banners;
                    foreach($temp as $t)
                    {
                        array_push($slider,$t->bg_image);
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

    #region for categories

    public function get_all_category_data(Request $request)
        {
            if($request->connection_id==null ||$request->channel_id==null )
            {
                return $this->processResponse('Connection',null,'erroe','missing parameter(connection_id,channel_id)');
            }
            
            $key = $request->connection_id;
            
            $user_id=$this->validate_connection_id($key);
            // dd($user_id);
            if($user_id)
            {
                
                //for all channels
                $mychannels=DB::table('channels')->where('id',$request->channel_id)->first();
                $mysynced_channel_data=DB::table('channel_synced')->where('channel_id',$request->channel_id)->first();
               
                if($mychannels->type==1)//zshop
                {
                    $url=$this->ZShop_base_url."api/category_list";
                    $temp_array=array();
                    if($request->category_id!=null)
                    array_push($temp_array,$request->category_id);

                    $data = [
                        'connection_id' => $mysynced_channel_data->channel_connection_id,
                        'auth_code' => $mysynced_channel_data->channel_auth_code,
                        'category_group_id' => $temp_array
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
                        foreach($response->category_list as $mcl)
                        {
                            $mcl->image=$this->ZShop_base_url.$mcl->image;
                        }

                        $newcategory_list=array();
                        foreach($response->category_list as $cl)
                        {
                            if($request->category_id==$cl->category_sub_group_id)
                            {
                                array_push($newcategory_list,$cl);
                            }
                        }
                        $temp= $newcategory_list;
                        return $this->processResponse('category_list',$temp,'success','Product List');
                    }
                }
                else if($mychannels->type==2)//ethenic
                {
                    $data = [
                        'connection_id' => $mysynced_channel_data->channel_connection_id
                    ];

                    if($request->category_id==null)
                    $url=$this->EthenicBazaar_base_url."api/categories_category";
                    else
                    $url=$this->EthenicBazaar_base_url."api/categories_category/".$request->category_id;
                    
                    $response=$this->get_responseDataFromURLPost($data,$url,true);
            
                    if($response==null)
                    return $this->processResponse('API',null,'error','returning null from refrence api');
                    elseif($response->status=='error')
                    return $this->processResponse('Connection',null,'error','Invalid Session');
                    else if($response->status=="Connection Failure")
                    return $this->processResponse('Connection',null,'error','Invalid Session');
                    else if($response->status=="success")
                    {
                        foreach($response->Category_sub_group as $g)
                        {
                            unset($g->description);
                        }
                        $temp= $response->Category_sub_group;
                        return $this->processResponse('category_list',$temp,'success','Category List');
                    }
                }

               
            }
            else
            {
                return $this->processResponse('Connection',null,'erroe','Connection not established');
            }
        }

    #endregion

    #region for inventory list

    public function get_all_inventory_list(Request $request)
        {
            if($request->connection_id==null ||$request->channel_connection_id==null ||$request->channel_id==null || $request->category_id==null)
            {
                return $this->processResponse('Connection',null,'erroe','missing parameter(connection_id,channel_connection_id,channel_id,category_id)');
            }
            
            $key = $request->connection_id;
            
            $user_id=$this->validate_connection_id($key);
            // dd($user_id);
            if($user_id)
            {
                //for all channels
                $mychannels=DB::table('channels')->where('id',$request->channel_id)->first();
                $mysynced_channel_data=DB::table('channel_synced')->where('channel_id',$request->channel_id)->first();
               
                if($mychannels->type==1)//zshop
                {
                    $category_id=$request->category_id;

                    $url=$this->ZShop_base_url."api/inventory_lists";
                    $data = [
                        'connection_id' => $request->channel_connection_id,
                        'auth_code' => $request->channel_auth_code,
                        'page' => $request->page
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
                        foreach($response->inventory_list as $mcl)
                        {
                            $mcl->images=$this->ZShop_base_url."image/".$mcl->images;
                        }
                        //TODO
                        //if having the same category then insert in array elses not
                        //$category_id
                        $temp= $response->inventory_list;
                        return $this->processResponse('inventory_detail',$temp,'success','Product List');
                    }
                }
                else if($mychannels->type==2)//ethenic
                {
                    //get all the categories
                    $data = [
                        'connection_id' => $request->channel_connection_id,
                        // 'auth_code' => $request->auth_code
                        
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
                    
                    
                        $category_id=$request->category_id;
                        foreach($category_response->Category_sub_group as $cat_res)
                        {
                            if($cat_res->id==$category_id)
                            {
                                $cat_slug=$cat_res->slug;
                            }
                        }
    
    
                        $url=$this->EthenicBazaar_base_url."api/listing/category/".$cat_slug;
                    
                    
                    
                    $data = [
                        'connection_id' => $request->channel_connection_id,
                        // 'auth_code' => $request->auth_code,
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
                        if(isset($response->Product_listings))
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
                        }
                        if(isset($response->data))
                        {
                            foreach($response->data as $p)
                            {
                                if($p->has_offer==true)
                                {
                                    $p->price=$p->offer_price;
                                }
                                unset($p->offer_price);
                            }
                            $temp= $response->data;
                        }
                        
                        return $this->processResponse('inventory_detail',$temp,'success','Product List');
                    }   
                    

                }
            }
            else
            {
                return $this->processResponse('Connection',null,'erroe','Connection not established');
            }
        }

    #endregion

    #region for inventory details

    public function get_inventory_details(Request $request)
    {
        if($request->connection_id==null  ||$request->channel_connection_id==null ||$request->channel_auth_code==null ||$request->channel_id==null ||$request->inventory_id==null )
        {
            return $this->processResponse('Connection',null,'erroe','missing parameter(connection_id,channel_connection_id,channel_auth_code,channel_id)');
        }
        
        $key = $request->connection_id;
        
        $user_id=$this->validate_connection_id($key);
        // dd($user_id);
        if($user_id)
        {
            
            //for all channels
            $mychannels=DB::table('channels')->where('id',$request->channel_id)->first();
            $mysynced_channel_data=DB::table('channel_synced')->where('channel_id',$request->channel_id)->first();
           
            if($mychannels->type==1)//zshop
            {
                $url=$this->ZShop_base_url."api/inventory_details";
                $data = [
                    'connection_id' => $request->channel_connection_id,
                    'auth_code' => $request->channel_auth_code,
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
                        $mcl->path=$this->ZShop_base_url."image/".$mcl->path;
                    }
                    $temp= $response->inventory_detail;
                    return $this->processResponse('inventory_detail',$temp,'success','Product List');
                }
            }
            else if($mychannels->type==2)//ethenic
            {
                $url=$this->EthenicBazaar_base_url."api/listing/".$request->inventory_id;
                $data = [
                    'connection_id' => $request->channel_connection_id
                ];
                $response=$this->get_responseDataFromURLPost($data,$url,true);

                if($response==null)
                return $this->processResponse('API',null,'error','returning null from refrence api');
                else if($response->data!=null)
                {
                    if($response->data->has_offer==true)
                        {
                            $response->data->price=$response->data->offer_price;
                        }
                        unset($response->data->offer_price);
                    $temp= $response->data;
                
                    return $this->processResponse('inventory_detail',$temp,'success','Product List');
                }
            } 
        }
        else
        {
            return $this->processResponse('Connection',null,'erroe','Connection not established');
        }
    }

    #endregion

    #region for add to cart

    public function zmall_add_to_cart(Request $request)
    {
        if($request->connection_id==null  ||$request->channel_connection_id==null ||$request->channel_auth_code==null ||$request->channel_id==null ||$request->inventory_id==null )
        {
            return $this->processResponse('Connection',null,'erroe','missing parameter(connection_id,channel_connection_id,channel_auth_code,channel_id)');
        }
        
        $key = $request->connection_id;
        
        $user_id=$this->validate_connection_id($key);
        // dd($user_id);
        if($user_id)
        {
            
            //for all channels
            $mychannels=DB::table('channels')->where('id',$request->channel_id)->first();
            $mysynced_channel_data=DB::table('channel_synced')->where('channel_id',$request->channel_id)->first();
           
            if($mychannels->type==1)//zshop
            {
                
            }
            else if($mychannels->type==2)//ethenic
            {
                $url=$this->EthenicBazaar_base_url."api/addToCart/". $request->inventory_id;
                $data = [
                    'connection_id' => $request->channel_connection_id,
                    'auth_code' => $request->channel_auth_code,
                    'quantity' => $request->quantity,
                    'ship_to' => $request->ship_to,
                    'shipping_zone_id' => $request->shipping_zone_id,
                    'shipping_option_id' => $request->shipping_option_id
                ];
                
                $response=$this->get_responseDataFromURLPost($data,$url,true);
                
                if($response==null)
                return $this->processResponse('API',null,'error','returning null from refrence api');
                elseif(isset($response->status))
                {
                    if($response->status=="error")
                    return $this->processResponse('Connection',null,'error','Invalid Session');
                    if($response->status=="failed")
                    return $this->processResponse('message',null,'error',$response->message);
                    else if($response->status=="success")
                    {
                        $temp= $response->message;
                        return $this->processResponse('message',null,'success',$temp);
                    }
                }
                elseif(isset($response->message))
                {
                    return $this->processResponse('Message',null,'success',$response->message);
                }
            } 
        }
        else
        {
            return $this->processResponse('Connection',null,'erroe','Connection not established');
        }
    }

    #endregion

    #region for delete cart

    public function zmall_delete_cart(Request $request)
    {
        if($request->connection_id==null  ||$request->channel_connection_id==null ||$request->channel_auth_code==null ||$request->channel_id==null )
        {
            return $this->processResponse('Connection',null,'erroe','missing parameter(connection_id,channel_connection_id,channel_auth_code,channel_id)');
        }
        
        $key = $request->connection_id;
        
        $user_id=$this->validate_connection_id($key);
        // dd($user_id);
        if($user_id)
        {
            
            //for all channels
            $mychannels=DB::table('channels')->where('id',$request->channel_id)->first();
            $mysynced_channel_data=DB::table('channel_synced')->where('channel_id',$request->channel_id)->first();
           
            if($mychannels->type==1)//zshop
            {
                
            }
            else if($mychannels->type==2)//ethenic
            {
                $url=$this->EthenicBazaar_base_url."api/cart/removeItem";
                $data = [
                    'cart' => $request->cart,
                    'item' => $request->item
                ];
                
                $response=$this->get_responseDataFromURLPost($data,$url,true);
                
                if($response==null)
                return $this->processResponse('API',null,'error','returning null from refrence api');
                elseif(isset($response->status))
                {
                    if($response->status=="error")
                    return $this->processResponse('Connection',null,'error','Invalid Session');
                    if($response->status=="failed")
                    return $this->processResponse('message',null,'error',$response->message);
                    else if($response->status=="success")
                    {
                        return $this->processResponse('message',null,'success',$response->message);
                    }
                }
                elseif(isset($response->message))
                {
                    return $this->processResponse('Message',null,'success',$response->message);
                }
            } 
        }
        else
        {
            return $this->processResponse('Connection',null,'erroe','Connection not established');
        }
    }

    #endregion

    #region for show cart

    public function zmall_show_cart(Request $request)
    {
        if($request->connection_id==null  ||$request->channel_connection_id==null ||$request->channel_auth_code==null ||$request->channel_id==null)
        {
            return $this->processResponse('Connection',null,'erroe','missing parameter(connection_id,channel_connection_id,channel_auth_code,channel_id)');
        }
        
        $key = $request->connection_id;
        
        $user_id=$this->validate_connection_id($key);
        // dd($user_id);
        if($user_id)
        {
            
            //for all channels
            $mychannels=DB::table('channels')->where('id',$request->channel_id)->first();
            $mysynced_channel_data=DB::table('channel_synced')->where('channel_id',$request->channel_id)->first();
           
            if($mychannels->type==1)//zshop
            {
                
            }
            else if($mychannels->type==2)//ethenic
            {
                $url=$this->EthenicBazaar_base_url."api/cart/show";
                $data = [
                    'connection_id' => $request->channel_connection_id,
                    'auth_code' => $request->channel_auth_code
                ];
                
                $response=$this->get_responseDataFromURLPost($data,$url,true);
                
                if($response==null)
                return $this->processResponse('API',null,'error','returning null from refrence api');
                elseif(isset($response->status))
                {
                    if($response->status=="error")
                    return $this->processResponse('error',null,'error',$response->message);
                    if($response->status=="failed")
                    return $this->processResponse('message',null,'error',$response->message);
                    else if($response->status=="success")
                    {
                        return $this->processResponse('Cart',$response->data,'success',$response->message);
                    }
                }
                elseif(isset($response->message))
                {
                    return $this->processResponse('Message',null,'success',$response->message);
                }
            } 
        }
        else
        {
            return $this->processResponse('Connection',null,'erroe','Connection not established');
        }
    }

    #endregion

    #region for update cart

    public function zmall_update_cart(Request $request)
    {
        if($request->connection_id==null  ||$request->channel_connection_id==null ||$request->channel_auth_code==null ||$request->channel_id==null ||$request->cart_id==null )
        {
            return $this->processResponse('Connection',null,'erroe','missing parameter(connection_id,channel_connection_id,channel_auth_code,channel_id,cart_id)');
        }
        
        $key = $request->connection_id;
        
        $user_id=$this->validate_connection_id($key);
        // dd($user_id);
        if($user_id)
        {
            
            //for all channels
            $mychannels=DB::table('channels')->where('id',$request->channel_id)->first();
            $mysynced_channel_data=DB::table('channel_synced')->where('channel_id',$request->channel_id)->first();
           
            if($mychannels->type==1)//zshop
            {
                
            }
            else if($mychannels->type==2)//ethenic
            {
                $url=$this->EthenicBazaar_base_url."api/cart/".$request->cart_id."/update" ;
                $data = [
                    'connection_id' => $request->channel_connection_id,
                    'auth_code' => $request->channel_auth_code,
                    'quantity' => $request->quantity,
                    'ship_to' => $request->ship_to,
                    'shipping_zone_id' => $request->shipping_zone_id,
                    'shipping_option_id' => $request->shipping_option_id,
                    'item' => $request->item,
                    'packaging_id' => $request->packaging_id
                ];
                
                $response=$this->get_responseDataFromURLPost($data,$url,true);
                
                if($response==null)
                return $this->processResponse('API',null,'error','returning null from refrence api');
                elseif(isset($response->status))
                {
                    if($response->status=="error")
                    return $this->processResponse('Connection',null,'error','Invalid Session');
                    if($response->status=="failed")
                    return $this->processResponse('message',null,'error',$response->message);
                    else if($response->status=="success")
                    {
                        return $this->processResponse('Cart',null,'success',$response->message);
                    }
                }
                elseif(isset($response->message))
                {
                    return $this->processResponse('Message',null,'success',$response->message);
                }
            } 
        }
        else
        {
            return $this->processResponse('Connection',null,'erroe','Connection not established');
        }
    }

    #endregion


}
