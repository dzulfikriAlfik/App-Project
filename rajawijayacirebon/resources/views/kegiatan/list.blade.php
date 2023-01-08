@extends("layouts.admin")

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="mb-2 row">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Data Kegiatan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('admin/company-profile') }}">Profil Perusahaan</a></li>
            <li class="breadcrumb-item text-muted"><a href="#">Data Kegiatan</a></li>
          </ol>
        </div>
      </div>
      <!-- alert -->
      @if (session()->has('success'))
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
      </div>
      @endif
      <!-- alert -->
    </div>
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <a href="{{ url('kegiatan/list/add') }}" class="btn btn-xs btn-info"><i class="fas fa-plus"></i> Tambah</a>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped my-table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama Kegiatan</th>
                    <th>Keterangan</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($galleries as $gallery)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $gallery->nama_kegiatan }}</td>
                    <td>{{ $gallery->keterangan }}</td>
                    <td>{{ tgl_indo($gallery->tanggal) }}</td>
                    <td class="text-center">
                      <a href="{{ url("kegiatan/list/{$gallery->id}/show") }}" class="btn btn-xs btn-info"><i class="fas fa-eye"></i> Lihat</a>
                      <a href="{{ url("kegiatan/list/{$gallery->id}/edit") }}" class="btn btn-xs btn-warning"><i class="fas fa-edit"></i> Edit</a>
                      <a href="{{ url("kegiatan/{$gallery->id}/delete") }}" class="btn btn-xs btn-danger" onclick="return confirm('Yakin hapus data ini?')"><i class="fas fa-trash"></i> Hapus</a>
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
  </div>

</div>
@endsection
