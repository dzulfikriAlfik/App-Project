<!-- Menghubungkan dengan view template cms -->
@extends('_layouts/cms')

@section('custom-header')

@endsection

{{-- Content --}}
@section('content')
<!-- Breadcrumb -->
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/cms/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Struktur Organisasi</li>
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


@endsection

@section('jquery')
<!-- JQUERY -->
@endsection
