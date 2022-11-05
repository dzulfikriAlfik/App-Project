<!-- Menghubungkan dengan view template cms -->
@extends('_layouts/cms')

@section('custom-header')
<link href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
@endsection

{{-- Content --}}
@section('content')
<!-- Breadcrumb -->
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/cms/gallery') }}">Gallery</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tambah Gallery</li>
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
  <form method="POST" action="{{ url('/cms/gallery/post') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" id="user-id" name="user_id">
    <div class="mb-2">
      <label for="title" class="form-label">Judul</label>
      <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" autocomplete="on" value="{{ old('title') }}" autofocus>
      @error('title')
      <small class="invalid-feedback">{{ $message }}</small>
      @enderror
    </div>
    <div class="form-group">
      <label for="description">Deskripsi</label>
      <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="5">{{ old('description') }}</textarea>
      @error('description')
      <small class="invalid-feedback">{{ $message }}</small>
      @enderror
    </div>
    <div class="mb-2">
      <label for="gallery_date" class="form-label">Tanggal Kegiatan</label>
      <div class="input-group date datepicker" id="tanggal-kegiatan">
        <input type="text" readonly class="form-control @error('gallery_date') is-invalid @enderror" name="gallery_date" id="gallery_date" value="{{ old("gallery_date") }}"><span class="input-group-addon"><i data-feather="calendar"></i></span>
      </div>
      @error('gallery_date')
      <small class="invalid-feedback">{{ $message }}</small>
      @enderror
    </div>
    <div class="mb-2">
      <label for="image" class="form-label">Gambar</label>
      <img class="img-preview img-fluid col-sm-5 mb-3">
      <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
      @error('image')
      <small class="invalid-feedback">{{ $message }}</small>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Tambah Gallery</button>
  </form>
</div>

@endsection

@section('jquery')
<!-- JQUERY -->
<script src="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
{{-- <script src="{{ asset('assets/js/datepicker.js') }}"></script> --}}
<script>
  if ($('#tanggal-kegiatan').length) {
    var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    $('#tanggal-kegiatan').datepicker({
      format: "dd MM yyyy",
      todayHighlight: true,
      autoclose: true
    });
    $('#tanggal-kegiatan').datepicker('setDate', today);
  }

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
