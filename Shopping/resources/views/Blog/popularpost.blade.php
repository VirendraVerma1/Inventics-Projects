@php
  $blog_post_created_date=date('F d, Y' ,strtotime($popular_blog->created_at));
@endphp
<div class="aside-block">
                <h2 class="text-uppercase">Popular Posts</h2>
                <div class="post-prw-simple-sm">
                  <a href="##" class="post-prw-img">
                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{$img_url}}{{$popular_blog->img_path}}" class="lazyload fade-up" alt="">
                  </a>
                  <div class="post-prw-links">
                    <div class="post-prw-date"><i class="icon-calendar"></i>{{$blog_post_created_date}}</div>
                    <a href="#" class="post-prw-author">by {{$popular_blog->user_name}}</a>
                  </div>
                  <h4 class="post-prw-title"><a href="#">{{$popular_blog->title}}</a></h4>
                  <a href="#" class="post-prw-comments"><i class="icon-chat"></i>{{count($popular_blog_comments)}} comments</a>
                </div>
              </div>