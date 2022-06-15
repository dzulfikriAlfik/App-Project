@extends('layouts.app')
@section('title', 'Semua Post')
@section('content')
<div class="wrapper">
  <h1 style="text-align: center;"></h1>
  <a href="{{ route('rcv_barang_masuks.create')}}"><button style="background:blue; margin:5px; padding:10px 5px; border-radius:5px; cursor: pointer;">Tambah</button></a>


<!-- mulai -->

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

 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">

              <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Form data barang masuk</h3>
              </div>
                <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
          
                    <th>No_po</th>
                    <th>Tgl_po</th>
                    <th>Nama_suplier</th>
                    <th>Tgl_rcv</th>
                    <th>No_rcv</th>
                    <th>Kode</th>
                    <th>Nama_barang</th>
                    <th>Qty_po</th>
                    <th>Qty_rcv</th>
                    <th>Satuan</th>
                    <th>Keterangan</th>
                    <th>Aksi </th>
                  </tr>
                  </thead>
                  <body>
                    <tbody>
                  @foreach ($rcv_barang_masuks as $post)
      <tr> 
        <td style="width: 200px" >{{ $post->No_po}}</td>
        <td style="width: 500px" >{{ $post->Tgl_po }}</td>
        <td style="width: 500px" >{{ $post->Nama_suplier }}</td>
        <td style="width: 500px" >{{ $post->Tgl_rcv }}</td>
        <td style="width: 500px" >{{ $post->No_rcv }}</td>
        <td style="width: 500px" >{{ $post->Kode }}</td>
        <td style="width: 500px" >{{ $post->Nama_barang }}</td>
        <td style="width: 500px" >{{ $post->Qty_po }}</td>
        <td style="width: 500px" >{{ $post->Qty_rcv }}</td>
        <td style="width: 500px" >{{ $post->Satuan }}</td>
        <td style="width: 500px" >{{ $post->Keterangan }}</td>
        <td style="width: 100px"> <a href= "http://localhost:8000/rcv_barang_masuks/{{ $post->id}}/edit"><button class="btn-green">Edit</button></a></td>
        <form method="POST" action="{{ url('rcv_barang_masuks', $post->id ) }}"> 
        @csrf
        @method('DELETE')
        <td style="width: 100px">   
        <a href= "http://localhost:8000/rcv_barang_masuks/{{ $post->id}}"><button class="btn-red">Hapus</button></td>
        </form>
    </tr>
    @endforeach
    </tbody>
       
                    
               
    
<!--ahir isi -->
    </body>
  </tfoot>
  </table>
</div>
      </div>



















<!--ahir-->

