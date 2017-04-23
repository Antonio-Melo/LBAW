<?php
include_once('../config/init.php');
include_once('../database/users.php');  

$response = array();

if (!$_SESSION['username'] || !$_POST['address'] || $_SESSION['admin']) {
	die(header("HTTP/1.0 400 Bad Request"));
}

$address = $_POST['address'];

try {
	if (removeAddress($address)) {
		$response["status"] = "true";
		echo json_encode($response);
		exit;
	}
	else {
		die(header("HTTP/1.0 400 Bad Request"));
	}
} catch (PDOException $e) {
	die(header("HTTP/1.0 400 Bad Request"));
}
?>
