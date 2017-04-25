<?php
include_once('../config/init.php');
include_once('../database/products.php');  

$response = array();

if (!$_POST['text_review']) {
	$response["status"] = "false";	
	echo json_encode($response);
	exit;
}

$text_review = strip_tags($_POST['text_review']);

try {
	//createUser($username, $name, $email, $password, $country);
	$response["status"] = "true";
	echo json_encode($response);
	exit;
} catch (PDOException $e) {
	$response["status"] = $e->getMessage();
	echo json_encode($response);
	exit;
}
?>
