<div id="quickView" class="ModelquickView" align="center">
    <div class="ModelquickView-content">
        <span class="close">&times;</span>
        <div class="prd-block prd-block--prv-bottom" id="prdGalleryModal">
            <div class="row no-gutters">
                <div class="col-lg-9 " style="border-right:solid">
                    <div class="prd-block_main-image mt-0">
                        <div class="prd-block_main-image-holder">
                            <div class="product-main-carousel js-product-main-carousel-qw js-product-main-zoom-container" data-zoom-position="inner">
                                <div data-value="Beige"><span class="prd-img"><img id="product_image" src="images/skins/fashion/product-page/product-01.jpg" class="lazyload fade-up elzoom" alt="" data-zoom-image="images/skins/fashion/product-page/product-01.jpg"/></span></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-9 quickview-info pl-2">
                    <div class="prd-block_info prd-block_info--style2">
                        <div class="prd-block_countdown js-countdown-wrap prd-block_info_item countdown-init">
                            <div class="countdown-box-full-text-modal">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-sm-auto text-center">
                                        <div class="countdown js-countdown" data-countdown="2021/12/31"><span><span>37</span>DAYS</span><span><span>06</span>HRS</span><span><span>44</span>MIN</span><span><span>23</span>SEC</span></div>
                                    </div>
                                    <div class="col">
                                        <div class="countdown-txt"> TIME IS RUNNING OUT!</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="prd-block_title-wrap">
                            <h1 class="prd-block_title" id="product_name">Product Name</h1>
                        </div>
                        <div class="prd-block_price">
                            <div class="prd-block_price--actual" id="product_price">$0</div>
                            <div class="prd-block_price-old-wrap">
                                <span class="prd-block_price--old">$2000</span>
                                <span class="prd-block_price--text">You Save: <span>$30</span> (<span>16</span>%)</span>
                            </div>
                        </div>
                        <div class="prd-block_description prd-block_info_item" >
                            <p id="product_description" >Model is 5'9" wearing Size XS TallAnd without further ado, we give you our finest Shopify Theme FOXic! It is a subtle, complex and yet an extremely easy to use template for anyone, who wants to create own website in ANY area of expertise.</p>
                            <div class="mt-1"></div>
                            <!-- <div class="row vert-margin-less">
                                <div class="col-sm">
                                    <ul class="list-marker">
                                        <li>100% Polyester</li>
                                        <li>Lining:100% Viscose</li>
                                    </ul>
                                </div>
                                <div class="col-sm">
                                    <ul class="list-marker">
                                        <li>Do not dry clean</li>
                                        <li>Only non-chlorine</li>
                                    </ul>
                                </div>
                            </div> -->
                        </div>
                        
                        <!-- <div class="prd-block_actions prd-block_actions--wishlist">
                            <div class="prd-block_qty">
                                <div class="qty qty-changer">
                                    <button class="decrease js-qty-button"></button>
                                    <input type="number" class="qty-input" id="quantity_product_id" name="quantity" value="1" data-min="1" data-max="1000">
                                    <button class="increase js-qty-button"></button>
                                </div>
                            </div>
                            <div class="btn-wrap">
                                
                                <button class="btn btn--add-to-cart js-prd-addtocart"  data-product='{"name":"Leather Pegged Pants ", "url": "product.html", "path": "images/skins/fashion/products/product-01-1.jpg", "aspect_ratio ": "0.78"}'>Add to cart</button>
                            </div>
                            <div class="btn-wishlist-wrap">
                                <a href="#" class="btn-add-to-wishlist ml-auto btn-add-to-wishlist--add js-add-wishlist" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a>
                                <a href="#" class="btn-add-to-wishlist ml-auto btn-add-to-wishlist--off js-remove-wishlist" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                            </div>
                        </div> -->
                        <div class="prd-block_info_item mt-3 row row--sm-pad vert-margin-middle">
                            <div class="col"><a id="product_link" href="#" class="btn btn--grey w-100">View Full Info</a></div>
                            
                        </div>

                        <div class="prd-block_shopping-info-wrap-compact">
                            <div class="prd-block_shopping-info-compact"><i class="icon-delivery-truck"></i><span>Fast<br>Shipping</span></div>
                            <div class="prd-block_shopping-info-compact"><i class="icon-return"></i><span>Easy<br>Return</span></div>
                            <div class="prd-block_shopping-info-compact"><i class="icon-call-center"></i><span>24/7<br>Support</span></div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
<style>
    .ModelquickView {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 99999; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

        /* Modal Content/Box */
    .ModelquickView-content {
        background-color: #fefefe;
        margin: 2% auto; /* 15% from the top and centered */
        padding: 20px;
        border: 5px solid #888;
        width: 80%; /* Could be more or less, depending on screen size */
    }

        /* The Close Button */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .modal--quickview .prd-block--prv-bottom .product-previews-carousel {
            padding: 0;
        }
        body:not(.equal-height) .modal--quickview .product-previews-carousel a > span {
            display: block;
            position: relative;
            border: 0;
            height: 0;
            overflow: hidden;
            padding-bottom: 128%;
        }
        body:not(.equal-height) .modal--quickview .product-previews-carousel a > span > span {
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        body:not(.equal-height) .modal--quickview .product-previews-carousel a > span img {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        .modal--quickview.modal-quickview--classic .product-previews-carousel {
            height: 0;
            position: relative;
            transition: 0s;
        }
        @media (min-width: 480px) {.modal--quickview.modal-quickview--classic .product-previews-carousel {
            padding-bottom: calc(38% + 10px);
        }
        }
        @media (max-width: 479px) {.modal--quickview.modal-quickview--classic .product-previews-carousel {
            padding-bottom: calc(38% + 10px);
        }
        }
        @media (min-width: 992px) {
            .modal--quickview .prd-block--no-previews .prd-block_info-bottom, .modal--quickview .prd-block--no-previews .prd-block_info-top {
                width: calc(100% - 50% - 20px);
            }
            .modal--quickview.modal-quickview--classic .prd-block_info-bottom {
                width: calc(100% - 50% - 20px);
            }
            .modal--quickview.modal-quickview--classic .quickview-info {
                min-height: 65vh;
            }
        }
</style>