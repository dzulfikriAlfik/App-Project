<?php session_start();

if(!isset($_SESSION['login'])) {
    header("Location: login");
    exit();
}

$koneksi = mysqli_connect('localhost', 'u1522232_root', '4R)]DZg;YLFX', 'u1522232_compro_adiwijaya');

if(isset($_POST['admin_tambah'])) {
    $nama_lengkap = mysqli_real_escape_string($koneksi, $_POST['nama_lengkap']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $telp = mysqli_real_escape_string($koneksi, $_POST['telp']);
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    
    $result = mysqli_query($koneksi, "SELECT username, email FROM admin WHERE username = '$username' OR email = '$email'");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('username / email sudah terdaftar!')
		      </script>";
		return false;
	}
	
	$password = password_hash($password, PASSWORD_DEFAULT);
	
	$sql = "INSERT INTO admin VALUES(null, '$nama_lengkap', '$username', '$password', '$alamat', '$telp', '$email')";
	if (mysqli_query($koneksi, $sql)) {
        $_SESSION['alert'] = true;
        $_SESSION['message'] = 'Data berhasil ditambahkan';
        $_SESSION['type'] = 'success';
        header("Location: admin_data");
    } else {
        $_SESSION['alert'] = true;
        $_SESSION['message'] = mysqli_error($koneksi);
        $_SESSION['type'] = 'danger';
        header("Location: admin_tambah");
    }
}

?>