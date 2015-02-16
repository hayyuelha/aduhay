<?php
include_once("models/model.php");

class AduanCtrl {
	public $model;
    public $namaTaman;
    public $namaKategori;
    public $namaStatus;
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
        $this->namaStatus = $this->model->getStatus();
        $this->allAduan = $this->model->getAduan();
        $this->newAduan(1);
    }

    public function newAduan($id_taman){
        $this->numOfAduan = $this->model->countNewAduan();
        $this->numOfAduanTaman = $this->model->countNewAduanTaman($id_taman);
    }

    public function ubahStatus() {
        session_start();
        $id_aduan = addslashes($_POST['id_aduan']);
        $id_status = addslashes($_POST['status']);
        $id_admin = addslashes($_SESSION['user_id']);
        $this->model->ubahStatus($id_aduan, $id_status, $id_admin);
    }
}

?>