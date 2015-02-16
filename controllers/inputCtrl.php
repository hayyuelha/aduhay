<?php
include_once("models/model.php");

class InputCtrl {
	public $model;
    public $namaTaman;
    public $namaKategori;

	// public $database;
	public function __construct()  
    {  
        $this->model = new Model();
        // $this->database = new DB();
    }

    public function invoke_formInput(){
    	$this->namaTaman = $this->model->getNamaTaman();
        $this->namaKategori = $this->model->getKategori();
    	// include 'views/pages/home.php';
    }

    public function post_aduan(){
        
    }
}

?>