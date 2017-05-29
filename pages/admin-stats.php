<?php
	/*==================================================*/
	/* Same for every page */
	include_once('../config/init.php');
	
	/* Redirect to previous page if not logged in or not is admin */
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
	$smarty->assign('css_file', 'admin-stats.css');  
	$smarty->assign('js_file', 'admin-stats.js');
	$smarty->assign('page_title', 'Stats');
	
	/*==================================================*/
	
	include_once('../database/admin.php');
	
	$products = getAllProductsStats();
	
	$smarty->assign('products', $products);	
	
	$smarty->display('admin-stats.tpl');
?>