
    <div class="holder">
      <div class="container">
        <!-- Two columns -->
        <!-- Page Title -->
        <div class="page-title text-center">
          <h1>{{$name}}</h1>
        </div>
        <!-- /Page Title -->
        <!-- Filter Row -->
        <div class="filter-row">
          <div class="row">
            <div class="items-count" id="items_count">@if($totalProductCount>0) {{$totalProductCount}} item(s) @else NIL @endif</div>
            <div class="select-wrap d-none d-md-flex">
              <div class="select-label">SORT:</div>
              <div class="select-wrapper select-wrapper-xxs">
                <select class="form-control input-sm" id="short_by_name" onchange="on_change_short_by(this)">
                  <option value="Price">Lower to Higher Price</option>
                  <!-- <option value="rating">Rating</option> -->
                  <option value="HighPrice">Higher to Lower Price</option>
                </select>
              </div>
            </div>
            <div class="select-wrap d-none d-md-flex">
              <div class="select-label">VIEW:</div>
              <div class="select-wrapper select-wrapper-xxs">
                <select class="form-control input-sm" id="view_by_name" onchange="on_change_view_by(this)">
                  <option value="9">9</option>
                  <option value="18">18</option>
                  <option value="36">36</option>
                </select>
              </div>
            </div>
            <div class="viewmode-wrap">
              <div class="view-mode">
                <!-- <span class="js-horview d-none d-lg-inline-flex"><i class="icon-grid"></i></span>
                <span class="js-gridview"><i class="icon-grid"></i></span> -->
                <span class="js-listview"><i class="icon-list"></i></span>
              </div>
            </div>
          </div>
        </div>
        <!-- /Filter Row -->
        <div class="row">
          <!-- Left column -->
          @include('SearchPage.Filter.sidefilter')
          <!-- filter toggle -->
          <!-- <div class="filter-toggle js-filter-toggle">
            <div class="loader-horizontal js-loader-horizontal">
              <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 100%"></div>
              </div>
            </div>
            <span class="filter-toggle-icons js-filter-btn"><i class="icon-filter"></i><i class="icon-filter-close"></i></span>
            <span class="filter-toggle-text"><a href="#" class="filter-btn-open js-filter-btn">REFINE & SORT</a><a href="#" class="filter-btn-close js-filter-btn">RESET</a><a href="#" class="filter-btn-apply js-filter-btn">APPLY & CLOSE</a></span>
          </div> -->
          <!-- /Left column -->
          <!-- Center column -->
          @include('SearchPage.maincontent')
          <!-- /Center column -->
        </div>
        <!-- /Two columns -->
      </div>
    </div>
