<?php
include_once('../config/init.php');
include_once('../database/users.php');
include_once('../database/products.php');

$response = array();

if (!$_SESSION['id'] || !$_POST['reply']) {
	die(header("HTTP/1.0 400 Bad Request"));
}

$reply = strip_tags($_POST['reply']);

try {
	$r = getReplyById($reply);
	if ($r['user'] === $_SESSION['id'] || $_SESSION['admin']) {
		removeReply($reply);
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
