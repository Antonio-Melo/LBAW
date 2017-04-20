<?php

// Returns 6 most viewed products that are on sale (for home page)
function getProductsOnSale() {
	global $conn;
	$stmt = $conn->prepare
	('
	SELECT DISTINCT ON (product.id) *, product.id AS product_id
	FROM product
	JOIN onsale ON product.id=onsale.id
	LEFT JOIN image ON product.id=image.product
	ORDER BY product.id, product.nr_views DESC
	LIMIT 6
	');
	$stmt->execute();

	return $stmt->fetchAll();
}

// Returns 6 most bought products (for home page)
function getProductsMostPopular() {
	global $conn;
	$stmt = $conn->prepare
	('
	SELECT DISTINCT ON (product.id) *, product.id AS product_id
	FROM product
	LEFT JOIN onsale ON product.id=onsale.id
	LEFT JOIN image ON product.id=image.product
	ORDER BY product.id, product.nr_sales DESC
	LIMIT 6
	');
	$stmt->execute();

	return $stmt->fetchAll();
}

// Returns 6 most viewed products that are on sale of category
function getProductsOnSaleCat($id) {
	global $conn;
	$stmt = $conn->prepare
	('
	SELECT DISTINCT ON (product.id) *, product.name AS product_name, product.id AS product_id
	FROM product
	JOIN keyword ON product.keyword=keyword.id
	JOIN onsale ON product.id=onsale.id
	LEFT JOIN image ON product.id=image.product
	WHERE keyword.id=?
	ORDER BY product.id, product.nr_views DESC
	LIMIT 6
	');
	$stmt->execute(array($id));

	return $stmt->fetchAll();
}

// Returns 6 most bought products of category
function getProductsMostPopularCat($id) {
	global $conn;
	$stmt = $conn->prepare
	('
	SELECT DISTINCT ON (product.id) *, product.name AS product_name, product.id AS product_id
	FROM product
	JOIN keyword ON product.keyword=keyword.id
	LEFT JOIN onsale ON product.id=onsale.id
	LEFT JOIN image ON product.id=image.product
	WHERE keyword.id=?
	ORDER BY product.id, product.nr_sales DESC
	LIMIT 6
	');
	$stmt->execute(array($id));

	return $stmt->fetchAll();
}

function getProductById($id) {
	global $conn;
	$stmt = $conn->prepare
	('
	SELECT *, product.name AS product_name, product.id AS product_id
	FROM product
	JOIN keyword ON product.keyword=keyword.id
	LEFT JOIN onsale ON product.id=onsale.id
	LEFT JOIN image ON product.id=image.product
	WHERE product.id=?
	');
	$stmt->execute(array($id));

	return $stmt->fetchAll();
}

function getFaqsByProductId($id) {
	global $conn;
	$stmt = $conn->prepare
	('
	SELECT *, faq.id AS faq_id
	FROM product
	JOIN faq ON product.id=faq.product
	WHERE product.id=?
	');

	$stmt->execute(array($id));

	return $stmt->fetchAll();
}

?>
