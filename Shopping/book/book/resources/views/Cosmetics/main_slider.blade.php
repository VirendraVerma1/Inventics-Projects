<div class="holder mt-0 fullwidth full-nopad">
      <div class="container">
        <div class="bnslider-wrapper">
          <div class="bnslider bnslider--lg keep-scale" id="bnslider-01" data-start-width='1920' data-start-height='876' data-start-mwidth='750' data-start-mheight='750'>
          @if($shopcover_img)
            <div class="bnslider-slide bnslider-slide-product-style5">
              <div class="bnslider-image-mobile lazyload fade-up-fast" data-bgset="{{$img_url}}{{$shopcover_img->cover_img}}"></div>
              <div class="bnslider-image lazyload fade-up-fast" data-bgset="{{$img_url}}{{$shopcover_img->cover_img}}"></div>
              <div class="bnslider-text-wrap bnslider-overlay">
                <div class="bnslider-text-content txt-middle px-15 txt-left">
                  <div class="bnslider-text-content-flex container text-center align-items-center align-items-sm-start">
                    <div class="bnslider-vert pl-lg-5 text-center justify-content-center">
                      <div class="bnslider-text bnslider-text--price-sale text-center justify-content-center">
                        <span class="txt">{!! $sliders->title !!}<span></span></span>
                        <!-- <span class="">40%</span> -->
                      </div>
                      <div class="bnslider-text bnslider-product-text">{!! $sliders->sub_title !!}</div>
                      <div class="btn-wrap mt-lg">
                        <a href="{{$sliders->link}}" class="btn btn--lg">BUY NOW</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endif
          </div>
        </div>
      </div>
    </div>