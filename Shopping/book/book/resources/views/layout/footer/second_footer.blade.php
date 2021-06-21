<footer class="page-footer footer-style-6 ">
    @php
      if(isset($hidefooterinfo))
      {
        if(!$hidefooterinfo)
        {
          @endphp @include('layout.footer.footerholderinfo') @php
        }
      }else{
        @endphp @include('layout.footer.footerholderinfo') @php
      }
    @endphp
    
    <div class="footer-top">
      <div class="container">
        <div class="row mt-0">
          <div class="col-lg col-xl last-mobile">
            <div class="footer-block">
              <div class="footer-logo">
                <a href="{{route('Books')}}"><img class="lazyload fade-up" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-srcset="images/logo-footer.png 1x, images/logo-footer2x.png 2x" alt="Logo"></a>
              </div>
              <div class="collapsed-content">
                <ul>
                  <li>E-mail: <a href="mailto:Foxshop@gmail.com">Foxshop@gmail.com</a></li>
                  <li>Hours: 10:00 - 18:00, Mon - Fri</li>
                </ul>
              </div>
              <ul class="social-list">
                <li>
                  <a href="#" class="icon icon-facebook"></a>
                </li>
                <li>
                  <a href="#" class="icon icon-twitter"></a>
                </li>
                <li>
                  <a href="#" class="icon icon-google"></a>
                </li>
                <li>
                  <a href="#" class="icon icon-vimeo"></a>
                </li>
                <li>
                  <a href="#" class="icon icon-youtube"></a>
                </li>
                <li>
                  <a href="#" class="icon icon-pinterest"></a>
                </li>
              </ul>
              <div class="d-lg-none mt-3">
                <div class="box-coupon">
                  <div class="box-coupon-icon"><i class="icon-scissors"></i></div>
                  <div class="box-coupon-text"><span class="custom-color">FOXIC</span> THEME</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg col-xl">
            <div class="footer-block collapsed-mobile">
              <div class="title">
                <h4>Information</h4>
                <span class="toggle-arrow"><span></span><span></span></span>
              </div>
              <div class="collapsed-content">
                <ul>
                  <li><a href="{{route('AboutUs')}}">About Us</a></li>
                  <li><a href="{{route('ContactUs')}}">Contact Us</a></li>
                  <li><a href="typography.html">Terms & Conditions</a></li>
                  <li><a href="typography.html">Returns & Exchanges</a></li>
                  <li><a href="typography.html">Shipping & Delivery</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg col-xl">
            <div class="footer-block collapsed-mobile">
              <div class="title">
                <h4>Account details</h4>
                <span class="toggle-arrow"><span></span><span></span></span>
              </div>
              <div class="collapsed-content">
                <ul>
                  <li><a href="{{route('Account','details')}}">My Account</a></li>
                  <li><a href="{{route('Cart')}}">View Cart</a></li>
                  <li><a href="{{route('Account','wishlist')}}">My Wishlist</a></li>
                  <li><a href="{{route('Account','orders')}}">Order Status</a></li>
                  <li><a href="{{route('Account','orders')}}">Track My Order</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg col-xl">
            <div class="footer-block collapsed-mobile">
              <div class="title">
                <h4>Safe payments</h4>
                <span class="toggle-arrow"><span></span><span></span></span>
              </div>
              <div class="collapsed-content">
                <ul class="payment-link">
                  <li><i class="icon-google-pay-logo"></i></li>
                  <li><i class="icon-visa-pay-logo"></i></li>
                  <li><i class="icon-apple-pay-logo"></i></li>
                </ul>
              </div>
              <div class="d-none d-lg-block">
                <div class="box-coupon">
                  <div class="box-coupon-icon"><i class="icon-scissors"></i></div>
                  <div class="box-coupon-text"><span class="custom-color">FOXIC</span> THEME</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom footer-bottom--bg">
      <div class="container">
        <div class="footer-copyright text-center">
          <a href="#">FOXshop</a> ©2020 copyright
        </div>
      </div>
    </div>
  </footer>
  
  @include('layout.stickyaddtocart')
  <!-- payment note
  <div class="footer-sticky">
    <div class="payment-notification-wrap js-pn" data-visible-time="3000" data-hidden-time="3000" data-delay="500" data-from="Aberdeen,Bakersfield,Birmingham,Cambridge,Youngstown" data-products='[{"productname":"Leather Pegged Pants", "productlink":"product.html","productimage":"images/skins/fashion/products/product-01-1.jpg"},{"productname":"Black Fabric Backpack", "productlink":"product.html","productimage":"images/skins/fashion/products/product-28-1.jpg"},{"productname":"Combined Chunky Sneakers", "productlink":"product.html","productimage":"images/skins/fashion/products/product-23-1.jpg"}]'>
      <div class="payment-notification payment-notification--squared">
        <div class="payment-notification-inside">
          <div class="payment-notification-container">
            <a href="#" class="payment-notification-image js-pn-link">
              <img src="images/products/product-01.jpg" class="js-pn-image" alt="">
            </a>
            <div class="payment-notification-content-wrapper">
              <div class="payment-notification-content">
                <div class="payment-notification-text">Someone purchased</div>
                <a href="###" class="payment-notification-name js-pn-name js-pn-link">Applewatch</a>
                <div class="payment-notification-bottom">
                  <div class="payment-notification-when"><span class="js-pn-time">32</span> min ago</div>
                  <div class="payment-notification-from">from <span class="js-pn-from">Riverside</span></div>
                </div>
              </div>
            </div>
          </div>
          <div class="payment-notification-close"><i class="icon-close-bold"></i></div>
          <div class="payment-notification-qw prd-hide-mobile js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i></div>
        </div>
      </div>
    </div>
  </div> -->