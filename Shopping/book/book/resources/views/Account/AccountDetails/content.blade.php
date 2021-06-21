
          <div class="col-md-14 aside">
            <h1 class="mb-3">Account Details</h1>
            <div class="row vert-margin">
              <div class="col-sm-9">
                <div class="card">
                  <div class="card-body">
                    <h3>Personal Info</h3>
                    <p><b>Name:</b> {{$customer_detail->name}}<br>
                      <b>Nice Name:</b>{{$customer_detail->nice_name}}<br>
                      <b>E-mail:</b>{{$customer_detail->email}}<br>
                      <b>Phone:</b> {{$customer_detail->phone}}
                    </p>
                    <div class="mt-2 clearfix">
                      <a href="#" class="link-icn js-show-form" data-form="#updateDetails"><i class="icon-pencil"></i>Edit</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card mt-3 d-none" id="updateDetails">
            <form action="{{route('UpdateAccountDetails')}}" method="POST">
            @csrf()
              <div class="card-body">
                <h3>Update Account Details</h3>
                <div class="row mt-2">
                  <div class="col-sm-9">
                    <label class="text-uppercase">First Name:</label>
                    <div class="form-group">
                      <input type="text" name="name" class="form-control form-control--sm" value="{{$customer_detail->name}}">
                    </div>
                  </div>
                  <div class="col-sm-9">
                    <label class="text-uppercase">Last Name:</label>
                    <div class="form-group">
                      <input type="text" name="nice_name" class="form-control form-control--sm" value="{{$customer_detail->nice_name}}">
                    </div>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col-sm-9">
                    <label class="text-uppercase">E-mail:</label>
                    <div class="form-group">
                      <input type="email" name="email" class="form-control form-control--sm" value="{{$customer_detail->email}}">
                    </div>
                  </div>
                  <div class="col-sm-9">
                    <label class="text-uppercase">Phone:</label>
                    <div class="form-group">
                      <input type="text" name="phone" class="form-control form-control--sm" value="{{$customer_detail->phone}}">
                    </div>
                  </div>
                </div>
                <div class="mt-2">
                  <button type="reset" class="btn btn--alt js-close-form" data-form="#updateDetails">Cancel</button>
                  <button type="submit" class="btn ml-1">Update</button>
                </div>
              </div>
            </form>
            </div>
          </div>
          
          
