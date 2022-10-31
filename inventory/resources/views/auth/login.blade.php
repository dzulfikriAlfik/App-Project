<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Aplikasi Inventory | Log in</title>

   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="{{ asset("assets/plugins/fontawesome-free/css/all.min.css") }}">
   <!-- icheck bootstrap -->
   <link rel="stylesheet" href="{{ asset("assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css") }}">
   <!-- Theme style -->
   <link rel="stylesheet" href="{{ asset("assets/dist/css/adminlte.min.css") }}">
</head>

<body class="hold-transition login-page">
   <div class="login-box">
      <!-- /.login-logo -->
      <div class="card card-outline card-primary">
         <div class="card-header text-center">
            <a href="#" class="h1"><b>Login</b></a>
         </div>
         <div class="card-body">
            @if (session()->has('success'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
               <strong>Success! </strong>{{ session('success') }}
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            @endif
            @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
               <strong>Error! </strong>{{ session('error') }}
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            @endif

            <form action="/authenticate" method="post">
               @csrf
               <div class="input-group mb-3">
                  <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" autofocus>
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                     </div>
                  </div>
                  @error('email')
                  <small class="invalid-feedback">{{ $message }}</small>
                  @enderror
               </div>
               <div class="input-group mb-3">
                  <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                     </div>
                  </div>
                  @error('password')
                  <small class="invalid-feedback">{{ $message }}</small>
                  @enderror
               </div>
               <div class="row">
                  <div class="col-8">
                     {{--  --}}
                  </div>
                  <!-- /.col -->
                  <div class="col-4">
                     <button type="submit" class="btn btn-primary btn-block">Login</button>
                  </div>
                  <!-- /.col -->
               </div>
            </form>
            <p class="mb-0">Belum punya akun?
               <a href="/register" class="text-center">Register</a>
            </p>
         </div>
         <!-- /.card-body -->
      </div>
      <!-- /.card -->
   </div>
   <!-- /.login-box -->

   <!-- jQuery -->
   <script src="{{ asset("assets/plugins/jquery/jquery.min.js") }}"></script>
   <!-- Bootstrap 4 -->
   <script src="{{ asset("assets/plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
   <!-- AdminLTE App -->
   <script src="{{ asset("assets/dist/js/adminlte.min.js") }}"></script>
</body>

</html>
