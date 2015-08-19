<?php 
include_once 'page_router.php';
$pageid = strip_tags(trim($_GET['pageid']));

if(!isAdmin()) {
    header('location: index.php');
}

//Delete the page.
if(isset($_POST['confirmation_yes'])) {
    try {
        $count = $db->removePage($pageid);
        $_SESSION['message'] = $count . " page(s) deleted.";
        header('location: pages.php');            
    } //End try.
catch(Exception $e) {
    $_SESSION['message'] = $e->getMessage();
    header('location: pages.php');
    }
}       //End delete page.

//The user refuses to delete the page.
if(isset($_POST['confirmation_no'])) {
    $_SESSION['message'] = "No pages were deleted.";
header('location: pages.php');
}
// header variables that change when a new page is loaded.
$page_title = "Delete page confirmation";

include_once 'header.php';
?>
<div id = "wrapper">
<div id = "navigation"><?php  include_once '../navigation.php'; ?></div>
<div id = "sidebar"><?php  include_once 'sidebar.php'; ?></div>
<div id = "content">
    <h1><?php print $page_title; ?></h1>
<p id="message"><?php print $_SESSION['message']; ?></p>
       <form method = "post" action = "">
       <div class ="delete_confirmation">
           <p>You are about to delete a page. This cannot be undone. Do you wish to continue?</p>
           <input type="submit" value ="Yes" id ="confirmation_yes" name ="confirmation_yes" />
       <input type="submit" value ="No" id ="confirmation_no" name ="confirmation_no" />
       </div>                                       
       </form>
</div>
</div>
<?php 
include_once 'footer.php';
?>	