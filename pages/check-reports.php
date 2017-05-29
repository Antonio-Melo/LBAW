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
$smarty->assign('css_file', 'check-reports.css');
$smarty->assign('js_file', 'check-reports.js');

/*==================================================*/

include_once('../database/products.php');
include_once('../database/users.php');

/*==================================================*/

include_once('../database/admin.php');

$results_per_page = 20;
$current_page;
if (strip_tags($_GET['page'])) {
    $current_page = strip_tags($_GET['page']);
}
else {
    $current_page = 1;
}

$reports = getReports();

$nr_pages = ceil(count($reports)/$results_per_page);
$start_page = $current_page;
$end_page = $current_page;
for ($i = 0; $i < 4; $i++) {
    if ($start_page > $current_page - 2 && $start_page > 1) {
        $start_page--;
    }
    else if ($end_page < $current_page + 2 && $end_page < $nr_pages) {
        $end_page++;
    }
    else if ($start_page > 1) {
        $start_page--;
    }
    else if ($end_page < $nr_pages) {
        $end_page++;
    }
}

$page_reports = array_slice($reports, ($current_page-1)*$results_per_page, $results_per_page);

$smarty->assign('reports', $page_reports);
$smarty->assign('nr_pages', $nr_pages);
$smarty->assign('current_page', $current_page);
$smarty->assign('start_page', $start_page);
$smarty->assign('end_page', $end_page);

$smarty->display('check-reports.tpl');
?>