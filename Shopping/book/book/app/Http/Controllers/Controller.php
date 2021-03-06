<?php

namespace App\Http\Controllers;

use DB;
use View;
use Session;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Carbon;
use Mixpanel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use URL;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $server_image_path="http://zcommerce.online/image/";
    public $my_category='Apparel';//Apparel,Books,Electronics
    public $my_banner_category="Fashion";
    public $current_currency="Rs. ";
    public $for_same_cart="different";//it can be same or different at a time
    public $shop_id=0;
    public $category_subgroup_id=array();

    // public function __construct(Request $request)
    // {
        
        
    // }

    public function decode_shop_slug($slug)
    {
        $shop_data=DB::table('shops')->where('slug',$slug)->first();
        $shop_category_data=DB::table('shop_categories')->where('shop_id',$shop_data->id)->first();
        session(['shop' => $shop_data]);
        session(['subgroup' => $shop_category_data->category_sub_group_id]);
        $this->check_url_and_redirect($shop_data);
        
    }

    public function check_url_and_redirect($shop)
    {
        //get the current url
        $url=URL::to('/');
        $lastindex=strlen($url);
        $base_url = substr($url, strpos($url, '://') + 3,$lastindex);

        if($base_url==$shop->domain_name)
        {
            //do nothing its all correct
        }
        elseif($shop->store_url!=null)
        {
            //check if the base url or current url is same or not
            $shop_theme_url=$shop->store_url;
            $base_url = substr($url, strpos($url, '://') + 3,$lastindex);
            $complete_url=explode($base_url,"/");
            $base_url=$complete_url[0];
            dd($base_url);
        }

        return Redirect::to('http://heera.it');
    }

    public function updatedata()
    {
        if(session('shop'))
        {
            $this->shop_id=session('shop')->id;
            $this->category_subgroup_id=json_decode(session('subgroup'));

            // dd($this->category_subgroup_id);
            $img_url=$this->server_image_path;
            $current_currency=$this->getMyCountryCurrency();
           
            $categories=$this->getsubgroup();
            $sub_categories=$this->getsubgroupcategories();
            // dd($sub_categories);
            $cat_product=$this->getcategoriesproduct("latest");
            $shopdetails=$this->shopdata();
            $shopcover_img=$this->shopcoverimage();
            
            if($this->isAuthenticated("check"))
            $wishlist=$this->showAllWishlist();
            else
            $wishlist=array();
            // dd($wishlist,$cat_product);

            View::share(['img_url' => $img_url, 'current_currency' => $current_currency, 'wishlist' => $wishlist, 'categories' => $categories, 'sub_categories' => $sub_categories, 'cat_product' => $cat_product, 'shopdetails' => $shopdetails ,'shopcover_img'=> $shopcover_img]);
        }
        
    }

    

    public function getMyCountryCurrency($country_name="India")
    {
        $country=DB::table('countries')
        ->where('name',$country_name)
        ->first();
        return $country->currency_symbol;
    }

    public function isAuthenticated($things="check")//"check","id","logout","details"
    {
        if($things=="check")
        return Auth::check();
        elseif($things=="id")
        return Auth::id();
        elseif($things=="name")
        return Auth::user()->name;
        elseif($things=="logout")
        return Auth::logout();
        elseif($things=="details")
        return Auth::user();
    }

    
    public function getsubgroup()
    {
        $subgroup= DB::table('category_groups')
        // $categories=DB::table('category_groups')
        ->join('category_sub_groups', 'category_groups.id', '=', 'category_sub_groups.category_group_id')
        //->where('category_groups.name','Fashion Accessories')->get();
        ->whereIn('category_sub_groups.id',$this->category_subgroup_id)
        ->get();

        //check and filter
        $fetchedcategories=$this->getsubgroupcategories();//name
        $newsubgroup=array();//name,cat_sub_name

       // dd($fetchedcategories);
        foreach($subgroup as $sub)
        {
            $counter=0;
            foreach($fetchedcategories as $cat)
            {
                if($cat->cat_sub_name==$sub->name)
                {
                    $counter++;
                    break;
                }
            }

            if($counter>0)
            {
                array_push($newsubgroup,$sub);
            }
        }

        return $newsubgroup;
    }

    public function getsubgroupcategories($paginate_limit=0)
    {
        //Note : pagination links will work on model not in join
        //TODO Make model
        if($paginate_limit==0)
        {
            $categories= DB::table('category_groups')
            ->join('category_sub_groups', 'category_groups.id', '=', 'category_sub_groups.category_group_id')
            ->join('categories', 'category_sub_groups.id', '=', 'categories.category_sub_group_id')
            ->join('images', 'categories.id', '=', 'images.imageable_id')
            // ->where('category_groups.name',$this->my_category)
            ->where('images.featured',1)
            ->whereIn('category_sub_groups.id',$this->category_subgroup_id)
            ->select('categories.*','categories.id as main_id','category_sub_groups.name as cat_sub_name','images.path as img_path')->get();
        }
        else
        {
            $categories= DB::table('category_groups')
            ->join('category_sub_groups', 'category_groups.id', '=', 'category_sub_groups.category_group_id')
            ->join('categories', 'category_sub_groups.id', '=', 'categories.category_sub_group_id')
            ->join('images', 'categories.id', '=', 'images.imageable_id')
            // ->where('category_groups.name',$this->my_category)
            ->where('images.featured',1)
            ->whereIn('category_sub_groups.id',$this->category_subgroup_id)
            ->select('categories.*','categories.id as main_id','category_sub_groups.name as cat_sub_name','images.path as img_path')->paginate($paginate_limit);
        
        }
        $categories=$this->giveMeUnRepeated($categories);
        
        return $categories;
    }

    public function testinventory()
    {
       return DB::table('inventories')
            ->join('products', 'inventories.product_id', '=', 'products.id')
            ->where('inventories.stock_quantity','>',0)
            ->select('inventories.*','inventories.title as name','inventories.sale_price as min_price')
            ->get();
    }

    public function getcategoriesproduct($order="random")//random, latest
    {
        if($order=="random")
        {
            $inventory= DB::table('category_groups')
            ->join('category_sub_groups', 'category_groups.id', '=', 'category_sub_groups.category_group_id')
            ->join('categories', 'category_sub_groups.id', '=', 'categories.category_sub_group_id')
            ->join('category_product', 'categories.id', '=', 'category_product.category_id')
            ->join('products', 'category_product.product_id', '=', 'products.id')
            ->join('inventories', 'products.id', '=', 'inventories.product_id')
            ->join('shipping_zones', 'inventories.shop_id', '=', 'shipping_zones.shop_id')
            ->join('shipping_rates', 'shipping_zones.id', '=', 'shipping_rates.shipping_zone_id')
            ->join('images', 'inventories.id', '=', 'images.imageable_id')
            // ->where('category_groups.name',$this->my_category)
            ->where('images.imageable_type','App\Inventory')
            ->where('images.featured',1)
            ->where('inventories.shop_id',$this->shop_id)
            ->whereIn('category_sub_groups.id',$this->category_subgroup_id)
            ->select('inventories.*','inventories.id as inventory_id','inventories.id as main_id','products.id as product_id','inventories.title as name','images.path as img_path','inventories.sale_price as min_price','categories.slug as product_cat','category_sub_groups.slug as product_sub_cat','category_sub_groups.name as cat_sub_name')
            ->inRandomOrder()->get();
        }
        elseif($order=="latest")
        {
            $inventory= DB::table('category_groups')
            ->join('category_sub_groups', 'category_groups.id', '=', 'category_sub_groups.category_group_id')
            ->join('categories', 'category_sub_groups.id', '=', 'categories.category_sub_group_id')
            ->join('category_product', 'categories.id', '=', 'category_product.category_id')
            ->join('products', 'category_product.product_id', '=', 'products.id')
            ->join('inventories', 'products.id', '=', 'inventories.product_id')
            ->join('shipping_zones', 'inventories.shop_id', '=', 'shipping_zones.shop_id')
            ->join('shipping_rates', 'shipping_zones.id', '=', 'shipping_rates.shipping_zone_id')
            ->join('images', 'inventories.id', '=', 'images.imageable_id')
            // ->where('category_groups.name',$this->my_category)
            ->where('images.imageable_type','App\Inventory')
            ->where('images.featured',1)
            ->where('inventories.shop_id',$this->shop_id)
            ->whereIn('category_sub_groups.id',$this->category_subgroup_id)
            ->select('inventories.*','inventories.id as inventory_id','inventories.id as main_id','products.id as product_id','inventories.title as name','images.path as img_path','inventories.sale_price as min_price','categories.slug as product_cat','category_sub_groups.slug as product_sub_cat','category_sub_groups.name as cat_sub_name')
            ->orderBy('updated_at', 'DESC')->distinct()->get();
        
        }elseif($order=="sale")
        {
            $inventory= DB::table('category_groups')
            ->join('category_sub_groups', 'category_groups.id', '=', 'category_sub_groups.category_group_id')
            ->join('categories', 'category_sub_groups.id', '=', 'categories.category_sub_group_id')
            ->join('category_product', 'categories.id', '=', 'category_product.category_id')
            ->join('products', 'category_product.product_id', '=', 'products.id')
            ->join('inventories', 'products.id', '=', 'inventories.product_id')
            ->join('shops','inventories.shop_id','=','shops.id')
            ->join('shipping_zones', 'inventories.shop_id', '=', 'shipping_zones.shop_id')
            ->join('shipping_rates', 'shipping_zones.id', '=', 'shipping_rates.shipping_zone_id')            
            ->join('images', 'inventories.id', '=', 'images.imageable_id')
            // ->where('category_groups.name',$this->my_category)
            ->where('images.imageable_type','App\Inventory')
            ->where('images.featured',1)
            ->where('inventories.stock_quantity','>',0)
            ->where('inventories.shop_id',$this->shop_id)
            ->where('inventories.sale_price','>','inventories.offer_price')
            ->whereIn('category_sub_groups.id',$this->category_subgroup_id)
            ->select('inventories.*','inventories.title as name','inventories.sale_price as min_price','images.path as img_path','inventories.sale_price as max_price','categories.slug as product_cat','category_sub_groups.slug as product_sub_cat','category_sub_groups.name as cat_sub_name','shops.legal_name as shop_name')
            ->orderBy('updated_at', 'DESC')->distinct()->get();
        
        }

        $new_inventory=$this->giveMeUnRepeated($inventory);
        
        return $new_inventory;
    }

    public function getInventoryImages()
    {
        return DB::table('images')
        ->join('inventories', 'images.imageable_id', '=', 'inventories.id')
        ->where('images.imageable_type','App\Inventory')
        ->select('inventories.*','images.path as img_path')
        ->get();
    }

    public function getBanners()
    {
        $category_ids=$this->category_subgroup_id;
        if(count($category_ids)>0)
        {
            return DB::table('banners')
            ->join('images', 'banners.id', '=', 'images.imageable_id')
            ->where('banners.sub_category_list',json_encode($category_ids[0]))
            ->where('banners.group_id','promo_banner')
            ->select('banners.*','images.path as img_path')->get();
        }
        else{
            return array();
        }
        
    }

    public function getSlider()
    {
        return DB::table('sliders')
        ->join('images', 'sliders.id', '=', 'images.imageable_id')
        ->where('sliders.store_type','Sports')
        // ->where('images.imageable_type','App\Slider')
        ->select('sliders.*','images.path as img_path')->first();
    }
    

    public function category_with_images()
    {
        return DB::table('category_groups')
            ->join('category_sub_groups', 'category_groups.id', '=', 'category_sub_groups.category_group_id')
            ->join('categories', 'category_sub_groups.id', '=', 'categories.category_sub_group_id')
            ->join('images', 'categories.id', '=', 'images.imageable_id')
            ->where('images.imageable_type','App\Category')
            ->where('images.featured',1)
            ->whereIn('category_sub_groups.id',$this->category_subgroup_id)
            ->select('categories.*','images.path as img_path')
            ->take(3)->get();
    }

    #region blog
    //--------------------------------------------------------blogs area ------start
    public function getblogs($slug=null)
    {
        if($slug==null)
        {
            return DB::table('blogs')
            ->join('images', 'blogs.id', '=', 'images.imageable_id')
            ->join('platforms', 'blogs.platform_id', '=', 'platforms.id')
            ->join('users', 'blogs.user_id', '=', 'users.id')
            ->where('blogs.status','1')
            ->where('blogs.approved','1')
            ->where('images.imageable_type','App\Blog')
            ->select('blogs.*','images.path as img_path','users.name as user_name','platforms.name as platoform_name','platforms.slug as platoform_slug')
            ->orderBy('updated_at', 'DESC')->paginate(6);
        }
        else
        {
            return DB::table('blogs')
            ->join('images', 'blogs.id', '=', 'images.imageable_id')
            ->join('platforms', 'blogs.platform_id', '=', 'platforms.id')
            ->join('users', 'blogs.user_id', '=', 'users.id')
            ->where('blogs.status','1')
            ->where('blogs.approved','1')
            ->where('images.imageable_type','App\Blog')
            ->where('blogs.slug',$slug)
            ->select('blogs.*','images.path as img_path','users.name as user_name','platforms.name as platoform_name','platforms.slug as platoform_slug')
            ->first();
        }
        
    }

    public function getcurrentBlogComments($blog_slug)
    {
        return DB::table('blog_comments')
        ->join('blogs', 'blogs.id', '=', 'blog_comments.blog_id')
        ->join('users', 'users.id', '=', 'blog_comments.user_id')
        ->where('blogs.slug',$blog_slug)
        ->select('blog_comments.*','blogs.slug as blog_slug','users.name as user_name','users.sex as user_gender')
        ->orderBy('created_at', 'DESC')->get();
    }

    public function getBlogTags($blog_slug=null)
    {
        if($blog_slug==null)
        {
            return DB::table('blogs')
            ->join('taggables', 'taggables.taggable_id', '=', 'blogs.id')
            ->join('tags', 'tags.id', '=', 'taggables.tag_id')
            ->select('tags.*','blogs.slug as blog_slug')
            ->orderBy('created_at', 'DESC')->get();
        }
        else
        {
            return DB::table('blogs')
            ->join('taggables', 'taggables.taggable_id', '=', 'blogs.id')
            ->join('tags', 'tags.id', '=', 'taggables.tag_id')
            ->where('blogs.slug',$blog_slug)
            ->select('tags.*','blogs.slug as blog_slug')
            ->orderBy('created_at', 'DESC')->get();
        }
    }


//---------------------------------------------------------blogs area ------end
    #endregion


    public function getCompleteInventoryData()
    {
        return DB::table('inventories')
        ->join('products', 'products.id', '=', 'inventories.product_id')
        ->select('inventories.*','products.name as product_name')
        ->get();
    }

    public function getInventoryId($productid)
    {
        return DB::table('inventories')
        ->where('product_id',$productid)
        ->first();
    }

    #region search functions

    public function searchinventory($name,$filter="Latest")
    {
        //this function will search on the basis of product name and category name
        //on the basis of product name
        $catname_onthebasisofname=array();
        $catname_onthebasisofcategory=array();
        if($filter=="Latest")
        {
            $catname_onthebasisofname= DB::table('category_groups')
            ->join('category_sub_groups', 'category_groups.id', '=', 'category_sub_groups.category_group_id')
            ->join('categories', 'category_sub_groups.id', '=', 'categories.category_sub_group_id')
            ->join('category_product', 'categories.id', '=', 'category_product.category_id')
            ->join('products', 'category_product.product_id', '=', 'products.id')
            ->join('inventories', 'products.id', '=', 'inventories.product_id')
            ->join('shipping_zones', 'inventories.shop_id', '=', 'shipping_zones.shop_id')
            ->join('shipping_rates', 'shipping_zones.id', '=', 'shipping_rates.shipping_zone_id')
            ->join('images', 'inventories.id', '=', 'images.imageable_id')
            // ->where('category_groups.name',$this->my_category)
            ->where('images.imageable_type','App\Inventory')
            ->where('images.featured',1)
            ->where('inventories.title', 'like', "%$name%")
            ->where('inventories.shop_id',$this->shop_id)
            ->whereIn('category_sub_groups.id',$this->category_subgroup_id)
            ->select('inventories.*','inventories.id as inventory_id','inventories.id as main_id','products.id as product_id','inventories.title as name','images.path as img_path','inventories.sale_price as min_price','categories.slug as product_cat','categories.name as category_name','category_sub_groups.slug as product_sub_cat','category_sub_groups.name as cat_sub_name')
            ->orderBy('inventories.updated_at', 'DESC')->get();
    
            //on the basis of category name
            $catname_onthebasisofcategory=DB::table('category_groups')
            ->join('category_sub_groups', 'category_groups.id', '=', 'category_sub_groups.category_group_id')
            ->join('categories', 'category_sub_groups.id', '=', 'categories.category_sub_group_id')
            ->join('category_product', 'categories.id', '=', 'category_product.category_id')
            ->join('products', 'category_product.product_id', '=', 'products.id')
            ->join('inventories', 'products.id', '=', 'inventories.product_id')
            ->join('shipping_zones', 'inventories.shop_id', '=', 'shipping_zones.shop_id')
            ->join('shipping_rates', 'shipping_zones.id', '=', 'shipping_rates.shipping_zone_id')
            ->join('images', 'inventories.id', '=', 'images.imageable_id')
            // ->where('category_groups.name',$this->my_category)
            ->where('images.imageable_type','App\Inventory')
            ->where('images.featured',1)
            ->where('categories.name', 'like', "%$name%")
            ->where('inventories.shop_id',$this->shop_id)
            ->whereIn('category_sub_groups.id',$this->category_subgroup_id)
            ->select('inventories.*','inventories.id as inventory_id','inventories.id as main_id','products.id as product_id','inventories.title as name','images.path as img_path','inventories.sale_price as min_price','categories.slug as product_cat','categories.name as category_name','category_sub_groups.slug as product_sub_cat','category_sub_groups.name as cat_sub_name')
            ->orderBy('inventories.updated_at', 'DESC')->get();
        }
        else if($filter=="Price")
        {
            $catname_onthebasisofname= DB::table('category_groups')
            ->join('category_sub_groups', 'category_groups.id', '=', 'category_sub_groups.category_group_id')
            ->join('categories', 'category_sub_groups.id', '=', 'categories.category_sub_group_id')
            ->join('category_product', 'categories.id', '=', 'category_product.category_id')
            ->join('products', 'category_product.product_id', '=', 'products.id')
            ->join('inventories', 'products.id', '=', 'inventories.product_id')
            ->join('shipping_zones', 'inventories.shop_id', '=', 'shipping_zones.shop_id')
            ->join('shipping_rates', 'shipping_zones.id', '=', 'shipping_rates.shipping_zone_id')
            ->join('images', 'inventories.id', '=', 'images.imageable_id')
            // ->where('category_groups.name',$this->my_category)
            ->where('images.imageable_type','App\Inventory')
            ->where('images.featured',1)
            ->where('inventories.title', 'like', "%$name%")
            ->where('inventories.shop_id',$this->shop_id)
            ->whereIn('category_sub_groups.id',$this->category_subgroup_id)
            ->select('inventories.*','inventories.id as inventory_id','inventories.id as main_id','products.id as product_id','inventories.title as name','images.path as img_path','inventories.sale_price as min_price','categories.slug as product_cat','categories.name as category_name','category_sub_groups.slug as product_sub_cat','category_sub_groups.name as cat_sub_name')
            ->orderBy('inventories.sale_price', 'ASC')->get();
    
            //on the basis of category name
            $catname_onthebasisofcategory=DB::table('category_groups')
            ->join('category_sub_groups', 'category_groups.id', '=', 'category_sub_groups.category_group_id')
            ->join('categories', 'category_sub_groups.id', '=', 'categories.category_sub_group_id')
            ->join('category_product', 'categories.id', '=', 'category_product.category_id')
            ->join('products', 'category_product.product_id', '=', 'products.id')
            ->join('inventories', 'products.id', '=', 'inventories.product_id')
            ->join('shipping_zones', 'inventories.shop_id', '=', 'shipping_zones.shop_id')
            ->join('shipping_rates', 'shipping_zones.id', '=', 'shipping_rates.shipping_zone_id')
            ->join('images', 'inventories.id', '=', 'images.imageable_id')
            // ->where('category_groups.name',$this->my_category)
            ->where('images.imageable_type','App\Inventory')
            ->where('images.featured',1)
            ->where('categories.name', 'like', "%$name%")
            ->where('inventories.shop_id',$this->shop_id)
            ->whereIn('category_sub_groups.id',$this->category_subgroup_id)
            ->select('inventories.*','inventories.id as inventory_id','inventories.id as main_id','products.id as product_id','inventories.title as name','images.path as img_path','inventories.sale_price as min_price','categories.slug as product_cat','categories.name as category_name','category_sub_groups.slug as product_sub_cat','category_sub_groups.name as cat_sub_name')
            ->orderBy('inventories.sale_price', 'ASC')->get();
        }
        else if($filter=="HighPrice")
        {
            $catname_onthebasisofname= DB::table('category_groups')
            ->join('category_sub_groups', 'category_groups.id', '=', 'category_sub_groups.category_group_id')
            ->join('categories', 'category_sub_groups.id', '=', 'categories.category_sub_group_id')
            ->join('category_product', 'categories.id', '=', 'category_product.category_id')
            ->join('products', 'category_product.product_id', '=', 'products.id')
            ->join('inventories', 'products.id', '=', 'inventories.product_id')
            ->join('shipping_zones', 'inventories.shop_id', '=', 'shipping_zones.shop_id')
            ->join('shipping_rates', 'shipping_zones.id', '=', 'shipping_rates.shipping_zone_id')
            ->join('images', 'inventories.id', '=', 'images.imageable_id')
            // ->where('category_groups.name',$this->my_category)
            ->where('images.imageable_type','App\Inventory')
            ->where('images.featured',1)
            ->where('inventories.title', 'like', "%$name%")
            ->where('inventories.shop_id',$this->shop_id)
            ->whereIn('category_sub_groups.id',$this->category_subgroup_id)
            ->select('inventories.*','inventories.id as inventory_id','inventories.id as main_id','products.id as product_id','inventories.title as name','images.path as img_path','inventories.sale_price as min_price','categories.slug as product_cat','categories.name as category_name','category_sub_groups.slug as product_sub_cat','category_sub_groups.name as cat_sub_name')
            ->orderBy('inventories.sale_price', 'DESC')->get();
    
            //on the basis of category name
            $catname_onthebasisofcategory=DB::table('category_groups')
            ->join('category_sub_groups', 'category_groups.id', '=', 'category_sub_groups.category_group_id')
            ->join('categories', 'category_sub_groups.id', '=', 'categories.category_sub_group_id')
            ->join('category_product', 'categories.id', '=', 'category_product.category_id')
            ->join('products', 'category_product.product_id', '=', 'products.id')
            ->join('inventories', 'products.id', '=', 'inventories.product_id')
            ->join('shipping_zones', 'inventories.shop_id', '=', 'shipping_zones.shop_id')
            ->join('shipping_rates', 'shipping_zones.id', '=', 'shipping_rates.shipping_zone_id')
            ->join('images', 'inventories.id', '=', 'images.imageable_id')
            // ->where('category_groups.name',$this->my_category)
            ->where('images.imageable_type','App\Inventory')
            ->where('images.featured',1)
            ->where('categories.name', 'like', "%$name%")
            ->where('inventories.shop_id',$this->shop_id)
            ->whereIn('category_sub_groups.id',$this->category_subgroup_id)
            ->select('inventories.*','inventories.id as inventory_id','inventories.id as main_id','products.id as product_id','inventories.title as name','images.path as img_path','inventories.sale_price as min_price','categories.slug as product_cat','categories.name as category_name','category_sub_groups.slug as product_sub_cat','category_sub_groups.name as cat_sub_name')
            ->orderBy('inventories.sale_price', 'DESC')->get();
        }
        

        //initializing new array and push all the searched items
        $completeSearList=array();
        foreach($catname_onthebasisofname as $c)
        {
            array_push($completeSearList,$c);
        }
        foreach($catname_onthebasisofcategory as $c)
        {
            array_push($completeSearList,$c);
        }
        
        //get unrepeated data
        $things=$this->giveMeUnRepeated($completeSearList);
        return $things;
    }

    public function search_custom_inventory($type,$name,$operator="=")//accept only brand, category
    {
        if($type=="brand")
        {
            return DB::table('category_groups')
            ->join('category_sub_groups', 'category_groups.id', '=', 'category_sub_groups.category_group_id')
            ->join('categories', 'category_sub_groups.id', '=', 'categories.category_sub_group_id')
            ->join('category_product', 'categories.id', '=', 'category_product.category_id')
            ->join('products', 'category_product.product_id', '=', 'products.id')
            ->join('inventories', 'products.id', '=', 'inventories.product_id')
            ->join('shipping_zones', 'inventories.shop_id', '=', 'shipping_zones.shop_id')
            ->join('shipping_rates', 'shipping_zones.id', '=', 'shipping_rates.shipping_zone_id')
            ->join('images', 'inventories.id', '=', 'images.imageable_id')
            ->where('category_groups.name',$this->my_category)
            ->where('images.imageable_type','App\Inventory')
            ->where('images.featured',1)
            ->where('inventories.brand', 'like', "%$name%")
            ->select('inventories.*','inventories.id as inventory_id','inventories.id as main_id','products.id as product_id','inventories.title as name','images.path as img_path','inventories.sale_price as min_price','categories.slug as product_cat','categories.name as category_name','category_sub_groups.slug as product_sub_cat','category_sub_groups.name as cat_sub_name')
            ->get();
        }
        else if($type=="category")
        {
            return DB::table('category_groups')
            ->join('category_sub_groups', 'category_groups.id', '=', 'category_sub_groups.category_group_id')
            ->join('categories', 'category_sub_groups.id', '=', 'categories.category_sub_group_id')
            ->join('category_product', 'categories.id', '=', 'category_product.category_id')
            ->join('products', 'category_product.product_id', '=', 'products.id')
            ->join('inventories', 'products.id', '=', 'inventories.product_id')
            ->join('shipping_zones', 'inventories.shop_id', '=', 'shipping_zones.shop_id')
            ->join('shipping_rates', 'shipping_zones.id', '=', 'shipping_rates.shipping_zone_id')
            ->join('images', 'inventories.id', '=', 'images.imageable_id')
            ->where('category_groups.name',$this->my_category)
            ->where('images.imageable_type','App\Inventory')
            ->where('images.featured',1)
            ->where('categories.name', 'like', "%$name%")
            ->select('inventories.*','inventories.id as inventory_id','inventories.id as main_id','products.id as product_id','inventories.title as name','images.path as img_path','inventories.sale_price as min_price','categories.slug as product_cat','categories.name as category_name','category_sub_groups.slug as product_sub_cat','category_sub_groups.name as cat_sub_name')
            ->get();
        }
        
    }

    #endregion

    #region cart list functions
    //--------------------------------------------------------------------cart list page query--start

    public function GetAllTheCartDataForCartList($cart=null)
    {
        if($cart==null)
        {
            $cart_items= DB::table('carts')
            ->join('cart_items', 'cart_items.cart_id', '=', 'carts.id')
            ->join('inventories', 'cart_items.inventory_id', '=', 'inventories.id')
            ->join('images', 'inventories.id', '=', 'images.imageable_id')
            ->where('customer_id',$this->isAuthenticated("id"))
            ->where('images.imageable_type','App\Inventory')
            ->where('images.featured',1)
            ->select('cart_items.*','carts.*','cart_items.quantity as item_quantity','inventories.title as name','inventories.brand as brand','inventories.stock_quantity as stock_quantity','images.path as img_path')
            ->orderBy('carts.created_at', 'DESC')
            ->get();
        }
        else
        {
            $cart_items= DB::table('carts')
            ->join('cart_items', 'cart_items.cart_id', '=', 'carts.id')
            ->join('inventories', 'cart_items.inventory_id', '=', 'inventories.id')
            ->join('images', 'inventories.id', '=', 'images.imageable_id')
            ->where('customer_id',$this->isAuthenticated("id"))
            ->where('images.imageable_type','App\Inventory')
            ->where('images.featured',1)
            ->where('carts.id',$cart->id)
            ->select('cart_items.*','carts.*','cart_items.quantity as item_quantity','inventories.title as name','inventories.brand as brand','inventories.stock_quantity as stock_quantity','images.path as img_path')
            ->orderBy('carts.created_at', 'DESC')
            ->get();
        }
        $cart_items=$this->giveMeUnRepeated_items($cart_items);
        return $cart_items;
    }

    //--------------------------------------------------------------------cart list page query--end
    #endregion
    
    #region account details, address, orders, wishlist
    //-----------------------------------------------------------------account details----start

    #region address
    public function getAllAddressed($address_type=null)
    {
        if($address_type=="Primary")
        {
            return DB::table('addresses')
            ->join('countries', 'addresses.country_id', '=', 'countries.id')
            ->join('states', 'addresses.state_id', '=', 'states.id')
            ->where('addressable_id',$this->isAuthenticated("id"))
            ->where('addressable_type','App\Customer')
            ->where('address_type','Primary')
            ->select('addresses.*','countries.name as country_name','states.name as state_name','countries.id as country_id','states.id as states_id')
            ->first();
        }
        elseif($address_type=="Shipping")
        {
            return DB::table('addresses')
            ->join('countries', 'addresses.country_id', '=', 'countries.id')
            ->join('states', 'addresses.state_id', '=', 'states.id')
            ->where('addressable_id',$this->isAuthenticated("id"))
            ->where('addressable_type','App\Customer')
            ->where('address_type','Shipping')
            ->select('addresses.*','countries.name as country_name','states.name as state_name','countries.id as country_id','states.id as states_id')
            ->get();
        }
        else
        {
            return DB::table('addresses')
            ->join('countries', 'addresses.country_id', '=', 'countries.id')
            ->join('states', 'addresses.state_id', '=', 'states.id')
            ->where('addressable_id',$this->isAuthenticated("id"))
            ->where('addressable_type','App\Customer')
            ->select('addresses.*','countries.name as country_name','states.name as state_name','countries.id as country_id','states.id as states_id')
            ->get();
        }
        
    }

    public function getPerticularAddress($address_id)
    {
        return DB::table('addresses')
        ->join('countries', 'addresses.country_id', '=', 'countries.id')
        ->join('states', 'addresses.state_id', '=', 'states.id')
        ->where('addresses.id',$address_id)
        ->select('addresses.*','countries.name as country_name','states.name as state_name','countries.id as country_id','states.id as states_id')
        ->first();
    }
    #endregion

    #region order
    public function getAllOrders()
    {
        return DB::table('orders')
        ->join('order_statuses', 'orders.order_status_id', '=', 'order_statuses.id')
        ->where('customer_id',$this->isAuthenticated("id"))
        ->whereNull('orders.deleted_at')
        ->select('orders.*','order_statuses.name as order_status_name','order_statuses.label_color as order_label_color')
        ->orderBy('updated_at', 'DESC')
        ->get();
    }

    public function getCurrentOrderData($order_id)
    {
        return DB::table('orders')
        ->join('order_statuses', 'orders.order_status_id', '=', 'order_statuses.id')
        ->join('shipping_rates', 'orders.shipping_rate_id', '=', 'shipping_rates.id')
        ->join('payment_methods', 'orders.payment_method_id', '=', 'payment_methods.id')
        ->where('orders.id',$order_id)
        ->select('orders.*','order_statuses.name as order_status_name','order_statuses.label_color as order_label_color','payment_methods.name as payment_method_name','shipping_rates.delivery_takes as delivery_takes')
        ->first();
    }

    public function getOrderList($order_id)
    {
        return DB::table('orders')
        ->join('order_items', 'orders.id', '=', 'order_items.order_id')
        ->join('inventories', 'order_items.inventory_id', '=', 'inventories.id')
        ->join('images', 'inventories.id', '=', 'images.imageable_id')
        ->where('order_items.order_id',$order_id)
        ->where('images.featured',1)
        ->select('order_items.*','orders.*','order_items.quantity as item_quantity','inventories.title as name','inventories.stock_quantity as stock_quantity','images.path as img_path','inventories.slug as slug')
        ->get();
    }
    #endregion

    #region wishlist

    public function showAllWishlist()
    {
        $wishlist= DB::table('wishlists')
        ->join('inventories', 'wishlists.inventory_id', '=', 'inventories.id')
        ->join('images', 'inventories.id', '=', 'images.imageable_id')
        ->join('products', 'wishlists.product_id', '=', 'products.id')
        ->where('images.imageable_type','App\Inventory')
        ->where('images.featured',1)
        ->where('wishlists.customer_id',$this->isAuthenticated("id"))
        ->select('inventories.*','inventories.id as inventory_id','products.id as product_id','inventories.title as name','images.path as img_path','inventories.sale_price as min_price')
        ->inRandomOrder()->get();

        return $this->giveMeUnRepeated($wishlist);
    }

    #endregion

    //-----------------------------------------------------------------account details----end
    #endregion

    #region check out functions
    //--------------------------------------------------check out page functions start

    public function getShippingDetails($shop_id)
    {
        return DB::table('shipping_zones')
        ->join('shipping_rates', 'shipping_zones.id', '=', 'shipping_rates.shipping_zone_id')
        ->where('shipping_zones.shop_id',$shop_id)
        ->select('shipping_rates.*')
        ->first();
    }
   
    //--------------------------------------------------check out page functions end
    #endregion



    #region shops

    public function shopdata()
    {
        $shop=DB::table('shops')
        ->join('shop_categories','shop_categories.shop_id','=','shops.id')
        ->join('users','users.shop_id','=','shop_categories.shop_id')
        ->join('addresses','addresses.phone','=','users.phone')
        ->join('images', 'shops.id', '=', 'images.imageable_id')
        ->where('images.imageable_type','App\Shop')
        ->where('images.featured',0)
        ->where('shops.slug',session('shop')->slug)
        ->select('shops.*','shops.name as Name','shops.legal_name as shop_name','shops.email as emaildetail','users.phone as mob_no','addresses.address_title as addr_name','addresses.address_line_1 as primaryaddress','addresses.city as addr_city','images.path as img_path','images.name as img_name')->first();
      // dd($shop);
        return $shop;
    }

   
    public function shopcoverimage()
    {
        $shop=DB::table('images')
        ->join('shops','images.imageable_id','=','shops.id')
        ->where('images.imageable_type','App\Shop')
        ->where('images.featured',1)
        ->where('shops.slug',session('shop')->slug)
        ->select('images.path as cover_img','images.name as img_name')->first();
        return $shop;

    }


    #endregion

    #region common functions
    
    public function giveMeUnRepeated($inventory) 
    {
        // NOTE:
        // passing array must have main_id parameter else it will not work
        // or replace main_id from your id 
        $new_inventory=array();
        $unique_id=array();
        foreach($inventory as $inv)
        {
            $flag=false;
            foreach($unique_id as $id)
            {
                if($inv->id==$id)
                {
                    $flag=true;
                    break;
                }
            }
            if($flag==false)
            {
                array_push($new_inventory,$inv);
                array_push($unique_id,$inv->id);
            }
        }
        return $new_inventory;
    }


    public function giveMeUnRepeated_items($inventory) 
    {
        // NOTE:
        // passing array must have main_id parameter else it will not work
        // or replace main_id from your id 
        $new_inventory=array();
        $unique_id=array();
        foreach($inventory as $inv)
        {
            $flag=false;
            foreach($unique_id as $id)
            {
                if($inv->inventory_id==$id)
                {
                    $flag=true;
                    break;
                }
            }
            if($flag==false)
            {
                array_push($new_inventory,$inv);
                array_push($unique_id,$inv->inventory_id);
            }
        }
        return $new_inventory;
    }
    
    public function ip_details($IPaddress) 
    {
        $json       = file_get_contents("http://ipinfo.io/{$IPaddress}");
        $details    = json_decode($json);
        return $details;
    }

    #endregion
  

    #region coupon

    public function validate_coupon($coupon,$cart_id)
    {
        $cart=DB::table('carts')->where('id',$cart_id)->first();
        $mytime = Carbon\Carbon::now();
        $coupon=DB::table('coupons')
        ->where('ending_time','>',$mytime)
        ->where('min_order_amount','<',$cart->grand_total)
        ->where('active','=',1)
        ->where('min_order_amount','<',$cart->grand_total)->first();
        return $coupon;
    }

    #endregion







    

    #region mix pannel region

    public function create_or_update_customer_mixpannel(Request $request,$user_id,$extra_features_array=null)
    {
        $customer_data=Customer::where('staffid',$user_id)->first();
       
        $first_name = $customer_data->firstname;
      
        $required_info=array(
            '$first_name'       => $first_name,
            '$last_name'        => "",
            '$email'            => $customer_data->email,
            '$phone'            => $customer_data->phonenumber
        );
      
        if($extra_features_array!=null)
        $data = array_merge($required_info,$extra_features_array);
        else
        $data=$required_info;
       
        $mp = Mixpanel::getInstance(env('MIXPANEL_PROJECT_TOKEN'));
        $mp->people->set($user_id, $data, $ip = $request->ip(), $ignore_time = false);
    }

    public function increment_customer_data($user_id,$feature,$increment_count=1)
    {
        $mp = Mixpanel::getInstance(env('MIXPANEL_PROJECT_TOKEN'));
        $mp->people->increment($user_id,$feature, $increment_count);
    }

    public function decrement_customer_data($user_id,$feature,$decrement_count=1)
    {
        $mp = Mixpanel::getInstance(env('MIXPANEL_PROJECT_TOKEN'));
        $mp->people->decrement($user_id,$feature,$decrement_count*-1);
    }

    public function make_new_track($key,$array_parameters)
    {
        $mp = Mixpanel::getInstance(env('MIXPANEL_PROJECT_TOKEN'));
        $mp->track($key,$array_parameters); 
    }

    public function update_track($key)
    {
        $mp = Mixpanel::getInstance(env('MIXPANEL_PROJECT_TOKEN'));
        $mp->track($key);
    }

    public function register_new_track($key,$param)
    {
        // register the Ad Source super property
        $mp = Mixpanel::getInstance(env('MIXPANEL_PROJECT_TOKEN'));
        $mp->register($key, $param);
    }

    public function earned_from_customer($user_id,$charges_earned)
    {
        // use Carbon\Carbon;
        $current_date_time = Carbon::now()->toDateTimeString(); // Produces something like "2019-03-11 12:25:00"
        $mp = Mixpanel::getInstance(env('MIXPANEL_PROJECT_TOKEN'));
        $mp->people->trackCharge($user_id, $charges_earned,$current_date_time);
    }


    #endregion

    public function update_user_activity($user_id)
       {
            $date = Carbon::now()->subDays(1);
            $employee_activity=DB::table('employee_activity')->where('user_id',$user_id)->where('created_at', '>', $date)->orderBy('created_at', 'DESC')->first();
            
            if(!$employee_activity)
            {
                //insert new row and update to mixpannel
                DB::table('employee_activity')->insert( array( 'user_id'     =>   $user_id));
                $this->update_track("Daily Visitors");
            }

       }



}
