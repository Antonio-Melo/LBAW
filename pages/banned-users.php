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
	$smarty->assign('css_file', 'banned-users.css');  
	$smarty->assign('js_file', 'banned-users.js');
	$smarty->assign('page_title', 'Banned Users');
	
	/*==================================================*/

	include_once('../database/users.php');

	$banned = getBannedUsers();
	
	$smarty->assign('banned', $banned);

	$smarty->display('banned-users.tpl');
?>
