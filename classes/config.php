<?php

$localhost = array("127.0.0.1", "::1");
if (in_array($_SERVER['REMOTE_ADDR'], $localhost)) {
   $host = "localhost";
   $username = "root";
   $passwd = "";
   $dbname = "ukwuoma";
   $port = 8080;
   global $baseURL;
   $baseURL = "http://localhost/ceers";
   $contactEmail = "enquiries@tceers.com";
} else {
   $host = "localhost";
   $username = "britnnik_dbadmin";
   $passwd = "ificouldtellyou..";
   $dbname = "britnnik_ukwuoma";
   $port = 8080;
   global $baseURL;
   $baseURL = "http://app.tceers.com/";
   $contactEmail = "enquiries@tceers.com";
}





$conn = new mysqli($host, $username, $passwd, $dbname);
//$conn->select_db($dbname);
// Check connection
if ($conn->connect_error) {
    die("<h3>Connection failed: " . $conn->connect_error . "</h3>");
} else {
    //echo "¿Qué estás buscando aquí?🤣";
    echo $conn->error;
}

?>