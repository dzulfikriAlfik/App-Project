<?php
//============================================================+
// File name   : example_005.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 005 for TCPDF class
//               Multicell
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Multicell
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
// require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 005');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "Pemerintahan Desa Cengal", "Alamat  : Jln. Raya Pacengalan No.12 \nDesa Cengal, Kecamatan Maja, Kabupaten Majalengka | Telp : (0221) 988909");

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
// $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetMargins(20, 32, 20);
// $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetHeaderMargin(13);
// $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
  require_once(dirname(__FILE__) . '/lang/eng.php');
  $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 10);

// add a page
$pdf->AddPage();

// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);

// set cell margins
$pdf->setCellMargins(1, 1, 1, 1);

// set color for background
$pdf->SetFillColor(255, 255, 127);

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)


// ------------------------------------------------------------
// Area Content
$pdf->SetFont('helvetica', '', 10);

/* NOTE:
 * *********************************************************
 * You can load external XHTML using :
 *
 * $html = file_get_contents('/path/to/your/file.html');
 *
 * External CSS files will be automatically loaded.
 * Sometimes you need to fix the path of the external CSS.
 * *********************************************************
 */

// define some HTML content with style
$nama = $getrow['nama'];
$nik = $getrow['nik'];
$kk = $getrow['id_kk'];
$tempat = $getrow['tempat_lahir'];
$tanggal = date('d F Y', strtotime($getrow['tanggal_lahir']));
$jk = $getrow['jk'];
$agama = $getrow['id_agama'];
switch ($agama) {
  case '000000001':
    $agama = 'Islam';
    break;
  case '000000002':
    $agama = 'Kristen';
    break;
  case '000000003':
    $agama = 'Katholik';
    break;
  case '000000004':
    $agama = 'Hindu';
    break;
  case '000000005':
    $agama = 'Budha';
    break;
  case '000000006':
    $agama = 'Khonghucu';
    break;
  default:
    $agama = 'Islam';
    break;
}
$pekerjaan = $getrow['pekerjaan'];
$kewarganegaraan = $getrow['kewarganegaraan'];
$status = $getrow['status'];
switch ($status) {
  case '2':
    $status =  'Meninggal';
    break;
  default:
    $status = 'Hidup';
    break;
}

$alamat = $getrow['alamat'];
$alamat_sesudah = $getrow['alamat_sesudah'];

$mutasi = $getrow['mutasi'];
switch ($mutasi) {
  case '1':
    $mutasi = 'Masuk';
    $alamat = '<tr><th width="150">Alamat Sebelum Mutasi</th><td width="450">: ' . $alamat . '</td></tr><tr><th width="150">Alamat Sesudah Mutasi</th><td>: ' . $alamat_sesudah . '</td></tr>';
    break;
  case '2':
    $mutasi = 'Keluar';
    $alamat = '<tr><th width="150">Alamat Sebelum Mutasi</th><td width="450">: ' . $alamat . '</td></tr><tr><th width="150">Alamat Sesudah Mutasi</th><td>: ' . $alamat_sesudah . '</td></tr>';
    break;
  default:
    $mutasi = 'Warga Asli Menetap';
    $alamat = '<tr><th width="150">Alamat</th><td width="450">: ' . $alamat . '</td></tr><tr><th width="150"></th><td></td></tr>';
    break;
}

// define some HTML content with style
$html = <<<EOF
<!-- EXAMPLE OF CSS STYLE -->
<style>
	
</style>

<h3>Data Mutasi</h3>

<table style="height:100px">
<tr>
  <th width="150">Nama Lengkap</th>
  <td>: $nama</td>
</tr>
<tr>
  <th width="150">Nomor KTP</th>
  <td>: $nik</td>
</tr>
<tr>
  <th width="150">Nomor KK</th>
  <td>: $kk</td>
</tr>
<tr>
  <th width="150">Tempat Lahir</th>
  <td>: $tempat</td>
</tr>
<tr>
  <th width="150">Tanggal Lahir</th>
  <td>: $tanggal</td>
</tr>
<tr>
  <th width="150">Jenis Kelamin</th>
  <td>: $jk</td>
</tr>
<tr>
  <th width="150">Agama</th>
  <td>: $agama</td>
</tr>
<tr>
  <th width="150">Pekerjaan</th>
  <td>: $pekerjaan</td>
</tr>
<tr>
  <th width="150">Kewarganegaraan</th>
  <td>: $kewarganegaraan</td>
</tr>
<tr>
  <th width="150">Status</th>
  <td>: $status</td>
</tr>
<tr>
  <th width="150">Mutasi</th>
  <td>: $mutasi</td>
</tr>

$alamat

</table>

EOF;

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// End Are Content
// ------------------------------------------------------------


// move pointer to last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('Data Mutasi ' .  strtolower($getrow['nama']), 'I');

//============================================================+
// END OF FILE
//============================================================+