<?php

require_once("/../controllers/db.php");

class Kategori {
	public $id;
	public $nama_kategori;

	public function getAll() {
		$db = new DB();
		$temp = $db->select("SELECT * FROM `kategori`");
		$result = array();
		foreach ($temp as $row) {
			$kategori = new Kategori();
			$kategori->id = $row["id"];
			$kategori->nama_kategori = $row["nama_kategori"];
			array_push($result, $kategori);
		}
		return $result;
	}
}