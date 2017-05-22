<?php
include_once('../config/init.php');
include_once('../database/users.php');  

$response = array();

if (!$_SESSION['id'] || !$_POST['oldpwd'] || !$_POST['pwd'] || || !$_POST['newpwd']) {
	die(header("HTTP/1.0 400 Bad Request"));
}

$old_password = $_POST['oldpwd'];
$new_password = $_POST['pwd']; 
$confirm = $_POST['newpwd']);

if ($new_password !== $confirm) {
	die(header("HTTP/1.0 400 Bad Request"));
}

try {
	if (!changePassword($_SESSION['id'], $old_password, $new_password)) {
		die(header("HTTP/1.0 400 Bad Request"));
	}
} catch (PDOException $e) {
	die(header("HTTP/1.0 400 Bad Request"));
}
	
header('Location: ' . $BASE_URL . 'pages/profile.php');
?>
