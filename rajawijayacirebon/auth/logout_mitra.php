<?php session_start();
$koneksi = mysqli_connect('localhost', 'root', '', 'compro_adiwijaya');
$id_mitra = $_SESSION['id_mitra'];
mysqli_query($koneksi, "UPDATE mitra SET status = 'Offline' WHERE id_mitra = '$id_mitra' ");
session_unset();
session_destroy();


header("Location: ../");