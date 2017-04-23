<?php

function createUser($username, $name, $email, $password, $country) {
	global $conn;
	$stmt = $conn->prepare
	('
	INSERT INTO users (username, password, email, name, join_date, country, is_admin)
	VALUES (?,?,?,?,NOW(),?,?)
	');

	$stmt->execute(array($username, password_hash($password, PASSWORD_DEFAULT), $email, $name, $country, "false"));
}

function editUser($original_username, $username, $name, $email, $country) {
	global $conn;
	$stmt = $conn->prepare
	('
	UPDATE users
	SET username=?, email=?, name=?, country=?
	WHERE username=?
	');

	$stmt->execute(array($username, $email, $name, $country, $original_username));
}


function loginCorrect($username, $password) {
	global $conn;
	$stmt = $conn->prepare
	('
	SELECT password
	FROM users
	WHERE (username=? OR email=?)
	');
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
	$stmt = $conn->prepare
	('
	SELECT *
	FROM users
	WHERE (username=? OR email=?) AND is_admin=TRUE
	');
	$stmt->execute(array($username, $username));

	return $stmt->fetch();
}

// Returns true if finds a user with the given username
function checkUsername($username) {
	global $conn;
	$stmt = $conn->prepare
	('
	SELECT *
	FROM users
	WHERE username=?
	');
	$stmt->execute(array($username));
	$results = $stmt->fetchAll();
	
	return count($results);
}

// Returns true if finds a user with the given email
function checkEmail($email) {
	global $conn;
	$stmt = $conn->prepare
	('
	SELECT *
	FROM users
	WHERE email=?
	');
	$stmt->execute(array($email));
	$results = $stmt->fetchAll();
	
	return count($results);
}

function getUserFavorites($username) {
	global $conn;
	$stmt = $conn->prepare
	('
	SELECT *, keyword.name AS keyword_name, brand.name AS brand_name, product.name AS product_name, product.id AS product_id
	FROM favoritesproducts
	JOIN users ON favoritesproducts.client=users.id
	JOIN product ON favoritesproducts.product=product.id
	LEFT JOIN onsale ON product.id=onsale.id
	LEFT JOIN image ON product.id=image.product
	JOIN keyword ON product.keyword=keyword.id
	JOIN brand ON product.brand=brand.id
	WHERE users.username=?
	');
	$stmt->execute(array($username));
	
	return $stmt->fetchAll();
}

function removeFavorite($username, $product) {
	global $conn;
	$stmt = $conn->prepare
	('
	DELETE FROM favoritesproducts
	WHERE client=(SELECT id FROM users WHERE username=?) AND product=?
	');

	return $stmt->execute(array($username, $product));
}

function getUserCart($username) {
	global $conn;
	$stmt = $conn->prepare
	('
	SELECT *, keyword.name AS keyword_name, brand.name AS brand_name, product.name AS product_name, product.id AS product_id
	FROM cartproducts
	JOIN users ON cartproducts.client=users.id
	JOIN product ON cartproducts.product=product.id
	LEFT JOIN onsale ON product.id=onsale.id
	LEFT JOIN image ON product.id=image.product
	JOIN keyword ON product.keyword=keyword.id
	JOIN brand ON product.brand=brand.id
	WHERE users.username=?
	');
	$stmt->execute(array($username));
	
	return $stmt->fetchAll();
}

function removeCartProduct($username, $product) {
	global $conn;
	$stmt = $conn->prepare
	('
	DELETE FROM cartproducts
	WHERE client=(SELECT id FROM users WHERE username=?) AND product=?
	');

	return $stmt->execute(array($username, $product));
}

function addFavoriteCart($username, $product) {
	global $conn;
	$conn->exec('BEGIN');
	$conn->exec('SET TRANSACTION ISOLATION LEVEL SERIALIZABLE;');
	$stmt = $conn->prepare
	('
	DELETE FROM favoritesproducts
	WHERE client=(SELECT id FROM users WHERE username=?) AND product=?;
	');
	$stmt->execute(array($username, $product));
	
	$stmt = $conn->prepare
	('
	INSERT INTO cartproducts (client, product)
	VALUES ((SELECT id FROM users WHERE username=?), ?);
	');
	$stmt->execute(array($username, $product));
	$conn->exec('COMMIT');
}

function addCart($username, $product) {
	global $conn;
	$stmt = $conn->prepare
	('
	INSERT INTO cartproducts (client, product)
	VALUES((SELECT id FROM users WHERE username=?), ?);
	');

	return $stmt->execute(array($username, $product));
}

function addFavorite($username, $product) {
	global $conn;
	$stmt = $conn->prepare
	('
	INSERT INTO favoritesproducts (client, product)
	VALUES((SELECT id FROM users WHERE username=?), ?);
	');

	return $stmt->execute(array($username, $product));
}

function getUserByUsername($username) {
	global $conn;
	$stmt = $conn->prepare
	('
	SELECT *, users.name AS users_name, country.name AS country_name, users.id AS users_id
	FROM users
	JOIN country ON users.country=country.id
	LEFT JOIN image ON users.image=image.id
	WHERE username=?;
	');
	$stmt->execute(array($username));
	
	return $stmt->fetchAll();
}

function getAddressesByUserId($id) {
	global $conn;
	$stmt = $conn->prepare
	('
	SELECT *, country.name AS country_name
	FROM address
	JOIN country ON address.country=country.id
	WHERE address.user=?;
	');
	$stmt->execute(array($id));

	return $stmt->fetchAll();
}

function getOrdersByUserId($id) {
	global $conn;
	$stmt = $conn->prepare
	('
	SELECT *, orders.id AS order_id,
	shippingmethod.name AS shipping_method_name, paymentmethod.name AS payment_method_name,
	ba.street AS ba_street, ba.city AS ba_city, ba.postal_zip AS ba_postal_zip, ba.region AS ba_region, ba.telephone_number AS ba_telephone_number, cba.name AS ba_country, ba.door_number AS ba_door_number,
	sa.street AS sa_street, sa.city AS sa_city, sa.postal_zip AS sa_postal_zip, sa.region AS sa_region, sa.telephone_number AS sa_telephone_number, csa.name AS sa_country, sa.door_number AS sa_door_number
	FROM orders
	JOIN address ba ON orders.billing_address=ba.id
	JOIN country cba ON ba.country=cba.id
	JOIN address sa ON orders.shipping_address=sa.id
	JOIN country csa ON sa.country=csa.id
	JOIN shippingmethod ON orders.shipping_method=shippingmethod.id
	JOIN paymentmethod ON orders.payment_method=paymentmethod.id
	WHERE ba.user=?;	
	');
	$stmt->execute(array($id));

	return $stmt->fetchAll();
}

function getProductsByOrderId($id) {
	global $conn;
	$stmt = $conn->prepare
	('
	SELECT *, product.id AS product_id, product.name AS product_name, keyword.name AS keyword_name, brand.name AS brand_name
	FROM orderproduct
	JOIN product ON orderproduct.product=product.id
	JOIN keyword ON product.keyword=keyword.id
	JOIN brand ON product.brand=brand.id
	WHERE orderproduct.order=?;
	');
	$stmt->execute(array($id));
	
	return $stmt->fetchAll();
}


?>
