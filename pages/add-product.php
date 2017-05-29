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
$smarty->assign('css_file', 'add-product.css');
$smarty->assign('js_file', 'add-product.js');

/*==================================================*/

include_once('../database/products.php');
include_once('../database/users.php');

$brands = getAllBrandNames();
$smarty->assign('brands', $brands);

$smarty->display('add-product.tpl');
?>
