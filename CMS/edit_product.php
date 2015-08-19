<?php 
include_once 'page_router.php';
$productid = urldecode($_GET['productid']);


if(!(isAdmin()|| isPublisher())) {
    header('location: index.php');
}

if(!isset($_POST['submit'])) {
try {
    $result = $db->getProduct($productid);
while($row = mysqli_fetch_array($result)) {
    $current_product = $row;
}
}
catch(Exception $e) {
    $_SESSION['message'] = $e->getMessage();
}
}

//Update the product.
if(isset($_POST['submit'])) {
    $productid = trim(strip_tags($_POST['productid']));
        $keywords = trim(strip_tags($_POST['keywords']));
    $description = trim(strip_tags($_POST['description']));
    $weight = trim(strip_tags($_POST['weight']));
    $weight_unit = trim(strip_tags($_POST['weight_unit']));
        $price = trim(strip_tags($_POST['price']));
        $ID = $_POST['ID'];
if(isTextdValid($productid) && isTextdValid($keywords) && isTextdValid($description) && isTextdValid($weight) && isTextdValid($weight_unit) && isTextdValid($price)) {
try {
    $count = $db->updateProduct($ID, $productid, $keywords, $description, $weight, $weight_unit, $price);
$_SESSION['message'] = $count . " products saved.";
header('location: index.php?pageid=products');
}
catch(Exception $e) {
$_SESSION['message'] = $e->getMessage();
} //End catch.
}
} //End update product.

// header variables that change when a new page is loaded.
$page_title = "update a product";

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
            <td>product type:</td>
        <td><?php print $current_product['image']; ?></td>
        </tr>
        <tr>
            <td>* Product id/name (25 characters max.):</td>
        <td><input type="text" name="productid" maxlength="25" value="<?php print $current_product['productid']; ?>" /></td>
        </tr>
    <tr>
        <td>* Keywords (500 characters max.):</td>
    <td><textarea rows="3" cols="30" name="keywords" maxlength="500"><?php print $current_product['keywords']; ?></textarea></td>
    </tr>    
    <tr>
        <td>* Description (255 characters max.):</td>
    <td><textarea rows="3" cols="30" name="description" maxlength="500"><?php print $current_product['description']; ?></textarea></td>
    </tr>    
    <tr>
        <td>* Package weight(Ex: 1):</td>
    <td><input type="text" name="weight" value="<?php print $current_product['weight']; ?>" /></td>
    </tr>    
    <tr>
        <td>* Unit of weight (Ex: ounces, pounds):</td>
    <td><input type="text" name="weight_unit" value="<?php print $current_product['weight_unit']; ?>" /></td>
    </tr>
    <tr>
        <td>* price per unit (Ex: 3.98):</td>
    <td><input type="text" name="price" value="<?php print $current_product['price']; ?>" /></td>
    </tr>
    <tr>
        <td><input type="submit" value="Save" name="submit" /></td>
    <td><input type="reset" name="reset" value="Start over" /></td>
    </tr>
    </table>
<input type="hidden" value="<?php print $current_product['id']; ?>" name="ID" />
</form>
    </div>
</div>
<?php 
include_once 'footer.php';
?>	