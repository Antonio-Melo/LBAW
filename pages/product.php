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
	$smarty->assign('css_file', 'product.css');  
	$smarty->assign('js_file', 'product.js');
	
	/*==================================================*/

	// redirect to home page if category not set
	if (!$_GET["id"]) {
		header("Location: $BASE_URL");
		exit;
	}
	
	include_once('../database/products.php');
	
	$id = $_GET["id"];
	$product = getProductById($id);
	$faqs = getFaqsByProductId($id);
	$reviews = getReviewsByProductId($id);
	
	foreach ($reviews as $key => $review) {
		$reviews[$key]['replies'] = getRepliesByReviewId($review['review_id']);	
	}
	
	$smarty->assign('product', $product[0]);
	$smarty->assign('faqs', $faqs);
	$smarty->assign('reviews', $reviews);

	$smarty->display('product.tpl');
?>
