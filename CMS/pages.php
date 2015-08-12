<?php

//The arrays that store the pages content, sidebar links, and meta tags.
//The home page.
include_once 'products.php';
//Home page. Will be converted to database later.
$pages['home']['pageid'] = "/";
$pages['home']['title'] = "home";
$pages['home']['keywords'] = "AB grocery, online store, community relief, food pantry, donations, food drive";
$pages['home']['description'] = "AB grocery is a local online store which sends a portion of all profits to local agencies for the purpose of helping relieve community poverty.";
$pages['home']['content'] = "
		<h1>AB Grocery</h1>
		<p>Welcome to our new online store. We hope your experience here is pleasant. If you need anything, feel free to <a href = \"index.php?pageid = contact\">contact us.</a> Use the links to the left to explore the store and our involvement with the community.</p>";

//About page. Will be converted to database later.
$pages['about']['pageid'] ="about";
$pages['about']['title'] = "about";
$pages['about']['keywords'] = "AB grocery, about AB grocery, AB history, AB corporate, Get to know AB";
$pages['about']['description'] = "The history of AB grocery, its mission, goals, and vision for the future. Come and get to know us!";
$pages['about']['content'] = "
<h1>About AB Grocery</h1>
<p>AB Grocery was founded by Andy Borka. The store hopes to completely follow the Word of God. Our mission is to take care of orphans and widows as James states in James 1:27. To accomplish this, AB grocery plans to have regularly scheduled food drives, a place where people can purchase and donate food to local agencies, and a link on the website to accept monitary donations.</p>
<p> AB is able to nagociate with venders to offer us a lower price on supplies. As a result, the items for sale on the website are sold at fair market value. In doing so, we can offer you items at the same price you normally pay. However, the overhead will be donated to local agencies to help people in need.</p>";

//Press release/news page. Will be converted to database later.
$pages['press']['pageid'] = "press";
$pages['press']['title'] = "Press releases";
$pages['press']['keywords'] = "AB news, AB press releases, community relief, poverty";
$pages['press']['description'] = "AB Grocery news and press releases discussing poverty, community relief, and how the store helps combat poverty";
$pages['press']['content'] = "
<h1>Press releases</h1>
<table>
<tr><td>Store opening</td></tr>
<tr><td>07/23/2015</td></tr>
       <tr><td><p>Today marks the opening of AB Grocery. As a special contribution to community relief, 100% of the store income will go towards community relief. The special contribution will continue for the next three weeks.</p></td></tr>
</table>";

//The events page. Will be converted to database later.
$pages['events']['pageid'] = "events";
$pages['events']['title'] = "Events";
$pages['events']['keywords'] = "AB Grocery, AB events, community relief, calendar, poverty";
$pages['events']['description'] = "AB Grocery's calendar of events. Come and see how you can help in community relief";
$pages['events']['content'] = "
<h1>Upcoming events</h1>
<table>
<tr><td>08/01/2015</td></tr>
<tr><td><p>The food drive will be held at the church on the corner of main and providence street between 1:00pm and 5:00pm. Everyone is encouraged to bring nonperishable items to donate to the local food bank. The local food bank helps people with short-term food needs. If you have any questions or want to learn more about the food bank, call Johnny Breaker at (222) 111-6655.</p></td></tr>
<tr><td>Food drive</td></tr>
</table>";

//Donate page. Will be converted to database later.
$pages['donate']['pageid'] = "donate";
$pages['donate']['title'] = "Donate";
$pages['donate']['keywords'] = "AB Grocery donations, community relief, poverty, food bank";
$pages['donate']['description'] = "AB donations and how we help the community with food relief and other assistance.";
$pages['donate']['content'] = "
<h1>Donations</h1>
<p>Anyone can donate to the local food bank. There will be drop off bins at the church on the corner of Main and Providence street. They will be available during normal working hours (8AM - 4PM) Monday - Friday, and between 1:00PM and 5PM on Saturday. The church will also take food donations during regular service times.</p>
<p>Thank you for your time, food items, and cash donations. Together, we can make a huge difference!</p>";

//Product listing page. Will be converted to database. However, the template to build the page will remain here.
$pages['products']['pageid'] = "products";
$pages['products']['title'] = "Products";
$pages['products']['keywords'] = "AB Grocery inventory, food, fruit, veggies, dairy, bakery";
$pages['products']['description'] = "AB Grocery's products for sale. They consist of fruit, dairy, veggies, and bread.";
$pages['products']['content'] = "
<h1>Products</h1>
<p>Click on the product below to see details of that product. You can then add it to your cart.</p>
<table>
<thead>
<tr>
<th>Product</th>
<th>Price</th>
</tr>
</thead>";
foreach($products as $product) {
$pages['products']['content'] .= "<tr><td><a href = \"product_details.php?productid=" . $product['productid'] . "\">" . $product['productid'] . "</a></td><td>$" . number_format($product['price'], 2) . "/" . $product['weight'] . "</td></tr>";
}
$pages['products']['content'] .= "</table>";
$pages['terms']['pageid'] = "terms";
$pages['terms']['title'] = "Terms of use";
$pages['terms']['description'] = "AB Grocery terms of service.";
$pages['terms']['keywords'] = "AB Grocery terms, terms of use, terms of service, policies, prototype";
$pages['terms']['content'] = "
<h1>Terms of use</h1>
<p>Thank you for your order. You have been testing an immitation online store. This shopping experience is for demonstration purposes only. Any products purchased will <em>not</em> take place. All items, descriptions, and prices are fictitious in nature. Any resemblance to factual products is completely coincidental. Knowing that the site is a demonstration project, you assume all risk involved with useing or testing the website. You agree that all content, design, and interests remain the property of the site owner (Andy Borka). Furthermore, site design, functionality, and other capabilities of the site may be flawed. These flaws could potentially be destructive to your browser if there are severe flaws in the website source code. If you wish to contact us, feel free to do so using the contact us link to the left.</p>            
";
?>