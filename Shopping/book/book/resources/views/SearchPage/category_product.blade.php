<div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                  <div class="prd-inside">
                    <div class="prd-img-area">
                      <a href="{{route('Product',[$product->slug,'c='.$product->product_cat,'s='.$product->product_sub_cat])}}" class="prd-img image-hover-scale image-container">
                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{$img_url}}{{$product->img_path}}" alt="{{$product->name}}" class="js-prd-img lazyload fade-up">
                        <div class="foxic-loader"></div>
                        <!-- <div class="prd-big-squared-labels">
                          <div class="label-new"><span>New</span></div>
                        </div> -->
                      </a>
                      <div class="prd-circle-labels">
                        <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                        <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                      </div>
                      <!-- <ul class="list-options color-swatch">
                        <li data-image="images/skins/fashion/products/product-09-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-09-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-09-2.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-09-2.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-09-3.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-09-3.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                      </ul> -->
                    </div>
                    <div class="prd-info">
                      <div class="prd-info-wrap">
                        <div class="prd-info-top">
                          <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        </div>
                        <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        <div class="prd-tag"><a href="#">{{$product->brand}}</a></div>
                        <h2 class="prd-title"><a href="{{route('Product',[$product->slug,'c='.$product->product_cat,'s='.$product->product_sub_cat])}}">{{$product->name}}</a></h2>
                        <div class="prd-description">
                        {!! $product->description !!}
                        </div>
                        <div class="prd-action">
                          <form action="#">
                            <button class="btn js-prd-addtocart" data-product='{"name": "{{$product->name}}", "path":"images/skins/fashion/products/product-09-1.jpg", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
                          </form>
                        </div>
                      </div>
                      <div class="prd-hovers">
                        <div class="prd-circle-labels">
                          <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                          <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                        </div>
                        <div class="prd-price">
                          <div class="price-new">{{$current_currency}} {{$product->min_price+0}}</div>
                        </div>
                        <div class="prd-action">
                          <div class="prd-action-left">
                            <form action="#">
                              <button class="btn js-prd-addtocart" data-product='{"name": "{{$product->name}}", "path":"images/skins/fashion/products/product-09-1.jpg", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>