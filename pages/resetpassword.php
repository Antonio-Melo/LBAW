<?php
	/*==================================================*/
	/* Same for every page */
	include_once('../config/init.php');
	include_once('../database/users.php');
	
	/* Redirect to previous page if already logged in */
	$user_id = confirmReset($_GET['id']);
	if ($_SESSION['id'] || !$_GET['id'] || !$user_id) {
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
	
	$smarty->assign('css_file', 'resetpassword.css');  
	$smarty->assign('js_file', 'resetpassword.js');
	$smarty->assign('page_title', 'Reset Password');
	
	/*==================================================*/
	$username = getUserByID($user_id['user']);
	
	$smarty->assign('username', $username[0]['username']);
	
	$smarty->display('resetpassword.tpl');
?>
