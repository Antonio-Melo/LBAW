<?php
include_once('../config/init.php');
include_once('../database/users.php');  

$response = array();

if (!$_SESSION['id'] || !$_POST['product'] || $_SESSION['admin']) {
	die(header("HTTP/1.0 400 Bad Request"));
}

$product = $_POST['product'];

try {
	if (removeFavorite($_SESSION['id'], $product)) {
		$response["status"] = true;
		echo json_encode($response);
		exit;
	}
	else {
		die(header("HTTP/1.0 400 Bad Request"));
	}
} catch (PDOException $e) {
	die(header("HTTP/1.0 400 Bad Request"));
}
?>
