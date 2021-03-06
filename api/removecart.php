<?php
include_once('../config/init.php');
include_once('../database/users.php');  

$response = array();

if (!$_SESSION['id']) {
	$response["status"] = false;
	echo json_encode($response);
	exit;
}

if (!$_POST['product'] || $_SESSION['admin']) {
	die(header("HTTP/1.0 400 Bad Request"));
}

$id = $_SESSION['id'];
$product = strip_tags($_POST['product']);

try {
	removeCartProduct($id, $product);
	$response["status"] = true;
	echo json_encode($response);
	exit;
} catch (PDOException $e) {
	die(header("HTTP/1.0 400 Bad Request"));
}
?>
