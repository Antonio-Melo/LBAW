<?php

function createUser($username, $name, $email, $password) {
	global $conn;
	$stmt = $conn->prepare('INSERT INTO "user" (username, password, email, name, join_date, is_admin) VALUES (?,?,?,?,NOW(),?)');
	$stmt->execute(array($username, hash('sha256', $password), $email, $name, "false"));
}

function loginCorrect($username, $password) {
	global $conn;
	$stmt = $conn->prepare('SELECT * FROM "user" WHERE (username=? OR email=?) AND password=?');
	$stmt->execute(array($username, $username, hash('sha256', $password)));

	return $stmt->fetch();
}

function isAdmin($username) {
	global $conn;
	$stmt = $conn->prepare('SELECT * FROM "user" WHERE (username=? OR email=?) AND is_admin=TRUE');
	$stmt->execute(array($username, $username));

	return $stmt->fetch();
}

?>
