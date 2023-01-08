<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Raja Wijaya Cirebon | Daftar mitra</title>

  <link rel="icon" href="{{ companyLogo() }}" type="image/x-icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/admin/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition login-page">
  <div class="col-md-8">
    <div class="login-logo mt-3">
      <a href="#"><b>Daftar</b> Mitra</a>
    </div>

    <div class="card">
      <div class="card-body login-card-body">
        <form action="{{ url('register') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="nama">Nama Mitra</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Masukkan nama mitra" value="{{ old('nama') }}">
                @error('nama')
                <small class="invalid-feedback mb-2">{{ $message }}</small>
                @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Masukkan email" value="{{ old('email') }}">
                @error('email')
                <small class="invalid-feedback mb-2">{{ $message }}</small>
                @enderror
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control col-md-12 @error('alamat') is-invalid @enderror" name="alamat" id="alamat" rows="4" placeholder="Masukan Alamat">{{ old('alamat') }}</textarea>
            @error('alamat')
            <small class="invalid-feedback mb-2">{{ $message }}</small>
            @enderror
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="logo">Logo</label>
                <div class="custom-file">
                  <input type="file" name="logo" class="custom-file-input @error('logo') is-invalid @enderror" id="customFile">
                  <label class="custom-file-label" for="customFile">Unggah logo...</label>
                  @error('logo')
                  <small class="invalid-feedback mb-2">{{ $message }}</small>
                  @enderror
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="telp">No. Telp</label>
                <input type="telp" class="form-control @error('telp') is-invalid @enderror" name="telp" id="telp" placeholder="Masukkan No. Telp" value="{{ old('telp') }}">
                @error('telp')
                <small class="invalid-feedback mb-2">{{ $message }}</small>
                @enderror
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="Masukkan username" value="{{ old('username') }}">
                @error('username')
                <small class="invalid-feedback mb-2">{{ $message }}</small>
                @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group mb-3">
                  <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Masukkan Password">
                  <div class="input-group-append" style="cursor: pointer" id="toggle-password">
                    <span class="input-group-text"><i id="icon-password" class="fa fa-eye"></i></span>
                  </div>
                  @error('password')
                  <small class="invalid-feedback mb-2">{{ $message }}</small>
                  @enderror
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="row">
            <!-- /.col -->
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary btn-block">Daftar</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <p class="my-3 text-center">
          <a href="{{ url('') }}" class="text-center">Back to Homepage</a>
        </p>
        <p class="text-center">Sudah punya akun?
          <a href="{{ url('login') }}" class="text-center">Login</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="{{ asset('assets/admin/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('assets/admin/dist/js/adminlte.min.js') }}"></script>

  <script>
    $(function () {
      const password = $("#password")
      const toggleButton = $("#toggle-password");
      const iconPassword = $("#icon-password")

      toggleButton.on('click', function () {
        if (password.attr('type') == 'password') {
          password.attr('type', 'text')
          iconPassword.removeClass("fa-eye")
          iconPassword.addClass("fa-eye-slash")
        } else {
          password.attr('type', 'password')
          iconPassword.removeClass("fa-eye-slash")
          iconPassword.addClass("fa-eye")
        }
      });
    });

  </script>

</body>

</html>
