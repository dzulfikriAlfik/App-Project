<a href="<?php echo site_url('Entry/addindividu/' . $id); ?>" class="btn btn-primary btn-sm"><i class="icon-file-plus"></i> Tambah </a>
<!-- button back -->
<a href="javascript:history.go(-1)" class="btn btn-warning btn-sm">Kembali</a>
<!-- <a href="<?= base_url('entry'); ?>" class="btn btn-warning btn-sm">Kembali</a> -->
<!-- end button back -->
<?php
echo br(2);
$data = $this->session->flashdata('sukses');
if ($data != "") { ?>
  <div class="alert alert-success"><strong>Sukses! </strong> <?= $data; ?></div>
<?php } ?>
<?php
$data2 = $this->session->flashdata('error');
if ($data2 != "") { ?>
  <div class="alert alert-danger"><strong> Error! </strong> <?= $data2; ?></div>
<?php } ?>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h5 class="panel-title"><i class="icon-pencil7"></i> Detail Individu Di KK <b><i><?= getnamakk($id); ?></i></b></h5>
  </div>
  <div class="panel-body">
    <table class="table table-bordered datatable-columns">
      <thead>
        <tr>
          <th>No</th>
          <th>Ket</th>
          <th>NIK</th>
          <th class="never"></th>
          <th>Nama</th>
          <th>JK</th>
          <th>Tanggal Lahir</th>
          <th>Status</th>
          <th>Mutasi</th>
          <th>
            <center>Opsi</center>
          </th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 0;
        foreach ($all as $row) : $no++; ?>
          <tr>
            <td></td>
            <td>
              <center>
                <?php $num = cekKK($row->nik);
                if ($num > 0) {
                  echo '<a href="#" class="btn btn-primary btn-xs tooltips" data-popup="tooltip" data-original-title="Kepala Keluarga" data-placement="top"><i class="icon-home7"></i></a>';
                } else {
                  echo '<a href="' . site_url('entry/kk/' . $row->nik) . '" class="btn btn-default btn-xs tooltips" data-popup="tooltip" data-original-title="Jadikan Kepala Keluarga" data-placement="top"><i class="icon-quill4"></i></a>';
                }
                ?>
              </center>
            </td>
            <td><?php echo $row->nik; ?></td>
            <td><?php echo $no; ?></td>
            <td><?php echo $row->nama; ?></td>
            <td><?php echo $row->jk; ?></td>
            <td><?php echo date('d/m/Y', strtotime($row->tanggal_lahir)); ?></td>
            <!-- Status Hidup/Mati -->
            <td>
              <?php if ($row->status == 1) {
                echo "<center><span class='label label-success'> Hidup</span></center>";
                $site = site_url('entry/deadindividu/' . $row->nik);
                $teks = "Ubah Status Meninggal";
                $icon = "switch";
                $class = "danger";
              } elseif ($row->status == 2) {
                echo "<center><span class='label label-danger'> Meninggal</span></center>";
                $site = site_url('entry/onindividu/' . $row->nik);
                $teks = "Ubah Status Hidup";
                $icon = "switch";
                $class = "default";
              } else {
                echo "<center><label class='label label-primary> Lainnya</label></center>";
                $site = site_url('entry/onindividu/' . $row->nik);
                $teks = "Aktifkan Data";
                $icon = "switch";
                $class = "default";
              } ?>
            </td>
            <!-- Status Masuk/Keluar -->
            <td>
              <?php if ($row->mutasi == 1) {
                echo "<center><a class=\"label label-primary\" href=\"" . site_url('entry/mutasi/' . $row->nik) . "\"> Masuk</a></center>";
                $site1 = site_url('entry/individuOut/' . $row->nik);
                $teks1 = "Ubah Mutasi Keluar";
                $icon1 = "home";
                $class1 = "warning";
              } else if ($row->mutasi == 2) {
                echo "<center><a class=\"label label-warning\" href=\"" . site_url('entry/mutasi/' . $row->nik) . "\"> Keluar</a></center>";
                $site1 = site_url('entry/individuIn/' . $row->nik);
                $teks1 = "Ubah Mutasi Masuk";
                $icon1 = "home";
                $class1 = "default";
              } else if ($row->mutasi == 3) {
                echo "<center><a class=\"label label-default\" href=\"" . site_url('entry/mutasi/' . $row->nik) . "\"> Warga Asli</a></center>";
                $site1 = site_url('entry/individuIn/' . $row->nik);
                $teks1 = "Ubah Mutasi Masuk";
                $icon1 = "home";
                $class1 = "default";
              } ?>
            </td>
            <td style="width:200px">
              <center>
                <a href="<?php echo site_url('entry/detailindividu/' . $row->nik); ?>" class="btn btn-success btn-xs tooltips" data-popup="tooltip" data-original-title="Detail Data" data-placement="top"><i class="icon-zoomin3"></i></a>
                <!--  -->
                <a href="<?php echo site_url('entry/editindividu/' . $row->nik); ?>" class="btn btn-info btn-xs tooltips" data-popup="tooltip" data-original-title="Edit Data" data-placement="top"><i class="icon-pencil5"></i></a>
                <!--  -->
                <a href="<?php echo $site; ?>" onclick="return confirm('Anda Yakin Merubah Status Data Ini');" class="btn btn-<?= $class; ?> btn-xs tooltips" data-popup="tooltip" data-original-title="<?php echo $teks; ?>" data-placement="top"><i class="icon-<?= $icon; ?>"></i></a>
                <!--  -->
                <a href="<?php echo $site1; ?>" onclick="return confirm('Anda Yakin Merubah Status Data Ini');" class="btn btn-<?= $class1; ?> btn-xs tooltips" data-popup="tooltip" data-original-title="<?php echo $teks1; ?>" data-placement="top"><i class="icon-<?= $icon1; ?>"></i></a>
                <!--  -->
                <a href="<?php echo site_url('entry/hapusindividu/' . $row->nik); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini');" class="btn btn-danger btn-xs tooltips" data-popup="tooltip" data-original-title="Hapus Data" data-placement="top"><i class="icon-x"></i></a>
              </center>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>