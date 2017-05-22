<?php
include_once('../config/init.php');
include_once('../database/users.php');
include_once('../database/countries.php');
include_once('common.php');

$response = array();

if (!$_SESSION['id']) {
	$response["status"] = false;
	echo json_encode($response);
	exit;
}

if (!$_POST['username'] || !$_POST['name'] || !$_POST['email'] || !$_POST['country']) {
	die(header("HTTP/1.0 400 Bad Request"));
}

$username = strip_tags($_POST['username']);
$name = strip_tags($_POST['name']);
$email = strip_tags($_POST['email']);
$country = strip_tags($_POST['country']);

try {
	editUser($_SESSION['id'], $username, $name, $email, $country);
	if ($_FILES['avatar']) {
		$url = uploadImage('avatar');
		if ($url) {
			$old_url = addUserImage($username, $url);
			if ($old_url != "") {
				removeImage('avatar', $old_url);
			}
		}
	}
	
	$country_name = getCountryById($country);
	
	$response["username"] = $username;
	$response["name"] = $name;
	$response["email"] = $email;
	$response["country"] = $country_name[0]['name'];
	$response["status"] = true;
	echo json_encode($response);
	exit;
} catch (PDOException $e) {
	die(header("HTTP/1.0 500 Internal Server Error"));
}
?>
