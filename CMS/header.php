<?php
session_start(); //Start the session.
include_once 'db.php';
$db = new DB(); //The database;
include_once 'page_functions.php';
ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="description" content= "<?php print $meta_description; ?>" />
		<meta name ="keywords" content = "<?php print $meta_keywords; ?>" />
		<meta name = "author" content = "Andy Borka" />
		<title><?php print $page_title; ?></title>
		<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
		<script type = "text/javascript" src = "bio_form.js"></script>
		</head>
		<body>