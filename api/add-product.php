<?php
include_once('../config/init.php');
include_once('../database/products.php');
include_once('../database/users.php');

$response = array();

if (!$_POST['name'] ||!$_POST['full-name'] ||!$_POST['sm-description'] ||!$_POST['price'] ||!$_POST['qty'] ||!$_POST['lg-description']) {
    die(header("HTTP/1.0 400 Bad Request"));
}

$name = strip_tags($_POST['name']);
$full_name = strip_tags($_POST['full-name']);
$sm_description = strip_tags($_POST['sm-description']);
$price = strip_tags($_POST['price']);
$qty = strip_tags($_POST['qty']);
$image = strip_tags($_POST['image-input']);
$lg_description = strip_tags($_POST['lg-description']);
echo ($name+$full_name+$sm_description+$price+$qty+$lg_description);

try {
    insertProduct($name,$full_name,$sm_description,$price,$qty,$image,$lg_description,$category,$brand);

    $response["status"] = true;
    echo json_encode($response);
    exit;
} catch (PDOException $e) {
    die(header("HTTP/1.0 500 Internal Server Error"));
}
?>