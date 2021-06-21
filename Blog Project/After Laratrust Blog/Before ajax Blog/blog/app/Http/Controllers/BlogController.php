<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use App\Tag;
use Session;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Photo;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name=($request->searchB) ? $request->searchB:'';
        $blogs=Blog::search('name',$name)->paginate(10);
        //$blogs=Blog::search('name',$name)->paginate(10);
        //$blogs=Blog::all();
        return view('Blog.index',compact('blogs','name'));
    }

    public function deletedindex()
    {
        // $blogs=Blog::all();
        $blogs=Blog::onlyTrashed()->paginate(5);
        return view('Blog.deletedindex')->withBlogs($blogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $tags=Tag::all();
        return view('Blog.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['name'=>'required|unique:blogs,name|min:3|max:10',
        'description'=>'required',
        'tags'=>'required',
        'category'=>'required']);


        $blogs=new Blog();
        $str=strtolower($request->name);
        $slug = preg_replace('/\s+/', '-', $str);
        $random = Str::random(5);
        $blogs->slug=$slug.$random;
        $blogs->name=$request->name;
        $blogs->description=$request->description;
        $blogs->category_id=$request->category;

        //image save
        if($request->file('image'))
        {
            // $$extension=$request->file('image')->getClientOriginalExtension();
            // if($extension!='png' || $extension!='jpg' || $extension!='jpeg')
            // {
            //     session()->flash('danger', 'uploaded file is not an image! TRY AGAIN');
            //     return redirect()->back();
            // }

            $filename=$this->uploadImage($request->file('image'));
            $blogs->image=$filename;
        }



        $blogs->save();
        $blogs->tags()->sync($request->tags);

        session()->flash('created','Blog Created Succesfully');
        session()->put('latest',$request->name);
        return redirect()->route('blog.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('Blog.show')->withBlog($blog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        
        $categories=Category::all();
        $tags=Tag::all();
        return view('Blog.edit',compact('categories','tags','blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $blog->name=$request->name;
        $blog->description=$request->description;
        $blog->category_id=$request->category;

        $str=strtolower($request->name);
        $slug = preg_replace('/\s+/', '-', $str);
        $random = Str::random(5);
        $blog->slug=$slug.$random;

        //image save
        if($request->file('image'))
        {
            $extension=$request->file('image')->getClientOriginalExtension();
            // dd($extension);
            // if($extension!=='png' || $extension!=='jpg' || $extension!=='jpeg')
            // {
            //     session()->flash('danger', 'uploaded file is not an image! TRY AGAIN');
            //     return redirect()->back();
            // }
            if($blog->image)
            $delete=$this->delete_image($blog->image);

            $filename=$this->uploadImage($request->file('image'));
            $blog->image=$filename;
        }


        $blog->save();
        $blog->tags()->sync($request->tags);
        session()->flash('updated','Blog Updated Succesfully');
        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        
        // $blog->delete();
        // session()->flash('deleted','Blog Deleted Succesfully');
        // 

         $blog=Blog::withTrashed()->where('slug',$slug)->first();
        if($blog->deleted_at){
            $blog->forcedelete();
            session()->flash('success', 'Blog Permanently Deleted !');
        }
        else{
            $blog->delete();
            session()->flash('success', 'Blog Soft Deleted !');
        }
        return redirect()->back();
    }


    public function backtopage()
    {
        return redirect()->back();
    }

    public function restore($slug)
    {
        $blog=Blog::onlyTrashed()->where('slug',$slug)->first();
        $blog->restore();
        session()->flash('success', 'Blog restored !');
        return redirect()->back();
    }

    public function uploadImage($image)
    {
        $random_name=time(); //random name
        $extension=$image->getClientOriginalExtension();
        $filename=$random_name.'.'.$extension;
        Photo::make($image)->save(public_path('image/'. $filename));
        return $filename;
    }
    private function delete_image($image)
    {
        $filename = public_path('image/' . $image);
        unlink($filename);
    }

    public function delete_image_only($slug)
    {
        $blog=Blog::where('slug',$slug)->first();
        $image=$blog->image;
        $filename = public_path('image/' . $image);
        unlink($filename);
        $blog->image=null;
        $blog->save();
        //session(['editblogid' => $id]);
        return redirect()->route('blog.edit',$id);
    }

}
