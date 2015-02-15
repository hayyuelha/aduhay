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

    public function invoke_opsiTaman(){
    	$namaTaman = $this->model->getNamaTaman();
    	include 'views/pages/home.php';
    }

	
}

?>