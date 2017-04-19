<?php

function createUser($username, $name, $email, $password) {
	global $conn;
	$stmt = $conn->prepare('INSERT INTO "user" (username, password, email, name, join_date, is_admin) VALUES (?,?,?,?,NOW(),?)');
	$stmt->execute(array($username, sha1($password), $email, $name, "false"));
}

?>
