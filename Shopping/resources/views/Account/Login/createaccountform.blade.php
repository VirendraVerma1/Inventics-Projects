<div class="holder">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-18 col-lg-12">
            <h2 class="text-center">Log In</h2>
            <div class="form-wrapper">
              <p>To access your whishlist, address book and contact preferences and to take advantage of our speedy checkout, create an account with us now.</p>
              <form method="POST" action="{{ route('login') }}">
              @csrf()
              
              <div class="form-group">
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="E-mail" value="{{ old('email') }}" required autocomplete="email" autofocus>
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                
                <div class="form-group">
                
                  <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                </div>
                
                <div class="text-center">
                  <button type="submit" class="btn">{{ __('Login') }}</button>
                  @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                  @endif
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>