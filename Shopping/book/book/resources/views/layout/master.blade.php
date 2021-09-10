@php
if(isset($titlename))
$temptitle=$titlename;
else
$temptitle = Route::currentRouteName();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>{{$temptitle}}</title>
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/favicon.ico')}}" />
  <!-- Vendor CSS -->
  <link href="{{asset('css/vendor/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/vendor/vendor.min.css')}}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{asset('css/style-books.css')}}" rel="stylesheet">
  <link href="{{asset('css/style.css')}}" rel="stylesheet">
  <!-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 
  <!-- or -->
  <!-- <link href="{{asset('css/style-books.css')}}" rel="stylesheet"> -->
  <!-- if having frontend folder under public -->
  <!-- <link href="{{asset('frontend/css/style-books.css')}}" rel="stylesheet">   -->
  <!-- Custom font -->
  <link href="{{asset('fonts/icomoon/icons.css')}}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Hind%20Siliguri:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Open%20Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>

@include('layout.commoncss')

<body 
@if(isset($tempcategory))
class="template-collection has-smround-btns has-loader-bg equal-height has-sm-container"
@elseif(!isset($tempBooks))
class="template-product has-smround-btns has-loader-bg equal-height has-sm-container"
@endif
>

<!-- <div class="ajaxloader">
      <div class="loadbar" align="center">
        <img src="images/ajax-loader.gif" >
        <p style="color:white"><b>Please Wait...</b></p>
      </div>
</div> -->

      @php
        if(isset($tempBooks))
        {
          if($tempBooks)
          {
            @endphp @include('layout.Navigation.navbar') @php
          }
        }
        else
        {
          @endphp @include('layout.Navigation.navbar_second') @php
        }
      @endphp
      
   @include('CommonContent.quickview')
    
      
    <!-- main content -->
    @yield('content')
    <!-- main content end -->
    
    
    @include('layout.mobilemenu')
    @include('layout.footer.second_footer')
    
    
 
    @php
        if(isset($tempBooks))
        {
          if($tempBooks)
          {
            @endphp  @include('layout.stickyaddtocart') @php
          }
        }
    @endphp

   {{-- @include('layout.paymentnotification') --}}
   @include('layout.customnotification')
    @guest
    {{--@include('layout.popupnews')--}}
    @endguest

    {{--@include('CommonContent.quickview1')--}}
    @include('layout.commonjsfunction')

  <script src="{{asset('js/vendor-special/lazysizes.min.js')}}"></script>
  <script src="{{asset('js/vendor-special/ls.bgset.min.js')}}"></script>
  <script src="{{asset('js/vendor-special/ls.aspectratio.min.js')}}"></script>
  <script src="{{asset('js/vendor-special/jquery.min.js')}}"></script>
  <script src="{{asset('js/vendor-special/jquery.ez-plus.js')}}"></script>
  <script src="{{asset('js/vendor/vendor.min.js')}}"></script>
  <script src="{{asset('js/app-html.js')}}"></script>

  
</body>

</html>