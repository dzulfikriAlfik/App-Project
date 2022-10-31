<?php

// ---------------------------Helper-------------------------//
$baseUrl = 'http://localhost/App-Project/rajawijayacirebon/';

$koneksi = mysqli_connect("localhost", "root", "", "compro_adiwijaya");

function koneksi()
{
   return mysqli_connect('localhost', 'root', '', 'compro_adiwijaya');
}

function baseUrl($url)
{
   return "http://localhost/App-Project/rajawijayacirebon/$url";
}

function addClass($page, $currentPage, $className)
{
   if ($page == $currentPage) {
      echo $className;
   } else {
      echo null;
   }
}

function addClassDropDown($page, $currentPage, $idPage, $idPageCurrent, $className)
{
   if (($page == $currentPage) && $idPage == $idPageCurrent) {
      echo $className;
   } else {
      echo null;
   }
}

function checkLink($page, $currentPage, $url)
{
   if ($page == $currentPage) {
      echo '#';
   } else {
      echo baseUrl($url);
   }
}

function sessionAlert($message, $type, $headerLocation)
{
   $_SESSION['alert']   = true;
   $_SESSION['message'] = $message;
   $_SESSION['type']    = $type;
   header("Location: $headerLocation");
}

function getNama($id, $table, $table_id, $fieldName)
{
   $query = query("SELECT * FROM $table WHERE $table_id = '$id'");
   return $query[$fieldName];
}

function returnChoice($fromTable, $input, $type)
{
   if ($fromTable == $input) {
      return $type;
   } else {
      return null;
   }
}

function _ago($datetime, $full = false)
{
   $now = new DateTime;
   $ago = new DateTime($datetime);
   $diff = $now->diff($ago);

   $diff->w = floor($diff->d / 7);
   $diff->d -= $diff->w * 7;

   $string = array(
      'y' => 'year',
      'm' => 'month',
      'w' => 'week',
      'd' => 'day',
      'h' => 'hour',
      'i' => 'minute',
      's' => 'second',
   );
   foreach ($string as $k => &$v) {
      if ($diff->$k) {
         $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
      } else {
         unset($string[$k]);
      }
   }

   if (!$full) $string = array_slice($string, 0, 1);
   return $string ? implode(', ', $string) . ' ago' : 'just now';
}

function tgl_indo($tanggal)
{
   $bulan = array(
      1 =>   'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
   );
   $pecahkan = explode('-', $tanggal);

   // variabel pecahkan 0 = tanggal
   // variabel pecahkan 1 = bulan
   // variabel pecahkan 2 = tahun

   return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
// ---------------------------endHelper-------------------------//

// ------------------------------ || ------------------------------ //

// ---------------------------mainFunctions-------------------------//
function query($query)
{
   $conn = koneksi();
   $result = mysqli_query($conn, $query);

   $rows = [];
   while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
   }

   return $rows;
}

function single_query($query)
{
   $conn = koneksi();
   $result = mysqli_query($conn, $query);

   // jika hasilnya hanya 1 data
   return mysqli_fetch_assoc($result);
}

function tambah($data)
{
   $conn = koneksi();
}

function edit($data)
{
   $conn = koneksi();
}

function tambahPekerjaan($data)
{
   $conn = koneksi();
}

function registrasi($data)
{
   global $koneksi;

   $nama_admin = mysqli_real_escape_string($koneksi, $data["nama_admin"]);
   $username = strtolower(stripslashes($data["username"]));
   $password = mysqli_real_escape_string($koneksi, $data["password"]);
   $alamat = mysqli_real_escape_string($koneksi, $data["alamat"]);
   $telp = mysqli_real_escape_string($koneksi, $data["telp"]);
   $email = mysqli_real_escape_string($koneksi, $data["email"]);

   // cek username dan email sudah ada atau belum
   $result = mysqli_query($koneksi, "SELECT username, email FROM admin WHERE username = '$username' OR email = '$email'");

   if (mysqli_fetch_assoc($result)) {
      echo "<script>
				alert('username / email sudah terdaftar!')
		      </script>";
      return false;
   }


   // 	// cek konfirmasi password
   // 	if( $password !== $password2 ) {
   // 		echo "<script>
   // 				alert('konfirmasi password tidak sesuai!');
   // 		      </script>";
   // 		return false;
   // 	}

   // enkripsi password
   $password = password_hash($password, PASSWORD_DEFAULT);

   // tambahkan userbaru ke database
   mysqli_query($koneksi, "INSERT INTO admin VALUES(null, '$nama_admin', '$username', '$password', '$alamat', '$telp', '$email')");

   return mysqli_affected_rows($koneksi);
}
// ---------------------------endMainFunctions-------------------------//