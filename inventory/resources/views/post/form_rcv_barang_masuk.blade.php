
@extends('layouts.app')
@section('title', 'Buat Post Baru')
@section('content')
<div class="wrapper">
  <h1></h1>
  <a href="{{ route('rcv_barang_masuks.index')}}"><button style="background:blue; margin:5px; padding:10px 5px; border-radius:5px; cursor: pointer;">Kembali</button></a>
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
  
  <form method="POST" action="{{ url('rcv_barang_masuks') }}">
    @csrf

    <form method="POST" action="{{ url('pembelians') }}">
    @csrf
      
<!-- general form elements disabled -->
 <!-- Google Font: Source Sans Pro -->
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- -->
  <!-- <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css"> -->
  <!-- Ionic -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <!-- <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"> -->
  <!-- iCheck -->
  <!-- <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css"> -->
  <!-- JQVMap -->
  <!-- <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars-->
  <!-- <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css"> -->
  <!-- Daterange picker--> 
  <!-- <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css"> -->
  <!-- summernote -->
  <!-- <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css"> -->
  <!-- link data table -->

   <!-- Google Font: Source Sans Pro--> 
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css"> -->
  <!-- DataTables -->
  <!-- <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css"> -->
  <!-- Theme styl e -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Jquery -->
  <!-- <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/jquery/jquery.min.css')}}"> -->
<!-- </head> -->
<div class="card card-warning">
  <div class="card-header">
    <h3 class="card-title">Form Rcv Barang</h3>
  </div>
  <!-- card-header -->
  <div class="card-body">
  <form method="POST" action="{{ url('rcv_barang_masuks') }}">
    @csrf
      <div class="row">
        <div class="col-sm-3">
          <!-- text input -->
          <div class="form-group">
            <label>No po</label>
            <!--
            <select type="text" name="No_po" class="form-control">
              <option value="none">Pilih po</option>  
            </select>
-->
            <select type="text" name="No_po" class="form-control" onchange="choose_po(this)">   
            <option value="none" class="page-data" data-tgl='+Tgl_po+'data-suplier='+Nama_suplier+'data-kode-barang='+Kode_barang+'data-nama-barang='+Nama_barang+'data-qty-po='+Qty_po+'data-satuan='+Satuan+'> pilih po </option>       
                          
          </select>

          </div>
         
          
          <div class="form-group">
            <label>Tgl_po</label>
            <input type="text" name="Tgl_po" class="form-control" placeholder="Enter ...">
          </div>

          <!-- text input -->
          <div class="form-group">
            <label>Nama_suplier</label>
            <input type="text" name="Nama_suplier" class="form-control" placeholder="Enter ...">
          </div>
          <!-- text input -->
          <div class="form-group">
            <label>Tgl_rcv</label>
            <input type="text" name="Tgl_rcv" class="form-control" placeholder="Enter ...">
          </div>

          <!-- text input -->
          <div class="form-group">
            <label>No_rcv</label>
            <input type="text" name="No_rcv" class="form-control" placeholder="Enter ...">
          </div>
            <!-- text input -->
            <div class="form-group">
            <label>Kode</label>
            <input type="text" name="Kode_barang" class="form-control" placeholder="Enter ...">
          </div>
            <!-- text input -->
            <div class="form-group">
            <label>Nama_barang</label>
            <input type="text" name="Nama_barang" class="form-control" placeholder="Enter ...">
          </div>

            <!-- text input -->
            <div class="form-group">
            <label>Qty_po</label>
            <input type="text" name="Qty_po" class="form-control" placeholder="Enter ...">
          </div>
            <!-- text input -->
            <div class="form-group">
            <label>Qty_rcv</label>
            <input type="text" name="Qty_rcv" class="form-control" placeholder="Enter ...">
          </div>
            <!-- text input -->
            <div class="form-group">
            <label>Satuan</label>
            <input type="text" name="Satuan" class="form-control" placeholder="Enter ...">
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
      <tr>
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
   list_po();
  });

  //pilih suplier
  function list_po() {
    let item = '';
    $.ajax({
      url: "/rcv_barang_masuks/list_po",
      type: "POST",
      data: {
     _token: $("[name=_token]").val(),
      },
      success: function(res) {
       console.log(res);
        var dataResult = JSON.parse(res);
        console.log(dataResult);
        $.each(dataResult.data, function(key, value) {
          ID_pembelian  = value.id;
          Tgl_po = value.Tgl_po;
          Nama_suplier = value.Nama_suplier;
          Kode_barang  = value.Kode_barang;
          Nama_barang = value.Nama_barang;
          Qty_po  = value.Qty_po;
          Satuan = value.Satuan;
          console.log(value);
          item += '<option value="' + ID_pembelian + '" class="page-data'+ID_pembelian+'" data-tgl='+Tgl_po+' data-suplier='+Nama_suplier+' data-kode-barang='+Kode_barang+' data-nama-barang='+Nama_barang+' data-qty-po='+Qty_po+' data-satuan='+Satuan+'>' + value.No_po + '</option>';
        
        });
        console.log(item);
        $("[name=No_po]").append(item);
      },
   });
  }
   //pilih suplier
   function choose_po(element){
    valueNopo = $("[name=No_po]").val();
    console.log($(".page-data"+valueNopo).data());
    elm = $(".page-data"+valueNopo).data();
    if(elm == undefined){
        $("[name=Tgl_po]").val("");
        $("[name=Nama_suplier]").val("");
        $("[name=Kode_barang]").val("");
        $("[name=Nama_barang]").val("");
        $("[name=Qty_po]").val("");
        $("[name=Satuan]").val("");
        return;
    }
    console.log(elm)
        Tgl = elm.tgl;
        suplier = elm.suplier; 
        Kode = elm.kodeBarang; 
        barang = elm.namaBarang; 
        Qty = elm.qtyPo; 
        satuan = elm.satuan;  
      $("[name=Tgl_po]").val(Tgl);
      $("[name=Nama_suplier]").val(suplier);
      $("[name=Kode_barang]").val(Kode);
      $("[name=Nama_barang]").val(barang);
      $("[name=Qty_po]").val(Qty);
      $("[name=Satuan]").val(satuan);

}
  //ahir suplier
</script>


</html>
@endsection