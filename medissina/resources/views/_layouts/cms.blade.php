{{-- This template is for cms admin --}}
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $title ?? "SchPartner" }} | Partnership Schoolfess</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- core:css -->
  <link rel="stylesheet" href="{{ asset('assets/vendors/core/core.css') }}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/vendors/sweetalert2/sweetalert2.min.css') }}">
  <!-- end plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="{{ asset('assets/css/demo_1/style.css') }}">
  <link rel="stylesheet" href="{{ asset('sweetalert/style.css') }}">
  <!-- End layout styles -->
  {{-- <link rel="shortcut icon" href="{{ asset('') }}assets/images/favicon.png" /> --}}
  <link rel="shortcut icon" href="{{ url('assets/images/logo-medissina.png') }}">
  {{-- customcall --}}
  @yield('custom-header')
</head>

<body class="sidebar-dark">
  <div class="main-wrapper">
    <div style="display: none" id="base-url">{{ url('/') }}</div>


    {{-- Partial Sidebar --}}
    @include('_partials.sidebar-cms')

    <div class="page-wrapper">

      {{-- Partial Header --}}
      @include('_partials.header-cms')

      <div class="page-content">

        {{-- Partial Content --}}
        @yield('content')

      </div>

      <!-- Partial Footer -->
      @include('_partials.footer-cms')

    </div>

  </div>

  <!-- core:js -->
  <script src="{{ asset('assets/vendors/core/core.js') }}"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="{{ asset('assets/vendors/chartjs/Chart.min.js') }}"></script>
  <script src="{{ asset('assets/vendors/jquery.flot/jquery.flot.js') }}"></script>
  <script src="{{ asset('assets/vendors/jquery.flot/jquery.flot.resize.js') }}"></script>
  <script src="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
  <script src="{{ asset('assets/vendors/sweetalert2/sweetalert2.min.js') }}"></script>
  <!-- end plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('assets/vendors/feather-icons/feather.min.js') }}"></script>
  <script src="{{ asset('assets/js/template.js') }}"></script>
  {{-- Datatables --}}
  <script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
  <!-- endinject -->
  <!-- custom js for this page -->
  <!-- <script src="{{ asset('assets/js/dashboard.js') }}"></script> -->
  <script src="{{ asset('assets/js/datepicker.js') }}"></script>
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
  <script src="{{ asset('assets/js/sweet-alert.js') }}"></script>
  <!-- ChartJS -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
  {{-- momentJS --}}
  <script src="{{ asset('assets/vendors/moment/moment.min.js') }}"></script>
  {{-- tempusdominus --}}
  <script src="{{ asset('assets/vendors/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.js') }}"></script>
  <!-- JQuery -->
  <script>
    const baseUrl = $("#base-url").html()
    console.log("Base URL : ", baseUrl);

  </script>
  @yield('jquery')
  <script src="{{ asset('js/common.js') }}"></script>
  <script src="{{ asset('jquery/navbar-cms.js') }}"></script>
  <script src="{{ asset('js/commonMessage.js') }}"></script>
  <script src="{{ asset('js/commonAPI.js') }}"></script>
  {{-- Bootstrap Datepicker --}}
  <script src="{{ asset('assets/js/datepicker.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet" />
  <!-- end custom js for this page -->
  {{-- CKEditor --}}
  <!-- <script src="{{ asset('ckeditor/ckeditor.js')}}"></script> -->
  <!-- <script>CKEDITOR.replace('article-ckeditor');</script> -->
  <script type="text/javascript">
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

  </script>
</body>

</html>
