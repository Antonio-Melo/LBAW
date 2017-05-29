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

function getUserByUsernameEmail($username) {
	global $conn;
	$stmt = $conn->prepare
	('
	SELECT *
	FROM users
	WHERE email=? OR username=?;
	');
	$stmt->execute(array($username, $username));
	$result = $stmt->fetchAll();
	
	return $result[0];
}

/*==========================================================================================*/
/* Cart/Favorites */
function getUserFavorites($id) {
	global $conn;
	$stmt = $conn->prepare
	('
	SELECT DISTINCT ON (product.id) *, keyword.name AS keyword_name, brand.name AS brand_name, product.name AS product_name, product.id AS product_id
	FROM favoritesproducts
	JOIN users ON favoritesproducts.client=users.id
	JOIN product ON favoritesproducts.product=product.id
	LEFT JOIN onsale ON product.id=onsale.id
	LEFT JOIN image ON product.id=image.product
	JOIN keyword ON product.keyword=keyword.id
	JOIN brand ON product.brand=brand.id
	WHERE users.id=?
	');
	$stmt->execute(array($id));
	
	return $stmt->fetchAll();
}

function removeFavorite($client, $product) {
	global $conn;
	$stmt = $conn->prepare
	('
	DELETE FROM favoritesproducts
	WHERE client=? AND product=?
	');

	return $stmt->execute(array($client, $product));
}

function getUserCart($id) {
	global $conn;
	$stmt = $conn->prepare
	('
	SELECT DISTINCT ON (product.id) *, keyword.name AS keyword_name, brand.name AS brand_name, product.name AS product_name, product.id AS product_id
	FROM cartproducts
	JOIN users ON cartproducts.client=users.id
	JOIN product ON cartproducts.product=product.id
	LEFT JOIN onsale ON product.id=onsale.id
	LEFT JOIN image ON product.id=image.product
	JOIN keyword ON product.keyword=keyword.id
	JOIN brand ON product.brand=brand.id
	WHERE users.id=?
	');
	$stmt->execute(array($id));
	
	return $stmt->fetchAll();
}

function removeCartProduct($client, $product) {
	global $conn;
	$stmt = $conn->prepare
	('
	DELETE FROM cartproducts
	WHERE client=? AND product=?
	');

	return $stmt->execute(array($client, $product));
}

// Transaction1 - add favorite product to cart (delete from favorites; insert into cart)
function addFavoriteCart($client, $product) {
	global $conn;
	$conn->exec('BEGIN;');
	$stmt = $conn->prepare
	('
	DELETE FROM favoritesproducts
	WHERE client=? AND product=?;
	');
	$stmt->execute(array($client, $product));
	
	$stmt = $conn->prepare
	('
	INSERT INTO cartproducts (client, product)
	VALUES (?, ?);
	');
	$stmt->execute(array($client, $product));
	$conn->exec('COMMIT;');
}

function addCart($client, $product) {
	global $conn;
	$stmt = $conn->prepare
	('
	INSERT INTO cartproducts (client, product)
	VALUES(?, ?);
	');

	return $stmt->execute(array($client, $product));
}

function addFavorite($client, $product) {
	global $conn;
	$conn->exec('BEGIN;');
	$stmt = $conn->prepare
	('
	INSERT INTO favoritesproducts (client, product)
	VALUES(?, ?);
	');
	$stmt->execute(array($client, $product));
	
	$stmt = $conn->prepare
	('
	UPDATE product
	SET nr_favorites=nr_favorites+1
	WHERE product.id=?
	');
	$stmt->execute(array($product));
	
	$conn->exec('COMMIT;');
}

function getFavoritesIds($client) {
	global $conn;
	$stmt = $conn->prepare
	('
	SELECT product
	FROM favoritesproducts
	WHERE client=?;
	');

	$stmt->execute(array($client));

	return $stmt->fetchAll();
}

function getCartIds($client) {
	global $conn;
	$stmt = $conn->prepare
	('
	SELECT product
	FROM cartproducts
	WHERE client=?;
	');

	$stmt->execute(array($client));

	return $stmt->fetchAll();
}

function getProductInCart($client, $product) {
	global $conn;
	$stmt = $conn->prepare
	('
	SELECT *
	FROM cartproducts
	WHERE client=? AND product=?;	
	');
	
	$stmt->execute(array($client, $product));
	
	return $stmt->fetchAll();
}

function getProductInFavorites($client, $product) {
	global $conn;
	$stmt = $conn->prepare
	('
	SELECT *
	FROM favoritesproducts
	WHERE client=? AND product=?;	
	');
	
	$stmt->execute(array($client, $product));
	
	return $stmt->fetchAll();
}





/*==========================================================================================*/
/* Profile */
function getUserById($id) {
	global $conn;
	$stmt = $conn->prepare
	('
	SELECT *, users.name AS users_name, country.name AS country_name, users.id AS users_id
	FROM users
	JOIN country ON users.country=country.id
	LEFT JOIN image ON users.image=image.id
	WHERE users.id=?;
	');
	$stmt->execute(array($id));
	
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
	SELECT DISTINCT ON (product.id) *, product.id AS product_id, product.name AS product_name, keyword.name AS keyword_name, brand.name AS brand_name
	FROM orderproduct
	JOIN product ON orderproduct.product=product.id
	JOIN keyword ON product.keyword=keyword.id
	JOIN brand ON product.brand=brand.id
	LEFT JOIN image ON product.id=image.product
	WHERE orderproduct.order=?;
	');
	$stmt->execute(array($id));
	
	return $stmt->fetchAll();
}

function editUser($id, $username, $name, $email, $country) {
	global $conn;
	$stmt = $conn->prepare
	('
	UPDATE users
	SET username=?, email=?, name=?, country=?
	WHERE users.id=?
	');

	$stmt->execute(array($username, $email, $name, $country, $id));
}

// Transaction2 - replace user avatar (insert new image; update user; delete current image;)
function addUserImage($username, $url) {	
	global $conn;
	$conn->exec('BEGIN;');
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

function changePassword($id, $old_password, $new_password) {
	global $conn;
	$stmt = $conn->prepare
	('
	SELECT password
	FROM users
	WHERE users.id=?;
	');
	$stmt->execute(array($id));
	$user = $stmt->fetchAll();
	
	if(empty($user)) {
		return false;
	}
	
	if (password_verify($old_password, $user[0]['password'])) {
		$stmt = $conn->prepare
		('
		UPDATE users
		SET password=?
		WHERE users.id=?;
		');
		$stmt->execute(array(password_hash($new_password, PASSWORD_DEFAULT), $id));
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
function editAddress($id, $user_id, $street, $door, $zip, $city, $region, $country, $phone) {
	global $conn;
	$conn->exec('BEGIN;');
	
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
	$stmt->execute(array($user_id, $street, $city, $zip, $region, $phone, $country, $door));
	
	$conn->exec('COMMIT;');
}

function addAddress($user_id, $street, $door, $zip, $city, $region, $country, $phone) {
	global $conn;	
	$stmt = $conn->prepare
	('
	INSERT INTO address ("user", street, city, postal_zip, region, telephone_number, country, door_number)
	VALUES (?,?,?,?,?,?,?,?);
	');
	$stmt->execute(array($user_id, $street, $city, $zip, $region, $phone, $country, $door));
	
	$stmt = $conn->prepare
	('
	SELECT * FROM address
	WHERE address.user = ?
	ORDER BY id DESC
	LIMIT 1;
	');
	$stmt->execute(array($user_id));
	
	return $stmt->fetchAll();
} 


function getBannedUsers() {
	global $conn;

	$stmt = $conn->prepare
	('
	SELECT *
	FROM users, banned
	Where users.id = banned.id;
	');
	$stmt->execute();
	
	return $stmt->fetchAll();
}

function addTicket($user, $subject, $description) {
	global $conn;

	$stmt = $conn->prepare
	('
	INSERT INTO ticket (client, subject, message)
	VALUES (?, ?, ?);
	');
	$stmt->execute(array($user, $subject, $description));
}

/*==========================================================================================*/
/* Password reset */

function createToken($id, $user) {
	global $conn;
	$conn->exec('BEGIN;');
	
	$stmt = $conn->prepare
	('
	SELECT *
	FROM resettokens
	WHERE resettokens.user=?;
	');
	$stmt->execute(array($user));
	$results = $stmt->fetchAll();
	
	if (count($results) == 0) {
		$stmt = $conn->prepare
		('
		INSERT INTO resettokens
		VALUES (?, ?);
		');
		$stmt->execute(array($id, $user));
	}
	else {
		$stmt = $conn->prepare
		('
		UPDATE resettokens
		SET id=?
		WHERE resettokens.user=?;
		');
		$stmt->execute(array($id, $user));
	}
	
	$conn->exec('COMMIT;');
}

function confirmReset($id) {
	global $conn;
	
	$stmt = $conn->prepare
	('
	SELECT resettokens.user
	FROM resettokens
	WHERE id = ?;
	');
	$stmt->execute(array($id));
	
	$result = $stmt->fetchAll();
	if (count($result) > 0) {
		return $result[0];
	}
	else {
		return false;
	}
}

function resetPassword($id, $password) {
	$user = getUserByUsernameEmail($id);
	
	global $conn;
	$conn->exec('BEGIN;');
	$stmt = $conn->prepare
	('
	UPDATE users
	SET password=?
	WHERE users.id=?;
	');
	$stmt->execute(array(password_hash($password, PASSWORD_DEFAULT), $user['id']));
	
	$stmt = $conn->prepare
	('
	DELETE FROM resettokens
	WHERE resettokens.user=?;
	');
	$stmt->execute(array($user['id']));
	$conn->exec('COMMIT;');
}

/*==========================================================================================*/
/* Report */

function addReport($user, $id_review, $text_report) {
	global $conn;
	$conn->exec('BEGIN;');
	$stmt = $conn->prepare
	('
	SELECT *
	FROM review
	WHERE id=?
	');
	$stmt->execute(array($id_review));
	$reported = $stmt->fetchAll();
	
	$message = "Product ID: " . $reported[0]['product'] . "\r\n";
	$message .= "Rating: " . $reported[0]['rating'] . "\r\n";
	$message .= "Comment: " . $reported[0]['comment'] . "\r\n";
	$message .= "Report: " . $text_report;
	
	
	$stmt = $conn->prepare
	('
	INSERT INTO report ("user", reported, message)
	VALUES (?,?,?);
	');
	$stmt->execute(array($user, $reported[0]['client'], $message));
	$conn->exec('COMMIT;');
}

/*==========================================================================================*/
/* Orders */

function addOrder($reference, $date_ordered, $billing_address, $shipping_address, $shipping_method, $payment_method, $products) {
	global $conn;
	$conn->exec('BEGIN;');
	$stmt = $conn->prepare
	('
	INSERT INTO orders (reference, date_ordered, billing_address, shipping_address, shipping_method, payment_method)
	VALUES(?, ?, ?, ?, ?, ?);
	');
	$stmt->execute(array($reference, $date_ordered, $billing_address, $shipping_address, $shipping_method, $payment_method));
	
	$stmt = $conn->prepare
	('
	SELECT id
	FROM orders
	WHERE reference=?
	');
	$stmt->execute(array($reference));
	$results = $stmt->fetchAll();
	
	foreach ($products as $product) {
		$stmt = $conn->prepare
		('
		INSERT INTO orderproduct ("order", product, price_paid, nr_units)
		VALUES(?, ?, ?, ?);
		');
		$stmt->execute(array($results[0]['id'], $product[0], str_replace(',', '', $product[1]), $product[2]));
		
		$stmt = $conn->prepare
		('
		UPDATE product
		SET nr_sales=nr_sales+?, stock=stock-?
		WHERE id=?;
		');
		$stmt->execute(array($product[2], $product[2], $product[0]));
	}
	
	$conn->exec('COMMIT;');
}
?>
