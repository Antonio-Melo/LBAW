<?php
include_once('../config/init.php');
include_once('../database/users.php'); 
include_once('../database/countries.php');

$response = array();

if (!$_SESSION['id'] || !$_POST['id'] || !$_POST['street'] || !$_POST['door'] || !$_POST['zip'] || !$_POST['city'] || !$_POST['region'] || !$_POST['country'] || !$_POST['phone'] || $_SESSION['admin']) {
	die(header("HTTP/1.0 400 Bad Request"));
}

$user_id = $_SESSION['id'];
$id = strip_tags($_POST['id']);
$street = strip_tags($_POST['street']);
$door = strip_tags($_POST['door']);
$zip = strip_tags($_POST['zip']);
$city = strip_tags($_POST['city']);
$region = strip_tags($_POST['region']);
$country = strip_tags($_POST['country']);
$phone = strip_tags($_POST['phone']);

try {
	editAddress($id, $user_id, $street, $door, $zip, $city, $region, $country, $phone);
	
	$country_name = getCountryById($country);
	
	$response["country"] = $country_name[0]['name'];
	$response["status"] = true;
	echo json_encode($response);
	exit;
} catch (PDOException $e) {
	die(header("HTTP/1.0 400 Bad Request"));
}
?>
