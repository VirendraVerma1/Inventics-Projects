@extends('layouts.app')
@section('content')
<div class="container">
<div class="card"  style="width: 90%;">
  <div class="card-body">
    

<div class="container">
<h3 class="title">Category List<a style="text-decoration:none;" href="{{route('category.create')}}">+</a></h3>
<table class="table table-striped">
  <thead>
  <tr>
  <th>#</th>
  <th>Name</th>
  <th>Blogs</th>
  <th>Description</th>
  <th>Action</th>
  </tr>
  </thead>
  <tbody>
  @foreach($categories as $category)
  <tr>
  <td>{{$category->id}}</td>
  <td>{{$category->name}}</td>
  <td>
  @foreach($category->blogs as $blog)
  <a style="color:black;"class="badge badge-light" href="{{route('blog.show',$blog)}}">{{$blog->name}}</a>
  @endforeach
  </td>
  <td style="width:60%;">{{$category->description}}</td>
  <td>
  
  @if(Auth::user())
  <form action="{{route('category.delete',$category->slug)}}"method="post">
    @csrf()
    @method('delete')
    <a class="btn btn-warning btn-sm" href="{{route('category.restore',$category->slug)}}">restore</a>&emsp;
    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
  </form>
  @endif
  </td>
  </tr>
  @endforeach
  </tbody>
</table>
</div>



</div>
</div>
{{ $categories->links() }}
</div>
@endsection