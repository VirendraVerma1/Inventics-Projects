
    <div class="holder">
      <div class="container">
        <!-- Two columns -->
        <!-- Page Title -->
        <div class="page-title text-center">
          <h1>WOMEN’S</h1>
        </div>
        <!-- /Page Title -->
        <!-- Filter Row -->
        <div class="filter-row">
          <div class="row">
            <div class="items-count">35 item(s)</div>
            <div class="select-wrap d-none d-md-flex">
              <div class="select-label">SORT:</div>
              <div class="select-wrapper select-wrapper-xxs">
                <select class="form-control input-sm">
                  <option value="featured">Featured</option>
                  <option value="rating">Rating</option>
                  <option value="price">Price</option>
                </select>
              </div>
            </div>
            <div class="select-wrap d-none d-md-flex">
              <div class="select-label">VIEW:</div>
              <div class="select-wrapper select-wrapper-xxs">
                <select class="form-control input-sm">
                  <option value="featured">12</option>
                  <option value="rating">36</option>
                  <option value="price">100</option>
                </select>
              </div>
            </div>
            <div class="viewmode-wrap">
              <div class="view-mode">
                <span class="js-horview d-none d-lg-inline-flex"><i class="icon-grid"></i></span>
                <span class="js-gridview"><i class="icon-grid"></i></span>
                <span class="js-listview"><i class="icon-list"></i></span>
              </div>
            </div>
          </div>
        </div>
        <!-- /Filter Row -->
        <div class="row">
          <!-- Left column -->
          @include('Category.Filter.sidefilter')
          <!-- filter toggle -->
          <div class="filter-toggle js-filter-toggle">
            <div class="loader-horizontal js-loader-horizontal">
              <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 100%"></div>
              </div>
            </div>
            <span class="filter-toggle-icons js-filter-btn"><i class="icon-filter"></i><i class="icon-filter-close"></i></span>
            <span class="filter-toggle-text"><a href="#" class="filter-btn-open js-filter-btn">REFINE & SORT</a><a href="#" class="filter-btn-close js-filter-btn">RESET</a><a href="#" class="filter-btn-apply js-filter-btn">APPLY & CLOSE</a></span>
          </div>
          <!-- /Left column -->
          <!-- Center column -->
          @include('Category.maincontent')
          <!-- /Center column -->
        </div>
        <!-- /Two columns -->
      </div>
    </div>
