<?php session_start();

$koneksi = mysqli_connect("localhost", "u1522232_root", "4R)]DZg;YLFX", "u1522232_compro_adiwijaya");

if( isset($_POST["login"]) ) {

	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$username'");

	// cek username
	if( mysqli_num_rows($result) === 1 ) {

		// cek password
		$row = mysqli_fetch_assoc($result);
		if( password_verify($password, $row["password"]) ) {
			// set session
			$_SESSION["login"] = true;
			$_SESSION["nama_admin"] = $row['nama_admin'];
			$_SESSION["id_admin"] = $row['id_admin'];

			header("Location: dashboard");
			exit;
		} else {
		    $_SESSION["alert"] = true;
    	    $_SESSION["message"] = 'Password salah!';
    	    $_SESSION["type"] = 'danger';
    	    header("Location : login");
		}
	} else {
	    $_SESSION["alert"] = true;
	    $_SESSION["message"] = 'username yang anda masukan tidak terdaftar';
	    $_SESSION["type"] = 'danger';
	    header("Location : login");
	}

// 	$error = true;

}

?>