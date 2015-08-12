<?php
/*
 * File: product_Router.php
 * Purpose: Routes the products to display.
 * Author: Andy Borka
 */
include_once 'products.php';
include_once 'pages.php';

//Determine if productidis set. If not, default to the products listing.
//Otherwise, load the product requested.
if(!isset($productid) || empty($productid) || $productid == "" || !isset($products[$productid])) {
    header('location: index.php?pageid=products');
} else {
    $current_product = $products[$productid];
}

?>