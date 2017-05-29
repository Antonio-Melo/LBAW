<?php
include_once('../config/init.php');
include_once('../database/users.php');  
include_once('../database/countries.php');  

$response = array();

$user_id = $_SESSION['id'];
$street = strip_tags($_POST['street']);
$door = strip_tags($_POST['door']);
$zip = strip_tags($_POST['zip']);
$city = strip_tags($_POST['city']);
$region = strip_tags($_POST['region']);
$country = strip_tags($_POST['country']);
$phone = strip_tags($_POST['phone']);

if (!$_SESSION['id'] || $street || $door || $zip || $city || $region || $country || $phone || $admin) {
	die(header("HTTP/1.0 400 Bad Request"));
}

try {
	$new_address = addAddress($user_id, $street, $door, $zip, $city, $region, $country, $phone);
	$country_name = getCountryById($country);
	
	$response["country_name"] = $country_name[0]['name'];
	$response["country_list"] = getAllCountries();
	$response["address_id"] = $new_address[0]['id'];
	$response["status"] = true;
	echo json_encode($response);
	exit;
} catch (PDOException $e) {
	die(header("HTTP/1.0 400 Bad Request"));
}
?>
