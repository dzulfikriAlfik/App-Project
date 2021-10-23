<?php session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login");
    exit();
}

$koneksi = mysqli_connect('localhost', 'root', '', 'compro_adiwijaya');
$id_kegiatan = $_GET['id'];
$sqlselect = "SELECT * FROM galery_kegiatan WHERE id_kegiatan = '$id_kegiatan'";
$query = mysqli_query($koneksi, $sqlselect);
$rows = [];
while ($row = mysqli_fetch_assoc($query)) {
    $rows[] = $row;
}
$sql = "DELETE FROM kegiatan WHERE id_kegiatan = '$id_kegiatan' ";
$sql2 = "DELETE FROM galery_kegiatan WHERE id_kegiatan = '$id_kegiatan' ";

if (mysqli_query($koneksi, $sql)) {
    if (mysqli_query($koneksi, $sql2)) {
        foreach ($rows as $data) {
            unlink("../assets/img/kegiatan/" . $data['foto']);
        }
    };
    $_SESSION['alert'] = true;
    $_SESSION['message'] = 'Data berhasil dihapus';
    $_SESSION['type'] = 'success';
    header("Location: daftar_kegiatan_data");
} else {
    $_SESSION['alert'] = true;
    $_SESSION['message'] = mysqli_error($koneksi);
    $_SESSION['type'] = 'danger';
    header("Location: daftar_kegiatan_data");
}
