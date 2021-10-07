@php
  $otimized_date=date('F d, Y' ,strtotime($orders->created_at));
@endphp

<div class="row">
          <div class="col-lg-11 col-xl-13">
            <div class="cart-table">
              <div class="cart-table-prd cart-table-prd--head py-1 d-none d-md-flex">
                <div class="cart-table-prd-image text-center">
                  Image
                </div>
                <div class="cart-table-prd-content-wrap">
                  <div class="cart-table-prd-info">Name</div>
                  <div class="cart-table-prd-qty">Qty</div>
                  <div class="cart-table-prd-price">Price</div>
                  <div class="cart-table-prd-action">&nbsp;</div>
                </div>
              </div>
              @foreach($order_items as $item)
                <div class="cart-table-prd">
                  <div class="cart-table-prd-image">
                    <a href="{{route('ProductCurrent',$item->slug)}}" class="prd-img"><img class="lazyload fade-up" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{$img_url}}{{$item->img_path}}" alt=""></a>
                  </div>
                  <div class="cart-table-prd-content-wrap">
                    <div class="cart-table-prd-info">
                      <div class="cart-table-prd-price">
                        <div class="price-new">{{$current_currency}} {{$item->unit_price+0}}</div>
                      </div>
                      <h2 class="cart-table-prd-name"><a href="{{route('ProductCurrent',$item->slug)}}">{{$item->name}}</a></h2>
                    </div>
                    <div class="cart-table-prd-qty">
                      <div class="qty qty-changer">
                        
                        <input type="text" class="qty-input" value="{{$item->item_quantity}}" >
                        
                      </div>
                    </div>
                    <div class="cart-table-prd-price-total">
                    {{$current_currency}} {{$item->unit_price*$item->item_quantity+0}}
                    </div>
                  </div>
                  <div class="cart-table-prd-action">
                    <!-- <a href="#" class="cart-table-prd-remove" data-tooltip="Remove Product"><i class="icon-recycle"></i></a> -->
                  </div>
                </div>
              @endforeach
              <!-- <div class="cart-table-prd">
                <div class="cart-table-prd-image">
                  <a href="product.html" class="prd-img"><img class="lazyload fade-up" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-01-1.jpg" alt=""></a>
                </div>
                <div class="cart-table-prd-content-wrap">
                  <div class="cart-table-prd-info">
                    <div class="cart-table-prd-price">
                      <div class="price-old">$200.00</div>
                      <div class="price-new">$180.00</div>
                    </div>
                    <h2 class="cart-table-prd-name"><a href="product.html">Leather Pegged Pants</a></h2>
                  </div>
                  <div class="cart-table-prd-qty">
                    <div class="qty qty-changer">
                      <button class="decrease"></button>
                      <input type="text" class="qty-input" value="2" data-min="0" data-max="1000">
                      <button class="increase"></button>
                    </div>
                  </div>
                  <div class="cart-table-prd-price-total">
                    $360.00
                  </div>
                </div>
                <div class="cart-table-prd-action">
                  <a href="#" class="cart-table-prd-remove" data-tooltip="Remove Product"><i class="icon-recycle"></i></a>
                </div>
              </div>
              <div class="cart-table-prd">
                <div class="cart-table-prd-image">
                  <a href="product.html" class="prd-img"><img class="lazyload fade-up" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-16-1.jpg" alt=""></a>
                </div>
                <div class="cart-table-prd-content-wrap">
                  <div class="cart-table-prd-info">
                    <div class="cart-table-prd-price">
                      <div class="price-new">$220.00</div>
                    </div>
                    <h2 class="cart-table-prd-name"><a href="product.html">Cascade Casual Shirt</a></h2>
                  </div>
                  <div class="cart-table-prd-qty">
                    <div class="qty qty-changer">
                      <button class="decrease"></button>
                      <input type="text" class="qty-input" value="2" data-min="0" data-max="1000">
                      <button class="increase"></button>
                    </div>
                  </div>
                  <div class="cart-table-prd-price-total">
                    $360.00
                  </div>
                </div>
                <div class="cart-table-prd-action">
                  <a href="#" class="cart-table-prd-remove" data-tooltip="Remove Product"><i class="icon-recycle"></i></a>
                </div>
              </div>
              <div class="cart-table-prd">
                <div class="cart-table-prd-image">
                  <a href="product.html" class="prd-img"><img class="lazyload fade-up" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-02-1.jpg" alt=""></a>
                </div>
                <div class="cart-table-prd-content-wrap">
                  <div class="cart-table-prd-info">
                    <div class="cart-table-prd-price">
                      <div class="price-new">$75.00</div>
                    </div>
                    <h2 class="cart-table-prd-name"><a href="product.html">Oversize Cotton Dress</a></h2>
                  </div>
                  <div class="cart-table-prd-qty">
                    <div class="qty qty-changer">
                      <button class="decrease"></button>
                      <input type="text" class="qty-input" value="2" data-min="0" data-max="1000">
                      <button class="increase"></button>
                    </div>
                  </div>
                  <div class="cart-table-prd-price-total">
                    $360.00
                  </div>
                </div>
                <div class="cart-table-prd-action">
                  <a href="#" class="cart-table-prd-remove" data-tooltip="Remove Product"><i class="icon-recycle"></i></a>
                </div>
              </div> -->
            </div>
            <!-- <div class="text-center mt-1"><a href="#" class="btn btn--grey">Clear All</a></div> -->
            <div class="d-none d-lg-block">
              <div class="mt-4"></div>
              @include('CommonContent.youmayalsolike')
            </div>
          </div>
          <div class="col-lg-7 col-xl-5 mt-3 mt-md-0" >
            <div class="cart-promo-banner" style="background-color:{{$orders->order_label_color}}">
              <div class="cart-promo-banner-inside">
                <div class="txt1">{{$orders->order_status_name}}</div>
              </div>
            </div>
            <div class="card-total">
              <div class="text-right">
                <button class="btn btn--grey"><span>ORDER AGAIN</span><i class="icon-refresh"></i></button>
              </div>
              <div class="row d-flex">
                <div class="col card-txt">Price</div>
                <div class="col-auto card-price text-right">{{$current_currency}} {{$orders->total+0}}</div>
              </div>
              <div class="row d-flex">
                <div class="col card-txt">Shipping</div>
                <div class="col-auto card-price text-right">{{$current_currency}} {{$orders->shipping+0}}</div>
              </div>
              <div class="row d-flex">
                <div class="col card-txt">Packaging</div>
                <div class="col-auto card-price text-right">{{$current_currency}} {{$orders->packaging+0}}</div>
              </div>
              <div class="row d-flex">
                <div class="col card-txt">Tax</div>
                <div class="col-auto card-price text-right">{{$current_currency}} {{$orders->taxes+0}}</div>
              </div>
              <div class="row d-flex">
                <div class="col card-txt">Discount</div>
                <div class="col-auto card-price text-right">{{$current_currency}} {{$orders->discount+0}}</div>
              </div>
              <div class="row d-flex">
                <div class="col card-total-txt">Total</div>
                <div class="col-auto card-total-price text-right">{{$current_currency}} {{$orders->grand_total+0}}</div>
              </div>
              <button class="btn btn--full btn--lg"><span>Cancel</span></button>
              <div class="card-text-info text-left">
                <h5>Payment method</h5>
                <p>{{$orders->payment_method_name}}</p>
              </div>
              <div class="card-text-info text-left">
                <h5>Standart shipping</h5>
                <p>{{$orders->delivery_takes}}</p>
              </div>
              <div class="card-text-info text-left">
                <h5>Order ID</h5>
                <p>{{$orders->order_number}}</p>
              </div>
              <div class="card-text-info text-left">
                <h5>Order Date</h5>
                <p>{{$otimized_date}}</p>
              </div>
            </div>
            <div class="mt-2"></div>
            <!-- <div class="panel-group panel-group--style1 prd-block_accordion" id="productAccordion">
              <div class="panel">
                <div class="panel-heading active">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#productAccordion" href="#collapse1">Shipping Address</a>
                    <span class="toggle-arrow"><span></span><span></span></span>
                  </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse show">
                  <div class="panel-body">
                    <label>{{$orders->shipping_address}}</label>
                  </div>
                </div>
              </div>
              <div class="panel">
                <div class="panel-heading active">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#productAccordion" href="#collapse2">Billing Address</a>
                    <span class="toggle-arrow"><span></span><span></span></span>
                  </h4>
                </div>
                <div id="collapse2" class="panel-collapse collapse show">
                  <div class="panel-body">
                    <label>{{$orders->billing_address}}</label>
                  </div>
                </div>
              </div>
              <div class="panel">
                <div class="panel-heading active">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#productAccordion" href="#collapse3">Note for the seller</a>
                    <span class="toggle-arrow"><span></span><span></span></span>
                  </h4>
                </div>
                <div id="collapse3" class="panel-collapse collapse show">
                  <div class="panel-body">
                    <textarea class="form-control form-control--sm textarea--height-100" placeholder="Text here"></textarea>
                    <div class="card-text-info mt-2">
                      <p>*Savings include promotions, coupons, rueBUCKS, and shipping (if applicable).</p>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
          </div>
        </div>
      