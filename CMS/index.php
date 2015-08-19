<?php 
include_once 'page_router.php';
// header variables that change when a new page is loaded.
$page_title = $current_page['title'];
$meta_description = $current_page['description'];
$meta_keywords = $current_page['keywords'];
include_once 'header.php';
?>
<div id = "wrapper">
<div id = "navigation"><?php  include_once '../navigation.php'; ?></div>
<div id = "sidebar"><?php  include_once 'sidebar.php'; ?></div>
<div id = "content">
    <h1><?php print $current_page['title']; ?></h1>
<p id="message"><?php print $_SESSION['message'];
                      unset($_SESSION['message']); ?></p>
<?php print stripcslashes($current_page['content']);?>
    </div>
</div>
<?php 
include_once 'footer.php';
?>	