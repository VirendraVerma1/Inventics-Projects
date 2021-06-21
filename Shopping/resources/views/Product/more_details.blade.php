<div class="holder mt-3 mt-md-5">
      <div class="container">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs product-tab">
          <li class="nav-item"><a href="#Tab1" class="nav-link" data-toggle="tab">Description
              <span class="toggle-arrow"><span></span><span></span></span>
            </a></li>
          <li class="nav-item"><a href="#Tab2" class="nav-link" data-toggle="tab">Sizing Guide
              <span class="toggle-arrow"><span></span><span></span></span>
            </a></li>
          <li class="nav-item"><a href="#Tab3" class="nav-link" data-toggle="tab">Global Tab
              <span class="toggle-arrow"><span></span><span></span></span>
            </a></li>
          <li class="nav-item"><a href="#Tab4" class="nav-link" data-toggle="tab">Assigned Tags
              <span class="toggle-arrow"><span></span><span></span></span>
            </a></li>
          <li class="nav-item"><a href="#Tab5" class="nav-link" data-toggle="tab">Reviews
              <span class="toggle-arrow"><span></span><span></span></span>
            </a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          @include('Product.MoreDetailsFiles.product_description')
          @include('Product.MoreDetailsFiles.product_sizing_guide')
          @include('Product.MoreDetailsFiles.product_global_tab')
          @include('Product.MoreDetailsFiles.product_assigned_tab')
          @include('Product.MoreDetailsFiles.product_reviews')
        </div>
      </div>
    </div>