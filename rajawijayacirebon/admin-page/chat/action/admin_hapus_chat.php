<?php session_start();
if (!isset($_SESSION["login"])) {
   header("Location: ../../../auth/login");
   exit();
}

$koneksi = mysqli_connect('localhost', 'root', '', 'compro_adiwijaya');
$id_chat = $_GET['id'];
$sql = "DELETE FROM chat WHERE id_chat = '$id_chat' ";

if (mysqli_query($koneksi, $sql)) {
   $_SESSION['alert'] = true;
   $_SESSION['message'] = 'Data berhasil dihapus';
   $_SESSION['type'] = 'success';
   header("Location: ../admin_chat_detail?id=$id_chat");
} else {
   $_SESSION['alert'] = true;
   $_SESSION['message'] = mysqli_error($koneksi);
   $_SESSION['type'] = 'danger';
   header("Location: ../admin_chat_detail?id=$id_chat");
}