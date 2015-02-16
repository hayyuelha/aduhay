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
		$sql = "INSERT INTO aduan (waktu, deskripsi, id_kategori, id_status, id_taman) VALUES (NOW(), $deskripsi, $id_kategori, 1, $id_taman)";
		$result = $this->openDB->query($sql);
	}
}

?>