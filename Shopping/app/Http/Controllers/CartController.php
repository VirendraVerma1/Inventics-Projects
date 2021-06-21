<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\CartItems;
use DB;
use App\Inventory;

class CartController extends Controller
{
    public function index()
    {
        
        $cart_data=array();
        if($this->isAuthenticated())
        {
            $cart_ids=Cart::where('customer_id',$this->isAuthenticated("id"))->orderBy('created_at', 'DESC')->get();
            $cart_data=$this->GetAllTheCartDataForCartList();
            $inventory_images=$this->getInventoryImages();
            
            if(count($cart_data)==0)
            return view('Cart.EmptyCart.index');
        
            
        }else{
            return redirect()->route('login');
        }
        

        //dd($categories);
        
        return view('Cart.CartPage.index',compact('cart_data','cart_ids','inventory_images'));
    }

    #region add to cart, update cart, delete cart

    public function addToCart(Request $request)
    {
        $id=$request->productid;
        $inventory=DB::table('inventories')->where('id',$id)->first();
    
        $customerid=0;
        
        //check if authenticated
        if($this->isAuthenticated())
        {
            $customerid=$this->isAuthenticated("id");
        }
        else
        {
            return json_encode(array('data'=>"login"));
        }
        
        //check if customer id exist in the cart table or not
        $cart=$this->for_different_shopInCarts($this->for_same_cart,$customerid,$inventory->shop_id);
        
        if($cart==null)
        {
            //means create on cart
            $cart=new Cart();
            $cart->shop_id=$inventory->shop_id;
            $cart->customer_id=$customerid;
            $cart->ip_address=$request->ip();
            $cart->item_count=1;
            $cart->quantity=1;
            $cart->payment_status=1;
            $cart->save();
        }
            
            $quantity=$request->quant;
            
            $cart_items=$this->On_same_cart_items("existornot",$cart->id,$inventory->id);
            if($cart_items==false)//means cart item does not exist
            {
                $cart_item_pivot_data = [];
                $cart_item_pivot_data[$inventory->id] = [
                    'inventory_id' => $inventory->id,
                    'item_description'=> $inventory->sku . ': ' . $inventory->title . ' - ' . ' - ' . $inventory->condition,
                    'quantity' => $quantity,
                    'unit_price' => $inventory->sale_price,
                ];
                // Save cart items into pivot
                if ( ! empty($cart_item_pivot_data) ) {
                    $cart->inventories()->syncWithoutDetaching($cart_item_pivot_data);
                }
            }
            else
            {
                //show message that item already exist
                return json_encode(array('data'=>"Already Exist"));
            }
            $this->updateMainCartItemDetails($cart->id);

        
            return json_encode(array('data'=>"Added To Cart"));
    }


    public function update_to_cart(Request $request)
    {
        // return json_encode(array('data'=>"test"));
        if($this->isAuthenticated())
        {
            DB::table('cart_items')->where('cart_id',$request->cartid)->where('inventory_id',$request->inventoryid)->update(array('quantity'=>$request->quant));
            $grand_total=$this->updateMainCartItemDetails($request->cartid);
            return json_encode(array('data'=>$grand_total));
        }
        else{
            return json_encode(array('data'=>"login"));
        }
    }

    public function delete_product_from_cart(Request $request)
    {
        if($this->isAuthenticated())
        {
            DB::table('cart_items')->where('cart_id',$request->cartid)->where('inventory_id',$request->inventoryid)->delete();
            $need=$this->updateMainCartItemDetails($request->cartid,"item_count");
            return json_encode(array('data'=>$need));
        }
        else{
            return json_encode(array('data'=>"login"));
        }
    }
    #endregion

    #region mini cart

    public function getMiniCartItemdata()
    {
        //check auth
        if(!$this->isAuthenticated())
        {
            $response="login";
            return $response;
        }

        //initializing some common variables for showing data
        $current_currency=$this->getMyCountryCurrency();
        $img_url=$this->server_image_path;

        //fetch all the cart item data
        $cart_data=$this->GetAllTheCartDataForCartList();
        // dd($cart_data);

        //adding html data in response string
        $response="";
        $grand_total=0;
        foreach($cart_data as $cart)
        {
            $grand_total +=$cart->grand_total+0;
            $response .='<div class="minicart-prd row">';
            $response .='<div class="minicart-prd-image image-hover-scale-circle col">';
            $response .='<a href="###"><img class="lazyload fade-up" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="'.$img_url.$cart->img_path.'" alt=""></a>';
            $response .='</div>';
            $response .='<div class="minicart-prd-info col">';
            $response .='<div class="minicart-prd-tag">'.$cart->brand.'</div>';
            $response .='<h2 class="minicart-prd-name"><a href="#">'.$cart->name.'</a></h2>';
            $response .='<div class="minicart-prd-qty"><span class="minicart-prd-qty-label">Quantity:</span><span class="minicart-prd-qty-value">'.$cart->item_quantity.'</span></div>';
            $response .='<div class="minicart-prd-price prd-price">';
            // $response .='<div class="price-old">$200.00</div>';
            $response .='<div class="price-new">'.$current_currency.($cart->total+0).'</div>';
            $response .='</div>';
            $response .='</div>';
            $response .='<div class="minicart-prd-action">';
            $response .='<a href="#" class="js-product-remove" onclick="deleteMiniCartitemData('.$cart->inventory_id.','.$cart->cart_id.')" data-line-number="1"><i class="icon-recycle"></i></a>';
            $response .='</div>';
            $response .='</div>';
        }
        
        return json_encode(array('data'=>$response,'grand_total'=>$grand_total));
    }

    public function deleteMinicartItemData(Request $request)
    {
        $response="success";

        //check authentication
        if(!$this->isAuthenticated())
        {
            $response="login";
            return $response;
        }

        //delete from item from cartitem
        CartItems::where('cart_id',$request->cartid)->where('inventory_id',$request->inventoryid)->delete();

        //update main carts table
        $this->updateMainCartItemDetails($request->cartid);

        ///get total cart_items for showing item counter
        $response=$this->getTotalCartItems();

        //get subtotal
        $grand_total=0;
        $cart_data=$this->GetAllTheCartDataForCartList();
        foreach($cart_data as $cart)
        {
            $grand_total +=$cart->grand_total+0;
        }

        return json_encode(array('data'=>$response,'grand_total'=>$grand_total));
    }

    public function getTotalCartItems()
    {
        $response="success";

        //check auth
        if(!$this->isAuthenticated())
        {
            $response="login";
            return $response;
        }

        //get all the data from cart item
        $cart_data=$this->GetAllTheCartDataForCartList();

        //count the items
        $response=count($cart_data);

        //get subtotal
        $grand_total=0;
        foreach($cart_data as $cart)
        {
            $grand_total +=$cart->grand_total+0;
        }

        return json_encode(array('data'=>$response,'grand_total'=>$grand_total));
    }

    #endregion

    #region common functions

    //------------------------------------------------------------common functions----------------------

    public function for_different_shopInCarts($term,$customerid,$shop_id)//term="same","different"
    {
        if($term=="same")
        {
            return Cart::where('customer_id',$customerid)->first();
        }else{
            return Cart::where('customer_id',$customerid)->where('shop_id',$shop_id)->first();
        }
    }

    public function On_same_cart_items($term,$cart_id,$inventory_id)//term="increment","existornot"
    {
        $exist=$this->getCartItemsIfExist($cart_id,$inventory_id);
        if($term=="increment" && $exist!=null)
        {
            DB::table('cart_items')
            ->where('cart_id',$cart_id)
            ->where('inventory_id',$inventory_id)
            ->increment('quantity',1);
            
            return true;
        }
        else
        {
            if($exist!=null)
            return true;
            else
            return false;
        }
    }

    public function updateMainCartItemDetails($cart_id,$need="total_price")
    {
        $totalQuantity=0;
        $total_price=0.0;
        $total_items=0;
        $exist=$this->getCartItemsIfExist($cart_id);
        if($exist!=null)
        {
            
            foreach($exist as $item)
            {
                $totalQuantity+=$item->quantity;
                $total_price+=$item->quantity*$item->unit_price;
                $total_items++;
            }

            //update to main cart
            if($total_items>0)
            DB::table('carts')->where('id',$cart_id)->update(array('item_count'=>$total_items,'quantity'=>$totalQuantity,'total'=>$total_price,'grand_total'=>$total_price));
            else
            DB::table('carts')->where('id',$cart_id)->delete();
        }

        if($need=="item_count")
        {
            if($total_items==0)
            return $total_items;
            else
            return $total_price;
        }
        elseif($need=="quantity")
        return $totalQuantity;
        else
        return $total_price;

    }

    public function getCartItemsIfExist($cart_id,$inventory_id=null)
    {
        if($inventory_id==null)
        {
            return DB::table('cart_items')
            ->where('cart_id',$cart_id)
            ->get();
        }
        elseif($cart_id!=null&&$inventory_id!=null)
        {
            return DB::table('cart_items')
            ->where('cart_id',$cart_id)
            ->where('inventory_id',$inventory_id)
            ->first();
        }else{
            return false;
        }

    }

    public function clearAllCart()
    {
        $cart_ids=DB::table('carts')->where('customer_id', $this->isAuthenticated("id"))->get();
        $ids=array();
        foreach($cart_ids as $id)
        {
            array_push($ids,$id->id);
        }
        DB::table('cart_items')->where('cart_id', $ids)->delete();
        DB::table('carts')->where('customer_id', $this->isAuthenticated("id"))->delete();

        return redirect()->route('EmptyCart');
    }
    #endregion

    #region test and learn

    //---------------------------------------------------test functions---------
    public function addToGetTest($idd)
    {
        $id=DB::table('aatest')->insertGetId(
            ['name' => $idd]
        );
        
    }

    public function addToPostTest(Request $request)
    {
        $id=DB::table('aatest')->insertGetId(
            ['name' => $request->ip()]
        );
        return json_encode(array('data'=>$request->ip()));
    }

    public function update_to_cart_test(Request $request)
    {
        $carts=Cart::where('customer_id',$this->isAuthenticated("id"))->get();
        
        $ids=array();
        $inventory_id=array();
        $cart_data=$this->GetAllTheCartDataForCartList();
        foreach($cart_data as $data)
        {
            array_push($inventory_id,$data->inventory_id);
        }
        foreach($carts as $cart)
        {
            array_push($ids,$cart->id);
        }
        $update = [['column' => 'value1'],['column' => 'value2']];
        DB::table('cart_items')->where('cart_id', $ids)->where('inventory_id', $inventory_id)->update($request->except('_token'));
        dd($request);
    }
    #endregion

    public function testFunction(Request $request)
    {
        $response=$request->testData;
        $res=$request->testHello;
        $response =$response." world world ".$res;
        return $response;
    }
}
