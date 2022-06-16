<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
   <!-- Site Title -->
   <title>{{ $title }}</title>
   <!-- Mobile Specific Meta -->
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <!-- CSRF Token -->
   <meta name="_token" content="{{ csrf_token() }}">
   <!-- Favicon-->
   <link rel="shortcut icon" href="{{ asset('/icon.png') }}">
   <!-- Author Meta -->
   <meta name="author" content="colorlib">
   <!-- Meta Description -->
   <meta name="description" content="">
   <!-- Meta Keyword -->
   <meta name="keywords" content="">
   <!-- meta character set -->
   <meta charset="UTF-8">

   <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
   <!-- CSS ============================================= -->
   <link href="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" />
   <link rel="stylesheet" href="{{ asset("assets/homepage/css/linearicons.css") }}">
   <link rel="stylesheet" href="{{ asset("assets/homepage/css/font-awesome.min.css") }}">
   <link rel="stylesheet" href="{{ asset("assets/homepage/css/bootstrap.css") }}">
   <link rel="stylesheet" href="{{ asset("assets/homepage/css/magnific-popup.css") }}">
   <link rel="stylesheet" href="{{ asset("assets/homepage/css/nice-select.css") }}">
   <link rel="stylesheet" href="{{ asset("assets/homepage/css/animate.min.css") }}">
   <link rel="stylesheet" href="{{ asset("assets/homepage/css/owl.carousel.css") }}">
   <link rel="stylesheet" href="{{ asset("assets/homepage/css/jquery-ui.css") }}">
   <link rel="stylesheet" href="{{ asset("assets/homepage/css/main.css") }}">
   {{-- plugin-styles --}}
   @stack('plugin-styles')
   {{-- custom-styles --}}
   @stack('style')
</head>

<body>
   <!-- #header -->
   @include("layout._homepage.header")
   <!-- #Endheader -->

   {{-- Content --}}
   @yield("content")
   {{-- EndContent --}}

   <!-- start footer Area -->
   @include("layout._homepage.footer")
   <!-- End footer Area -->

   <script src="{{ asset("assets/homepage/js/vendor/jquery-2.2.4.min.js") }}"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="{{ asset("assets/homepage/js/vendor/bootstrap.min.js") }}"></script>
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
   <script src="{{ asset("assets/homepage/js/easing.min.js") }}"></script>
   <script src="{{ asset("assets/homepage/js/hoverIntent.js") }}"></script>
   <script src="{{ asset("assets/homepage/js/superfish.min.js") }}"></script>
   <script src="{{ asset("assets/homepage/js/jquery.ajaxchimp.min.js") }}"></script>
   <script src="{{ asset("assets/homepage/js/jquery.magnific-popup.min.js") }}"></script>
   <script src="{{ asset("assets/homepage/js/jquery.tabs.min.js") }}"></script>
   <script src="{{ asset("assets/homepage/js/jquery.nice-select.min.js") }}"></script>
   <script src="{{ asset("assets/homepage/js/owl.carousel.min.js") }}"></script>
   <script src="{{ asset("assets/homepage/js/mail-script.js") }}"></script>
   <script src="{{ asset("assets/homepage/js/main.js") }}"></script>
   <!-- plugin js -->
   @stack('plugin-scripts')
   <!-- end plugin js -->
   @stack('custom-scripts')
</body>

</html>
