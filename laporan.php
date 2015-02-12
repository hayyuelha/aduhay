<?php

// Include the main TCPDF library (search for installation path).
require_once('controllers/tcpdf_include.php');
require_once('controllers/tcpdf.php');
require_once('controllers/db.php');

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {
  public $page_counter = 0;
  public $bulan,$tahun;

  //Page header
  public function Header() {
    // Set font
    $this->SetFont('helvetica', '', 11);
    // Title
    $this->Cell(0, 15, 'Laporan Pengaduan Bulan Juni 2015', 0, false, 'C', 0, '', 0, false, 'M', 'M');
  }

  // Page footer
  public function Footer() {
    if ($this->page_counter == 0){
      $this->Cell(0, 10, '', 0, false, 'C', 0, '', 0, false, 'T', 'M');
    } else {
      // Position at 15 mm from bottom
      $this->SetY(-15);
      $this->SetX(-15);
      // Set font
      $this->SetFont('helvetica', '', 9);
      // Page number
      $this->Cell(0, 10, ''.$this->page_counter, 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
    $this->page_counter++;  
  }

  public function Cover(){
    $this->SetFont('helvetica', 'B', 24);
    $this->Write(0, "LAPORAN", '', 0, 'C', true, 0, false, false, 0);
    $this->SetFont('helvetica', 'B', 20);
    $this->Write(0, "SISTEM PENGADUAN KONDISI TAMAN", '', 0, 'C', true, 0, false, false, 0);
    $this->Write(0, "KOTA BANDUNG", '', 0, 'C', true, 0, false, false, 0);
    $this->Write(0, "BULAN ".$this->bulan, '', 0, 'C', true, 0, false, false, 0);
    $this->Write(0, '', '', 0, 'C', true, 0, false, false, 0);
    // Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false)
    $this->Image('assets/img/Logo-pemkot.png', 65, 110, 80, 70, 'PNG', '', 'C', true, 150, '', false, false, 0, false, false, false);
   //Text($x, $y, $txt, $fstroke=false, $fclip=false, $ffill=true, $border=0, $ln=0, $align='', $fill=false, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M', $rtloff=false)
    $this->Text(15, 220, "PEMERINTAH KOTA BANDUNG", false, false, true, 0, 0, 'C', false, '', 0, false, 'T', 'M', false);
    $this->Text(10, 230, "DINAS PEMAKAMAN DAN PERTAMANAN", false, false, true, 0, 0, 'C', false, '', 0, false, 'T', 'M', false);
    $this->Text(18, 240, "2014".$this->tahun, false, false, true, 0, 0, 'C', false, '', 0, false, 'T', 'M', false);
  }
}
// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');

$pdf->SetPrintHeader(false);
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

// ---------------------------------------------------------
$db = new DB();
$taman = $db->query("SELECT * FROM taman");
$pdf->Cover();
$i=0;
foreach($taman as $row){
    if($i % 3 == 0){
      $pdf->AddPage();
    }
    // set font
    $pdf->SetFont('helvetica', 'B', 12);

    $pdf->Write(0, $row['nama'], '', 0, 'C', true, 0, false, false, 0);
    $pdf->Write(0, $row['lokasi'], '', 0, 'C', true, 0, false, false, 0);

    $pdf->Write(0, '', '', 0, 'C', true, 0, false, false, 0);

    $pdf->SetFont('helvetica', '', 10);

// -----------------------------------------------------------------------------

$tbl = '
<table border="1" cellpadding="2" align="center">
<thead>
 <tr>
  <th rowspan="2" width="40" align="center"><b>No.</b></th>
  <th rowspan="2" width="140" align="center"><b>Kategori</b></th>
  <th colspan="4" align="center"><b>Status</b></th>
  <th rowspan="2" width="93" align="center"> <b>Total</b></th>
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

$kategori = $db->query("SELECT * FROM kategori");
foreach($kategori as $row2){
  $tbl .= '<tr>
              <td width="40" align="center">'.$row2['id'].'</td>
              <td width="140">'.$row2['nama_kategori'].'</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td width="93"></td>
           </tr>';
}
$tbl .= '<tr>
              <td colspan="2" align="center"><b>Total</b></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td width="93"></td>
           </tr>';
$tbl .= '</tbody></table>';

    $pdf->writeHTML($tbl, true, false, false, false, '');
    $pdf->Write(10, '', '', 0, 'C', true, 0, false, false, 0);
    $i++;
}
// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_048.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
