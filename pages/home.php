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
	$smarty->assign('css_file', 'home.css');  
	$smarty->assign('js_file', 'home.js');
	
	/*==================================================*/

	include_once('../database/products.php');
	
	$onsale = getProductsOnSale();
	$mostpopular = getProductsMostPopular();
	
	$smarty->assign('onsale', $onsale);
	$smarty->assign('mostpopular', $mostpopular);

	$smarty->display('home.tpl');
?>
