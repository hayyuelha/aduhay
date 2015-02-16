<?php
include_once("models/model.php");

class AduanCtrl {
	public $model;
    public $namaTaman;
    public $namaKategori;
    public $allAduan;

	// public $database;
	public function __construct()  
    {
        $this->model = new Model();
    }

    public function getAllData() {
    	$this->namaTaman = $this->model->getNamaTaman();
        $this->namaKategori = $this->model->getKategori();
        $this->allAduan = $this->model->getAduan();
    }
}

?>