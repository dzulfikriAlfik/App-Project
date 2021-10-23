<?php session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login");
    exit();
}

$koneksi = mysqli_connect('localhost', 'root', '', 'compro_adiwijaya');

if (isset($_POST['kirim_chat'])) {
    $id_mitra = mysqli_real_escape_string($koneksi, $_POST['id_mitra']);
    $chat =  "<b>Admin :<b> " . mysqli_real_escape_string($koneksi, $_POST['chat']);
    date_default_timezone_set('Asia/Jakarta');
    $tanggal = date("Y-m-d H:i:s");

    $sql = "INSERT INTO chat VALUES(null, '$id_mitra', '$chat', '$tanggal')";

    if (mysqli_query($koneksi, $sql)) {
        $_SESSION['alert'] = true;
        $_SESSION['message'] = 'Pesan berhasil terkirim';
        $_SESSION['type'] = 'success';
        header("Location: daftar_mitra_chat");
    } else {
        $_SESSION['alert'] = true;
        $_SESSION['message'] = mysqli_error($koneksi);
        $_SESSION['type'] = 'danger';
        header("Location: daftar_mitra_chat");
    }
}