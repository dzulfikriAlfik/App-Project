<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/app-project/admin-simpadu/functions/function.php');
session_start();

$id_pekerjaan = $_GET['id'];

$conn = koneksi();
mysqli_query($conn, "DELETE FROM tbl_pekerjaan WHERE id_pekerjaan = $id_pekerjaan");

sessionAlert('Data penduduk berhasil dihapus', 'info', '../view/pekerjaan_data');

?>