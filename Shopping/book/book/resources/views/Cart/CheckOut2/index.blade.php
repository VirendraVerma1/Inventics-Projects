@extends('layout.master')
@section('content')
<div class="page-content">
    @include('Cart.CheckOut2.destination')
    <div class="holder">
      <div class="container">
        <h1 class="text-center">Checkout wizard</h1>
        <div class="row">
            @include('Cart.CheckOut2.addresssteps')
          <div class="col-md-8 pl-lg-8 mt-2 mt-md-0">
            @include('Cart.CheckOut2.ordersummary')
            <div class="mt-2"></div>
            @include('Cart.CheckOut2.applypromo')
            <div class="mt-2"></div>
            @include('Cart.CheckOut2.subtotal')
            <div class="mt-2"></div>
            @include('Cart.CheckOut2.ordercomments')
          </div>
        </div>
      </div>
    </div>
  </div>
  

<script>

var payment_method_id=6;
var cart_idd={{$cart_id}};
var cart_price={{$cart->total+0}};
var iscouponApplied=@if($cart->coupon_id!=null)  true; @else  false; @endif
$(document).ready(function () {
 
    //for shipping
  $(".address_box").click(function () {
    $(".address_box").removeClass("highlight");
      $(this).addClass("highlight");
      let address_val=$(this).find('.address_id').val();
      let cart_val=$(this).find('.cart_id').val();
      saveShippingAddress(address_val,cart_val);
  });

  //for billing
  $(".address_box_billing").click(function () {
    $(".address_box_billing").removeClass("highlight_billing");
      $(this).addClass("highlight_billing");
      let address_val=$(this).find('.address_id').val();
      let cart_val=$(this).find('.cart_id').val();
      saveBillingAddress(address_val,cart_val);
  });

  //for billing
  $("#formcheckoutRadio4").change(function () {
      let radioValue=$(this).val();
      payment_method_id=radioValue;
      document.getElementById("payment-instructions").innerHTML="Start from today";
  });
   $("#formcheckoutRadio5").change(function () {
      let radioValue=$(this).val();
      payment_method_id=radioValue;
      document.getElementById("payment-instructions").innerHTML="You will be redirected to Paytm";
  });

  //for placeOrder
  $(".place_order_btn").click(function () {
      let cart_id=$(this).find('#cart_id').val();
      placeOrder(cart_id);
  });
   
  //for form section , get states from country
  $("#country_id").change(function(){
      let country_id=this.value;
      loadState(country_id,0);
    })

    //for form section , get states from country
  $("#apply_promo_te").click(function(){
    
    showcoponsformat();
    let promoCode=$("#discount_temp_val").val();
    checkandgetcoupoun(promoCode,cart_idd);
      //loadState(country_id,0);
    })

    if(iscouponApplied)
    {
      let promoCode="{{$promocode}}";
      showcoponsformat();
      checkandgetcoupoun(promoCode,cart_idd);
    }else{
      hidecoponsformat();
    }

});

function hidecoponsformat()
{
  var temp = document.getElementsByClassName('custom_coupon');
  for (var i = 0; i < temp.length; i ++) {
    temp[i].style.display = 'none';
  }
}

function showcoponsformat()
{
  var temp = document.getElementsByClassName('custom_coupon');
  for (var i = 0; i < temp.length; i ++) {
    temp[i].style.display = 'block';
  }
}

function saveShippingAddress(address_id,cart_id)
  {
    
    $.ajax({
      url: "{{route('saveShippingIdForCheckOut')}}",
      type: 'POST',
      // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
      data: {
        addressId: address_id,
        cartId: cart_id,
        _token:'{{ csrf_token() }}'
      },
         success: function(response){
          console.log(response);
            //successfully updated shipping id
            if(response=="success")
            customLoadAndShowMSG("success","successfully updated shipping address");
          }
      });  
  }

  function saveBillingAddress(address_id,cart_id)
  {
    
    $.ajax({
      url: "{{route('saveBillingIdForCheckOut')}}",
      type: 'POST',
      // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
      data: {
        addressId: address_id,
        cartId: cart_id,
        _token:'{{ csrf_token() }}'
      },
         success: function(response){
          console.log(response);
            //successfully updated shipping id
            if(response=="success")
            customLoadAndShowMSG("success","successfully updated billing address");
          }
      });  
  }

  function placeOrder(cart_id)
  {

    //alert(payment_method_id);
    $.ajax({
      url: "{{route('placeOrder')}}",
      type: 'POST',
      // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
      data: {
        cartId: cart_id,
        paymentMethodId:payment_method_id,
        _token:'{{ csrf_token() }}'
      },
         success: function(response){
          console.log(response);
            //successfully updated shipping id
            alert("order is placed");
            customLoadAndShowMSG("success","your order is placed");
            window.location = "{{route('Account','orders')}}";
          }
      });  
  }

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


  function checkandgetcoupoun(coupon_code,cart_id)
  {
    $.ajax({
      url: "{{route('apply_coupoun')}}",
      type: 'POST',
      // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
      data: {
        couponCode: coupon_code,
        cartId: cart_id,
        _token:'{{ csrf_token() }}'
      },
         success: function(response){
            console.log(response);
            var dataResult = JSON.parse(response);
            
            if(dataResult.response=="success")
            {
              iscouponApplied=true;
              showcoponsformat();
              
              $("#old_price_before_coupon").html("<del>"+"{{$current_currency}}"+ cart_price+"</del>");
              $("#coupon_code_show").html(dataResult.data['code']);
              $("#coupon_code_value_deducted").html("{{$current_currency}}"+dataResult.data['value']);
              $("#final_price_after_coupon").html("{{$current_currency}}" +(parseInt(cart_price) - parseInt(dataResult.data['value'])));
              
              customLoadAndShowMSG("success","coupon applied successfully");
            }
            
            
          }
      });  
  }

  

</script>


@endsection
