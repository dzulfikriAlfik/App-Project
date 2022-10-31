<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/app-project/admin-simpadu/functions/function.php');
session_start();

if (isset($_POST['edit'])) {
   if(editPekerjaan($_POST) > 0) {
      $id = $_POST['id_penduduk'];
      sessionAlert('Data penduduk berhasil diubah', 'success', "../view/pekerjaan_data");
   } else {
      sessionAlert('Data penduduk gagal diubah', 'danger', '../view/pekerjaan_data');
   }
}