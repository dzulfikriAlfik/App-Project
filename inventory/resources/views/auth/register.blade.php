<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Aplikasi Inventory | Register</title>

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
            <a href="#" class="h1"><b>Register</b></a>
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

            <form action="/register/store" method="post">
               @csrf
               <div class="input-group mb-3">
                  <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Lengkap" value="{{ old('name') }}" autofocus autocomplete="off">
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-user"></span>
                     </div>
                  </div>
                  @error('name')
                  <small class="invalid-feedback">{{ $message }}</small>
                  @enderror
               </div>
               <div class="input-group mb-3">
                  <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username" value="{{ old('username') }}" autofocus autocomplete="off">
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-key"></span>
                     </div>
                  </div>
                  @error('username')
                  <small class="invalid-feedback">{{ $message }}</small>
                  @enderror
               </div>
               <div class="input-group mb-3">
                  <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" autofocus autocomplete="off">
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
                  <input name="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" autocomplete="off">
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                     </div>
                  </div>
                  @error('password')
                  <small class="invalid-feedback">{{ $message }}</small>
                  @enderror
               </div>
               <div class="input-group mb-3">
                  <input name="password_conf" id="password_conf" type="password" class="form-control @error('password_conf') is-invalid @enderror" placeholder="Konfirmasi Password" autocomplete="off">
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                     </div>
                  </div>
                  @error('password_conf')
                  <small class="invalid-feedback">{{ $message }}</small>
                  @enderror
               </div>
               <div class="row">
                  <div class="col-8">
                     {{--  --}}
                  </div>
                  <!-- /.col -->
                  <div class="col-4">
                     <button type="submit" id="btn-register" class="btn btn-primary btn-block">Register</button>
                  </div>
                  <!-- /.col -->
               </div>
            </form>
            <p class="mb-0">Sudah punya akun?
               <a href="/" class="text-center">Login</a>
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
   <!-- SweetAlert2 -->
   <script src="{{ asset("assets/dist/swal/sweetalert2.all.min.js") }}"></script>
   {{-- CommonJS --}}
   <script src="{{ asset('js/common.js') }}"></script>

   <script>
      $("#btn-register").on("click", function (e) {
         let pass = $("#password").val();
         let passConf = $("#password_conf").val();

         if (passConf == "") {
            e.preventDefault();
            commonJS.swalError("Password konfirmasi tidak boleh kosong");
         }
         if (passConf != pass) {
            e.preventDefault();
            commonJS.swalError("Password konfirmasi harus sama dengan password");
         }
      });

   </script>
</body>

</html>
