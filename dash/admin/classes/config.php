<?php

$host = "localhost";
$username = "root";
$passwd = "";
$dbname = "ukwuoma";
$port = 8080;
global $baseURL;
$baseURL = "http://ukwuoma/";

#Cloudinary environment variables
$cloudname = "";
$apiKey = "";
$apiSecret = "";



$conn = new mysqli($host, $username, $passwd);
$conn->select_db($dbname);
// Check connection
if ($conn->connect_error) {
    die("<b>Connection failed: " . $conn->connect_error . "</b>");
}

?>