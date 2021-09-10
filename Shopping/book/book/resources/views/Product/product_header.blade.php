<div class="row prd-block prd-block-under prd-block--prv-bottom">
          <div class="col">
            <div class="js-prd-d-holder">
              <div class="prd-block_title-wrap">
              <div class="prd-block_reviews" data-toggle="tooltip" data-placement="top" title="Scroll To Reviews">
                  @php
                  $avgRating=0;
                    for($i=0; $i< count($feedbacks); $i++)
                    {
                      $avgRating= $avgRating + intval($feedbacks[$i]->rating);
                    }
                  @endphp
                  @for($i=0; $i< 5; $i++)
                    @if($i< $avgRating)
                    <i class="icon-star-fill fill"></i>
                    @else
                    <i class="icon-star"></i>
                    @endif
                  @endfor
                  <span class="reviews-link"><a href="#" class="js-reviews-link"> ({{count($feedbacks)}} reviews)</a></span>
                </div>
                <h1 class="prd-block_title">{{$product->name}}</h1>
              </div>
            </div>
          </div>
          <div class="col-md-auto prd-block-prevnext-wrap">
            <div class="prd-block-prevnext">
              <a href="#"><span class="prd-img"><img class="lazyload fade-up" src="{{asset('data:image/gif')}};base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{asset('images/skins/fashion/products/product-02-1.jpg')}}" alt=""><i class="icon-arrow-left"></i></span></a>
              <a href="#"><span class="prd-img"><img class="lazyload fade-up" src="{{asset('data:image/gif')}};base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{asset('images/skins/fashion/products/product-01-1.jpg')}}" alt=""></span></a>
              <a href="#"><span class="prd-img"><img class="lazyload fade-up" src="{{asset('data:image/gif')}};base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{asset('images/skins/fashion/products/product-15-1.jpg')}}" alt=""><i class="icon-arrow-right"></i></span></a>
            </div>
          </div>
        </div>