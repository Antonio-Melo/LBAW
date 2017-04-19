<?php
	include_once('../../config/init.php');
	//include_once($BASE_DIR .'database/');
	
	$smarty->assign('js_file', 'home.css');  
	$smarty->assign('css_file', 'home.js');
	$smarty->assign('user_type', 3);
	$smarty->display('tweets/list.tpl');
	
	$smarty->display('home.tpl');
	
	/*
	$cssPath = '../style/home.css';
	$jsPath = '../scripts/home.js';
    $admin = false;
	include('../templates/header.php');
	include('../templates/home.php');
	include('../templates/footer.php');
	*/
?>