<div class="col-lg-7 col-xl-5 mt-3 mt-md-0">
            <!-- <div class="cart-promo-banner">
              <div class="cart-promo-banner-inside">
                <div class="txt1">Save 50%</div>
                <div class="txt2">Only Today!</div>
              </div>
            </div> -->
            <div class="card-total">
              <!-- <div class="text-right">
                <button class="btn btn--grey"><span>UPDATE CART</span><i class="icon-refresh"></i></button>
              </div> -->
              <div class="row d-flex">
                <div class="col card-total-txt">Total</div>
                <div class="col-auto card-total-price text-right" id="grand_total_{{$cartid->id}}">{{$current_currency}} {{$cartid->total+0}}</div>
              </div>
              <form action="{{route('CheckOut',$cartid->id)}}" method="get">
                @csrf()
                <input type="hidden" name="cartId" value="{{$cartid->id}}">
                <button type="submit" class="btn btn--full btn--lg"><span>Checkout</span></button>
              </form>
              <!-- <div class="card-text-info text-right">
                <h5>Standart shipping</h5>
                <p><b>10 - 11 business days</b><br>1 item ships from the U.S. and will be delivered in 10 - 11 business days</p>
              </div> -->
            </div>
            <div class="mt-2"></div>
          </div>