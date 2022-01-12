<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('css/admin/font-awesome/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/admin/vendor_bundle_base.css')}}">
  <link rel="stylesheet" href="{{asset('css/admin/vendor_bundle_addons.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('css/admin/style.css')}}">
  <link rel="stylesheet" href="{{asset('css/admin/custom_style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('images/admin/favicon.png')}}" />
</head>
<body>

<div class="container-scroller">
    @include('layouts.header')
    <div class="loader" style="position: fixed;left: 0px;top: 0px;width: 100%;height: 100%;z-index: 9999;background: url({{asset('/images/admin/loader.gif')}}) 50% 50% no-repeat #f9f9f9;
opacity: 1;"></div>
        <script src="{{asset('js/admin/vendor_bundle_base.js')}}"></script>
        <script src="{{asset('js/admin/vendor_bundle_addons.js')}}"></script>
        @yield('content')
    @include('layouts.footer')
 </div>
</div>

<script type="text/javascript">
  setTimeout(function(){ $(".alert-success").hide(); }, 3000);
  setTimeout(function(){ $(".alert-danger").hide(); }, 3000);
    $(window).on("load", function () {
        $(".loader").fadeOut("slow");
    });
</script>
<script src="{{asset('js/admin/off-canvas.js')}}"></script>
<script src="{{asset('js/admin/hoverable-collapse.js')}}"></script>
<script src="{{asset('js/admin/misc.js')}}"></script>
<script src="{{asset('js/admin/settings.js')}}"></script>
<script src="{{asset('js/admin/todolist.js')}}"></script>
</body>
</html>
