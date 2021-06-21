@extends('layouts.app')
@php
$index=1;

@endphp

@section('content')
<div class="container">
<h3 class="title">Tag List<a style="text-decoration:none;" href="{{route('tag.create')}}">+</a></h3>
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
  <a class="btn btn-warning btn-sm" href="{{route('tag.restore',$tag->id)}}">restore</a>
  <form action="{{route('tag.destroy',$tag)}}"method="post">
    @csrf()
    @method('delete')
    <a class="btn btn-danger btn-sm" href="{{route('tag.delete',$tag->id)}}">delete</a>
  </form>
  </td>
  </tr>
  @endforeach
  </tbody>
</table>
</div>
@endsection