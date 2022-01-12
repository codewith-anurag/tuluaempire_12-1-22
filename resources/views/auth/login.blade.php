<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.urbanui.com/melody/template/pages/samples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:08:53 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{{ config('app.name') }}</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('/css/admin/font-awesome/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('/css/admin/vendor_bundle_base.css')}}">
  <link rel="stylesheet" href="{{asset('/css/admin/vendor_bundle_addons.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('/css/admin/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('/images/admin/favicon.png')}}" />
</head>

<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
                <img src="{{asset('/images/admin/logo_1.png')}}" alt="logo">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-0" method="POST" action="{{ route('login') }}">
                 @csrf
                <div class="form-group">

                  <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="Username" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                  @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">

                  <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                        {{ __('Login') }}
                </button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                    @if (Route::has('password.request'))
                        <a class="auth-link text-black" href="{{ route('reset') }}">
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
  </div>

   <!-- container-scroller -->
  <!-- plugins:js -->
<script src="{{asset('js/admin/vendor_bundle_base.js')}}"></script>
  <script src="{{asset('js/admin/vendor_bundle_addons.js')}}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{asset('js/admin/off-canvas.js')}}"></script>
  <script src="{{asset('js/admin/hoverable-collapse.js')}}"></script>
  <script src="{{asset('js/admin/misc.js')}}"></script>
  <script src="{{asset('js/admin/settings.js')}}"></script>
  <script src="{{asset('js/admin/todolist.js')}}"></script>
  <!-- endinject -->
</body>
<!-- Mirrored from www.urbanui.com/melody/template/pages/samples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:08:53 GMT -->
</html>