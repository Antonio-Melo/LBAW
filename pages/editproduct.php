<?php
	/*==================================================*/
	/* Same for every page */
	include_once('../config/init.php');
	
	/* Redirect to previous page if not logged in or is admin */
	if (!$_SESSION['id'] || !$_SESSION['admin']) {
		header("location:javascript://history.go(-1)");
		exit;
	}
	
	include_once('../database/countries.php');
	include_once('../database/keywords.php');
	
	$countries = getAllCountries();
	$keywords = getAllKeywords();
	
	$smarty->assign('countries', $countries);
	$smarty->assign('keywords', $keywords);
	
	/*==================================================*/
	/* Change to files of each pages */
	$smarty->assign('css_file', 'editproduct.css');  
	$smarty->assign('js_file', 'common.js');
	
	/*==================================================*/

	// redirect to home page if category not set
	if (!strip_tags($_GET["id"])) {
		header("Location: $BASE_URL");
		exit;
	}
	
	include_once('../database/products.php');
	include_once('../database/users.php');
	
	$id = strip_tags($_GET["id"]);
	$product = getProductById($id);
	
	$smarty->assign('product', $product[0]);
	$smarty->assign('page_title', $product[0]['product_name']);

	$smarty->display('editproduct.tpl');
?>
