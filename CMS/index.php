<?php 
$pageid = $_GET['pageid']; //determines what page to load.
      include_once 'pages.php'; //The pages array.
include_once 'page_router.php'; //Page routing system.

// header variables that change when a new page is loaded.
$page_title = $current_page['title'];
$meta_description = $current_page['description'];
$meta_keywords = $current_page['keywords'];
include_once 'header.php';
?>
<div id = "wrapper">
<div id = "navigation"><?php  include_once 'navigation.php'; ?></div>
<div id = "sidebar"><?php  include_once 'sidebar.php'; ?></div>
<div id = "content"><?php print $current_page['content'];?></div>
</div>
<?php 
include_once 'footer.php';
?>	