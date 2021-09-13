<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Cart;
use App\Order;
use App\OrderItems;
use App\CartItems;
use Carbon\Carbon;
use App\Inventory;

class CheckOutController extends Controller
{
    // <div class="row  border border-dark mt-3 p-2 ">
    public function index($cart_id)
    {
        $this->updatedata();
        //this function will work
        $cart=Cart::where('id',$cart_id)->first();
        if(!$this->isAuthenticated())
        return redirect()->route('login');

        //basic info
        $addresses=$this->getAllAddressed();
        $addresses_primary=$this->getAllAddressed("Primary");

        //order summary
        $cart_data=$this->GetAllTheCartDataForCartList($cart);

        $countries=array();
        //shipping
        $shipping_data=$this->getShippingDetails($cart->shop_id);
            
        $countries=DB::table('countries')->get();
        

        if(count($addresses)>0)
        {
            //update shipping ids and ship_to to cart table
            Cart::where('id',$cart->id)->update(['shipping_zone_id'=>$shipping_data->shipping_zone_id,'shipping_rate_id'=>$shipping_data->id,'ship_to'=>$addresses_primary->country_id]);
            
        }
        
        return view('Cart.CheckOut2.index',compact('addresses','countries','cart','cart_data','shipping_data','cart_id'));
    }


    #region ajax function for saving things

    public function saveShippingIdForCheckOut(Request $request)
    {
        Cart::where('id',$request->cartId)
        ->update(['shipping_address'=>$request->addressId]);
        return "success";
    }

    public function saveBillingIdForCheckOut(Request $request)
    {
        Cart::where('id',$request->cartId)
        ->update(['billing_address'=>$request->addressId]);
        return "success";
    }

    #endregion

    #region place order

    public function placeOrder(Request $request)
    {
        $response="place order success";
        $payment_method_idd=$request->paymentMethodId;

        //aim (if cart shipping,billing address is not null then process further) else add default primary to cart
        $cart=Cart::where('id',$request->cartId)->first();
        if($cart->shipping_address==null||$cart->billing_address==null)
        {
            $addresses_primary=$this->getAllAddressed("Primary");
            Cart::where('id',$cart->id)->update(['billing_address'=>$addresses_primary->id,'shipping_address'=>$addresses_primary->id]);
            $cart=Cart::where('id',$request->cartId)->first();
        }

        $shipping_address_data=$this->getPerticularAddress($cart->shipping_address);
        $billing_address_data=$this->getPerticularAddress($cart->billing_address);

        $create_order=false;
        $new_order_number="#".$this->isAuthenticated("id")."".rand(111111,999999);
        $temp_order=Order::where('order_number',$new_order_number)->first();
        if($temp_order==null)
        {
            $create_order=true;
            $response="is not there";
        }
        else
        {
            $response="is there";
        }
            

        if($create_order)
        {
            //create new order on the basis of cart table
            $order=new Order();
            $order->order_number=$new_order_number;
            $order->shop_id=$cart->shop_id;
            $order->customer_id=$this->isAuthenticated("id");
            $order->ship_to=$cart->ship_to;
            $order->shipping_zone_id=$cart->shipping_zone_id;
            $order->shipping_rate_id=$cart->shipping_rate_id;
            $order->item_count=$cart->item_count;
            $order->quantity=$cart->quantity;
            $order->taxrate=$cart->taxrate;
            $order->shipping_weight=$cart->shipping_weight;
            $order->total=$cart->total;
            $order->discount=$cart->discount;
            $order->shipping=$cart->shipping;
            $order->packaging=$cart->packaging;
            $order->handling=$cart->taxes;
            $order->grand_total=$cart->grand_total;
            $order->billing_address=$billing_address_data->address_title.",".$billing_address_data->address_line_1.",".$billing_address_data->address_line_2.",".$billing_address_data->city.",".$billing_address_data->state_name.",".$billing_address_data->country_name;
            $order->shipping_address=$shipping_address_data->address_title.",".$shipping_address_data->address_line_1.",".$shipping_address_data->address_line_2.",".$shipping_address_data->city.",".$shipping_address_data->state_name.",".$shipping_address_data->country_name;
            $order->coupon_id=$cart->coupon_id;
            $order->payment_status=$cart->payment_status;
            $order->payment_method_id=$payment_method_idd;
            $order->order_status_id=1;
            $order->save();

            //now saving order items from the cart items
            $cart_items=$this->GetAllTheCartDataForCartList($cart);
            foreach($cart_items as $item)
            {
                $order_nu=rand(11111111111,99999999999999);
                $this->inSertToOrderItems($order->id,$order_nu,$item->inventory_id,$item->item_description,$item->quantity,$item->unit_price);
            }

            //deletion process of cart and cart items
            Cart::where('id',$cart->id)->delete();
            $cart_item_ids=array();
            foreach($cart_items as $item)
            array_push($cart_item_ids,$item->id);
            CartItems::whereIn('cart_id',$cart_item_ids)->delete();
        }
        

        // $response="save";
        return $response;
    }

    #endregion

    #region cancel order

    public function cancelMyOrder(Request $request)
    {
        $cancelOrder=Order::where('id',$request->order_uid)->first();
        $cancelOrder->order_status_id= 8;
        $cancelOrder->save();

        //TODO
        //on any cancelation inventory stock must be updated 
        return "success";
    }

    #endregion

    #region reorder order

    public function reorderMyOrder($order_uid)
    {
        
        $response="";
        $cart_id=0;

        //from the order id in order table fetch all the data
        $oldorder=Order::where('id',$order_uid)->first();

        $oldorder_items=OrderItems::where('order_id',$oldorder->id)->get();
        $cat_product=Inventory::all();

        //aim is if we have sufficient stock quantity left in the inventory then only update else give error msg
        $shouldIUpdate=true;
        $temp_product_name="";
        foreach($oldorder_items as $item)
        {
            $have_stock=false;
            foreach($cat_product as $inventory)
            {
                if($item->inventory_id==$inventory->id)
                {
                    if($inventory->stock_quantity >= $item->quantity)
                    {
                        $have_stock=true;
                    }
                    else
                    {
                        $temp_product_name=$inventory->title;//if i dont have quantity then store the name of that product
                    }
                }
            }
            
            if(!$have_stock)
            {
                $shouldIUpdate=false;
            }
        }

        if($shouldIUpdate)
        {
            //check cart
            
            $cart = $this->moveAllItemsToCartAgain($oldorder);
            $cart_id=$cart->id;
            $response="success";
            return redirect()->route('CheckOut',$cart_id);
        }
        else
        {
            $response="dont have stock of product ".$temp_product_name;
            //give flash msg $response
            return redirect()->back();
        }
        

        
    }

    #endregion

    #region clear order history (optional feature)

    public function clearorderhistory()
    {
        
        //#first : get all the order id related to the customer
        $orders=Order::where('customer_id',$this->isAuthenticated("id"))->get();
        
        //#second  : store cancel order ids
        $order_id_for_cancel=array();
        foreach($orders as $order)
        {
            if($order->order_status_id==6||$order->order_status_id==8)//6 means deliverd and 8 means buyer cancel
                array_push($order_id_for_cancel,$order->id);
        }

        //update order deleted_at column(dont forget to add soft delete in order model otherwise it will delete data permanently)
        Order::whereIn('id', $order_id_for_cancel)->delete();

        session()->flash('success', 'Cleared cancel history successfully');
        return redirect()->back();
    }

    #endregion

    #region common functions

    public function inSertToOrderItems($order_id,$order_item_id,$inventory_id,$item_description,$quantity,$unit_price)
    {
        $order_item=new OrderItems();
        $order_item->order_id=$order_id;
        $order_item->order_item_id=$order_item_id;
        $order_item->inventory_id=$inventory_id;
        $order_item->item_description=$item_description;
        $order_item->quantity=$quantity;
        $order_item->unit_price=$unit_price;
        $order_item->created_at=Carbon::now();
        $order_item->updated_at=Carbon::now();
        $order_item->save();
    }

    public function deleteCustomOrderItems($order_id)
    {
        OrderItems::where('order_id',$order_id)->delete();
    }

    public function removeandUpdateInventoryStock($inventory_id,$stock_to_remove)
    {
        $inventory=Inventory::where('id',$inventory_id)-first();
        $inventory->stock_quantity=$inventory->stock_quantity-$stock_to_remove;
        $inventory->save();
    }

    function moveAllItemsToCartAgain($order, $revert = false)
    {
        if( !$order instanceOf Order ) {
            $order = Order::find($order);
        }

        if (! $order) return;

        // echo "<pre>"; print_r($order->items->toArray()); echo "<pre>"; exit('end!');

        // Save the cart
        $cart = Cart::create([
                    'shop_id' => $order->shop_id,
                    'customer_id' => $order->customer_id,
                    'ship_to' => $order->ship_to,
                    'shipping_zone_id' => $order->shipping_zone_id,
                    'shipping_rate_id' => $order->shipping_rate_id,
                    'packaging_id' => $order->packaging_id,
                    'item_count' => $order->item_count,
                    'quantity' => $order->quantity,
                    'taxrate' => $order->taxrate,
                    'shipping_weight' => $order->shipping_weight,
                    'total' => $order->total,
                    'shipping' => $order->shipping,
                    'packaging' => $order->packaging,
                    'handling' => $order->handling,
                    'taxes' => $order->taxes,
                    'grand_total' => $order->grand_total,
                    'ip_address' => request()->ip(),
                ]);

        // Add order item into cart pivot table
        $cart_items = [];
        foreach ($order->inventories as $item) {
            $cart_items[] = [
                'cart_id'           => $cart->id,
                'inventory_id'      => $item->pivot->inventory_id,
                'item_description'  => $item->pivot->item_description,
                'quantity'          => $item->pivot->quantity,
                'unit_price'        => $item->pivot->unit_price,
                'created_at'        => $item->pivot->created_at,
                'updated_at'        => $item->pivot->updated_at,
            ];

            // Sync up the inventory. Increase the stock of the order items from the listing
            if($revert) {
                $item->increment('stock_quantity', $item->pivot->quantity);
            }
        }

        \DB::table('cart_items')->insert($cart_items);

        // if($revert){
        //     // Increment the coupone in use
        //     if ($order->coupon_id) {
        //         Coupon::find($order->coupon_id)->increment('quantity');
        //     }

        //     $order->forceDelete();   // Delete the order
        // }

        return $cart;
    }

    #endregion


    #region check and apply coupoun

    public function check_and_applyCoupoun(Request $request)
    {
        $coupon=$this->validate_coupon($request->couponCode,$request->cartId);
        return json_encode(array('data'=>$coupon));
    }

    #endregion
}
