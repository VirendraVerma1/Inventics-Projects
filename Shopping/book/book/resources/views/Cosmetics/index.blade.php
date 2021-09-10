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

  @if(count($banners)>0)
  @include('Cosmetics.first_banner')
  @endif

  @include('Cosmetics.collections')
    
  @include('Cosmetics.sales_product')

  </div>
  

  @endsection