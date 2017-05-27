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
	$smarty->assign('css_file', 'resetresult.css');  
	$smarty->assign('js_file', 'common.js');
	$smarty->assign('page_title', 'Succesful reset');
	
	/*==================================================*/

	$smarty->display('successreset.tpl');
?>
