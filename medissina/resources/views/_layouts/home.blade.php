<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Welcome to Rakon Multi-Purpose HTML5 Templates RTL Supported, built with HTML, JS, SASS, CSS3 and jQuery, RTL Supported, Easy User Experience and Responsive to all devices" />
  <meta name="keywords" content="HTML, CSS, JavaScript, Bootstrap, jQuery, Rakon, Themeforest, Template, envato, SASS, SCSS, HTML5, landing page, SaaS Product, SaaS Modern,  MultiPurpose, Crypto, Currency, ICO, Hosting, Agency, Mobile, App, Interior, Charity" />
  <meta name="author" content="Rakon - Creative Multi-Purpose HTML5 Templates" />

  <title>TK Islam Medissina | {{ $title ?? "" }}</title>
  <!-- favicon -->
  <link rel="shortcut icon" href="{{ asset('assets/images/logo-medissina.jpg') }}" type="image/x-icon" />
  <!-- Bootstrap 4.5 -->
  <link rel="stylesheet" href="{{ asset('assets/homepage/assets/css/bootstrap.min.css') }}" type="text/css" />
  <!-- animate -->
  <link rel="stylesheet" href="{{ asset('assets/homepage/assets/css/animate.css') }}" type="text/css" />
  <!-- Swiper -->
  <link rel="stylesheet" href="{{ asset('assets/homepage/assets/css/swiper.min.css') }}" />
  <!-- aos -->
  <link rel="stylesheet" href="{{ asset('assets/homepage/assets/css/aos.css') }}" type="text/css" />
  <!-- icons -->
  <link rel="stylesheet" href="{{ asset('assets/homepage/assets/css/icons.css') }}" type="text/css" />
  <!-- main css -->
  <link rel="stylesheet" href="{{ asset('assets/homepage/assets/css/main.css') }}" type="text/css" />
  <!-- normalize -->
  <link rel="stylesheet" href="{{ asset('assets/homepage/assets/css/normalize.css') }}" type="text/css" />
  {{-- custom-header --}}
  @yield('custom-header')

</head>

<body>
  <div id="wrapper">

    <div id="content">
      <!-- Start header -->
      @include('_partials.header')
      <!-- End header -->

      <!-- Main content -->
      @yield('content')

    </div>

    <!-- Start footer -->
    @include('_partials.footer')
    <!-- End Footer -->


    <!-- Back to top with progress indicator-->
    <div class="prgoress_indicator">
      <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
      </svg>
    </div>


  </div>
  <!-- End. wrapper -->

  <!-- jquery -->
  <script src="{{ asset('assets/homepage/assets/js/jquery-3.5.0.js') }}" type="text/javascript"></script>
  <!-- jquery-migrate -->
  <script src="{{ asset('assets/homepage/assets/js/jquery-migrate.min.js') }}" type="text/javascript"></script>
  <!-- popper -->
  <script src="{{ asset('assets/homepage/assets/js/popper.min.js') }}" type="text/javascript"></script>
  <!-- bootstrap -->
  <script src="{{ asset('assets/homepage/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
  <!--
  ============
  vendor file
  ============
   -->
  <!-- particles -->
  <script src="{{ asset('assets/homepage/assets/js/vendor/particles.min.js') }}" type="text/javascript"></script>
  <!-- TweenMax -->
  <script src="{{ asset('assets/homepage/assets/js/vendor/TweenMax.min.js') }}" type="text/javascript"></script>
  <!-- ScrollMagic -->
  <script src="{{ asset('assets/homepage/assets/js/vendor/ScrollMagic.js') }}" type="text/javascript"></script>
  <!-- animation.gsap -->
  <script src="{{ asset('assets/homepage/assets/js/vendor/animation.gsap.js') }}" type="text/javascript"></script>
  <!-- addIndicators -->
  <script src="{{ asset('assets/homepage/assets/js/vendor/debug.addIndicators.min.js') }}" type="text/javascript"></script>
  <!-- Swiper js -->
  <script src="{{ asset('assets/homepage/assets/js/vendor/swiper.min.js') }}" type="text/javascript"></script>
  <!-- countdown -->
  <script src="{{ asset('assets/homepage/assets/js/vendor/countdown.js') }}" type="text/javascript"></script>
  <!-- simpleParallax -->
  <script src="{{ asset('assets/homepage/assets/js/vendor/simpleParallax.min.js') }}" type="text/javascript"></script>
  <!-- waypoints -->
  <script src="{{ asset('assets/homepage/assets/js/vendor/waypoints.min.js') }}" type="text/javascript"></script>
  <!-- counterup -->
  <script src="{{ asset('assets/homepage/assets/js/vendor/jquery.counterup.min.js') }}" type="text/javascript"></script>
  <!-- charming -->
  <script src="{{ asset('assets/homepage/assets/js/vendor/charming.min.js') }}" type="text/javascript"></script>
  <!-- imagesloaded -->
  <script src="{{ asset('assets/homepage/assets/js/vendor/imagesloaded.pkgd.min.js') }}" type="text/javascript"></script>
  <!-- BX-Slider -->
  <script src="{{ asset('assets/homepage/assets/js/vendor/jquery.bxslider.min.js') }}" type="text/javascript"></script>
  <!-- Sharer -->
  <script src="{{ asset('assets/homepage/assets/js/vendor/sharer.js') }}" type="text/javascript"></script>
  <!-- sticky -->
  <script src="{{ asset('assets/homepage/assets/js/vendor/sticky.min.js') }}" type="text/javascript"></script>
  <!-- Aos -->
  <script src="{{ asset('assets/homepage/assets/js/vendor/aos.js') }}" type="text/javascript"></script>
  <!-- main file -->
  <script src="{{ asset('assets/homepage/assets/js/main.js') }}" type="text/javascript"></script>
  <script src="{{ asset('sweetalert/sweetalert2.all.min.js') }}"></script>
  {{-- custom jquery --}}
  @yield('jquery')
  {{-- custom jquery --}}
  <script src="{{ asset('js/common.js') }}"></script>
  <script src="{{ asset('js/commonMessage.js') }}"></script>
  <script src="{{ asset('js/commonAPI.js') }}"></script>

</body>

</html>
