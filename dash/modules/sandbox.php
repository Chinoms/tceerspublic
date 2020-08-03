<?php
require_once("../classes/config.php");
require_once("../classes/auth.php");
require_once("../classes/seers.php");
require_once("../classes/fileUpload.php");
require_once("..classes")


#echo $checkUsers->userData($conn)['email'];
//session_start();
//session_destroy();
/***


$to = ""; 
$subject =""; 
$message = ""; 
$headers = "";


$email = $_REQUEST['email'];
$fname = $_REQUEST['fname'];
$lname = $_REQUEST['lname'];
$pass1 = $_REQUEST['pass1'];
$pass2 = $_REQUEST['pass2'];

$checkUsers->signup($conn, $fname, $lname, $email, $pass1, $pass2);

/*** 
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
$checkUsers->login($conn, $email, $password);
/***
$hash = password_hash('rasmuslerdorf', PASSWORD_DEFAULT);
echo "<br>";
echo $hash;
echo "<br>";


if (password_verify('rasmuslerdorf', $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}


*
$title = $_REQUEST['title'];
$author_id = $_REQUEST['author_id'];
$keywords = $_REQUEST['keywords'];
$description = $conn->real_escape_string($_REQUEST['description']);
$file_url = $conn->real_escape_string($_REQUEST['file_url']);
$author_name = $_REQUEST['author_name'];
$seersClass->addArticle($conn, $title, $author_id, $keywords, $description, $file_url, $author_name);

$id = $_REQUEST['id'];
$status = $_REQUEST['status'];
$approvedTime = date("Y-m-d H:i:s");
$seersClass->approveArticle($conn, $status, $id, $approvedTime);
**/
//echo $_SERVER['QUERY_STRING'];


?>