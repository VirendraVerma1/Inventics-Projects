<header class="hdr-wrap hdr-transparent">
    <div class="hdr-content hdr-content-sticky">
      <div class="container">
        <div class="row">
          <div class="col-auto show-mobile">
            <!-- Menu Toggle -->
            <div class="menu-toggle"> <a href="#" class="mobilemenu-toggle"><i class="icon-menu"></i></a> </div>
            <!-- /Menu Toggle -->
          </div>
          <div class="col-auto hdr-logo">
            <a href="{{route('Books')}}" class="logo"><img src="{{$img_url}}{{$shopdetails->img_path}}" style="height: 60px;
                    width: auto;" alt="Logo"></a>
          </div>
          <!--navigation-->
          <div class="hdr-nav hide-mobile nav-holder-s">
          </div>
          <!--//navigation-->
          <div class="hdr-links-wrap col-auto ml-auto">
            <div class="hdr-inline-link">
              <!-- Header Search -->
              <div class="search_container_desktop">
                <div class="dropdn dropdn_search dropdn_fullwidth">
                  <a href="#" class="dropdn-link  js-dropdn-link only-icon"><i class="icon-search"></i><span class="dropdn-link-txt">Search</span></a>
                  <div class="dropdn-content">
                    <div class="container">
                      <form method="get" action="{{route('SearchName')}}" class="search search-off-popular">
                        <input name="search" type="text" class="search-input input-empty" placeholder="What are you looking for?">
                        <button type="submit" class="search-button"><i class="icon-search"></i></button>
                        <a href="#" class="search-close js-dropdn-close"><i class="icon-close-thin"></i></a>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /Header Search -->
              <!-- Header Wishlist -->
              <div class="dropdn dropdn_wishlist">
                <a href="{{route('Account','wishlist')}}" class="dropdn-link only-icon wishlist-link ">
                  <i class="icon-heart"></i><span class="dropdn-link-txt">Wishlist</span><span class="wishlist-qty" id="wishlist_quant1">0</span>
                </a>
              </div>
              <!-- /Header Wishlist --> 
              <!-- Header Account -->
              <div class="dropdn dropdn_account dropdn_fullheight">
                <a href="#" class="dropdn-link js-dropdn-link js-dropdn-link only-icon" data-panel="#dropdnAccount"><i class="icon-user"></i><span class="dropdn-link-txt">Account</span></a>
              </div>
              <!-- /Header Account -->
              <div class="dropdn dropdn_fullheight minicart">
                <a href="#" class="dropdn-link js-dropdn-link minicart-link only-icon" onclick="getMiniCartData()" data-panel="#dropdnMinicart">
                  <i class="icon-basket"></i>
                  <span class="minicart-qty" id="minicart_quantity1">0</span>
                  <span class="minicart-total hide-mobile" id="minicart_price1">$34.99</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="hdr hdr-style6">
      <div class="hdr-content">
        <div class="container">
          <div class="row">
            <div class="col-auto show-mobile">
              <!-- Menu Toggle -->
              <div class="menu-toggle"> <a href="#" class="mobilemenu-toggle"><i class="icon-menu"></i></a> </div>
              <!-- /Menu Toggle -->
            </div>
            <div class="col-auto hdr-logo">
              <a href="{{route('Books')}}" class="logo"><img srcset="{{$img_url}}{{$shopdetails->img_path}}" style="height: 60px;
                    width: auto;" alt="Logo"></a>
            </div>
            <!--navigation-->
            @include('layout.Navigation.navigationlink')
            <!--//navigation-->
            <div class="hdr-links-wrap col-auto ml-auto">
              <div class="hdr-inline-link">
                <!-- Header Search -->
                <div class="search_container_desktop">
                  <div class="dropdn dropdn_search dropdn_fullwidth">
                    <a href="#" class="dropdn-link  js-dropdn-link only-icon"><i class="icon-search"></i><span class="dropdn-link-txt">Search</span></a>
                    <div class="dropdn-content">
                      <div class="container">
                        <form method="get" action="{{route('SearchName')}}" class="search search-off-popular">
                          <input name="search" type="text" class="search-input input-empty" placeholder="What are you looking for?">
                          <button type="submit" class="search-button"><i class="icon-search"></i></button>
                          <a href="#" class="search-close js-dropdn-close"><i class="icon-close-thin"></i></a>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /Header Search -->
                <!-- Header Compare -->
                <div class="dropdn dropdn_compare">
                  <a href="#" class="dropdn-link only-icon compare-link ">
                    <i class="icon-compare"></i><span class="dropdn-link-txt">Wishlist</span><span class="compare-qty">3</span>
                  </a>
                </div>
                <!-- /Header Compare -->
                <!-- Header Account -->
                <div class="dropdn dropdn_account dropdn_fullheight">
                  <a href="#" class="dropdn-link js-dropdn-link js-dropdn-link only-icon" data-panel="#dropdnAccount"><i class="icon-user"></i><span class="dropdn-link-txt">Account</span></a>
                </div>
                <!-- /Header Account -->
                <div class="dropdn dropdn_fullheight minicart">
                  <a href="#" class="dropdn-link js-dropdn-link minicart-link only-icon" onclick="getMiniCartData()" data-panel="#dropdnMinicart">
                    <i class="icon-basket"></i>
                    <span class="minicart-qty" id="minicart_quantity2">0</span>
                    <span class="minicart-total hide-mobile" id="minicart_price2">$34.99</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  