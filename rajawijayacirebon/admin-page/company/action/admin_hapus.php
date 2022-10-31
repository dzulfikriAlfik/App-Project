<?php session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../../../auth/login");
    exit();
}
$koneksi = mysqli_connect('localhost', 'root', '', 'compro_adiwijaya');

$id_admin = $_GET['id'];
$sql = "DELETE FROM admin WHERE id_admin = '$id_admin' ";
if (mysqli_query($koneksi, $sql)) {
    $_SESSION['alert'] = true;
    $_SESSION['message'] = 'Data berhasil dihapus';
    $_SESSION['type'] = 'success';
    header("Location: ../admin_data");
} else {
    $_SESSION['alert'] = true;
    $_SESSION['message'] = mysqli_error($koneksi);
    $_SESSION['type'] = 'danger';
    header("Location: ../admin_data");
}