<?php
/*
 * File: Router.php
 * Purpose: Routes the incomming page requests to the correct content.
 * Author: Andy Borka
 */
include_once 'pages.php';

//Determine if pageid is set. If not, default to the homepage.
//Otherwise, load the page requested.
if(!isset($pageid) || empty($pageid) || $pageid == "" || !isset($pages[$pageid])) {
    $current_page = $pages['home'];
} else {
    $current_page = $pages[$pageid];
}

?>