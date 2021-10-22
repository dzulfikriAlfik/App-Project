<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/app-project/admin-simpadu/functions/function.php');
session_start();

if (isset($_POST['tambah'])) {
   if(tambahPekerjaan($_POST) > 0) {
      sessionAlert('Data pekerjaan berhasil ditambahkan', 'success', '../view/pekerjaan_data');
   } else {
      sessionAlert('Data pekerjaan gagal ditambahkan', 'danger', '../view/pekerjaan_data');
   }
}
?>