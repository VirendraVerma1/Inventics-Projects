<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    
    public function index(Request $request)
    {
        
        $name=($request->searchB) ? $request->searchB:'';
        $categories=Category::search('name',$name)->orWhere('description', 'like', "%$name%")->paginate(10);
        
        return view('category.index',compact('categories','name'));
    }

    public function deletedindex()
    {
        // $categories=Category::all();
        $categories=Category::orderBy('name','ASC')->onlyTrashed()->paginate(5);
        return view('category.deletedindex')->withCategories($categories);
    }

    
    public function create()
    {
        return view('category.create');
    }

    
    public function store(Request $request)
    {
        $category=new Category();
        $str=strtolower($request->name);
        $slug = preg_replace('/\s+/', '-', $str);
        $random = Str::random(5);
        $category->slug=$slug.$random;
        $category->name=$request->name;
        $category->description=$request->description;
        $category->save();
        return redirect()->route('category.index');
    }

    
    public function show(Category $category)
    {
        //
    }

    
    public function edit( $slug)
    {
        $category=Category::where('slug',$slug)->first();
        return view('category.edit')->withCategory($category);
    }

    
    public function update(Request $request,$slug )
    {
       
        $category=Category::where('slug',$slug)->first();;
        $str=strtolower($request->name);
        $slug = preg_replace('/\s+/', '-', $str);
        $random = Str::random(5);
        $category->slug=$slug.$random;
        $category->name=$request->name;
        $category->description=$request->description;
        
        $category->save();
        return redirect()->route('category.index');
    }

    
    public function destroy($slug)
    {
        $category=Category::withTrashed()->where('slug',$slug)->first();
        if($category->deleted_at){
            $category->forcedelete();
            session()->flash('success', 'Category Permanently Deleted !');
        }
        else{

            $flag=0;
            foreach($category->blogs as $blog)
            {
                if($blog!=null)
                {
                    $flag=1;
                }
            }
            if($flag>0)
            {
                echo "error";
                session()->flash('message', 'cannot delete this item, please delete attached blog first !');
            }else{
                $category->delete();
                session()->flash('message', 'Category Soft Deleted !');
            }

            
        }
        
        
        return redirect()->back();
    }

    public function restore($slug)
    {
        $cat=Category::onlyTrashed()->where('slug',$slug)->find($id);
        $cat->restore();
        session()->flash('success', 'Category restored !');
        return redirect()->back();
    }
}
