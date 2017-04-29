<?php

/*==========================================================================================*/
/* Authentication */
function createUser($username, $name, $email, $password, $country) {
	global $conn;
	$stmt = $conn->prepare
	('
	INSERT INTO users (username, password, email, name, join_date, country, is_admin)
	VALUES (?,?,?,?,NOW(),?,?)
	');

	$stmt->execute(array($username, password_hash($password, PASSWORD_DEFAULT), $email, $name, $country, "false"));
}

function loginCorrect($username, $password) {
	global $conn;
	$stmt = $conn->prepare
	('
	SELECT id, password
	FROM users
	WHERE (username=? OR email=?)
	');
	$stmt->execute(array($username, $username));
	$results = $stmt->fetchAll();
	if (is_array($results) && count($results)>=1) {
		if (password_verify($password, $results[0]["password"])) {
			return $results[0]["id"];
		}
	}
	
	return false;
}

function isBanned($id) {
	global $conn;
	$stmt = $conn->prepare
	('
	SELECT *
	FROM banned
	WHERE id=?
	');
	$stmt->execute(array($id));
	$results = $stmt->fetchAll();
	
	return $results[0];
}

function isAdmin($id) {
	global $conn;
	$stmt = $conn->prepare
	('
	SELECT *
	FROM users
	WHERE id=? AND is_admin=TRUE
	');
	$stmt->execute(array($id));

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

// Transaction1 - add favorite product to cart (delete from favorites; insert into cart)
function addFavoriteCart($username, $product) {
	global $conn;
	$conn->exec('BEGIN;');
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
	$conn->exec('COMMIT;');
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
	SELECT *, country.name AS country_name, address.id AS address_id
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

// Transaction2 - replace user avatar (insert new image; update user; delete current image;)
function addUserImage($username, $url) {	
	global $conn;
	$conn->exec('BEGIN;');
	$conn->exec('SET TRANSACTION ISOLATION LEVEL SERIALIZABLE;');
	$stmt = $conn->prepare
	('
	INSERT INTO image(url)
	VALUES (?);
	');
	$stmt->execute(array($url));
	
	$stmt = $conn->prepare
	('
	SELECT id
	FROM image
	WHERE url=?;	
	');
	$stmt->execute(array($url));
	$new_image_id = $stmt->fetchAll();
	
	$stmt = $conn->prepare
	('
	SELECT image
	FROM users
	WHERE username=?;	
	');
	$stmt->execute(array($username));
	$old_image_id = $stmt->fetchAll();
	
	$stmt = $conn->prepare
	('
	UPDATE users
	SET image=?
	WHERE username=?
	');
	$stmt->execute(array($new_image_id[0]['id'], $username));
	
	$delete_image = "";
	if (!empty($old_image_id)) {
		$stmt = $conn->prepare
		('
		SELECT url
		FROM image
		WHERE id=?
		');
		$stmt->execute(array($old_image_id[0]['image']));
		$old_url = $stmt->fetchAll();
		$delete_image = $old_url[0]['url'];
		
		$stmt = $conn->prepare
		('
		DELETE FROM image
		WHERE id=?;
		');
		$stmt->execute(array($old_image_id[0]['image']));
	}
	
	$conn->exec('COMMIT;');
	return $delete_image;
}

function changePassword($username, $old_password, $new_password) {
	global $conn;
	$stmt = $conn->prepare
	('
	SELECT password
	FROM users
	WHERE username=?;
	');
	$stmt->execute(array($username));
	$user = $stmt->fetchAll();
	
	if(empty($user)) {
		return false;
	}
	
	if (password_verify($old_password, $user[0]['password'])) {
		$stmt = $conn->prepare
		('
		UPDATE users
		SET password=?
		WHERE username=?;
		');
		$stmt->execute(array(password_hash($new_password, PASSWORD_DEFAULT), $username));
		return true;
	}
	else {
		return false;
	}
}

function removeAddress($address) {
	global $conn;
	$stmt = $conn->prepare
	('
	UPDATE address
	SET "user"=null
	WHERE id=?;
	');

	return $stmt->execute(array($address));
}

// Transaction3 - Edit address (get user id from username, update remove user id from old address, create new address)
// todo: check orders and completely remove address if not in any order
function editAddress($id, $username, $street, $door, $zip, $city, $region, $country, $phone) {
	global $conn;
	$conn->exec('BEGIN;');
	$conn->exec('SET TRANSACTION ISOLATION LEVEL SERIALIZABLE;');
	
	$stmt = $conn->prepare
	('
	SELECT id
	FROM users
	WHERE username = ?;
	');
	$stmt->execute(array($username));
	$user_id = $stmt->fetchAll();
	
	$stmt = $conn->prepare
	('
	UPDATE address
	SET "user"=null
	WHERE id=?;
	');
	$stmt->execute(array($id));
	
	$stmt = $conn->prepare
	('
	INSERT INTO address ("user", street, city, postal_zip, region, telephone_number, country, door_number)
	VALUES (?,?,?,?,?,?,?,?);
	');
	$stmt->execute(array($user_id[0]['id'], $street, $city, $zip, $region, $phone, $country, $door));
	
	$conn->exec('COMMIT;');
}

function addAddress($username, $street, $door, $zip, $city, $region, $country, $phone) {
	global $conn;
	$conn->exec('BEGIN;');
	$conn->exec('SET TRANSACTION ISOLATION LEVEL SERIALIZABLE;');
	
	$stmt = $conn->prepare
	('
	SELECT id
	FROM users
	WHERE username = ?;
	');
	$stmt->execute(array($username));
	$user_id = $stmt->fetchAll();
	
	$stmt = $conn->prepare
	('
	INSERT INTO address ("user", street, city, postal_zip, region, telephone_number, country, door_number)
	VALUES (?,?,?,?,?,?,?,?);
	');
	$stmt->execute(array($user_id[0]['id'], $street, $city, $zip, $region, $phone, $country, $door));
	
	$conn->exec('COMMIT;');
}








?>
