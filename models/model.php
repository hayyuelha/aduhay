<?php

include_once("models/taman.php");
include_once("controllers/db.php");

class Model {
	public $openDB;

	public function __construct(){
		$this->openDB = new DB();
	}

	public function getNamaTaman(){
		// $openDB = new DB();
		$sql = "SELECT * FROM taman";
		$dataNamaTaman = $this->openDB->query($sql);		
		return $dataNamaTaman;
	}

	public function getKategori(){
		$sql = "SELECT * FROM kategori";
		$dataKategori = $this->openDB->query($sql);		
		return $dataKategori;
	}

	public function getStatus() {
		$sql = "SELECT * FROM status";
		$dataKategori = $this->openDB->query($sql);		
		return $dataKategori;
	}

	public function getAduan() {
    	$sql = "SELECT aduan.*, taman.nama AS taman, kategori.nama_kategori AS kategori, status.nama_status AS status " .
    			"FROM aduan, taman, kategori, status WHERE " .
    			"aduan.id_taman = taman.id AND aduan.id_kategori = kategori.id AND aduan.id_status = status.id";
    	return $this->openDB->select($sql);
    }
	
	public function insertAduan($deskripsi, $id_kategori, $id_taman){
		$sql = "INSERT INTO `aduan`(`deskripsi`, `id_kategori`, `id_status`, `id_taman`, `waktu`) VALUES ('" . $deskripsi . "', " . $id_kategori . ", 1, " . $id_taman . ", NOW())";
        $db = new DB();
        $db->insert($sql);
	}

	public function ubahStatus($id_aduan, $id_status, $id_admin) {
        $sql = "INSERT INTO `ubah_status` (`waktu`, `id_status`, `id_admin`, `id_aduan`) VALUES "
            . "(NOW(), " . $id_status . ", " . $id_admin . ", " . $id_aduan . ")";
        $this->openDB->insert($sql);
        $sql = "UPDATE `aduan` SET `id_status` = " . $id_status . " WHERE `id` = " . $id_aduan;
        $this->openDB->update($sql);
	}

	public function countNewAduanTaman($id_taman){
		$sql = "SELECT count( id ) AS num FROM aduan WHERE id_taman = ".$id_taman." AND id_status =1";
		$db = new DB();
		$count = $db->query($sql)[0]['num'];
		return $count;
	}

	public function countNewAduan(){
		$sql = "SELECT count( id ) AS num FROM aduan WHERE id_status =1";
		$db = new DB();
		$count = $db->query($sql)[0]['num'];
		return $count;
	}
}

?>