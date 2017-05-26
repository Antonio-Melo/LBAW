<?php
include_once('../config/init.php');
include_once('../database/products.php');

$response = array();

if (!$_SESSION['username'] || !$_POST['product'] || $_SESSION['admin']) {
	die(header("HTTP/1.0 400 Bad Request"));
}

$reference = $_POST['product'];
$date_ordered = $_POST['product'];
$billing_address = $_POST['product'];
$shipping_address = $_POST['product'];
$shipping_method = $_POST['product'];
$payment_method = $_POST['product'];

try {
	addOrder($reference, $date_ordered, $billing_address, $shipping_address, $shipping_method, $payment_method)
	$response["status"] = true;
	echo json_encode($response);
	exit;
} catch (PDOException $e) {
	die(header("HTTP/1.0 400 Bad Request"));
}
?>
