<?php
require_once("../classes/mailerClass.php");
require_once("../classes/config.php");
$fname = $_REQUEST['fname'];
$lname = $_REQUEST['lname'];
//$contactEmail = $_REQUEST['email'];
$userSubject = $_REQUEST['subject'];
$body = $_REQUEST['body'];
//var_dump($_REQUEST);
//die();
$email = $contactEmail;
$subject = $userSubject;
$message = "<html>
<head>
<title>".$subject."</title>
</head>
<body>
<center><img src='https://tceers.com/imgs/tceerslogo.png' height='100'></center>
<br>
<strong>Name: </strong>".$fname." ".$lname."<br>
<strong>Email: </email>".$body."<br>
<strong>Message: </strong><br>".$body;
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: <mail@tceers.com>' . "\r\n";
if(mail($contactEmail, $subject, $message, $headers)){
    header("location: ../contact.php?msg=messagesent");
}