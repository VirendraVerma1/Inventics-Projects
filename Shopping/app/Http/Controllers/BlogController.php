<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blogcategoryindex()
    {
        $img_url=$this->server_image_path;
        $current_currency=$this->current_currency;
        $categories=$this->getsubgroup();
        $sub_categories=$this->getsubgroupcategories();
        $cat_product=$this->getcategoriesproduct();

        $blogs=$this->getblogs();
        //dd($blogs);
        //dd($categories);
        return view('Blog.BlogCategory.index',compact('categories','sub_categories','cat_product','img_url','current_currency','blogs'));
    }

    public function bloglistindex()
    {
        
        $img_url=$this->server_image_path;
        $current_currency=$this->current_currency;
        $categories=$this->getsubgroup();
        $sub_categories=$this->getsubgroupcategories();
        //getting with images
        $cat_product=$this->getcategoriesproduct();

        //dd($categories);
        
        return view('Blog.BlogList.index',compact('categories','sub_categories','cat_product','img_url','current_currency'));
    }

    public function blogpostindex($slug)
    {
        
        $img_url=$this->server_image_path;
        $current_currency=$this->current_currency;
        $categories=$this->getsubgroup();
        $sub_categories=$this->getsubgroupcategories();
        $cat_product=$this->getcategoriesproduct();

        $blogs=$this->getblogs();
        $allblogtags=$this->getBlogTags();
        $current_blog=$this->getblogs($slug);
        $current_blog_comments=$this->getcurrentBlogComments($slug);
        $current_blog_tags=$this->getBlogTags($slug);

        $popular_blog=array();
        $tempLike=0;
        foreach($blogs as $blog)
        {
            if($blog->likes>=$tempLike && $blog->slug!=$slug)
            {
                $tempLike=$blog->likes;
                $popular_blog=$blog;
            }
        }
        $popular_blog_comments=$this->getcurrentBlogComments($popular_blog->slug);
       // dd($allblogtags);
        
        return view('Blog.BlogPost.index',compact('categories','sub_categories','cat_product','img_url','current_currency','current_blog','blogs','slug','current_blog_comments','allblogtags','current_blog_tags','popular_blog','popular_blog_comments'));
    }
}
