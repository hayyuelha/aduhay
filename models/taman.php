<?php

require_once("/../controllers/db.php");

class Taman {
	public $id;
	public $nama;
	public $lokasi;

	public function getAll() {
		$db = new DB();
		$temp = $db->select("SELECT * FROM `taman`");
		$result = array();
		foreach ($temp as $row) {
			$taman = new Taman();
			$taman->id = $row["id"];
			$taman->nama = $row["nama"];
			$taman->lokasi = $row["lokasi"];
			array_push($result, $taman);
		}
		return $result;
	}
}