<?php
include_once('../config/init.php');
include_once('../database/users.php');  
include_once('../database/admin.php');  

$response = array();

$page = $_POST['page'];

if (!$_SESSION['admin'] || !$_POST['email'] || !$_POST['subject'] || strlen($_POST['response']) === 0 || !$_POST['id']) {
	header('Location: ' . $BASE_URL . 'pages/admin-tickets.php?page=' . $page);
	exit;
}

$email = strip_tags($_POST['email']);
$subject = strip_tags($_POST['subject']); 
$response = strip_tags($_POST['response']);
$id = strip_tags($_POST['id']);

try {
	$to = $email;
	$subject = 'RE: .bat Ticket "'+$subject+'"';
	$message = $response;
	
	mail($to, $subject, $message);
	removeTicket($id);
} catch (PDOException $e) {
	header('Location: ' . $BASE_URL . 'pages/admin-tickets.php?page=' . $page);
	exit;
}

header('Location: ' . $BASE_URL . 'pages/admin-tickets.php');
?>