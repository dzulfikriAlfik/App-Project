@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="mb-2 row">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edit Data Mitra</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('admin/company-profile') }}">Profil Perusahaan</a></li>
            <li class="breadcrumb-item"><a href="{{ url('mitra/list') }}">Data Mitra</a></li>
            <li class="breadcrumb-item active"><a href="#">Edit Data Mitra</a></li>
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
              <a href="{{ url("mitra/list") }}" class="btn btn-sm btn-warning"><i class="fas fa-backward"></i> Kembali</a>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body">
              <form action="{{ url("mitra/{$user->id}/update") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="nama">Nama Mitra</label>
                      <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Masukkan nama mitra" value="{{ old('nama', $user->nama) }}">
                      @error('nama')
                      <small class="invalid-feedback mb-2">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Masukkan email" value="{{ old('email', $user->email) }}">
                      @error('email')
                      <small class="invalid-feedback mb-2">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <textarea class="form-control col-md-12 @error('alamat') is-invalid @enderror" name="alamat" id="alamat" rows="4" placeholder="Masukan Alamat">{{ old('alamat', $user->alamat) }}</textarea>
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
                        <label class="custom-file-label" for="customFile">Ubah logo...</label>
                      </div>
                      @error('logo')
                      <small class="invalid-feedback mb-2">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="telp">No. Telp</label>
                      <input type="telp" class="form-control @error('telp') is-invalid @enderror" name="telp" id="telp" placeholder="Masukkan No. Telp" value="{{ old('telp', $user->telp) }}">
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
                      <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="Masukkan username" value="{{ old('username', $user->username) }}">
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
