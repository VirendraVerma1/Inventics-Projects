<?php

namespace App\Http\Controllers;

use DB;
use App\Books;
use Illuminate\Http\Request;
use Session;
use Mixpanel;
use Illuminate\Support\Facades\Auth;

class BooksController extends Controller
{
    
    public function index()
    {
        

        // Auth::logout();
        $wishlist=$this->showAllWishlist();
        
        $tempBooks=true;
        $sliders=$this->getSlider();
        $banners=$this->getBanners();
        $promo_banner=array();
        $bottom_banner=array();
        foreach($banners as $bann)
        {
            if($bann->group_id=="promo_banner")
                $promo_banner=$bann;
            elseif($bann->group_id=="bottom")
                array_push($bottom_banner,$bann);
        }
        //dd($cat_product);
        //session()->flash('success', 'Welcome again');

        return view('Books.index',compact('tempBooks','promo_banner','bottom_banner','sliders','wishlist'));
    }

    

    public function product_cat_Index($name)
    {
        $cat_product=$this->getcategoriesproduct();
        return view('CommonContent.producttest',compact('cat_product'));
    }
   
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show(Books $books)
    {
        //
    }

    
    public function edit(Books $books)
    {
        //
    }

    
    public function update(Request $request, Books $books)
    {
        //
    }

    public function destroy(Books $books)
    {
        //
    }
    
}
