<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>{{ $title }}</title>
  <meta name="description" content="Description">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2">
  <link rel="icon" href="{{ logoPerusahaan() }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset("assets/web/css/libs.css") }}">
  <link rel="stylesheet" href="{{ asset("assets/web/css/style.css") }}">
  <link rel="preload" href="{{ asset("assets/web/fonts/istok-web-v15-latin/istok-web-v15-latin-regular.woff2") }}" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="{{ asset("assets/web/fonts/istok-web-v15-latin/istok-web-v15-latin-700.woff2") }}" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="{{ asset("assets/web/fonts/montserrat-v15-latin/montserrat-v15-latin-700.woff2") }}" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="{{ asset("assets/web/fonts/montserrat-v15-latin/montserrat-v15-latin-600.woff2") }}" as="font" type="font/woff2" crossorigin>

  <link rel="preload" href="{{ asset("assets/web/fonts/material-icons/material-icons.woff2") }}" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="{{ asset("assets/web/fonts/material-icons/material-icons-outlined.woff2") }}" as="font" type="font/woff2" crossorigin>
  <!-- myCustom CSS -->
  <link rel="stylesheet" href="{{ asset("assets/web/css/custom.css") }}">
  {{-- Custom header --}}
  @yield("header")
</head>

<body>
  <main class="main">
    <div class="main-inner">

      {{-- Partial Web Nav Mobile --}}
      @include("partials.web-nav-mobile")

      {{-- Partial Header --}}
      @include("partials.web-header")

      {{-- Main Content --}}
      @yield("content")

      {{-- Partial Footer --}}
      @include("partials.web-footer")

    </div>
  </main><!-- End main -->

  <script src="{{ asset('assets/web/libs/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/web/libs/lozad/lozad.min.js') }}"></script>
  <script src="{{ asset('assets/web/libs/device/device.js') }}"></script>
  <script src="{{ asset('assets/web/libs/ScrollToFixed/jquery-scrolltofixed-min.js') }}"></script>
  <script src="{{ asset('assets/web/libs/spincrement/jquery.spincrement.min.js') }}"></script>
  <script src="{{ asset('assets/web/libs/jquery-validation-1.19.3/jquery.validate.min.js') }}"></script>
  <script src="{{ asset('assets/web/js/custom.js') }}"></script>
  {{-- Custom footer --}}
  @yield("footer")

</body>

</html>
