<?php
include_once('../config/init.php');
include_once('../database/users.php');
include_once('../database/admin.php');

$response = array();

if (!$_PSOT['id']) {
    header('Location: ' . $BASE_URL . 'pages/home.php');
}

try {
    if ($_POST['category'] && strlen($_POST['category']) > 0) {
        addNewKeyword($_POST['category']);
    }
    else if ($_POST['brand'] && strlen($_POST['brand']) > 0) {
        addNewBrand($_POST['brand']);
    }
} catch (PDOException $e) {
    header('Location: ' . $BASE_URL . 'pages/add-keywords.php');
}

header('Location: ' . $BASE_URL . 'pages/add-keywords.php');
?>
