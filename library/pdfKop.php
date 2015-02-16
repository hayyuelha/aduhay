<?php
require_once('tcpdf.php');

class pdfKop extends TCPDF {
  public function Header() {
    $this->SetFont('helvetica', '', 15);
    $this->Write(0, 'PEMERINTAH KOTA BANDUNG', '', 0, 'C', true, 0, false, false, 0);
    $this->SetFont('helvetica', '', 18);
    $this->Write(0, 'DINAS PEMAKAMAN DAN PERTAMANAN', '', 0, 'C', true, 0, false, false, 0);
    $this->SetFont('helvetica', '', 11);
    $this->Write(0, 'Jalan Ambon No.1 A, Bandung, Jawa Barat, Telp. (022) 4231921', '', 0, 'C', true, 0, false, false, 0);
    $this->Line(10, 26, 200, 26, array());
    // Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false)
    $this->Image('assets/img/Logo-pemkot.png', 12, 5, 26, 20, 'PNG', '', 'C', true, 150, '', false, false, 0, false, false, false);
   // Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false)
    $this->Image('assets/img/aduhay-logo.png', 170, 7, 28, 17, 'PNG', '', 'C', true, 150, '', false, false, 0, false, false, false);
   
  }

  public function Footer() {
    setlocale(LC_ALL, 'IND');
    $date = strftime( "%A, %d %B %Y", time());
    $this->Line(10, 282, 200, 282, array());
    $this->SetFont('helvetica', '', 9);
    $this->SetY(-15);
    $this->SetX(15);
    $this->Cell(0, 10, 'Dibuat otomatis oleh Aduhay', 0, false, 'L', 0, '', 0, false, 'T', 'M');
    $this->SetY(-10);
    $this->SetX(15);
    $this->Cell(0, 10, 'Pada '.$date, 0, false, 'L', 0, '', 0, false, 'T', 'M');
    $this->SetY(-15);
    $this->SetX(-15);
    $this->Cell(0, 10, ''.$this->getAliasNumPage(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
  }
}