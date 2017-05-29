<?php

function getTickets() {
	global $conn;
	$stmt = $conn->prepare
	('
	SELECT *, ticket.id AS ticket_id
	FROM ticket
	JOIN users ON ticket.client=users.id
	ORDER BY ticket.id ASC;
	');
	$stmt->execute();
	return $stmt->fetchAll();
}

function removeTicket($id) {
	global $conn;
	$stmt = $conn->prepare
	('
	DELETE FROM ticket
	WHERE ticket.id=?;
	');
	$stmt->execute(array($id));
}

function getNotShippedOrders() {
	global $conn;
	$stmt = $conn->prepare
	('
	SELECT reference
	FROM orders
	WHERE date_shipped IS NULL;
	');
	$stmt->execute();
	return $stmt->fetchAll();
}

function getNotDeliverdOrders() {
	global $conn;
	$stmt = $conn->prepare
	('
	SELECT reference
	FROM orders
	WHERE date_delivered IS NULL AND date_shipped IS NOT NULL;
	');
	$stmt->execute();
	return $stmt->fetchAll();
}

function getAllProductsStats() {
	global $conn;
	$stmt = $conn->prepare
	('
	SELECT id, name, rating, price, nr_views, nr_sales, stock, nr_favorites, nr_ratings
	FROM product
	ORDER BY id;
	');
	$stmt->execute();
	return $stmt->fetchAll();
}


?>