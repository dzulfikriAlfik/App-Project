@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="mb-2 row">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Chat Mitra</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Chat</a></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary card-outline">

            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped my-table">
                <thead>
                  <tr>
                    <th>Mitra</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($list_mitra as $mitra)
                  <tr>
                    <td>{{ $mitra->nama }}</td>
                    <td class="text-center">
                      <a href="{{ url("mitra/chat/{$mitra->id}") }}" class="btn btn-xs btn-info"><i class="fas fa-eye"></i> Lihat</a>
                      <a href="{{ url("mitra/chat/{$mitra->id}/send") }}" class="btn btn-xs btn-warning"><i class="fas fa-paper-plane"></i> Kirim Pesan</a>
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
