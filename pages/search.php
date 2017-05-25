<?php
	/*==================================================*/
	/* Same for every page */	
	include_once('../config/init.php');
	include_once('../database/countries.php');
	include_once('../database/keywords.php');
	
	$countries = getAllCountries();
	$keywords = getAllKeywords();
	
	$smarty->assign('countries', $countries);
	$smarty->assign('keywords', $keywords);
	
	/*==================================================*/
	/* Change to files of each pages */
	$smarty->assign('css_file', 'search.css');  
	$smarty->assign('js_file', 'search.js');
	$smarty->assign('page_title', 'Search');
	
	/*==================================================*/

	include_once('../database/products.php');
	include_once('../database/users.php');
	
	$user_cart = array();
	$user_favorites = array();
	if ($_SESSION['id']) {
		foreach (getFavoritesIds($_SESSION['id']) as $value) {
			array_push($user_favorites, $value['product']);
		}

		$user_cart = getCartIds($_SESSION['id']);
		foreach (getCartIds($_SESSION['id']) as $value) {
			array_push($user_cart, $value['product']);
		}
	}
	
	$results_per_page = 20;
	$current_page;
	if ($_GET['page']) {
		$current_page = $_GET['page'];
	}
	else {
		$current_page = 1;
	}
	
	$filters;
	$filters['page'] = $_GET['page'];
	$filters['search'] = $_GET['search'];
	$filters['order'] = $_GET['order'];
	$filters['keywords'] = array_filter(explode(",", $_GET['keywords']));
	$filters['prices'] = array_filter(explode(",", $_GET['prices']), 'callback');
	$filters['brands'] = array_filter(explode(",", $_GET['brands']));
	$filters['onsale'] = $_GET['onsale'];
	$filters['rating'] = $_GET['rating'];
	
	$search = getAllSearchProducts($filters['search']);
	$products = getSearchProductsFiltered($filters);
	$products_keywords = [];
	$products_brands = [];
	$max_price = 0;
	
	// Use $search to know available filters
	foreach ($search as $product) {
		array_push($products_keywords, $product['keyword_name']);
		array_push($products_brands, $product['brand_name']);
		if ($product['sale_price'] != null && $product['sale_price'] > $max_price) {
			$max_price = $product['sale_price'];
		}
		else if ($product['sale_price'] == null && $product['price'] > $max_price) {
			$max_price = $product['price'];
		}
	}

	// Use $products to know number of pages
	$nr_pages = ceil(count($products)/$results_per_page);
	$start_page = $current_page;
	$end_page = $current_page;
	for ($i = 0; $i < 4; $i++) {
		if ($start_page > $current_page - 2 && $start_page > 1) {
			$start_page--;
		}
		else if ($end_page < $current_page + 2 && $end_page < $nr_pages) {
			$end_page++;
		}
		else if ($start_page > 1) {
			$start_page--;
		}
		else if ($end_page < $nr_pages) {
			$end_page++;
		}
	}
	
	// Limit $products to number of products per page
	$page_products = array_slice($products, ($current_page-1)*$results_per_page, $results_per_page);
	
	$smarty->assign('products', $page_products);
	$smarty->assign('products_keywords', array_unique($products_keywords));
	$smarty->assign('products_brands', array_unique($products_brands));
	$smarty->assign('filters', $filters);
	$smarty->assign('max_price', $max_price);
	$smarty->assign('nr_pages', $nr_pages);
	$smarty->assign('current_page', $current_page);
	$smarty->assign('start_page', $start_page);
	$smarty->assign('end_page', $end_page);
	$smarty->assign('user_favorites', $user_favorites);
	$smarty->assign('user_cart', $user_cart);
	
	$smarty->display('search.tpl');
	
	function callback($val) {
		return ($val !== "");
	}
?>
