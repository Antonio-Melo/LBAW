<?php
include_once('../config/init.php');
include_once('../database/users.php');

$response = array();

if (!$_SESSION['username'] || !$_POST['username'] || !$_POST['name'] || !$_POST['email'] || !$_POST['country']) {
	$response["status"] = "false";	
	echo json_encode($response);
	exit;
}

$original_username = $_SESSION['username'];
$username = strip_tags($_POST['username']);
$name = strip_tags($_POST['name']);
$email = strip_tags($_POST['email']);
$country = strip_tags($_POST['country']);

try {
	editUser($original_username, $username, $name, $email, $country);	
	$_SESSION['username'] = $username;
	$response["status"] = "true";
	echo json_encode($response);
	exit;
} catch (PDOException $e) {
	$response["status"] = $e->getMessage();
	echo json_encode($response);
	exit;
}
?>
