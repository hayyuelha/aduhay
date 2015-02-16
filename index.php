<?php

isset($_GET['page']) ? $page = $_GET['page'] : $page = "";

switch ($page) {
	/* Pages */
	case "":
		$title = "Home";
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

	/* Forms */
	case "input_aduan":
		include("controllers/input_aduan.php");
		exit(0);

	default:
		$title = "Error";
		$body  = "views/pages/error.php";
}

include("views/header.php");
include($body);
// echo "page = [" . $page . "]";
include("views/footer.php");
