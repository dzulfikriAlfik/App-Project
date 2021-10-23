<?php session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login");
    exit();
}

$koneksi = mysqli_connect('localhost', 'root', '', 'compro_adiwijaya');

if (isset($_POST['admin_tambah'])) {
    $id_admin = mysqli_real_escape_string($koneksi, $_POST['id_admin']);
    $nama_lengkap = mysqli_real_escape_string($koneksi, $_POST['nama_lengkap']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $emailLama = mysqli_real_escape_string($koneksi, $_POST['emailLama']);
    $telp = mysqli_real_escape_string($koneksi, $_POST['telp']);
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $usernameLama = mysqli_real_escape_string($koneksi, $_POST['usernameLama']);
    // $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    $result = mysqli_query($koneksi, "SELECT username, email FROM admin WHERE username = '$username' OR email = '$email' ");

    if (mysqli_fetch_assoc($result) > 0 && ($email != $emailLama || $username != $usernameLama)) {
        $_SESSION['alert'] = true;
        $_SESSION['message'] = "Username / email sudah terdaftar";
        $_SESSION['type'] = 'danger';
        header("Location: admin_edit?id=$id_admin");
    } else {
        if ($_POST["password"] == '') {
            $sql = "UPDATE admin SET nama_admin = '$nama_lengkap', username = '$username', alamat = '$alamat', telp = '$telp', email = '$email' WHERE id_admin = '$id_admin' ";
        } else {
            $password = password_hash(mysqli_real_escape_string($koneksi, $_POST['password']), PASSWORD_DEFAULT);
            $sql = "UPDATE admin SET nama_admin = '$nama_lengkap', username = '$username', password = '$password', alamat = '$alamat', telp = '$telp', email = '$email' WHERE id_admin = '$id_admin' ";
        }

        if (mysqli_query($koneksi, $sql)) {
            $_SESSION['alert'] = true;
            $_SESSION['message'] = 'Data berhasil diubah';
            $_SESSION['type'] = 'success';
            header("Location: admin_data");
        } else {
            $_SESSION['alert'] = true;
            $_SESSION['message'] = mysqli_error($koneksi);
            $_SESSION['type'] = 'danger';
            header("Location: admin_data");
        }
    }
}