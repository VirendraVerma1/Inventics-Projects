<div class="tab-pane fade" id="step2">
                 <div class="tab-pane-inside">
                  <!-- <div class="clearfix">
                    <input id="formcheckoutCheckbox2" name="checkbox2" type="checkbox">
                    <label for="formcheckoutCheckbox2">The same as shipping address</label>
                  </div>  -->

            @if(count($addresses)>0)
            <h1 class="mb-3">My Addresses</h1>
            <div class="row">
            
            @csrf()
              @foreach($addresses as $address)
              <div class="col-sm-9" >
              <div class="card">
                  <div class="card-body address_box_billing">
                  <input type="hidden" class="address_id" value="{{$address->id}}">
                  <input type="hidden" class="cart_id" value="{{$cart->id}}">
                  <!-- <input id="formcheckoutCheckbox2" name="create_new_address_checkbox" type="radio"  value="test3"> -->
                    <h3>{{{$address->address_title}}}   @if($address->address_type=="Primary")(Default)@endif</h3>
                    <p>{{$address->address_line_1}}
                      <br> {{$address->address_line_2}},
                      <br> {{$address->state_name}},
                      <br> {{$address->country_name}}
                      <br> Zip Code : {{$address->zip_code}}
                    </p>
                    
                  </div>
                </div>
                
              </div> 
              @endforeach
            
              <!-- <div class="col-sm-9">
                <div class="card">
                  <div class="card-body">
                    <h3>Address 1 (Default)</h3>
                    <p>Thomas Nolan Kaszas
                      <br> 5322 Otter Ln Middleberge
                      <br> FL 32068 Palm Bay FL 32907
                    </p>
                    <div class="mt-2 clearfix">
                      <a href="#" class="link-icn js-show-form" data-form="#updateAddress"><i class="icon-pencil"></i>Edit</a>
                      <a href="#" class="link-icn ml-1 float-right"><i class="icon-cross"></i>Delete</a>
                    </div>
                  </div>
                </div>
              </div> -->
              <!-- <div class="col-sm-9 mt-2 mt-sm-0">
                <div class="card">
                  <div class="card-body">
                    <h3>Address 2</h3>
                    <p>Yuto Murase 42 1
                      <br> Motohakone Hakonemaci Ashigarashimo
                      <br> Gun Kanagawa 250 05 JAPAN
                    </p>
                    <div class="mt-2 clearfix">
                      <a href="#" class="link-icn js-show-form" data-form="#updateAddress"><i class="icon-pencil"></i>Edit</a>
                      <a href="#" class="link-icn ml-1 float-right"><i class="icon-cross"></i>Delete</a>
                    </div>
                  </div>
                </div>
              </div> -->
            </div>
          @endif
                  {{--
                  <div class="row mt-2">
                  
                    <div class="col-sm-9">
                      <label>First Name:</label>
                      <div class="form-group">
                        <input id="address_title_1" type="text" class="form-control form-control--sm" name="address_title_1" value="{{Auth::user()->name}}">
                      </div>
                    </div>
                    <div class="col-sm-9">
                      <label>Last Name:</label>
                      <div class="form-group">
                        <input id="address_title_2" type="text" class="form-control form-control--sm" name="address_title_2" value="{{Auth::user()->nice_name}}">
                      </div>
                    </div>
                  </div>
                  <div class="mt-2"></div>
                  <label>Country:</label>
                  <div class="form-group select-wrapper">
                    <select class="form-control country_id" id="country_id" name="country" >
                      @foreach($countries as $country)
                        <option value="{{$country->id}}">{{$country->name}}</option>
                      @endforeach
                      
                    </select>
                  </div>
                  <div class="row">
                    <div class="col-sm-9">
                      <label>State:</label>
                      <div class="form-group select-wrapper">
                        <select class="form-control state_id" id="state_id" name="state" >
                          <!-- <option value="AL">Alabama</option> -->
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-9">
                      <label>zip/postal code:</label>
                      <div class="form-group">
                        @if($addresses!=null)
                        <input id="zip_code" type="text" class="form-control form-control--sm" name="zip_code" value="{{$addresses->zip_code}}">
                        @else
                        <input id="zip_code" type="text" class="form-control form-control--sm" name="zip_code" value="">
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="mt-2"></div>
                  <label>City :</label>
                  <div class="form-group">
                    @if($addresses!=null)
                      <input id="city" type="text" class="form-control form-control--sm"  name="city" value="{{$addresses->city}}">
                    @else
                      <input id="city" type="text" class="form-control form-control--sm"  name="city" value="">
                    @endif
                    
                  </div>

                  <div class="mt-2"></div>
                  <label>House Number :</label>
                  <div class="form-group">
                    @if($addresses!=null)
                      <input id="house_nu" type="text" class="form-control form-control--sm"  name="house_nu" value="{{$addresses->address_line_1}}">
                    @else
                      <input id="house_nu" type="text" class="form-control form-control--sm"  name="house_nu" value="">
                    @endif
                    
                  </div>
                  <div class="mt-2"></div>
                  <label>Street:</label>
                  <div class="form-group">
                    @if($addresses!=null)
                      <input id="street" type="text" class="form-control form-control--sm" name="street" value="{{$addresses->address_line_2}}">
                    @else
                      <input id="street" type="text" class="form-control form-control--sm" name="street" value="">
                    @endif
                    
                  </div>
                  <div class="mt-2"></div>
                      --}}
                  <div class="text-right">
                    <button type="button" class="btn btn-sm step-next">Continue</button>
                  </div>
                </div>
              </div>