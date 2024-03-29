@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="mb-2 row">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Tambah Data Admin</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('admin/company-profile') }}">Profil Perusahaan</a></li>
            <li class="breadcrumb-item"><a href="{{ url('admin/list') }}">Data Admin</a></li>
            <li class="breadcrumb-item active"><a href="#">Tambah Data Admin</a></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <a href="{{ url('admin/list') }}" class="btn btn-xs btn-warning"><i class="fas fa-backward"></i> Kembali</a>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body">
              <form action="{{ url('admin/store') }}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="nama">Nama Lengkap</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Masukkan nama lengkap" value="{{ old('nama') }}">
                  @error('nama')
                  <small class="invalid-feedback mb-2">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <textarea class="form-control col-md-12 @error('alamat') is-invalid @enderror" name="alamat" id="alamat" rows="4" placeholder="Masukan Alamat">{{ old('alamat') }}</textarea>
                  @error('alamat')
                  <small class="invalid-feedback mb-2">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Masukkan email" value="{{ old('email') }}">
                  @error('email')
                  <small class="invalid-feedback mb-2">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="telp">No. Telp</label>
                  <input type="telp" class="form-control @error('telp') is-invalid @enderror" name="telp" id="telp" placeholder="Masukkan No. Telp" value="{{ old('telp') }}">
                  @error('telp')
                  <small class="invalid-feedback mb-2">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="Masukkan username" value="{{ old('username') }}">
                  @error('username')
                  <small class="invalid-feedback mb-2">{{ $message }}</small>
                  @enderror
                </div>
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
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection

@section('footer')
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
@endsection
