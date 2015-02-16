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
	
	public function insertAduan($deskripsi, $id_kategori, $id_taman){
		$sql = "INSERT INTO `aduan`(`deskripsi`, `id_kategori`, `id_status`, `id_taman`, `waktu`) VALUES ('" . $deskripsi . "', " . $id_kategori . ", 1, " . $id_taman . ", NOW())";
        $db = new DB();
        $db->insert($sql);
	}
}

?>