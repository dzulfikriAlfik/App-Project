<!-- Menghubungkan dengan view template cms -->
@extends('_layouts/cms')

@section('custom-header')
@endsection

{{-- Content --}}
@section('content')
<!-- Breadcrumb -->
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/cms/berita') }}">Berita</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tambah Berita</li>
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
  <form method="POST" action="{{ url('/cms/berita/post') }}" enctype="multipart/form-data">
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
    <button type="submit" class="btn btn-primary">Tambah Berita</button>
  </form>
</div>

@endsection

@section('jquery')
<!-- JQUERY -->
<script>
  $(function () {
    $("#user-id").val(localStorage.getItem("id_user"))
  })

</script>
@endsection
