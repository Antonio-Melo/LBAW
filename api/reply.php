<?php
include_once('../config/init.php');
include_once('../database/products.php');
include_once('../database/users.php');

$response = array();

if (!$_POST['text_reply'] || !$_POST['id_review']) {
    $response["status"] = "false";
    echo json_encode($response);
    exit;
}

$text_reply = strip_tags($_POST['text_reply']);
$id_review = strip_tags($_POST['id_review']);

try {
    $user = getUserById($_SESSION['id']);
    writeReply($_SESSION['id'],$id_review,$text_reply);
    $response["status"] = "true";

    echo json_encode($response);
    exit;
} catch (PDOException $e) {
    $response["status"] = $e->getMessage();
    echo json_encode($response);
    exit;
}
?>