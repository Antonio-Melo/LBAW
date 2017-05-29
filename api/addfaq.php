<?php
include_once('../config/init.php');
include_once('../database/products.php');
include_once('../database/users.php');
include_once('../database/admin.php');

$response = array();

if (!$_POST['product_id'] || !$_POST['question'] || !$_POST['answer'] || !$_SESSION['id'] || !$_SESSION['admin']) {
	die(header("HTTP/1.0 400 Bad Request"));
}

$product = strip_tags($_POST['product_id']);
$question = strip_tags($_POST['question']);
$answer = strip_tags($_POST['answer']);

try {
	addFaq($product, $question, $answer);
	$faqs = getFaqsByProductId($product);
	$response['faqs'] = $faqs;	
	$response['status'] = true;
	echo json_encode($response);
	exit;
} catch (PDOException $e) {
	die(header("HTTP/1.0 400 Bad Request"));
}
?>