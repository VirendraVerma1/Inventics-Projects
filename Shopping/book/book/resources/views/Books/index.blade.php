@php
  $counter=0;
@endphp
@extends('layout.master')
@section('content')
<div class="page-content">

    @include('Books.mainad')
    @include('Books.bestseller')
    
    @include('Books.trendingbooks')
    @include('Books.authoroftheweek')
    @php
      $counter=4;
    @endphp
    @include('Books.booksforknowledge')
    @include('Books.collection')

  </div>
@endsection