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
$pdf->SetTitle('Data Kematian');
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

$title = <<<EOD
<h3>Data Kematian</h3>
EOD;
$pdf->writeHTMLCell(0, 0, '', '', $title, 0, 1, 0, true, 'C', true);

$table = '<table style="border:1px solid #000; padding:6px">';
$table .= '<tr>
            <th style="border:1px solid #000; width:30px;">No</th>
            <th style="border:1px solid #000; width:150px;">Nama</th>
            <th style="border:1px solid #000; width:160px;">NIK</th>
            <th style="border:1px solid #000; width:120px;">Tanggal lahir</th>
            <th style="border:1px solid #000; width:120px;">Jenis Kelamin</th>
         </tr>';
$no = 1;
foreach ($all as $row) {
   $table .= '<tr>
            <td style="border:1px solid #000; width:30px;">' . $no++ . '</td>
            <td style="border:1px solid #000; width:150px;">' . ucwords(strtolower($row->nama)) . '</td>
            <td style="border:1px solid #000; width:160px;">' . $row->nik . '</td>
            <td style="border:1px solid #000; width:120px;">' . date('d/m/Y', strtotime($row->tanggal_lahir)) . '</td>
            <td style="border:1px solid #000; width:120px;">' . $row->jk . '</td>
         </tr>';
}
$table .= '</table>';
$pdf->writeHTMLCell(0, 0, '', '', $table, 0, 1, 0, true, 'C', true);
// move pointer to last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('Data Kematian.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
