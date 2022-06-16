<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>{{ $title ?? "Aplikasi Inventory" }}</title>
   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <!-- Font Awesome Icons -->
   <link rel="stylesheet" href="{{ asset("assets/plugins/fontawesome-free/css/all.min.css") }}">
   <!-- overlayScrollbars -->
   <link rel="stylesheet" href="{{ asset("assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css") }}">
   <!-- Theme style -->
   <link rel="stylesheet" href="{{ asset("assets/dist/css/adminlte.min.css") }}">
   {{-- Custom Style --}}
   @stack("custom-style")
</head>

{{-- <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed"> --}}

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
   <div class="wrapper">
      <!-- Preloader / Animation Transition -->
      {{-- <div class="preloader flex-column justify-content-center align-items-center">
         <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
         <h2 class="mt-3">Aplikasi Inventory</h2>
      </div> --}}

      <!-- Navbar -->
      @include("layouts.partials._navbar")
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      @include("layouts.partials._sidebar")
      <!-- /.Main Sidebar Container -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         @yield("content")
         <!-- /.Content Header (Page header) -->
      </div>
      <!-- /.Content Wrapper. Contains page content -->
   </div>

   <!-- REQUIRED SCRIPTS -->
   <!-- jQuery -->
   <script src="{{ asset("assets/plugins/jquery/jquery.min.js") }}"></script>
   <!-- Bootstrap -->
   <script src="{{ asset("assets/plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
   <!-- overlayScrollbars -->
   <script src="{{ asset("assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js") }}"></script>
   <!-- AdminLTE App -->
   <script src="{{ asset("assets/dist/js/adminlte.js") }}"></script>
   <!-- PAGE PLUGINS -->
   <!-- jQuery Mapael -->
   <script src="{{ asset("assets/plugins/jquery-mousewheel/jquery.mousewheel.js") }}"></script>
   <script src="{{ asset("assets/plugins/raphael/raphael.min.js") }}"></script>
   <script src="{{ asset("assets/plugins/jquery-mapael/jquery.mapael.min.js") }}"></script>
   <script src="{{ asset("assets/plugins/jquery-mapael/maps/usa_states.min.js") }}"></script>
   <!-- ChartJS -->
   <script src="{{ asset("assets/plugins/chart.js/Chart.min.js") }}"></script>
   <!-- SweetAlert2 -->
   <script src="{{ asset("assets/dist/swal/sweetalert2.all.min.js") }}"></script>
   {{-- Custom Script --}}
   @stack("custom-script")
</body>

</html>
