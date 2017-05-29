<?php
	include_once('../config/init.php');
	include_once('../database/users.php');
	
	if ($_SESSION['id'] || !$_POST['username']) {
		header('Location: ' . $BASE_URL . 'pages/home.php');
		exit;
	}
	
	$user = strip_tags($_POST['username']);
	
	try {
		$user_info = getUserByUsernameEmail($user);
		$id = hash('sha256', $user_info['username'] . time());
		
		createToken($id, $user_info['id']);
		
		$link = 'http://gnomo.fe.up.pt/~lbaw1663/LBAW/pages/resetpassword.php?id=' . $id;
		
		$to = $user_info['email'];
		$subject = '.bat Password Retrieval';
		
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		
		$message = '<html><body>';
		$message .= '<p>This email was sent because someone is trying to retrive the password of your .bat account.</p>';
		$message .= '<p>If this was you please use the following link to change your password: </p>';
		$message .= '<a href=';
		$message .= $link;
		$message .= '>';
		$message .= $link;
		$message .= '</a>';
		$message .= '<p>If you didn\'t request a password change please ignore this email.</p>';
		$message .= '<br><p>Thank you!</p>';
		$message .= '<p>Batech Team</p>';
		$message .= '</body></html>';
		
		mail($to, $subject, $message, $headers);
	} catch (PDOException $e) {}
	
	header('Location: ' . $BASE_URL . 'pages/home.php');
?>