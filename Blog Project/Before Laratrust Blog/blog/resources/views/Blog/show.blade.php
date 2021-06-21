@extends('layouts.app')
@section('content')
@php
$index=1;
@endphp
<div class="container">
<div class="card">
  <div class="card-header">
    {{$blog->name}}({{$blog->category->name}})
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      
      <!---<footer class="blockquote-footer">Category- <cite title="Source Title">{{$blog->category->name}}</cite></footer>--->
      <footer class="blockquote-footer"> <cite title="Source Title">
      @foreach($blog->tags as $tag)
      #{{$tag->name}}
      @endforeach
      </cite></footer>
      <p>{{$blog->description}}</p>
    </blockquote>
  </div>

  @if($blog->image)
  <img style="height:40%;width:40%;" src="{{asset('image/'.$blog->image)}}" alt="">
  @endif
  
  <a href="{{route('blog.back')}}">Close</a>
</div>
</div>
@endsection