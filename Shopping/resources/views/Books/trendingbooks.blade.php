@php
  $testcounter=1;
@endphp
<div class="holder holder-mt-medium section-name-products-grid holder-with-bg holder-pt-medium holder-pb-medium" id="productsGrid01" style="background-color: #fcfcfc">
      <div class="container">
        <div class="title-wrap text-center">
        <h2 class="h1-style">Trending Books</h2>
          <div class="title-wrap title-tabs-wrap text-center js-title-tabs">
            <div class="title-tabs">
              @foreach($categories as $cat)
                @if($testcounter<4)
                <h2 class="h3-style">
                  <a href="#" onclick="show({{$testcounter}})" data-total="5" data-loaded="5" data-grid-tab-title ><span class="title-tabs-text theme-font">{{$cat->name}}</span></a>
                </h2>
                @endif
                @php
                  $testcounter++;
                @endphp
              @endforeach
              <!-- <h2 class="h3-style">
                <a href="#" onclick="getproduct('hello')"   ><span class="title-tabs-text theme-font">Romance</span></a>
              </h2>
              <h2 class="h3-style">
                <a href="#" onclick="getproduct('world')"   ><span class="title-tabs-text theme-font">Adventure</span></a>
              </h2>
              <h2 class="h3-style">
                <a href="#" onclick="getproduct('this')"><span class="title-tabs-text theme-font">Poetry</span></a>
              </h2>
              <h2 class="h3-style">
                <a href="{{asset('ajax/ajax-product-tab-books-04.json')}}" data-total="5" data-loaded="5" data-grid-tab-title><span class="title-tabs-text theme-font">Thriller</span></a>
              </h2> -->
            </div>
          </div>
        </div>
        <div class="prd-grid-wrap">
          <div id="product_data" class="prd-grid data-to-show-5 data-to-show-md-3 data-to-show-sm-2 data-to-show-xs-2" >
          @include('CommonContent.producttest')
          
          </div>
          <!-- <div class="loader-horizontal-sm js-loader-horizontal-sm d-none" data-loader-horizontal style="opacity: 0;"><span></span></div>
           -->
          
          
          <!--<div class="circle-loader-wrap d-none">-->
          <!--<div class="circle-loader">-->
          <!--<a href="" data-load="4" class="js-circle-loader">-->
          <!--<svg id="svg_d" version="1.1" xmlns="http://www.w3.org/2000/svg">-->
          <!--<circle cx="50%" cy="50%" r="63" fill="transparent"></circle>-->
          <!--<circle class="js-circle-bar" cx="50%" cy="50%" r="63" fill="transparent"></circle>-->
          <!--</svg>-->
          <!--<svg id="svg_m" version="1.1" xmlns="http://www.w3.org/2000/svg">-->
          <!--<circle cx="50%" cy="50%" r="50" fill="transparent"></circle>-->
          <!--<circle class="js-circle-bar" cx="50%" cy="50%" r="50" fill="transparent"></circle>-->
          <!--</svg>-->
          <!--<div class="circle-loader-text">Load More</div>-->
          <!--<div class="circle-loader-text-alt"><span class="js-circle-loader-start"></span>&nbsp;out of&nbsp;<span class="js-circle-loader-end"></span></div>-->
          <!--</a>-->
          <!--</div>-->
          <!--</div>-->
        </div>
      </div>
    </div>

    
<script>

var appBanners1 = document.getElementsByClassName('hiddencontent1');
var appBanners2 = document.getElementsByClassName('hiddencontent2');
var appBanners3 = document.getElementsByClassName('hiddencontent3');
$(document).ready(function(){
  //hide others
    for (var i = 0; i < appBanners2.length; i ++) {
        appBanners2[i].style.display = 'none';
    }
    
  for (var i = 0; i < appBanners3.length; i ++) {
      appBanners3[i].style.display = 'none';
  }
});



function show(id)
{
  if(id==1)
  {
    
    for (var i = 0; i < appBanners3.length; i ++) {
        appBanners3[i].style.display = 'none';
    }
    
    for (var i = 0; i < appBanners2.length; i ++) {
      appBanners2[i].style.display = 'none';
    }

    
    for (var i = 0; i < appBanners1.length; i ++) {
      appBanners1[i].style.display = 'block';
    }
  }
  if(id==2)
  {
    
    for (var i = 0; i < appBanners3.length; i ++) {
        appBanners3[i].style.display = 'none';
    }
    
    for (var i = 0; i < appBanners1.length; i ++) {
      appBanners1[i].style.display = 'none';
    }

    
    for (var i = 0; i < appBanners2.length; i ++) {
      appBanners2[i].style.display = 'block';
    }
  }
  if(id==3)
  {
    
    for (var i = 0; i < appBanners1.length; i ++) {
        appBanners1[i].style.display = 'none';
    }
    
    for (var i = 0; i < appBanners2.length; i ++) {
      appBanners2[i].style.display = 'none';
    }

    
    for (var i = 0; i < appBanners3.length; i ++) {
      appBanners3[i].style.display = 'block';
    }
  }
}

</script>