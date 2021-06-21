<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        $name=($request->searchB) ? $request->searchB:'';
        $tags=Tag::search('name',$name)->paginate(10);
        
        return view('Tag.index',compact('tags','name'));
    }

    public function deletedindex()
    {
        // $blogs=Blog::all();
        $tags=Tag::onlyTrashed()->paginate(5);
        return view('Tag.deletedindex')->withTags($tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tag=new Tag();
        $tag->name=$request->name;
        $tag->save();
        return redirect()->route('tag.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('Tag.edit')->withTag($tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $tag->name=$request->name;
        $tag->save();
        return redirect()->route('tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag=Tag::withTrashed()->find($id);
        if($tag->deleted_at){
            $tag->forcedelete();
            session()->flash('success', 'Blog Permanently Deleted !');
        }
        else{
            $tag->delete();
            session()->flash('success', 'Blog Soft Deleted !');
        }
        return redirect()->back();

    }

    public function restore($id)
    {
        $tag=Tag::onlyTrashed()->find($id);
        $tag->restore();
        session()->flash('success', 'Blog restored !');
        return redirect()->back();
    }
}
