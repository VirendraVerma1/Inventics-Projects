@extends('layout.master')
@section('content')
  <div class="page-content">
    <div class="holder breadcrumbs-wrap mt-0">
      <div class="container">
        <ul class="breadcrumbs">
          <li><a href="{{route('Category',$current_category->slug)}}">{{$current_subgroup->name}}</a></li>
          <li><a href="{{route('Category',$current_category->slug)}}">{{$current_category->name}}</a></li>
          <li><span>{{$product->name}}</span></li>
        </ul>
      </div>
    </div>
    <div class="holder">
      <div class="container js-prd-gallery" id="prdGallery">
        @include('Product.product_header')
        <div class="row prd-block prd-block--prv-bottom">
          @include('Product.product_image')
          @include('Product.product_short_description')
        </div>
      </div>
    </div>
    @include('Product.product_text_holder')
    @include('Product.more_details')
    @include('CommonContent.youmayalsolike')
  </div>
@endsection