<!-- Menghubungkan dengan view template cms -->
@extends('_layouts/cms')

@section('custom-header')
<link href="{{ asset('assets/vendors/simplemde/simplemde.min.css') }}" rel="stylesheet" />
@endsection

{{-- Content --}}
@section('content')
<!-- Breadcrumb -->
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/cms/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Profile Lembaga</li>
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
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <form class="forms-sample" method="POST" action="{{ url('/cms/edit_profile_lembaga') }}">
          @csrf
          <input type="hidden" name="id" id="id" value="{{ $lembaga->id }}">
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" rows="5">{{ old('alamat', $lembaga->alamat) }}</textarea>
          </div>
          <div class="form-group">
            <label for="no_hp">No. HP</label>
            <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" id="no_hp" placeholder="No. HP" value="{{ old('no_hp', $lembaga->no_hp) }}">
            @error('no_hp')
            <small class="invalid-feedback">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" autocomplete="off" placeholder="Email" value="{{ old('email', $lembaga->email) }}">
            @error('email')
            <small class="invalid-feedback">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group">
            <label for="visi">Visi</label>
            <textarea class="form-control @error('visi') is-invalid @enderror" name="visi" id="visi" rows="5">{{ old('visi', $lembaga->visi) }}</textarea>
            @error('visi')
            <small class="invalid-feedback">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group">
            <label for="misi">Misi</label>
            <textarea class="form-control @error('misi') is-invalid @enderror" name="misi" id="misi" rows="5">{{ old('misi', $lembaga->misi) }}</textarea>
            @error('misi')
            <small class="invalid-feedback">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group">
            <label for="tentang-kami">Tentang Kami</label>
            <textarea class="form-control @error('tentang_kami') is-invalid @enderror" name="tentang_kami" id="tentang-kami" rows="5">{{ old('tentang_kami', $lembaga->tentang_kami) }}</textarea>
            @error('tentang_kami')
            <small class="invalid-feedback">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group">
            <label for="sejarah">Sejarah</label>
            <textarea class="form-control @error('sejarah') is-invalid @enderror" name="sejarah" id="sejarah" rows="5">{{ old('sejarah', $lembaga->sejarah) }}</textarea>
            @error('sejarah')
            <small class="invalid-feedback">{{ $message }}</small>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection

@section('jquery')
<!-- JQUERY -->
<script src="{{ asset('assets/vendors/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('assets/vendors/simplemde/simplemde.min.js') }}"></script>
<script src="{{ asset('assets/vendors/ace-builds/src-min/ace.js') }}"></script>
<script src="{{ asset('assets/vendors/ace-builds/src-min/theme-chaos.js') }}"></script>
<script src="{{ asset('assets/js/tinymce.js') }}"></script>
<script src="{{ asset('assets/js/simplemde.js') }}"></script>
<script src="{{ asset('assets/js/ace.js') }}"></script>
@endsection
