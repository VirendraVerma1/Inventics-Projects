<div class="holder">
      <div class="container">
        <!-- Two columns -->
        <!-- Page Title -->
        <div class="page-title text-center">
          <div class="row justify-content-end">
            <div class="col-lg-14">
              <h1>WOMEN’S</h1>
            </div>
          </div>
        </div>
        <!-- /Page Title -->
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
          <div class="col-lg aside">
            <div class="prd-grid-wrap">
              <div class="page404-bg">
                <div class="page404-text">
                  <div class="txt3"><i class="icon-shopping-bag"></i></div>
                  <div class="txt4">Unfortunately, there are no products<br>matching the selection</div>
                </div>
                <svg class="blob" id="morphing" xmlns="http://www.w3.org/2000/svg" width="600" height="600" viewBox="0 0 600 600">
                  <g transform="translate(50,50)">
                    <path class="p" d="M93.5441 2.30824C127.414 -1.02781 167.142 -4.63212 188.625 21.7114C210.22 48.1931 199.088 86.5178 188.761 119.068C179.736 147.517 162.617 171.844 136.426 186.243C108.079 201.828 73.804 212.713 44.915 198.152C16.4428 183.802 6.66731 149.747 1.64848 118.312C-2.87856 89.9563 1.56309 60.9032 19.4066 38.3787C37.3451 15.7342 64.7587 5.14348 93.5441 2.30824Z" />
                  </g>
                </svg>
              </div>
            </div>
          </div>
          <!-- /Center column -->
        </div>
        <!-- /Two columns -->
      </div>
    </div>