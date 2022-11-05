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
    <li class="breadcrumb-item"><a href="{{ url('/cms/masukan') }}">Masukan</a></li>
    <li class="breadcrumb-item active" aria-current="page">Detail Masukan</li>
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
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="media d-block d-sm-flex">
          <div class="media-body">
            <div class="table-responsive">
              <table class="table mt-3">
                <tbody>
                  <tr>
                    <td class="left">Nama</td>
                    <td class="colon">:</td>
                    <td>{{ $masukan->name }}</td>
                  </tr>
                  <tr>
                    <td class="left">Email</td>
                    <td class="colon">:</td>
                    <td>{{ $masukan->email }}</td>
                  </tr>
                  <tr>
                    <td class="left">Subjek</td>
                    <td class="colon">:</td>
                    <td>{{ $masukan->subject }}</td>
                  </tr>
                  <tr>
                    <td class="left">Pesan</td>
                    <td class="colon">:</td>
                    <td class="desc">{!! wordwrap($masukan->message,80,"<br>\n") !!}</td>
                  </tr>
                  <tr>
                    <td class="left">Pesan masuk pada</td>
                    <td class="colon">:</td>
                    <td>{{ humanizeTime($masukan->created_full_date) . " - " . dateTimeFormat($masukan->created_date) }}</td>
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
