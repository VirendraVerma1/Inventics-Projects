@extends('layout.master')
@section('content')
<div class="page-content">
    @include('Cart.CartPage.destination')
    <div class="holder">
      <div class="container">
        <div class="page-title text-center">
          <h1>Shopping Cart</h1>
        </div>
        
          @include('Cart.CartPage.cartlist')
          
       
      </div>
    </div>
  </div>
  
@endsection