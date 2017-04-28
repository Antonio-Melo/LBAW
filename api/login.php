<?php
include_once('../config/init.php');
include_once('../database/users.php');  

$response = array();

if (!$_POST['username'] || !$_POST['password']) {
	$response["status"] = "false";
	echo json_encode($response);
	exit;
}

$username = strip_tags($_POST['username']);
$password = strip_tags($_POST['password']);

try {
	$response["status"] = loginCorrect($username, $password);
	if ($response["status"]) {
		$_SESSION['id'] = $response["status"];
		if (isAdmin($response["status"])) {
			$_SESSION['admin'] = true;
		}
	}
	echo json_encode($response);
} catch (PDOException $e) {
	die(header("HTTP/1.0 500 Internal Server Error"));
}
?>

