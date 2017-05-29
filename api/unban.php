<?php
include_once('../config/init.php');
include_once('../database/products.php');
include_once('../database/users.php');
include_once('../database/admin.php');

$response = array();

if (!$_POST['id']) {
    die(header("HTTP/1.0 400 Bad Request"));
}

$id = strip_tags($_POST['id']);

try {
    unbanUser($id);
    $response["status"] = true;

    echo json_encode($response);
    exit;
} catch (PDOException $e) {
    die(header("HTTP/1.0 500 Internal Server Error"));
}
?>
