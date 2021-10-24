<?php session_start();

if (!isset($_SESSION["login_mitra"])) {
    header("Location: ../../auth/login_mitra");
    exit();
}

$koneksi = mysqli_connect('localhost', 'root', '', 'compro_adiwijaya');

if (isset($_POST['kirim_chat'])) {
    $id_mitra = $_SESSION['id_mitra'];
    $chat = '<p style="text-align:right">' . mysqli_real_escape_string($koneksi, $_POST['chat']);
    date_default_timezone_set('Asia/Jakarta');
    $tanggal = date("Y-m-d H:i:s");

    $sql = "INSERT INTO chat VALUES(null, null, '$id_mitra', '$chat', '$tanggal')";

    if (mysqli_query($koneksi, $sql)) {
        $_SESSION['alert'] = true;
        $_SESSION['message'] = 'Pesan berhasil terkirim';
        $_SESSION['type'] = 'success';
        header("Location: ../mitra_chat");
    } else {
        $_SESSION['alert'] = true;
        $_SESSION['message'] = mysqli_error($koneksi);
        $_SESSION['type'] = 'danger';
        header("Location: ../mitra_chat");
    }
}