<?php 
$page = 'data penduduk';
$subPage = ' | Edit data penduduk';
require_once($_SERVER['DOCUMENT_ROOT'] . '/app-project/admin-simpadu/templates/header.php');

$id_penduduk = $_GET['id'];
$pend   = query("SELECT * FROM tbl_penduduk WHERE id_penduduk = $id_penduduk");
$agama  = query("SELECT * FROM tbl_agama");
$status = query("SELECT * FROM tbl_status");
$mutasi = query("SELECT * FROM tbl_mutasi");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="mb-2 row">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">Edit Data Penduduk</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="penduduk_data.php">Data Penduduk</a></li>
                  <li class="breadcrumb-item">Edit Data Penduduk</li>
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
               <div class="card card-primary">
                  <div class="card-header">
                     <a href="penduduk_detail.php?id=<?= $id_penduduk; ?>" class="btn btn-sm btn-warning text-dark"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="quickForm" method="post" action="<?= baseUrl('admin/penduduk/aksi/update.php'); ?>">
                     <input type="hidden" name="id_penduduk" value="<?= $pend['id_penduduk']; ?>">
                     <div class="card-body">
                        <div class="row">
                           <div class="form-group col-md-6">
                              <label for="nik">NIK</label>
                              <input type="text" name="nik" class="form-control" id="nik" placeholder="Masukan NIK" value="<?= $pend['nik']; ?>">
                           </div>
                           <div class="form-group col-md-6">
                              <label for="nama">Nama Lengkap</label>
                              <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukan Nama Lengkap" value="<?= $pend['nama']; ?>">
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-md-12">
                              <label for="no_kk">No. Kartu Keluarga</label>
                              <input type="text" name="no_kk" class="form-control" id="no_kk" placeholder="Masukan No. Kartu Keluarga" value="<?= $pend['no_kk']; ?>">
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-md-6">
                              <label for="tempat_lahir">Tempat Lahir</label>
                              <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Masukan Tempat lahir" value="<?= $pend['tempat_lahir']; ?>">
                           </div>
                           <div class="col-sm-6">
                              <label for="kelamin">Jenis Kelamin</label>
                              <div class="form-group">
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kelamin" value="L" id="kelamin" <?= ($pend['kelamin'] == 'L' ? 'checked' : null); ?>>
                                    <label class="form-check-label">Laki-laki</label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kelamin" value="P" id="kelamin" <?= returnChoice($pend['kelamin'], 'P', 'checked'); ?>>
                                    <label class="form-check-label">Perempuan</label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Golongan Darah</label>
                                 <select class="form-control" name="golongan_darah" id="golongan_darah">
                                    <?php $darah = $pend['golongan_darah'] ?>
                                    <option value="-">-</option>
                                    <option value="A" <?= returnChoice($darah, 'A', 'selected'); ?>>A</option>
                                    <option value="B" <?= returnChoice($darah, 'B', 'selected'); ?>>B</option>
                                    <option value="AB" <?= returnChoice($darah, 'AB', 'selected'); ?>>AB</option>
                                    <option value="O" <?= returnChoice($darah, 'O', 'selected'); ?>>O</option>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group col-md-6">
                              <label for="pekerjaan">Pekerjaan</label>
                              <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" placeholder="Masukan Pekerjaan" value="<?= $pend['pekerjaan']; ?>">
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="alamat">Alamat</label>
                                 <textarea class="form-control" name="alamat" id="alamat" rows="4" placeholder="Masukan Alamat"><?= $pend['alamat']; ?></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-md-6">
                              <label for="kewarganegaraan">Kewarganegaraan</label>
                              <input type="text" name="kewarganegaraan" class="form-control" id="kewarganegaraan" placeholder="Masukan Kewarganegaraan" value="<?= $pend['kewarganegaraan']; ?>">
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Agama</label>
                                 <select class="form-control" name="id_agama" id="id_agama">
                                    <option value="">-</option>
                                    <?php foreach($agama as $value) : ?>
                                    <option value="<?= $value['id_agama']; ?>" <?= returnChoice($pend['id_agama'], $value['id_agama'], 'selected'); ?>><?= $value['agama']; ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Status</label>
                                 <select class="form-control" name="id_status" id="id_status">
                                    <option value="">-</option>
                                    <?php foreach($status as $value) : ?>
                                    <option value="<?= $value['id_status']; ?>" <?= returnChoice($pend['id_status'], $value['id_status'], 'selected'); ?>><?= $value['status']; ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Mutasi</label>
                                 <select class="form-control" name="id_mutasi" id="id_mutasi">
                                    <option value="">-</option>
                                    <?php foreach($mutasi as $value) : ?>
                                    <option value="<?= $value['id_mutasi']; ?>" <?= returnChoice($pend['id_mutasi'], $value['id_mutasi'], 'selected'); ?>><?= $value['mutasi']; ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- /.card-body -->
                     <div class="card-footer">
                        <button type="submit" name="edit" class="btn btn-primary">Submit</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>

</div>
<!-- /.content-wrapper -->
<?php require_once($baseUrl . '/templates/footer.php'); ?>