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
    <li class="breadcrumb-item active" aria-current="page">Edit gallery</li>
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
  <form action="{{ url('/cms/gallery/update') . '/' . $gallery->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="media d-block d-sm-flex">
            {{-- show image modal --}}

            {{-- show image modal --}}
            <a href="#" class="align-self-center">
              <img src="{{ url("/storage") . "/" . $gallery->image }}" class="img-preview mr-4 wd-100p wd-sm-350 mb-3 mb-sm-0 mr-3">
            </a>
            <div class="media-body">
              <div class="table-responsive">
                <table class="table mt-3">
                  <input type="hidden" value="{{ $gallery->id }}">
                  <input type="hidden" id="user-id" name="user_id">
                  <input type="hidden" name="old_image" value="{{ $gallery->image }}">
                  <tbody>
                    <tr>
                      <td class="left">Judul</td>
                      <td class="colon">:</td>
                      <td>
                        <input type="text" class="form-control" name="title" id="title" value="{{ $gallery->title }}">
                      </td>
                    </tr>
                    <tr>
                      <td class="left">Deskripsi</td>
                      <td class="colon">:</td>
                      <td>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="5">{{ $gallery->description }}</textarea>
                      </td>
                    </tr>
                    <tr>
                      <td class="left">Tanggal kegiatan</td>
                      <td class="colon">:</td>
                      <td>
                        <div class="input-group date datepicker" id="tanggal-kegiatan">
                          <input type="text" readonly class="form-control" name="gallery_date" id="gallery_date" value="{{ $gallery->gallery_date }}"><span class="input-group-addon"><i data-feather="calendar"></i></span>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="left">Dibuat pada</td>
                      <td class="colon">:</td>
                      <td>{{ humanizeTime($gallery->created_date) . " - " . dateTimeFormat($gallery->created_date) }}</td>
                    </tr>
                    <tr>
                      <td class="left">Ubah gambar</td>
                      <td class="colon">:</td>
                      <td>
                        <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
                      </td>
                    </tr>
                    <tr>
                      <td class="left">
                        <button type="submit" class="btn btn-primary">Edit Gallery</button>
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
  if ($('#tanggal-kegiatan').length) {
    var date = new Date($("#gallery_date").val());
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
