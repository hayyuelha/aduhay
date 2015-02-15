<?php 
class laporan{
	private $model;
 
    public function __construct() {
        require_once('library/tcpdf_include.php');
		require_once('library/pdfCover.php');
		require_once('library/pdfKop.php');
		require_once('models/laporan.php');
        $this->model = new laporan_model();
    }

    public function template1(){
    	// create new PDF document
		$pdf = new pdfCover(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Aduhay');

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

		$pdf->AddPage();
		$data = $this->model->getLaporanByKategoriStatus();
		$pdf->Cover();
		$i=0;
		if (!$data){
		    $pdf->SetFont('helvetica', 'B', 10);
		    $pdf->Write(0, "Daftar taman kosong.", '', 0, 'C', true, 0, false, false, 0);
		} else {
		foreach($data as $taman){
		    if($i % 3 == 0){
		      $pdf->AddPage();
		    }
		    // set font
		    $pdf->SetFont('helvetica', 'B', 12);

		    $pdf->Write(0, $taman['nama'], '', 0, 'C', true, 0, false, false, 0);
		    $pdf->Write(0, $taman['lokasi'], '', 0, 'C', true, 0, false, false, 0);

		    $pdf->Write(0, '', '', 0, 'C', true, 0, false, false, 0);

		    $pdf->SetFont('helvetica', '', 10);

			$tbl = '
			<table border="1" cellpadding="2" align="center">
			<thead>
	 			<tr>
				  <th rowspan="2" width="40" align="center"><b>No.</b></th>
				  <th rowspan="2" width="140" align="center"><b>Kategori</b></th>
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
			$i=1;
			foreach($taman as $kat){
			  if (is_array($kat)){
				  $tbl .= '<tr>
				              <td width="40" align="center">'.$i.'</td>
				              <td width="140">'.$kat['nama_kategori'].'</td>
				              <td>'.$kat['menunggu'].'</td>
				              <td>'.$kat['ditolak'].'</td>
				              <td>'.$kat['sedang'].'</td>
				              <td>'.$kat['sudah'].'</td>
				              <td width="93">'.$kat['total'].'</td>
				           </tr>';
				  $i++;
			  }
			}
			$tbl .= '<tr>
		              <td colspan="2" align="center"><b>Total Aduan</b></td>
		              <td>'.$taman['menunggu'].'</td>
		              <td>'.$taman['ditolak'].'</td>
		              <td>'.$taman['sedang'].'</td>
		              <td>'.$taman['sudah'].'</td>
		              <td width="93">'.$taman['total'].'</td>
		           </tr>';
			$tbl .= '</tbody></table>';

		    $pdf->writeHTML($tbl, true, false, false, false, '');
		    $pdf->Write(10, '', '', 0, 'C', true, 0, false, false, 0);
		    $i++;
			}
		}

		//Close and output PDF document
		$pdf->Output('Laporan'.$pdf->bulan.'.pdf', 'I');

    }

    public function template2(){
    	// create new PDF document
		$pdf = new pdfKop('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
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

		$taman = $this->model->getLaporanByStatus();

		$pdf->AddPage();
		$pdf->SetFont('helvetica', 'B', 12);

		$pdf->Write(0, '', '', 0, 'C', true, 0, false, false, 0);
		$pdf->Write(0, "Laporan Pengaduan Kondisi Taman Kota Bandung", '', 0, 'C', true, 0, false, false, 0);
		$pdf->Write(0, "Bulan Januari 2015", '', 0, 'C', true, 0, false, false, 0);
		$pdf->Write(0, '', '', 0, 'C', true, 0, false, false, 0);


		$pdf->SetFont('helvetica', '', 10);
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

		$i=1;
		if (!$taman){
		    $pdf->SetFont('helvetica', 'B', 10);
		    $pdf->Write(0, "Daftar taman kosong.", '', 0, 'C', true, 0, false, false, 0);
		} else {
		foreach($taman as $row){
		  if($row['id']){
			  $tbl .= '<tr>
			              <td width="40" align="center">'.$i.'.</td>
			              <td width="140" align="left">'.$row['nama'].'</td>
			              <td>'.$row['menunggu'].'</td>
			              <td>'.$row['ditolak'].'</td>
			              <td>'.$row['sedang'].'</td>
			              <td>'.$row['sudah'].'</td>
			              <td width="93">'.$row['total'].'</td>
			           </tr>';
			  $i++;
		  }
		}
		$tbl .= '<tr>
		              <td colspan="2" align="center"><b>Total Aduan</b></td>
		              <td>'.$taman['menunggu'].'</td>
		              <td>'.$taman['ditolak'].'</td>
		              <td>'.$taman['sedang'].'</td>
		              <td>'.$taman['sudah'].'</td>
		              <td width="93">'.$taman['total'].'</td>
		           </tr>';
		$tbl .= '</tbody></table>';

		    $pdf->writeHTML($tbl, true, false, false, false, '');
		    $pdf->Write(10, '', '', 0, 'C', true, 0, false, false, 0);
		}
		//Close and output PDF document
		$pdf->Output('example_048.pdf', 'I');
    }
}