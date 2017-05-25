<?php
	/*==================================================*/
	/* Same for every page */	
	include_once('../config/init.php');
	
	/* Redirect to previous page if not logged in or is admin */
	if (!$_SESSION['id'] || $_SESSION['admin']) {
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
	$smarty->assign('css_file', 'checkout.css');  
	$smarty->assign('js_file', 'checkout.js');
	$smarty->assign('page_title', 'Checkout');
	
	/*==================================================*/

	include_once('../database/users.php');
	include_once('../database/checkout.php');
	
	$user = getUserById($_SESSION['id']);
	$products = getUserCart($_SESSION['id']);
	$addresses = getAddressesByUserId($_SESSION['id']);
	$shippingmethods = getAllShippingMethods();
	$paymentmethods = getAllPaymentMethods();
	
	$smarty->assign('user', $user[0]);
	$smarty->assign('addresses', $addresses);
	$smarty->assign('products', $products);
	$smarty->assign('shippingmethods', $shippingmethods);
	$smarty->assign('paymentmethods', $paymentmethods);
	
	$smarty->display('checkout.tpl');
?>
