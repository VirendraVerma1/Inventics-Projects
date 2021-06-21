@extends('layouts.app')
@section('content')
<div class="container">
<h3 class="title">Blog Edit</h3>
<form action="{{route('blog.update',$blog)}}" method="post" enctype="multipart/form-data">
@csrf()
@method('put')
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" name="name" value="{{$blog->name}}" placeholder="name">
  </div>
  <div class="form-group">
  <label for="exampleInputEmail1">Category</label>
  <select name="category" class="js-example-basic-single form-control" required>
    <option value="{{$blog->category->id}}">{{$blog->category->name}}</option>
    @foreach($categories as $category)
    <option 
    @if($category->id==$blog->category_id)
    selected
    @endif
    value="{{$category->id}}">{{$category->name}}</option>
    @endforeach
    </select>
    </div>


    <div class="form-group">
  <label for="exampleInputEmail1">Image</label><br>
<img style="height:15%;width:15%;" src="{{asset('image/'.$blog->image)}}" alt="">
<input type="file" name="image">
<a href="{{route('blog.deleteonlyimage',$blog->id)}}">X</a>
</div>


    <div class="form-group">
  <label for="exampleInputEmail1">Tags</label>
  <select name="tags[]" class="js-example-basic-multiple form-control" multiple required>
    <!---<option value="{{$blog->category->id}}">{{$blog->category->name}}</option>-->
    @foreach($tags as $tag)
    <option 
    @foreach($blog->tags as $t)
      @if($t->id==$tag->id)
      selected
      @endif
    @endforeach
    value="{{$tag->id}}">{{$tag->name}}</option>
    @endforeach
    </select>
    </div>



  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <textarea class="form-control" name="description" placeholder="description">{{$blog->description}}</textarea>
  </div>
 
  <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
@endsection