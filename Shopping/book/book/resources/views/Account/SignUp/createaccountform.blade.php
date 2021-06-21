<div class="holder">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-18 col-lg-12">
            <h2 class="text-center">Create an Account</h2>
            <div class="form-wrapper">
              <p>To access your whishlist, address book and contact preferences and to take advantage of our speedy checkout, create an account with us now.</p>
              <form method="POST" action="{{ route('register') }}">
              @csrf()
                <div class="row">
                  <div class="col-sm-9">
                    <div class="form-group">
                      <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="First name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                      @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                  </div>
                  <div class="col-sm-9">
                    <div class="form-group">
                      <input type="text" class="form-control" name="last_name" placeholder="Last name">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="E-mail" value="{{ old('email') }}" required autocomplete="email">
                  @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="form-group">
                  <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">
                  @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="form-group">
                  <input type="password" class="form-control"  placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                </div>
                <div class="clearfix">
                  <input id="checkbox1" name="checkbox1" type="checkbox" checked="checked">
                  <label for="checkbox1">By registering your details you agree to our <a href="#" class="custom-color" data-fancybox data-src="#modalTerms">Terms and Conditions</a> and <a href="#" class="custom-color" data-fancybox data-src="#modalCookies">Cookie Policy</a></label>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn">{{ __('Register') }}</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>