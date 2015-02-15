<?php

include_once("models/taman.php");
include_once("controllers/db.php");

class Model {
	// public $openDB = new DB();
	public function getNamaTaman(){
		$openDB = new DB();
		$sql = "SELECT nama FROM taman";
		$dataNamaTaman = $openDB->query($sql);
		return $dataNamaTaman;
	}
	
}

?>