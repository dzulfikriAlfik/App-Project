@extends('layouts.app')
@section('title', 'Buat Post Baru')
@section('content')
<div class="wrapper">
<a href="{{ route('barang_keluars.index')}}"><button style="background:blue; margin:5px; padding:10px 5px; border-radius:5px; cursor: pointer;">Kembali</button></a>
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
  <form method="POST" action="{{ url('barang_keluars') }}">
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
    <h3 class="card-title"></h3>
  </div>
  <!-- card-header -->
  <div class="card-body">
      <div class="row">
        <div class="col-sm-5">
          <!-- text input -->
          <div class="form-group">
            <label>No_bon</label>
            <input type="text" name="No_bon" class="form-control" placeholder="Enter ...">
          </div>
          <!-- text input -->
          <div  class = "form-group">
            <label>Tgl</label>
            <input type="text" name="Tgl" class="form-control" placeholder="Enter ...">
          </div>
          <!-- text input -->
          <div class="form-group">
            <label>Kode</label>
            <select type="text" name="Kode_barang" class="form-control" onchange="choose_barangkeluar(this)">   
            <option value="none" class="page-data" data-namabarang='+Nama_barang+'data-satuan='+Satuan+'> pilih kode </option>       
                          
          </select>

            
          </div>
       <!-- text input -->
          <div class="form-group">
            <label>Nama_barang</label>
            <input type="text" name="Nama_barang" class="form-control" placeholder="Enter ...">
          </div>
          <!-- text input -->
          <div class="form-group">
            <label>Satuan</label>
            <input type="text" name="Satuan" class="form-control" placeholder="Enter ...">
          </div>
          <!-- text input -->
          <div class="form-group">
            <label>Qty</label>
            <input type="text" name="Qty" class="form-control" placeholder="Enter ...">
          </div>
            <!-- text input -->
            <div class="form-group">
            <label>Keterangan</label>
            <input type="text" name="Keterangan" class="form-control" placeholder="Enter ...">
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

<script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
<script>
  $(document).ready(function() {
    console.log('tes'); //menampilkan pilihan
   list_barangkeluar();
  });

  //pilih suplier
  function list_barangkeluar() {
    let item = '';
    $.ajax({
      url: "/barang_keluars/list_barangkeluar",
      type: "POST",
      data: {
     _token: $("[name=_token]").val(),
      },
      success: function(res) {
       console.log(res);
        var dataResult = JSON.parse(res);
        console.log(dataResult);
        $.each(dataResult.data, function(key, value) {
          ID_rcv  = value.id;
          Nama_barang = value.Nama_barang;
          Satuan = value.Satuan;
          console.log(value);
          item += '<option value="' + ID_rcv + '" class="page-data'+ID_rcv+'" data-namabarang='+Nama_barang+' data-satuan='+Satuan+'>' + value.Kode_barang + '</option>';
        
        });
        console.log(item);
        $("[name=Kode_barang]").append(item);
      },
   });
  }
   //pilih suplier
   function choose_barangkeluar(element){
    valueKode = $("[name=Kode_barang]").val();
    console.log($(".page-data"+valueKode).data());
    elm = $(".page-data"+valueKode).data();
    if(elm == undefined){
        $("[name=Nama_barang]").val("");
        $("[name=Satuan]").val("");
        return;
    }
    console.log(elm)
        namabarang = elm.namabarang;
        satuan = elm.satuan; 
         
      $("[name=Nama_barang]").val(namabarang);
      $("[name=Satuan]").val(satuan);
     
}
  //ahir suplier
</script>

</html>

    <!--
    <input name="No_bon" type="text" placeholder="No_bon..."> 
    <input name="Tgl" type="text" placeholder="Tgl...">
    <input name="Kode" type="text" placeholder="Kode...">
    <input name="Nama_barang" type="text" placeholder="Nama_barang...">
    <input name="Satuan" type="text" placeholder="Satuan...">
    <input name="Qty" type="text" placeholder="Qty...">
    <input name="Keterangan" type="text" placeholder="Keterangan..."> 
    <button class="btn-blue">Submit</button>
  </form>
</div>
@endsection