<?php

// Include the main TCPDF library (search for installation path).
require_once('controllers/tcpdf_include.php');
require_once('pdfKop.php');
require_once('controllers/db.php');

// create new PDF document
$pdf = new MYPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Aduhay');

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
  require_once(dirname(__FILE__).'/lang/eng.php');
  $pdf->setLanguageArray($l);
}


// ---------------------------------------------------------
$pdf->AddPage();
$pdf->SetFont('helvetica', 'B', 12);

$pdf->Write(0, '', '', 0, 'C', true, 0, false, false, 0);
$pdf->Write(0, "Laporan Pengaduan Kondisi Taman Kota Bandung", '', 0, 'C', true, 0, false, false, 0);
$pdf->Write(0, "Bulan Januari 2015", '', 0, 'C', true, 0, false, false, 0);
$pdf->Write(0, '', '', 0, 'C', true, 0, false, false, 0);


$pdf->SetFont('helvetica', '', 10);
// ---------------------------------------------------------
$tbl = '
<table border="1" cellpadding="2" align="center">
<thead>
 <tr>
  <th rowspan="2" width="40" align="center"><b>No.</b></th>
  <th rowspan="2" width="140" align="center"><b>Nama Taman</b></th>
  <th colspan="4" align="center"><b>Status</b></th>
  <th rowspan="2" width="93" align="center"> <b>Total Aduan</b></th>
 </tr>
 <tr>
  <th align="center"><b>Menunggu Konfirmasi</b></th>
  <th align="center"><b>Ditolak</b></th>
  <th align="center"><b>Sedang Ditanggapi</b></th>
  <th align="center"><b>Sudah Ditanggapi</b></th>
 </tr>
</thead>
<tbody>
';

$db = new DB();
$taman = $db->query("SELECT * FROM taman");
$i=1;
foreach($taman as $row){
// -----------------------------------------------------------------------------
  $tbl .= '<tr>
              <td width="40" align="center">'.$i.'.</td>
              <td width="140" align="left">'.$row['nama'].'</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td width="93"></td>
           </tr>';
  $i++;
}
$tbl .= '<tr>
              <td colspan="2" align="center"><b>Total Aduan</b></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td width="93"></td>
           </tr>';
$tbl .= '</tbody></table>';

    $pdf->writeHTML($tbl, true, false, false, false, '');
    $pdf->Write(10, '', '', 0, 'C', true, 0, false, false, 0);
// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_048.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
