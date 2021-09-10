@extends('layouts.master')
@section('title')
    <title>electronics wishlist page</title>
@endsection

@section('content')
<div class="page-content">
    <div class="holder breadcrumbs-wrap mt-0">
      <div class="container">
        <ul class="breadcrumbs">
          <li><a href="/">Home</a></li>
          <li><a href="{{route('Account','details')}}"><span>My account</span></a></li>
          <li><span>wishlist</span></li>
        </ul>
      </div>
    </div>
    <div class="holder px-2">
        <div class="container">
            <div class="row">
                @include('layouts.account.menu')
                <div class="col-md-13 aside">
                    <h1 class="mb-3">My Wishlist</h1>
                    @if(count($wished_items) < 1)
                        <div class="py-3 py-sm-5 ">
                            <h3>Your Wishlist is empty</h3>
                            <div class="mt-5">
                                <a href="/" class="btn">Continue shopping</a>
                            </div>
                        </div>
                    @else
                    <div class="prd-grid-wrap position-relative">
                        <div class="prd-grid  data-to-show-3 data-to-show-lg-3 data-to-show-md-2 data-to-show-sm-2 data-to-show-xs-1">
                            @foreach($wished_items as $wished_item)
                            @foreach($products as $product)
                                @if($wished_item->inventory_id == $product->id)
                                    <div class="prd  prd--style2 prd-labels--max prd-labels-shadow " id="wished_product{{$wished_item->inventory_id}}">
                                        <div class="prd-inside">
                                            <div class="prd-img-area">
                                                <a href="{{route('electronic.product',$product->slug)}}" class="prd-img image-hover-scale image-container">
                                                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{$img_url}}{{$product->img_path}}" alt="{{$product->name}}" class="js-prd-img lazyload fade-up">
                                                    <div class="foxic-loader"></div>
                                                    <div class="prd-big-squared-labels">
                                                    </div>
                                                </a>
                                                <div class="prd-circle-labels">
                                                    <a href="#" class="circle-label-compare " title="Remove From Wishlist" onclick="remove_from_wishlist({{$wished_item->inventory_id}})"><i class="icon-recycle"></i></a>
                                                    <a href="#" class="circle-label-qview  prd-hide-mobile" onclick="getQuickviewData('{{route('electronic.product',$product->slug)}}','{{$product->name}}','{{$img_url}}{{$product->img_path}}','{{$product->description}}',{{$product->min_price +0}})"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                                                </div>
                                                {{--<!-- <ul class="list-options color-swatch">
                                                    <li data-image="images/skins/fashion/products/product-04-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-04-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                                                    <li data-image="images/skins/fashion/products/product-04-2.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-04-2.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                                                    <li data-image="images/skins/fashion/products/product-04-3.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-04-3.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                                                </ul> -->--}}
                                            </div>
                                            <div class="prd-info">
                                                <div class="prd-info-wrap">
                                                    
                                                    <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                                    <div class="prd-tag"><a href="#">Bigsteps</a></div>
                                                    <h2 class="prd-title"><a href="{{route('electronic.product',$product->slug)}}">{{$product->name}}</a></h2>   
                                                </div>
                                                <div class="prd-hovers">
                                                    <div class="prd-price">
                                                        <div class="price-new">$ {{$product->min_price +0}}</div>
                                                    </div>
                                                    <div class="prd-action">
                                                        <div class="prd-action-left">
                                                        <form action="{{route('electronic.product',$product->slug)}}" target="_blank">
                                                        <button class="btn">View Full Info</button>
                                                        </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                @endif
                            @endforeach
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
                <!-- <div class="prd-grid-wrap position-relative">
                    <div class="prd-grid prd-grid--wishlist data-to-show-3 data-to-show-lg-3 data-to-show-md-2 data-to-show-sm-2 data-to-show-xs-1">
                      <div class="prd prd--in-wishlist prd--style2 prd-labels--max prd-labels-shadow ">
                        <div class="prd-inside">
                            <div class="prd-img-area">
                                <a href="{{route('electronic.product')}}" class="prd-img image-hover-scale image-container">
                                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-04-1.jpg" alt="Suede Leather Mini Skirt" class="js-prd-img lazyload fade-up">
                                    <div class="foxic-loader"></div>
                                    <div class="prd-big-squared-labels">
                                    </div>
                                </a>
                                <div class="prd-circle-labels">
                                    <a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist" title="Remove From Wishlist"><i class="icon-recycle"></i></a>
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
                                    <div class="prd-tag"><a href="#">Bigsteps</a></div>
                                    </div>
                                    <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                    <div class="prd-tag"><a href="#">Bigsteps</a></div>
                                    <h2 class="prd-title"><a href="{{route('electronic.product')}}">Suede Leather Mini Skirt</a></h2>
                                    <div class="prd-description">
                                    Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                                    </div>
                                </div>
                                <div class="prd-hovers">
                                    <div class="prd-circle-labels">
                                    <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                                    <div><a href="#" class="circle-label-qview prd-hide-mobile js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                                    </div>
                                    <div class="prd-price">
                                    <div class="price-new">$ 180</div>
                                    </div>
                                    <div class="prd-action">
                                    <div class="prd-action-left">
                                        <form action="{{route('electronic.product')}}" target="_blank">
                                        <button class="btn">View Full Info</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="prd prd--in-wishlist prd--style2 prd-labels--max prd-labels-shadow ">
                        <div class="prd-inside">
                            <div class="prd-img-area">
                            <a href="{{route('electronic.product')}}" class="prd-img image-hover-scale image-container">
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
                                <a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist" title="Remove From Wishlist"><i class="icon-recycle"></i></a>
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
                                <div class="prd-tag"><a href="#">FOXic</a></div>
                                </div>
                                <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                <div class="prd-tag"><a href="#">FOXic</a></div>
                                <h2 class="prd-title"><a href="{{route('electronic.product')}}">Jogger Lounge Pants</a></h2>
                                <div class="prd-description">
                                Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                                </div>
                            </div>
                            <div class="prd-hovers">
                                <div class="prd-circle-labels">
                                <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                                <div><a href="#" class="circle-label-qview prd-hide-mobile js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                                </div>
                                <div class="prd-price">
                                <div class="price-old">$ 200</div>
                                <div class="price-new">$ 180</div>
                                </div>
                                <div class="prd-action">
                                <div class="prd-action-left">
                                    <form action="{{route('electronic.product')}}" target="_blank">
                                    <button class="btn">View Full Info</button>
                                    </form>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="prd prd--in-wishlist prd--style2 prd-labels--max prd-labels-shadow ">
                        <div class="prd-inside">
                            <div class="prd-img-area">
                            <a href="{{route('electronic.product')}}" class="prd-img image-hover-scale image-container">
                                <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-15-1.jpg" alt="Stand Up Collar Shirt" class="js-prd-img lazyload fade-up">
                                <div class="foxic-loader"></div>
                                <div class="prd-big-squared-labels">
                                <div class="label-new"><span>New</span></div>
                                </div>
                            </a>
                            <div class="prd-circle-labels">
                                <a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist" title="Remove From Wishlist"><i class="icon-recycle"></i></a>
                                <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                            </div>
                            <ul class="list-options color-swatch">
                                <li data-image="images/skins/fashion/products/product-15-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-15-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                                <li data-image="images/skins/fashion/products/product-15-2.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-15-2.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                                <li data-image="images/skins/fashion/products/product-15-3.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-15-3.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                            </ul>
                            </div>
                            <div class="prd-info">
                            <div class="prd-info-wrap">
                                <div class="prd-info-top">
                                <div class="prd-tag"><a href="#">FOXic</a></div>
                                </div>
                                <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                <div class="prd-tag"><a href="#">FOXic</a></div>
                                <h2 class="prd-title"><a href="{{route('electronic.product')}}">Stand Up Collar Shirt</a></h2>
                                <div class="prd-description">
                                Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                                </div>
                            </div>
                            <div class="prd-hovers">
                                <div class="prd-circle-labels">
                                <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                                <div><a href="#" class="circle-label-qview prd-hide-mobile js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                                </div>
                                <div class="prd-price">
                                <div class="price-new">$ 180</div>
                                </div>
                                <div class="prd-action">
                                <div class="prd-action-left">
                                    <form action="{{route('electronic.product')}}" target="_blank">
                                    <button class="btn">View Full Info</button>
                                    </form>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="prd prd--in-wishlist prd--style2 prd-labels--max prd-labels-shadow ">
                        <div class="prd-inside">
                            <div class="prd-img-area">
                            <a href="{{route('electronic.product')}}" class="prd-img image-hover-scale image-container">
                                <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-16-1.jpg" alt="Cascade Casual Shirt" class="js-prd-img lazyload fade-up">
                                <div class="foxic-loader"></div>
                                <div class="prd-big-squared-labels">
                                </div>
                            </a>
                            <div class="prd-circle-labels">
                                <a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist" title="Remove From Wishlist"><i class="icon-recycle"></i></a>
                                <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                                <div class="colorswatch-label colorswatch-label--variants js-prd-colorswatch">
                                <i class="icon-palette"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span></i>
                                <ul>
                                    <li data-image="images/skins/fashion/products/product-16-1.jpg"><a class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="Color Name"><img src="images/colorswatch/color-grey.png" alt=""></a></li>
                                    <li data-image="images/skins/fashion/products/product-16-color-2.jpg"><a class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="Color Name"><img src="images/colorswatch/color-green.png" alt=""></a></li>
                                    <li data-image="images/skins/fashion/products/product-16-color-3.jpg"><a class="js-color-toggle" data-toggle="tooltip" data-placement="left" title="Color Name"><img src="images/colorswatch/color-black.png" alt=""></a></li>
                                </ul>
                                </div>
                            </div>
                            <ul class="list-options color-swatch">
                                <li data-image="images/skins/fashion/products/product-16-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-16-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                                <li data-image="images/skins/fashion/products/product-16-2.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-16-2.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                                <li data-image="images/skins/fashion/products/product-16-3.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-16-3.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                            </ul>
                            </div>
                            <div class="prd-info">
                            <div class="prd-info-wrap">
                                <div class="prd-info-top">
                                <div class="prd-tag"><a href="#">FOXic</a></div>
                                </div>
                                <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                <div class="prd-tag"><a href="#">FOXic</a></div>
                                <h2 class="prd-title"><a href="{{route('electronic.product')}}">Cascade Casual Shirt</a></h2>
                                <div class="prd-description">
                                Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                                </div>
                            </div>
                            <div class="prd-hovers">
                                <div class="prd-circle-labels">
                                <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                                <div><a href="#" class="circle-label-qview prd-hide-mobile js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                                </div>
                                <div class="prd-price">
                                <div class="price-new">$ 180</div>
                                </div>
                                <div class="prd-action">
                                <div class="prd-action-left">
                                    <form action="{{route('electronic.product')}}" target="_blank">
                                    <button class="btn">View Full Info</button>
                                    </form>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="prd prd--in-wishlist prd--style2 prd-labels--max prd-labels-shadow ">
                        <div class="prd-inside">
                            <div class="prd-img-area">
                            <a href="{{route('electronic.product')}}" class="prd-img image-hover-scale image-container">
                                <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-17-1.jpg" alt="Stand Collar Shirt" class="js-prd-img lazyload fade-up">
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
                                <a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist" title="Remove From Wishlist"><i class="icon-recycle"></i></a>
                                <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                            </div>
                            <ul class="list-options color-swatch">
                                <li data-image="images/skins/fashion/products/product-17-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-17-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                                <li data-image="images/skins/fashion/products/product-17-2.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-17-2.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                                <li data-image="images/skins/fashion/products/product-17-3.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-17-3.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                            </ul>
                            </div>
                            <div class="prd-info">
                            <div class="prd-info-wrap">
                                <div class="prd-info-top">
                                <div class="prd-tag"><a href="#">FOXic</a></div>
                                </div>
                                <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                <div class="prd-tag"><a href="#">FOXic</a></div>
                                <h2 class="prd-title"><a href="{{route('electronic.product')}}">Stand Collar Shirt</a></h2>
                                <div class="prd-description">
                                Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                                </div>
                            </div>
                            <div class="prd-hovers">
                                <div class="prd-circle-labels">
                                <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                                <div><a href="#" class="circle-label-qview prd-hide-mobile js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                                </div>
                                <div class="prd-price">
                                <div class="price-old">$ 200</div>
                                <div class="price-new">$ 180</div>
                                </div>
                                <div class="prd-action">
                                <div class="prd-action-left">
                                    <form action="{{route('electronic.product')}}" target="_blank">
                                    <button class="btn">View Full Info</button>
                                    </form>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="prd prd--in-wishlist prd--style2 prd-labels--max prd-labels-shadow ">
                        <div class="prd-inside">
                            <div class="prd-img-area">
                            <a href="{{route('electronic.product')}}" class="prd-img image-hover-scale image-container">
                                <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-22-1.jpg" alt="Watch with Black Leather Strap" class="js-prd-img lazyload fade-up">
                                <div class="foxic-loader"></div>
                                <div class="prd-big-squared-labels">
                                <div class="label-new"><span>New</span></div>
                                </div>
                            </a>
                            <div class="prd-circle-labels">
                                <a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist" title="Remove From Wishlist"><i class="icon-recycle"></i></a>
                                <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                            </div>
                            <ul class="list-options color-swatch">
                                <li data-image="images/skins/fashion/products/product-22-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-22-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                                <li data-image="images/skins/fashion/products/product-22-2.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-22-2.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                                <li data-image="images/skins/fashion/products/product-22-3.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-22-3.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                            </ul>
                            </div>
                            <div class="prd-info">
                            <div class="prd-info-wrap">
                                <div class="prd-info-top">
                                <div class="prd-tag"><a href="#">FOXic</a></div>
                                </div>
                                <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                <div class="prd-tag"><a href="#">FOXic</a></div>
                                <h2 class="prd-title"><a href="{{route('electronic.product')}}">Watch with Black Leather Strap</a></h2>
                                <div class="prd-description">
                                Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                                </div>
                            </div>
                            <div class="prd-hovers">
                                <div class="prd-circle-labels">
                                <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                                <div><a href="#" class="circle-label-qview prd-hide-mobile js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                                </div>
                                <div class="prd-price">
                                <div class="price-new">$ 180</div>
                                </div>
                                <div class="prd-action">
                                <div class="prd-action-left">
                                    <form action="{{route('electronic.product')}}" target="_blank">
                                    <button class="btn">View Full Info</button>
                                    </form>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="prd prd--in-wishlist prd--style2 prd-labels--max prd-labels-shadow ">
                        <div class="prd-inside">
                            <div class="prd-img-area">
                            <a href="{{route('electronic.product')}}" class="prd-img image-hover-scale image-container">
                                <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-23-1.jpg" alt="Combined Chunky Sneakers" class="js-prd-img lazyload fade-up">
                                <div class="foxic-loader"></div>
                                <div class="prd-big-squared-labels">
                                </div>
                            </a>
                            <div class="prd-circle-labels">
                                <a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist" title="Remove From Wishlist"><i class="icon-recycle"></i></a>
                                <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                            </div>
                            <ul class="list-options color-swatch">
                                <li data-image="images/skins/fashion/products/product-23-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-23-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                                <li data-image="images/skins/fashion/products/product-23-2.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-23-2.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                                <li data-image="images/skins/fashion/products/product-23-3.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-23-3.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                            </ul>
                            </div>
                            <div class="prd-info">
                            <div class="prd-info-wrap">
                                <div class="prd-info-top">
                                <div class="prd-tag"><a href="#">FOXic</a></div>
                                </div>
                                <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                <div class="prd-tag"><a href="#">FOXic</a></div>
                                <h2 class="prd-title"><a href="{{route('electronic.product')}}">Combined Chunky Sneakers</a></h2>
                                <div class="prd-description">
                                Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                                </div>
                            </div>
                            <div class="prd-hovers">
                                <div class="prd-circle-labels">
                                <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                                <div><a href="#" class="circle-label-qview prd-hide-mobile js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                                </div>
                                <div class="prd-price">
                                <div class="price-new">$ 180</div>
                                </div>
                                <div class="prd-action">
                                <div class="prd-action-left">
                                    <form action="{{route('electronic.product')}}" target="_blank">
                                    <button class="btn">View Full Info</button>
                                    </form>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="prd prd--in-wishlist prd--style2 prd-labels--max prd-labels-shadow ">
                        <div class="prd-inside">
                            <div class="prd-img-area">
                            <a href="{{route('electronic.product')}}" class="prd-img image-hover-scale image-container">
                                <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-24-1.jpg" alt="Lace up Fashion Sneaker" class="js-prd-img lazyload fade-up">
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
                                <a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist" title="Remove From Wishlist"><i class="icon-recycle"></i></a>
                                <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                            </div>
                            <ul class="list-options color-swatch">
                                <li data-image="images/skins/fashion/products/product-24-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-24-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                                <li data-image="images/skins/fashion/products/product-24-2.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-24-2.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                                <li data-image="images/skins/fashion/products/product-24-3.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-24-3.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                            </ul>
                            </div>
                            <div class="prd-info">
                            <div class="prd-info-wrap">
                                <div class="prd-info-top">
                                <div class="prd-tag"><a href="#">FOXic</a></div>
                                </div>
                                <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                <div class="prd-tag"><a href="#">FOXic</a></div>
                                <h2 class="prd-title"><a href="{{route('electronic.product')}}">Lace up Fashion Sneaker</a></h2>
                                <div class="prd-description">
                                Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                                </div>
                            </div>
                            <div class="prd-hovers">
                                <div class="prd-circle-labels">
                                <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                                <div><a href="#" class="circle-label-qview prd-hide-mobile js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                                </div>
                                <div class="prd-price">
                                <div class="price-old">$ 200</div>
                                <div class="price-new">$ 180</div>
                                </div>
                                <div class="prd-action">
                                <div class="prd-action-left">
                                    <form action="{{route('electronic.product')}}" target="_blank">
                                    <button class="btn">View Full Info</button>
                                    </form>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="prd prd--in-wishlist prd--style2 prd-labels--max prd-labels-shadow ">
                        <div class="prd-inside">
                            <div class="prd-img-area">
                            <a href="{{route('electronic.product')}}" class="prd-img image-hover-scale image-container">
                                <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-25-1.jpg" alt="Fashion Waist Bag" class="js-prd-img lazyload fade-up">
                                <div class="foxic-loader"></div>
                                <div class="prd-big-squared-labels">
                                </div>
                            </a>
                            <div class="prd-circle-labels">
                                <a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist" title="Remove From Wishlist"><i class="icon-recycle"></i></a>
                                <a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                            </div>
                            <ul class="list-options color-swatch">
                                <li data-image="images/skins/fashion/products/product-25-1.jpg" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-25-1.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                                <li data-image="images/skins/fashion/products/product-25-2.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-25-2.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                                <li data-image="images/skins/fashion/products/product-25-3.jpg"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/skins/fashion/products/product-25-3.jpg" class="lazyload fade-up" alt="Color Name"></a></li>
                            </ul>
                            </div>
                            <div class="prd-info">
                            <div class="prd-info-wrap">
                                <div class="prd-info-top">
                                <div class="prd-tag"><a href="#">FOXic</a></div>
                                </div>
                                <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                <div class="prd-tag"><a href="#">FOXic</a></div>
                                <h2 class="prd-title"><a href="{{route('electronic.product')}}">Fashion Waist Bag</a></h2>
                                <div class="prd-description">
                                Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
                                </div>
                            </div>
                            <div class="prd-hovers">
                                <div class="prd-circle-labels">
                                <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                                <div><a href="#" class="circle-label-qview prd-hide-mobile js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                                </div>
                                <div class="prd-price">
                                <div class="price-new">$ 180</div>
                                </div>
                                <div class="prd-action">
                                <div class="prd-action-left">
                                    <form action="{{route('electronic.product')}}" target="_blank">
                                    <button class="btn">View Full Info</button>
                                    </form>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div> -->
            </div> 
        </div>
    </div>
    @include('layouts.shop_feature')
</div>   

@endsection
@section('footersticky')
    @include('layouts.payment_note')    
@endsection