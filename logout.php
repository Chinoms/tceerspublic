<?php
require_once("classes/auth.php");
$checkUsers->logout();
header("location:login.php");

?>