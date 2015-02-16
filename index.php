<?php

isset($_GET['page']) ? $page = $_GET['page'] : $page = "";

switch ($page) {
	case "home"		:
		include_once("controllers/inputCtrl.php");
		$title = "Input Aduan";
		$controller = new InputCtrl();
		$controller->invoke_formInput();
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
		if(isset($_POST['optradio1'])){
			echo $laporan->template1();	
		} else if (isset($_POST['optradio2'])){
			echo $laporan->template2();
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
