<div class="col-lg-4 aside aside--left filter-col filter-mobile-col filter-col--sticky js-filter-col filter-col--opened-desktop" data-grid-tab-content>
            <div class="filter-col-content filter-mobile-content">
              <div class="sidebar-block">
                <div class="sidebar-block_title">
                  <span>Current testse</span>
                </div>
                <div class="sidebar-block_content">
                  <div class="selected-filters-wrap">
                    <ul class="selected-filters">
                      @if($slug!='home')
                        <li><a href="{{route('Category','home')}}">{{$slug}}</a></li>
                      @endif
                      <!-- <li><a href="#">Grey</a></li>
                      <li><a href="#">Men</a></li>
                      <li><a href="#">Above $200</a></li> -->
                    </ul>
                    <div class="d-flex flex-wrap align-items-center">
                      <a href="#" class="clear-filters"><span>Clear All</span></a>
                      <div class="selected-filters-count ml-auto d-none d-lg-block">Selected <span>6 items</span></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="sidebar-block d-filter-mobile">
                <h3 class="mb-1">SORT BY</h3>
                <div class="select-wrapper select-wrapper-xs">
                  <select class="form-control">
                    <option value="featured">Featured</option>
                    <option value="rating">Rating</option>
                    <option value="price">Price</option>
                  </select>
                </div>
              </div>
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
                    <li class=""><a href="#" title="Casual" class="open">{{$cat->name}}&nbsp;<span>({{$count}})</span></a>
                      <div class="toggle-category js-toggle-category"><span><i class="icon-angle-down"></i></span></div>
                      <ul class="category-list category-list">
                      @foreach($sub_categories as $sub_cat)
                        @if($sub_cat->cat_sub_name==$cat->name)
                        <li><a href="#" title="Men">{{$sub_cat->name}}&nbsp;<span></span></a></li>
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
              <div class="sidebar-block filter-group-block collapsed">
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
              </div>
              <div class="sidebar-block filter-group-block collapsed">
                <div class="sidebar-block_title">
                  <span>Brands</span>
                  <span class="toggle-arrow"><span></span><span></span></span>
                </div>
                <div class="sidebar-block_content">
                  <ul class="category-list">
                  @foreach($allBrands as $brand)
                    <li><a href="#">{{$brand}}</a></li>
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
                    <li><a href="#">$100-$200</a></li>
                    <li class="active"><a href="#">Above $200</a></li>
                    <li><a href="#">Under $100</a></li>
                  </ul>
                </div>
              </div>
              <div class="sidebar-block filter-group-block collapsed">
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
              </div>
              <a href="https://bit.ly/3eJX5XE" class="bnr image-hover-scale bnr--bottom bnr--left" data-fontratio="3.95">
                <div class="bnr-img">
                  <img src="{{asset('images/banners/banner-collection-aside.png')}}" alt="">
                </div>
              </a>
            </div>
          </div>

