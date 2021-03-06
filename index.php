<?php

isset($_GET['page']) ? $page = $_GET['page'] : $page = "";

// $page comes from url dan determines active page
switch ($page) {
	case "logout" :
		$body = "views/pages/logout.php";
		break;

	case "aduan_admin" :
		require_once("controllers/aduanCtrl.php");
		$controller = new AduanCtrl();
		$controller->getAllData();
    	$namaTaman = $controller->namaTaman;
    	$namaKategori = $controller->namaKategori;
    	$allAduan = $controller->allAduan;
		$title = "Daftar Aduan";
		$body = "views/pages/aduan_admin.php";
		break;

	case "islogin" :
		$body = "views/pages/islogin.php";
		break;
		
	case "loginsubmit" :
		$body = "views/pages/login_submit.php";
		break;

	case "home"		:
		include_once("controllers/inputCtrl.php");
		$controller = new InputCtrl();
		$controller->invoke_formInput();
		$namaTaman = $controller->namaTaman;
		$namaKategori = $controller->namaKategori;
		$title = "Input Aduan";
		if (isset($_POST['submit'])){
			$controller->post_aduan(); 
			echo '<script type="text/javascript">alert ("Aduan berhasil disimpan.");</script>';
		}
		$body  = "views/pages/home.php";
		break;

	case "aduan":
		require_once("controllers/aduanCtrl.php");
		$controller = new AduanCtrl();
		if (isset($_POST['status'])) { 
			$controller->ubahStatus();
		}
		$controller->getAllData();
    	$namaTaman = $controller->namaTaman;
    	$namaKategori = $controller->namaKategori;
    	$namaStatus = $controller->namaStatus;
    	$numOfAduan = $controller->numOfAduan;
    	$allAduan = $controller->allAduan;
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

// structure of the body of page, consists of header,active page, and footer
include("views/header.php");
include($body);
include("views/footer.php");