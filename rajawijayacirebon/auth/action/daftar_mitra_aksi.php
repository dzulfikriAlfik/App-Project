<?php session_start();
include_once "../../koneksi.php";

if (isset($_SESSION['login'])) {
    header("Location: dashboard");
    exit();
}

if (isset($_POST['daftar_mitra'])) {
    $nama_mitra = mysqli_real_escape_string($koneksi, $_POST['nama_mitra']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $telp = mysqli_real_escape_string($koneksi, $_POST['telp']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    $result = mysqli_query($koneksi, "SELECT username FROM mitra WHERE username = '$username'");
    $result2 = mysqli_query($koneksi, "SELECT email FROM mitra WHERE email = '$email'");

    if (mysqli_fetch_assoc($result) > 0) {
        $_SESSION['alert'] = true;
        $_SESSION['message'] = "username sudah terdaftar!";
        $_SESSION['type'] = 'danger';
        header("Location: ../daftar_mitra");
    } elseif (mysqli_fetch_assoc($result2) > 0) {
        $_SESSION['alert'] = true;
        $_SESSION['message'] = "email sudah terdaftar!";
        $_SESSION['type'] = 'danger';
        header("Location: ../daftar_mitra");
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT);

        if ($_FILES['logo']['error'] === 4) {
            $logo = "nophoto.png";
        } else {
            // 	var_dump($_FILES);die;
            $namaFile = $_FILES['logo']['name'];
            $ukuranFile = $_FILES['logo']['size'];
            $error = $_FILES['logo']['error'];
            $tmpName = $_FILES['logo']['tmp_name'];
            $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
            $ekstensiGambar = explode('.', $namaFile);
            $ekstensiGambar = strtolower(end($ekstensiGambar));
            if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
                $_SESSION['alert'] = true;
                $_SESSION['message'] = "pilih ekstensi gambar jpg/jpeg/png!";
                $_SESSION['type'] = 'danger';
                header("Location: ../daftar_mitra");
            }
            if ($ukuranFile > 1000000) {
                $_SESSION['alert'] = true;
                $_SESSION['message'] = "ukuran file terlalu besar maksimal 1MB!";
                $_SESSION['type'] = 'danger';
                header("Location: ../daftar_mitra");
            }
            $logo = uniqid() . '.' . $ekstensiGambar;
            move_uploaded_file($tmpName, baseUrl('assets/img/mitra/') . $logo);
        }

        $sql = "INSERT INTO mitra VALUES(null, '$nama_mitra', '$logo', '$username', '$password', '$alamat', '$email', '$telp', 'no', 'Offline', null)";

        if (mysqli_query($koneksi, $sql)) {
            $_SESSION['alert'] = true;
            $_SESSION['message'] = 'Data berhasil ditambahkan';
            $_SESSION['type'] = 'success';
            header("Location: ../login_mitra");
        } else {
            $_SESSION['alert'] = true;
            $_SESSION['message'] = mysqli_error($koneksi);
            $_SESSION['type'] = 'danger';
            header("Location: ../daftar_mitra");
        }
    }
}