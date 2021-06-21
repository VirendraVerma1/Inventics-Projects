@php
  $subcounter=5;
@endphp
<div class="aside-block">
                <h2 class="text-uppercase">Popular Tags</h2>
                <ul class="tags-list">
                @foreach($allblogtags as $tags)
                @if($subcounter>0)
                  <li><a href="#">{{str_replace("Ecommerce Training – ","",$tags->name)}}</a></li>
                @endif
                @php
                $subcounter--;
                @endphp
                @endforeach
                  <!-- <li><a href="#">hand bags</a></li>
                  <li><a href="#">gift card</a></li>
                  <li><a href="#">goodwin</a></li>
                  <li><a href="#">seiko</a></li>
                  <li><a href="#">banita</a></li>
                  <li><a href="#">foxic</a></li> -->
                </ul>
              </div>