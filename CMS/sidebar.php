<?php 
include_once 'pages.php';
?>
<ul>
<li><a href = "cart.php">Cart (<?php print count($_SESSION['cart']['items']);?>)</a></li>
<?php 
foreach($pages as $page) {
	print "<li><a href = \"index.php?pageid={$page['pageid']}\">{$page['title']}</a></li>";
}
	
?>
<li><a href="contact.php">Contact</a></li>
</ul>

<div>
<a href="http://www.twitter.com"><img title="Twitter" alt="Twitter" src="images/twitter.png" width="35" height="35" /></a>
<a href="http://www.linkedin.com"><img title="LinkedIn" alt="LinkedIn" src="images/linkedin.png" width="35" height="35" /></a>
<a href="http://www.facebook.com"><img title="Facebook" alt="Facebook" src="images/facebook.png" width="35" height="35" /></a>
<a href="http://www.pinterest.com"><img title="Pinterest" alt="Pinterest" src="images/pinterest.png" width="35" height="35" /></a>
</div>
 
 

