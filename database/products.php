<?php
function getProductIdbyName($name){
	global $conn;
	$stmt = $conn->prepare('
	SELECT id
	FROM product
	WHERE name=?
	');
	$stmt->execute(array($name));

    $results = $stmt->fetchAll();

    return $results[0];
}
function insertProduct($name,$full_name,$sm_description,$price,$qty,$image,$lg_description,$category,$brand){
	global $conn;
	$stmt = $conn->prepare('
	INSERT INTO product (name,full_name,small_description,description,price,brand,stock,keyword)
	VALUES(?,?,?,?,?,?,?,?)
	');
	$stmt->execute(array($name,$full_name,$sm_description,$lg_description,$price,$brand,$qty,$category));
}
//Inserts a Review from a certain product
function writeReview($client,$product, $text_review,$rating_input){
	global $conn;
	$stmt = $conn->prepare('
	INSERT INTO review (rating, comment, client, product)
	VALUES (?,?,?,?)
	');

    $stmt->execute(array($rating_input,$text_review,$client, $product));
}
//Inserts a Reply in a certain review
function writeReply($client,$review_id,$text_reply){
	global $conn;
	$stmt = $conn->prepare('
	INSERT INTO reply ("user",review,message)
	VALUES (?,?,?);
	');
	$stmt->execute(array($client,$review_id,$text_reply));
}
function getAllBrandNames(){
	global $conn;
	$stmt = $conn->prepare('
	SELECT *
	FROM brand
	');
	$stmt->execute();

	return $stmt->fetchAll();
}
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
	SELECT DISTINCT ON (product.id) *, product.name AS product_name, product.id AS product_id, keyword.name AS keyword_name, brand.name AS brand_name
	FROM product
	JOIN keyword ON product.keyword=keyword.id
	JOIN brand ON product.brand=brand.id
	LEFT JOIN onsale ON product.id=onsale.id
	LEFT JOIN image ON product.id=image.product
	WHERE product.id=?
	');
	$stmt->execute(array($id));

	return $stmt->fetchAll();
}

function getAllProductImages($id) {
	global $conn;
	$stmt = $conn->prepare
	('
	SELECT url
	FROM image
	WHERE image.product=?
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

function getAllSearchProducts($search) {
	global $conn;
	if ($search) {
		$vars = array();
		$query = "SELECT *
					FROM 
					(SELECT DISTINCT ON (product.id) *, keyword.name AS keyword_name, brand.name AS brand_name, product.name AS product_name, product.id AS product_id,
					setweight(to_tsvector(product.name), 'A') || setweight(to_tsvector(product.full_name), 'B') || setweight(to_tsvector(product.small_description), 'C') || setweight(to_tsvector(product.description), 'D') as document
					FROM product
					LEFT JOIN onsale ON product.id=onsale.id
					LEFT JOIN image ON product.id=image.product
					JOIN keyword ON product.keyword=keyword.id
					JOIN brand ON product.brand=brand.id) p_search
					WHERE p_search.document @@ plainto_tsquery(?)
					ORDER BY ts_rank(p_search.document, plainto_tsquery(?)) DESC;";
		array_push($vars, $search, $search);
		$stmt = $conn->prepare($query);
		$stmt->execute($vars);
	}
	else {
		$query = 'SELECT DISTINCT ON (product.id) *, keyword.name AS keyword_name, brand.name AS brand_name, product.name AS product_name, product.id AS product_id
				FROM product
				LEFT JOIN onsale ON product.id=onsale.id
				LEFT JOIN image ON product.id=image.product
				JOIN keyword ON product.keyword=keyword.id
				JOIN brand ON product.brand=brand.id';
		$stmt = $conn->prepare($query);
		$stmt->execute();
	}
	
	return $stmt->fetchAll();
}

function getSearchProductsFiltered($filters) {
	$vars = array();
	$query = ' FROM product
				LEFT JOIN onsale ON product.id=onsale.id
				LEFT JOIN image ON product.id=image.product
				JOIN keyword ON product.keyword=keyword.id
				JOIN brand ON product.brand=brand.id';
	
	$n = 0;
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
		$query .= 'onsale.sale_price>=? AND onsale.sale_price<=?';
		array_push($vars, $min, $max);
		
		$query .= ') OR (';
		$query .= 'onsale.sale_price IS NULL AND product.price>=? AND product.price<=?';
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
		
		$query .= 'product.nr_ratings>0 AND ROUND(product.rating/product.nr_ratings)>=?)';
		array_push($vars, $filters['rating']);
		$n = 1;
	}
	
	// Search
	if ($filters['search']) {
		$query = "SELECT * FROM 
					(SELECT DISTINCT ON (product.id)
					*, keyword.name AS keyword_name, brand.name AS brand_name, product.name AS product_name, product.id AS product_id,
					setweight(to_tsvector(product.name), 'A') || setweight(to_tsvector(product.full_name), 'B') || setweight(to_tsvector(product.small_description), 'C') || setweight(to_tsvector(product.description), 'D') as document"
					. $query
					. ") p_search WHERE p_search.document @@ plainto_tsquery(?)";
		array_push($vars, $filters['search']);
	}
	else {
		$query = 'SELECT DISTINCT ON (product.id)
					*, keyword.name AS keyword_name, brand.name AS brand_name, product.name AS product_name, product.id AS product_id'
					. $query;
	}
	
	// Order
	if ($filters['order']) {
		switch($filters['order']) {
			case 'Relevant':
				if ($filters['search']) {
					$query .= " ORDER BY ts_rank(p_search.document, plainto_tsquery(?)) DESC";
					array_push($vars, $filters['search']);
				}
				break;
			case 'Higher price':
				$query .= " ORDER BY COALESCE(sale_price, price) DESC";
				break;
			case 'Lower price':
				$query .= " ORDER BY COALESCE(sale_price, price) ASC";
				break;
			case 'Most sold':
				$query .= " ORDER BY nr_sales DESC";
				break;
			case 'Best rating':
				$query .= " ORDER BY rating/ (CASE nr_ratings WHEN 0 THEN NULL ELSE nr_ratings END) DESC NULLS LAST";
				break;
			case 'Name: A -> Z':
				$query .= " ORDER BY product_name ASC";
				break;
			case 'Name: Z -> A':
				$query .= " ORDER BY product_name DESC";
				break;
		}		
	}
	else if ($filters['search']) {
		$query .= " ORDER BY ts_rank(p_search.document, plainto_tsquery(?)) DESC";
		array_push($vars, $filters['search']);
	}
	
	// Page
	if (!$filters['page']) {
		$filters['page'] = 1;
	}
	
	global $conn;
	$stmt = $conn->prepare($query);
	$stmt->execute($vars);
	
	return $stmt->fetchAll();	
}

?>
