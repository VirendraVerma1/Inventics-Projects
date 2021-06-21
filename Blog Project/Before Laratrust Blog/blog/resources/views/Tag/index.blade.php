@extends('layouts.app')
@php
$index=1;

@endphp

@section('content')
<div class="container">
<h3 class="title">Tag List<a style="text-decoration:none;" href="{{route('tag.create')}}">+</a></h3>


<div class="row">
<div class="col-md-2" style=""></div>
<div class="col-md-2">{{$tags->links()}}</div>
</div>
<div class="col-md-6" style="float:right;">
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
  <th>Blogs</th>
  <th>Action</th>
  </tr>
  </thead>
  <tbody>
  @foreach($tags as $tag)
  <tr>
  <td>{{$index++}}</td>
  <td>{{$tag->name}}</td>
  <td>
  @foreach($tag->blogs as $blog)
  <a style="color:black;"class="badge badge-light" href="{{route('blog.show',$blog)}}">{{$blog->name}}</a>
  @endforeach
  </td>
  <td>
  <a class="btn btn-info btn-sm" href="{{route('tag.edit',$tag)}}">edit</a>
  <form action="{{route('tag.destroy',$tag)}}"method="post">
    @csrf()
    @method('delete')
    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
  </form>
  </td>
  </tr>
  @endforeach
  </tbody>
</table>
</div>
@endsection