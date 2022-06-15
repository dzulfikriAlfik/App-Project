@extends('layouts.app')
@section('title', 'Buat Post Baru')
@section('content')
<div class="wrapper">
  <h1>Buat Post Baru</h1>
  <a href="{{ route('permintaan_produksis.index')}}"><button style="background:blue; margin:5px; padding:10px 5px; border-radius:5px; cursor: pointer;">Kembali</button></a>
  @if (session('success'))
  <div class="alert-success">
    <p>{{ session('success') }}</p>
  </div>
  @endif
  
  @if ($errors->any())
  <div class="alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <form method="POST" action="{{ url('permintaan_produksis') }}">
    @csrf
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionic -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars-->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker--> 
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <!-- link data table -->

   <!-- Google Font: Source Sans Pro--> 
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme styl e -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<div class="card card-warning">
  <div class="card-header">
    <h3 class="card-title">Form Rcv Barang</h3>
  </div>
  <!-- card-header -->
  <div class="card-body">
      <div class="row">
        <div class="col-sm-5">
          <!-- text input -->
          <div class="form-group">
            <label>No permintaan</label>
            <input type="text" name="No_permintaan" class="form-control" placeholder="Enter ...">
          </div>
          <!-- text input -->
          <div  class = "form-group">
            <label>Nama suplier</label>
            <input type="text" name="Nama_suplier" class="form-control" placeholder="Enter ...">
          </div>
          <!-- text input -->
          <div class="form-group">
            <label>Tgl permintaan</label>
            <input type="text" name="Tgl_permintaan" class="form-control" placeholder="Enter ...">
          </div>
       <!-- text input -->
          <div class="form-group">
            <label>Nama_barang</label>
            <input type="text" name="Nama_barang" class="form-control" placeholder="Enter ...">
          </div>
          <!-- text input -->
          <div class="form-group">
            <label>Qty barang</label>
            <input type="text" name="Qty_barang" class="form-control" placeholder="Enter ...">
          </div>
          <!-- text input -->
          <div class="form-group">
            <label>Satuan barang</label>
            <input type="text" name="Satuan_barang" class="form-control" placeholder="Enter ...">
          </div>
            <!-- text input -->
        </div>
        </div>
        </div>
        </div>
      </div>
      <div>
      </div>
        </div>
      </div>
        <td>
          <div class="col-sm-2">
            <button type="submit" name="submit" class="btn btn-block btn-warning">simpan</button>
          </div>
        </td>
    </form>
  </div>
</div>
</html>
<!--
  <form method="POST" action="{{ url('permintaan_produksis') }}">
    @csrf
    <input name="No_permintaan" value="" type="text" placeholder="No_permintaan..."> 
    <input name="Nama_suplier" value="" type="text" placeholder="Nama_suplier...">
    <input name="Tgl_permintaan" value="" type="text" placeholder="Tgl_permintaan...">
    <input name="Nama_barang" value="" type="text" placeholder="Nama_barang...">
    <input name="Qty_barang" value="" type="text" placeholder="Qty_barang...">
    <input name="Satuan_barang" value="" type="text" placeholder="Satuan_barang...">
    <button class="btn-blue">Submit</button>
  </form>
</div>
@endsection