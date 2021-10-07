            <div class="cart-total-sm">
              <span>Subtotal</span>
              <span class="card-total-price" id="old_price_before_coupon">{{$current_currency}} {{$cart->total+0}}</span>
            </div>
            <div class="cart-total-sm custom_coupon">
              <span>Coupon Code</span>
              <span class="card-total-price custom_coupon" id="coupon_code_show"></span>
            </div>
            <div class="cart-total-sm custom_coupon">
              <span>Discount Amount</span>
              <span class="card-total-price custom_coupon" id="coupon_code_value_deducted"></span>
            </div>
            <div class="cart-total-sm custom_coupon">
              <span>Subtotal</span>
              <span class="card-total-price custom_coupon" id="final_price_after_coupon"></span>
            </div>