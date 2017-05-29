<?php
include_once('../config/init.php');
include_once('../database/users.php'); 
include_once('../database/countries.php');
include_once('../database/admin.php');

$response = array();

if (!$_SESSION['id'] || !$_SESSION['admin'] || !$_POST['id'] || !$_POST['type']) {
	die(header("HTTP/1.0 400 Bad Request"));
}

$order = strip_tags($_POST['id']);
$type = strip_tags($_POST['type']);
$date = date("Y-m-d");

try {
	if (!updateOrder($order, $type, $date)) {
		die(header("HTTP/1.0 400 Bad Request"));
	}
	
	$response["date"] = $date;
	$response["status"] = true;
	echo json_encode($response);
	exit;
} catch (PDOException $e) {	
	die(header("HTTP/1.0 400 Bad Request"));
}
?>
