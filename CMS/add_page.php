<?php 
include_once 'page_router.php';

if(!isAdmin()) {
    header('location: index.php');
}
//Add the page to the database.
if(isset($_POST['submit'])) {
    $pageid = trim($_POST['pageid_field']);
    $title = trim($_POST['title_field']);
    $keywords = trim($_POST['keywords_field']);
    $description = trim($_POST['description_field']);
    $weight = trim($_POST['weight_field']);
    $content = trim($_POST['content_field']);

if(isTextdValid($pageid) && isTextdValid($title) && isTextdValid($keywords) && isTextdValid($description) && isTextdValid($weight) && isTextdValid($content)) {
try {
$db->addPage($pageid,$title,$keywords,$description,$content,$weight);
$_SESSION['message'] = "page saved.";
header('location: pages.php');
}
catch(Exception $e) {
$_SESSION['message'] = $e->getMessage();
} //End catch.
}
} //End add page.

// header variables that change when a new page is loaded.
$page_title = "Add a new page";

include_once 'header.php';
?>
<div id = "wrapper">
<div id = "navigation"><?php  include_once '../navigation.php'; ?></div>
<div id = "sidebar"><?php  include_once 'sidebar.php'; ?></div>
<div id = "content">
    <h1><?php print $page_title; ?></h1>
<p id="message"><?php print $_SESSION['message']; ?></p>
<form method="post" action="">
    <table>
        <tr>
            <td>* page ID (25 characters max):&nbsp;&nbsp;<input type="text" name="pageid_field" maxlength="25" /></td>
        <td>* page title (25 characters max):&nbsp;&nbsp;<input type="text" name="title_field" maxlength="25" /></td>
        <td>* page weight:&nbsp;&nbsp;<input type="text" name="weight_field" /></td>
        </tr>
    <tr>
        <td colspan="3">* Keywords (500 characters max):&nbsp;&nbsp;<input type="text" name="keywords_field" maxlength="500" /></td>
    </tr>
    <tr>
        <td colspan="3"><td>* description (255 characters max):&nbsp;&nbsp;<input type="text" name="description_field" maxlength="255" /></td>
    </tr>
    <tr>
        <td colspan="3">
            * Content (max 8000 characters):<br />
            <textarea cols="50" rows="10" maxlength="8000" name="content_field"></textarea>
        </td>
    </tr>
        <tr>
        <td><input type="submit" name="submit" value="save" /></td><td><input type="reset" name="reset" value="start over" /></td>
    </tr>
    </table>
</form>
    </div>
</div>
<?php 
include_once 'footer.php';
?>	