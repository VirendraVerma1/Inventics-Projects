<div class="hdr-nav hide-mobile nav-holder justify-content-center">

              <!--mmenu-->
              <ul class="mmenu mmenu-js">
                @foreach($categories as $cat)
                  @php
                    $subcat=array();
                    $subcatslug=array();
                    foreach($sub_categories as $sub_cat)
                    {
                      if($sub_cat->cat_sub_name==$cat->name)
                      {
                        array_push($subcat,$sub_cat->name);
                        array_push($subcatslug,$sub_cat->slug);
                      }
                    }
                  @endphp
                <li class="mmenu-item--simple"><a href="#" ><span>{{$cat->name}}</span></a>
                  <div class="mmenu-submenu d-flex">
                    <ul class="submenu-list mt-0">
                    @for($i=0;$i<count($subcat)/2;$i++)
                      <li><a href="{{route('Category',$subcatslug[$i])}}">{{$subcat[$i]}}</a></li>
                    @endfor
                    </ul>
                    @if(count($subcat)>1)
                    <ul class="submenu-list mt-0">
                      @for($i=count($subcat)/2;$i<count($subcat);$i++)
                        <li><a href="{{route('Category',$subcatslug[$i])}}">{{$subcat[$i]}}</a></li>
                      @endfor
                    </ul>
                    @endif
                  </div>
                </li>
                @endforeach
                <li class="mmenu-item--simple"><a href="{{route('Gallery')}}">Gallery</a>
                </li>
                <!-- <li class="mmenu-item--simple"><a href="#">Pages</a>
                  <div class="mmenu-submenu">
                    <ul class="submenu-list">
                      <li><a href="##">Product page</a>
                        <ul>
                          <li><a href="##">Product page variant 1<span class="menu-label menu-label--color3">Popular</span></a></li>
                          
                        </ul>
                      </li>
                      <li><a href="{{route('Category','home')}}">Category page</a>
                        <ul>
                          <li><a href="{{route('Category','home')}}">Listing View</a></li>
                          <li><a href="{{route('EmptyCategory')}}">Empty category</a></li>
                        </ul>
                      </li>
                      <li><a href="{{route('Cart')}}">Cart & Checkout</a>
                        <ul>
                          <li><a href="{{route('Cart')}}">Cart Page</a></li>
                          <li><a href="{{route('EmptyCart')}}">Empty cart</a></li>
                      </ul>
                      </li>
                      <li><a href="{{route('Account','details')}}">Account</a>
                        <ul>
                          <li><a href="{{route('Login')}}">Login</a></li>
                          <li><a href="{{route('SignUp')}}">Create account</a></li>
                          <li><a href="{{route('Account','details')}}">Account details</a></li>
                          <li><a href="{{route('Account','address')}}">Account addresses</a></li>
                          <li><a href="{{route('Account','orders')}}">Order History</a></li>
                          <li><a href="{{route('Account','wishlist')}}">Wishlist</a></li>
                        </ul>
                      </li>
                      <li><a href="{{route('BlogCategory')}}">Blog</a>
                        <ul>
                          <li><a href="{{route('BlogList')}}">Sticky sidebar</a></li>
                          <li><a href="{{route('BlogCategory')}}">Grid</a></li>
                          <li><a href="##">Blog post</a></li>
                        </ul>
                      </li>
                      <li><a href="{{route('Gallery')}}">Gallery</a></li>
                      <li><a href="{{route('FAQ')}}">Faq</a></li>
                      <li><a href="{{route('AboutUs')}}">About Us</a></li>
                      <li><a href="{{route('ContactUs')}}">Contact Us</a></li>
                      <li><a href="{{route('Error')}}">404 Page</a></li>
                      <li><a href="typography.html">Typography</a></li>
                      <li><a href="{{route('CommingSoon')}}" target="_blank">Coming soon</a></li>
                    </ul>
                  </div>
                </li> -->
                
                <!-- <li class="mmenu-item--mega"><a href="collections.html"><span>Books<span class="menu-label menu-label--color1">SKIN</span></span></a>
                  <div class="mmenu-submenu mmenu-submenu--has-bottom">
                    <div class="mmenu-submenu-inside">
                      <div class="container">
                        <div class="mmenu-left width-25">
                          <div class="mmenu-bnr-wrap">
                            <a href="product.html" class="image-hover-scale image-container w-100" style="padding-bottom: 102.91%">
                              <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-srcset="images/skins/books/menu/mmenu-bnr-01.png" class="lazyload fade-up" alt="Banner">
                            </a>
                          </div>
                        </div>
                        <div class="mmenu-cols column-4">
                          <div class="mmenu-col">
                            <h3 class="submenu-title"><a href="category.html">Collections</a></h3>
                            <ul class="submenu-list">
                              <li><a href="category.html">Martins d'Art 2020/21<span class="submenu-link-txt">Available in boutiques from June 2019</span></a></li>
                              <li><a href="category.html">Spring-Summer 2021<span class="submenu-link-txt">Available in boutiques from March 2019</span></a></li>
                              <li><a href="category.html">Spring-Summer 2021 Pre-Collection<span class="submenu-link-txt">In boutiques</span></a></li>
                              <li><a href="category.html">Cruise 2020/21<span class="submenu-link-txt">In boutiques</span></a></li>
                              <li><a href="category.html">Fall-Winter 2020/21</a></li>
                            </ul>
                          </div>
                          <div class="mmenu-col">
                            <h3 class="submenu-title"><a href="category.html">Ready-to-wear</a></h3>
                            <ul class="submenu-list">
                              <li><a href="category.html" class="active">Jackets</a>
                                <ul class="sub-level">
                                  <li><a href="category.html">Bomber Jackets</a></li>
                                  <li><a href="category.html">Biker Jacket</a></li>
                                  <li><a href="category.html">Trucker Jacket</a></li>
                                  <li><a href="category.html">Denim Jackets</a></li>
                                  <li><a href="category.html">Blouson Jacket<span class="menu-label">SALE</span></a></li>
                                  <li><a href="category.html">Overcoat</a></li>
                                  <li><a href="category.html">Trench Coat</a></li>
                                </ul>
                              </li>
                              <li><a href="category.html">Dresses<span class="menu-label menu-label--color3">SALE</span></a></li>
                              <li><a href="category.html">Blouses & Tops</a></li>
                              <li><a href="category.html">Cardigans & Pullovers</a></li>
                              <li><a href="category.html">Skirts</a></li>
                              <li><a href="category.html">Pants & Shorts</a></li>
                              <li><a href="category.html">Outerwear</a></li>
                              <li><a href="category.html">Swimwear</a></li>
                            </ul>
                          </div>
                          <div class="mmenu-col">
                            <h3 class="submenu-title"><a href="category.html">Accessories</a></h3>
                            <ul class="submenu-list">
                              <li><a href="category.html">Jackets</a></li>
                              <li><a href="category.html">Dresses</a></li>
                              <li><a href="category.html">Blouses & Tops</a></li>
                              <li><a href="category.html">Cardigans & Pullovers</a></li>
                              <li><a href="category.html">Skirts<span class="menu-label">SALE</span></a></li>
                              <li><a href="category.html">Pants & Shorts</a></li>
                              <li><a href="category.html">Outerwear</a></li>
                            </ul>
                          </div>
                          <div class="mmenu-col">
                            <h3 class="submenu-title"><a href="category.html">Brands</a></h3>
                            <ul class="submenu-list">
                              <li><a href="category.html">Jackets</a></li>
                              <li><a href="category.html">Dresses</a></li>
                              <li><a href="category.html">Blouses & Tops</a></li>
                              <li><a href="category.html">Cardigans & Pullovers</a></li>
                              <li><a href="category.html">Skirts<span class="menu-label menu-label--color1">SALE</span></a></li>
                              <li><a href="category.html">Pants & Shorts</a></li>
                              <li><a href="category.html">Outerwear</a></li>
                            </ul>
                          </div>
                          <div class="mmenu-bottom justify-content-center">
                            <a href="#"><i class="icon-fox icon--lg"></i><b>FOXshop News</b><i class="icon-arrow-right"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                 -->
              </ul>
              <!--/mmenu-->
            </div>