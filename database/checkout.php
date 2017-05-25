<?php

function getAllShippingMethods() {
	global $conn;
	$stmt = $conn->prepare('SELECT * FROM shippingmethod');
	$stmt->execute();

	return $stmt->fetchAll();
}

function getAllPaymentMethods() {
	global $conn;
	$stmt = $conn->prepare('SELECT * FROM paymentmethod');
	$stmt->execute();

	return $stmt->fetchAll();
}

?>
