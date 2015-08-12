<?php
//Set the page title and meta.
$page_title = "Your cart";
$meta_description = "Shopping cart for abs Grocery.";
$meta_keywords = "Cart, checkout";

include_once 'header.php';

//Determine if the form submitted an update cart request.
if($_POST['update_cart']) {

    //Loop through the items in the cart, updating the quantity.
foreach($_SESSION['cart']['items'] as $item) {
    $quantity_field = $item['productid'] . "_quantity"; //Quantity field from the cart.
    
    //Remove the item if quantity is 0.
    if($_POST[$quantity_field] == "0" || !isset($_POST[$quantity_field]) || empty($_POST[$quantity_field]) || $_POST[$quantity_field] == null || $_POST[$quantity_field] == "") {
        unset($_SESSION['cart']['items'][$item['productid']]);
    } //End remove from cart.
    else {
        $_SESSION['cart']['items'][$item['productid']]['quantity'] = $_POST[$quantity_field]; //Update the new quantity.
    } // update quantities.    
    } //End loop through items in cart.
} //End update cart process.

//Check for signin for the checkout process.
if($_POST['checkout']) {
if(!isset($_SESSION['user']['authenticated']) || $_SESSION['user']['authenticated'] == false) {
    $_SESSION['destination'] = "checkout.php";
    header('location: login.php');
} else {
    header('location: checkout.php');
}
} //End checkout process through a login page.
?>
<div id = "wrapper">
<div id = "navigation"><?php  include_once 'navigation.php'; ?></div>
<div id = "sidebar"><?php  include_once 'sidebar.php'; ?></div>
<div id = "content">
    <h1>Cart</h1>
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
<?php foreach($_SESSION['cart']['items'] as $item) {?>
<tr>
                                                                     <td><?php print $item['productid'];?></td>
                                                                 <td><?php print $item['description'];?></td>
                                                                 <td><?php print $item['weight'];?></td>
                                                                 <td>$<?php print number_format($item['quantity']*$item['price'], 2);?></td>
                                                                 <td><input id="<?php print $item['productid']?>_quantity" type ="text" name="<?php print $item['productid']?>_quantity" value = "<?php print $item['quantity']?>" /></td>
                                                                 </tr>
<?php
          //Find the subtotal in the cart.
          $subtotal += $item['quantity'] * $item['price'];
      }?>
<tr>
    <td colspan="3">Subtotal</td>
    <td>$<?php print number_format($subtotal, 2); ?></td>
</tr>
<tr>
    <td colspan="5">
                <input id="update_cart" name="update_cart" type="submit" value="Update cart" />                               
        <input id="checkout" name="checkout" type="submit" value="checkout" />
    </td>
                                                                                     </tr>
</tbody>
                                                             </table>
</form>
</div>
</div>

<?php
include_once 'footer.php';
?>