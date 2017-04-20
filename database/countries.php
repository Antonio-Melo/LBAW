<?php

function getAllCountries() {
	global $conn;
	$stmt = $conn->prepare('SELECT * FROM country');
	$stmt->execute();

	return $stmt->fetchAll();
}

?>
