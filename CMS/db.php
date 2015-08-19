<?php

/**
 * DB short summary.
 * Database class used for the CMS project.
 * 
 * DB description.
 * Has insert, update, and delete methods for the CMS project.
 * It also has a private connect method for connecting to the database.
 * 
 * @version 1.0
 * @author Andy
 */
class DB
{
    
    //Constants for the connection string.
    private $host = "box912.bluehost.com";
    private $dbuser = "ajborkac_abgroce";
    private $dbpassword = "cmsproject";
    private $database = "ajborkac_abgrocery";

//Used to connect to the database.
    private function connect() {
        $mysqli = new mysqli($this->host, $this->dbuser, $this->dbpassword, $this->database);
        if($mysqli->connect_error) {
            throw new Exception("Failed to obtain a link to the database.");
        } //End error checking.
    else {
        return $mysqli;
        } //End normal return.
    } //End connect method.
        //Get a page from the database.
    public function GetPage($pageid) {
        //Connect to the database. If connected, return the resultset.
        //Otherwise, throw an exception.
        $link = $this->connect();          
        
        if($results = $link->query("select * from pages where pageid = '" . $pageid . "';")) {
            return $results;
        } else {
            throw new Exception($link->error);
        }
    } //End getPage method.

    //Add a page to the database.
    public function addPage($pageid, $title, $keywords, $description, $content, $weight) {
            $content = $this->connect()->real_escape_string($content);        
            $link = $this->connect();
                        if($result = $link->query("insert into pages (pageid, title, keywords, description, content, weight) values('" . $pageid . "','" . $title . "','" . $keywords . "','" . $description . "','" . $content . "'," . $weight . ");")) {
                            return $link->affected_rows;
    }    else {
        throw new Exception($link->error);
    }
    } //End addPage method.

    public function updatePage($ID, $pageid, $title, $keywords, $description, $content, $weight) {
        $content = $this->connect()->real_escape_string($content);        
        $link = $this->connect();
        if($result = $link->query("update pages set pageid = '" . $pageid . "', title = '" . $title . "', keywords = '" . $keywords . "', description = '". $description . "', content = '" . $content . "', weight = " . $weight . " where id = " . $ID . ";")) {
            return $link->affected_rows;
        }    else {
            throw new Exception($link->error);
        }
    } //End updatePage method.

   
    //Remove a page from the database.
    public function removePage($pageid) {
        $link = $this->connect();
            if($link->query("delete from pages where pageid = '" . $pageid . "';")) {
                return $link->affected_rows;
            } else {
                throw new Exception($link->error);
            }
    } //End removePage method.

//Get the sidebar links.
public function getSidebar() {
if($result = $this->connect()->query("select pageid, title, weight from pages order by weight;")) {
return $result;
} else {
    throw new Exception();
}
} //End getSidebar method.

public function getProducts() {
    if($results = $this->connect()->query("select * from products order by productid;")) {
    return $results;
} else {
    throw new Exception();
}
} //End getProducts method.

//Get a product based on the productid.
public function getProduct($productid) {
    if($result = $this->connect()->query("select * from products where productid = '" . $productid . "';")) {
    return $result;
} else {
    throw new Exception();
}
} //End getProduct method.

//Remove a product from the database.
public function removeProduct($ID) {
    $link = $this->connect();
    if($link->query("delete from products where id = " . $ID . ";")) {
        return $link->affected_rows;
    } else {
        throw new Exception($link->error);
    }
        
} //End removeProduct method.

//Add a product to the database.
public function addProduct($productid, $keywords, $description, $weight, $weight_unit, $image, $price) {
    $link = $this->connect();
    $sql = "insert into products (productid, keywords, description, weight, weight_unit, image, price) values('" . $productid . "', '" . $keywords . "', '" . $description . "', " . $weight . ", '" . $weight_unit . "', '" . $image . "', " . $price . ");";
    if($link->query($sql)) {
        return $link->affected_rows;
    } else {
        throw new Exception($link->error);
    }
    }//End addProduct method.

//Update the product.
public function updateProduct($ID, $productid, $keywords, $description, $weight, $weight_unit, $price) {
    $link = $this->connect();
    $sql = "update products set productid = '" . $productid . "', keywords='" . $keywords . "', description='" . $description . "', weight=" . $weight . ", weight_unit='" . $weight_unit . "', price=" . $price . " where id=" . $ID . ";";
    if($link->query($sql)) {
        return $link->affected_rows;
    } else {
        throw new Exception($link->error);
    }
}//End updateProduct method.

//Add an item to the shopping cart.
public function addItemToCart($ID, $quantity) {
    if($result = $this->connect()->query("insert into cart (product_id, quantity) values(" . $ID . ", " . $quantity . ");")) {
if(mysqli_affected_rows($result) > 0) {
    return true;
}
else {
    return false;
}
} else {
    throw new Exception();
}
} //End addItemToCart method.

//Get everything from the cart.
public function getItemsFromCart() {
    if($results = $this->connect()->query("select p.*, c.quantity from products p inner join cart c on p.id = c.product_id;")) {
while($row = mysqli_fetch_array($results)) {
    $items[$row['productid']] = $row;
}
return $items;
} else {
    throw new Exception();
}
} //End getItemsFromCart method.

//Empty the cart.
public function emptyCart() {
if($result =    $this->connect()->query("truncate cart;")) {
if(!$result) {
    return true;
} else {
    return false;
}
} else {
    throw new Exception();
}
} //End emptyCart method.

public function removeItemFromCart($ID) {
    if($result = $this->connect()->query("delete from cart where product_id = " . $ID . ";")) {
    return mysqli_affected_rows($result);
} else {
    throw new Exception();
}
} //End removeItemFromCart method.

//Update items in the cart.
public function updateItemInCart($ID, $quantity) {
    if($this->connect()->query("update cart set quantity = " . $quantity . " where product_id = " . $ID . ";")) {
    return mysqli_affected_rows($result);
    } else {
        throw new Exception();
}
} //End updateItemInCart method.

//Count the items in the cart.
public function CountCartItems() {
            if($result = $this->connect()->query("select count(*) from cart;")) {
        while($row = mysqli_fetch_array($result)) {
            $count = $row[0];
        }
        return $count;
    } else {
        throw new Exception();
            }
} //End CountCartItems method.

//Authenticate the user.
public function authenticateUser($email, $password) {

    if($result = $this->connect()->query("select * from users where email = '" . $email . "';")) {
    while($row = mysqli_fetch_array($result)) {
        $user = $row;
    }
if($user['password'] == $password) {
return $user;
}
else {
    return null;
}
} else {
    throw new Exception();
}
} //End authenticate user method.

//Checks to see if a user exists by checking against a username (email address).
public function userExists($email) {
    if($result = $this->connect()->query("select email from users where email = '" . $email . "';")) {
if(!$result) {
    return false;
} else {
    return true;
}
} else {
    throw new Exception();
}
} //End userExists method.

} //End DB class.
?>