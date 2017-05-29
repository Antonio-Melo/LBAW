<?php
include_once('../config/init.php');
include_once('../database/users.php');

$response = array();

$reference = $_POST['reference'];
$date_ordered = $_POST['date_ordered'];
$billing_address = $_POST['billing_address'];
$shipping_address = $_POST['shipping_address'];
$shipping_method = $_POST['shipping_method'];
$payment_method = $_POST['payment_method'];

try {
	addOrder($reference, $date_ordered, $billing_address, $shipping_address, $shipping_method, $payment_method);
	$response["status"] = true;
	echo json_encode($response);
	exit;
} catch (PDOException $e) {
	die(header("HTTP/1.0 400 Bad Request"));
}
?>
