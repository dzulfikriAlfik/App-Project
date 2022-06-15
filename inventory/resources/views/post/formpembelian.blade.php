@extends('layouts.app')
@section('title', 'Buat Post Baru')
@section('content')
<div class="wrapper">
   <h1></h1>
   <a href="{{ route('pembelians.index')}}"><button style="background:blue; margin:5px; padding:10px 5px; border-radius:5px; cursor: pointer;">Kembali</button></a>

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
         <form method="POST" action="{{ url('pembelians') }}">
            @csrf
            <div class="row">
               <div class="col-sm-4">
                  <!-- text input -->
                  <div class="form-group">
                     <label>No_po</label>
                     <input type="text" name="No_po" class="form-control" placeholder="Enter ...">
                  </div>
                  <!-- text input -->
                  <div class="form-group">
                     <label>Tgl_po</label>
                     <input type="text" name="Tgl_po" class="form-control" placeholder="Enter ...">
                  </div>
                  <!-- text input -->
                  <div class="form-group">
                     <label>Nama_suplier</label>
                     <select type="text" name="Nama_suplier" class="form-control">
                        <option value="none">Pilih suplier</option>
                     </select>
                  </div>
                  <!-- text input -->
                  <div class="form-group">
                     <label>Kode_barang</label>
                     <select type="text" name="Kode_barang" class="form-control" onchange="choose_product(this)">
                        <option value="none" class="page-data" data-nama='none' data-harga='none'>Pilih kode barang</option>
                     </select>
                  </div>
                  <!-- text input -->
                  <div class="form-group">
                     <label>Nama_barang</label>
                     <input type="text" name="Nama_barang" class="form-control" placeholder="Enter ...">
                  </div>
               </div>
               <!-- text input -->
               <div class="col-sm-4">
                  <div class="form-group">
                     <label>Satuan</label>
                     <input type="text" name="Satuan" class="form-control" placeholder="Enter ...">
                  </div>
                  <!-- text input -->
                  <div class="form-group">
                     <label>Qty_po</label>
                     <input type="text" name="Qty_po" class="form-control" placeholder="Enter ...">
                  </div>
                  <!-- text input -->
                  <div class="form-group">
                     <label>Harga_satuan</label>
                     <input type="text" name="Harga_satuan" class="form-control" placeholder="Enter ...">
                  </div>
                  <!-- text input -->
                  <div class="form-group">
                     <label>Total_harga</label>
                     <input type="text" name="Total_harga" class="form-control" placeholder="Enter ...">
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
   <script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
   <script>
      $(document).ready(function () {
         console.log('tes');
         list_product(); //menampilkan pilihan
         //  list_suplier();
      });

      function list_product() {
         let item = '';
         $.ajax({
            url: "/pembelians/list_product",
            type: "POST",
            data: {
               _token: $("[name=_token]").val(),
            },
            success: function (res) {
               var dataResult = JSON.parse(res);
               console.log(dataResult);
               $.each(dataResult.data, function (key, value) {
                  ID_Barang = value.id;
                  Harga_barang = value.Harga_barang;
                  Nama_Barang = value.Nama_barang;
                  item += '<option value="' + ID_Barang + '" class="page-data' + ID_Barang + '" data-nama=' + Nama_Barang + ' data-harga=' + Harga_barang + '>' + value.Kode_barang + '</option>';
               });
               $("[name=Kode_barang]").append(item);
            },
         });
      }
      //pilih suplier
      function choose_product(element) {
         valueKode = $("[name=Kode_barang]").val();
         console.log($(".page-data" + valueKode).data());
         elm = $(".page-data" + valueKode).data();
         if (elm == undefined) {
            $("[name=Harga_satuan]").val("");
            $("[name=Nama_barang]").val("");
            return;
         }
         console.log(elm)
         namaBarang = elm.nama;
         hargaBarang = elm.harga;
         $("[name=Harga_satuan]").val(hargaBarang);
         $("[name=Nama_barang]").val(namaBarang);
      }

   </script>


   <script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
   <script>
      $(document).ready(function () {
         console.log('tes'); //menampilkan pilihan
         list_suplier();
      });

      //pilih suplier
      function list_suplier() {
         let item = '';
         $.ajax({
            url: "/pembelians/list_suplier",
            type: "POST",
            data: {
               _token: $("[name=_token]").val(),
            },
            success: function (res) {
               console.log(res);
               var dataResult = JSON.parse(res);
               console.log(dataResult);
               $.each(dataResult.data, function (key, value) {
                  console.log(value.Kode_suplier);
                  item += '<option value=' + value.Nama_suplier + '>' + value.Nama_suplier + '</option>';
               });
               $("[name=Nama_suplier]").append(item);
            },
         });
      }
      //ahir suplier

   </script>

   </html>
   <!--
    <label for="No_po">No_po</label>
    <input name="No_po" type="text" placeholder="No_po..."> <br><br>
    <label for="Tgl_po">Tgl_po</label>
    <input name="Tgl_po" type="text" placeholder="Tgl_po..."><br><br>
    <label for="Suplier">Suplier</label>
    <input name="Suplier" type="text" placeholder="Suplier..."><br><br>
    <label for="Kode_barang">Kode_barang</label>
    <input name="Kode_barang" type="text" placeholder="Kode..."><br><br>
    <label for="Nama_barang">Nama_barang</label>
    <input name="Nama_barang" type="text" placeholder="Nama_barang..."><br><br>
    <label for="Satuan">Satuan</label>
    <input name="Satuan" type="text" placeholder="Satuan..."><br><br>
    <label for="Qty_po">Qty_po</label>
    <input name="Qty_po" type="text" placeholder="Qty_po..."><br><br>
    <label for="Harga_satuan">Harga_Satuan</label>
    <input name="Harga_satuan" type="text" placeholder="Harga_satuan..."><br>
    <label for="Total_harga">Total_harga</label>
    <input name="Total_harga" type="text" placeholder="Total_harga..."><br><br>
    <button class="btn-blue">Submit</button>

  </form>
</div>
@endsection
