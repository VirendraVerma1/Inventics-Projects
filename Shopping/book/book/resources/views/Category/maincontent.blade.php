<div class="col-lg aside">
            <div class="prd-grid-wrap">
              <!-- Products Grid -->
              <div class="prd-listview product-listing data-to-show-3 data-to-show-md-3 data-to-show-sm-2 js-category-grid" data-grid-tab-content>
              @foreach($cat_product as $product)
              @if($product->product_cat==$slug || $slug=="home")
              <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                  <div class="prd-inside">
                    <div class="prd-img-area">
                      <a href="{{asset('product/'.$product->product_sub_cat.'/'.$product->product_cat.'/'.$product->slug)}}" class="prd-img image-hover-scale image-container">
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
                        <h2 class="prd-title"><a href="{{asset('product/'.$product->product_sub_cat.'/'.$product->product_cat.'/'.$product->slug)}}">{{$product->name}}</a></h2>
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
                @endif
                @endforeach

                <!-- <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                  <div class="prd-inside">
                    <div class="prd-img-area">
                      <a href="product.html" class="prd-img image-hover-scale image-container">
                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-01-1.jpg" alt="Leather Pegged Pants" class="js-prd-img lazyload fade-up">
                        <div class="foxic-loader"></div>
                        <div class="prd-big-squared-labels">
                        </div>
                      </a>
                      <div class="prd-circle-labels">
                        <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                        <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                        <div class="colorswatch-label colorswatch-label--variants js-prd-colorswatch">
                          <i class="icon-palette"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span></i>
                          <ul>
                            <li data-image="images/skins/fashion/products/product-01-1.jpg"><a class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="Color Name"><img src="images/colorswatch/color-orange.png')}}" alt=""></a></li>
                            <li data-image="images/skins/fashion/products/product-01-color-2.jpg"><a class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="Color Name"><img src="images/colorswatch/color-black.png')}}" alt=""></a></li>
                            <li data-image="images/skins/fashion/products/product-01-color-3.jpg"><a class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="Color Name"><img src="images/colorswatch/color-red.png')}}" alt=""></a></li>
                          </ul>
                        </div>
                      </div>
                      <ul class="list-options color-swatch">
                        <li data-image="images/skins/fashion/products/product-01-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-01-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-01-2.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-01-2.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-01-3.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-01-3.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                      </ul>
                    </div>
                    <div class="prd-info">
                      <div class="prd-info-wrap">
                        <div class="prd-info-top">
                          <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        </div>
                        <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        <div class="prd-tag"><a href="#">FOXic</a></div>
                        <h2 class="prd-title"><a href="product.html">Leather Pegged Pants</a></h2>
                        <div class="prd-description">
                          Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                        </div>
                        <div class="prd-action">
                          <form action="#">
                            <button class="btn js-prd-addtocart" data-product='{"name": "Leather Pegged Pants", "path":"images/skins/fashion/products/product-01-1.jpg", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
                          </form>
                        </div>
                      </div>
                      <div class="prd-hovers">
                        <div class="prd-circle-labels">
                          <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                          <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                        </div>
                        <div class="prd-price">
                          <div class="price-new">$ 180</div>
                        </div>
                        <div class="prd-action">
                          <div class="prd-action-left">
                            <form action="#">
                              <button class="btn js-prd-addtocart" data-product='{"name": "Leather Pegged Pants", "path":"images/skins/fashion/products/product-01-1.jpg", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                  <div class="prd-inside">
                    <div class="prd-img-area">
                      <a href="product.html" class="prd-img image-hover-scale image-container">
                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-02-1.jpg" alt="Oversize Cotton Dress" class="js-prd-img lazyload fade-up">
                        <div class="foxic-loader"></div>
                        <div class="prd-big-squared-labels">
                        </div>
                      </a>
                      <div class="prd-circle-labels">
                        <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                        <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                        <div class="colorswatch-label colorswatch-label--variants js-prd-colorswatch">
                          <i class="icon-palette"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span></i>
                          <ul>
                            <li data-image="images/skins/fashion/products/product-02-1.jpg"><a class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="Color Name"><img src="images/colorswatch/color-orange.png')}}" alt=""></a></li>
                            <li data-image="images/skins/fashion/products/product-02-color-2.jpg"><a class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="Color Name"><img src="images/colorswatch/color-red.png')}}" alt=""></a></li>
                            <li data-image="images/skins/fashion/products/product-02-color-3.jpg"><a class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="Color Name"><img src="images/colorswatch/color-yellow.png')}}" alt=""></a></li>
                          </ul>
                        </div>
                      </div>
                      <ul class="list-options color-swatch">
                        <li data-image="images/skins/fashion/products/product-02-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-02-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-02-2.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-02-2.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-02-3.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-02-3.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                      </ul>
                    </div>
                    <div class="prd-info">
                      <div class="prd-info-wrap">
                        <div class="prd-info-top">
                          <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        </div>
                        <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        <div class="prd-tag"><a href="#">Seiko</a></div>
                        <h2 class="prd-title"><a href="product.html">Oversize Cotton Dress</a></h2>
                        <div class="prd-description">
                          Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                        </div>
                        <div class="prd-action">
                          <form action="#">
                            <button class="btn js-prd-addtocart" data-product='{"name": "Oversize Cotton Dress", "path":"images/skins/fashion/products/product-02-1.jpg", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
                          </form>
                        </div>
                      </div>
                      <div class="prd-hovers">
                        <div class="prd-circle-labels">
                          <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                          <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                        </div>
                        <div class="prd-price">
                          <div class="price-new">$ 180</div>
                        </div>
                        <div class="prd-action">
                          <div class="prd-action-left">
                            <form action="#">
                              <button class="btn js-prd-addtocart" data-product='{"name": "Oversize Cotton Dress", "path":"images/skins/fashion/products/product-02-1.jpg", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                  <div class="prd-inside">
                    <div class="prd-img-area">
                      <a href="product.html" class="prd-img image-hover-scale image-container">
                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-03-1.jpg" alt="Oversized Cotton Blouse" class="js-prd-img lazyload fade-up">
                        <div class="foxic-loader"></div>
                        <div class="prd-big-squared-labels">
                          <div class="label-new"><span>New</span></div>
                          <div class="label-sale"><span>-10% <span class="sale-text">Sale</span></span>
                            <div class="countdown-circle">
                              <div class="countdown js-countdown" data-countdown="2021/07/01"></div>
                            </div>
                          </div>
                        </div>
                      </a>
                      <div class="prd-circle-labels">
                        <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                        <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                      </div>
                      <ul class="list-options color-swatch">
                        <li data-image="images/skins/fashion/products/product-03-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-03-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-03-2.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-03-2.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-03-3.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-03-3.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                      </ul>
                    </div>
                    <div class="prd-info">
                      <div class="prd-info-wrap">
                        <div class="prd-info-top">
                          <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        </div>
                        <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        <div class="prd-tag"><a href="#">Banita</a></div>
                        <h2 class="prd-title"><a href="product.html">Oversized Cotton Blouse</a></h2>
                        <div class="prd-description">
                          Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                        </div>
                        <div class="prd-action">
                          <form action="#">
                            <button class="btn js-prd-addtocart" data-product='{"name": "Oversized Cotton Blouse", "path":"images/skins/fashion/products/product-03-1.jpg", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
                          </form>
                        </div>
                      </div>
                      <div class="prd-hovers">
                        <div class="prd-circle-labels">
                          <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                          <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                        </div>
                        <div class="prd-price">
                          <div class="price-old">$ 200</div>
                          <div class="price-new">$ 180</div>
                        </div>
                        <div class="prd-action">
                          <div class="prd-action-left">
                            <form action="#">
                              <button class="btn js-prd-addtocart" data-product='{"name": "Oversized Cotton Blouse", "path":"images/skins/fashion/products/product-03-1.jpg", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                  <div class="prd-inside">
                    <div class="prd-img-area">
                      <a href="product.html" class="prd-img image-hover-scale image-container">
                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-04-1.jpg" alt="Suede Leather Mini Skirt" class="js-prd-img lazyload fade-up">
                        <div class="foxic-loader"></div>
                        <div class="prd-big-squared-labels">
                        </div>
                      </a>
                      <div class="prd-circle-labels">
                        <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                        <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                      </div>
                      <ul class="list-options color-swatch">
                        <li data-image="images/skins/fashion/products/product-04-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-04-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-04-2.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-04-2.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-04-3.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-04-3.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                      </ul>
                    </div>
                    <div class="prd-info">
                      <div class="prd-info-wrap">
                        <div class="prd-info-top">
                          <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        </div>
                        <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        <div class="prd-tag"><a href="#">Bigsteps</a></div>
                        <h2 class="prd-title"><a href="product.html">Suede Leather Mini Skirt</a></h2>
                        <div class="prd-description">
                          Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                        </div>
                        <div class="prd-action">
                          <form action="#">
                            <button class="btn js-prd-addtocart" data-product='{"name": "Suede Leather Mini Skirt", "path":"images/skins/fashion/products/product-04-1.jpg", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
                          </form>
                        </div>
                      </div>
                      <div class="prd-hovers">
                        <div class="prd-circle-labels">
                          <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                          <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                        </div>
                        <div class="prd-price">
                          <div class="price-new">$ 180</div>
                        </div>
                        <div class="prd-action">
                          <div class="prd-action-left">
                            <form action="#">
                              <button class="btn js-prd-addtocart" data-product='{"name": "Suede Leather Mini Skirt", "path":"images/skins/fashion/products/product-04-1.jpg", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                  <div class="prd-inside">
                    <div class="prd-img-area">
                      <a href="product.html" class="prd-img image-hover-scale image-container">
                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-05-1.jpg" alt="Cotton T-shirt" class="js-prd-img lazyload fade-up">
                        <div class="foxic-loader"></div>
                        <div class="prd-big-squared-labels">
                        </div>
                      </a>
                      <div class="prd-circle-labels">
                        <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                        <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                      </div>
                      <ul class="list-options color-swatch">
                        <li data-image="images/skins/fashion/products/product-05-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-05-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-05-2.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-05-2.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-05-3.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-05-3.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                      </ul>
                    </div>
                    <div class="prd-info">
                      <div class="prd-info-wrap">
                        <div class="prd-info-top">
                          <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        </div>
                        <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        <div class="prd-tag"><a href="#">FOXic</a></div>
                        <h2 class="prd-title"><a href="product.html">Cotton T-shirt</a></h2>
                        <div class="prd-description">
                          Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                        </div>
                        <div class="prd-action">
                          <form action="#">
                            <button class="btn js-prd-addtocart" data-product='{"name": "Cotton T-shirt", "path":"images/skins/fashion/products/product-05-1.jpg", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
                          </form>
                        </div>
                      </div>
                      <div class="prd-hovers">
                        <div class="prd-circle-labels">
                          <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                          <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                        </div>
                        <div class="prd-price">
                          <div class="price-new">$ 180</div>
                        </div>
                        <div class="prd-action">
                          <div class="prd-action-left">
                            <form action="#">
                              <button class="btn js-prd-addtocart" data-product='{"name": "Cotton T-shirt", "path":"images/skins/fashion/products/product-05-1.jpg", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                  <div class="prd-inside">
                    <div class="prd-img-area">
                      <a href="product.html" class="prd-img image-hover-scale image-container">
                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-06-1.jpg" alt="Midi Dress with Belt" class="js-prd-img lazyload fade-up">
                        <div class="foxic-loader"></div>
                        <div class="prd-big-squared-labels">
                        </div>
                      </a>
                      <div class="prd-circle-labels">
                        <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                        <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                        <div class="colorswatch-label colorswatch-label--variants js-prd-colorswatch">
                          <i class="icon-palette"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span></i>
                          <ul>
                            <li data-image="images/skins/fashion/products/product-06-1.jpg"><a class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="Color Name"><img src="images/colorswatch/color-grey.png')}}" alt=""></a></li>
                            <li data-image="images/skins/fashion/products/product-06-color-2.jpg"><a class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="Color Name"><img src="images/colorswatch/color-green.png')}}" alt=""></a></li>
                            <li data-image="images/skins/fashion/products/product-06-color-3.jpg"><a class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="Color Name"><img src="images/colorswatch/color-black.png')}}" alt=""></a></li>
                          </ul>
                        </div>
                      </div>
                      <ul class="list-options color-swatch">
                        <li data-image="images/skins/fashion/products/product-06-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-06-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-06-2.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-06-2.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-06-3.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-06-3.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                      </ul>
                    </div>
                    <div class="prd-info">
                      <div class="prd-info-wrap">
                        <div class="prd-info-top">
                          <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        </div>
                        <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        <div class="prd-tag"><a href="#">Seiko</a></div>
                        <h2 class="prd-title"><a href="product.html">Midi Dress with Belt</a></h2>
                        <div class="prd-description">
                          Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                        </div>
                        <div class="prd-action">
                          <form action="#">
                            <button class="btn js-prd-addtocart" data-product='{"name": "Midi Dress with Belt", "path":"images/skins/fashion/products/product-06-1.jpg", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
                          </form>
                        </div>
                      </div>
                      <div class="prd-hovers">
                        <div class="prd-circle-labels">
                          <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                          <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                        </div>
                        <div class="prd-price">
                          <div class="price-new">$ 180</div>
                        </div>
                        <div class="prd-action">
                          <div class="prd-action-left">
                            <form action="#">
                              <button class="btn js-prd-addtocart" data-product='{"name": "Midi Dress with Belt", "path":"images/skins/fashion/products/product-06-1.jpg", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="prd prd--style2 prd-labels--max prd-labels-shadow prd-outstock">
                  <div class="prd-inside">
                    <div class="prd-img-area">
                      <a href="product.html" class="prd-img image-hover-scale image-container">
                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-07-1.jpg" alt="Denim Mini Skirt" class="js-prd-img lazyload fade-up">
                        <div class="foxic-loader"></div>
                        <div class="prd-big-squared-labels">
                          <div class="label-outstock"><span>Sold Out</span></div>
                        </div>
                      </a>
                      <div class="prd-circle-labels">
                        <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                        <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                      </div>
                      <ul class="list-options color-swatch">
                        <li data-image="images/skins/fashion/products/product-07-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-07-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                      </ul>
                    </div>
                    <div class="prd-info">
                      <div class="prd-info-wrap">
                        <div class="prd-info-top">
                          <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        </div>
                        <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        <div class="prd-tag"><a href="#">Banita</a></div>
                        <h2 class="prd-title"><a href="product.html">Denim Mini Skirt</a></h2>
                        <div class="prd-description">
                          Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                        </div>
                        <div class="prd-action">
                          <form action="#">
                            <button class="btn js-prd-addtocart" data-product='{"name": "Denim Mini Skirt", "path":"images/skins/fashion/products/product-07-1.jpg", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
                          </form>
                        </div>
                      </div>
                      <div class="prd-hovers">
                        <div class="prd-circle-labels">
                          <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                          <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                        </div>
                        <div class="prd-price">
                          <div class="price-new">$ 180</div>
                        </div>
                        <div class="prd-action">
                          <div class="prd-action-left">
                            <form action="#">
                              <button class="btn js-prd-addtocart" data-product='{"name": "Denim Mini Skirt", "path":"images/skins/fashion/products/product-07-1.jpg", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                  <div class="prd-inside">
                    <div class="prd-img-area">
                      <a href="product.html" class="prd-img image-hover-scale image-container">
                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-08-1.jpg" alt="Peg Leg Trousers" class="js-prd-img lazyload fade-up">
                        <div class="foxic-loader"></div>
                        <div class="prd-big-squared-labels">
                          <div class="label-sale"><span>-10% <span class="sale-text">Sale</span></span>
                            <div class="countdown-circle">
                              <div class="countdown js-countdown" data-countdown="2021/07/01"></div>
                            </div>
                          </div>
                        </div>
                      </a>
                      <div class="prd-circle-labels">
                        <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                        <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                      </div>
                      <ul class="list-options color-swatch">
                        <li data-image="images/skins/fashion/products/product-08-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-08-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-08-2.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-08-2.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-08-3.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-08-3.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                      </ul>
                    </div>
                    <div class="prd-info">
                      <div class="prd-info-wrap">
                        <div class="prd-info-top">
                          <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        </div>
                        <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        <div class="prd-tag"><a href="#">FOXic</a></div>
                        <h2 class="prd-title"><a href="product.html">Peg Leg Trousers</a></h2>
                        <div class="prd-description">
                          Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                        </div>
                        <div class="prd-action">
                          <form action="#">
                            <button class="btn js-prd-addtocart" data-product='{"name": "Peg Leg Trousers", "path":"images/skins/fashion/products/product-08-1.jpg", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
                          </form>
                        </div>
                      </div>
                      <div class="prd-hovers">
                        <div class="prd-circle-labels">
                          <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                          <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                        </div>
                        <div class="prd-price">
                          <div class="price-old">$ 200</div>
                          <div class="price-new">$ 180</div>
                        </div>
                        <div class="prd-action">
                          <div class="prd-action-left">
                            <form action="#">
                              <button class="btn js-prd-addtocart" data-product='{"name": "Peg Leg Trousers", "path":"images/skins/fashion/products/product-08-1.jpg", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                  <div class="prd-inside">
                    <div class="prd-img-area">
                      <a href="product.html" class="prd-img image-hover-scale image-container">
                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-09-1.jpg" alt="Skinny Jeans" class="js-prd-img lazyload fade-up">
                        <div class="foxic-loader"></div>
                        <div class="prd-big-squared-labels">
                          <div class="label-new"><span>New</span></div>
                        </div>
                      </a>
                      <div class="prd-circle-labels">
                        <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                        <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                      </div>
                      <ul class="list-options color-swatch">
                        <li data-image="images/skins/fashion/products/product-09-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-09-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-09-2.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-09-2.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-09-3.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-09-3.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                      </ul>
                    </div>
                    <div class="prd-info">
                      <div class="prd-info-wrap">
                        <div class="prd-info-top">
                          <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        </div>
                        <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        <div class="prd-tag"><a href="#">FOXic</a></div>
                        <h2 class="prd-title"><a href="product.html">Skinny Jeans</a></h2>
                        <div class="prd-description">
                          Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                        </div>
                        <div class="prd-action">
                          <form action="#">
                            <button class="btn js-prd-addtocart" data-product='{"name": "Skinny Jeans", "path":"images/skins/fashion/products/product-09-1.jpg", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
                          </form>
                        </div>
                      </div>
                      <div class="prd-hovers">
                        <div class="prd-circle-labels">
                          <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                          <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                        </div>
                        <div class="prd-price">
                          <div class="price-new">$ 180</div>
                        </div>
                        <div class="prd-action">
                          <div class="prd-action-left">
                            <form action="#">
                              <button class="btn js-prd-addtocart" data-product='{"name": "Skinny Jeans", "path":"images/skins/fashion/products/product-09-1.jpg", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                  <div class="prd-inside">
                    <div class="prd-img-area">
                      <a href="product.html" class="prd-img image-hover-scale image-container">
                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-10-1.jpg" alt="Short Sleeve Blouse" class="js-prd-img lazyload fade-up">
                        <div class="foxic-loader"></div>
                        <div class="prd-big-squared-labels">
                          <div class="label-sale"><span>-10% <span class="sale-text">Sale</span></span>
                            <div class="countdown-circle">
                              <div class="countdown js-countdown" data-countdown="2021/07/01"></div>
                            </div>
                          </div>
                        </div>
                      </a>
                      <div class="prd-circle-labels">
                        <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                        <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                      </div>
                      <ul class="list-options color-swatch">
                        <li data-image="images/skins/fashion/products/product-10-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-10-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-10-2.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-10-2.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-10-3.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-10-3.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                      </ul>
                    </div>
                    <div class="prd-info">
                      <div class="prd-info-wrap">
                        <div class="prd-info-top">
                          <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        </div>
                        <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        <div class="prd-tag"><a href="#">FOXic</a></div>
                        <h2 class="prd-title"><a href="product.html">Short Sleeve Blouse</a></h2>
                        <div class="prd-description">
                          Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                        </div>
                        <div class="prd-action">
                          <form action="#">
                            <button class="btn js-prd-addtocart" data-product='{"name": "Short Sleeve Blouse", "path":"images/skins/fashion/products/product-10-1.jpg", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
                          </form>
                        </div>
                      </div>
                      <div class="prd-hovers">
                        <div class="prd-circle-labels">
                          <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                          <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                        </div>
                        <div class="prd-price">
                          <div class="price-old">$ 200</div>
                          <div class="price-new">$ 180</div>
                        </div>
                        <div class="prd-action">
                          <div class="prd-action-left">
                            <form action="#">
                              <button class="btn js-prd-addtocart" data-product='{"name": "Short Sleeve Blouse", "path":"images/skins/fashion/products/product-10-1.jpg", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                  <div class="prd-inside">
                    <div class="prd-img-area">
                      <a href="product.html" class="prd-img image-hover-scale image-container">
                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-11-1.jpg" alt="Jogger Lounge Pants" class="js-prd-img lazyload fade-up">
                        <div class="foxic-loader"></div>
                        <div class="prd-big-squared-labels">
                          <div class="label-sale"><span>-10% <span class="sale-text">Sale</span></span>
                            <div class="countdown-circle">
                              <div class="countdown js-countdown" data-countdown="2021/07/01"></div>
                            </div>
                          </div>
                        </div>
                      </a>
                      <div class="prd-circle-labels">
                        <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                        <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                      </div>
                      <ul class="list-options color-swatch">
                        <li data-image="images/skins/fashion/products/product-11-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-11-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-11-2.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-11-2.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-11-3.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-11-3.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                      </ul>
                    </div>
                    <div class="prd-info">
                      <div class="prd-info-wrap">
                        <div class="prd-info-top">
                          <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        </div>
                        <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        <div class="prd-tag"><a href="#">FOXic</a></div>
                        <h2 class="prd-title"><a href="product.html">Jogger Lounge Pants</a></h2>
                        <div class="prd-description">
                          Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                        </div>
                        <div class="prd-action">
                          <form action="#">
                            <button class="btn js-prd-addtocart" data-product='{"name": "Jogger Lounge Pants", "path":"images/skins/fashion/products/product-11-1.jpg", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
                          </form>
                        </div>
                      </div>
                      <div class="prd-hovers">
                        <div class="prd-circle-labels">
                          <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                          <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                        </div>
                        <div class="prd-price">
                          <div class="price-old">$ 200</div>
                          <div class="price-new">$ 180</div>
                        </div>
                        <div class="prd-action">
                          <div class="prd-action-left">
                            <form action="#">
                              <button class="btn js-prd-addtocart" data-product='{"name": "Jogger Lounge Pants", "path":"images/skins/fashion/products/product-11-1.jpg", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                  <div class="prd-inside">
                    <div class="prd-img-area">
                      <a href="product.html" class="prd-img image-hover-scale image-container">
                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-12-1.jpg" alt="Elastic Cuff Joggers Pants" class="js-prd-img lazyload fade-up">
                        <div class="foxic-loader"></div>
                        <div class="prd-big-squared-labels">
                          <div class="label-sale"><span>-10% <span class="sale-text">Sale</span></span>
                            <div class="countdown-circle">
                              <div class="countdown js-countdown" data-countdown="2021/07/01"></div>
                            </div>
                          </div>
                        </div>
                      </a>
                      <div class="prd-circle-labels">
                        <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                        <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                      </div>
                      <ul class="list-options color-swatch">
                        <li data-image="images/skins/fashion/products/product-12-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-12-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-12-2.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-12-2.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                        <li data-image="images/skins/fashion/products/product-12-3.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-12-3.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                      </ul>
                    </div>
                    <div class="prd-info">
                      <div class="prd-info-wrap">
                        <div class="prd-info-top">
                          <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        </div>
                        <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                        <div class="prd-tag"><a href="#">FOXic</a></div>
                        <h2 class="prd-title"><a href="product.html">Elastic Cuff Joggers Pants</a></h2>
                        <div class="prd-description">
                          Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                        </div>
                        <div class="prd-action">
                          <form action="#">
                            <button class="btn js-prd-addtocart" data-product='{"name": "Elastic Cuff Joggers Pants", "path":"images/skins/fashion/products/product-12-1.jpg", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
                          </form>
                        </div>
                      </div>
                      <div class="prd-hovers">
                        <div class="prd-circle-labels">
                          <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                          <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                        </div>
                        <div class="prd-price">
                          <div class="price-old">$ 200</div>
                          <div class="price-new">$ 180</div>
                        </div>
                        <div class="prd-action">
                          <div class="prd-action-left">
                            <form action="#">
                              <button class="btn js-prd-addtocart" data-product='{"name": "Elastic Cuff Joggers Pants", "path":"images/skins/fashion/products/product-12-1.jpg", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> -->
              </div>
              <!-- <div class="loader-horizontal-sm js-loader-horizontal-sm d-none" data-loader-horizontal style="opacity: 0;"><span></span></div>
              <div class="circle-loader-wrap">
                <div class="circle-loader">
                  <a href="ajax/ajax-product-category.json" data-total="30" data-loaded="12" data-load="6" class="lazyload js-circle-loader">
                    <svg id="svg_d" version="1.1" xmlns="http://www.w3.org/2000/svg">
                      <circle cx="50%" cy="50%" r="63" fill="transparent"></circle>
                      <circle class="js-circle-bar" cx="50%" cy="50%" r="63" fill="transparent"></circle>
                    </svg>
                    <svg id="svg_m" version="1.1" xmlns="http://www.w3.org/2000/svg">
                      <circle cx="50%" cy="50%" r="50" fill="transparent"></circle>
                      <circle class="js-circle-bar" cx="50%" cy="50%" r="50" fill="transparent"></circle>
                    </svg>
                    <div class="circle-loader-text">Load More</div>
                    <div class="circle-loader-text-alt"><span class="js-circle-loader-start"></span>&nbsp;out of&nbsp;<span class="js-circle-loader-end"></span></div>
                  </a>
                </div>
              </div> -->
              <!-- /Products Grid -->
            </div>
          </div>