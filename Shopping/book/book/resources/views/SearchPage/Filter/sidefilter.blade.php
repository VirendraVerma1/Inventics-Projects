<div class="col-lg-4 aside aside--left filter-col filter-mobile-col filter-col--sticky js-filter-col filter-col--opened-desktop" data-grid-tab-content>
            <div class="filter-col-content filter-mobile-content">
              <div class="sidebar-block">
                <!-- <div class="sidebar-block_title">
                  <span>Current testse</span>
                </div> -->
                <div class="sidebar-block_content">
                  <div class="selected-filters-wrap">
                    <ul class="selected-filters">
                      <li><a href="#" id="brand_remove">Brand</a></li>
                      <li><a href="#" id="price_remove">Price</a></li>
                    </ul>
                    <div class="d-flex flex-wrap align-items-center">
                      <a href="#" class="clear-filters" id="clear_all_search"><span>Clear All</span></a>
                      <!-- <div class="selected-filters-count ml-auto d-none d-lg-block">Selected <span>6 items</span></div> -->
                    </div>
                  </div>
                </div>
              </div>
              <!-- <div class="sidebar-block d-filter-mobile">
                <h3 class="mb-1">SORT BY</h3>
                <div class="select-wrapper select-wrapper-xs">
                  <select class="hort_by_class" id="short_by_name" name="short_by" onchange="on_change_short_by(this)" >
                    <option value="Featured">Featured</option>
                    <option value="rating">Rating</option>
                    <option value="Price">Price</option>
                  </select>
                </div>
              </div> -->
              <!-- category section start -->
              <div class="sidebar-block filter-group-block open">
                <div class="sidebar-block_title">
                  <span>Categories</span>
                  <span class="toggle-arrow"><span></span><span></span></span>
                </div>
                <div class="sidebar-block_content">
                  <ul class="category-list">
                  @foreach($categories as $cat)
                  @php
                  $count=0;
                  foreach($sub_categories as $sub_cat)
                        if($sub_cat->cat_sub_name==$cat->name)
                        $count++;
                  @endphp
                    <li class=""><a href="#" title="Casual" class="open category_name ">{{$cat->name}}&nbsp;<span>({{$count}})</span></a>
                      <div class="toggle-category js-toggle-category"><span><i class="icon-angle-down"></i></span></div>
                      <ul class="category-list category-list">
                      @foreach($sub_categories as $sub_cat)
                        @if($sub_cat->cat_sub_name==$cat->name)
                        <li><a href="{{asset('search?search='.$sub_cat->name)}}" class="sub_category_name" href="#" title="Men">{{$sub_cat->name}}</a></li>
                        @endif
                      @endforeach
                        <!-- <li><a href="category.html" title="Women">Women&nbsp;<span>(10)</span></a></li>
                        <li><a href="category.html" title="Accessories">Accessories&nbsp;<span>(10)</span></a></li> -->
                      </ul>
                    </li>
                  @endforeach
                    <!-- <li class="active"><a href="{{route('Category','home')}}" title="Casual" class="open">Casual&nbsp;<span>(30)</span></a>
                      <div class="toggle-category js-toggle-category"><span><i class="icon-angle-down"></i></span></div>
                      <ul class="category-list category-list">
                        <li><a href="category.html" title="Men">Men&nbsp;<span>(10)</span></a></li>
                        <li><a href="category.html" title="Women">Women&nbsp;<span>(10)</span></a></li>
                        <li><a href="category.html" title="Accessories">Accessories&nbsp;<span>(10)</span></a></li>
                      </ul>
                    </li>
                    <li><a href="category.html" title="T-Shirts" class="open">T-Shirts</a></li>
                    <li><a href="category.html" title="Medical" class="open">Medical</a></li>
                    <li><a href="category.html" title="FoodMarket" class="open">FoodMarket</a></li>
                    <li><a href="category.html" title="Bikes" class="open">Bikes&nbsp;<span>(12)</span></a></li>
                    <li><a href="category.html" title="Cosmetics" class="open">Cosmetics&nbsp;<span>(16)</span></a></li>
                    <li><a href="category.html" title="Fishing" class="open">Fishing&nbsp;<span>(20)</span></a></li>
                    <li><a href="category.html" title="Electronics" class="open">Electronics&nbsp;<span>(15)</span></a></li>
                    <li><a href="category.html" title="Games" class="open">Games&nbsp;<span>(14)</span></a></li> -->
                  </ul>
                </div>
              </div>
                <!-- category section end -->

              <!-- <div class="sidebar-block filter-group-block collapsed">
                <div class="sidebar-block_title">
                  <span>Colors</span>
                  <span class="toggle-arrow"><span></span><span></span></span>
                </div>
                <div class="sidebar-block_content">
                  <ul class="color-list two-column">
                    <li class="active"><a href="#" data-tooltip="Dark Red" title="Dark Red"><span class="value"><img src="{{asset('images/colorswatch/color-red.png')}}" alt=""></span><span class="colorname">Red (87)</span></a></li>
                    <li><a href="#" data-tooltip="Pink" title="Pink"><span class="value"><img src="{{asset('images/colorswatch/color-pink.png')}}" alt=""></span><span class="colorname">Pink (95)</span></a></li>
                    <li><a href="#" data-tooltip="Violet" title="Violet"><span class="value"><img src="{{asset('images/colorswatch/color-violet.png')}}" alt=""></span><span class="colorname">Violet (18)</span></a></li>
                    <li><a href="#" data-tooltip="Blue" title="Blue"><span class="value"><img src="{{asset('images/colorswatch/color-blue.png')}}" alt=""></span><span class="colorname">Blue (78)</span></a></li>
                    <li><a href="#" data-tooltip="Marine" title="Marine"><span class="value"><img src="{{asset('images/colorswatch/color-marine.png')}}" alt=""></span><span class="colorname">Marine (45)</span></a></li>
                    <li><a href="#" data-tooltip="Orange" title="Orange"><span class="value"><img src="{{asset('images/colorswatch/color-orange.png')}}" alt=""></span><span class="colorname">Orange (96)</span></a></li>
                    <li><a href="#" data-tooltip="Yellow" title="Yellow"><span class="value"><img src="{{asset('images/colorswatch/color-yellow.png')}}" alt=""></span><span class="colorname">Yellow (55)</span></a></li>
                    <li><a href="#" data-tooltip="Dark Yellow" title="Dark Yellow"><span class="value"><img src="{{asset('images/colorswatch/color-darkyellow.png')}}" alt=""></span><span class="colorname">Dark Yellow (2)</span></a></li>
                    <li><a href="#" data-tooltip="Black" title="Black"><span class="value"><img src="{{asset('images/colorswatch/color-black.png')}}" alt=""></span><span class="colorname">Black (15)</span></a></li>
                    <li><a href="#" data-tooltip="White" title="White"><span class="value"><img src="{{asset('images/colorswatch/color-white.png')}}" alt=""></span><span class="colorname">White (58)</span></a></li>
                  </ul>
                </div>
              </div>
              <div class="sidebar-block filter-group-block collapsed">
                <div class="sidebar-block_title">
                  <span>Size</span>
                  <span class="toggle-arrow"><span></span><span></span></span>
                </div>
                <div class="sidebar-block_content">
                  <ul class="category-list two-column size-list" data-sort='["XXS","XS","S","M","L","XL","XXL","XXXL"]'>
                    <li data-value="L" class="active"><a href="#">L</a></li>
                    <li data-value="XL"><a href="#">XL</a></li>
                    <li data-value="XXS"><a href="#">XXS</a></li>
                    <li data-value="XS"><a href="#">XS</a></li>
                    <li data-value="S"><a href="#">S</a></li>
                    <li data-value="XXL"><a href="#">XXL</a></li>
                    <li data-value="XXXL"><a href="#">XXXL</a></li>
                  </ul>
                </div>
              </div> -->
              <div class="sidebar-block filter-group-block collapsed">
                <div class="sidebar-block_title">
                  <span>Brands</span>
                  <span class="toggle-arrow"><span></span><span></span></span>
                </div>
                <div class="sidebar-block_content">
                  <ul class="category-list">
                  @foreach($allBrands as $brand)
                    <li class="brand_name"><a class="brandName">{{$brand}}</a></li>
                  @endforeach

                    <!-- <li><a href="#">Adidas</a></li>
                    <li><a href="#">Nike</a></li>
                    <li class="active"><a href="#">Reebok</a></li>
                    <li><a href="#">Ralph Lauren</a></li>
                    <li><a href="#">Delpozo</a></li> -->
                  </ul>
                </div>
              </div>
              <div class="sidebar-block filter-group-block collapsed">
                <div class="sidebar-block_title">
                  <span>Price</span>
                  <span class="toggle-arrow"><span></span><span></span></span>
                </div>
                <div class="sidebar-block_content">
                  <ul class="category-list">
                    <li class="price_Name"><a class="priceName">Under {{$current_currency}}5000</a></li>
                    <li class="price_Name"><a class="priceName">Under {{$current_currency}}2000</a></li>
                    <li class="price_Name"><a class="priceName">Under {{$current_currency}}1000</a></li>
                    <li class="price_Name"><a class="priceName">Under {{$current_currency}}500</a></li>
                    <li class="price_Name"><a class="priceName">Under {{$current_currency}}300</a></li>
                    <li class="price_Name" ><a class="priceName">Under {{$current_currency}}200</a></li>
                    <li class="price_Name"><a class="priceName">Under {{$current_currency}}100</a></li>
                  </ul>
                </div>
              </div>
              <!-- <div class="sidebar-block filter-group-block collapsed">
                <div class="sidebar-block_title">
                  <span>Popular tags</span>
                  <span class="toggle-arrow"><span></span><span></span></span>
                </div>
                <div class="sidebar-block_content">
                  <ul class="tags-list">
                    <li class="active"><a href="#">Jeans</a></li>
                    <li><a href="#">St.Valentine’s gift</a></li>
                    <li><a href="#">Sunglasses</a></li>
                    <li><a href="#">Discount</a></li>
                    <li><a href="#">Maxi dress</a></li>
                  </ul>
                </div>
              </div> -->
              <a href="https://bit.ly/3eJX5XE" class="bnr image-hover-scale bnr--bottom bnr--left" data-fontratio="3.95">
                <!-- <div class="bnr-img">
                  <img src="{{asset('images/banners/banner-collection-aside.png')}}" alt="">
                </div> -->
              </a>
            </div>
          </div>

<script>
//-------------------------------------------variable initialization
var searchName="{{$name}}";

var brand_name="";
var price_name="";
var price_val=-1;
var short_by_type="Featured";//accepts only Featured,Price

//for load more variables
var currentProductCount=0;
var totalProductCount={{$totalProductCount}};
var appendData=false;

//view by
var short_by_filter="Latest";
var view_count={{$viewLimit}};


//--------------------------------------------------some event listners
$(document).ready(function () {

  
  //for brand filter
  $(".brandName").click(function () {
      let brandName=$(this).html();
      brand_name=brandName;
      appendData=false;
      get_filtered_product();
  });

  //for price filter
  $(".priceName").click(function () {
      let price=$(this).html();
      price_name=price.replace('Under {{$current_currency}}','');
      price_val=parseInt(price_name);
      appendData=false;
      get_filtered_product();
  });

  //filter reduction
  $("#clear_all_search").click(function () {
    brand_name="";
    price_val=-1;
    appendData=false;
    get_filtered_product();
  });

  $("#brand_remove").click(function () {
    brand_name="";
    appendData=false;
    get_filtered_product();
  });

  $("#price_remove").click(function () {
    price_val=-1;
    appendData=false;
    get_filtered_product();
  });
  

  //load more
  $("#custom_load_moree").click(function () {
    // alert("Hello");
    appendData=true;
    get_filtered_product();
  });

  check_and_show_filter();
  updateCurrentProduct();
});


//-------------------------------------------------------sort by and view by change functions
function on_change_short_by()
{
  var select = document.getElementById("short_by_name");
  var selectedString = select.options[select.selectedIndex].value;
  short_by_filter=selectedString;
  appendData=false;
  get_filtered_product();
}

function on_change_view_by()
{
  var select = document.getElementById("view_by_name");
  var selectedString = select.options[select.selectedIndex].value;
  view_count=parseInt(selectedString);
  appendData=false;
  get_filtered_product();
}

//-------------------------------------------------------------main common azax
function get_filtered_product()
  {
    if(!appendData)
    currentProductCount=0;
    $.ajax({
      url: "{{route('get_filtered_product')}}",
      type: 'POST',
      // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
      data: {
        name:searchName,
        brandName: brand_name,
        priceVal:price_val,
        viewCount:view_count,
        shortbyfilter:short_by_filter,
        loadedProduct:currentProductCount,
        _token:'{{ csrf_token() }}'
      },
         success: function(response){
          console.log(response);
          var dataResult = JSON.parse(response);
          if(appendData)
          $("#my_searched_items_container").append(dataResult.data);
          else
          $("#my_searched_items_container").html(dataResult.data);

          totalProductCount=dataResult.viewLimit;
          check_and_show_filter();
          updateCurrentProduct();
        }
      });  
  }


//----------------------------------------------------------------filters and others hide unhide
  function check_and_show_filter()
  {
    var count=0;
    //brand
    if(brand_name!="")//if have any brand then show the brand tag
    {
      //rename the tag with brand name
      document.getElementById("brand_remove").innerHTML=brand_name;
      //show the tag of brand
      document.getElementById("brand_remove").style.display = 'block';
      count++;
    }
    else  //remove the brand tag
    {
      //remove brand tag
      document.getElementById("brand_remove").style.display = 'none';
      //remove all the tick on the brand filter
      var allBrands = document.getElementsByClassName('brand_name');
      for (var i = 0; i < allBrands.length; i ++) {
        allBrands[i].classList.remove('active');
      }
    }

    //price
    if(price_val!=-1)//if have any price then show price tag
    {
      document.getElementById("price_remove").innerHTML="Under {{$current_currency}}"+price_name;
      document.getElementById("price_remove").style.display = 'block';
      count++;
    }
    else//remove all the price tag
    {
      document.getElementById("price_remove").style.display = 'none';
      var allprice = document.getElementsByClassName('price_Name');
      for (var i = 0; i < allprice.length; i ++) {
        allprice[i].classList.remove('active');
      }
    }
    
    if(count==0)//if dont have any filter then remove clear all button
    {
      document.getElementById("clear_all_search").style.display = 'none';
    }
    else//show clear all filter button
    {
      document.getElementById("clear_all_search").style.display = 'block';
    }
  }





  //------------------------------------------------------------------load more functions and initialize things

  function updateCurrentProduct()
  {
    var allProduct = document.getElementsByClassName('my_product');
    if(allProduct!=null)
    currentProductCount=allProduct.length;
    else
    currentProductCount=0;
    //update load more values
    document.getElementById("currentProduct_count").innerHTML = currentProductCount;

    if(currentProductCount<totalProductCount && currentProductCount!=0)//if product are less than total product then show loadmore button
    {
      document.getElementById("load_more_box").style.display = 'block';
    }
    else  //dont show load more button
    {
      document.getElementById("load_more_box").style.display = 'none';
    }

    //update totalproduct item on the left side of short by
    document.getElementById("items_count").innerHTML = currentProductCount+" items";
    document.getElementById("totalProduct_count").innerHTML = totalProductCount;
  }


</script>