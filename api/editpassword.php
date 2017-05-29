<?php
include_once('../config/init.php');
include_once('../database/users.php');  

$response = array();

if (!$_SESSION['id'] || !$_POST['old_password'] || !$_POST['new_password']) {
	die(header("HTTP/1.0 400 Bad Request"));
}

$old_password = strip_tags($_POST['old_password']);
$new_password = strip_tags($_POST['new_password']);

try {
	if (changePassword($_SESSION['id'], $old_password, $new_password)) {
		$response["status"] = true;
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