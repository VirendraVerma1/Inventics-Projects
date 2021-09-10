<div class="justify-content-center d-none" id="add_address">
    <form action="{{route('add_customer_address')}}" method="post">
    @csrf
    <div class="form-group" >
        <div class="card">
            <div class="card-body">
                <div class="form-grpup">
                    <label class="text-uppercase">Address Title:</label>
                    <input class="col-18" type="text" name="name">
                </div>

                <div class="form-grpup">
                    <label class="text-uppercase">Address Line 1:</label>
                    <input class="col-18" type="text" name="address1" required>
                    @error('address1')
                    <span class='text-danger'>{{$message}}</span>
                    @enderror
                </div>

                <div class="form-grpup">
                    <label class="text-uppercase">Address Line 2:</label>
                    <input class="col-18" type="text" name="address2">
                </div>

                <label class="text-uppercase">Country:</label>
                <select class="form-select col-md-18 country" aria-label="Default select example" name="country" >
                    <option selected disabled>-----Select Country-----</option>
                    @for($i=0; $i < count($country); $i++)
                    <option value="{{$country[$i]->id}}">{{$country[$i]->name}}</option>
                    @endfor
                </select>
                @error('country')
                    <span class='text-danger'>{{$message}}</span>
                @enderror
                <br>
                <!-- ----------Select State ------------ -->
                
                <label class="text-uppercase">State:</label>
                <select class="form-select col-md-18 state" aria-label="Default select example" name="state" >
                    <option selected disabled>-----Select State-----</option>
                </select>
                @error('state')
                    <span class='text-danger'>{{$message}}</span>
                @enderror
                <div class="row">
                    <div class="col-9">
                        <label class="text-uppercase">City:</label>
                        <div class="form-group">
                            <input type="text" name="city" class="col-18">
                        </div>
                    </div>
                    <div class="col-9">
                        <label class="text-uppercase">zip/postal code:</label>
                        <div class="form-group">
                            <input type="text" name="zip_code" class="col-18">
                        </div>
                        @error('zip_code')
                            <span class='text-danger'>{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-9">
                        <label class="text-uppercase">Phone/Mobile:</label>
                        <div class="form-group">
                                <input type="text" name="phone" class="col-18">
                        </div>
                        @error('phone')
                            <span class='text-danger'>{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <br>
                <!-- <div class="form-control">
                  <input  name="checkbox" type="checkbox">
                  <label >Set address as default</label>
                </div> -->

                <br>
                <div class="justifty-content-center text-center">
                    <button type="reset" class="btn btn--alt js-close-form col-auto" data-form="#add_address">Cancel</button>
                    <button type="submit" class="btn btn-success col-auto">Save</button>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
<script>

  $(function(){
    $(".country").change(function(){
      let country_id=this.value;
      console.log(country_id);
      $.ajax({
        type: 'GET',
        url: "{{route('select_state')}}",
        data:{
            country_id: country_id,
        },
        success:function(response){
            console.log(response);
            
            $(".state").html(response);
            
        }
      })
     
    })
  });


</script>
