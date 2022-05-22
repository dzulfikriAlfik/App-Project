{{-- This template is for login / register --}}
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="{{ url('img/jdihn-favicon.png') }}?v={{ date('YmdHis') }}">
  <title>{{ $title }} | Partnership Schoolfess</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ asset('css/plugins.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  {{-- sweet alert custom style --}}
  <link rel="stylesheet" href="{{ asset('sweetalert/style.css') }}">
  <link rel="preload" href="{{ asset('css/fonts/dm.css') }}" as="style" onload="this.rel='stylesheet'">
</head>

<body>
  <div class="content-wrapper">
    <!-- start main content -->
    <section class="content">
      @yield('content')
    </section>
    <!-- end main content -->
  </div>
  <!-- /.content-wrapper -->
  {{-- progress button --}}
  @include('_partials.progress')
  {{-- end progress button --}}

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
  <script src="{{ asset('js/image.js') }}"></script>
  <script src="{{ asset('js/plugins.js') }}"></script>
  <script src="{{ asset('js/theme.js') }}"></script>
  {{-- SweetAlert --}}
  <script src="{{ asset('sweetalert/sweetalert2.all.min.js') }}"></script>
  <script src="{{ asset('jquery/header.js') }}"></script>
  <script src="{{ asset('js/common.js') }}"></script>
  <script src="{{ asset('js/commonAPI.js') }}"></script>
  {{-- moment.js with locale support --}}
  <script src="{{ asset('js/moment.min.js') }}"></script>
  {{-- set moment to locale Indonesian --}}
  <script>
    moment.locale('id')
  </script>
  {{-- JQuery --}}
  @yield('jquery')
  @yield('jquery2')
  {{-- Blog Client --}}
  <script src="{{ asset('jquery/blog-client.js') }}"></script>
  <script type="text/javascript">
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
  </script>

  {{-- auth login failed --}}
  {{-- @if(session()->has('unAuth'))
    <script>
      unAuth();
    </script>
    @php 
        Illuminate\Support\Facades\Session::forget('unAuth');
    @endphp
  @endif --}}

</body>

</html>