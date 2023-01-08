@extends('layouts.admin')

@section("content")
<!-- All Content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="mb-2 row">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Detail Kegiatan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('admin/company-profile') }}">Profil Perusahaan</a></li>
            <li class="breadcrumb-item"><a href="{{ url('kegiatan/list') }}">Data Kegiatan</a></li>
            <li class="breadcrumb-item active"><a href="#">Detail Kegiatan</a></li>
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
        <div class="col-md-6">
          <div class="card card-primary card-outline">
            <img class="rounded img-fluid img-thumbnail" style="width:100%; height:100%;" src="{{ fotoKegiatan($gallery->id) }}">
            <div class="card-body">
              <p class="card-text">{{ $gallery->keterangan }}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="{{ url("kegiatan/list") }}" class="btn btn-sm btn-info">Kembali</a>&nbsp;
                  <a href="{{ url("kegiatan/list/{$gallery->id}/edit") }}" class="btn btn-sm btn-warning">Edit</a>&nbsp;
                  <a href="{{ url("kegiatan/{$gallery->id}/delete") }}" onclick="return confirm('Yakin hapus data?')" class="btn btn-sm btn-danger">Hapus</a>
                </div>
                <small class="text-muted"><?= tgl_indo($gallery->tanggal) ?></small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
