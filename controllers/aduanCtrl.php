<?php
include_once("models/model.php");

class AduanCtrl {
	public $model;
    public $namaTaman;
    public $namaKategori;
    public $allAduan;
    public $numOfAduan;
    public $numOfAduanTaman;

	// public $database;
	public function __construct()  
    {
        $this->model = new Model();
    }

    public function getAllData() {
    	$this->namaTaman = $this->model->getNamaTaman();
        $this->namaKategori = $this->model->getKategori();
        $this->allAduan = $this->model->getAduan();
        $this->newAduan(1);
    }

    public function newAduan($id_taman){
        $this->numOfAduan = $this->model->countNewAduan();
        $this->numOfAduanTaman = $this->model->countNewAduanTaman($id_taman);
    }
}

?>