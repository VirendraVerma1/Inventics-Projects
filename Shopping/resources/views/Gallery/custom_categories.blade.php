@foreach($custom_categories as $cat)
    <div class="col col-sm-9 col-md-6 gallery-item ">
                  <div class="gallery-item-image"><img src="{{asset('images/gallery/gallery-1.jpg')}}" alt=""></div>
                  <!-- <div class="gallery-item-image"><img src="{{$img_url}}{{$cat->img_path}}" alt=""></div> -->
                  <div class="gallery-item-caption">
                    <h3 class="gallery-item-subtitle">{{$cat->cat_sub_name}}</h3>
                    <h4 class="gallery-item-title">{{$cat->name}}</h4>
                    <div class="gallery-item-links">
                      <a href="{{asset('images/gallery/gallery-1.jpg')}}" class="gallery-item-link" data-fancybox="gallery" data-caption="Lorem Ipsum Dolor"><i class="icon-zoom-in"></i></a>
                      <a href="{{asset('search?search='.$cat->name)}}" class="gallery-item-link"><i class="icon-arrow-right-bold"></i></a>
                    </div>
                  </div>
                </div>
@endforeach