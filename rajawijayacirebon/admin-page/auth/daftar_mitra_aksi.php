<?php session_start();

if(isset($_SESSION['login'])) {
    header("Location: dashboard");
    exit();
}

$koneksi = mysqli_connect('localhost', 'u1522232_root', '4R)]DZg;YLFX', 'u1522232_compro_adiwijaya');

if(isset($_POST['daftar_mitra'])) {
    $nama_mitra = mysqli_real_escape_string($koneksi, $_POST['nama_mitra']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $telp = mysqli_real_escape_string($koneksi, $_POST['telp']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    
    $result = mysqli_query($koneksi, "SELECT username, email FROM mitra WHERE username = '$username' OR email = '$email'");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('username / email sudah terdaftar!')
		      </script>";
		return false;
	}
	
	$password = password_hash($password, PASSWORD_DEFAULT);
    
// 	var_dump($_FILES);die;
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
    move_uploaded_file($tmpName, '../assets/img/mitra/' . $logo);
    
    $sql = "INSERT INTO mitra VALUES(null, '$nama_mitra', '$logo', '$username', '$password', '$alamat', '$email', '$telp', 'no', 'Offline', null)";
    
    if(mysqli_query($koneksi, $sql)) {
        $_SESSION['alert'] = true;
        $_SESSION['message'] = 'Data berhasil ditambahkan';
        $_SESSION['type'] = 'success';
        header("Location: login_mitra");
    } else {
        $_SESSION['alert'] = true;
        $_SESSION['message'] = mysqli_error($koneksi);
        $_SESSION['type'] = 'danger';
        header("Location: daftar_mitra");
    }
    
}

?>