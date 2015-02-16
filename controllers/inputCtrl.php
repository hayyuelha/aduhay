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
        require_once(__DIR__ . "/db.php");

        // print_r($_POST);

        if (!isset($_POST["deskripsi"]) || !isset($_POST["namataman"]) || !isset($_POST["kategori"])) {
            $_POST["message"] = "Salah bero";
        }
        else {
            $deskripsi      = addslashes($_POST["deskripsi"]);
            $id_kategori    = addslashes($_POST["kategori"]);
            $id_taman       = addslashes($_POST["namataman"]);
            $this->model->insertAduan($deskripsi, $id_kategori, $id_taman);
            $_POST["message"] = "Aduan berhasil dimasukkan!";
        }

        // move to home
        // header("location: index.php");
    }
}

?>