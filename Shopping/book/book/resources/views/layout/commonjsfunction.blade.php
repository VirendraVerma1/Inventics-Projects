<script>

//notification mechanism ------------------------------------------------------------------------------

//get msg from the session if exist(only for success, warning, danger msg type)
var showNotification=@if(session('success')||session('warning')||session('danger')) true @else false @endif ;
var msgType=@if(session('success')) "success" @elseif(session('warning')) "warning" @elseif(session('danger')) "danger" @else "" @endif ;
var msg=@if(session('success')) "{{session('success')}}" @elseif(session('warning')) "{{session('warning')}}" @elseif(session('danger')) "{{session('danger')}}" @else "" @endif ;

//initialize variables for the notification
var notificationbox=document.getElementById("mynotificationbox");
var notificationimage=document.getElementById("mynotificationimage");
var notificationtype=document.getElementById("mynotificationtype");
var notificationmsg=document.getElementById("mynotificationmsg");

//for checking purpose
var notificationBoxVisible=false;

$(document).ready(function () {
  showCustomNotification();//from here we will get the loaded msg from the controller
});

function customLoadAndShowMSG(MSGType,MSG)//this function helps in showing msg in realtime
{
  showNotification=true;
  msgType=MSGType;
  msg=MSG;
  showCustomNotification();
}

function showCustomNotification()
{
  if(showNotification)//have msg
    {
      //changing image according to the status
      var img_path="";
      if(msgType=="success")
      img_path="{{asset('images/myicons/success.jpg')}}";
      else if(msgType=="warning")
      img_path="{{asset('images/myicons/warning.jpg')}}";
      else if(msgType=="danger")
      img_path="{{asset('images/myicons/danger.jpg')}}";

      notificationimage.src=img_path;
      notificationtype.innerHTML=msgType;
      notificationmsg.innerHTML=msg;

      notificationbox.style.opacity=1;//it will show the notification
      
      if(notificationBoxVisible==false)
      {
        notificationBoxVisible=true;
        setTimeout(closenotification, 5000);//after 5 sec notification will automatically hide
      }
      
    }
    else  //dont have any msg
    {
      notificationbox.style.opacity=0;//it will hide the notification
    }
}

function closenotification()
{
  notificationBoxVisible=false;
  document.getElementById("mynotificationbox").style.opacity=0;
}

//add to cart mechanism ------------------------------------------------------------------------------
function onaddtocartclick(id,qu)
{
  // alert(id+"|"+qu);
    var y = document.getElementById("quantity"+id);
    if(y==null)
    qu=1;
    else
    qu==parseInt(y.value);
    
  $.ajax({
      url: "{{route('addtocart')}}",
      type: 'POST',
      // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
      data: {
        productid: id,
        quant:qu,
        _token:'{{ csrf_token() }}'
      },
         success: function(response){
          console.log(response);
          var dataResult = JSON.parse(response);
          if(dataResult.data=="login")
          window.location = "{{route('login')}}";
          else
          document.getElementById("addedtocarttext").innerHTML=dataResult.data;
          if(dataResult.data=="Already Exist")
          customLoadAndShowMSG("warning","Already Exist");
          else if(dataResult.data=="Added To Cart")
          customLoadAndShowMSG("success","Added To Cart");

      }
  });
  getandUpdateTotalCartNumber();
}

//wishlist mechanism ------------------------------------------------------------------------------
function onwishlistbuttonpressed(inventory_id,product_id)
{
  $.ajax({
      url: "{{route('AddWishList')}}",
      type: 'POST',
      // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
      data: {
        inventoryid: inventory_id,
        productid:product_id,
        _token:'{{ csrf_token() }}'
      },
         success: function(response){
          console.log(response);
          if(response=="login")
          window.location = "{{route('login')}}";
          customLoadAndShowMSG("success","Added To Wishlist");
         }
  });
  getandUpdateTotalWishListNumber();
}

function onremovewishlistbuttonpressed(inventory_id,product_id)
{
  $.ajax({
      url: "{{route('RemoveWishList')}}",
      type: 'POST',
      // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
      data: {
        inventoryid: inventory_id,
        productid:product_id,
        _token:'{{ csrf_token() }}'
      },
         success: function(response){
          console.log(response);
          if(response=="login")
          window.location = "{{route('login')}}";
          customLoadAndShowMSG("success","Removed from Wishlist");
         }
  });
  getandUpdateTotalWishListNumber();
}

getandUpdateTotalWishListNumber();
function getandUpdateTotalWishListNumber()
{
  $.ajax({
      url: "{{route('getTotalWishlist')}}",
      type: 'POST',
      // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
      data: {
        _token:'{{ csrf_token() }}'
      },
         success: function(response){
          console.log(response);
          if(response!="login")
          {
            var wishlist1=document.getElementById("wishlist_quant1");
            var wishlist2=document.getElementById("wishlist_quant1");
            if(wishlist1)
            wishlist1.innerHTML=response;
            if(wishlist2)
            wishlist2.innerHTML=response;
          }
          
         }
  });
}

//minicart mechanism ------------------------------------------------------------------------------
getandUpdateTotalCartNumber();
function getandUpdateTotalCartNumber()
{
  $.ajax({
      url: "{{route('getTotalCartItems')}}",
      type: 'POST',
      // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
      data: {
        _token:'{{ csrf_token() }}'
      },
         success: function(response){
          console.log(response);
          var dataResult = JSON.parse(response);
          if(dataResult.data!="login")
          {
            document.getElementById("minicart_quantity1").innerHTML=dataResult.data;
            document.getElementById("minicart_quantity2").innerHTML=dataResult.data;
            document.getElementById("minicart_price1").innerHTML="{{$current_currency}}"+dataResult.grand_total;
            document.getElementById("minicart_price2").innerHTML="{{$current_currency}}"+dataResult.grand_total;
          }
          
         }
  });
}

function getMiniCartData()
{
  $.ajax({
      url: "{{route('getMiniCartItemdata')}}",
      type: 'POST',
      // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
      data: {
        _token:'{{ csrf_token() }}'
      },
         success: function(response){
          console.log(response);
          var dataResult = JSON.parse(response);
          if(dataResult.data!="login")
          {
            $("#myminicartData").html(dataResult.data);
            document.getElementById("minicart_subtotal").innerHTML="{{$current_currency}}"+dataResult.grand_total;
          }
          
         }
  });
}


function deleteMiniCartitemData(inventory_id,cart_id)
{
  $.ajax({
      url: "{{route('deleteMinicartItemData')}}",
      type: 'POST',
      // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
      data: {
        inventoryid:inventory_id,
        cartid:cart_id,
        _token:'{{ csrf_token() }}'
      },
         success: function(response){
          console.log(response);
          var dataResult = JSON.parse(response);
          if(dataResult.data!="login")
          {
            document.getElementById("minicart_quantity1").innerHTML=dataResult.data;
            document.getElementById("minicart_quantity2").innerHTML=dataResult.data;
            document.getElementById("minicart_subtotal").innerHTML="{{$current_currency}}"+dataResult.grand_total;
            document.getElementById("minicart_price1").innerHTML="{{$current_currency}}"+dataResult.grand_total;
            document.getElementById("minicart_price2").innerHTML="{{$current_currency}}"+dataResult.grand_total;
          }
          
        }
  });
}


//testing and learning area--------------------------------------

// testAjax();
function testAjax()
{
  $.ajax({
      url: "{{route('testFunction')}}",
      type: 'POST',
      data: {
        testData:'Hello world',
        testHello:1,
        _token:'{{ csrf_token() }}'
      },
         success: function(response){
          console.log(response);
          alert(response);
          
      }
  });
}


// function onaddtocartclick1(id)
// {
//   alert(id);
//   $.ajax({
//     type:'GET',
//     url:'add_to_cart1/'+id,
//   });
  
// }

// import Noty from "noty";

// const Noty = require("noty");

// new Noty({
//   text: "Notification text"
// }).show();

// document.getElementById("my_product").addEventListener("click", function() {
//   alert("hello world");
// });


</script>
