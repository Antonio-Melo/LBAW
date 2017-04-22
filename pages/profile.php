<?php
	/*==================================================*/
	/* Same for every page */	
	include_once('../config/init.php');
	
	/* Redirect to previous page if not logged in or is admin */
	if (!$_SESSION['username']) {
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
	$smarty->assign('css_file', 'profile.css');  
	$smarty->assign('js_file', 'common.js');
	
	/*==================================================*/

	include_once('../database/users.php');
	
	$username = $_SESSION['username'];
	
	$user = getUserByUsername($username);
	$addresses = getAddressesByUserId($user[0]['users_id']);
	$orders = getOrdersByUserId($user[0]['users_id']);
	
	foreach ($orders as $key => $order) {
		$orders[$key]['products'] = getProductsByOrderId($order['order_id']);	
	}
	
	$smarty->assign('user', $user[0]);
	$smarty->assign('addresses', $addresses);
	$smarty->assign('orders', $orders);
	
	$smarty->display('profile.tpl');
?>
