<?php include_once 'db.php'; ?>
      <ul>
<li><a href = "cart.php">Cart (<?php print $db->CountCartItems(); ?>)</a></li>
<li><a href="login.php">Login</a></li>
<?php 
$result = $db->getSidebar();
while($links = mysqli_fetch_array($result)) {
	print "<li><a href = \"index.php?pageid={$links['pageid']}\">{$links['title']}</a></li>";
}
	?>
<li><a href="contact.php">Contact</a></li>
<?php
//Show the management pages only to administrators and publishers.
if(isAdmin() || isPublisher()) {
    print "<li><a href=\"pages.php\">Manage pages</a></li>";
    } //End show management pages.
?>
</ul>

<div>
<a href="http://www.twitter.com"><img title="Twitter" alt="Twitter" src="images/twitter.png" width="35" height="35" /></a>
<a href="http://www.linkedin.com"><img title="LinkedIn" alt="LinkedIn" src="images/linkedin.png" width="35" height="35" /></a>
<a href="http://www.facebook.com"><img title="Facebook" alt="Facebook" src="images/facebook.png" width="35" height="35" /></a>
<a href="http://www.pinterest.com"><img title="Pinterest" alt="Pinterest" src="images/pinterest.png" width="35" height="35" /></a>
</div>
 
 

