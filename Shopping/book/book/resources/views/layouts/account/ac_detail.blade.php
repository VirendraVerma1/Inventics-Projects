<div class="col-md-13 aside">
            <h1 class="mb-3">Account Details</h1>
            <div class="row vert-margin">
              <div class="col-sm-9">
                <div class="card">
                  <div class="card-body">
                    <h3>Personal Info</h3>
                    <p><b>Name:</b> {{$accountDetails->name}}<br>
                      <b>E-mail:</b> {{$accountDetails->email}}<br>
                      <b>Phone:</b> {{$accountDetails->phone}}
                    </p>
                    <div class="mt-2 clearfix">
                      <a href="#" class="link-icn js-show-form" data-form="#updateDetails"><i class="icon-pencil"></i>Edit</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card mt-3 d-none" id="updateDetails">
              <div class="card-body">
                <h3>Update Account Details</h3>
                <form action="{{route('update_customer_details')}}" method="post">
                  @csrf
                  @method('PUT')
                  <div class="row mt-2">
                    <div class="col">
                      <label class="text-uppercase">Name:</label>
                      <div class="form-group">
                        <input type="text" class="form-control form-control--sm" name="name" value="{{$accountDetails->name}}" placeholder="{{$accountDetails->name}}">
                      </div>
                    </div>
                    <!-- <div class="col-sm-9">
                      <label class="text-uppercase">Last Name:</label>
                      <div class="form-group">
                        <input type="text" class="form-control form-control--sm" placeholder="Raider">
                      </div>
                    </div> -->
                  </div>
                  <div class="row mt-2">
                    <div class="col-sm-9">
                      <label class="text-uppercase">E-mail:</label>
                      <div class="form-group">
                        <input type="email" class="form-control form-control--sm" name="email" value="{{$accountDetails->email}}"disabled placeholder="">
                      </div>
                    </div>
                    <div class="col-sm-9">
                      <label class="text-uppercase">Phone:</label>
                      <div class="form-group">
                        <input type="text" class="form-control form-control--sm"name="phone" value="{{$accountDetails->phone}}" placeholder="{{$accountDetails->phone}}">
                      </div>
                    </div>
                  </div>
                  <div class="mt-2">
                    <button type="reset" class="btn btn--alt js-close-form" data-form="#updateDetails">Cancel</button>
                    <button type="submit" class="btn ml-1">Update</button>
                  </div>
                </form>
              </div>
            </div>
</div>
