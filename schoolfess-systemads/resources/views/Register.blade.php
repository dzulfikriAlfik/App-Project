<!-- Menghubungkan dengan view template cms -->
@extends('layouts/template')

{{-- Content --}}
@section('content')
<div class="container pt-15 pb-15">
   {{-- @include('sweetalert::alert') --}}
   <div class="row justify-content-md-center">
      <div class="col col-lg-6">
         <div class="card">
            <div class="card-header" style="padding: 20px; background-color: #ECF0F3;">
               <h3>Register</h3>
            </div>
            <div class="card-body" style="padding: 20px;">
               {{-- Name --}}
               <h5 class="mt-3">Name</h5>
               <div class="form-label-group">
                  <input id="user_name" autofocus type="text" class="form-control" placeholder="Masukan Nama" value="">
                  <label for="user_name">Masukan Nama</label>
               </div>
               {{-- email --}}
               <h5 class="mt-3">Email</h5>
               <div class="form-label-group">
                  <input id="user_email" type="text" class="form-control" placeholder="Masukan Email" value="">
                  <label for="user_email">Masukan Email</label>
               </div>
               {{-- No Hp --}}
               <h5 class="mt-3">No. HP</h5>
               <div class="form-label-group">
                  <input id="user_phone" type="text" class="form-control" placeholder="Masukan No.HP" value="">
                  <label for="user_phone">Masukan No.HP</label>
               </div>
               {{-- Nama Perusahaan --}}
               <h5 class="mt-3">Nama Perusahaan</h5>
               <div class="form-label-group">
                  <input id="user_company" type="text" class="form-control" placeholder="Masukan Nama Perusahaan" value="">
                  <label for="user_company">Masukan Nama Perusahaan</label>
               </div>
               {{-- Jenis Perusahaan --}}
               <h5 class="mt-3">Jenis Usaha</h5>
               <div class="form-label">
                  {{-- <input id="companyname" type="text" class="form-control" placeholder="Masukan Nama Perusahaan" value="">
                  <label for="companyname">Masukan Nama Perusahaan</label> --}}
                  {{-- <label class="form-label">Jenis Perusahaan</label> --}}
                  <select id="user_company_type" class="form-control">
                     <option value="">-- Pilih satu --</option>
                     <option value="1">Teknologi Informasi</option>
                     <option value="2">Fund Management</option>
                     <option value="3">Telecommunication Project</option>
                  </select>
               </div>
               {{-- Password --}}
               <h5 class="mt-3">Password</h5>
               <div class="form-label-group">
                  <input id="user_password" type="password" class="form-control" placeholder="Masukan Password" value="">
                  <label for="user_password">Masukan Password</label>
               </div>
               {{-- Password confirmation --}}
               <h5 class="mt-3">Konfirmasi Password</h5>
               <div class="form-label-group">
                  <input id="user_password_conf" type="password" class="form-control" placeholder="Masukan Password" value="">
                  <label for="user_password_conf">Masukan Konfirmasi Password</label>
               </div>
               {{-- Register Button --}}
               <div class="form-label-group mt-3" style="text-align: center;">
                  <button class="btn btn-register btn-primary" style="width: 100%;">Register</button>
               </div>
               {{-- schoolfess partnership version info --}}
               <div class="form-label-group mt-3" style="text-align: center;">
                  Schoolfess Partnership v0.1<br />
                  Last Update 17 May 2022 14:00 WIB
               </div>
               {{-- Link to login --}}
               <div class="form-label-group mt-3" style="text-align: center;">
                  Sudah punya akun? <a href="/">Login</a>
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
<script src="{{ asset('jquery/register.js') }}"></script>
@endsection