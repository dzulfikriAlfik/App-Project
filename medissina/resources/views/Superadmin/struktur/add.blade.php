<!-- Menghubungkan dengan view template cms -->
@extends('_layouts/cms')

@section('custom-header')
@endsection

{{-- Content --}}
@section('content')
<!-- Breadcrumb -->
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/cms/struktur') }}">Staff</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tambah Staff</li>
  </ol>
</nav>

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success</strong> {{ session('success') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

<!-- Content -->
<div class="col-lg-8 mb-5">
  <form method="POST" action="{{ url('/cms/struktur/post') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" id="user-id" name="user_id">
    <div class="mb-2">
      <label for="user_name" class="form-label">Nama Lengkap</label>
      <input type="text" name="user_name" class="form-control @error('user_name') is-invalid @enderror" id="user_name" autocomplete="on" value="{{ old('user_name') }}" autofocus>
      @error('user_name')
      <small class="invalid-feedback">{{ $message }}</small>
      @enderror
    </div>
    <div class="form-group">
      <label for="user_role">Jabatan</label>
      <select name="user_role" id="user_role" class="form-control @error('user_role') is-invalid @enderror">
        <option value="">-- Pilih jabatan --</option>
        <option value="kepala-sekolah">Kepala Sekolah</option>
        <option value="bendahara">Bendahara</option>
        <option value="guru">Guru</option>
        <option value="tata-usaha">Tata Usaha</option>
        <option value="operator">Operator</option>
      </select>
      @error('user_role')
      <small class="invalid-feedback">{{ $message }}</small>
      @enderror
    </div>
    <div class="mb-2">
      <label for="image" class="form-label">Gambar</label>
      <img class="img-preview img-fluid col-sm-5 mb-3">
      <input class="form-control @error('user_image') is-invalid @enderror" type="file" id="image" name="user_image" onchange="previewImage()">
      @error('user_image')
      <small class="invalid-feedback">{{ $message }}</small>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Tambah Staff</button>
  </form>
</div>

@endsection

@section('jquery')
<!-- JQUERY -->
<script>
  function previewImage() {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function (oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }

  $(function () {
    $("#user-id").val(localStorage.getItem("id_user"))
  })

</script>
@endsection
