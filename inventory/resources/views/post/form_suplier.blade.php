@extends('layouts.app')
@section('title', 'Buat Post Baru')
@section('content')
<div class="wrapper">
  <h1></h1>
  <a href="{{ route('supliers.index')}}"><button style="background:blue; margin:5px; padding:10px 5px; border-radius:5px; cursor: pointer;">Kembali</button></a>

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
    @csrf
    <form method="POST" action="{{ url('supliers') }}">
    @csrf
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-10">
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
        <div class="col-sm-8">
          <!-- text input -->
          <div class="form-group">
            <label>kode suplier</label>
            <input type="text" name="Kode_suplier" class="form-control" placeholder="Enter ...">
          </div>
          <!-- text input -->
          <div  class = "form-group">
            <label>Nama suplier</label>
            <input type="text" name="Nama_suplier" class="form-control" placeholder="Enter ...">
          </div>
          <!-- text input -->
          <div class="form-group">
            <label>Alamat suplier</label>
            <input type="text" name="Alamat_suplier" class="form-control" placeholder="Enter ...">
          </div>
       <!-- text input -->
          <div class="form-group">
            <label>No tlp</label>
            <input type="text" name="No_tlp" class="form-control" placeholder="Enter ...">
          </div>
          <!-- text input -->
          <div class="form-group">
            <label>Email</label>
            <input type="text" name="Email" class="form-control" placeholder="Enter ...">
          </div>
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
  <div class="card-body">
  <form method="POST" action="{{ url('supliers') }}">
    @csrf
    <input name="Kode_suplier" type="text" placeholder="Kode_suplier..."> 
    <input name="Nama_suplier" type="text" placeholder="Nama_suplier...">
    <input name="Alamat_suplier" type="text" placeholder="Alamat_suplier...">
    <input name="No_tlp" type="text" placeholder="No_tlp...">
    <input name="Email" type="text" placeholder="Email...">
    <button class="btn-blue">Submit</button>
  </form>
</div>
@endsection
