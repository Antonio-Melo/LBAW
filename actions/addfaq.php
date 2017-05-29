<?php
include_once('../config/init.php');
include_once('../database/products.php');
include_once('../database/users.php');
include_once('../database/admin.php');

$response = array();

if (!$_POST['product_id'] || !$_POST['question'] || !$_POST['answer'] || !$_SESSION['id'] || !$_SESSION['admin']) {
	header('Location: ' . $BASE_URL . 'pages/product.php?id=' . $_POST['product_id']);
}

$product = strip_tags($_POST['product_id']);
$question = strip_tags($_POST['question']);
$answer = strip_tags($_POST['answer']);

try {
    addFaq($product, $question, $answer);
} catch (PDOException $e) {}
	
header('Location: ' . $BASE_URL . 'pages/product.php?id=' . $_POST['product_id']);
?>