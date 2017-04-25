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

function getReviewsByProductId($id) {
	global $conn;
	$stmt = $conn->prepare
	('
	SELECT *, review.id AS review_id
	FROM review
	JOIN users ON review.client=users.id
	LEFT JOIN image ON users.image=image.id
	WHERE review.product=?
	');
	
	$stmt->execute(array($id));
	
	return $stmt->fetchAll();
}

function getRepliesByReviewId($id) {
	global $conn;
	$stmt = $conn->prepare
	('
	SELECT *
	FROM reply
	JOIN users ON reply.user=users.id
	JOIN review ON reply.review=review.id
	LEFT JOIN image ON users.image=image.id
	WHERE review.id=?	
	');
	
	$stmt->execute(array($id));
	
	return $stmt->fetchAll();
}

function getSearchProducts($filters) {
	$vars = array();	
	$query = 'SELECT *, keyword.name AS keyword_name, brand.name AS brand_name, product.name AS product_name, product.id AS product_id
				FROM product
				LEFT JOIN onsale ON product.id=onsale.id
				LEFT JOIN image ON product.id=image.product
				JOIN keyword ON product.keyword=keyword.id
				JOIN brand ON product.brand=brand.id';
	
	$n = 0;
	// Search
	
	// Keywords
	if (count($filters['keywords']) > 0) {
		if ($n == 0) {
			$query .= ' WHERE (';
		}
		else {
			$query .= ' AND (';
		}
		
		for ($i = 0; $i < count($filters['keywords']); $i++) {
			if ($i != 0) {
				$query .= ' OR';
			}
			$keyword = $filters['keywords'][$i];
			$query .= ' keyword.name=?';
			array_push($vars, $keyword);
		}
		
		$query .= ')';
		$n = 1;
	}
	
	// Prices
	if (count($filters['prices']) > 0) {
		if ($n == 0) {
			$query .= ' WHERE ((';
		}
		else {
			$query .= ' AND ((';
		}
		
		$min = $filters['prices'][0];
		$max = $filters['prices'][1];
		$query .= 'onsale.sale_price>? AND onsale.sale_price<?';
		array_push($vars, $min, $max);
		
		$query .= ') OR (';
		$query .= 'onsale.sale_price IS NULL AND product.price>? AND product.price<?';
		array_push($vars, $min, $max);
		
		$query .= '))';
		$n = 1;
	}
	
	// Brands
	if (count($filters['brands']) > 0) {
		if ($n == 0) {
			$query .= ' WHERE (';
		}
		else {
			$query .= ' AND (';
		}
		
		for ($i = 0; $i < count($filters['brands']); $i++) {
			if ($i != 0) {
				$query .= ' OR';
			}
			$brand = $filters['brands'][$i];
			$query .= ' brand.name=?';
			array_push($vars, $brand);
		}
		
		$query .= ')';
		$n = 1;
	}
	
	// Onsale
	if ($filters['onsale'] == "true") {
		if ($n == 0) {
			$query .= ' WHERE (';
		}
		else {
			$query .= ' AND (';
		}
		
		$query .= 'onsale.sale_price IS NOT NULL)';
		$n = 1;
	}
	
	// Rating	
	if ($filters['rating']) {
		if ($n == 0) {
			$query .= ' WHERE (';
		}
		else {
			$query .= ' AND (';
		}
		
		$query .= 'product.nr_ratings>0 AND product.rating/product.nr_ratings>=?)';
		array_push($vars, $filters['rating']);
		$n = 1;
	}
	
	// Order
	
	// Page
	$results_per_pages = 20;
	if (!$filters['page']) {
		$filters['page'] = 1;
	}
	
	$query .= ' LIMIT ? OFFSET ?';
	array_push($vars, $results_per_pages, ($filters['page']-1)*$results_per_pages);
	
	global $conn;
	$stmt = $conn->prepare($query);
	$stmt->execute($vars);
	
	return $stmt->fetchAll();	
}













?>
