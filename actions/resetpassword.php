<?php
include_once('../config/init.php');
include_once('../database/users.php');  

$response = array();

if (!$_POST['username'] || !$_POST['password'] || !$_POST['confirm']) {
	header('Location: ' . $BASE_URL . 'pages/home.php');
}

$user = $_POST['username'];
$password = $_POST['password']; 
$confirm = $_POST['confirm'];

if ($password !== $confirm || strlen($password) < 6 || strlen($password) > 128) {
	header('Location: ' . $BASE_URL . 'pages/home.php');
}

try {
	resetPassword($user, $password);
} catch (PDOException $e) {}
	
//header('Location: ' . $BASE_URL . 'pages/home.php');
?>
