@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="mb-2 row">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Tambah Data Kegiatan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('admin/company-profile') }}">Profil Perusahaan</a></li>
            <li class="breadcrumb-item"><a href="{{ url('kegiatan/list') }}">Data Kegiatan</a></li>
            <li class="breadcrumb-item active"><a href="#">Tambah Data Kegiatan</a></li>
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
              <a href="{{ url('kegiatan/list') }}" class="btn btn-sm btn-warning"><i class="fas fa-backward"></i> Kembali</a>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body">
              <form action="{{ url('kegiatan/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="nama_kegiatan">Nama Kegiatan</label>
                      <input type="text" class="form-control @error('nama_kegiatan') is-invalid @enderror" name="nama_kegiatan" id="nama_kegiatan" placeholder="Masukkan Nama Kegiatan" value="{{ old('nama_kegiatan') }}">
                      @error('nama_kegiatan')
                      <small class="invalid-feedback mb-2">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Tanggal Kegiatan</label>
                      <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input name="tanggal" id="tanggal" placeholder="dd-mm-yyyy" type="text" class="form-control datetimepicker-input @error('tanggal') is-invalid @enderror" data-target="#reservationdate" value="{{ old('tanggal') }}">
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                      @error('tanggal')
                      <small class="invalid-feedback mb-2">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="keterangan">Keterangan</label>
                  <textarea class="form-control col-md-12 @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan" rows="4" placeholder="Masukan Keterangan">{{ old('keterangan') }}</textarea>
                  @error('keterangan')
                  <small class="invalid-feedback mb-2">{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="foto">Foto</label>
                  <div class="custom-file">
                    <input type="file" name="foto" class="custom-file-input @error('foto') is-invalid @enderror" id="customFile">
                    <label class="custom-file-label" for="customFile">Unggah foto...</label>
                    @error('foto')
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
  //

</script>
@endsection
