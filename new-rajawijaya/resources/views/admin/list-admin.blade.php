@extends("layouts.admin")

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="mb-2 row">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Data Admin</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/company_data">Profil Perusahaan</a></li>
            <li class="breadcrumb-item text-muted"><a href="#">Data Admin</a></li>
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
            @if ($user->id == 1)
            <div class="card-header">
              <a href="{{ url('admin/list/add') }}" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Tambah</a>
            </div>
            @endif

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped my-table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama Admin</th>
                    <th>Alamat</th>
                    <th>No. Telp.</th>
                    <th>Email</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($list_admin as $admin)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $admin->nama }}</td>
                    <td>{{ $admin->alamat }}</td>
                    <td>{{ $admin->telp }}</td>
                    <td>{{ $admin->email }}</td>
                    <td class="text-center">
                      @if ($user->id != 1)
                      anda bukan superadmin
                      @else
                      <a href="{{ url("admin/list/{$admin->id}/edit") }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a>
                      <a href="{{ url("admin/{$admin->id}/delete") }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data ini?')"><i class="fas fa-trash"></i> Hapus</a>
                      @endif
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
