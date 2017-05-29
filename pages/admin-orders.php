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
	$smarty->assign('css_file', 'admin-orders.css');  
	$smarty->assign('js_file', 'admin-orders.js');
	$smarty->assign('page_title', 'Pending Orders');
	
	/*==================================================*/

	include_once('../database/admin.php');
	
	$not_shipped = getNotShippedOrders();
	$not_delivered = getNotDeliverdOrders();
	
	$smarty->assign('not_shipped', $not_shipped);
	$smarty->assign('not_delivered', $not_delivered);
	
	$smarty->display('admin-orders.tpl');
?>