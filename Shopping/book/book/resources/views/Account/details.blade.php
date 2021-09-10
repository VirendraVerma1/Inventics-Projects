@extends('layouts.master')
@section('title')
<title>Electronics Account Details</title>
@endsection

@section('content')
<div class="page-content">
    <div class="holder breadcrumbs-wrap mt-0">
      <div class="container">
        <ul class="breadcrumbs">
          <li><a href="/">Home</a></li>
          <li><span>My account</span></li>
        </ul>
      </div>
    </div>
 
    <div class="holder px-2">
        <div class="container">
            <div class="row">
                @include('layouts.account.menu')
                @include('layouts.account.ac_detail')
            </div>

        </div>
    </div>

</div>   
@endsection