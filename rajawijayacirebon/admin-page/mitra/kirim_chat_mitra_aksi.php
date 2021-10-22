<?php session_start();

if( !isset($_SESSION["login_mitra"]) ) {
	header("Location: login_mitra");
	exit();
}

$koneksi = mysqli_connect('localhost', 'u1522232_root', '4R)]DZg;YLFX', 'u1522232_compro_adiwijaya');

if(isset($_POST['kirim_chat'])) {
    $id_mitra = $_SESSION['id_mitra'];
    $chat = mysqli_real_escape_string($koneksi, $_POST['chat']);
    date_default_timezone_set('Asia/Jakarta');
    $tanggal = date("Y-m-d H:i:s");
    
    $sql = "INSERT INTO chat VALUES(null, '$id_mitra', '$chat', '$tanggal')";
    
    if(mysqli_query($koneksi, $sql)) {
        $_SESSION['alert'] = true;
        $_SESSION['message'] = 'Pesan berhasil terkirim';
        $_SESSION['type'] = 'success';
        header("Location: chat_mitra");
    } else {
        $_SESSION['alert'] = true;
        $_SESSION['message'] = mysqli_error($koneksi);
        $_SESSION['type'] = 'danger';
        header("Location: chat_mitra");
    }
    
}

?>