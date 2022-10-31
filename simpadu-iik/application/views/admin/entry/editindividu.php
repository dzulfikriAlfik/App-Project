<?php
$data = $this->session->flashdata('sukses');
if ($data != "") { ?>
  <div class="alert alert-success"><strong>Sukses! </strong> <?= $data; ?></div>
<?php } ?>
<?php
$data2 = $this->session->flashdata('error');
if ($data2 != "") { ?>
  <div class="alert alert-danger"><strong> Error! </strong> <?= $data2; ?></div>
<?php } ?>

<!-- button back -->
<a href="javascript:history.go(-1)" class="btn btn-warning">Kembali</a>
<!-- <a href="<?= base_url('entry/detailkk/' . $kk) ?>" class="btn btn-warning">Kembali</a> -->
<br><br>
<!-- end button back -->

<div class="panel panel-primary">
  <div class="panel-heading">
    <h5 class="panel-title"><i class="icon-pencil7"></i> Edit Data Individu <b><i><?= getnama($id); ?></i></b></h5>
  </div>
  <?php echo form_open_multipart('Entry/editprocessin'); ?>
  <input type="hidden" value="<?php echo $id; ?>" name="nikhidden">
  <input type="hidden" value="<?php echo $getrow['foto']; ?>" name="fotohidden">
  <div class="panel-body">
    <div class="form-group">
      <label class='col-md-3'>NIK</label>
      <div class='col-md-9'><input type="text" readonly name="nik" value="<?php echo $getrow['nik']; ?>" autocomplete="off" required placeholder="Masukkan NIK" class="form-control"></div>
    </div>
    <br>
    <br>
    <div class="form-group">
      <label class='col-md-3'>Nama</label>
      <div class='col-md-9'><input type="text" name="nama" value="<?php echo $getrow['nama']; ?>" autocomplete="off" required placeholder="Masukkan Nama Lengkap" class="form-control"></div>
    </div>
    <br>
    <br>
    <div class="form-group">
      <label class='col-md-3'>Tempat Lahir</label>
      <div class='col-md-9'><input type="text" name="tempat" value="<?php echo $getrow['tempat_lahir']; ?>" autocomplete="off" required placeholder="Masukkan Tempat Lahir" class="form-control"></div>
    </div>
    <br>
    <br>
    <div class="form-group">
      <label class='col-md-3'>Tanggal Lahir</label>
      <div class='col-md-9'><input type="text" name="tanggal" value="<?php echo date('d/m/Y', strtotime($getrow['tanggal_lahir'])); ?>" autocomplete="off" required placeholder="Masukkan Tanggal Lahir" class="form-control datepicker"></div>
    </div>
    <br>
    <br>
    <div class="form-group">
      <label class='col-md-3'>Jenis Kelamin</label>
      <div class='col-md-2'>
        <input type="radio" required value="Laki-laki" <?php if ($getrow['jk'] == 'Laki-laki') {
                                                          echo "checked";
                                                        } ?> name="jk"> Laki Laki
      </div>
      <div class='col-md-3'>
        <input type="radio" required value="Perempuan" <?php if ($getrow['jk'] == 'Perempuan') {
                                                          echo "checked";
                                                        } ?> name="jk"> Perempuan
      </div>
    </div>
    <br>
    <br>
    <div class="form-group">
      <label class='col-md-3'>Golongan Darah</label>
      <div class='col-md-9'>
        <select data-placeholder="Pilih Golongan Darah" name="golongan_darah" required class="select-clear">
          <option></option>
          <option value="A" <?php if ($getrow['golongan_darah'] == 'A') {
                              echo "selected";
                            } ?>>A</option>
          <option value="B" <?php if ($getrow['golongan_darah'] == 'B') {
                              echo "selected";
                            } ?>>B</option>
          <option value="AB" <?php if ($getrow['golongan_darah'] == 'AB') {
                                echo "selected";
                              } ?>>AB</option>
          <option value="O" <?php if ($getrow['golongan_darah'] == 'O') {
                              echo "selected";
                            } ?>>O</option>
        </select>
      </div>
    </div>
    <br>
    <br>
    <div class="form-group" id="seb_mutasi" style="display:block; margin-bottom:100px;">
      <label class='col-md-3' id="label_mutasi">Alamat</label>
      <div class='col-md-9'><textarea name="alamat" required class="form-control"><?php echo $getrow['alamat']; ?></textarea></div>
    </div>
    <br>
    <div class="form-group" id="set_mutasi" style="display:none; margin-bottom:100px;">
      <label class='col-md-3'>Alamat Setelah Mutasi</label>
      <div class='col-md-9'><textarea name="alamat_sesudah" id="harusdiisi" class="form-control"><?php echo $getrow['alamat_sesudah']; ?></textarea></div>
    </div>
    <br>
    <br>
    <div class="form-group">
      <label class='col-md-3'>Pekerjaan</label>
      <div class='col-md-9'><input type="text" name="pekerjaan" value="<?php echo $getrow['pekerjaan']; ?>" autocomplete="off" placeholder="Masukkan Pekerjaan" class="form-control"></div>
    </div>
    <br>
    <br>
    <div class="form-group">
      <label class='col-md-3'>Kewarganegaraan</label>
      <div class='col-md-9'><input type="text" name="kewarganegaraan" value="<?php echo $getrow['kewarganegaraan']; ?>" autocomplete="off" required placeholder="Masukkan Kewarganegaraan" class="form-control"></div>
    </div>
    <br>
    <br>
    <div class="form-group">
      <label class='col-md-3'>Agama</label>
      <div class='col-md-9'>
        <select data-placeholder="Pilih Agama" name="agama" required class="select-clear">
          <?php $agama = $this->db->get('agama')->result(); ?>
          <option></option>
          <?php
          $no = 0;
          foreach ($agama as $r) : $no++;
            echo '<option value="' . $r->id_agama . '" ' . select($getrow['id_agama'], $r->id_agama) . '>' . $r->agama . '</option>';
          endforeach;
          ?>
        </select>
      </div>
    </div>
    <br>
    <br>
    <label class='col-md-3'>Foto</label>
    <div class='col-md-9'>
      <img src="<?php echo base_url('uploads/' . $getrow['foto']); ?>" style="width:80px;height:110px;">
    </div>
    <?php echo br(6); ?>
    <div class="form-group">
      <label class='col-md-3'>Foto(Baru)</label>
      <div class='col-md-9'><input type="file" name="gambar" accept="image/jpeg" autocomplete="off" class="form-control"></div>
    </div>
    <br>
    <br>
    <div class="form-group">
      <label class='col-md-3'>Klasifikasi</label>
      <div class='col-md-9'>
        <select data-placeholder="Pilih Klasifikasi" multiple name="klasifikasi[]" required class="select-clear">
          <?php $klasifikasi = $this->db->get('klasifikasi')->result(); ?>
          <option></option>
          <?php
          $no = 0;
          foreach ($klasifikasi as $r) : $no++;
            echo '<option value="' . $r->id_klasifikasi . '" ' . select2($r->id_klasifikasi, $id) . '>' . $r->klasifikasi . '</option>';
          endforeach;
          ?>
        </select>
      </div>
    </div>
    <br>
    <br>
    <div class="form-group">
      <label class='col-md-3'>Status</label>
      <div class='col-md-9'>
        <select data-placeholder="Pilih Status" name="status" required class="select-clear">
          <?php $status = $this->db->get('status')->result(); ?>
          <option></option>
          <?php
          $no = 0;
          foreach ($status as $r) : $no++;
            echo '<option value="' . $r->id_status . '" ' . select($getrow['status'], $r->id_status) . '>' . $r->status . '</option>';
          endforeach;
          ?>
        </select>
      </div>
    </div>
    <br>
    <br>
    <div class="form-group">
      <label class='col-md-3'>Mutasi</label>
      <div class='col-md-9'>
        <select id="my_select" required onchange="mutasiPil(this);" data-placeholder="Pilih Status" name="mutasi" class="select-clear">
          <option></option>
          <?php $mutasi = $this->db->get('mutasi')->result(); ?>
          <option></option>
          <?php
          $no = 0;
          foreach ($mutasi as $r) : $no++; ?>
            <option value="<?= $r->id_mutasi; ?>" <?= select($getrow['mutasi'], $r->id_mutasi) ?> onchange="mutasiPil(this);"><?= $r->mutasi; ?></option>
          <?php
          endforeach;
          ?>
        </select>
      </div>
    </div>
  </div>
  <div class="panel-footer">
    <br>
    <div class="row">
      <center><button type="submit" class="btn btn-warning"><i class="icon-pencil5"></i> Edit</button></center>
    </div>
    <br>
  </div>
  <?php echo form_close(); ?>
</div>

<script type="text/javascript">
  function mutasiPil(select) {
    if (select.value == 1 || select.value == 2) {
      document.getElementById('label_mutasi').innerHTML = "Alamat Sebelum Mutasi";
      document.getElementById('seb_mutasi').style.display = "block";
      document.getElementById('set_mutasi').style.display = "block";
      document.getElementById("harusdiisi").required = true;
    } else if (select.value == 3) {
      document.getElementById('seb_mutasi').style.display = "block";
      document.getElementById('label_mutasi').innerHTML = "Alamat";
      document.getElementById('set_mutasi').style.display = "none";
    } else {
      document.getElementById('seb_mutasi').style.display = "block";
      document.getElementById('label_mutasi').innerHTML = "Alamat";
      document.getElementById('set_mutasi').style.display = "none";
    }
  }
</script>

<script type="text/javascript">
  window.addEventListener("load", function() {
    const pil = document.getElementById("my_select");

    if (pil.value == 1 || pil.value == 2) {
      document.getElementById('label_mutasi').innerHTML = "Alamat Sebelum Mutasi";
      document.getElementById('seb_mutasi').style.display = "block";
      document.getElementById('set_mutasi').style.display = "block";
      document.getElementById("harusdiisi").required = true;
    } else if (pil.value == 3) {
      document.getElementById('seb_mutasi').style.display = "block";
      document.getElementById('label_mutasi').innerHTML = "Alamat";
      document.getElementById('set_mutasi').style.display = "none";
    }
  }, false);
</script>