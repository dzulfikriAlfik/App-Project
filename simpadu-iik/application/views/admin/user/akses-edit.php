<!-- button back -->
<a href="<?= base_url('user'); ?>" class="btn btn-warning">Kembali</a>
<br><br>
<!-- end button back -->

<div class="col-md-6">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h5 class="panel-title"><i class="icon-pencil7"></i> Edit Hak Akses <b><i><?= getnama($id); ?></i></b></h5>
    </div>
    <?php echo form_open('Entry/editkkprocess'); ?>
    <input type="hidden" value="<?php echo $id; ?>" name="id">
    <div class="panel-body">
      <div class="form-group col-md">
        <center>
          <select required data-placeholder="~~~ Pilih Akses ~~~" name="akses" class="select-clear">
            <option value=""></option>
            <option value="1">Superadmin</option>
            <option value="2">Admin</option>
          </select>
        </center>
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
</div>