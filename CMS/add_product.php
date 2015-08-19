<?php 
include_once 'page_router.php';

if(!isAdmin()) {
    header('location: index.php');
}
//Add the page to the database.
if(isset($_POST['submit'])) {
    $productid = trim(strip_tags($_POST['productid']));
        $keywords = trim(strip_tags($_POST['keywords']));
    $description = trim(strip_tags($_POST['description']));
    $weight = trim(strip_tags($_POST['weight']));
    $weight_unit = trim(strip_tags($_POST['weight_unit']));
    $image = trim(strip_tags($_POST['image']));
    $price = number_format(trim(strip_tags($_POST['price']), 2));

if(isTextdValid($productid) && isTextdValid($keywords) && isTextdValid($description) && isTextdValid($weight) && isTextdValid($weight_unit) && isTextdValid($image) && isTextdValid($price)) {
try {
    $count = $db->addProduct($productid, $keywords, $description, $weight, $weight_unit, $image, $price);
$_SESSION['message'] = $count . " products saved.";
header('location: index.php?pageid=products');
}
catch(Exception $e) {
$_SESSION['message'] = $e->getMessage();
} //End catch.
}
} //End add page.

// header variables that change when a new page is loaded.
$page_title = "Add a new product";

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
            <td>* Choose a product type:</td>
        <td>
            <select name="image">
                <option value="images/apples.jpg">Apples</option>
                <option value="images/blueberries.jpg">Blueberries</option>
<option value="images/bread.png">Bread</option>
                <option value="images.carrots.jpg">Carrots</option>
<option value="images/cheese.jpg">Cheese</option>
<option value="images/egg.png">Eggs</option>
<option value="images/lettuce.jpg">Lettuce</option>
<option value="images/oranges.jpg">Oranges</option>
<option value="images/peas.jpg">Peas</option>
<option value="images/squash.jpg">Squash</option>
            </select>
        </td>
        </tr>
        <tr>
            <td>* Product id/name (25 characters max.):</td>
        <td><input type="text" name="productid" maxlength="25" /></td>
        </tr>
    <tr>
        <td>* Keywords (500 characters max.):</td>
    <td><textarea rows="3" cols="30" name="keywords" maxlength="500"></textarea></td>
    </tr>    
    <tr>
        <td>* Description (255 characters max.):</td>
    <td><textarea rows="3" cols="30" name="description" maxlength="500"></textarea></td>
    </tr>    
    <tr>
        <td>* Package weight(Ex: 1):</td>
    <td><input type="text" name="weight" /></td>
    </tr>    
    <tr>
        <td>* Unit of weight (Ex: ounces, pounds):</td>
    <td><input type="text" name="weight_unit" /></td>
    </tr>
    <tr>
        <td>* price per unit (Ex: 3.98):</td>
    <td><input type="text" name="price" /></td>
    </tr>
    <tr>
        <td><input type="submit" value="Save" name="submit" /></td>
    <td><input type="reset" name="reset" value="Start over" /></td>
    </tr>
    </table>
</form>
    </div>
</div>
<?php 
include_once 'footer.php';
?>	