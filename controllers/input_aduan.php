<?php

// insert into db
require_once(__DIR__ . "/db.php");

print_r($_POST);

if (!isset($_POST["deskripsi"]) || !isset($_POST["taman"]) || !isset($_POST["kategori"])) {
	$_POST["message"] = "Salah bero";
}
else {
	$deskripsi 		= addslashes($_POST["deskripsi"]);
	$id_kategori 	= addslashes($_POST["kategori"]);
	$id_taman 		= addslashes($_POST["taman"]);
	$sql = "INSERT INTO `aduan`(`deskripsi`, `id_kategori`, `id_status`, `id_taman`, `waktu`) VALUES ('" . $deskripsi . "', " . $id_kategori . ", 1, " . $id_taman . ", NOW())";
	echo $sql;
	$db = new DB();
	$db->insert($sql);
	$_POST["message"] = "Aduan berhasil dimasukkan!";
}

// move to home
header("location: index.php");