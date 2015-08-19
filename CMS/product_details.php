<?php
$productid = urldecode(strip_tags(trim($_GET['productid']))); //Determines the product to load.
include_once 'product_router.php';
include_once 'db.php';
$db = new DB();

//Set the page title and meta.
$page_title = $current_product['productid'];
$meta_description = $current_product['description'];
$meta_keywords = $current_product['keywords'];

include_once 'header.php';
//Check to see if the add to cart posted.
if(isset($_POST['quantity']) && !empty($_POST['quantity']) && is_numeric($_POST['quantity']) && $_POST['quantity'] != "0") {
    $current_product['quantity'] = $_POST['quantity'];
    //Add the product to the cart.
    $db->addItemToCart($current_product['id'], $current_product['quantity']);
             unset($_POST['quantity']);    
    header('location: cart.php');
                                 }

?>
<div id = "wrapper">
<div id = "navigation"><?php  include_once '../navigation.php'; ?></div>
<div id = "sidebar"><?php  include_once 'sidebar.php'; ?></div>
<div id = "content">
    <h1><?php print $current_product['productid'];?></h1>
    <img class = "<?php print $current_product['productid']?>" id = "product_image" src = "<?php print $current_product['image'] ?>" alt = "<?php print $current_product['productid']?>" />
    <form method = "post" action = "<?php print $_SERVER['php_self']?>">
        <table>
                                                                 <thead>
                                                                     <tr>
                                                                         <th>Name</th>
                                                                         <th>Description</th>
                                                                         <th>Weight</th>
<th>Price</th>
                                                                     <th>Quantity</th>
                                                                     </tr>
                                                                 </thead>
                                                             <tbody>
                                                                 <tr>
                                                                     <td><?php print $current_product['productid'];?></td>
                                                                 <td><?php print $current_product['description'];?></td>
                                                                 <td><?php print $current_product['weight'];?>&nbsp;<?php print $current_product['weight_unit'] ?></td>
                                                                 <td>$<?php print number_format($current_product['price'], 2);?></td>
                                                                 <td><input id="quantity_field" type ="text" name="quantity" size ="4" /><input id = "update_cart" type="submit" value="add to cart" /></td>
                                                                 </tr>
                                                             </tbody>
                                                             </table>
</form>
</div>
</div>

<?php
include_once 'footer.php';
?>