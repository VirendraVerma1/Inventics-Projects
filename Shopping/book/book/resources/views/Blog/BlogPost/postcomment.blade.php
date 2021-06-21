
<div class="post-comments mt-3 mt-md-4" id="postComments">
  @if(count($current_blog_comments)>0)
              <h3 class="h2-style">Post Comments</h3>
              @foreach($current_blog_comments as $comments)
              @if($comments->parent==null && $comments->approved)
              @php
                $blog_comment_created_date=date('F d, Y' ,strtotime($comments->created_at));
              @endphp
              <div class="row">
                  <div class="col-auto">
                    <div class="post-comment-author-img">
                      <img src="@if($comments->user_gender=='male'){{asset('images/blog/comment-author.png')}}@elseif($comments->user_gender=='female'){{asset('images/blog/comment-author-2.png')}}@endif" alt="" class="rounded-circle">
                    </div>
                  </div>
                  <div class="col">
                    <div class="post-comment-date"><i class="icon-calendar"></i>{{$blog_comment_created_date}}</div>
                    <div class="post-comment-author"><a href="#">{{$comments->user_name}}</a></div>
                    <div class="post-comment-text">
                      <p>{{$comments->content}}</p>
                    </div>
                  </div>
                </div>
              </div>
            @endif
            @endforeach
  @endif
              <!-- <div class="post-comment">
                <div class="row">
                  <div class="col-auto">
                    <div class="post-comment-author-img">
                      <img src="images/blog/comment-author.png" alt="" class="rounded-circle">
                    </div>
                  </div>
                  <div class="col">
                    <div class="post-comment-date"><i class="icon-calendar"></i>October 27, 2020</div>
                    <div class="post-comment-author"><a href="#">Miles Black</a></div>
                    <div class="post-comment-text">
                      <p>Well how fantastic do I feel now. Awesome to say the least. The customer service was outstanding, being on the larger side I am very self conscious, your team of beautiful kind-hearted ladies made me feel very special. I actually found two wonderful outfits and couldn't be any happier.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="post-comment">
                <div class="row">
                  <div class="col-auto">
                    <div class="post-comment-author-img">
                      <img src="images/blog/comment-author-2.png" alt="" class="rounded-circle">
                    </div>
                  </div>
                  <div class="col">
                    <div class="post-comment-date"><i class="icon-calendar"></i>October 15, 2020</div>
                    <div class="post-comment-author"><a href="#">Jenny Parker</a></div>
                    <div class="post-comment-text">
                      <p>Customer support has been excellent, as any small issues, minor bugs or even small requests have all been catered for in a quick, professional and timely manner.</p>
                    </div>
                  </div>
                </div>
              </div> -->
            </div>