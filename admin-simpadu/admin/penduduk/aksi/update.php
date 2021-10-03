<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/app-project/admin-simpadu/functions/function.php');
session_start();

if (isset($_POST['edit'])) {
   if(edit($_POST) > 0) {
      $id = $_POST['id_penduduk'];
      sessionAlert('Data penduduk berhasil diubah', 'success', "../view/penduduk_detail.php?id=$id");
   } else {
      sessionAlert('Data penduduk gagal diubah', 'danger', '../view/penduduk_data.php');
   }
}