@extends('layouts.admin')

@section("content")

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="mb-2 row">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Profile Perusahaan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Profile Perusahaan</a></li>
          </ol>
        </div>
      </div>
      <!-- alert -->
      @if (session()->has('success'))
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
      </div>
      @endif
      <!-- alert -->
    </div>
  </div>

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8 offset-md-2 col-xs-12">
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-thumbnail rounded w-50" src="{{ companyLogo() }}" alt="User profile picture">
              </div>
              <h2 class="text-center my-3 company-name">{{ $company->company_name }}</h2>
              <ul class="list-group list-group-unbordered mb-3">
                <!-- Form -->
                <form action="{{ url("admin/company-profile/{$company->id_company}/update") }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="oldLogo" value="{{ $company->logo }}">
                  <li class="list-group-item">
                    <div class="form-group">
                      <label for="company_name">Nama Perusahaan</label>
                      <input type="text" name="company_name" class="form-control col-md-12" id="company_name" placeholder="Masukan Nama Perusahaan" value="{{ $company->company_name }}">
                    </div>
                    <div class="form-group">
                      <label for="address">Alamat</label>
                      <textarea class="form-control col-md-12" name="address" id="address" rows="4" placeholder="Masukan Alamat">{{ $company->address }}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="telp">No. Telp</label>
                      <input type="text" name="telp" class="form-control col-md-12" id="telp" placeholder="Masukan No. Telp" value="{{ $company->telp }}">
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" name="email" class="form-control col-md-12" id="email" placeholder="Masukan Email" value="{{ $company->email }}">
                    </div>
                    <div class="form-group">
                      <label for="logo">Logo</label>
                      <br>
                      <img class="profile-user-img img-fluid img-circle mb-3" src="{{ companyLogo() }}" alt="Logo">
                      <div class="custom-file">
                        <input type="file" name="logo" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Ubah logo...</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="sejarah">Sejarah</label>
                      <textarea class="form-control col-md-12" name="sejarah" id="sejarah" rows="6" placeholder="Masukan Sejarah">{{ $company->sejarah }}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="visi">Visi</label>
                      <textarea class="form-control col-md-12" name="visi" id="visi" rows="6" placeholder="Masukan Sejarah">{{ $company->visi }}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="misi">Misi</label>
                      <textarea class="form-control col-md-12" name="misi" id="misi" rows="6" placeholder="Masukan Sejarah">{{ $company->misi }}</textarea>
                    </div>
                  </li>
                  <button type="submit" class="btn btn-success mt-3 col-md-12">Simpan</button>
                </form>
                <!-- endForm -->
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
