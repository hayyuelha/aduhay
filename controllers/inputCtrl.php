<?php
include_once("models/model.php");

class InputCtrl {
	public $model;
	// public $database;
	public function __construct()  
    {  
        $this->model = new Model();
        // $this->database = new DB();
    }

    public function invoke_formInput(){
    	$namaTaman = $this->model->getNamaTaman();
        $namaKategori = $this->model->getKategori();
    	include 'views/pages/home.php';
    }

    public function post_aduan(){
        $deskripsi = $_POST['deskripsi'];
        $id_taman = $_POST['namataman'];
        $id_kategori = $_POST['kategori'];
        $this->model->insertAduan($deskripsi, $id_kategori, $id_taman);
        
    }
}

?>