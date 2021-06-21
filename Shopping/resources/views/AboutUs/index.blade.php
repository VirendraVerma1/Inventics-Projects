@extends('layout.master')
@section('content')
<div class="page-content">
    @include('AboutUs.description')
    @include('AboutUs.why_shop_with_us')
    @include('AboutUs.sales')
    @include('AboutUs.our_team')
    @include('CommonContent.newsletter')
    @include('AboutUs.others')
  </div>
  
@endsection