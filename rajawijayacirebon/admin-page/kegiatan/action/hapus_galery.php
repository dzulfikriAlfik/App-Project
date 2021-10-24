<?php session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../../../auth/login");
    exit();
}

$koneksi = mysqli_connect('localhost', 'root', '', 'compro_adiwijaya');
$id_galery = $_GET['id'];
$sqlselect = "SELECT * FROM galery_kegiatan WHERE id_galery_kegiatan = '$id_galery'";
$query = mysqli_query($koneksi, $sqlselect);
$data = mysqli_fetch_assoc($query);
$sql = "DELETE FROM galery_kegiatan WHERE id_galery_kegiatan = '$id_galery' ";

if (mysqli_query($koneksi, $sql)) {
    unlink("../../../assets/img/kegiatan/" . $data['foto']);
    $_SESSION['alert'] = true;
    $_SESSION['message'] = 'Data berhasil dihapus';
    $_SESSION['type'] = 'success';
    header("Location: ../daftar_galery");
} else {
    $_SESSION['alert'] = true;
    $_SESSION['message'] = mysqli_error($koneksi);
    $_SESSION['type'] = 'danger';
    header("Location: ../daftar_galery");
}