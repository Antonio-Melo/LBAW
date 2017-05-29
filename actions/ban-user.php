<?php
include_once('../config/init.php');
include_once('../database/users.php');
include_once('../database/admin.php');

$response = array();

if (!$_POST['id'] || !$_POST['report_id']) {
    header('Location: ' . $BASE_URL . 'pages/home.php');
}
$id = strip_tags($_POST['id']);
$report_id = strip_tags($_POST['report_id']);

try {
    banUser($id);
    removeReport($report_id);
} catch (PDOException $e) {
    header('Location: ' . $BASE_URL . 'pages/check-reports.php');
}

header('Location: ' . $BASE_URL . 'pages/check-reports.php');
?>
