@extends('layout.master')
@section('content')
<div class="page-content">
    @include('Cart.CartPage.destination')
    <div class="holder">
      <div class="container">
        <h1 class="text-center">Checkout page</h1>
        <div class="row">
          <div class="col-md-9">
            @include('Cart.CheckOut.shippingaddress')
            @include('Cart.CheckOut.billing')
          </div>
          <div class="col-md-9 mt-2 mt-md-0">
             @include('Cart.CheckOut.deliverymethod')
            <div class="mt-2"></div>
            @include('Cart.CheckOut.payment')
            <div class="mt-2"></div>
            @include('Cart.CheckOut.ordercomment')
          </div>
        </div>
        <div class="mt-3"></div>
        <h2 class="custom-color">Order Summary</h2>
        <div class="row">
          @include('Cart.CheckOut.ordersummarylist')
          @include('Cart.CheckOut.applypromo')
        </div>
      </div>
    </div>
  </div>
  
  
@endsection