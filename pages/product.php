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
	$smarty->assign('css_file', 'product.css');  
	$smarty->assign('js_file', 'product.js');
	
	/*==================================================*/

	// redirect to home page if category not set
	if (!$_GET["id"]) {
		header("Location: $BASE_URL");
		exit;
	}
	
	include_once('../database/products.php');
	
	$id = $_GET["id"];
	$product = getProductById($id);
	$faqs = getFaqsByProductId($id);
	
	$smarty->assign('product', $product[0]);
	$smarty->assign('faqs', $faqs);

	$smarty->display('product.tpl');
?>
