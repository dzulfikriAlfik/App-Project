<?php session_start();
if (!isset($_SESSION["login"])) {
   header("Location: ../../auth/login");
   exit();
}


$page = 'data kegiatan';
$subPage = 'daftar kegiatan';
$idPage = 'keg-1';
include_once "../../templates/admin_header.php";
?>

<!-- All Content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="mb-2 row">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">Tambah Kegiatan</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="daftar_kegiatan_data">Daftar Kegiatan</a></li>
                  <li class="breadcrumb-item active"><a href="#">Tambah Kegiatan</a></li>
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

                  <div class="card-header">
                     <a href="daftar_kegiatan_data" class="btn btn-sm btn-warning"><i class="fas fa-backward"></i> Kembali</a>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <div class="card-body">
                     <form action="action/tambah_kegiatan_aksi" method="POST">
                        <div class="form-group">
                           <label for="nama_kegiatan">Nama Kegiatan</label>
                           <input type="text" class="form-control" name="nama_kegiatan" id="nama_kegiatan" placeholder="Masukkan nama kegiatan" required>
                        </div>
                        <div class="form-group">
                           <label for="keterangan">Keterangan</label>
                           <textarea class="form-control col-md-12" name="keterangan" id="keterangan" rows="4" placeholder="Masukan Keterangan" required></textarea>
                        </div>
                        <div class="form-group">
                           <label>Tanggal Kegiatan</label>
                           <div class="input-group date" id="reservationdate" data-target-input="nearest">
                              <input name="tanggal" id="tanggal" placeholder="yyyy-mm-dd" type="text" class="form-control datetimepicker-input" data-target="#reservationdate" />
                              <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                 <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                           </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                           <button type="submit" name="tambah_kegiatan" class="btn btn-primary">Submit</button>
                        </div>
                     </form>
                  </div>

               </div>

            </div>
         </div>
      </div>
   </div>

</div>
<!-- End All Content -->
<?php include_once "../../templates/admin_footer.php"; ?>