<div class="col-md-14 aside">
    <a href="#" class="btn ml-1 js-show-form"  onclick="formSetUp('add',1,2,3,4,5,6,7,8)" data-form="#updateAddress">+ Add new Address</a>
          @if(count($addresses)>0)
            <h1 class="mb-3">My Addresses</h1>
            <div class="row">
            
            @csrf()
              @foreach($addresses as $address)
              <div class="col-sm-9">
                <div class="card">
                  <div class="card-body">
                    <h3>{{{$address->address_title}}}   @if($address->address_type=="Primary")(Default)@endif</h3>
                    <p>{{$address->address_line_1}}
                      <br> {{$address->address_line_2}},
                      <br> {{$address->state_name}},
                      <br> {{$address->country_name}}
                      <br> Zip Code : {{$address->zip_code}}
                    </p>
                    <div class="mt-2 clearfix">
                      <a href="#" class="link-icn js-show-form" onclick="formSetUp('{{$address->id}}','{{$address->address_title}}','{{$address->country_id}}','{{$address->state_id}}','{{$address->city}}','{{$address->zip_code}}','{{$address->address_line_1}}','{{$address->address_line_2}}','{{$address->address_type}}')" data-form="#updateAddress"><i class="icon-pencil"></i>Edit</a>
                      <a href="{{route('delete_address',$address->id)}}" class="link-icn ml-1 float-right"><i class="icon-cross"></i>Delete</a>
                      
                    </div>
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

        <form id="address_form" action="" method="POST">
        @csrf()
            <div class="card mt-3 d-none" id="updateAddress">
              <div class="card-body">
               <h3 id="this_title"> Add Address</h3>
                <div class="row">
                  <div class="col-sm-10">
                    <label class="text-uppercase">Title:</label>
                    <div class="form-group">
                      <input type="text" id="title" name="address_title" class="form-control">
                    </div>
                  </div>
                </div>
                <label class="text-uppercase">Country:</label>
                <div class="form-group select-wrapper">
                  <select class="form-control" id="country_id" name="country" >
                  @foreach($countries as $country)
                    <option value="{{$country->id}}">{{$country->name}}</option>
                  @endforeach
                    
                  </select>
                </div>
                <label class="text-uppercase">State:</label>
                <div class="form-group select-wrapper">
                  <select class="form-control" id="state_id" name="state" >
                    <!-- <option value="AL">Alabama</option> -->
                    
                  </select>
                </div>
                
                <div class="row">
                  <div class="col-sm-6">
                    <label class="text-uppercase">City:</label>
                    <div class="form-group">
                      <input type="text" id="city" name="city" class="form-control">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <label class="text-uppercase">zip/postal code:</label>
                    <div class="form-group">
                      <input type="text" id="zip_code" name="zip_code" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-10">
                    <label class="text-uppercase">House Number :</label>
                    <div class="form-group">
                      <input type="text" id="colony" name="colony" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-10">
                    <label class="text-uppercase">Street:</label>
                    <div class="form-group">
                      <input type="text" id="street" name="street" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="clearfix">
                  <div id="primaryCheckboxx">
                    <input id="formCheckbox1" name="primary_address" type="checkbox">
                    <label for="formCheckbox1">Set address as default</label>
                  </div>
                </div>
                <div class="mt-2">
                  <input id="hidden_address_id" name="hidden_address_id"type="hidden" value="">
                  <button type="reset" class="btn btn--alt js-close-form" data-form="#updateAddress">Cancel</button>
                  <button type="submit" id="btn_addresss_name" class="btn ml-1">Add Address</button>
                  
                </div>
              </div>
            </div>
        </form>
          </div>

<script>
var this_title;
var title;
var city;
var zip_code;
var colony;
var street;
function initialize(){
this_title=document.getElementById("this_title");
title=document.getElementById("title");
city=document.getElementById("city");
zip_code=document.getElementById("zip_code");
colony=document.getElementById("colony");
street=document.getElementById("street");

}

function formSetUp(setup,ctitle,country,state,ccity,zip,address1,address2,address_type)
{

  if(setup=='add')
  {
    this_title.innerHTML="Add Address";
    title.value="";
    city.value="";
    zip_code.value="";
    colony.value="";
    street.value="";
    document.getElementById("btn_addresss_name").innerHTML="Add Address";
    $('#address_form').attr('action', "{{route('save_address')}}");
    document.getElementById("formCheckbox1").checked = true;
    
  }
  else
  {
    this_title.innerHTML="Edit Address";
    title.value=ctitle;
    city.value=ccity;
    zip_code.value=zip;
    colony.value=address1;
    street.value=address2;
    document.getElementById("btn_addresss_name").innerHTML="Update Address";
    $('#address_form').attr('action', "{{route('update_address')}}");
    document.getElementById("country_id").value = country;
    loadState(country,state);
    document.getElementById("hidden_address_id").value=setup;
    
    //check box things
    if(address_type=="Primary")
    document.getElementById("formCheckbox1").checked = true;
    else
    document.getElementById("formCheckbox1").checked = false;
    
  }
}

  $(document).ready(function(){
    initialize();
    $("#country_id").change(function(){
      let country_id=this.value;
      loadState(country_id,0);
    })
  })

  function loadState(id,state)
  {
    var country_id=id;
    $.ajax({
      url: "{{route('get_states')}}",
      type: 'POST',
      // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
      data: {
        country: country_id,
        _token:'{{ csrf_token() }}'
      },
         success: function(response){
          console.log(response);
            $("#state_id").html(response);
            if(state!=0)
            {
              document.getElementById("state_id").value = state;
            }
          }
      });  
  }


</script>