<?php
//Include page title and meta.
$page_title = "login";
$meta_description = "AB Grocery's login form.";
$meta_keywords = "AB Grocery account, login, checkout";

include_once 'header.php';

include_once 'header.php';

//Attempt to log the user in.
if($_POST['login']) {
            if($user = $db->authenticateUser($_POST['username'], crypt($_POST['password'], $_POST['username']))) {
                $_SESSION['user'] = $user;
        $_SESSION['user']['authenticated'] = true;
        header('location: ' . $_SESSION['destination']);
    } //End signing the user in.
    else if(!isset($_SESSION['user']['authenticated'])) {
        $_SESSION['user']['authenticated'] = "first_attempt";
    } //End First attempt to login.
else {
    $_SESSION['user']['authenticated'] = "failed_attempt";
    } //End login failed.
} // End attempting to sign the user in.
?>

<div id = "wrapper">
<div id = "navigation"><?php  include_once '../navigation.php'; ?></div>
<div id = "sidebar"><?php  include_once 'sidebar.php'; ?></div>
<div id = "content">
    <h1>Login</h1>
        
        <?php
                           if($_SESSION['user']['authenticated'] == "failed_attempt") {
                           print "<p>Please enter a valid username and password combination.</p>";
                           }?>
        <form method = "post" action = "<?php print $_SERVER['php_self']?>">
                                      <table>
            <thead>
                <tr>
                    <th>
                        Username
                    </th>
                <th>
                    Password
                </th>
                </tr>
            </thead>
        <tbody>
            <tr>
                <td>
                    <input id = "username" name="username" type ="text"  />
                </td>
            <td>
                <input id ="password" name ="password" type ="password" />
            </td>
            </tr>
        <tr>
            <td>
                <input id ="login" name ="login" type ="submit" value ="login" />
            </td>
        <td>
            <input id="reset" name="reset" type="reset" value="clear form" />
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