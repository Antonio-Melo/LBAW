<?php
include_once('../config/init.php');
include_once('../database/users.php');

$response = array();

$reference = $_POST['reference'];
$product = $_POST['product'];
$price_paid = $_POST['price_paid'];
$nr_units = $_POST['nr_units'];

try {
	addProductsOrder($reference, $product, $price_paid, $nr_units);
	$response["status"] = true;
	echo json_encode($response);
	exit;
} catch (PDOException $e) {
	die(header("HTTP/1.0 400 Bad Request"));
}
?>
