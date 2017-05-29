<?php
include_once('../config/init.php');
include_once('../database/users.php');

$response = array();

if (!$_SESSION['id'] || !$_POST['reference'] || !$_POST['date_ordered'] || !$_POST['billing_address'] || !$_POST['shipping_address'] || !$_POST['shipping_method'] || !$_POST['payment_method'] || !$_POST['products']) {
	die(header("HTTP/1.0 400 Bad Request"));
}

$reference = strip_tags($_POST['reference']);
$date_ordered = strip_tags($_POST['date_ordered']);
$billing_address = strip_tags($_POST['billing_address']);
$shipping_address = strip_tags($_POST['shipping_address']);
$shipping_method = strip_tags($_POST['shipping_method']);
$payment_method = strip_tags($_POST['payment_method']);
$products = $_POST['products'];

try {
	addOrder($reference, $date_ordered, $billing_address, $shipping_address, $shipping_method, $payment_method, $products);
	$response["status"] = true;
	echo json_encode($response);
	exit;
} catch (PDOException $e) {
	die(header("HTTP/1.0 400 Bad Request"));
}
?>
