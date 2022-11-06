<!-- Menghubungkan dengan view template cms -->
@extends('_layouts/cms')

@section("custom-header")
@endsection

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

<a href="{{ url('/cms/struktur/add') }}" class="btn btn-info mb-3 text-white"><i data-feather="plus" class="feather-16"></i> Tambah</a>

<!-- Content -->
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>Photo</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
              <tr>
                <td class="text-center" style="width: 20%">
                  <img src="{{ url('/storage') ."/" . $user->user_image }}" class="img-rounded img-thumbnail" style="height:100px;width:100px" alt="">
                </td>
                <td class="text-center" style="width: 20%">{{ $user->user_name }}</td>
                <td class="text-center" style="width: 20%">{{ jabatan($user->user_role) }}</td>
                <td style="width: 15%">
                  <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Action
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a href="{{ url("/cms/struktur/detail") . "/" . $user->user_id }}" class='btn btn-light btn-xs dropdown-item'><i class='fa fa-eye feather-16'></i> Lihat Detail
                      </a>
                      <a href="{{ url("/cms/struktur/edit") . "/" . $user->user_id }}" class='btn btn-light btn-xs dropdown-item'><i class='fa fa-pencil feather-16'></i> Edit
                      </a>
                      <a href="{{ url("/cms/struktur/delete") . "/" . $user->user_id }}">
                        <button type='button' class='btn btn-light btn-xs dropdown-item' onclick="return confirm('Yakin hapus data ini?')"><i class='fa fa-trash feather-16'></i> Hapus
                        </button>
                      </a>
                    </div>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('jquery')
<!-- JQUERY -->
<script src="{{ asset('assets/vendors/datatables-net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/vendors/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endsection
