<?php session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ../../auth/login");
    exit();
}

if (isset($_POST['edit'])) {
    // var_dump($_POST);die;
    $koneksi = mysqli_connect('localhost', 'root', '', 'compro_adiwijaya');

    $nama_company = mysqli_real_escape_string($koneksi, $_POST["nama_company"]);
    $alamat = mysqli_real_escape_string($koneksi, $_POST["alamat"]);
    $telp = mysqli_real_escape_string($koneksi, $_POST["telp"]);
    $email = mysqli_real_escape_string($koneksi, $_POST["email"]);
    $sejarah = mysqli_real_escape_string($koneksi, $_POST["sejarah"]);
    $visi = mysqli_real_escape_string($koneksi, $_POST["visi"]);
    $misi = mysqli_real_escape_string($koneksi, $_POST["misi"]);
    $logoLama = mysqli_real_escape_string($koneksi, $_POST["logoLama"]);

    $logo = $_POST["logoLama"];
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
            $_SESSION['alert'] = true;
            $_SESSION['message'] = "pilih file jpg/jpeg/png";
            $_SESSION['type'] = 'danger';
            header("Location: ../company_profile");
        }
        if ($ukuranFile > 1000000) {
            $_SESSION['alert'] = true;
            $_SESSION['message'] = "Ukuran file terlalu besar";
            $_SESSION['type'] = 'danger';
            header("Location: ../company_profile");
        }
        $logo = uniqid() . '.' . $ekstensiGambar;
        $sqlselect = "SELECT * FROM company_profile WHERE id_company = '1'";
        $queryselect = mysqli_query($koneksi, $sqlselect);
        $data = mysqli_fetch_assoc($queryselect);
        unlink('../../../assets/img/logo/' . $data['logo']);
        move_uploaded_file($tmpName, '../../../assets/img/logo/' . $logo);
    }

    $sql = "UPDATE company_profile SET 
            company_name = '$nama_company', 
            address = '$alamat', 
            telp = '$telp', 
            email = '$email', 
            logo = '$logo', 
            sejarah = '$sejarah', 
            visi = '$visi', 
            misi = '$misi' 
            WHERE id_company = 1 ";

    if (mysqli_query($koneksi, $sql)) {
        $_SESSION['alert'] = true;
        $_SESSION['message'] = 'Data berhasil diupdate';
        $_SESSION['type'] = 'success';
        header("Location: ../company_profile");
    } else {
        $_SESSION['alert'] = true;
        $_SESSION['message'] = mysqli_error($koneksi);
        $_SESSION['type'] = 'danger';
        header("Location: ../company_profile");
    }
}