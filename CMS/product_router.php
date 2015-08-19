<?php
/*
 * File: product_Router.php
 * Purpose: Routes the products to display.
 * Author: Andy Borka
 */
include_once 'db.php';
$db = new DB();
$productid = urldecode(strip_tags($_GET['productid']));

//Determine if productidis set. If not, default to the products listing.
//Otherwise, load the product requested.
if(!isset($productid) || empty($productid) || $productid == "") {
    header('location: index.php?pageid=products');
} else {
    $result = $db->getProduct($productid);
    while($product = mysqli_fetch_array($result)) {
        $current_product = $product;
    }
    }

?>