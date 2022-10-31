<?php session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../../../auth/login");
    exit();
}
$koneksi = mysqli_connect('localhost', 'root', '', 'compro_adiwijaya');

if (isset($_POST['tambah_galery'])) {
    $id_kegiatan = mysqli_real_escape_string($koneksi, $_POST['id_kegiatan']);

    // 	var_dump($_FILES['foto']);die;
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        $_SESSION['alert'] = true;
        $_SESSION['message'] = 'Pilih gambar ekstensi jpg/jpeg/png';
        $_SESSION['type'] = 'danger';
        header("Location: ../daftar_galery");
    }
    if ($ukuranFile > 1000000) {
        $_SESSION['alert'] = true;
        $_SESSION['message'] = 'Ukuran file terlalu besar, maksimal 1MB';
        $_SESSION['type'] = 'danger';
        header("Location: ../daftar_galery");
    }
    $foto = uniqid() . "." . $ekstensiGambar;
    move_uploaded_file($tmpName, '../../../assets/img/kegiatan/' . $foto);

    $sql = "INSERT INTO galery_kegiatan VALUES(null, '$id_kegiatan', '$foto')";

    if (mysqli_query($koneksi, $sql)) {
        $_SESSION['alert'] = true;
        $_SESSION['message'] = 'Data berhasil ditambahkan';
        $_SESSION['type'] = 'success';
        header("Location: ../daftar_galery");
    } else {
        $_SESSION['alert'] = true;
        $_SESSION['message'] = mysqli_error($koneksi);
        $_SESSION['type'] = 'danger';
        header("Location: ../daftar_galery");
    }
}