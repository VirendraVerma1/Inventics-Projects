<?php

namespace App\Http\Controllers;

use DB;
use App\Books;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Page;
use App\Shop;
use App\Cart;
use App\Banner;
use App\Slider;
use App\Product;
use App\Category;
use App\Inventory;
use App\Manufacturer;
use App\CategoryGroup;
use App\CategorySubGroup;
use App\ShopCategory;
use App\Wishlist;
use App\Helpers\ListHelper;
use App\Http\Controllers\Controller;

class CosmeticsController extends Controller
{
    public function index($slug=null)
    {
        
        if($slug==null)
        $slug="sonali-fashion";
        $this->decode_shop_slug($slug);
        
        $this->updatedata();
        $wishlist=$this->showAllWishlist();
        
        $tempBooks=true;
        $sliders=$this->getSlider();
        $banners=$this->getBanners();
        $promo_banner=array();
        $bottom_banner=array();
        $shopdetails=$this->shopdata();
        $sale_products=$this->getcategoriesproduct("sale");
        $categories_with_images=$this->category_with_images();
        foreach($banners as $bann)
        {
            if($bann->group_id=="promo_banner")
                $promo_banner=$bann;
            elseif($bann->group_id=="bottom")
                array_push($bottom_banner,$bann);
        }
        //session()->flash('success', 'Welcome again');
        return view('Cosmetics.index',compact('tempBooks','promo_banner','bottom_banner','sliders','wishlist','shopdetails','sale_products','banners','categories_with_images'));
    }

    public function product_cat_Index($name)
    {
        $this->updatedata();
        $cat_product=$this->getcategoriesproduct();
        return view('CommonContent.producttest',compact('cat_product'));
    }
}
