@php
  $blog_post_created_date=date('F d, Y' ,strtotime($current_blog->created_at));
@endphp
<div class="col-md-14 aside aside--content">
            <div class="post-full">
              <h2 class="post-title">{{$current_blog->title}}</h2>
              <div class="post-links">
                <div class="post-date"><i class="icon-calendar"></i>{{$blog_post_created_date}}</div>
                <a href="#" class="post-link">by {{$current_blog->user_name}}</a>
                <a href="#postComments" class="js-scroll-to"><i class="icon-chat"></i>{{count($current_blog_comments)}} Comment(s)</a>
              </div>
              <div class="post-img image-container" style="padding-bottom: 54.44%">
                <img class="lazyload fade-up-fast" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{$img_url}}{{$current_blog->img_path}}" alt="">
              </div>
              <div class="post-text">
                <p>{!! $current_blog->content !!}</p>
                <p>{!! $current_blog->excerpt !!}</p>
                <!-- <p>These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains</p> -->
                <blockquote>
                  <div>But in certain circumstances and owing to the claims of duty or obligations of business it willfrequently occur that pleasures have to be repudiated and annoyances accepted.</div>
                  <div class="blockquote-author"><a href="#">Jon Cock</a></div>
                </blockquote>
                <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.</p>
                <div class="mt-3"></div>
                <div class="row">
                  <div class="col-sm"><img class="lazyload fade-up" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{$img_url}}{{$current_blog->img_path}}" alt=""></div>
                  <div class="col-sm mt-3 mt-md-0">
                    <p>No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter. But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.</p>
                  </div>
                </div>
                <p>Consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.</p>
                <p>To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain.</p>
                <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself.</p>
              </div>
              <div class="post-bot">
                <ul class="tags-list post-tags-list">
                  @foreach($current_blog_tags as $blog_tag)
                  <li><a href="#">{{$blog_tag->name}}</a></li>
                  @endforeach
                  <!-- <li><a href="#">Seiko</a></li>
                  <li><a href="#">Banita</a></li>
                  <li><a href="#">Bigsteps</a></li> -->
                </ul>
                <a href="#" class="post-share">
                  <!-- Go to www.addthis.com/dashboard to customize your tools -->
                  <script src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5d92f2937e44d337"></script>
                  <div class="addthis_inline_share_toolbox"></div>
                </a>
              </div>
            </div>
            @include('Blog.BlogPost.relatedpost')
            @include('Blog.BlogPost.postcomment')
            @include('Blog.BlogPost.leaveyourcomment')
          </div>