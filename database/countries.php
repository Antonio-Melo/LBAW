<?php

function getAllCountries() {
	global $conn;
	$stmt = $conn->prepare('SELECT * FROM country');
	$stmt->execute();

	return $stmt->fetchAll();
}

function getCountryById($id) {
	global $conn;
	
	$stmt = $conn->prepare('SELECT * FROM country WHERE id=?');
	$stmt->execute(array($id));
	
	return $stmt->fetchAll();
}

?>
