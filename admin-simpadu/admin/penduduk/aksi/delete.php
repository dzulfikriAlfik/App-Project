<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/app-project/admin-simpadu/functions/function.php');
session_start();

$id_penduduk = $_GET['id'];

$conn = koneksi();
mysqli_query($conn, "DELETE FROM tbl_penduduk WHERE id_penduduk = $id_penduduk");

sessionAlert('Data penduduk berhasil dihapus', 'info', '../view/penduduk_data.php');

?>