<?php

securisation_formulaire();

if (isset($_SESSION['connected']) && $_SESSION['connected'] == true) {
	header("Location: index.php");
	} else if (isset($_POST['nickname']) && isset($_POST['password'])) {
		$membres_manager->checkConnectionInfos($_POST['nickname'], $_POST['password']);
		if($membres_manager->checkConnectionInfos($_POST['nickname'], $_POST['password'])) {
			$_SESSION['connected'] = true;
			$_SESSION['nickname'] = $_POST['nickname'];
			header("Location: index.php");
		} else {
			include_once("view/frontend/connection.php");
	}
} else {
	include_once("view/frontend/connection.php");
}




