<?php

isset($_GET['page']) ? $page = $_GET['page'] : $page = "";

switch ($page) {

	case "home"		:
		include_once("controllers/inputCtrl.php");
		$title = "Input Aduan";
		$controller = new InputCtrl();
		$controller->invoke_formInput();
		$namaTaman = $controller->namaTaman;
		$namaKategori = $controller->namaKategori;
		if (isset($_POST['submit'])){
			$controller->post_aduan(); //perlu kasih if "post_aduan() berhasil" ?
			echo '<script type="text/javascript">alert ("Aduan berhasil disimpan.");</script>';
		}
		$body  = "views/pages/home.php";
		break;

	case "aduan":
		$title = "Daftar Aduan";
		$body  = "views/pages/aduan.php";
		break;

	case "login":
		$title = "Login";
		$body  = "views/pages/login.php";
		break;

	case "laporan":
		$title = "Laporan";
		require_once('controllers/laporan.php');
		$bulan = $_POST['bulan'];
		$tahun = $_POST['tahun'];
		$laporan = new laporan($bulan, $tahun);
		if($_POST['optradio'] == "1"){
			echo $laporan->template1();	
		} else if ($_POST['optradio'] == "2"){
			echo $laporan->template2();
		} else if ($_POST['optradio'] == "3"){
			echo $laporan->template3();
		}
		break;

	default:
		$title = "Error";
		$body  = "views/pages/error.php";
}

include("views/header.php");
include($body);
// echo "page = [" . $page . "]";
include("views/footer.php");
