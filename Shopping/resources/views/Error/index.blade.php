
@extends('layout.master')

@section('content')
<div class="page-content">
    <div class="holder breadcrumbs-wrap mt-0">
      <div class="container">
        <ul class="breadcrumbs">
          <li><a href="{{route('Books')}}">Home</a></li>
          <li><span>Page 404</span></li>
        </ul>
      </div>
    </div>
    <div class="holder mt-0 mb-4 mb-lg-10">
      <div class="container">
        <div class="page404-bg">
          <div class="page404-text">
            <div class="txt1">4<i class="icon-old-sweater"></i>4</div>
            <div class="txt2">Page not found!</div>
          </div>
          <svg id="morphing" xmlns="http://www.w3.org/2000/svg" width="600" height="600" viewBox="0 0 600 600">
            <g transform="translate(50,50)">
              <path class="p" d="M93.5441 2.30824C127.414 -1.02781 167.142 -4.63212 188.625 21.7114C210.22 48.1931 199.088 86.5178 188.761 119.068C179.736 147.517 162.617 171.844 136.426 186.243C108.079 201.828 73.804 212.713 44.915 198.152C16.4428 183.802 6.66731 149.747 1.64848 118.312C-2.87856 89.9563 1.56309 60.9032 19.4066 38.3787C37.3451 15.7342 64.7587 5.14348 93.5441 2.30824Z" />
            </g>
          </svg>
        </div>
        <div class="page404-info text-center">
          <a href="#" class="btn">Go Back</a>
        </div>
      </div>
    </div>
  </div>
  @endsection