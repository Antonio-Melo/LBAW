<?php
include_once('../config/init.php');
include_once('../database/users.php');  

$response = array();

if (!$_POST['username'] || !$_POST['password'] || !$_POST['confirm']) {
	header('Location: ' . $BASE_URL . 'pages/failedreset.php');
	exit;
}

$user = strip_tags($_POST['username']);
$password = strip_tags($_POST['password']); 
$confirm = strip_tags($_POST['confirm']);

if ($password !== $confirm || strlen($password) < 6 || strlen($password) > 128) {
	header('Location: ' . $BASE_URL . 'pages/failreset.php');
}

try {
	resetPassword($user, $password);
} catch (PDOException $e) {
	header('Location: ' . $BASE_URL . 'pages/failreset.php');
	exit;
}

header('Location: ' . $BASE_URL . 'pages/successreset.php');
?>
