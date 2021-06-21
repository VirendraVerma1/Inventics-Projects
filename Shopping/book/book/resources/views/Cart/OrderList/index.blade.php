@extends('layout.master')
@section('content')
<div class="page-content">
    @include('Cart.OrderList.destination')
    <div class="holder">
      <div class="container">
        <div class="page-title text-center">
          <h1>Order List</h1>
        </div>
        
          @include('Cart.OrderList.orderlist')
          
      </div>
    </div>
  </div>
  
@endsection