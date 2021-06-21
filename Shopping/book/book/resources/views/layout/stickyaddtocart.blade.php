<div class="footer-sticky">
    <!--  sticky add to cart -->
    <div class="sticky-addcart js-stickyAddToCart closed">
      <div class="container">
        <div class="row">
          <div class="col-auto sticky-addcart_image">
            <a href="###">
              <img src="images/skins/fashion/products/product-01-1.jpg" alt="" />
            </a>
          </div>
          <div class="col col-sm-5 col-lg-4 col-xl-5 sticky-addcart_info">
            <h1 class="sticky-addcart_title">Leather Pegged Pants</h1>
            <div class="sticky-addcart_price">
              <span class="sticky-addcart_price--actual">$180.00</span>
              <span class="sticky-addcart_price--old">$210.00</span>
            </div>
          </div>
          <div class="col-auto sticky-addcart_options  prd-block prd-block_info--style1">
            <div class="select-wrapper">
              <select class="form-control form-control--sm">
                <option value="">--Please choose an option--</option>
              </select>
            </div>
          </div>
          <div class="col-auto sticky-addcart_actions">
            <div class="prd-block_qty">
              <span class="option-label">Quantity:</span>
              <div class="qty qty-changer">
                <button class="decrease"></button>
                <input type="number" class="qty-input" value="1" data-min="1" data-max="1000">
                <button class="increase"></button>
              </div>
            </div>
            <div class="btn-wrap">
              <button class="btn js-prd-addtocart" data-fancybox data-src="#modalCheckOut">Add to cart
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--added to cart-->
    <div class="popup-addedtocart js-popupAddToCart closed" data-close="50000">
      <div class="container">
        <div class="row">
          <div class="popup-addedtocart-close js-popupAddToCart-close"><i class="icon-close"></i></div>
          <div class="popup-addedtocart-cart js-open-drop" data-panel="#dropdnMinicart"><i class="icon-basket"></i></div>
          <div class="col-auto popup-addedtocart_logo">
            <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/logo-white-sm.png" class="lazyload fade-up" alt="">
          </div>
          <div class="col popup-addedtocart_info">
            <div class="row">
              <a href="###" class="col-auto popup-addedtocart_image">
                <span class="image-container w-100">
                  <img src="images/skins/fashion/products/product-01-1.jpg" alt="" />
                </span>
              </a>
              <div class="col popup-addedtocart_text">
                <a href="###" class="popup-addedtocart_title"></a>
                <span class="popup-addedtocart_message" id="addedtocarttext">Added to Cart </span>
                <span class="popup-addedtocart_error_message"></span>
              </div>
            </div>
          </div>
          <div class="col-auto popup-addedtocart_actions">
            <span>You can continue</span> <a href="#" class="btn btn--grey btn--sm js-open-drop" data-panel="#dropdnMinicart"><i class="icon-basket"></i><span>Check Cart</span></a> <span>or</span> <a href="{{route('Checkout')}}" class="btn btn--invert btn--sm"><i class="icon-envelope-1"></i><span>Check out</span></a>
          </div>
        </div>
      </div>
    </div>
    <!--  select options -->
    <div class="sticky-addcart popup-selectoptions js-popupSelectOptions closed" data-close="500000">
      <div class="container">
        <div class="row">
          <div class="popup-selectoptions-close js-popupSelectOptions-close"><i class="icon-close"></i></div>
          <div class="col-auto sticky-addcart_image sticky-addcart_image--zoom">
            <a href="#" data-caption="">
              <span class="image-container"><img src="#" alt="" /></span>
            </a>
          </div>
          <div class="col col-sm-5 col-lg-4 col-xl-5 sticky-addcart_info">
            <h1 class="sticky-addcart_title"><a href="#">&nbsp;</a></h1>
            <div class="sticky-addcart_price">
              <span class="sticky-addcart_price--actual"></span>
              <span class="sticky-addcart_price--old"></span>
            </div>
            <div class="sticky-addcart_error_message">Error Message</div>
          </div>
          <div class="col-auto sticky-addcart_options prd-block prd-block_info--style1">
            <div class="select-wrapper">
              <select class="form-control form-control--sm sticky-addcart_options_select">
                <option value="none">Select Option please..</option>
              </select>
              <div class="invalid-feedback">Can't be blank</div>
            </div>
          </div>
          <div class="col-auto sticky-addcart_actions">
            <div class="prd-block_qty">
              <span class="option-label">Quantity:</span>
              <div class="qty qty-changer">
                <button class="decrease"></button>
                <input type="number" class="qty-input" value="2" data-min="1" data-max="10000">
                <button class="increase"></button>
              </div>
            </div>
            <div class="btn-wrap">
              <button class="btn js-prd-addtocart">Add to cart</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- back to top -->
    <a class="back-to-top js-back-to-top compensate-for-scrollbar" href="#" title="Scroll To Top">
      <i class="icon icon-angle-up"></i>
    </a>
    <!-- loader -->
    <div class="loader-horizontal js-loader-horizontal">
      <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 100%"></div>
      </div>
    </div>
  </div>