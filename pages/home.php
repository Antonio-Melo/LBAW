<?php
	include_once('../config/init.php');
	//include_once($BASE_DIR .'database/');
	
	$smarty->assign('css_file', 'home.css');  
	$smarty->assign('js_file', 'home.js');
	$smarty->assign('user_type', 3);
	
	$smarty->display('home.tpl');
?>
