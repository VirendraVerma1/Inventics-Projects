@php
  $counter=0;
@endphp
@extends('layout.master')
@section('content')

<div class="page-content">
    <!-- Main Slider -->
  @include('Cosmetics.main_slider')
    <!-- //Main Slider -->
  @include('Cosmetics.featured')

  @include('Cosmetics.first_banner')

  @include('Cosmetics.collections')
    
  @include('Cosmetics.sales_product')

  @include('Cosmetics.comments')
  </div>
  

  @endsection