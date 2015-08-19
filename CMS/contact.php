<?php
//The page title and meta.
$page_title = "Contact us";
$meta_description = "Contact AB Grocery, give feedback, and ask questions about the products we sell.";
$meta_keywords = "AB Grocery, contact, product requests, product inquiries";

include_once 'header.php';
?>
<div id = "wrapper">
<div id = "navigation"><?php  include_once '../navigation.php'; ?></div>
<div id = "sidebar"><?php  include_once 'sidebar.php'; ?></div>
<div id = "content">
    <h1>Contact us</h1>
    <p>WARNING: Filling out this form and submitting it does not send a contact request to anyone. The display on the successfully submitted page is for demonstration purposes only.</p>
    
    <form method="post" action="process_contact.php">
    <table>
        <tr>
            <td>* name</td>
            <td><input id ="name" name="name" type="text" /></td>
        </tr>
    <tr>
        <td>* email</td>
    <td><input id="email" name="email" type="text" /></td>
    </tr>
    <tr>
        <td>* subject</td>
        <td><select id="subject" name="subject">
            <option value="feedback">Website feedback</option>
            <option value="purchasing">Purchasing problems</option>
            <option value="products">Question about products</option>
            </select></td>
    </tr>
    <tr>
        <td colspan ="2">
            <textarea rows="5" cols="40" id="comments" name="comments"></textarea>
        </td>
    </tr>
    <tr>
        <td><input id="submit_contact" name="submit_contact" value="send" type="submit" /></td>
    <td><input id="reset" name="reset" value="clear form" type="reset" /></td>
    </tr>
    </table>
  </form>
</div>
</div>

<?php
include_once 'footer.php';
?>