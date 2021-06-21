<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;
use App\User;
use App\Customer;
use DB;
use App\Address;
use App\Wishlist;
use Carbon\Carbon;

class AccountController extends Controller
{
    public $accountPages=array("details","orders","wishlist","address");

    public function index($page)
    {
        if(!$this->isAuthenticated())
        return redirect()->route('login');

        //common variables
        $flag=false;
        $customer_detail=Customer::where('id',$this->isAuthenticated("id"))->first();

        //country variables
        $countries=DB::table('countries')->get();

        //address variables
        $addresses=$this->getAllAddressed();

        //account orders
        $orders=$this->getAllOrders();

        //wishlist
        $wishlist=$this->showAllWishlist();

        foreach($this->accountPages as $ss)
        {
            if($page==$ss)
            {
                $flag=true;
            }
        }
        if(!$flag)
        return redirect()->route('Error');

        return view('Account.index',compact('page','customer_detail','countries','addresses','orders','wishlist'));
    }

    #region account details
    //--------------------------------------------------------------------account details start
    public function update_customer_details(Request $request)
    {
        $request->validate(['name'=>'required',
        'nice_name'=>'required',
        'email'=>'required',
        'phone'=>'required']);
        $customer=Customer::where('id',$this->isAuthenticated("id"))->first();
        $customer->name=$request->name;
        $customer->nice_name=$request->nice_name;
        $customer->email=$request->email;
        $customer->phone=$request->phone;
        $customer->save();
        session()->flash('success', 'Your details has been successfully updated');
        return redirect()->route('Account','details');
    }
    //--------------------------------------------------------------------account details end
    #endregion

    #region account address
    //---------------------------------------------------------------------account address start
    public function save_address(Request $request)
    {
        
        $request->validate(['address_title'=>'required',
        'country'=>'required',
        'state'=>'required',
        'zip_code'=>'required',
        'colony'=>'required',
        'street'=>'required',
        'city'=>'required']);

        
        //basic aim is  (only one address will be set as primary and other address will be automated set to shipping)
        //first:if we get the primary check box
        //second:then get that ids on the basis of user id and primary address type
        //third:and update all to shipping using selected ids
        //fourth: update current id details and set address type to primary

        //#first
        $address_type="Primary";
        $primary_address = $request->has('primary_address');//return in the form of false and true
        $oldcustomerAddressids=array();
        $oldcustomerAddress=Address::where('addressable_id',$this->isAuthenticated("id"))
            ->where('addressable_type',"App\Customer")
            ->where('address_type','Primary')
            ->select('id')
            ->get();
        foreach($oldcustomerAddress as $address)
        {
            array_push($oldcustomerAddressids,$address->id);
        }

        if($primary_address)
        {
            $address_type="Primary";
        }
        else
        {
            if(count($oldcustomerAddressids)>0)
                $address_type="Shipping";
            else
                $address_type="Primary";
        }
        
        // dd($address_type);
        //#second
        if($address_type=="Primary")
        {
             //#third
            if(count($oldcustomerAddressids)>0)
                Address::whereIn('id',$oldcustomerAddressids)->update(['address_type'=>'Shipping']);
        }
        
        if($address_type=="Primary")
        {
            $this->saveMyAddress($request->address_title,$request->country,$request->state,$request->city,$request->zip_code,$request->colony,$request->street,"Primary");
        }
        else
        {
            $this->saveMyAddress($request->address_title,$request->country,$request->state,$request->city,$request->zip_code,$request->colony,$request->street,"Shipping");
        }

        session()->flash('success', 'Address has been saved successfully');
        return redirect()->back();
    }

    public function saveMyAddress($address_title,$country_id,$state_id,$city,$zip_code,$address_line_2,$address_line_1,$address_type)
    {
            $address=new Address();
            if($address_title==null)
            $address->address_title=$this->isAuthenticated("name");
            else
            $address->address_title=$address_title;
            
            $address->country_id=$country_id;
            $address->state_id=$state_id;
            $address->city=$city;
            $address->zip_code=$zip_code;
            $address->address_line_2=$address_line_2;
            $address->address_line_1=$address_line_1;
            $address->addressable_id=$this->isAuthenticated("id");
            $address->addressable_type="App\Customer";
            $address->address_type=$address_type;
            $address->save();
    }

    public function update_address(Request $request)
    {
        //basic aim is  (only one address will be set as primary and other address will be automated set to shipping)
        //first:if we get the primary check box
        //second:then get that ids on the basis of user id and primary address type
        //third:and update all to shipping using selected ids
        //fourth: update current id details and set address type to primary

        //#first
        if(isset($request->primary_address))
        {
            $address_type="Primary";
        }
        else
        {
            $address_type="Shipping";
        }

        //#second
        $oldcustomerAddressids=array();
        if($address_type=="Primary")
        {
            $oldcustomerAddressids=Address::where('addressable_id',$this->isAuthenticated("id"))
            ->where('addressable_type',"App\Customer")
            ->where('address_type','Primary')
            ->select('id')
            ->get();
        }
        
        //#third
        if(count($oldcustomerAddressids)>0)
        Address::whereIn('id',$oldcustomerAddressids)->update(['address_type'=>'Shipping']);
       
        //#fourth
        if($request->address_title==null)
        $address_title=$this->isAuthenticated("name");
        else
        $address_title=$request->address_title;
        $country_id=$request->country;
        $state_id=$request->state;
        $city=$request->city;
        $zip_code=$request->zip_code;
        $address_line_2=$request->colony;
        $address_line_1=$request->street;

        Address::where('id',$request->hidden_address_id)
        ->update(['address_title'=>$address_title,'country_id'=>$country_id,'state_id'=>$state_id,'city'=>$city,'zip_code'=>$zip_code,'address_line_2'=>$address_line_2,'address_line_1'=>$address_line_1,'address_type'=>$address_type]);
       
        session()->flash('success', 'Address has been updated successfully');
        return redirect()->route('Account','address');
    }

    public function delete_address($hidden_address_id)
    {
        Address::where('id',$hidden_address_id)->delete();
        session()->flash('success', 'Address has been deleted successfully');
        return redirect()->route('Account','address');
    }

    //---------------------------------------------------------------------account address end


    #endregion

    #region account orders

    public function orderList($order_id)
    {
        $order_items=$this->getOrderList($order_id);
        $orders=$this->getCurrentOrderData($order_id);
        // dd($order_items);
        return view('Cart.OrderList.index',compact('order_items','orders'));
    }

    #endregion

    #region account wishlist

    public function addWishList(Request $request)
    {
        $response="success";
        if(!$this->isAuthenticated())
        {
            $response="login";
            return $response;
        }

        $wishlist=new Wishlist();
        $wishlist->inventory_id=$request->inventoryid;
        $wishlist->product_id=$request->productid;
        $wishlist->customer_id=$this->isAuthenticated("id");
        $wishlist->created_at=Carbon::now();
        $wishlist->updated_at=Carbon::now();
        $wishlist->save();

        return $response;
    }

    public function removeWishList(Request $request)
    {
        $response="success";
        if(!$this->isAuthenticated())
        {
            $response="login";
            return $response;
        }

        Wishlist::where('inventory_id',$request->inventoryid)->where('customer_id',$this->isAuthenticated("id"))->delete();
        
        return $response;
    }

    public function getTotalWishlist()
    {
        if(!$this->isAuthenticated())
        return "login";
        $wishlist=$this->showAllWishlist();
        return count($wishlist);
    }

    #endregion

    public function logoutUser()
    {
        $this->isAuthenticated("logout");
        session()->flash('success', 'Log Out');
        return redirect()->route('Books');
    }


    #region common functions
    //-----------------------------------------------------common functions
    public function get_states(Request $request)
    {
        $country_id=$request->country;
        // return $country_id;
        $states=DB::table('states')->where('country_id',$country_id)->get();
        $options="<option value=''>Select State</option>";
        foreach($states as $state)
        {
            $options  .='<option value="'.$state->id.'">'.$state->name.'</option>';
        }
        return $options;
    }

    #endregion
    
}
