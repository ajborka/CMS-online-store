<?php 
include_once 'page_router.php';
$pageid = strip_tags(trim($_GET['pageid']));

if(!isAdmin()) {
    header('location: index.php');
}
//prefill the form with the page from the database making sure it doesn't get loaded on submit.
if(!isset($_POST['submit'])) {
    try {
        $result = $db->GetPage($pageid);
        while($row = mysqli_fetch_array($result)) {
            $page = $row;
        }
    }
    catch(Exception $e) {
        $_SESSION['message'] = $e->getMessage();
    }
} //End loading the page to edit.
if(isset($_POST['submit'])) {
    $pageid = trim($_POST['pageid_field']);
    $title = trim($_POST['title_field']);
    $keywords = trim($_POST['keywords_field']);
    $description = trim($_POST['description_field']);
    $weight = trim($_POST['weight_field']);
    $content = trim($_POST['content_field']);
    $ID = trim($_POST['ID']);
if(isTextdValid($pageid) && isTextdValid($title) && isTextdValid($keywords) && isTextdValid($description) && isTextdValid($weight) && isTextdValid($content)) {
try {
    $db->updatePage($ID, $pageid, $title, $keywords, $description, $content, $weight);
$_SESSION['message'] = "page updated.";
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
            <td>* page ID (25 characters max):&nbsp;&nbsp;<input type="text" name="pageid_field" maxlength="25" value ="<?php print $page['pageid']; ?>" /></td>
        <td>* page title (25 characters max):&nbsp;&nbsp;<input type="text" name="title_field" maxlength="25" value="<?php print $page['title']; ?>" /></td>
        <td>* page weight:&nbsp;&nbsp;<input type="text" name="weight_field" value="<?php print $page['weight']; ?>" /></td>
        </tr>
    <tr>
        <td colspan="3">* Keywords (500 characters max):&nbsp;&nbsp;<input type="text" name="keywords_field" maxlength="500" value="<?php print $page['keywords']; ?>" /></td>
    </tr>
    <tr>
        <td colspan="3"><td>* description (255 characters max):&nbsp;&nbsp;<input type="text" name="description_field" maxlength="255" value="<?php print $page['description']; ?>" /></td>
    </tr>
    <tr>
        <td colspan="3">
            * Content (max 8000 characters):<br />
            <textarea cols="50" rows="10" maxlength="8000" name="content_field"><?php print stripslashes($page['content']); ?></textarea>
        </td>
    </tr>
        <tr>
        <td><input type="submit" name="submit" value="save" /></td><td><input type="reset" name="reset" value="start over" /></td>
    </tr>
    </table>
<input type="hidden" name="ID" value="<?php print $page['id']; ?>" />
</form>
    </div>
</div>
<?php 
include_once 'footer.php';
?>	