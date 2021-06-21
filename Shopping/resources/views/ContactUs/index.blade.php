@extends('layout.master')
{{--@include('ContactUs.app')--}}
@section('content')
<div class="page-content">
    @include('ContactUs.description')
    @include('ContactUs.our_information')
    <div class="holder">
      <div class="container">
        <div class="row vert-margin">
          @include('ContactUs.message_form')
          @include('ContactUs.map')
        </div>
      </div>
    </div>
    @include('ContactUs.newsletter')
  </div>
  
@endsection