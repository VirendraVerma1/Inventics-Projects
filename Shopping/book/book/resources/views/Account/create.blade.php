@extends('layouts.master')
@section('title')
    <title>Electronics Sign Up</title>
@endsection

@section('content')
<div class="page-content">
    <div class="holder breadcrumbs-wrap mt-0">
      <div class="container">
        <ul class="breadcrumbs">
          <li><a href="/">Home</a></li>
          <li><span>Create account</span></li>
        </ul>
      </div>
    </div>

    @include('layouts.account.signup_form')
    <!--terms&condition-->
    @include('layouts.account.terms&condition')
    <!--/terms&condition-->
    
    <!--cookies-->
    @include('layouts.account.cookie_policies')
    <!--/cookies-->
</div>
@endsection