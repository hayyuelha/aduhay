<?php
class laporan_model {
	private $db;
	private $bulan, $tahun;

	public function __construct($bulan, $tahun){
		require_once('controllers/db.php');
		$this->db = new DB();
		$this->bulan = (int) $bulan;
		$this->tahun = (int) $tahun;
	}

	public function getLaporanByKategoriStatus(){
		$taman = $this->db->query("SELECT * FROM taman");
		$result = array();
		if ($taman){
			foreach($taman as $tmn){
				$kategori = $this->db->query("SELECT * FROM kategori");
				$menunggu=0; $ditolak=0; $sedang=0; $sudah=0;
				foreach ($kategori as $kat) {
					$row['nama_kategori'] = $kat['nama_kategori'];
					$row['menunggu'] = $this->db->query("SELECT COUNT(DISTINCT aduan.id) AS num FROM aduan JOIN ubah_status ON aduan.id = ubah_status.id_aduan WHERE aduan.id_status = 1 AND ubah_status.id_status = 1 AND YEAR(ubah_status.waktu) = ".$this->tahun." AND MONTH(ubah_status.waktu) = ".$this->bulan." AND aduan.id_taman = ".$tmn['id']." AND aduan.id_kategori = ".$kat['id'])[0]['num'];
					$row['ditolak'] = $this->db->query("SELECT COUNT(DISTINCT aduan.id) AS num FROM aduan JOIN ubah_status ON aduan.id = ubah_status.id_aduan WHERE aduan.id_status = 2 AND ubah_status.id_status = 2 AND YEAR(ubah_status.waktu) = ".$this->tahun." AND MONTH(ubah_status.waktu) = ".$this->bulan." AND aduan.id_taman = ".$tmn['id']." AND aduan.id_kategori = ".$kat['id'])[0]['num'];
					$row['sedang'] = $this->db->query("SELECT COUNT(DISTINCT aduan.id) AS num FROM aduan JOIN ubah_status ON aduan.id = ubah_status.id_aduan WHERE aduan.id_status = 3 AND ubah_status.id_status = 3 AND YEAR(ubah_status.waktu) = ".$this->tahun." AND MONTH(ubah_status.waktu) = ".$this->bulan." AND aduan.id_taman = ".$tmn['id']." AND aduan.id_kategori = ".$kat['id'])[0]['num'];
					$row['sudah'] = $this->db->query("SELECT COUNT(DISTINCT aduan.id) AS num FROM aduan JOIN ubah_status ON aduan.id = ubah_status.id_aduan WHERE aduan.id_status = 4 AND ubah_status.id_status = 4 AND YEAR(ubah_status.waktu) = ".$this->tahun." AND MONTH(ubah_status.waktu) = ".$this->bulan." AND aduan.id_taman = ".$tmn['id']." AND aduan.id_kategori = ".$kat['id'])[0]['num'];
					$row['total'] = $row['menunggu'] + $row['ditolak'] + $row['sedang'] + $row['sudah'];
					array_push($tmn, $row);
					$menunggu += $row['menunggu'];
					$ditolak += $row['ditolak'];
					$sedang += $row['sedang'];
					$sudah += $row['sudah'];
				}
				$tmn['menunggu'] = $menunggu;
				$tmn['ditolak'] = $ditolak;
				$tmn['sedang'] = $sedang;
				$tmn['sudah'] = $sudah;
				$tmn['total'] =  $menunggu + $ditolak + $sedang + $sudah;
				array_push($result, $tmn);
			}
			return $result;
		} else {return false;}
	}
	
	public function getLaporanByStatus(){
		$taman = $this->db->query("SELECT * FROM taman");
		$result = array();
		$totmenunggu=0; $totditolak=0; $totsedang=0; $totsudah=0;
		if ($taman){
			foreach ($taman as $row) {
				$temp = $row;
				$temp['menunggu'] = $this->db->query("SELECT COUNT(DISTINCT aduan.id) AS num FROM aduan JOIN ubah_status ON aduan.id = ubah_status.id_aduan WHERE aduan.id_status = 1 AND ubah_status.id_status = 1 AND YEAR(ubah_status.waktu) = ".$this->tahun." AND MONTH(ubah_status.waktu) = ".$this->bulan." AND aduan.id_taman = ".$row['id'])[0]['num'];
				$temp['ditolak'] = $this->db->query("SELECT COUNT(DISTINCT aduan.id) AS num FROM aduan JOIN ubah_status ON aduan.id = ubah_status.id_aduan WHERE aduan.id_status = 2 AND ubah_status.id_status = 2 AND YEAR(ubah_status.waktu) = ".$this->tahun." AND MONTH(ubah_status.waktu) = ".$this->bulan." AND aduan.id_taman = ".$row['id'])[0]['num'];
				$temp['sedang'] = $this->db->query("SELECT COUNT(DISTINCT aduan.id) AS num FROM aduan JOIN ubah_status ON aduan.id = ubah_status.id_aduan WHERE aduan.id_status = 3 AND ubah_status.id_status = 3 AND YEAR(ubah_status.waktu) = ".$this->tahun." AND MONTH(ubah_status.waktu) = ".$this->bulan." AND aduan.id_taman = ".$row['id'])[0]['num'];
				$temp['sudah'] = $this->db->query("SELECT COUNT(DISTINCT aduan.id) AS num FROM aduan JOIN ubah_status ON aduan.id = ubah_status.id_aduan WHERE aduan.id_status = 4 AND ubah_status.id_status = 4 AND YEAR(ubah_status.waktu) = ".$this->tahun." AND MONTH(ubah_status.waktu) = ".$this->bulan." AND aduan.id_taman = ".$row['id'])[0]['num'];
				$temp['total'] = $temp['menunggu'] + $temp['ditolak'] + $temp['sedang'] + $temp['sudah'];
				$totmenunggu += $temp['menunggu'];
				$totditolak += $temp['ditolak'];
				$totsedang += $temp['sedang'];
				$totsudah += $temp['sudah'];
				array_push($result, $temp);
			}
			$result['menunggu'] = $totmenunggu;
			$result['ditolak'] = $totditolak;
			$result['sedang'] = $totsedang;
			$result['sudah'] = $totsudah;
			$result['total'] = $result['menunggu'] + $result['ditolak'] + $result['sedang'] + $result['sudah'];
			return $result;
		} else {
			return false;
		}
	}
	
	public function getLaporanByKategori(){
		$taman = $this->db->query("SELECT * FROM taman");
		$result = array();
		$result['kategori'] = $this->db->query("SELECT * FROM kategori");
		$result['nKategori'] = $this->db->query("SELECT COUNT(DISTINCT id) AS num FROM kategori")[0]['num'];
		if ($taman){
			$result['total'] = 0;
			for($kat=1; $kat<=$result['nKategori']; $kat++){
				$result['kategori'.$kat] = 0;	
			}
			foreach ($taman as $row) {
				$temp = $row;
				$temp['total'] = 0;
				$kat=1;
				foreach ($result['kategori'] as $rec) {
					$temp['kategori'.$kat] = $this->db->query("SELECT COUNT(DISTINCT id) AS num FROM aduan WHERE id_kategori = ".$kat." AND YEAR(waktu) = ".$this->tahun." AND MONTH(waktu) = ".$this->bulan." AND id_taman = ".$row['id'])[0]['num'];
					$temp['total'] += $temp['kategori'.$kat];
					$result['kategori'.$kat] += $temp['kategori'.$kat];
					$kat++; 
				}
				array_push($result, $temp);
			}
			for($kat=1; $kat<=$result['nKategori']; $kat++){
				$result['total'] += $result['kategori'.$kat];	
			}
			return $result;
		} else {
			return false;
		}
	}
}