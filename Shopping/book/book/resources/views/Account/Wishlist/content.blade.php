<div class="col-md-14 aside">
            <h1 class="mb-3">My Wishlist</h1>
            <div class="empty-wishlist js-empty-wishlist text-center py-3 py-sm-5 d-none" style="opacity: 0;">
              <h3>Your Wishlist is empty</h3>
              <div class="mt-5">
                <a href="index.html" class="btn">Continue shopping</a>
              </div>
            </div>
            <div class="prd-grid-wrap position-relative">
              <div class="prd-grid prd-grid--wishlist data-to-show-3 data-to-show-lg-3 data-to-show-md-2 data-to-show-sm-2 data-to-show-xs-1">
            @foreach($wishlist as $wish)
                <div class="prd prd--in-wishlist prd--style2 prd-labels--max prd-labels-shadow ">
                  <div class="prd-inside">
                    <div class="prd-img-area">
                      <a href="{{route('ProductCurrent',$wish->slug)}}" class="prd-img image-hover-scale image-container">
                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{$img_url}}{{$wish->img_path}}" alt="Suede Leather Mini Skirt" class="js-prd-img lazyload fade-up">
                        <div class="foxic-loader"></div>
                        <div class="prd-big-squared-labels">
                        </div>
                      </a>
                      <div class="prd-circle-labels">
                        <a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist" onclick="onremovewishlistbuttonpressed({{$wish->inventory_id}},{{$wish->product_id}},{{Auth::user()->id}})" title="Remove From Wishlist"><i class="icon-recycle"></i></a>
                        <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                      </div>
                      <!-- <ul class="list-options color-swatch">
                        <li data-image="images/skins/fashion/products/product-04-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-04-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-04-2.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-04-2.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-04-3.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-04-3.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                      </ul> -->
                    </div>
                    <div class="prd-info">
                      <div class="prd-info-wrap">
                        <div class="prd-info-top">
                          <div class="prd-tag"><a href="#">{{$wish->brand}}</a></div>
                        </div>
                        <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        <div class="prd-tag"><a href="#">{{$wish->brand}}</a></div>
                        <h2 class="prd-title"><a href="product.html">{{$wish->name}}</a></h2>
                        <div class="prd-description">
                        {!! $wish->description !!}
                        </div>
                      </div>
                      <div class="prd-hovers">
                        <div class="prd-circle-labels">
                          <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"  title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                          <div><a href="#" class="circle-label-qview prd-hide-mobile js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                        </div>
                        <div class="prd-price">
                          <div class="price-new">{{$current_currency}} {{$wish->min_price+0}}</div>
                        </div>
                        <div class="prd-action">
                          <div class="prd-action-left">
                            <form action="{{route('ProductCurrent',$wish->slug)}}" method ="get">
                              <button type="submit" class="btn">View Full Info</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            @endforeach
              </div>
            </div>
          </div>

