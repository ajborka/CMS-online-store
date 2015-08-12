<?php

/**
 * DB short summary.
 * Database class used for family tree.
 * 
 * DB description.
 * Has insert, update, and delete methods for comments in the family tree.
 * It also has a private connect method for connecting to the database.
 * 
 * @version 1.0
 * @author Andy
 */
class DB
{
    
    //Constants for the connection string.
    private $host = "localhost";
    private $dbuser = "ajborkac_ft";
    private $dbpassword = "familytree";
    private $database = "ajborkac_familytree";

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

    //Get the comments from the database.
    public function GetComments() {
        //Connect to the database. If connected, return the resultset.
        //Otherwise, throw an exception.
        try {
            $results = $this->connect()->query("select * from comments order by date desc;");
            return $results;
        } //End try
        catch(Exception $e) {
            throw $e;
        } //End catch.
    } //End getComments method.
public function deleteComment($comment_id) {
try {
    if(is_numeric($comment_id)){
        $result = $this->connect()->query("delete from comments where ID =" . $comment_id . ";");
        return mysqli_affected_rows($result);
    }
    else {
        throw new Exception("Invalid comment id");
    }
    }
catch(Exception $e) {
    throw $e;
}
} //End deleteComment method.
    
public function insertComment($name, $title, $comment) {

    //Validate the input $name, $title, and $comment.
    if(isset($title) && isset($name) && isset($comment)) {
        $tmpTitle = strip_tags(trim($title));
        $tmpName = strip_tags(trim($name));
        $tmpComment = strip_tags(trim($comment));

    try {
    $results = $this->connect()->query("insert into comments (name, title, comment, date) values('" . $tmpName . "','" . $tmpTitle . "','" . $tmpComment . "','" . date("Y-d-m G:i:A") . "');");
    return $results;
    } //End try
    catch(Exception $e) {
        throw $e;
    }
    } //End insert comment.
else {
    throw new Exception("Invalid information. Make sure all fields have been correctly entered.");
    } //End throwing exception on failed insert.
} //End insertComment method.

public function updateComment($name, $title, $comment, $id) {

    //Validate the input $name, $title, $id, and $comment.
    if(isset($title) && isset($name) && isset($comment) && isset($id)) {
        $tmpID = strip_tags(trim($id));
        $tmpTitle = strip_tags(trim($title));
        $tmpName = strip_tags(trim($name));
        $tmpComment = strip_tags(trim($comment));

    try {
    $results = $this->connect()->query("update comments set name = '" . $tmpName . "', title = '" . $tmpTitle . "', comment = '" . $tmpComment . "', date = '" . date("Y-d-m G:i:A") . "' where ID = " . $tmpID . ";");
    return $results;
    } //End try
    catch(Exception $e) {
        throw $e;
    }
    } //End update comment.
} //End updateComment method.

public function getComment($ID) {
    if(isset($ID)) {
        $tmpID = strip_tags(trim($ID));
        try {
            $results = $this->connect()->query("select name, title, comment from comments where ID =" . $tmpID . ";");
            return $results;    
        }
        catch(Exception $e) {
            throw $e;
        }
    }         //End get comment.
} //End getComment method.
} //End DB class.
?>