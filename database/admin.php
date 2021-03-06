<?php
function banUser($id){
    global $conn;
    $stmt = $conn->prepare('
    INSERT INTO banned (id)
    VALUES (?)
    ');
    $stmt->execute(array($id));
}
function unbanUser($id){
    global $conn;
    $stmt = $conn->prepare('
    DELETE FROM banned
    WHERE banned.id = ?;
    ');
    $stmt->execute(array($id));
}

function removeReport($id){
    global $conn;
    $stmt = $conn->prepare('
    DELETE FROM report
    WHERE report.id = ?;
    ');
    $stmt->execute(array($id));
}
function getReports(){
    global $conn;
    $stmt = $conn->prepare('
    SELECT *, report.id as report_id, user1.username as username1, user2.username as username2 
    FROM report
    JOIN users as user1 ON report.user=user1.id
    JOIN users as user2 ON report.reported=user2.id
    ORDER BY report_id ASC;
    ');
    $stmt->execute();
    return $stmt->fetchAll();
}
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

function getPendingOrders() {
	global $conn;
	$stmt = $conn->prepare
	('
	SELECT reference, username, name, email, date_ordered, date_shipped, date_delivered, orders.id AS id
	FROM orders
	JOIN address ON orders.shipping_address=address.id 
	JOIN users ON address.user=users.id
	WHERE date_shipped IS NULL OR date_delivered IS NULL;
	');
	$stmt->execute();
	return $stmt->fetchAll();
}

function getFilteredPendingOrders($ref) {
	$param = "%".$ref."%";
	
	global $conn;
	$stmt = $conn->prepare
	('
	SELECT reference, username, name, email, date_ordered, date_shipped, date_delivered, orders.id AS id
	FROM orders
	JOIN address ON orders.shipping_address=address.id 
	JOIN users ON address.user=users.id
	WHERE (date_shipped IS NULL OR date_delivered IS NULL) AND reference LIKE ?;
	');
	$stmt->execute(array($param));
	return $stmt->fetchAll();
}

function updateOrder($order, $type, $date) {
	global $conn;
	if ($type === "ship") {
		$stmt = $conn->prepare
		('
		UPDATE orders
		SET date_shipped=?
		WHERE id=?;
		');
		$stmt->execute(array($date, $order));	
	}	
	else if ($type === "deliver") {
		$stmt = $conn->prepare
		('
		UPDATE orders
		SET date_delivered=?
		WHERE id=?;
		');
		$stmt->execute(array($date, $order));	
	}
	else {
		return false;
	}
	
	return true;
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

function addNewKeyword($keyword) {
	global $conn;
	$stmt = $conn->prepare
	('
	INSERT INTO keyword (name)
	VALUES (?)
	');
	$stmt->execute(array($keyword));
}

function addNewBrand($brand) {
	global $conn;
	$stmt = $conn->prepare
	('
	INSERT INTO brand (name)
	VALUES (?)
	');
	$stmt->execute(array($brand));
}

function addFaq($product, $question, $answer) {
	global $conn;
	$stmt = $conn->prepare
	('
	INSERT INTO faq (product, question, answer)
	VALUES (?, ?, ?);
	');
	$stmt->execute(array($product, $question, $answer));
}

function deleteSale($product) {
	global $conn;
	$stmt = $conn->prepare
	('
	DELETE FROM onsale
	WHERE id=?;
	');
	$stmt->execute(array($product));
}

function startSale($product, $price) {
	global $conn;
	$stmt = $conn->prepare
	('
	INSERT INTO onsale (id, sale_price)
	VALUES (?,?);
	');
	$stmt->execute(array($product, $price));
}






?>