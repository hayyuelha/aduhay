<?php
require_once('tcpdf.php');

class pdfCover extends TCPDF {
  public $page_counter = 0;

  public function Footer() {
    if ($this->page_counter == 0){
      $this->Cell(0, 10, '', 0, false, 'C', 0, '', 0, false, 'T', 'M');
    } else {
      $this->SetY(-15);
      $this->SetX(-15);
      $this->SetFont('helvetica', '', 9);
      $this->Cell(0, 10, ''.$this->page_counter, 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
    $this->page_counter++;  
  }

  public function Cover($bulan, $tahun){
    setlocale(LC_ALL, 'IND');
    $this->bulan = strftime("%B");
    $this->tahun = date('Y');
    $this->SetFont('helvetica', 'B', 24);
    $this->Write(0, "LAPORAN", '', 0, 'C', true, 0, false, false, 0);
    $this->SetFont('helvetica', 'B', 20);
    $this->Write(0, "SISTEM PENGADUAN KONDISI TAMAN", '', 0, 'C', true, 0, false, false, 0);
    $this->Write(0, "KOTA BANDUNG", '', 0, 'C', true, 0, false, false, 0);
    $this->Write(0, "BULAN ".strtoupper($bulan)." ".$tahun, '', 0, 'C', true, 0, false, false, 0);
    $this->Write(0, '', '', 0, 'C', true, 0, false, false, 0);
    // Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false)
    $this->Image('assets/img/Logo-pemkot.png', 65, 110, 80, 70, 'PNG', '', 'C', true, 150, '', false, false, 0, false, false, false);
   //Text($x, $y, $txt, $fstroke=false, $fclip=false, $ffill=true, $border=0, $ln=0, $align='', $fill=false, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M', $rtloff=false)
    $this->Text(15, 220, "PEMERINTAH KOTA BANDUNG", false, false, true, 0, 0, 'C', false, '', 0, false, 'T', 'M', false);
    $this->Text(10, 230, "DINAS PEMAKAMAN DAN PERTAMANAN", false, false, true, 0, 0, 'C', false, '', 0, false, 'T', 'M', false);
    $this->Text(18, 240, "".$this->tahun, false, false, true, 0, 0, 'C', false, '', 0, false, 'T', 'M', false);
  }
}