
<div role="tabpanel" class="tab-pane fade" id="Tab5">
            <div id="productReviews">
              <div class="row align-items-center">
                <div class="col">
                  <h2>CUSTOMER REVIEWS <span>: {{count($feedbacks)}}</span></h2>
                </div>
                <div class="col-18 col-md-auto mb-3 mb-md-0"><a  href="#" @auth class="review-write-link"  data-fancybox class="modal-info-link" data-src="#reviewModal"@else class="review-write-link dropdn-link js-dropdn-link js-dropdn-link only-icon" data-panel="#dropdnAccount" @endauth ><i class="icon-pencil"></i>Write review</a></div>
              </div>
              <div id="productReviewsBottom">
                @if(count($feedbacks)>0)
                  @foreach($feedbacks as $feedback)
                    <div class="review-item">
                      <div class="review-item_rating">
                        @for($i=0; $i< 5; $i++)
                          @if($i< intval($feedback->rating))
                          <i class="icon-star-fill fill"></i>
                          @else
                            <i class="icon-star"></i>
                          @endif
                        @endfor
                      </div>
                      <div class="review-item_top row align-items-center">
                        <div class="col">
                          <h5 class="review-item_author">{{$feedback->customer->name}} </h5>
                        </div>
                        <!-- <div class="col-auto"><a href="#" class="review-item_report">Report as Inappropriate</a></div> -->
                      </div>
                      <div class="review-item_content">
                        <p>{{$feedback->comment}}</p>
                      </div>
                    </div>
                  @endforeach
                @endif
              </div>
            </div>
            <div id="reviewModal" style="display: none;" class="modal-info-content modal-info-content-sm">
                <div class="modal-info-heading">
                  <div class="mb-1"><i class="icon-pencil"></i></div>
                  <h2>Your Review</h2>
                </div>
                <form method="post" action="{{route('electronic.product_feedback')}}">
                  @csrf
                  <div class="form-group">
                    <input type="hidden" name="inventory_id" value="{{$product->id}}">
                    <div class="row form-control">
                      <label class="text-uppercase">Rating</label>
                      <select  name="rating">
                        <option selected value=5>5</option>
                        <option  value=4>4</option>
                        <option  value=3>3</option>
                        <option  value=2>2</option>
                        <option  value=1>1</option>
                    </select>
                    </div>
                    <br>
                    <textarea class="form-control textarea--height-170" name="review" placeholder="Hi! I need your review:" required></textarea>
                  </div>
                  <button class="btn" type="submit">Save</button> 
                </form>
            </div>
          </div>
          
          
          <!-- <div role="tabpanel" class="tab-pane fade" id="Tab5">
            <div id="productReviews">
              <div class="row align-items-center">
                <div class="col">
                  <h2>CUSTOMER REVIEWS</h2>
                </div>
                <div class="col-18 col-md-auto mb-3 mb-md-0"><a href="#" class="review-write-link"><i class="icon-pencil"></i>Write review</a></div>
              </div>
              <div id="productReviewsBottom">
                <div class="review-item">
                  <div class="review-item_rating">
                    <i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i>
                  </div>
                  <div class="review-item_top row align-items-center">
                    <div class="col">
                      <h5 class="review-item_author">Jaden Ngo on May 25, 2018</h5>
                    </div>
                    <div class="col-auto"><a href="#" class="review-item_report">Report as Inappropriate</a></div>
                  </div>
                  <div class="review-item_content">
                    <h4>Good ball and company</h4>
                    <p>I recently bought this ball and this is the first ball that I actually buy based on quality and material, I always been playing my friend ball and one of them recommended me this, read some review online and decided to buy it, the ball feel sticky at first but quality is nice and the hand wrote letter was awesome because it shows how much season creator actually care about their customers.</p>
                  </div>
                </div>
                <div class="review-item">
                  <div class="review-item_rating">
                    <i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i>
                  </div>
                  <div class="review-item_top row align-items-center">
                    <div class="col">
                      <h5 class="review-item_author">Jaden Ngo on May 25, 2018</h5>
                    </div>
                    <div class="col-auto"><a href="#" class="review-item_report">Report as Inappropriate</a></div>
                  </div>
                  <div class="review-item_content">
                    <h4>Good ball and company</h4>
                    <p>I recently bought this ball and this is the first ball that I actually buy based on quality and material, I always been playing my friend ball and one of them recommended me this, read some review online and decided to buy it, the ball feel sticky at first but quality is nice and the hand wrote letter was awesome because it shows how much season creator actually care about their customers.</p>
                  </div>
                </div>
                <div class="review-item">
                  <div class="review-item_rating">
                    <i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i>
                  </div>
                  <div class="review-item_top row align-items-center">
                    <div class="col">
                      <h5 class="review-item_author">Jaden Ngo on May 25, 2018</h5>
                    </div>
                    <div class="col-auto"><a href="#" class="review-item_report">Report as Inappropriate</a></div>
                  </div>
                  <div class="review-item_content">
                    <h4>Good ball and company</h4>
                    <p>I recently bought this ball and this is the first ball that I actually buy based on quality and material, I always been playing my friend ball and one of them recommended me this, read some review online and decided to buy it, the ball feel sticky at first but quality is nice and the hand wrote letter was awesome because it shows how much season creator actually care about their customers.</p>
                  </div>
                </div>
                <div class="review-item">
                  <div class="review-item_rating">
                    <i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i>
                  </div>
                  <div class="review-item_top row align-items-center">
                    <div class="col">
                      <h5 class="review-item_author">Jaden Ngo on May 25, 2018</h5>
                    </div>
                    <div class="col-auto"><a href="#" class="review-item_report">Report as Inappropriate</a></div>
                  </div>
                  <div class="review-item_content">
                    <h4>Good ball and company</h4>
                    <p>I recently bought this ball and this is the first ball that I actually buy based on quality and material, I always been playing my friend ball and one of them recommended me this, read some review online and decided to buy it, the ball feel sticky at first but quality is nice and the hand wrote letter was awesome because it shows how much season creator actually care about their customers.</p>
                  </div>
                </div>
                <div class="review-item">
                  <div class="review-item_rating">
                    <i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i>
                  </div>
                  <div class="review-item_top row align-items-center">
                    <div class="col">
                      <h5 class="review-item_author">Jaden Ngo on May 25, 2018</h5>
                    </div>
                    <div class="col-auto"><a href="#" class="review-item_report">Report as Inappropriate</a></div>
                  </div>
                  <div class="review-item_content">
                    <h4>Good ball and company</h4>
                    <p>I recently bought this ball and this is the first ball that I actually buy based on quality and material, I always been playing my friend ball and one of them recommended me this, read some review online and decided to buy it, the ball feel sticky at first but quality is nice and the hand wrote letter was awesome because it shows how much season creator actually care about their customers.</p>
                  </div>
                </div>
              </div>
            </div>
          </div> -->