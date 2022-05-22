<!-- Menghubungkan dengan view template cms -->
@extends('_layouts/template')

{{-- Content --}}
@section('content')
<div class="container pt-15 pb-15">
  {{-- @include('sweetalert::alert') --}}
  <div class="row justify-content-md-center">
    <div class="col col-lg-6">
      <div class="card">
        <div class="card-header" style="padding: 20px; background-color: #ECF0F3;">
          <h3>Login</h3>
        </div>
        <div class="card-body" style="padding: 20px;">
          <h5>Email</h5>
          <div class="form-label-group">
            <input id="email" autofocus type="text" class="form-control" placeholder="Masukan Email" value="">
            <label for="email">Masukan Email</label>
          </div>
          <h5 class="mt-3">Password</h5>
          <div class="form-label-group">
            <input id="password" type="password" class="form-control" placeholder="Masukan Password" value="">
            <label for="password">Masukan Password</label>
          </div>
          {{-- <div class="form-label-group mt-3" style="text-align: right;">
            <a href="#">Lupa password?</a>
          </div> --}}
          <div class="form-label-group mt-3" style="text-align: center;">
            <button class="btn btn-login btn-primary" style="width: 100%;" onclick="login()">Login</button>
          </div>
          <div class="form-label-group mt-3" style="text-align: center;">
            Schoolfess Partnership v0.1<br />
            Last Update 17 May 2022 14:00 WIB
          </div>
          <div class="form-label-group mt-3" style="text-align: center;">
            Belum punya akun? <a href="/register">Daftar disini</a>
          </div>
        </div>
      </div>
      <br>
    </div>
  </div>
</div>

@endsection

@section('jquery')
<!-- JQUERY -->
<script src="{{ asset('jquery/login.js') }}"></script>
@endsection