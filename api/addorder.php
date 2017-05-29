<?php
include_once('../config/init.php');
include_once('../database/products.php');

$response = array();

if (!$_SESSION['username'] || !$_POST['product'] || $_SESSION['admin']) {
	die(header("HTTP/1.0 400 Bad Request"));
}

$reference = strip_tags($_POST['product']);
$date_ordered = strip_tags($_POST['product']);
$billing_address = strip_tags($_POST['product']);
$shipping_address = strip_tags($_POST['product']);
$shipping_method = strip_tags($_POST['product']);
$payment_method = strip_tags($_POST['product']);

try {
	addOrder($reference, $date_ordered, $billing_address, $shipping_address, $shipping_method, $payment_method)
	$response["status"] = true;
	echo json_encode($response);
	exit;
} catch (PDOException $e) {
	die(header("HTTP/1.0 400 Bad Request"));
}
?>
