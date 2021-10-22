<?php session_start();
include_once "../../koneksi.php";

if( isset($_POST["login_mitra"]) ) {

	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($koneksi, "SELECT * FROM mitra WHERE username = '$username'");

	// cek username
	if( mysqli_num_rows($result) === 1 ) {

		// cek password
		$row = mysqli_fetch_assoc($result);
		if( password_verify($password, $row["password"]) ) {
			if($row['approve'] == 'yes') {
			    // set session
    			$_SESSION["login_mitra"] = true;
    			$_SESSION["nama_mitra"] = $row['mitra'];
    			$_SESSION["id_mitra"] = $row['id_mitra'];
    
                mysqli_query($koneksi, "UPDATE mitra SET status = 'Online' WHERE username = '$username'");
                
    			header("Location: dashboard_mitra");
    			exit;
			} else {
			    $_SESSION["alert"] = true;
        	    $_SESSION["message"] = 'Anda sudah terdaftar namun harus menunggu persetujuan admin!';
        	    $_SESSION["type"] = 'danger';
        	    header("Location : login_mitra");
			}
		} else {
		    $_SESSION["alert"] = true;
    	    $_SESSION["message"] = 'Password salah!';
    	    $_SESSION["type"] = 'danger';
    	    header("Location : login_mitra");
		}
	} else {
	    $_SESSION["alert"] = true;
	    $_SESSION["message"] = 'username yang anda masukan tidak terdaftar';
	    $_SESSION["type"] = 'danger';
	    header("Location : login_mitra");
	}

// 	$error = true;

}

?>