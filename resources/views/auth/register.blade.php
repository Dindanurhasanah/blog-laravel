<!DOCTYPE html>
<html>
<head>
  @include('layouts.admin.head')
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Register</b></a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="{{ route('register') }}" method="post">
        @csrf

        <div class="input-group mb-3">
          <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Full name" name="name" id="name" value="{{ old('name') }}" required="" autocomplete="name" autofocus="">
          @error('name')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
          @enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
            <input type="text" class="form-control @error('nickname') is-invalid @enderror" placeholder="Nickname" name="nickname" id="nickname" value="{{ old('nickname') }}" required="" autocomplete="nickname">
            @error('nickname')
              <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
              </span>
            @enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user-astronaut"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" id="email" value="{{ old('email') }}" required="" autocomplete="email">
            @error('email')
              <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
              </span>
            @enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" id="password" value="{{ old('password') }}" required="" autocomplete="new-password">
            @error('password')
              <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
              </span>
            @enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
        <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation" required="" autocomplete="new-password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="form-check form-check-inline icheck-primary d-inline">
            <input class="form-check-input" type="radio" name="gender" id="statusRadio1" value="0" checked="">
            <label class="form-check-label" for="statusRadio1">Male</label>
        </div>
        <div class="form-check form-check-inline icheck-primary d-inline">
            <input class="form-check-input" type="radio" name="gender" id="statusRadio2" value="1">
            <label class="form-check-label" for="statusRadio2">Female</label>
        </div>

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      {{-- <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div> --}}

      {{-- <a href="{{ route('login') }}" class="text-center">I already have a membership</a> --}}
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

@include('layouts.admin.scripts')
</body>
</html>
