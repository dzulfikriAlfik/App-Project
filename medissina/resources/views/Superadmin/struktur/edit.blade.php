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
    <li class="breadcrumb-item"><a href="{{ url('/cms/struktur') }}">Staff</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Staff</li>
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
  <form action="{{ url('/cms/struktur/update') . '/' . $user->user_id }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="media d-block d-sm-flex">
            {{-- show image modal --}}

            {{-- show image modal --}}
            <a href="#" class="align-self-center">
              <img src="{{ url("/storage") . "/" . $user->user_image }}" class="img-preview mr-4 wd-100p wd-sm-350 mb-3 mb-sm-0 mr-3">
            </a>
            <div class="media-body">
              <div class="table-responsive">
                <table class="table mt-3">
                  <input type="hidden" name="staff_id" value="{{ $user->user_id }}">
                  <input type="hidden" id="user-id" name="user_id">
                  <input type="hidden" name="old_image" value="{{ $user->user_image }}">
                  <tbody>
                    <tr>
                      <td class="left">Nama</td>
                      <td class="colon">:</td>
                      <td>
                        <input type="text" class="form-control" name="user_name" id="user_name" value="{{ $user->user_name }}">
                        @error('user_name')
                        <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                      </td>
                    </tr>
                    <tr>
                      <td class="left">Jabatan</td>
                      <td class="colon">:</td>
                      <td>
                        <select name="user_role" id="user_role" class="form-control @error('user_role') is-invalid @enderror">
                          <option value="">-- Pilih jabatan --</option>
                          @foreach ($roles as $role)
                          @if ($role === $user->user_role)
                          <option value="{{ $role }}" selected>{{ jabatan($role) }}</option>
                          @else
                          <option value="{{ $role }}">{{ jabatan($role) }}</option>
                          @endif
                          @endforeach
                        </select>
                        @error('user_role')
                        <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                      </td>
                    </tr>
                    <tr>
                      <td class="left">Ubah foto</td>
                      <td class="colon">:</td>
                      <td>
                        <input class="form-control" type="file" id="image" name="user_image" onchange="previewImage()">
                      </td>
                    </tr>
                    <tr>
                      <td class="left">
                        <button type="submit" class="btn btn-primary">Edit Staff</button>
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
