<?php
require_once("../classes/config.php");
require_once("../classes/auth.php");

$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
$checkUsers->login($conn, $email, $password);


?>