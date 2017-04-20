<?php
	include_once('../config/init.php');
	include_once('../database/countries.php');
	include_once('../database/keywords.php');
	
	$countries = getAllCountries();
	$keywords = getAllKeywords();
	
	$smarty->assign('countries', $countries);
	$smarty->assign('keywords', $keywords);
	

	$smarty->assign('css_file', 'home.css');  
	$smarty->assign('js_file', 'home.js');	

	$smarty->display('home.tpl');
?>
