<div class="card mt-3 d-none" id="updateAddress{{$i}}">
<form action="{{route('update_customer_address',$address[$i]->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group" >
        <div class="card">
            <div class="card-title mt-2 ml-2">
            <h2>Edit Address</h2>
            <hr  width="40%" align="left">
            </div>
            <div class="card-body">
                <div class="form-grpup">
                  
                    <label class="text-uppercase">Address Title:</label>
                    <input class="col-18" type="text" value="{{$addressEdit->address_title}}" name="name">
                </div>
                <div class="form-grpup">
                    <label class="text-uppercase">Address Line 1:</label>
                    <input class="col-18" type="text" value="{{$addressEdit->address_line_1}}" name="address1">
                </div>

                <div class="form-grpup">
                    <label class="text-uppercase">Address Line 2:</label>
                    <input class="col-18" type="text" value="{{$addressEdit->address_line_2}}" name="address2">
                </div>

                <label class="text-uppercase">Country:</label>
                <select class="form-select col-md-18 country" aria-label="Default select example" name="country" >
                    <option selected disabled>-----Select Country-----</option>
                    @for($j=0; $j < count($country); $j++)
                    <option value="{{$country[$j]->id}}">{{$country[$j]->name}}</option>
                    @endfor
                </select>
                <br>
                <!-- ----------Select State ------------ -->
                
                <label class="text-uppercase">State:</label>
                <select class="form-select col-md-18 state" aria-label="Default select example" name="state" >
                    <option selected disabled>-----Select State-----</option>
                </select>
                <div class="row">
                    <div class="col-9">
                        <label class="text-uppercase">City:</label>
                        <div class="form-group">
                            <input type="text" name="city"value="{{$addressEdit->city}}" class="col-18">
                        </div>
                    </div>
                    <div class="col-9">
                        <label class="text-uppercase">zip/postal code:</label>
                        <div class="form-group">
                            <input type="text" name="zip_code"value="{{$addressEdit->zip_code}}" class="col-18">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-9">
                        <label class="text-uppercase">Phone/Mobile:</label>
                        <div class="form-group">
                                <input type="text" name="phone" value="{{$addressEdit->phone}}" class="col-18">
                        </div>
                    </div>
                </div>

                <!-- <div class="clearfix">
                  <input name="checkbox" type="checkbox">
                  <label >Set address as default</label>
                </div> -->

                <br>
                <div class="mt-2">
                  <button type="reset" class="btn btn--alt js-close-form" data-form="#updateAddress{{$i}}">Cancel</button>
                  <button type="submit" class="btn ml-1">Update Address</button>
                </div>
            </div>
        </div>
    </div>
    </form>
              {{-- <!--<div class="card-body">
                <h3>Edit Address</h3>
                <label class="text-uppercase">Country:</label>
                <div class="form-group select-wrapper">
                  <select class="form-control">
                    <option value="United States">United States</option>
                    <option value="Canada">Canada</option>
                    <option value="China">China</option>
                    <option value="India">India</option>
                    <option value="Italy">Italy</option>
                    <option value="Mexico">Mexico</option>
                  </select>
                </div>
                <label class="text-uppercase">State:</label>
                <div class="form-group select-wrapper">
                  <select class="form-control">
                    <option value="AL">Alabama</option>
                    <option value="AK">Alaska</option>
                    <option value="AZ">Arizona</option>
                    <option value="AR">Arkansas</option>
                    <option value="CA">California</option>
                    <option value="CO">Colorado</option>
                    <option value="CT">Connecticut</option>
                    <option value="DE">Delaware</option>
                    <option value="DC">District Of Columbia</option>
                    <option value="FL">Florida</option>
                    <option value="GA">Georgia</option>
                    <option value="HI">Hawaii</option>
                    <option value="ID">Idaho</option>
                    <option value="IL">Illinois</option>
                    <option value="IN">Indiana</option>
                    <option value="IA">Iowa</option>
                    <option value="KS">Kansas</option>
                    <option value="KY">Kentucky</option>
                    <option value="LA">Louisiana</option>
                  </select>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <label class="text-uppercase">City:</label>
                    <div class="form-group">
                      <input type="text" class="form-control">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <label class="text-uppercase">zip/postal code:</label>
                    <div class="form-group">
                      <input type="text" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="clearfix">
                  <input id="formCheckbox1" name="checkbox1" type="checkbox">
                  <label for="formCheckbox1">Set address as default</label>
                </div> 
                <div class="mt-2">
                  <button type="reset" class="btn btn--alt js-close-form" data-form="#updateAddress">Cancel</button>
                  <button type="submit" class="btn ml-1">Add Address</button>
                </div>
              </div>--> --}} 
</div>
