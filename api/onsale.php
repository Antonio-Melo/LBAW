<?php
include_once('../config/init.php');
include_once('../database/users.php');  
include_once('../database/admin.php');  

$response = array();

if (!$_SESSION['id'] || !$_SESSION['admin'] || !$_POST['id']) {
	die(header("HTTP/1.0 400 Bad Request"));
	exit;
}

$product = strip_tags($_POST['id']);
$price = strip_tags($_POST['price']);

try {
	if ($price) {
		startSale($product, $price);
	}
	else {
		deleteSale($product);
	}
	$response["status"] = true;
	echo json_encode($response);
	exit;
} catch (PDOException $e) {
	die(header("HTTP/1.0 400 Bad Request"));
}
?>
