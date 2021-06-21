<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;
use DB;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $name=($request->search) ? $request->search:'';
        $inventory=$this->searchinventory($name);

        $cat_product=$this->getcategoriesproduct();
        
        //fething all the brands of the searched inventory products
        $allBrands=array();
        foreach($cat_product as $product)
        {
            $flag=0;
            foreach($allBrands as $br)
            {
                if($product->brand==$br)
                {
                    $flag=1;
                    break;
                }
            }
            if($flag==0)
            {
                array_push($allBrands,$product->brand);
            }
        }

        //this variable is used to add custom class for the search page, which helps in adding the class on the master body
        $tempcategory=true;
        return view('SearchPage.index',compact('tempcategory','inventory','allBrands','name'));
    }

    public function get_filtered_product(Request $request)
    {
        //get all the searched item from the name
        $name=($request->name) ? $request->name:'';
        $new_inventory=$this->searchinventory($name);

        //initialize new array
        $inventory=array();
        foreach($new_inventory as $inv)
        {
            //if having brand name, store in the inventory array
            if(($request->brandName!="" && $request->priceVal!=-1))
            {
                if($inv->brand==$request->brandName && $inv->min_price<=$request->priceVal)
                {
                    array_push($inventory,$inv);
                }
            }
            else if($request->brandName!="" && $request->priceVal==-1)
            {
                if($inv->brand==$request->brandName)
                {
                    array_push($inventory,$inv);
                }
            }else if($request->brandName=="" && $request->priceVal!=-1)
            {
                if($inv->min_price<=$request->priceVal)
                {
                    array_push($inventory,$inv);
                }
            }
            //for adding more filters use else if here
            else
            {
                //means nothing is selected then show all the data
                array_push($inventory,$inv);
            }
            
        }

        return view('SearchPage.product',compact('inventory'));
    }

}


    // this code will perform or condition for name , brand , category

    //     $inventory=array();
    //     $inventory_by_brand=array();
    //     $inventory_by_category=array();

    //     $inventory_by_name=$this->searchinventory($name);

    //     if($request->brandName!="")
    //     $inventory_by_brand=$this->search_custom_inventory("brand",$request->brandName);

    //     if($request->sub_categoryName!="")
    //     $inventory_by_category=$this->search_custom_inventory("category",$request->sub_categoryName);

        

    //     foreach($inventory_by_name as $c)
    //     {
    //         array_push($inventory,$c);
    //     }
    //     foreach($inventory_by_brand as $c)
    //     {
    //         array_push($inventory,$c);
    //     }
    //     foreach($inventory_by_category as $c)
    //     {
    //         array_push($inventory,$c);
    //     }

    //     $inventory=$this->giveMeUnRepeated($inventory);

        //dd($inventory,$inventory_by_name,$inventory_by_brand,$inventory_by_category);


