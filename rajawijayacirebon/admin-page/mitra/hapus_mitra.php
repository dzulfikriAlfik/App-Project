<?php session_start();

if(!isset($_SESSION['login'])) {
    header("Location: login");
    exit();
}

$koneksi = mysqli_connect('localhost', 'u1522232_root', '4R)]DZg;YLFX', 'u1522232_compro_adiwijaya');
$id_mitra = $_GET['id'];
$sqlselect = "SELECT * FROM mitra WHERE id_mitra = '$id_mitra'";
$query = mysqli_query($koneksi, $sqlselect);
$data = mysqli_fetch_assoc($query);
$sql = "DELETE FROM mitra WHERE id_mitra = '$id_mitra' ";
$sql2 = "DELETE FROM chat WHERE id_mitra = '$id_mitra' ";

if(mysqli_query($koneksi, $sql)) {
    unlink("../assets/img/mitra/" . $data['logo']);
    $_SESSION['alert'] = true;
    $_SESSION['message'] = 'Data berhasil dihapus';
    $_SESSION['type'] = 'success';
    header("Location: daftar_mitra_data");
} else {
    $_SESSION['alert'] = true;
    $_SESSION['message'] = mysqli_error($koneksi);
    $_SESSION['type'] = 'danger';
    header("Location: daftar_mitra_data");
}


?>