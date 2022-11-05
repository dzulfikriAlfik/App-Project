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
    <li class="breadcrumb-item"><a href="{{ url('/cms/berita') }}">Berita</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Berita</li>
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
  <form action="{{ url('/cms/berita/update') . '/' . $berita->id }}" method="POST">
    @csrf
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="media d-block d-sm-flex">
            <div class="media-body">
              <div class="table-responsive">
                <table class="table mt-3">
                  <input type="hidden" id="user-id" name="user_id">
                  <tbody>
                    <tr>
                      <td class="left">Judul</td>
                      <td class="colon">:</td>
                      <td>
                        <input type="text" class="form-control" name="title" id="title" value="{{ $berita->title }}">
                      </td>
                    </tr>
                    <tr>
                      <td class="left">Deskripsi</td>
                      <td class="colon">:</td>
                      <td>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ $berita->description }}</textarea>
                      </td>
                    </tr>
                    <tr>
                      <td class="left">
                        <button type="submit" class="btn btn-primary">Edit Berita</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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
