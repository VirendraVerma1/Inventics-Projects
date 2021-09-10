@if(count($inventory)>0)
@foreach($inventory as $product)
          @php
           $tempwish = false;
           foreach($wished_items as $items)
           {
             
             if($items->id==$product->id)
             {
             $tempwish = true;
             }
           }
           @endphp
              <div class="prd prd--style2 prd-labels--max prd-labels-shadow custom_product_temp my_product " style="opacity:1;">
                  <div class="prd-inside">
                    <div class="prd-img-area">
                      <a href="{{route('ProductCurrent',$product->slug)}}" class="prd-img image-hover-scale image-container">
                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{$img_url}}{{$product->img_path}}" alt="{{$product->name}}" class="js-prd-img lazyload fade-up">
                        <div class="foxic-loader"></div>
                        <!-- <div class="prd-big-squared-labels">
                          <div class="label-new"><span>New</span></div>
                        </div> -->
                      </a>
                      <div class="prd-circle-labels">
                        @if($tempwish==false)
                          <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" onclick="add_to_wishlist({{$product->id}},{{$product->product_id}})" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a>
                          <a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"onclick="remove_from_wishlist({{$product->id}})"  title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                        @else
                          <a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" onclick="add_to_wishlist({{$product->id}},{{$product->product_id}})" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a>
                          <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"onclick="remove_from_wishlist({{$product->id}})"  title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                        @endif
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
                            @if(Auth::check())
                                @if($product->stock_quantity)
                                <button class="btn js-prd-addtocart" onclick="onaddtocartclick({{$product->id}})" data-product='{"name": "{{$product->name}}", "path":"{{$img_url}}{{$product->img_path}}", "url":"product/{{$product->product_sub_cat}}/{{$product->product_cat}}/{{$product->slug}}", "aspect_ratio":0.778}' >Add To Cart </button>
                                <!-- <button class="btn js-prd-addtocart" onclick="addToCart({{$product->id}})" data-product='{"name": "{{$product->name}}", "path":"{{$img_url}}{{$product->img_path}}", "url":"product/{{$product->product_sub_cat}}/{{$product->product_cat}}/{{$product->slug}}", "aspect_ratio":0.778}' >Add To Cart 2</button> -->
                                @else
                                <button class="btn btn-secondary" title="Out of stock" disabled >Add To Cart</button> 
                                @endif
                            @else
                                <button class="btn js-dropdn-link btn-secondary" title="Out of stock" data-panel="#dropdnAccount" >Add To Cart</button> 
                            @endif

                        </div>
                      </div>
                      <div class="prd-hovers">
                        <div class="prd-circle-labels">
                          @if($tempwish==false)
                            <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" onclick="add_to_wishlist({{$product->id}},{{$product->product_id}})" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a>
                            <a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"onclick="remove_from_wishlist({{$product->id}})"  title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                            @else
                            <a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" onclick="add_to_wishlist({{$product->id}},{{$product->product_id}})" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a>
                            <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"onclick="remove_from_wishlist({{$product->id}})"  title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                          @endif
                        
                        </div>
                        <div class="prd-price">
                          <div class="price-new">{{$current_currency}} {{$product->min_price+0}}</div>
                        </div>
                        <div class="prd-action">
                          <div class="prd-action-left">
                            @if(Auth::check())
                            @if($product->stock_quantity)
                            <button class="btn js-prd-addtocart" onclick="addToCart({{$product->id}})" data-product='{"name": "{{$product->name}}", "path":"{{$img_url}}{{$product->img_path}}", "url":"product/{{$product->product_sub_cat}}/{{$product->product_cat}}/{{$product->slug}}", "aspect_ratio":0.778}' >Add To Cart </button>
                            <!-- <button class="btn js-prd-addtocart" onclick="addToCart({{$product->id}})" data-product='{"name": "{{$product->name}}", "path":"{{$img_url}}{{$product->img_path}}", "url":"product/{{$product->product_sub_cat}}/{{$product->product_cat}}/{{$product->slug}}", "aspect_ratio":0.778}' >Add To Cart 2</button> -->
                            @else
                            <button class="btn btn-secondary" title="Out of stock" disabled >Add To Cart</button> 
                            @endif
                            @else
                            <button class="btn js-dropdn-link btn-secondary" title="Out of stock" data-panel="#dropdnAccount" >Add To Cart</button> 
                            @endif
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
@else

<div class="col-lg aside">
            <div class="prd-grid-wrap">
              <div class="page404-bg">
                <div class="page404-text">
                  <div class="txt3"><i class="icon-shopping-bag"></i></div>
                  <div class="txt4">Unfortunately, there are no products<br>matching the selection</div>
                </div>
                <svg class="blob" id="morphing" xmlns="http://www.w3.org/2000/svg" width="600" height="600" viewBox="0 0 600 600">
                  <g transform="translate(50,50)">
                    <path class="p" d="M93.5441 2.30824C127.414 -1.02781 167.142 -4.63212 188.625 21.7114C210.22 48.1931 199.088 86.5178 188.761 119.068C179.736 147.517 162.617 171.844 136.426 186.243C108.079 201.828 73.804 212.713 44.915 198.152C16.4428 183.802 6.66731 149.747 1.64848 118.312C-2.87856 89.9563 1.56309 60.9032 19.4066 38.3787C37.3451 15.7342 64.7587 5.14348 93.5441 2.30824Z" />
                  </g>
                </svg>
              </div>
            </div>
          </div>
@endif