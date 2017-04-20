<?php

function getAllKeywords() {
	global $conn;
	$stmt = $conn->prepare('SELECT * FROM keyword');
	$stmt->execute();

	return $stmt->fetchAll();
}

?>