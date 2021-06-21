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
  <a class="btn btn-warning" href="{{route('blog.restore',$blog->id)}}">restore</a>&emsp;
  <a class="btn btn-primary" href="{{route('blog.show',$blog->id)}}">show</a>&emsp;
  <button class="btn btn-danger btn-sm" type="submit">delete</button>&emsp;
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