<?php
include_once('../config/init.php');
include_once('../database/products.php');  
include_once('../database/users.php');  

$response = array();

if (!$_POST['text_review'] || !$_POST['rating-input']) {
	$response["status"] = "false";	
	echo json_encode($response);
	exit;
}

$text_review = strip_tags($_POST['text_review']);
$rating_input= strip_tags($_POST['rating-input']);
$id = strip_tags($_POST['id']);

try {
	$user = getUserById($_SESSION['id']);
    writeReview($_SESSION['id'],$id,$text_review,$rating_input);
	$response["status"] = "true";
	$response["rating"] = $rating_input;
	$response["comment"] = $text_review;
	$response["user_image"] = $user[0]["url"];
	$response["user_name"] = $user[0]["users_name"];
	
	echo json_encode($response);
	exit;
} catch (PDOException $e) {
	$response["status"] = $e->getMessage();
	echo json_encode($response);
	exit;
}
?>
