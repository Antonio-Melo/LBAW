<?php
	include_once('../config/init.php');
	//include_once($BASE_DIR .'database/');
	
	$smarty->assign('css_file', 'home.css');  
	$smarty->assign('js_file', 'home.js');
	
	$smarty->display('home.tpl');
?>
