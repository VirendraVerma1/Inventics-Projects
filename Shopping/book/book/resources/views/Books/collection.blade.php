@php 
  $subcounter=0;
@endphp

<div class="holder holder-with-bg holder-pb-medium" style="background-color: #fcfcfc">
      <div class="container">
        <div class="row bnr-grid vert-margin-small">
          @foreach($bottom_banner as $botban)
          @if($subcounter<6)
          <div class="col-18 col-sm-6">
            <a href="{{$botban->link}}" target="_self" class="bnr-wrap">
              <div class="bnr custom-caption image-hover-scale image-hover-scale--slow bnr--top bnr--left" data-fontratio=5.7>
                <div class="bnr-img  image-container" style="padding-bottom: 140.526%">
                  <img data-srcset="{{$img_url}}{{$botban->img_path}}" class="lazyload fade-up" alt="">
                </div>
                <div class="bnr-caption" style="padding: 20% 14%; width: 100%;">
                  <div class="bnr-text3 mt-sm order-1 inherit" style="color:#000000; font-size:0.725em; font-weight:700; line-height:1em">{!! $botban->title !!}</div>
                  <div class="bnr-text3 mt-lg order-2 inherit" style="color:#000000; font-size:0.275em; font-weight:800; line-height:1.4em;">{!! $botban->description !!}</div>
                </div>
              </div>
            </a>
          </div>
          @endif
          @php $subcounter++; @endphp
          @endforeach
          <!-- <div class="col-18 col-sm-6">
            <a href="###" target="_self" class="bnr-wrap">
              <div class="bnr custom-caption image-hover-scale image-hover-scale--slow bnr--top bnr--left" data-fontratio=5.7>
                <div class="bnr-img  image-container" style="padding-bottom: 140.526%">
                  <img data-srcset="images/skins/books/banners/banner-books-01.png" class="lazyload fade-up" alt="">
                </div>
                <div class="bnr-caption" style="padding: 20% 14%; width: 100%;">
                  <div class="bnr-text3 mt-sm order-1 inherit" style="color:#000000; font-size:0.725em; font-weight:700; line-height:1em">Get One<br>Now</div>
                  <div class="bnr-text3 mt-lg order-2 inherit" style="color:#000000; font-size:0.275em; font-weight:800; line-height:1.4em;">Pcychologys Books<br>sale 25% off</div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-18 col-sm-6">
            <a href="###" target="_self" class="bnr-wrap">
              <div class="bnr custom-caption image-hover-scale image-hover-scale--slow bnr--bottom bnr--left" data-fontratio=5.7>
                <div class="bnr-img  image-container" style="padding-bottom: 140.526%">
                  <img data-srcset="images/skins/books/banners/banner-books-02.png" class="lazyload fade-up" alt="">
                </div>
                <div class="bnr-caption" style="padding: 12% 12%; width: 100%;">
                  <div class="bnr-text3 mt-sm order-2 inherit" style="color:#000000; font-size:0.725em; font-weight:700; line-height:1em">Discount</div>
                  <div class="bnr-text3 mt-sm order-1 inherit" style="color:#000000; font-size:0.3em; font-weight:800; line-height:1.5em;">Today Only</div>
                  <div class="bnr-text3 mt-lg order-3 inherit" style="font-size:0.275em; font-weight:800; line-height:1em;">For Childrens Bokks</div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-18 col-sm-6">
            <a href="###" target="_self" class="bnr-wrap">
              <div class="bnr custom-caption image-hover-scale image-hover-scale--slow bnr--top bnr--left" data-fontratio=5.7>
                <div class="bnr-img  image-container" style="padding-bottom: 140.526%">
                  <img data-srcset="images/skins/books/banners/banner-books-03.png" class="lazyload fade-up" alt="">
                </div>
                <div class="bnr-caption" style="padding: 18% 14%; width: 100%;">
                  <div class="bnr-text3 mt-0 order-1 inherit" style="color:#000000; font-size:0.725em; font-weight:700; line-height:1em">Hot<br>Proposition</div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-18 col-sm-6">
            <a href="###" target="_self" class="bnr-wrap">
              <div class="bnr custom-caption image-hover-scale image-hover-scale--slow bnr--top bnr--left" data-fontratio=5.7>
                <div class="bnr-img  image-container" style="padding-bottom: 73.684%">
                  <img data-srcset="images/skins/books/banners/banner-books-04.png" class="lazyload fade-up" alt="">
                </div>
                <div class="bnr-caption" style="padding: 16% 14%; width: 100%;">
                  <div class="bnr-text3 mt-sm order-1  text-left" style="color:#000000; font-size:0.45em; font-weight:700; line-height:1.3em">Happy<br>Book Day</div>
                  <div class="bnr-text3 mt-sm order-2 inherit" style="color:#000000; font-size:0.275em; font-weight:800; line-height:1.4em;">Discount 30%<br>for All Book’s</div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-18 col-sm-6">
            <a href="###" target="_self" class="bnr-wrap">
              <div class="bnr custom-caption image-hover-scale image-hover-scale--slow bnr--top bnr--left" data-fontratio=5.7>
                <div class="bnr-img  image-container" style="padding-bottom: 73.684%">
                  <img data-srcset="images/skins/books/banners/banner-books-05.png" class="lazyload fade-up" alt="">
                </div>
                <div class="bnr-caption" style="padding: 16% 14%; width: 100%;">
                  <div class="bnr-text3 mt-sm order-1  text-left" style="color:#000000; font-size:0.45em; font-weight:700; line-height:1.3em">New<br>Collection</div>
                  <div class="bnr-text3 mt-sm order-2 inherit" style="color:#000000; font-size:0.275em; font-weight:800; line-height:1.4em;">Get Book<br>Therapy</div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-18 col-sm-6">
            <a href="###" target="_self" class="bnr-wrap bnr-1597392231186">
              <div class="bnr custom-caption image-hover-scale image-hover-scale--slow bnr--top bnr--left" data-fontratio=5.7>
                <div class="bnr-img  image-container" style="padding-bottom: 73.684%">
                  <img data-srcset="images/skins/books/banners/banner-books-06.png" class="lazyload fade-up" alt="">
                </div>
                <div class="bnr-caption" style="padding: 16% 14%; width: 100%;">
                  <div class="bnr-text3 mt-sm order-1  text-left" style="color:#000000; font-size:0.45em; font-weight:700; line-height:1.3em">Science &<br>Education</div>
                  <div class="bnr-text3 mt-sm order-2 inherit" style="color:#000000; font-size:0.275em; font-weight:800; line-height:1.4em;">Books For<br>Knowledge</div>
                </div>
              </div>
            </a>
          </div> -->
        </div>
      </div>
    </div>