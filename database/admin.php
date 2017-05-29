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

?>