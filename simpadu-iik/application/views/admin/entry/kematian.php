<a href="<?= base_url('laporan/printkematian') ?>" class="btn btn-success">Cetak PDF</a>
<br><br>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h5 class="panel-title"><i class="icon-file-eye2"></i> Data Kematian</h5>
  </div>
  <div class="panel-body">
    <table class="table table-bordered datatable-columns">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>NIK</th>
          <th></th>
          <th>Tanggal Lahir</th>
          <th>Jenis Kelamin</th>
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
            <td><?php echo $row->nama; ?></td>
            <td><?php echo $row->nik; ?></td>
            <td><?php echo $no; ?></td>
            <td><?php echo date('d/m/Y', strtotime($row->tanggal_lahir)); ?></td>
            <td><?php echo $row->jk; ?></td>
            <td>
              <center>
                <a href="<?php echo site_url('entry/detailindividu/' . $row->nik); ?>" class="btn btn-success btn-xs tooltips" data-popup="tooltip" data-original-title="Detail Data" data-placement="top"><i class="icon-zoomin3"></i></a>
              </center>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>