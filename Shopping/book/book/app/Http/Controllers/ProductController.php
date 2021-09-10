<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Inventory;
use App\Feedback;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class ProductController extends Controller
{
    public function productindex($cat_group,$cat_name,$slug)
    {
        $this->updatedata();
        
        $cat_product=$this->getcategoriesproduct();
        $product=array();
        foreach($cat_product as $cat)
        {
            if($cat->slug==$slug)
            {
                $product=$cat;
            }
        }

        $product_images=$product->img_path;
        $currentProduct=Inventory::where('slug',$slug)->first();
        //search feedback for the product;
        $feedbacks=Feedback::where('feedbackable_id',$currentProduct->id)
                            ->where('feedbackable_type','App\Inventory')
                            ->where('approved',1)->get();


        $current_subgroup=DB::table('category_sub_groups')
        ->where('slug',$cat_group)->first();
        $current_category=DB::table('categories')
        ->where('slug',$cat_name)->first();
        
        // $tempProduct=true;
        return view('Product.index',compact('product','product_images','current_subgroup','current_category','feedbacks'));
    }

    public function productindexwithSlug($slug)
    {
        $slugg="sonali-fashion";
        $this->decode_shop_slug($slugg);
        $this->updatedata();
        $cat_product=$this->getcategoriesproduct();
        $product=array();
        foreach($cat_product as $cat)
        {
            if($cat->slug==$slug)
            {
                $product=$cat;
            }
        }

        $product_images=$product->img_path;
        $cat_group=0;
        $cat_name=0;
       
        foreach($cat_product as $item)
        {
            if($item->slug==$slug)
            {
                $cat_group=$item->product_sub_cat;
                $cat_name=$item->product_cat;
                break;
            }
        }

        $current_subgroup=DB::table('category_sub_groups')
        ->where('slug',$cat_group)->first();
        $current_category=DB::table('categories')
        ->where('slug',$cat_name)->first();

        $currentProduct=Inventory::where('slug',$slug)->first();
        //search feedback for the product;
        $feedbacks=Feedback::where('feedbackable_id',$currentProduct->id)
                            ->where('feedbackable_type','App\Inventory')
                            ->where('approved',1)->get();
        
        // $tempProduct=true;
       
        return view('Product.index',compact('product','product_images','current_subgroup','current_category','feedbacks'));
    }


    public function product_feedback(Request $request)
    {
        //dd($request);
        $customerId=Auth::id();
        $Pfeedback=new Feedback;
        $Pfeedback->customer_id=$customerId;
        $Pfeedback->rating=$request->rating;
        $Pfeedback->comment= $request->review;
        $Pfeedback->feedbackable_id=$request->inventory_id;
        $Pfeedback->feedbackable_type='App\Inventory';
        $Pfeedback->created_at=Carbon::now();
        $Pfeedback->updated_at=Carbon::now();
        //dd($Pfeedback);
        $Pfeedback->save();
        return redirect()->back();

    }
    
}
