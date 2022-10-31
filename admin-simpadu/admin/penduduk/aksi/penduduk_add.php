<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/app-project/admin-simpadu/functions/function.php');
session_start();

if (isset($_POST['tambah'])) {
   if(tambah($_POST) > 0) {
      sessionAlert('Data penduduk berhasil ditambahkan', 'success', '../view/penduduk_data');
   } else {
      sessionAlert('Data penduduk gagal ditambahkan', 'danger', '../view/penduduk_data');
   }
}
?>