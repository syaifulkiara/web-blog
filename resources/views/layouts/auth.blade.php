<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }} - @yield('subtitle')</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('themes/back/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{ asset('themes/back/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{ asset('themes/back/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('themes/back/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('themes/back/images/favicon.png')}}" />
</head>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div>
                <a href="{{url('/')}}"><img src="{{ asset('themes/front/img/log.png' )}}" alt="logo"></a>
              </div>
              @yield('content')
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ asset('themes/back/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('themes/back/js/off-canvas.js')}}"></script>
  <script src="{{ asset('themes/back/js/hoverable-collapse.js')}}"></script>
  <script src="{{ asset('themes/back/js/template.js')}}"></script>
  <script src="{{ asset('themes/back/js/settings.js')}}"></script>
  <script src="{{ asset('themes/back/js/todolist.js')}}"></script>
  <!-- endinject -->
</body>

</html>
