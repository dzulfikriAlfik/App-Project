<!-- button back -->
<a href="<?= base_url('laporan/printpdf/' . $getrow['nik']) ?>" class="btn btn-success">Cetak PDF</a>
<a href="<?= base_url('entry/detailkk/' . $kk) ?>" class="btn btn-warning">Kembali</a>
<br><br>
<!-- end button back -->
<div class="panel panel-primary">
  <div class="panel-heading">
    <h5 class="panel-title"><i class="icon-pencil7"></i> Detail Mutasi <b><i><?= getnama($id); ?></i></b></h5>
  </div>
  <div class="panel-body">
    <div class="col-md-6">
      <table class="table table-bordered">
        <tr>
          <th>Nama</th>
          <td><?php echo $getrow['nama']; ?></td>
        </tr>
        <tr>
          <th width="180">NIK</th>
          <td><?php echo $getrow['nik']; ?></td>
        </tr>
        <tr>
          <th>Mutasi</th>
          <td>
            <?php
            switch ($getrow['mutasi']) {
              case 1:
                echo "<span class='label label-primary'> Masuk</span>";
                break;
              case 2:
                echo "<span class='label label-warning'> Keluar</span>";
                break;
              case 3:
                echo "<span class='label label-default'> Warga Asli Menetap</span>";
                break;
            }
            ?>
          </td>
        </tr>
        <?php if ($getrow['mutasi'] == 3) { ?>
          <tr>
            <th width="180">Alamat</th>
            <td><?php echo $getrow['alamat']; ?></td>
          </tr>
        <?php } else {
        ?>
          <tr>
            <th width="180">Alamat Sebelumnya</th>
            <td><?php echo $getrow['alamat']; ?></td>
          </tr>
          <tr>
            <th width="180">Alamat Setelah Mutasi</th>
            <td><?php echo $getrow['alamat_sesudah']; ?></td>
          </tr>
        <?php } ?>
      </table>
    </div>
    <div class="col-md-6">
      <table class="table table-bordered">
        <tr>
          <th>Tempat Lahir</th>
          <td><?php echo $getrow['tempat_lahir']; ?></td>
        </tr>
        <tr>
          <th>Tanggal Lahir</th>
          <td><?php echo date('d/m/Y', strtotime($getrow['tanggal_lahir'])); ?></td>
        </tr>
        <tr>
          <th>Agama</th>
          <td><?php echo getnamaagama($getrow['id_agama']); ?></td>
        </tr>
        <tr>
          <th>Jenis Kelamin</th>
          <td><?php echo $getrow['jk']; ?></td>
        </tr>
        <tr>
          <th>Golongan Darah</th>
          <td><?php echo $getrow['golongan_darah']; ?></td>
        </tr>
        <tr>
          <th>Pekerjaan</th>
          <td><?php echo $getrow['pekerjaan']; ?></td>
        </tr>
        <tr>
          <th>Kewarganegaraan</th>
          <td><?php echo $getrow['kewarganegaraan']; ?></td>
        </tr>
      </table>
    </div>
  </div>
</div>
<br>
<?php
$data = $this->session->flashdata('sukses');
if ($data != "") { ?>
  <div class="alert alert-success"><strong>Sukses! </strong> <?= $data; ?></div>
<?php } ?>