<?php

include_once 'db.php';
$db = new DB();
$cart = $db->getItemsFromCart();

// The page title. Leave description and keywords out to make it difficult to find the page.
$page_title = "Checkout";

include_once 'header.php';

//Prevent anyone from seeing the page unless they go through the shopping cart checkout process.
if(!$_SESSION['user']['authenticated']) {
    header('location: index.php?pageid=products');
} else if($_SESSION['user']['authenticated'] == true) {

?>

<div id = "wrapper">
<div id = "navigation"><?php  include_once '../navigation.php'; ?></div>
<div id = "sidebar"><?php  include_once 'sidebar.php'; ?></div>
<div id = "content">
    <h1>Checkout</h1>
    <p>Thank you for your order. You have been testing an immitation online store. This shopping experience is for demonstration purposes only. Any products purchased will <em>not</em> take place. All items, descriptions, and prices are fictitious in nature. Any resemblance to factual products is completely coincidental.</p>            
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
<?php foreach($cart as $item) {?>
<tr>
                                                                     <td><?php print $item['productid'];?></td>
                                                                 <td><?php print $item['description'];?></td>
                                                                 <td><?php print $item['weight'] * $item['quantity'];?>&nbsp;<?php print $item['weight_unit']; ?></td>
                                                                 <td>$<?php print number_format($item['quantity']*$item['price'], 2);?></td>
                                                                 <td><?php print $item['quantity'];?></td>
                                                                 </tr>
<?php
          //Find the subtotal in the cart.
          $subtotal += $item['quantity'] * $item['price'];
          $tax = $subtotal * 0.05;
          $total = $subtotal + $tax;
      }?>
<tr>
    <td colspan="3">Subtotal</td>
    <td>$<?php print number_format($subtotal, 2); ?></td>
</tr>
<tr>
    <td colspan="3">Tax</td>
    <td>$<?php print number_format($tax, 2);?></td>
</tr>
<tr>
    <td colspan="3">Total</td>
    <td>$<?php print number_format($total, 2);?></td>
</tr>
</tbody>
                                                             </table>
</form>
</div>
</div>

<?php
    include_once 'footer.php';
    $db->emptyCart();
} //End checkout process.
?>