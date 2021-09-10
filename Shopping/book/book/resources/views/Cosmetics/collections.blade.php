<div class="holder holder-mt-xsmall">
      <div class="container">
        <div class="row bnr-grid vert-margin-small">
          @foreach($categories_with_images as $cat)
          <div class="col-18 col-sm-6">
            <a href="product.html" class="bnr-wrap">
              <div class="bnr custom-caption image-hover-scale bnr--bottom bnr--left " data-fontratio=5.7>
                <div class="bnr-img  image-container" style="padding-bottom: 145.02%">
                  <img src="{{$img_url}}{{$cat->img_path}}" data-srcset="{{$img_url}}{{$cat->img_path}}" class="lazyload fade-up" alt="">
                </div>
                <div class="bnr-caption" style="padding: 11% 13%; width: 100%;">
                  <div class="bnr-text3  mt-sm order-1" style=" color:black; font-size:0.85em; font-weight:800; line-height:1em">{{$cat->name}}</div>
                  <!-- <div class="bnr-text3 mt-0 order-2" style=" color:#ffffff; font-size:0.85em; font-weight:800; line-height:1em;">2020</div>
                  <div class="bnr-btn mt-lg order-3">
                    <div class="btn">Buy Now</div>
                  </div> -->
                </div>
              </div>
            </a>
          </div>
          @endforeach
          <!-- <div class="col-18 col-sm-6">
            <a href="product.html" class="bnr-wrap">
              <div class="bnr custom-caption image-hover-scale bnr--bottom bnr--center " data-fontratio=5.7>
                <div class="bnr-img  image-container" style="padding-bottom: 145.02%">
                  <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-srcset="images/skins/cosmetics/banners/banner-cosmetics-02.png" class="lazyload fade-up" alt="">
                </div>
                <div class="bnr-caption" style="padding: 12% 4%; width: 100%;">
                  <div class="bnr-text3 bnr-text-has-bg mt-sm order-1 text-center" style="padding: 3% 5%; color:#282828; font-size:0.55em; font-weight:700; line-height:1em">BROWN STYLE<span class="bnr-text-bg" style="background:#ffffff;opacity: 1"></span></div>
                  <div class="bnr-text3 mt-xs order-2  text-center" style=" color:#ffffff; font-size:0.75em; font-weight:700; line-height:1em;">LIPSTICK</div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-18 col-sm-6">
            <a href="product.html" class="bnr-wrap">
              <div class="bnr custom-caption image-hover-scale bnr--middle bnr--center " data-fontratio=5.7>
                <div class="bnr-img  image-container" style="padding-bottom: 145.02%">
                  <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-srcset="images/skins/cosmetics/banners/banner-cosmetics-03.png" class="lazyload fade-up" alt="">
                </div>
                <div class="bnr-caption" style="padding: 4% 4%; width: 100%;">
                  <div class="bnr-text3 mt-sm order-1" style="color:#ffffff; font-size:0.5em; font-weight:600; line-height:1em">New collection</div>
                  <div class="bnr-text3 bnr-text-has-bg mt-sm order-2 text-center" style="padding: 3% 3%; color:#ffffff; font-size:0.5em; font-weight:700; line-height:1em;">NIGHT STARS<span class="bnr-text-bg" style="background:#a813ed;opacity: 1"></span></div>
                </div>
              </div>
            </a>
          </div> -->
        </div>
      </div>
    </div>