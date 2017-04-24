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
	
	/*==================================================*/

	include_once('../database/products.php');
	
	$page;
	if(!$_GET['page']) {
		$page = 1;
	}
	else {
		$page = $_GET['page'];
	}
	
	$products = getSearchProducts($page);
	$products_keywords = [];
	$products_brands = [];
	$max_price = 0;
	
	foreach ($products as $product) {
		array_push($products_keywords, $product['keyword_name']);
		array_push($products_brands, $product['brand_name']);
		if ($product['sale_price'] != null && $product['sale_price'] > $max_price) {
			$max_price = $product['sale_price'];
		}
		else if ($product['sale_price'] == null && $product['price'] > $max_price) {
			$max_price = $product['price'];
		}
	}
		
	$smarty->assign('products', $products);
	$smarty->assign('products_keywords', array_unique($products_keywords));
	$smarty->assign('products_brands', array_unique($products_brands));
	$smarty->assign('max_price', $max_price);
	
	$smarty->display('search.tpl');
?>