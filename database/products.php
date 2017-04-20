<?php

// Returns 6 most viewed products that are on sale (for home page)
function getProductsOnSale() {
	global $conn;
	$stmt = $conn->prepare
	('
	SELECT DISTINCT ON (product.id) *
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
	SELECT DISTINCT ON (product.id) *
	FROM product
	LEFT JOIN onsale ON product.id=onsale.id
	LEFT JOIN image ON product.id=image.product
	ORDER BY product.id, product.nr_sales DESC
	LIMIT 6
	');
	$stmt->execute();

	return $stmt->fetchAll();
}

?>
