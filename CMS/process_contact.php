<?php
//The page title and meta.
$page_title = "Contact us form sent";
$meta_description = "Contact AB Grocery, give feedback, and ask questions about the products we sell.";
$meta_keywords = "AB Grocery, contact, product requests, product inquiries";

include_once 'header.php';

//Check to see if the contact form was submitted. If so, show the confirmation page.
if($_POST['submit_contact']) {
    if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['subject']) && !empty($_POST['comments'])) {
        $name = strip_tags($_POST['name']);
        $email = strip_tags($_POST['email']);
        $subject = strip_tags($_POST['subject']);
        $comments = strip_tags($_POST['comments']);
    } else {
        header('location: contact.php');
    }
} else {
    header('location: contact.php');
} //End submit check.
?>
<div id = "wrapper">
<div id = "navigation"><?php  include_once 'navigation.php'; ?></div>
<div id = "sidebar"><?php  include_once 'sidebar.php'; ?></div>
<div id = "content">
    <h1>Contact us</h1>
    <p>WARNING: This confirmation page did not send a contact request to anyone. The display on this page is for demonstration purposes only.</p>
    
        <table>
        <tr>
            <td>name</td>
            <td><?php print $name;?></td>
        </tr>
    <tr>
        <td>email</td>
    <td><?php print $email;?></td>
    </tr>
    <tr>
        <td>subject</td>
    <td><?php print $subject;?></td>                        
    </tr>
    <tr>
        <td>Comments</td>
        <td><?php print $comments;?></td>
    </tr>
    </table>
</div>
</div>

<?php
include_once 'footer.php';
?>