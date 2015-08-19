<?php 
include_once 'page_router.php';
//Only available to admins and publishers.
if(!(isAdmin() || isPublisher())) {
    header('location: index.php');
} //End security check.

// header variables that change when a new page is loaded.
$page_title = "Manage pages";
include_once 'header.php';
?>
<div id = "wrapper">
<div id = "navigation"><?php  include_once '../navigation.php'; ?></div>
<div id = "sidebar"><?php  include_once 'sidebar.php'; ?></div>
<div id = "content">
    <h1><?php print $page_title; ?></h1>
<p id="message"><?php print $_SESSION['message']; 
                      unset($_SESSION['message']); ?></p>
<table>
    <caption>Choose an action from the list to the right of each page. Weight is the order the links will appear in the sidebar.
<?php
                      if(isAdmin()) { ?>}
         If you wish, you can <a href="add_page.php">add a new page</a></caption>
<?php } ?>
    <thead>
                <tr><th>Page ID</th><th>Title</th><th>Weight</th><th>Actions</th></tr>
           </thead>
    <tbody>
<?php 
$pages = $db->getSidebar();
while($page = mysqli_fetch_array($pages)) {
    //Cannot remove the homepage.
    if($page['pageid'] == "/") {
        print "<tr><td>{$page['pageid']}</td><td>{$page['title']}</td><td>{$page['weight']}</td><td><a href = \"edit_page.php?pageid={$page['pageid']}\">edit</a></td></tr>";
        continue;
    } //End checking for special case on homepage.
    if($page['pageid'] == "products") {
        print "<tr><td>{$page['pageid']}</td><td>{$page['title']}</td><td>{$page['weight']}</td><td><a href = \"edit_page.php?pageid={$page['pageid']}\">edit</a></td></tr>";
        continue;
    } //End checking for special case on products page.
        print "<tr><td>{$page['pageid']}</td><td>{$page['title']}</td><td>{$page['weight']}</td><td>";
    if(isAdmin()) {
        print "<a href = \"remove_page.php?pageid={$page['pageid']}\">Remove</a>&nbsp;&nbsp;";
    }
    if(isAdmin() || isPublisher()) {
        print "<a href = \"edit_page.php?pageid={$page['pageid']}\">Edit</a>";
    }
    print "</td></tr>";    
}
?>
    </tbody>
        </table>
    </div>
</div>
<?php 
include_once 'footer.php';
?>	