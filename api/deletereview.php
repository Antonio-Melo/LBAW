<?php
include_once('../config/init.php');
include_once('../database/users.php');
include_once('../database/products.php');

$response = array();

if (!$_SESSION['id'] || !$_POST['review']) {
	die(header("HTTP/1.0 400 Bad Request"));
}

$review = strip_tags($_POST['review']);

try {
	$r = getReviewById($review);
	if ($r['client'] === $_SESSION['id'] || $_SESSION['admin']) {
		removeReview($review);
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
