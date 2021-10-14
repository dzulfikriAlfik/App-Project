<?php 

// ---------------------------Helper-------------------------//
$baseUrl = $_SERVER['DOCUMENT_ROOT'] . '/app-project/rajawijaya/';

function koneksi() {
   return mysqli_connect('localhost', 'root', '', 'compro_adiwijaya');
}

function baseUrl($url){
   return "http://localhost/app-project/rajawijaya/$url";
}

function addClass($page, $currentPage, $className) {
   if($page == $currentPage) {
      echo $className;
   } else {
      echo null;
   }
}

function addClassDropDown($page, $currentPage, $idPage, $idPageCurrent, $className) {
   if(($page == $currentPage) && $idPage == $idPageCurrent) {
      echo $className;
   } else {
      echo null;
   }
}

function checkLink($page, $currentPage, $url) {
   if($page == $currentPage) {
      echo '#';
   } else {
      echo baseUrl($url);
   }
}

function sessionAlert($message, $type, $headerLocation) {
   $_SESSION['alert']   = true;
   $_SESSION['message'] = $message;
   $_SESSION['type']    = $type;
   header("Location: $headerLocation");
}

function getNama($id, $table, $table_id, $fieldName) {
   $query = query("SELECT * FROM $table WHERE $table_id = '$id'");
   return $query[$fieldName];
}

function returnChoice($fromTable, $input, $type) {
   if($fromTable == $input) {
      return $type;
   } else {
      return null;
   }
}

function checkMutasi($id_mutasi) {
   if($id_mutasi == 1) {
      echo 'Menetap';
   } else if ($id_mutasi == 2) {
      echo 'Keluar';
   } else {
      echo 'Pindahan';
   }
}

function tgl_indo($tanggal){
	$bulan = array (
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
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
// ---------------------------endHelper-------------------------//

// ------------------------------ || ------------------------------ //

// ---------------------------mainFunctions-------------------------//
function query($query) {
   $conn = koneksi();
   $result = mysqli_query($conn, $query);

   // cek jika data hanya 1
   if(mysqli_num_rows($result) == 1) {
      return mysqli_fetch_assoc($result);
   } else {
      $rows = [];
      while($row = mysqli_fetch_assoc($result)) {
         $rows[] = $row;
      }
   }

   return $rows;
}

function tambah($data) {
   $conn = koneksi();

   $nik             = mysqli_real_escape_string($conn, strip_tags($data['nik']));
   $nama            = mysqli_real_escape_string($conn, strip_tags($data['nama']));
   $tempat_lahir    = mysqli_real_escape_string($conn, strip_tags($data['tempat_lahir']));
   $tanggal_lahir   = mysqli_real_escape_string($conn, strip_tags($data['tanggal_lahir']));
   // $date            = str_replace('/', '-', $var);
   // $tanggal_lahir   = date('Y-m-d', strtotime($date));
   $kelamin         = $data['kelamin'];
   $golongan_darah  = $data['golongan_darah'];
   $alamat          = mysqli_real_escape_string($conn, strip_tags($data['alamat']));
   $id_pekerjaan    = mysqli_real_escape_string($conn, strip_tags($data['id_pekerjaan']));
   $kewarganegaraan = mysqli_real_escape_string($conn, strip_tags($data['kewarganegaraan']));
   $id_agama        = $data['id_agama'];
   $no_kk           = mysqli_real_escape_string($conn, strip_tags($data['no_kk']));
   $id_status       = $data['id_status'];
   $id_mutasi       = $data['id_mutasi'];
   
   $query = "INSERT INTO
               tbl_penduduk
            VALUES
               (null, '$nik', '$nama', '$tempat_lahir', '$tanggal_lahir', '$kelamin', '$golongan_darah', '$alamat', '$id_pekerjaan', '$kewarganegaraan', '$id_agama', '$no_kk', null, '$id_status', '$id_mutasi')
            ";
   mysqli_query($conn, $query) or die(mysqli_error($conn));
   return mysqli_affected_rows($conn);
}

function edit($data) {
   $conn = koneksi();

   $id_penduduk     = mysqli_real_escape_string($conn, strip_tags($data['id_penduduk']));
   $nik             = mysqli_real_escape_string($conn, strip_tags($data['nik']));
   $nama            = mysqli_real_escape_string($conn, strip_tags($data['nama']));
   $tempat_lahir    = mysqli_real_escape_string($conn, strip_tags($data['tempat_lahir']));
   $tanggal_lahir   = mysqli_real_escape_string($conn, strip_tags($data['tanggal_lahir']));
   $kelamin         = $data['kelamin'];
   $golongan_darah  = $data['golongan_darah'];
   $alamat          = mysqli_real_escape_string($conn, strip_tags($data['alamat']));
   $id_pekerjaan    = mysqli_real_escape_string($conn, strip_tags($data['id_pekerjaan']));
   $kewarganegaraan = mysqli_real_escape_string($conn, strip_tags($data['kewarganegaraan']));
   $id_agama        = $data['id_agama'];
   $no_kk           = mysqli_real_escape_string($conn, strip_tags($data['no_kk']));
   $id_status       = $data['id_status'];
   $id_mutasi       = $data['id_mutasi'];
   
   $query = "UPDATE tbl_penduduk SET
               nik             = '$nik',
               nama            = '$nama',
               tempat_lahir    = '$tempat_lahir',
               tanggal_lahir   = '$tanggal_lahir',
               kelamin         = '$kelamin',
               golongan_darah  = '$golongan_darah',
               alamat          = '$alamat',
               id_pekerjaan    = '$id_pekerjaan',
               kewarganegaraan = '$kewarganegaraan',
               id_agama        = '$id_agama',
               no_kk           = '$no_kk',
               foto            = null,
               id_status       = '$id_status',
               id_mutasi       = '$id_mutasi'
            WHERE id_penduduk  = $id_penduduk
            ";
   mysqli_query($conn, $query) or die(mysqli_error($conn));
   return mysqli_affected_rows($conn);
}

function tambahPekerjaan($data) {
   $conn = koneksi();

   $pekerjaan    = mysqli_real_escape_string($conn, strip_tags($data['pekerjaan']));
   
   $query = "INSERT INTO
               tbl_pekerjaan
            VALUES
               (null, '$pekerjaan')
            ";
   mysqli_query($conn, $query) or die(mysqli_error($conn));
   return mysqli_affected_rows($conn);
}

function editPekerjaan($data) {
   $conn = koneksi();

   $id_pekerjaan = mysqli_real_escape_string($conn, strip_tags($data['id_pekerjaan']));
   $pekerjaan  = mysqli_real_escape_string($conn, strip_tags($data['pekerjaan']));
   
   $query = "UPDATE tbl_pekerjaan SET
               pekerjaan   = '$pekerjaan'
            WHERE id_pekerjaan  = $id_pekerjaan
            ";
   mysqli_query($conn, $query) or die(mysqli_error($conn));
   return mysqli_affected_rows($conn);
}
// ---------------------------endMainFunctions-------------------------//