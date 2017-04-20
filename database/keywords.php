<?php

function getAllKeywords() {
	global $conn;
	$stmt = $conn->prepare('SELECT * FROM keyword');
	$stmt->execute();

	return $stmt->fetchAll();
}

function getKeywordById($id) {
	global $conn;
	$stmt = $conn->prepare('SELECT * FROM keyword WHERE id=?');
	$stmt->execute(array($id));
	
	return $stmt->fetchAll();
}

?>