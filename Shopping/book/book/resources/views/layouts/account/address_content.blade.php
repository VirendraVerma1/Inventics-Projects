@php
$addressEdit;
@endphp
<div class="col-md-13 aside">
  <h1 class="mb-3">My Addresses <a href="#"class="link-icn js-show-form" data-form="#add_address"><span>+</span></a></h1>
  <div class="row">
    @if(count($address)> 0)
    @for($i=0; $i< count($address); $i++)
    <div class="col-sm-9">
      <div class="card">
        <div class="card-body">
          <h3>Address {{$i + 1}}   
          @if($address[$i]->address_type == 'Primary')
            (Default)
          @endif
          @php
            $addressEdit= $address[$i];
          @endphp
          </h3>
            <p>{{$address[$i]->address_title}}
              <br> {{$address[$i]->address_line_1}}
              <br> {{$address[$i]->address_line_2}}
              <br> {{$address[$i]->city}},  {{$address[$i]->zip_code}}
              <br> <b class="icon-phone"></b> {{$address[$i]->phone}}
            </p>
          <div class="mt-2 clearfix">
            <a href="#" class="link-icn js-show-form" data-form="#updateAddress{{$i}}" onclick="editAddress({{$address[$i]->id}})"><i class="icon-pencil"></i>Edit</a>
            <a href="{{route('delete_customer_address',$address[$i]->id)}}" class="link-icn ml-1 float-right"><i class="icon-cross"></i>Delete</a>
          </div>
        </div>
        <div id="editAddress1" >
          @include('layouts.account.edit_address')
        </div>
      </div>
    </div>
    @endfor
    @else
    Please <a href="#"class="link-icn js-show-form" data-form="#add_address"><span> Add Address</span></a>
    @endif
    @include('layouts.account.add_address')
    
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
              </div>
              <div class="col-sm-9 mt-2 mt-sm-0">
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
  
</div>
{{-- <!-- <script>
  function editAddress(id){
    $(function(){
      
      $.ajax({
        type:'GET',
        url:"{{Route('edit_customer_address')}}",
        data:{
           address_id: id,
           },
        success:function(response){
          $('#editAddress1').html(response);
          console.log(response);
          alert('success');
        }
      });
    })
  }  
</script> -->--}}