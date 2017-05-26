<?php
include_once('../config/init.php');
include_once('../database/products.php');
include_once('../database/users.php');

$response = array();

if (!$_POST['text_reply']) {
    $response["status"] = "false";
    echo json_encode($response);
    exit;
}

$text_reply = strip_tags($_POST['text_review']);
$id = strip_tags($_POST['id']);

try {
    $user = getUserById($_SESSION['id']);
    //writeReview($_SESSION['id'],$id,$text_review,$rating_input);
    $response["status"] = "true";

    echo json_encode($response);
    exit;
} catch (PDOException $e) {
    $response["status"] = $e->getMessage();
    echo json_encode($response);
    exit;
}
?>