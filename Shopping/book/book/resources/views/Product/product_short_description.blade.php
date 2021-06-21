<div class="col-md-10 col-lg-10 col-xl-10 mt-1 mt-md-0">
            <div class="prd-block_info prd-block_info--style1" data-prd-handle="/products/copy-of-suede-leather-mini-skirt">
              <div class="prd-block_info-top prd-block_info_item order-0 order-md-2">
                <div class="prd-block_price prd-block_price--style2">
                  <div class="prd-block_price--actual">{{$current_currency}} {{$product->min_price+0}}</div>
                  <div class="prd-block_price-old-wrap">
                  {{--
                    @if($product->max_price>$product->min_price)
                    <span class="prd-block_price--old"></span>
                    <span class="prd-block_price--text">You Save: {{$current_currency}} {{($product->max_price-$product->min_price)+0}} ({{($product->min_price/$product->max_price)*100}}%)</span>
                    @endif
                  --}}
                  </div>
                </div>
                <div class="prd-block_viewed-wrap d-none d-md-flex">
                  <div class="prd-block_viewed">
                    <i class="icon-time"></i>
                    <span>This product was viewed 13 times within last hour</span>
                  </div>
                </div>
              </div>
              <div class="prd-block_description prd-block_info_item ">
                <h3>Short description</h3>
                <p>{!! $product->description !!}</p>
                <div class="mt-1"></div>
                <div class="row vert-margin-less">
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
                </div>
              </div>
              <div class="prd-progress prd-block_info_item" data-left-in-stock="">
                <div class="prd-progress-text">
                  Hurry Up! Left <span class="prd-progress-text-left js-stock-left">26</span> in stock
                </div>
                <div class="prd-progress-text-null"></div>
                <div class="prd-progress-bar-wrap progress">
                  <div class="prd-progress-bar progress-bar active" data-stock="50, 10, 30, 25, 1000, 15000" style="width: 53%;"></div>
                </div>
              </div>
              <div class="prd-block_countdown js-countdown-wrap prd-block_info_item countdown-init">
                <div class="countdown-box-full-text w-md">
                  <div class="row no-gutters align-items-center">
                    <div class="col-sm-auto text-center">
                      <div class="countdown js-countdown" data-countdown="2021/07/01"></div>
                    </div>
                    <div class="col">
                      <div class="countdown-txt"> TIME IS RUNNING OUT!</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="prd-block_order-info prd-block_info_item " data-order-time="" data-locale="en">
                <i class="icon-box-2"></i>
                <div>Order in the next <span class="prd-block_order-info-time countdownCircleTimer" data-time="8:00:00, 15:30:00, 23:59:59"><span><span>04</span>:</span><span><span>46</span>:</span><span><span>24</span></span></span> to get it by <span data-date="">Tuesday, September 08, 2020</span></div>
              </div>
              <div class="prd-block_info_item prd-block_info-when-arrives d-none" data-when-arrives>
                <div class="prd-block_links prd-block_links m-0 d-inline-flex">
                  <i class="icon-email-1"></i>
                  <div><a href="#" data-follow-up="" data-name="Oversize Cotton Dress" class="prd-in-stock" data-src="#whenArrives">Inform me when the item arrives</a></div>
                </div>
              </div>
              <div class="prd-block_info-box prd-block_info_item">
                <div class="two-column">
                  <p>Availability:
                    <span class="prd-in-stock" data-stock-status="">In stock</span>
                  </p>
                  <p class="prd-taxes">Tax Info:
                    <span>Tax included.</span>
                  </p>
                  <p>Collection: <span> <a href="collections.html" data-toggle="tooltip" data-placement="top" data-original-title="View all">Women</a></span></p>
                  <p>Sku: <span data-sku="">{{$product->sku}}</span></p>
                  <p>Vendor: <span>{{$product->brand}}</span></p>
                  <p>Barcode: <span>{{$product->barcode}}</span></p>
                </div>
              </div>
              <div class="order-0 order-md-100">
                <!-- <form action="#"> -->
                  <div class="prd-block_options">
                    <div class="prd-color swatches">
                      <div class="option-label">Color:</div>
                      <select class="form-control hidden single-option-selector-modalQuickView" id="SingleOptionSelector-0" data-index="option1">
                        <option value="Beige" selected="selected">Beige</option>
                        <option value="Black">Black</option>
                        <option value="Red">Red</option>
                      </select>
                      <ul class="images-list js-size-list" data-select-id="SingleOptionSelector-0">
                        <li class="active">
                          <a href="#" data-value="Beige" data-toggle="tooltip" data-placement="top" data-original-title="Beige"><span class="image-container image-container--product"><img src="{{asset('images/skins/fashion/product-page/product-01.jpg')}}" alt=""></span></a>
                        <li>
                        <li>
                          <a href="#" data-value="Black" data-toggle="tooltip" data-placement="top" data-original-title="Black"><span class="image-container image-container--product"><img src="{{asset('images/skins/fashion/product-page/product-04.jpg')}}" alt=""></span></a>
                        <li>
                        <li>
                          <a href="#" data-value="Red" data-toggle="tooltip" data-placement="top" data-original-title="Red"><span class="image-container image-container--product"><img src="{{asset('images/skins/fashion/product-page/product-07.jpg')}}" alt=""></span></a>
                        </li>
                      </ul>
                    </div>
                    <div class="prd-size swatches">
                      <div class="option-label">Size:</div>
                      <select class="form-control hidden single-option-selector-modalQuickView" id="SingleOptionSelector-1" data-index="option2">
                        <option value="Small" selected="selected">Small</option>
                        <option value="Medium">Medium</option>
                        <option value="Large">Large</option>
                      </select>
                      <ul class="size-list js-size-list" data-select-id="SingleOptionSelector-1">
                        <li class="active"><a href="#" data-value="Small"><span class="value">Small</span></a></li>
                        <li><a href="#" data-value="Medium"><span class="value">Medium</span></a></li>
                        <li><a href="#" data-value="Large"><span class="value">Large</span></a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="prd-block_actions prd-block_actions--wishlist">
                    <div class="prd-block_qty">
                      <div class="qty qty-changer">
                        <button class="decrease js-qty-button"></button>
                        <input type="number" class="qty-input" name="quantity{{$product->id}}" value="1" data-min="1" data-max="{{$product->stock_quantity}}">
                        <button class="increase js-qty-button"></button>
                      </div>
                    </div>
                    <div class="btn-wrap">
                    <button onclick="onaddtocartclick({{$product->id}},1)" class="btn btn--add-to-cart js-trigger-addtocart js-prd-addtocart" data-product='{"name": "{{$product->name}}", "path":"{{$img_url}}{{$product->img_path}}", "url":"#", "aspect_ratio":0.778}'>Add To Cart</button>
                      
                      <!-- <button class="btn btn--add-to-cart js-trigger-addtocart js-prd-addtocart" data-product='{"name":  "Leather Pegged Pants ",  "url ": "product.html",  "path ": "{{asset('images/skins/fashion/product-page/product-01.jpg')}},  "aspect_ratio ": "0.78"}'>Add to cart</button> -->
                    </div>
                    <div class="btn-wishlist-wrap">
                      <a href="#" class="btn-add-to-wishlist ml-auto btn-add-to-wishlist--add js-add-wishlist" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a>
                      <a href="#" class="btn-add-to-wishlist ml-auto btn-add-to-wishlist--off js-remove-wishlist" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                    </div>
                  </div>
                <!-- </form> -->
                <div class="prd-block_agreement prd-block_info_item order-0 order-md-100 text-right" data-agree>
                  <input id="agreementCheckboxProductPage" class="js-agreement-checkbox" data-button=".shopify-payment-agree" name="agreementCheckboxProductPage" type="checkbox">
                  <label for="agreementCheckboxProductPage"><a href="#" data-fancybox class="modal-info-link" data-src="#agreementInfo">I agree to the terms of service</a></label>
                </div>
              </div>
              <div class="prd-block_info_item">
                <ul class="prd-block_links list-unstyled">
                  <li><i class="icon-size-guide"></i><a href="#" data-fancybox class="modal-info-link" data-src="#sizeGuide">Size Guide</a></li>
                  <li><i class="icon-delivery-1"></i><a href="#" data-fancybox class="modal-info-link" data-src="#deliveryInfo">Delivery and Return</a></li>
                  <li><i class="icon-email-1"></i><a href="#" data-fancybox class="modal-info-link" data-src="#contactModal">Ask about this product</a></li>
                </ul>
                <div id="sizeGuide" style="display: none;" class="modal-info-content modal-info-content-lg">
                  <div class="modal-info-heading">
                    <div class="mb-1"><i class="icon-size-guide"></i></div>
                    <h2>Size Guide</h2>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless text-center">
                      <thead>
                        <tr>
                          <th>USA</th>
                          <th>UK</th>
                          <th>France</th>
                          <th>Japanese</th>
                          <th>Bust</th>
                          <th>Waist</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>4</td>
                          <td>8</td>
                          <td>36</td>
                          <td>7</td>
                          <td>32"</td>
                          <td>61 cm</td>
                        </tr>
                        <tr>
                          <td>6</td>
                          <td>10</td>
                          <td>38</td>
                          <td>11</td>
                          <td>34"</td>
                          <td>67 cm</td>
                        </tr>
                        <tr>
                          <td>8</td>
                          <td>12</td>
                          <td>40</td>
                          <td>15</td>
                          <td>36"</td>
                          <td>74 cm</td>
                        </tr>
                        <tr>
                          <td>10</td>
                          <td>14</td>
                          <td>42</td>
                          <td>17</td>
                          <td>38"</td>
                          <td>79 cm</td>
                        </tr>
                        <tr>
                          <td>12</td>
                          <td>16</td>
                          <td>44</td>
                          <td>21</td>
                          <td>40"</td>
                          <td>84 cm</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div id="deliveryInfo" style="display: none;" class="modal-info-content modal-info-content-lg">
                  <div class="modal-info-heading">
                    <div class="mb-1"><i class="icon-delivery-1"></i></div>
                    <h2>Delivery and Return</h2>
                  </div>
                  <br>
                  <h5>Our parcel courier service</h5>
                  <p>Foxic is proud to offer an exceptional international parcel shipping service. It is straightforward and very easy to organise international parcel shipping. Our customer service team works around the clock to make sure that you receive high quality courier service from start to finish.</p>
                  <p>Sending a parcel with us is simple. To start the process you will first need to get a quote using our free online quotation service. From this, you’ll be able to navigate through the online form to book a collection date for your parcel, selecting a shipping day suitable for you.</p>
                  <br>
                  <h5>Shipping Time</h5>
                  <p>The shipping time is based on the shipping method you chose.<br>
                    EMS takes about 5-10 working days for delivery.<br>
                    DHL takes about 2-5 working days for delivery.<br>
                    DPEX takes about 2-8 working days for delivery.<br>
                    JCEX takes about 3-7 working days for delivery.<br>
                    China Post Registered Mail takes 20-40 working days for delivery.</p>
                </div>
                <div id="contactModal" style="display: none;" class="modal-info-content modal-info-content-sm">
                  <div class="modal-info-heading">
                    <div class="mb-1"><i class="icon-envelope"></i></div>
                    <h2>Have a question?</h2>
                  </div>
                  <form method="post" action="#" id="contactForm" class="contact-form">
                    <div class="form-group">
                      <input type="text" name="contact[name]" class="form-control form-control--sm" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <input type="text" name="contact[email]" class="form-control form-control--sm" placeholder="Email" required="">
                    </div>
                    <div class="form-group">
                      <input type="text" name="contact[phone]" class="form-control form-control--sm" placeholder="Phone Number">
                    </div>
                    <div class="form-group">
                      <textarea class="form-control textarea--height-170" name="contact[body]" placeholder="Message" required="">Hi! I need next info about the "Oversize Cotton Dress":</textarea>
                    </div>
                    <button class="btn" type="submit">Ask our consultant</button>
                    <p class="p--small mt-15 mb-0">and we will contact you soon</p><input name="recaptcha-v3-token" type="hidden" value="03AGdBq27T8WvzvZu79QsHn8lp5GhjNX-w3wkcpVJgCH15Ehh0tu8c9wTKj4aNXyU0OLM949jTA4cDxfznP9myOBw9m-wggkfcp1Cv_vhsi-TQ9E_EbeLl33dqRhp2sa5tKBOtDspTgwoEDODTHAz3nuvG28jE7foIFoqGWiCqdQo5iEphqtGTvY1G7XgWPAkNPnD0B9V221SYth9vMazf1mkYX3YHAj_g_6qhikdQDsgF2Sa2wOcoLKWiTBMF6L0wxdwhIoGFz3k3VptYem75sxPM4lpS8Y_UAxfvF06fywFATA0nNH0IRnd5eEPnnhJuYc5LYsV6Djg7_S4wLBmOzYnahC-S60MHvQFf-scQqqhPWOtgEKPihUYiGFBJYRn2p1bZwIIhozAgveOtTNQQi7FGqmlbKkRWCA">
                  </form>
                </div>
              </div>
              <div class="prd-block_info_item">
                <img class="img-responsive lazyload d-none d-sm-block" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{asset('images/payment/safecheckout.png')}}" alt="">
                <img class="img-responsive lazyload d-sm-none" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{asset('images/payment/safecheckout-m.png')}}" alt="">
              </div>
            </div>
          </div>
