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
    <li class="breadcrumb-item active" aria-current="page">Pesan masukan</li>
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
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Subjek</th>
                <th>Tanggal masuk</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($masukan as $item)
              <tr>
                <td class="text-center">{{ $item->name }}</td>
                <td class="text-center">{{ $item->subject }}</td>
                <td class="text-center">{{ dateTimeFormat($item->created_date) }}</td>
                <td>
                  <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Action
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a href="{{ url("/cms/masukan/detail") . "/" . $item->id }}" class='btn btn-light btn-xs dropdown-item'><i class='fa fa-eye feather-16'></i> Lihat Detail
                      </a>
                      <a href="{{ url("/cms/masukan/delete") . "/" . $item->id }}">
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
