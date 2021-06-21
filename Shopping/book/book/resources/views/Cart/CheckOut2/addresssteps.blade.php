<div class="col-md-10">
            <div class="steps-progress">
              <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#step1" data-step="1"><span>01.</span><span>Shipping Address</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#step2" data-step="2"><span>02.</span><span>Billing Address</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#step3" data-step="3"><span>03.</span><span>Delivery Method</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#step4" data-step="4"><span>04.</span><span>Payment Method</span></a>
                </li>
              </ul>
              <div class="progress">
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="5" style="width: 25%;"></div>
              </div>
            </div>
            <div class="tab-content">
                @include('Cart.CheckOut2.Steps.shippingaddress')
                @include('Cart.CheckOut2.Steps.billingaddress')
                @include('Cart.CheckOut2.Steps.deliverymethod')
                @include('Cart.CheckOut2.Steps.paymentmethod')
            </div>
          </div>