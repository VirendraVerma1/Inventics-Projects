<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($slug)
    {
        $this->updatedata();
        $cat_product=$this->getcategoriesproduct();
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

        //dd($allBrands);

        $tempcategory=true;
        return view('Category.index',compact('tempcategory','slug','allBrands'));
    }

    public function getmorecategoryData($catname,$upto)
    {
        
    }

    public function ecategoryindex()
    {
        $this->updatedata();
        $img_url=$this->server_image_path;
        $current_currency=$this->current_currency;
        $categories=$this->getsubgroup();
        $sub_categories=$this->getsubgroupcategories();
        //getting with images
        $cat_product=$this->getcategoriesproduct();

        //dd($categories);
        
        return view('Category.EmptyCategory.index',compact('categories','sub_categories','cat_product','img_url','current_currency'));
    }
}
