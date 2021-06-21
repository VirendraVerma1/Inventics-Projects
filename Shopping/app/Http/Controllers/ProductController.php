<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    public function productindex($cat_group,$cat_name,$slug)
    {
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


        $current_subgroup=DB::table('category_sub_groups')
        ->where('slug',$cat_group)->first();
        $current_category=DB::table('categories')
        ->where('slug',$cat_name)->first();
        
        // $tempProduct=true;
        return view('Product.index',compact('product','product_images','current_subgroup','current_category'));
    }

    public function productindexwithSlug($slug)
    {
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
        
        // $tempProduct=true;
        return view('Product.index',compact('product','product_images','current_subgroup','current_category'));
    }
}
