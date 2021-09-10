@extends('layouts.master')
@section('title')
<title>Electronics Account Details</title>
@endsection

@section('content')

<div class="page-content px-2">
    <div class="holder breadcrumbs-wrap mt-0">
      <div class="container">
        <ul class="breadcrumbs">
          <li><a href="/">Home</a></li>
          <li><a href="{{route('Account','details')}}"><span>My account</span></a></li>
          <li><span>Addresses</span></li>
        </ul>
      </div>
    </div>
 
    <div class="holder">
        <div class="container">
            <div class="row">
                @include('layouts.account.menu')
                
                @include('layouts.account.address_content')
                
            </div>
        </div>
    </div>

</div>   

@endsection