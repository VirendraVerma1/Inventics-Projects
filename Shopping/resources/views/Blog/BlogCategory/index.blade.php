@extends('layout.master')
@section('content')

<div class="page-content">
    @include('Blog.destination')
    <div class="holder">
      <div class="container">
        <div class="page-title text-center">
          <h1>Blog Grid</h1>
        </div>
        <div class="post-prws-grid row">
        @foreach($blogs as $blog)
        @php
          $now = time();
          $your_date = strtotime($blog->updated_at);
          $datediff = $now - $your_date;
          $daybefore= round($datediff / 86400);
          $stringtime="days";
          if(($daybefore/365)>=1)
          {
            $daybefore=floor($daybefore/365);
            $stringtime="year";
          }
          if(($daybefore/30)>=1)
          {
            $daybefore=floor($daybefore/30);
            $stringtime="month";
          }
            
        @endphp
         <div class="col-sm-9 col-md-6">
            <div class="post-prw-simple">
              <div class="post-prw-img">
                <a href="{{route('BlogPost',$blog->slug)}}" class="image-hover-scale image-container" style="padding-bottom: 54.44%">
                  <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{$img_url}}{{$blog->img_path}}" class="lazyload fade-up" alt="Post name">
                </a>
              </div>
              <div class="post-prw-links">
                <div class="post-prw-date">{{$daybefore}} {{$stringtime}} ago</div>
                <div class="post-prw-author">{{$blog->user_name}}</div>
              </div>
              <h4 class="post-prw-title"><a href="##">{{$blog->title}}</a></h4>
            </div>
          </div>
        @endforeach
          <!-- <div class="col-sm-9 col-md-6">
            <div class="post-prw-simple">
              <div class="post-prw-img">
                <a href="##" class="image-hover-scale image-container" style="padding-bottom: 54.44%">
                  <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/blog/blog-02.png" class="lazyload fade-up" alt="Post name">
                </a>
              </div>
              <div class="post-prw-links">
                <div class="post-prw-date">4 days ago</div>
                <div class="post-prw-author">by admin</div>
              </div>
              <h4 class="post-prw-title"><a href="##">Premium Template</a></h4>
            </div>
          </div>
          <div class="col-sm-9 col-md-6">
            <div class="post-prw-simple">
              <div class="post-prw-img">
                <a href="##" class="image-hover-scale image-container" style="padding-bottom: 54.44%">
                  <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/blog/blog-06.png" class="lazyload fade-up" alt="Post name">
                </a>
              </div>
              <div class="post-prw-links">
                <div class="post-prw-date">5 days ago</div>
                <div class="post-prw-author">by admin</div>
              </div>
              <h4 class="post-prw-title"><a href="##">Youtube Slider</a></h4>
            </div>
          </div>
          <div class="col-sm-9 col-md-6">
            <div class="post-prw-simple">
              <div class="post-prw-img">
                <a href="##" class="image-hover-scale image-container" style="padding-bottom: 54.44%">
                  <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/blog/blog-03.png" class="lazyload fade-up" alt="Post name">
                </a>
              </div>
              <div class="post-prw-links">
                <div class="post-prw-date">10 days ago</div>
                <div class="post-prw-author">by admin</div>
              </div>
              <h4 class="post-prw-title"><a href="##">FOXic eCommerce</a></h4>
            </div>
          </div>
          <div class="col-sm-9 col-md-6">
            <div class="post-prw-simple">
              <div class="post-prw-img">
                <a href="##" class="image-hover-scale image-container" style="padding-bottom: 54.44%">
                  <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/blog/blog-04.png" class="lazyload fade-up" alt="Post name">
                </a>
              </div>
              <div class="post-prw-links">
                <div class="post-prw-date">14 days ago</div>
                <div class="post-prw-author">by admin</div>
              </div>
              <h4 class="post-prw-title"><a href="##">20+ Awesome Skins</a></h4>
            </div>
          </div>
          <div class="col-sm-9 col-md-6">
            <div class="post-prw-simple">
              <div class="post-prw-img">
                <a href="##" class="image-hover-scale image-container" style="padding-bottom: 54.44%">
                  <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/blog/blog-05.png" class="lazyload fade-up" alt="Post name">
                </a>
              </div>
              <div class="post-prw-links">
                <div class="post-prw-date">18 days ago</div>
                <div class="post-prw-author">by admin</div>
              </div>
              <h4 class="post-prw-title"><a href="##">Creative Template</a></h4>
            </div>
          </div>
          <div class="col-sm-9 col-md-6">
            <div class="post-prw-simple">
              <div class="post-prw-img">
                <a href="##" class="image-hover-scale image-container" style="padding-bottom: 54.44%">
                  <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="images/blog/blog-01.png" class="lazyload fade-up" alt="Post name">
                </a>
              </div>
              <div class="post-prw-date">20 days ago</div>
              <h4 class="post-prw-title"><a href="##">SEO Optimized</a></h4>
            </div>
          </div> -->
        </div>
        <div class="pagination-wrap d-flex mt-4 justify-content-center">
          {{$blogs->links()}}
          <!-- <ul class="pagination mt-0">
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
          </ul> -->
        </div>
      </div>
    </div>
  </div>
  
@endsection