@extends('layouts.app')
@section('content')
@php
$index=1;
@endphp

@if(session('created'))
  <div class="alert alert-success">{{session('created')}}</div>
@endif
@if(session('updated'))
  <div class="alert alert-warning">{{session('updated')}}</div>
@endif
@if(session('deleted'))
  <div class="alert alert-danger">{{session('deleted')}}</div>
@endif

<div class="container">
<h3 class="title">Blog List  <a style="text-decoration:none;" href="{{route('blog.create')}}">+</a></h3>

<div class="row">
<div class="col-md-2" style=""></div>
<div class="col-md-2">{{$blogs->links()}}</div>
</div>
<div class="col-md-3" style="float:right;">
<form action="">
<div class="row">
<input class="col-md-5" style="width" name="searchB" value="{{$name}}" type="text" placeholder="search blog">
<button class="col-md-2 btn btn-info">GO</button>&emsp;
</div>
</form>
</div>


<table class="table table-striped">
  <thead>
  <tr>
  <th>#</th>
  <th>Name</th>
  <th>Category</th>
  <th>Tags</th>
  <th>Action</th>
  </tr>
  </thead>
  <tbody>
  @foreach($blogs as $blog)
  <tr>
  <td>{{$index++}}</td>
  <td>{{$blog->name}}</td>
  <td>{{$blog->category->name}}</td>
  <td>
  @foreach($blog->tags as $tag)
  <a style="color:black;"class="badge badge-light" href="{{route('blog.show',$blog)}}">{{$tag->name}}</a>
  @endforeach
  </td>
  <td>
  <div class="row">
  
  <form action="{{route('blog.destroy',$blog->id)}}" method="post">
  @csrf()
  @method('delete')
  <a class="btn btn-primary" href="{{route('blog.edit',$blog->id)}}">edit</a>&emsp;
  <a class="btn btn-primary" href="{{route('blog.show',$blog->id)}}">show</a>&emsp;
  <a class="btn btn-primary" href="{{route('blog.delete',$blog->id)}}">delete</a>&emsp;
  </form>
  </div>
  </td>
  </tr>
  @endforeach
  </tbody>
</table>
{{ $blogs->links() }}
</div>
@endsection