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
	$smarty->assign('css_file', 'category.css');  
	$smarty->assign('js_file', 'common.js');
	
	/*==================================================*/

	// redirect to home page if category not set
	if (!$_GET["id"]) {
		header("Location: $BASE_URL");
		exit;
	}
	
	include_once('../database/products.php');
	include_once('../database/keywords.php');
	
	$id = $_GET["id"];
	$onsale = getProductsOnSaleCat($id);
	$mostpopular = getProductsMostPopularCat($id);
	$category = getKeywordById($id);
	
	$smarty->assign('onsale', $onsale);
	$smarty->assign('mostpopular', $mostpopular);
	$smarty->assign('category', $category[0]);
	$smarty->assign('page_title', $category[0]['name']);

	$smarty->display('category.tpl');
?>
