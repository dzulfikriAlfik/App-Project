<?php session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login");
    exit();
}

$koneksi = mysqli_connect('localhost', 'root', '', 'compro_adiwijaya');

if (isset($_POST['tambah_kegiatan'])) {
    $nama_kegiatan = mysqli_real_escape_string($koneksi, $_POST['nama_kegiatan']);
    $keterangan = mysqli_real_escape_string($koneksi, $_POST['keterangan']);
    $tanggal = mysqli_real_escape_string($koneksi, $_POST['tanggal']);

    $sql = "INSERT INTO kegiatan VALUES(null, '$nama_kegiatan', '$keterangan', '$tanggal')";

    if (mysqli_query($koneksi, $sql)) {
        $_SESSION['alert'] = true;
        $_SESSION['message'] = 'Data berhasil ditambahkan';
        $_SESSION['type'] = 'success';
        header("Location: daftar_kegiatan_data");
    } else {
        $_SESSION['alert'] = true;
        $_SESSION['message'] = mysqli_error($koneksi);
        $_SESSION['type'] = 'danger';
        header("Location: daftar_kegiatan_data");
    }
}
