@extends('layouts.master')
@section('title')
<title>Electronics order hisitory</title>
@endsection

@section('content')
<div class="page-content px-2">
    <div class="holder breadcrumbs-wrap mt-0">
      <div class="container">
        <ul class="breadcrumbs">
          <li><a href="/">Home</a></li>
          <li><a href="{{route('Account','details')}}"><span>My account</span></a></li>
          <li><span>Order history</span></li>
        </ul>
      </div>
    </div>
 
    <div class="holder">
        <div class="container">
            <div class="row">
                @include('layouts.account.menu')
                @include('layouts.account.order_history')
            </div>
        </div>       
    </div>
@include('layouts.shop_feature')
</div>  
@endsection