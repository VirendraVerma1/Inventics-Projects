<h2 class="custom-color">Order Summary</h2>
            <div class="cart-table cart-table--sm pt-3 pt-md-0">
              <div class="cart-table-prd cart-table-prd--head py-1 d-none d-md-flex">
                <div class="cart-table-prd-image text-center">
                  Image
                </div>
                <div class="cart-table-prd-content-wrap">
                  <div class="cart-table-prd-info">Name</div>
                  <div class="cart-table-prd-qty">Qty</div>
                  <div class="cart-table-prd-price">Price</div>
                </div>
              </div>
              @foreach($cart_data as $cart)
                <div class="cart-table-prd">
                  <div class="cart-table-prd-image">
                    <a href="#" class="prd-img"><img class="lazyload fade-up" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{$img_url}}{{$cart->img_path}}" alt=""></a>
                  </div>
                  <div class="cart-table-prd-content-wrap">
                    <div class="cart-table-prd-info">
                      <h2 class="cart-table-prd-name"><a href="product.html">{{$cart->name}}</a></h2>
                    </div>
                    <div class="cart-table-prd-qty">
                      <div class="qty qty-changer">
                        <input type="text" class="qty-input disabled" value="{{$cart->item_quantity}}" data-min="0" data-max="1000">
                      </div>
                    </div>
                    <div class="cart-table-prd-price-total">
                    {{$current_currency}} {{$cart->unit_price*$cart->item_quantity+0}}
                    </div>
                  </div>
                </div>
              @endforeach
              <!-- <div class="cart-table-prd">
                <div class="cart-table-prd-image">
                  <a href="#" class="prd-img"><img class="lazyload fade-up" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-01-1.jpg" alt=""></a>
                </div>
                <div class="cart-table-prd-content-wrap">
                  <div class="cart-table-prd-info">
                    <h2 class="cart-table-prd-name"><a href="product.html">Leather Pegged Pants</a></h2>
                  </div>
                  <div class="cart-table-prd-qty">
                    <div class="qty qty-changer">
                      <input type="text" class="qty-input disabled" value="2" data-min="0" data-max="1000">
                    </div>
                  </div>
                  <div class="cart-table-prd-price-total">
                    $352.00
                  </div>
                </div>
              </div>
              <div class="cart-table-prd">
                <div class="cart-table-prd-image">
                  <a href="#" class="prd-img"><img class="lazyload fade-up" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-16-1.jpg" alt=""></a>
                </div>
                <div class="cart-table-prd-content-wrap">
                  <div class="cart-table-prd-info">
                    <h2 class="cart-table-prd-name"><a href="product.html">Cascade Casual Shirt</a></h2>
                  </div>
                  <div class="cart-table-prd-qty">
                    <div class="qty qty-changer">
                      <input type="text" class="qty-input disabled" value="2" data-min="0" data-max="1000">
                    </div>
                  </div>
                  <div class="cart-table-prd-price-total">
                    $142.00
                  </div>
                </div>
              </div> -->
            </div>