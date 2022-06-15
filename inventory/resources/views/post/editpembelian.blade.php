@extends('layouts.app')
@section('title', 'pembelian Edit')
@section('content')
<div class="wrapper">
  <h1>Edit pembelian</h1>
  
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
  <a href="{{ route('pembelians.index')}}"><button style="background:blue; margin:5px; padding:10px 5px; border-radius:5px; cursor: pointer;">Kembali</button></a>


  <form method="POST" action="{{ url('pembelians') }}">
    @csrf
      
<!-- general form elements disabled -->
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
  <form method="POST" action="{{ url('pembelians',$post->id ) }}">

<!--  <form method="POST" action="{{ url('pembelians') }}"> -->
    @csrf
      <div class="row">
        <div class="col-sm-4">
          <!-- text input -->
          <div class="form-group">
            <label>No_po</label>
            <input name="No_po" value="{{ $post->No_po }}" type="text" placeholder="No_po..."> 
          </div>
          <!-- text input -->
          <div  class = "form-group">
            <label>Tgl_po</label>
            <input name="Tgl_po" value="{{ $post->Tgl_po }}" type="text" placeholder="Tgl_po...">
          </div>
          <!-- text input -->
          <div class="form-group">
            <label>Suplier</label>
            <input name="Suplier" value="{{ $post->Suplier }}" type="text" placeholder="Suplier...">
          </div>
       <!-- text input -->
          <div class="form-group">
            <label>Kode_barang</label>
            <input name="Kode_barang" value="{{ $post->Kode_barang }}" type="text" placeholder="Kode_barang...">
          </div>
          <!-- text input -->
          <div class="form-group">
            <label>Nama_barang</label>
            <input name="Nama_barang" value="{{ $post->Nama_barang }}" type="text" placeholder="Nama_barang...">
          </div>
          </div>
          <!-- text input -->
          <div class="col-sm-4">
          <div class="form-group">
            <label>Satuan</label>
            <input name="Satuan" value="{{ $post->Satuan }}" type="text" placeholder="Satuan...">
          </div>
            <!-- text input -->
            <div class="form-group">
            <label>Qty_po</label>
            <input name="Qty_po" value="{{ $post->Qty_po }}" type="text" placeholder="Qty_po...">
          </div>
            <!-- text input -->
            <div class="form-group">
            <label>Harga_satuan</label>
            <input name="Harga_satuan" value="{{ $post->Harga_satuan }}" type="text" placeholder="Harga_satuan...">
          </div>
            <!-- text input -->
            <div class="form-group">
            <label>Total_harga</label>
            <input name="Total_harga" value="{{ $post->Total_harga }}" type="text" placeholder="Total_harga...">
    
            </div>
        </div>
        </div>
        </div>
        </div>
      </div>
      <div>
      </div>
      <div class="row">
        <div class="col-sm-6">
        </div>
      </div>
      <tr>
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
  <form method="POST" action="{{ url('pembelians',$post->id ) }}">
    @csrf
    @method('PUT')
    <p>
    <label>No_po:</label>
    <input name="No_po" value="{{ $post->No_po }}" type="text" placeholder="No_po..."> 
    </p>
    <p>
    <label>Tgl_po:</label>
    <input name="Tgl_po" value="{{ $post->Tgl_po }}" type="text" placeholder="Tgl_po...">
    </p>
    <p>
    <label>Suplier:</label>
    <input name="Suplier" value="{{ $post->Suplier }}" type="text" placeholder="Suplier...">
    </p>
    <p>
    <label>Kode_barang:</label>
    <input name="Kode_barang" value="{{ $post->Kode_barang }}" type="text" placeholder="Kode_barang...">
    </p>
   
    <p>
    <label>Nama_Barang:</label>
    <input name="Nama_barang" value="{{ $post->Nama_barang }}" type="text" placeholder="Nama_barang...">
    </p>
    <p>
    <label>Satuan:</label>
    <input name="Satuan" value="{{ $post->Satuan }}" type="text" placeholder="Satuan...">
    </p>
    <p>
    <label>Qty_po:</label>
    <input name="Qty_po" value="{{ $post->Qty_po }}" type="text" placeholder="Qty_po...">
    </p>
    <p>
    <label>Harga_Satuan:</label>
    <input name="Harga_satuan" value="{{ $post->Harga_satuan }}" type="text" placeholder="Harga_satuan...">
    </p>
    <p>
    <label>Total_harga:</label>
    <input name="Total_harga" value="{{ $post->Total_harga }}" type="text" placeholder="Total_harga...">
    </p>
    <button class="btn-blue">Submit</button>
  </form>
</div>
@endsection

