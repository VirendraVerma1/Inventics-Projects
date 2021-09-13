<div class="tab-pane fade" id="step4">
                <div class="tab-pane-inside">
                  <div class="clearfix">
                    <input id="formcheckoutRadio4" value="6" name="radio2" type="radio" class="radio" checked="checked">
                    <label for="formcheckoutRadio4">Cash On Delivery</label>
                  </div>
                  <div class="clearfix">
                    <input id="formcheckoutRadio5" value="8" name="radio2" type="radio" class="radio">
                    <label for="formcheckoutRadio5" >Paypal</label>
                  </div>
                  <p id="payment-instructions" class="text-info small space30">
              <i class="fa fa-info-circle"></i>
              <span>Start from today</span>
            </p>
                    <!-- <div class="mt-2"></div>
                    <label>Cart Number</label>
                    <div class="form-group">
                      <input type="text" class="form-control form-control--sm">
                    </div>
                    <div class="row">
                      <div class="col-sm-9">
                        <label>Month:</label>
                        <div class="form-group select-wrapper">
                          <select class="form-control form-control--sm">
                            <option selected value='1'>January</option>
                            <option value='2'>February</option>
                            <option value='3'>March</option>
                            <option value='4'>April</option>
                            <option value='5'>May</option>
                            <option value='6'>June</option>
                            <option value='7'>July</option>
                            <option value='8'>August</option>
                            <option value='9'>September</option>
                            <option value='10'>October</option>
                            <option value='11'>November</option>
                            <option value='12'>December</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-9">
                        <label>Year:</label>
                        <div class="form-group select-wrapper">
                          <select class="form-control form-control--sm">
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="mt-2"></div>
                    <label>CVV Code</label>
                    <div class="form-group">
                      <input type="text" class="form-control form-control--sm">
                    </div> -->
                </div>
                @if(count($addresses)>0)
                <div class="clearfix mt-1 mt-md-2 final_place_order">
                  
                  <button type="submit" class="btn btn--lg w-100 place_order_btn">
                  Place Order
                  <input type="hidden" id="cart_id" value="{{$cart->id}}">
                  <!-- <input type="hidden" id="shipping_id" value="{{$shipping_data->id}}">
                   -->
                  </button>
                </div>
                @endif
               
              </div>

