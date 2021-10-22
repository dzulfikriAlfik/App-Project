<?php session_start();

if(!isset($_SESSION['login'])) {
    header("Location: login");
    exit();
}

$koneksi = mysqli_connect('localhost', 'u1522232_root', '4R)]DZg;YLFX', 'u1522232_compro_adiwijaya');

if(isset($_POST['edit_kegiatan'])) {
    $id_kegiatan = mysqli_real_escape_string($koneksi, $_POST['id_kegiatan']);
    $nama_kegiatan = mysqli_real_escape_string($koneksi, $_POST['nama_kegiatan']);
    $keterangan = mysqli_real_escape_string($koneksi, $_POST['keterangan']);
    $tanggal = mysqli_real_escape_string($koneksi, $_POST['tanggal']);
    
    $sql = "UPDATE kegiatan SET nama_kegiatan = '$nama_kegiatan', keterangan = '$keterangan', tanggal = '$tanggal' WHERE id_kegiatan = '$id_kegiatan' ";
    
    if(mysqli_query($koneksi, $sql)) {
        $_SESSION['alert'] = true;
        $_SESSION['message'] = 'Data berhasil diubah';
        $_SESSION['type'] = 'success';
        header("Location: daftar_kegiatan_data");
    } else {
        $_SESSION['alert'] = true;
        $_SESSION['message'] = mysqli_error($koneksi);
        $_SESSION['type'] = 'danger';
        header("Location: daftar_kegiatan_data");
    }
    
}

?>