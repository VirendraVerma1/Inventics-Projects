<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class OtherController extends Controller
{
    public function aboutusindex()
    {
        return view('AboutUs.index');
    }

    public function faqindex()
    {
        $faqs=DB::table('faqs')->get();
        return view('Faq.index',compact('faqs'));
    }

    public function errorindex()
    {
        return view('Error.index');
    }

    public function commingsoonindex()
    {
        return view('CommingSoon.index');
    
    }

    #region gallery
    //--------------------------------gallary things---

    public function galleryindex()
    {
        //containing all the categories
        $custom_categories=$this->getsubgroupcategories(100);
        return view('Gallery.index',compact('custom_categories'));
    }

    public function gallerycategoies(Request $request)
    {
        $categories=$this->getsubgroupcategories();

        $custom_categories=array();
        foreach($categories as $subgroup)
        {
            //filter searched categories
            if($subgroup->cat_sub_name==$request->subgroup)
            {
                array_push($custom_categories,$subgroup);
            }
        }
        
        return view('Gallery.custom_categories',compact('custom_categories'));
    }

    #endregion

    #region contact us
    //-------------------contact us------------------------
    
    public function contactusindex()
    {
        $hidefooterinfo=true;
        return view('ContactUs.index',compact('hidefooterinfo'));
    }

    public function save_msg_from_contactUs(Request $request)
    {
        $username=$request->firstname." ".$request->lastname;
        $msg_save=DB::table('contact_us')
            ->insert(['name' => $username,
            'phone' => $request->phone,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message]);

        if($msg_save)
        session()->flash('success', 'Message has been sent');
        else
        session()->flash('danger', 'some error occured');
        
        $hidefooterinfo=true;
        return view('ContactUs.index',compact('hidefooterinfo'));
    }

    #endregion
}
