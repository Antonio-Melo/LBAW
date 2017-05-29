<?php
include_once('../config/init.php');
include_once('../database/products.php');
include_once('../database/users.php');
include_once('../api/common.php');

$response = array();



if (!$_SESSION['id'] || !$_SESSION['admin'] || !$_POST['initial_name'] || !$_POST['id'] || !$_POST['name'] ||!$_POST['full-name'] ||!$_POST['sm-description'] ||!$_POST['price'] ||!$_POST['qty'] ||!$_POST['lg-description'] ||!$_POST['keyword']||!$_POST['brand']) {
    header('Location: ' . $BASE_URL . 'pages/editproduct.php?id=' . $id);
	exit;
}

//get id from brand
$brand = strip_tags($_POST['brand']);
//get id from category
$keyword = strip_tags($_POST['keyword']);
$name = strip_tags($_POST['name']);
$full_name = strip_tags($_POST['full-name']);
$sm_description = strip_tags($_POST['sm-description']);
$price = strip_tags($_POST['price']);
$qty = strip_tags($_POST['qty']);
$lg_description = strip_tags($_POST['lg-description']);
$id = strip_tags($_POST['id']);

try {
    updateProduct($name,$full_name,$sm_description,$price,$qty,$lg_description,$keyword,$brand, $id);
	
	if ($_FILES['imageinput']) {
		uploadMultipleImages($id);
	}	
	
    header('Location: ' . $BASE_URL . 'pages/product.php?id=' . $id);
	exit;
} catch (PDOException $e) {
	header('Location: ' . $BASE_URL . 'pages/editproduct.php?id=' . $id);
	exit;
}
?>