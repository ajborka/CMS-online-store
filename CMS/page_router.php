<?php
/*
 * File: Router.php
 * Purpose: Routes the incomming page requests to the correct content.
 * Author: Andy Borka
 */
include_once 'page_functions.php';
include_once 'products.php';
include_once 'db.php';
$db = new DB();
$pageid = $_GET['pageid'];
//Determine if pageid is set. If not, default to the homepage.
//Otherwise, load the page requested.
$pageid = $_GET['pageid'];
//Determine if pageid is set. If not, default to the homepage.
//Otherwise, load the page requested.
if(!isset($pageid) || empty($pageid) || $pageid == "") {
    $pageid = "/";
}
try {
    $results = $db->GetPage($pageid);    
    while($page =  mysqli_fetch_array($results)) {
        $current_page = $page; //Assign the resulting page to the current_page array for display.
        }
    //If the products page is loaded, assign the dynamically built content to the content index of the array.
    if($current_page['pageid'] == "products") {
        $current_page['content'] = renderProductsPage();
    }

} //end try
catch(Exception $e) {
    $_SESSION['message'] = $e->getMessage();
}

?>