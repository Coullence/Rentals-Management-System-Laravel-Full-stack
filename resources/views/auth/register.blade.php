@extends('layouts.app-min')

@section('content')
<div class="content-wrapper d-flex align-items-center justify-content-center auth theme-one" style="background-image: url({{ url('assets/images/auth/login_1.jpg') }}); background-size: cover;">
  <div class="row w-100">
    <div class="col-lg-8 mx-auto">
      <div class="auto-form-wrapper">
        <h3>Create account for free</h3>

        <form method="POST" action="{{ route('register') }}">
                        @csrf
<div class="row">
    <div class="col-lg-6 mx-auto">
          <div class="form-group">

            <label class="label">First Name</label>
            <div class="input-group">
            <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required autofocus>

              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline"></i>
                </span>
              </div>

            @if ($errors->has('first_name'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('first_name') }}</strong>
                </span>
            @endif
            </div>
          </div>

          <div class="form-group">

            <label class="label">Your Email</label>
            <div class="input-group">
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline"></i>
                </span>
              </div>
              
            @if ($errors->has('email'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            </div>
          </div>


          <div class="form-group">
            <label class="label">Your Password</label>
            <div class="input-group">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline"></i>
                </span>
              </div>

                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
          </div>
    </div>
    <div class="col-lg-6 mx-auto">
          <div class="form-group">

            <label class="label">last Name</label>
            <div class="input-group">
            <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus>

              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline"></i>
                </span>
              </div>

            @if ($errors->has('last_name'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('last_name') }}</strong>
                </span>
            @endif
            </div>
          </div>

          <div class="form-group">

            <label class="label">Your Phone</label>
            <div class="input-group">
            <input id="phone" type="text" placeholder="+254*********" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>

              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline"></i>
                </span>
              </div>

            @if ($errors->has('phone'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('phone') }}</strong>
                </span>
            @endif
            </div>
          </div>

          <div class="form-group">
            <label class="label">Confirm Your Password</label>
            <div class="input-group"> <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline"></i>
                </span>
              </div>
            </div>
          </div>
    </div>
  </div>
  <!-- end of the row -->


<!--             @if(config('settings.reCaptchStatus'))
                <div class="form-group">
                    <div class="col-sm-6 col-sm-offset-4">
                        <div class="g-recaptcha" data-sitekey="{{ config('settings.reCaptchSite') }}"></div>
                    </div>
                </div>
            @endif -->
          <div class="form-group d-flex justify-content-center">
            <div class="form-check form-check-flat mt-0">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" checked> I agree to the terms </label>
            </div>
          </div>
          <div class="form-group">
            <button class="btn btn-primary submit-btn btn-block">Register</button>
          </div>
          <div class="text-block text-center my-3">
            <span class="text-small font-weight-semibold">Already have and account ?</span>
            <a class="text-black text-small" href="{{ route('login') }}">{{ trans('titles.login') }}</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('footer_scripts')
    @if(config('settings.reCaptchStatus'))
        <script src='https://www.google.com/recaptcha/api.js'></script>
    @endif
@endsection
