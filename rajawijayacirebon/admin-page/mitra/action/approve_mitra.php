<?php session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../../../auth/login");
    exit();
}

$koneksi = mysqli_connect('localhost', 'root', '', 'compro_adiwijaya');

$id_mitra = $_GET['id'];

$sql = "UPDATE mitra SET 
        approve = 'yes'
        WHERE id_mitra = '{$id_mitra}'";

if (mysqli_query($koneksi, $sql)) {
    $_SESSION['alert'] = true;
    $_SESSION['message'] = 'Status sudah disetujui, sekarang mitra sudah bisa login';
    $_SESSION['type'] = 'success';
    header("Location: ../mitra_data");
} else {
    $_SESSION['alert'] = true;
    $_SESSION['message'] = mysqli_error($koneksi);
    $_SESSION['type'] = 'danger';
    header("Location: ../mitra_data");
}