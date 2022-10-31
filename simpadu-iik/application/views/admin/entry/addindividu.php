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
<!-- <a href="<?= base_url('entry/detailkk/' . $id) ?>" class="btn btn-warning">Kembali</a> -->
<br><br>
<!-- end button back -->

<div class="panel panel-primary">
  <div class="panel-heading">
    <h5 class="panel-title"><i class="icon-pencil7"></i> Tambah Data Individu Di No KK <b><i><?= getnamakk($id); ?></i></b></h5>
  </div>
  <?php echo form_open_multipart('Entry/addprocessin'); ?>
  <input type="hidden" value="<?php echo $id; ?>" name="no_kk">
  <div class="panel-body">
    <div class="form-group">
      <label class='col-md-3'>NIK</label>
      <div class='col-md-9'><input type="text" name="nik" autocomplete="off" required placeholder="Masukkan NIK" class="form-control"></div>
    </div>
    <br><br>
    <div class="form-group">
      <label class='col-md-3'>Nama</label>
      <div class='col-md-9'><input type="text" name="nama" autocomplete="off" required placeholder="Masukkan Nama Lengkap" class="form-control"></div>
    </div>
    <br><br>
    <div class="form-group">
      <label class='col-md-3'>Tempat Lahir</label>
      <div class='col-md-9'><input type="text" name="tempat" autocomplete="off" required placeholder="Masukkan Tempat Lahir" class="form-control"></div>
    </div>
    <br><br>
    <div class="form-group">
      <label class='col-md-3'>Tanggal Lahir</label>
      <div class='col-md-9'><input type="text" name="tanggal" autocomplete="off" required placeholder="Masukkan Tanggal Lahir" class="form-control datepicker"></div>
    </div>
    <br><br>
    <div class="form-group">
      <label class='col-md-3'>Jenis Kelamin</label>
      <div class='col-md-2'>
        <input type="radio" required value="Laki-laki" name="jk"> Laki Laki
      </div>
      <div class='col-md-3'>
        <input type="radio" required value="Perempuan" name="jk"> Perempuan
      </div>
    </div>
    <br><br>
    <div class="form-group">
      <label class='col-md-3'>Golongan Darah</label>
      <div class='col-md-9'>
        <select data-placeholder="Pilih Golongan Darah" name="golongan_darah" required class="select-clear">
          <option></option>
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="AB">AB</option>
          <option value="O">O</option>
        </select>
      </div>
    </div>
    <br><br>
    <div class="form-group" id="before_mutasi" style="display:block; margin-bottom:100px;">
      <label class='col-md-3' id="label">Alamat </label>
      <div class='col-md-9'><textarea name="alamat" required class="form-control"></textarea></div>
    </div>
    <br>
    <div class="form-group" id="after_mutasi" style="display:none; margin-bottom:100px;">
      <label class='col-md-3'>Alamat Setelah Mutasi</label>
      <div class='col-md-9'><textarea name="alamat_sesudah" id="harusdiisi" class="form-control"></textarea></div>
    </div>
    <br>
    <div class="form-group">
      <label class='col-md-3'>Pekerjaan</label>
      <div class='col-md-9'><input type="text" name="pekerjaan" autocomplete="off" placeholder="Masukkan Pekerjaan" class="form-control"></div>
    </div>
    <br><br>
    <div class="form-group">
      <label class='col-md-3'>Kewarganegaraan</label>
      <div class='col-md-9'><input type="text" name="kewarganegaraan" autocomplete="off" value="INDONESIA" required placeholder="Masukkan Kewarganegaraan" class="form-control"></div>
    </div>
    <br><br>
    <div class="form-group">
      <label class='col-md-3'>Agama</label>
      <div class='col-md-9'>
        <select data-placeholder="Pilih Agama" name="agama" required class="select-clear">
          <?php $agama = $this->db->get('agama')->result(); ?>
          <option></option>
          <?php
          $no = 0;
          foreach ($agama as $r) : $no++;
            echo '<option value="' . $r->id_agama . '">' . $r->agama . '</option>';
          endforeach;
          ?>
        </select>
      </div>
    </div>
    <br><br>
    <div class="form-group">
      <label class='col-md-3'>Foto</label>
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
            echo '<option value="' . $r->id_klasifikasi . '">' . $r->klasifikasi . '</option>';
          endforeach;
          ?>
        </select>
      </div>
    </div>
    <br><br>
    <div class="form-group">
      <label class='col-md-3'>Mutasi</label>
      <div class='col-md-9'>
        <select required onchange="mutasiChange(this);" data-placeholder="Pilih Status" name="mutasi" class="select-clear">
          <option></option>
          <option value="1">Masuk</option>
          <option value="2">Keluar</option>
          <option value="3">Warga Asli</option>
        </select>
      </div>
    </div>
  </div>
  <div class="panel-footer">
    <br>
    <div class="row">
      <center><button type="submit" class="btn btn-primary"><i class="icon-checkmark-circle2"></i> Simpan</button></center>
    </div>
    <br>
  </div>
  <?php echo form_close(); ?>
</div>

<!-- onchange="mutasiChange(this);" fungsi ini ada di view/admin/template -->
<script type="text/javascript">
  function mutasiChange(select) {
    if (select.value == 1 || select.value == 2) {
      document.getElementById('label').innerHTML = "Alamat Sebelum Mutasi";
      document.getElementById('before_mutasi').style.display = "block";
      document.getElementById('after_mutasi').style.display = "block";
      document.getElementById("harusdiisi").required = true;
    } else if (select.value == 3) {
      document.getElementById('before_mutasi').style.display = "block";
      document.getElementById('label').innerHTML = "Alamat";
      document.getElementById('after_mutasi').style.display = "none";
    } else {
      document.getElementById('before_mutasi').style.display = "block";
      document.getElementById('label').innerHTML = "Alamat";
      document.getElementById('after_mutasi').style.display = "none";
    }
  }
</script>