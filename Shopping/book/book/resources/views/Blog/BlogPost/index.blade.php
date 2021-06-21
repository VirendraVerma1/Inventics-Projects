@extends('layout.master')
@section('content')
<div class="page-content">
    @include('Blog.destination')
    <div class="holder">
      <div class="container">
        <div class="page-title text-center">
          <h1>Blog Post</h1>
        </div>
        <div class="row">
           @include('Blog.BlogPost.content')
           @include('Blog.sideoptions')
        </div>
      </div>
    </div>
  </div>
  
@endsection