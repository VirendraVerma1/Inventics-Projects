<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Customer;
use Session;
use Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Order;
use App\OrderTransaction;
use App\Payment;

class PaymentController extends Controller
{    
    public function create()
    {        
        return view('payWithRazorpay');
	
    }

    public function payment_request(Request $request)
    { 
        $cust= DB::table('connection_request')->select('user_id')->where('auth_code','=', $request->auth_code)->where('connection_id','=', $request->connection_id)->first();
        $row = Customer::where('id', $cust->user_id)->first();
        if($cust)
        {
            //payment request starts here
            $data = array(
            "amount" => 100*$request->amount,
            "receipt"=>strval($request->order_id),
             'currency'        => 'INR',
            );
            $data_string = json_encode($data);                                                                                   
            $api_key = env('RAZOR_KEY');   
            $password = env('RAZOR_SECRET');          
            $ch = curl_init(); 
            curl_setopt($ch, CURLOPT_URL, "https://api.razorpay.com/v1/orders");    
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");  
            curl_setopt($ch, CURLOPT_POST, true);                                                                   
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);     
            curl_setopt($ch, CURLOPT_USERPWD, $api_key.':'.$password);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(   
                'Accept: application/json',
                'Content-Type: application/json')                                                           
            );             

            if(curl_exec($ch) === false)
            {
              return $this->processResponse('null',curl_error($ch),'error','Unable to connect with payment server');
            }                                                                                                      
            $errors = curl_error($ch);   

            //resonse                                                                                      
            $result = curl_exec($ch);
            // $returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);  
             $result = json_decode($result, true);
           //    print_r( $result); 
             $x=$result["amount_due"];
             $y=$result["amount_paid"];
             $amount_due= $x/100;
             $amount_paid= $y/100;
                
            $payment_log = new Payment;
             $payment_log->amount = $amount_due;
             $payment_log->razorpay_order_id = $result["id"];
             $payment_log->order_id = $request->order_id;
             $payment_log->currency = $result["currency"];
             $payment_log->save();

            $data = array('id' => $result["id"],'order_id' => $request->order_id,'entity' => $result["entity"],'amount_due'=> $amount_due, "amount_paid"=> $amount_paid, "currency" => $result["currency"],
            "receipt" => $result["receipt"],"offer_id" => $result["offer_id"],"status"=> $result["status"],
            "attempts" => $result["attempts"],"notes" => $result["notes"],"created_at" => $result["created_at"],'payment_id'=>$payment_log->id
             );

            return $this->processResponse('payment_request',$data,'success','Payment Request successful!!');
      }
      else
        return $this->processResponse(null,null,'error','Enter correct login details');
    }

    public function payment_response(Request $request)
    {  
         $cust= DB::table('connection_request')->select('user_id')->where('auth_code','=', $request->auth_code)->where('connection_id','=', $request->connection_id)->first();
         if($cust)
         {
            $payment_log = Payment::find($request->payment_id);
           
           $order= DB::table('orders')->select('*')->where('order_number','=', $payment_log->order_id)->first();

            $payment_log->razorpay_response = $request->payment_success_key;
            if($request->payment_success_key!=null)
            {

               $paydata=$this->validatepayment($request->payment_success_key);
                
               if(sizeof($paydata)<2){
                  $payment_log->data = json_encode($paydata);
                  $payment_log->save();
                  
                  return response()->json([
                    'order_data' => $order,
                    'status' => 'error',
                    'message' => 'Oops! Payment failed.Your order is pending!',
                     "code" => 404

                  ]);
               }
               else if ($paydata['status']=="authorized"){
                  $payment_log->status = "success";
                  $payment_log->data = json_encode($paydata);
                  $payment_log->save();

                  $count = OrderTransaction::where('order_id',$payment_log->order_id)->first();

                  if($count)
                  {
                    $txn = new OrderTransaction;
                    $txn->payment_mode = 'Online';
                    $txn->amount = ($paydata['amount']/100);
                   
                    $txn->order_id = $payment_log->order_id;
                    $txn->transaction_status = 'Success';
                    $txn->type = "CR";
                    $txn->response=json_encode($paydata);
                    $txn->save();
                  }
                  else
                  {
                    $txn = new OrderTransaction;
                    $txn->payment_mode = 'Online';
                    $txn->amount = ($paydata['amount']/100);
                   
                    $txn->order_id = $payment_log->order_id;
                    $txn->transaction_status = 'Success';
                    $txn->type = "CR";
                   // $txn->commission = $comm->commission;
                    $txn->response=json_encode($paydata);
                    $txn->save();
                  }
                  Order::where('order_number', $payment_log->order_id)
                  ->update([
                  'transaction_id' => $request->payment_id,
                  'order_status_id' => 3,
                  'payment_status' => 3,
                  'status' => 'new_request',
                  ]);
                  $order_data= DB::table('orders')->select('*')->where('order_number','=', $payment_log->order_id)->first();
                  $data=$this->getResponse($order_data);

                  return $this->processResponse('order_response',$data,'success','Payment successful!');
              }
              else if ($paydata['status']=="pending"){
                  $payment_log->status = "pending";
                  $payment_log->data = json_encode($paydata);
                  $payment_log->save();
 
                  Order::where('order_number', $payment_log->order_id)
                  ->update([
                  'transaction_id' => $request->payment_id,
                  'status' => 'pending',
                  ]);
                   $order_data= DB::table('orders')->select('*')->where('order_number','=', $payment_log->order_id)->first();
                  $data=$this->getResponse($order_data);
                  return $this->processResponse('order_response',$data,'success','Payment pending!');
              }
              else
              {
                 $payment_log->status = "failed";
                 $payment_log->data = json_encode($paydata);
                 $payment_log->save();
                 
                  Order::where('order_number', $payment_log->order_id)
                  ->update([
                  'transaction_id' => $request->payment_id,
                  'status' => 'pending',
                  ]);
                $order_data= DB::table('orders')->select('*')->where('order_number','=', $payment_log->order_id)->first();
                 $data=$this->getResponse($order_data);
                 return $this->processResponse('order_response',$data,'error','Oops! Payment failed. Your order is pending!');
               }
            }
            else{
                $order_data= DB::table('orders')->select('*')->where('order_number','=', $payment_log->order_id)->first();
              $data=$this->getResponse($order_data);
              return $this->processResponse('order_response',$data,'error','Oops! Payment failed. Your order is pending!');
            }
        }
        else 
          return $this->processResponse(null,null,'error','Enter correct login details');
    }

    private function getResponse($order)
    {
   //   print_r($order);

      $transaction = OrderTransaction::where("order_id", $order->order_number)->get();
    
      $data=array(
        "order"=>$order,
        "wallet_txn"=>null,
        "online_txn"=>null
      );
      foreach ($transaction as $txn) {
          if($txn->payment_mode=='Wallet')
            $data['wallet_txn']=$txn;
          else
            $data['online_txn']=$txn;
      }
      $arrayName = array(
        'shipping_address' =>$data['order']->shipping_address, 
        'payment_status' =>$data['order']->payment_status, 
        'payment_mode' =>$data['online_txn']['payment_mode'], 
        'order_id' =>$data['online_txn']['order_id'], 
        'created_at' =>$data['order']->created_at, 
    );
    //  return $data;
     return $arrayName;
    }

    public function validatepayment($key)
    {
             
            $api_key = env('RAZOR_KEY');   
            $password = env('RAZOR_SECRET');                                                             
            $ch = curl_init(); 
            curl_setopt($ch, CURLOPT_URL, "https://api.razorpay.com/v1/payments/".$key);    
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);           
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);     
            curl_setopt($ch, CURLOPT_USERPWD, $api_key.':'.$password);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(   
                'Accept: application/json',
                'Content-Type: application/json')                                                           
            );             

            if(curl_exec($ch) === false)
            {
              return $this->processResponse('null',curl_error($ch),'error','Unable to connect with payment server');
            }                                                                                                      
            $errors = curl_error($ch);   

            //resonse 
            $result = curl_exec($ch); 
            curl_close($ch);  
            $result = json_decode($result, true);
            return $result;
    }

}