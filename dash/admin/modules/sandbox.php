<?php
require_once("../classes/config.php");
require_once("../classes/auth.php");


$checkUsers = new Auth();

$email = $_REQUEST['email'];
$fname = $_REQUEST['fname'];
$lname = $_REQUEST['lname'];
$pass1 = $_REQUEST['pass1'];
$pass2 = $_REQUEST['pass2'];

$checkUsers->signup($conn, $fname, $lname, $email, $pass1, $pass2);

//$email = $_REQUEST['email'];
//$password = hash("sha256", $_REQUEST['pass']);
//$checkUsers->login($conn, $email, $password);

?>