<!-- Menghubungkan dengan view template cms -->
@extends('_layouts/cms')

@section('custom-header')
<style>
  td.desc {
    line-height: 25px;
  }

  td {
    height: 40px;
  }

  .left {
    width: 170px;
  }

  .colon {
    width: 10px
  }

</style>
@endsection

{{-- Content --}}
@section('content')
<!-- Breadcrumb -->
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/cms/gallery') }}">Gallery</a></li>
    <li class="breadcrumb-item active" aria-current="page">Detail gallery</li>
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

{{-- <div class="modal fade bd-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content">
      <img src="{{ url("/storage") . "/" . $gallery->image }}" class="align-self-center">
</div>
</div>
</div> --}}

<!-- Content -->
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="media d-block d-sm-flex">
          {{-- show image modal --}}

          {{-- show image modal --}}
          <a href="#" data-toggle="modal" class="align-self-center" data-target=".bd-example-modal-md">
            <img src="{{ url("/storage") . "/" . $gallery->image }}" class="mr-4 wd-100p wd-sm-350 mb-3 mb-sm-0 mr-3" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="top" data-content="Clik untuk melihat gambar penuh">
          </a>
          <div class="media-body">
            <div class="table-responsive">
              <table class="table mt-3">
                <tbody>
                  <tr>
                    <td class="left">Judul</td>
                    <td class="colon">:</td>
                    <td>{{ $gallery->title }}</td>
                  </tr>
                  <tr>
                    <td class="left">Deskripsi</td>
                    <td class="colon">:</td>
                    <td class="desc">{!! wordwrap($gallery->description,60,"<br>\n") !!}</td>
                  </tr>
                  <tr>
                    <td class="left">Tanggal kegiatan</td>
                    <td class="colon">:</td>
                    <td>{{ dateTimeFormat($gallery->gallery_date) }}</td>
                  </tr>
                  <tr>
                    <td class="left">Dibuat pada</td>
                    <td class="colon">:</td>
                    <td>{{ humanizeTime($gallery->created_date) . " - " . dateTimeFormat($gallery->created_date) }}</td>
                  </tr>
                  <tr>
                    <td class="left">Diunggah oleh</td>
                    <td class="colon">:</td>
                    <td>{{ $gallery->user_name }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

@endsection

@section('jquery')
<!-- JQUERY -->
@endsection
