<?php
include_once('../config/init.php');
include_once('../database/products.php');

$response = array();

if (!$_SESSION['username'] || !$_POST['product'] || $_SESSION['admin']) {
	die(header("HTTP/1.0 400 Bad Request"));
}

$username = $_SESSION['username'];

try {
	//createUser($username, $name, $email, $password, $country);
	$response["status"] = "true";
	echo json_encode($response);
	exit;
} catch (PDOException $e) {
	$response["status"] = $e->getMessage();
	echo json_encode($response);
	exit;
}
?>
