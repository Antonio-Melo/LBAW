<?php
include_once('../config/init.php');
include_once('../database/products.php');
include_once('../database/users.php');

$response = array();

if (!$_POST['id_review']) {
    die(header("HTTP/1.0 400 Bad Request"));
}

$text_report = strip_tags($_POST['text_report']);
$id_review = strip_tags($_POST['id_review']);

try {
    addReport($_SESSION['id'], $id_review, $text_report);
	
    $response["status"] = true;
    echo json_encode($response);
    exit;
} catch (PDOException $e) {
    die(header("HTTP/1.0 500 Internal Server Error"));
}
?>