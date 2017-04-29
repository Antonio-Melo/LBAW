<?php
include_once('../config/init.php');
include_once('../database/users.php');

$response = array();

try {
	if ($_POST['username']) {
		$username = strip_tags($_POST['username']);
		
		if (checkUsername($username)) {
			$response["status"] = false;
		}
		else {
			$response["status"] = true;
		}
		
		echo json_encode($response);
		exit;
	}

	if ($_POST['email']) {
		$email = strip_tags($_POST['email']);
		
		if (checkEmail($email)) {
			$response["status"] = false;
		}
		else {
			$response["status"] = true;
		}
		
		echo json_encode($response);
		exit;
	}
}
catch (PDOException $e) {
	die(header("HTTP/1.0 500 Internal Server Error"));
}

?>
