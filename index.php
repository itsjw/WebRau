<?php

session_start();

require_once "backend/config.php";
require_once backend . "constructor.php";

$creator = constructor::getInstance();

if ($_GET[0] == "admin") {
	if (isset($_SESSION['u_id'])) {
		$creator->view = "admin";
	} else {
		$creator->view = "login";
	}
} else {
	$creator->view = "view";
}

$creator->build();

?>
