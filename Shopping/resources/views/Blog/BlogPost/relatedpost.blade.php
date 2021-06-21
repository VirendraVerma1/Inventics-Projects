@php
  $subcounter=2;
@endphp
<div class="related-posts">
              <div class="title-with-arrows">
                <h3 class="h2-style">Related Posts</h3>
                <div class="carousel-arrows"></div>
              </div>
              <div class="post-prws post-prws-carousel js-post-prws-carousel" data-slick='{"slidesToShow": 1, "responsive": [{"breakpoint": 1024,"settings": {"slidesToShow": 1}},{"breakpoint": 768,"settings": {"slidesToShow": 1}},{"breakpoint": 480,"settings": {"slidesToShow": 1}}]}'>
              @foreach($blogs as $blog)
              @if($subcounter>0 && $blog->slug!=$slug)
              @php
                $blog_post_created_date=date('F d, Y' ,strtotime($current_blog->created_at));
              @endphp
              <div class="post-prw">
                  <div class="row vert-margin-middle">
                    <div class="post-prw-img col-md-7">
                      <a href="##">
                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{$img_url}}{{$blog->img_path}}" class="lazyload fade-up" alt="">
                      </a>
                    </div>
                    <div class="post-prw-text col-md-11">
                      <div class="post-prw-links">
                        <div class="post-prw-date"><i class="icon-calendar"></i>{{$blog_post_created_date}}</div>
                        <div class="post-prw-date"><i class="icon-chat"></i>5 comments</div>
                      </div>
                      <h4 class="post-prw-title"><a href="##">{{$blog->title}}</a></h4>
                      <div class="post-prw-teaser">{!! $blog->excerpt !!}</div>
                      <div class="post-prw-btn">
                        <a href="{{route('BlogPost',$blog->slug)}}" class="btn btn--sm">Read More</a>
                      </div>
                    </div>
                  </div>
                </div>
              @php
              $subcounter--;
              @endphp
              @endif
              @endforeach
                
                <!-- <div class="post-prw">
                  <div class="row vert-margin-middle">
                    <div class="post-prw-img col-md-7">
                      <a href="##">
                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/blog/blog-01.png" class="lazyload fade-up" alt="">
                      </a>
                    </div>
                    <div class="post-prw-text col-md-11">
                      <div class="post-prw-links">
                        <div class="post-prw-date"><i class="icon-calendar"></i>November 17, 2020, 2020</div>
                        <div class="post-prw-date"><i class="icon-chat"></i>5 comments</div>
                      </div>
                      <h4 class="post-prw-title"><a href="##">Trends to Try This Season</a></h4>
                      <div class="post-prw-teaser">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account</div>
                      <div class="post-prw-btn">
                        <a href="##" class="btn btn--sm">Read More</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="post-prw">
                  <div class="row vert-margin-middle">
                    <div class="post-prw-img col-md-7">
                      <a href="##">
                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/blog/blog-03.png" class="lazyload fade-up" alt="">
                      </a>
                    </div>
                    <div class="post-prw-text col-md-11">
                      <div class="post-prw-links">
                        <div class="post-prw-date"><i class="icon-calendar"></i>November 01, 2020, 2020</div>
                        <div class="post-prw-date"><i class="icon-chat"></i>5 comments</div>
                      </div>
                      <h4 class="post-prw-title"><a href="##">Your Spring Style</a></h4>
                      <div class="post-prw-teaser">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account</div>
                      <div class="post-prw-btn">
                        <a href="##" class="btn btn--sm">Read More</a>
                      </div>
                    </div>
                  </div>
                </div> -->
              </div>
            </div>