<?php
include_once('../config/init.php');
include_once('../database/users.php');

$response = array();

if ($_POST['username']) {
	$username = strip_tags($_POST['username']);
	
	if (checkUsername($username)) {
		$response["status"] = "false";
		echo json_encode($response);
		exit;
	}
	
	$response["status"] = "true";
	echo json_encode($response);
	exit;
}

if ($_POST['email']) {
	$email = strip_tags($_POST['email']);
	
	if (checkEmail($email)) {
		$response["status"] = "false";
		echo json_encode($response);
		exit;
	}
	
	$response["status"] = "true";
	echo json_encode($response);
	exit;
}

?>
