@extends('layout.master')
@section('content')
<div class="page-content">
    <div class="holder breadcrumbs-wrap mt-0">
      <div class="container">
        <ul class="breadcrumbs">
          <li><a href="{{route('Books')}}">Home</a></li>
          <li><span>Cart</span></li>
        </ul>
      </div>
    </div>
    <div class="holder mt-0">
      <div class="container">
        <div class="page404-bg">
          <div class="page404-text">
            <div class="txt1"><img src="{{asset('images/pages/tumbleweed.gif')}}" alt=""></div>
            <div class="txt2">Your shopping cart is empty!</div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection