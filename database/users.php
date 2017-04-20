<?php

function createUser($username, $name, $email, $password, $country) {
	global $conn;
	$stmt = $conn->prepare('INSERT INTO users (username, password, email, name, join_date, country, is_admin) VALUES (?,?,?,?,NOW(),?,?)');

	$stmt->execute(array($username, password_hash($password, PASSWORD_DEFAULT), $email, $name, $country, "false"));
}

function loginCorrect($username, $password) {
	global $conn;
	$stmt = $conn->prepare('SELECT password FROM users WHERE (username=? OR email=?)');
	$stmt->execute(array($username, $username));
	$results = $stmt->fetchAll();
	if (is_array($results) && count($results)>=1) {
		if (password_verify($password, $results[0]["password"])) {
			return true;
		}
	}
	
	return false;
}

function isAdmin($username) {
	global $conn;
	$stmt = $conn->prepare('SELECT * FROM users WHERE (username=? OR email=?) AND is_admin=TRUE');
	$stmt->execute(array($username, $username));

	return $stmt->fetch();
}

// Returns true if finds a user with the given username
function checkUsername($username) {
	global $conn;
	$stmt = $conn->prepare('SELECT * FROM users WHERE username=?');
	$stmt->execute(array($username));
	$results = $stmt->fetchAll();
	
	return count($results);
}

// Returns true if finds a user with the given email
function checkEmail($email) {
	global $conn;
	$stmt = $conn->prepare('SELECT * FROM users WHERE email=?');
	$stmt->execute(array($email));
	$results = $stmt->fetchAll();
	
	return count($results);
}


?>
