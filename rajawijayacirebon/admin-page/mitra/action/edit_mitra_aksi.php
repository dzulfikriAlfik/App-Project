<?php session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login");
    exit();
}

if (isset($_POST['edit_mitra'])) {
    // var_dump($_POST);die;
    $koneksi = mysqli_connect('localhost', 'root', '', 'compro_adiwijaya');

    $id_mitra = $_POST['id_mitra'];
    $nama_mitra = mysqli_real_escape_string($koneksi, $_POST["nama_mitra"]);
    $alamat = mysqli_real_escape_string($koneksi, $_POST["alamat"]);
    $telp = mysqli_real_escape_string($koneksi, $_POST["telp"]);
    $email = mysqli_real_escape_string($koneksi, $_POST["email"]);
    $logoLama = mysqli_real_escape_string($koneksi, $_POST["logoLama"]);

    //cek jika user tidak mengupload logo 	
    if ($_FILES['logo']['error'] === 4) {
        $logo = $logoLama;
    } else {
        // echo $_FILES['logo']['tmp_name'];die;
        $namaFile = $_FILES['logo']['name'];
        $ukuranFile = $_FILES['logo']['size'];
        $error = $_FILES['logo']['error'];
        $tmpName = $_FILES['logo']['tmp_name'];
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "
                <script>
                    alert('Pilih ekstensi gambar jpg/jpeg/png!');
                </script>
            ";
            // return false;
        }
        if ($ukuranFile > 1000000) {
            echo "
                <script>
                    alert('Ukuran file terlalu besar Maksimal 1MB!');
                </script>
            ";
            // return false;
        }
        $logo = uniqid() . '.' . $ekstensiGambar;
        $sqlselect = "SELECT * FROM mitra WHERE id_mitra = '{$id_mitra}'";
        $queryselect = mysqli_query($koneksi, $sqlselect);
        $data = mysqli_fetch_assoc($queryselect);
        unlink('../assets/img/mitra/' . $data['logo']);
        move_uploaded_file($tmpName, '../assets/img/mitra/' . $logo);
    }

    $sql = "UPDATE mitra SET 
            mitra = '$nama_mitra', 
            logo = '$logo', 
            alamat = '$alamat', 
            email = '$email', 
            telp = '$telp'
            WHERE id_mitra = '{$id_mitra}'";

    if (mysqli_query($koneksi, $sql)) {
        $_SESSION['alert'] = true;
        $_SESSION['message'] = 'Data berhasil diupdate';
        $_SESSION['type'] = 'success';
        header("Location: daftar_mitra_data");
    } else {
        $_SESSION['alert'] = true;
        $_SESSION['message'] = mysqli_error($koneksi);
        $_SESSION['type'] = 'danger';
        header("Location: daftar_mitra_data");
    }
}
