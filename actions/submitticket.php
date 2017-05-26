<?php
	include_once('../config/init.php');
	include_once('../database/users.php');
	
	if (!$_SESSION['id'] || !$_POST['subject'] || !$_POST['description']) {
		die(header("HTTP/1.0 400 Bad Request"));
	}
	
	$user = $_SESSION['id'];
	$subject = $_POST['subject'];
	$description = $_POST['description'];
	
	try {
		addTicket($user, $subject, $description);
	} catch (PDOException $e) {
		die(header("HTTP/1.0 400 Bad Request"));
	}
	
	header('Location: ' . $BASE_URL . 'pages/contact-us.php');
?>