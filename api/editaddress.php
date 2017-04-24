<?php
include_once('../config/init.php');
include_once('../database/users.php');  

$response = array();

if (!$_SESSION['username'] || !$_POST['id'] || !$_POST['street'] || !$_POST['door'] || !$_POST['zip'] || !$_POST['city'] || !$_POST['region'] || !$_POST['country'] || !$_POST['phone'] || $_SESSION['admin']) {
	die(header("HTTP/1.0 400 Bad Request"));
}

$username = $_SESSION['username'];
$id = $_POST['id'];
$street = $_POST['street'];
$door = $_POST['door'];
$zip = $_POST['zip'];
$city = $_POST['city'];
$region = $_POST['region'];
$country = $_POST['country'];
$phone = $_POST['phone'];

try {
	editAddress($id, $username, $street, $door, $zip, $city, $region, $country, $phone);
	$response["status"] = "true";
	echo json_encode($response);
	exit;
} catch (PDOException $e) {
	die(header("HTTP/1.0 400 Bad Request"));
}
?>
