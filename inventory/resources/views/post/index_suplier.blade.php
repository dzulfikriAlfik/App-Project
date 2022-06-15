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
<a href="{{ route('supliers.create')}}"><button style="background:blue; margin:5px; padding:10px 5px; border-radius:5px; cursor: pointer;">Tambah</button></a>    
 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-8">
            <div class="card">
              <div class="card-header">

              <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Data Suplier</h3>
              </div>
                <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    
                    
                    <th>Kode_suplier</th>
                    <th>Nama_suplier</th>
                    <th>Alamat</th>
                    <th>No_tlp</th>
                    <th>Email</th>
                    <th>Aksi </th>
                  </tr>
                  </thead>
                  <body>
                    <tbody>
                    @foreach ($supliers as $post)       
      <tr>  
      <tr>
      <td style="width: 200px" >{{ $post->Kode_suplier}}</td>
        <td style="width: 500px" >{{ $post->Nama_suplier }}</td>
        <td style="width: 500px" >{{ $post->Alamat }}</td>
        <td style="width: 500px" >{{ $post->No_tlp }}</td>
        <td style="width: 500px" >{{ $post->Email }}</td>
        
        <td style="width: 100px"> <a href= "http://localhost:8000/barang_keluars/{{ $post->id}}/edit"><button class="btn-green">Edit</button></a></td>
        <form method="POST" action="{{ url('barang_keluars', $post->id ) }}"> 
        @csrf
        @method('DELETE')
        <td style="width: 100px">   
        <a href= "http://localhost:8000/barang_keluars/{{ $post->id}}"><button class="btn-red">Hapus</button></td>
        </form>
    </tr>
    @endforeach
    </tbody>
                  <tr>
                   </tr>                
                    </body>
                  </tfoot>
                  </table>
                </div>
                      </div>











