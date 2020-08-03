<?php
require_once("../classes/config.php");
require_once("../classes/auth.php");

$email = $_REQUEST['email'];
$fname = $_REQUEST['fname'];
$lname = $_REQUEST['lname'];
$pass1 = $_REQUEST['pass1'];
$pass2 = $_REQUEST['pass2'];

$checkUsers->signup($conn, $fname, $lname, $email, $pass1, $pass2);


?>