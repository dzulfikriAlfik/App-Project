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
$pdf->SetAuthor('Iik Muspik');
$pdf->SetTitle('Data Mutasi ' .  ucwords(strtolower($getrow['nama'])));
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

$des = ucwords(strtolower($getdesa['desa']));
$almt = ucwords(strtolower($getdesa['alamat_desa']));
$pos = ucwords(strtolower($getdesa['kode_pos']));
$tel = ucwords(strtolower($getdesa['telp']));
$kec = ucwords(strtolower($getdesa['kecamatan']));
$kab = ucwords(strtolower($getdesa['kabupaten']));
// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, 25, "Pemerintahan Desa " . ucwords(strtolower($des)), "Alamat  : $almt \nDesa $des, Kecamatan $kec, Kabupaten $kab ($pos) \nTelp : $tel");

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', 11));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', 10));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
// $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetMargins(20, 42, 20);
// $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetHeaderMargin(15);
// $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
// if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
//   require_once(dirname(__FILE__) . '/lang/eng.php');
//   $pdf->setLanguageArray($l);
// }

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
// nama
$nama = $getrow['nama'];
// nik
$nik = $getrow['nik'];
// kk
$kk = $getrow['id_kk'];
// tempat lahir
$tempat = ucwords(strtolower($getrow['tempat_lahir']));
// tanggal
setlocale(LC_ALL, 'id-ID', 'id_ID');
// $tanggal = strftime("%d %B %Y", strtotime(strtr($getrow['tanggal_lahir'], '/', '-')));
$tanggal = strftime("%d %B %Y", strtotime($getrow['tanggal_lahir']));
$tanggal_sekarang = strftime("%d %B %Y");
// jenis kelamin
$jk = $getrow['jk'];
// agama
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
// pekerjaan
$pekerjaan = ucwords(strtolower($getrow['pekerjaan']));
// kewarganegaraan
$kewarganegaraan = ucwords(strtolower($getrow['kewarganegaraan']));
// status
$status = $getrow['status'];
switch ($status) {
  case '2':
    $status =  'Meninggal';
    break;
  default:
    $status = 'Hidup';
    break;
}
// alamat
$alamat = $getrow['alamat'];
// alamat sesudah
$alamat_sesudah = $getrow['alamat_sesudah'];
// mutasi
$mutasi = $getrow['mutasi'];
switch ($mutasi) {
  case '1':
    $mutasi = 'Masuk';
    $alamat = '<tr><th width="150">Alamat Sebelum Mutasi</th><td width="450">: ' . ucwords(strtolower($alamat)) . '</td></tr><tr><th width="150">Alamat Sesudah Mutasi</th><td>: ' . ucwords(strtolower($alamat_sesudah)) . '</td></tr>';
    break;
  case '2':
    $mutasi = 'Keluar';
    $alamat = '<tr><th width="150">Alamat Sebelum Mutasi</th><td width="450">: ' . ucwords(strtolower($alamat)) . '</td></tr><tr><th width="150">Alamat Sesudah Mutasi</th><td>: ' . ucwords(strtolower($alamat_sesudah)) . '</td></tr>';
    break;
  default:
    $mutasi = 'Warga Asli Menetap';
    $alamat = '<tr><th width="150">Alamat</th><td width="450">: ' . ucwords(strtolower($alamat)) . '</td></tr><tr><th width="150"></th><td></td></tr>';
    break;
}
// desa
$kepdes = ucwords(strtolower($getdesa['kepala_desa']));

// define some HTML content with style
$html = <<<EOF
<!-- EXAMPLE OF CSS STYLE -->
<style>
	td {
    line-height : 2;
  }
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

<br><br><br><br>

<tr>
  <th style="text-align:center; line-height:0.1;" width="230"></th>
  <th style="text-align:center; line-height:0.1;">$des, $tanggal_sekarang</th>
</tr>
<tr>
  <th style="text-align:center; line-height:0.1;" width="230"></th>
  <th style="text-align:center; line-height:0.1;">Mengetahui, $kepdes</th>
</tr>

<br><br><br><br><br>

<tr>
  <th style="text-align:center; line-height:0.1;" width="230"></th>
  <th style="text-align:center; line-height:0.1;">Kepala Desa</th>
</tr>

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
$pdf->Output('Data Mutasi ' .  ucwords(strtolower($getrow['nama'])) . '.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+