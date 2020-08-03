<?php
require_once("config.php");
/*
 * @author Chinoms
 * https://twitter.com/chinoms
 */

/**
 * This class handles all the mail functions for this app.
 *
 * @author Chinoms
 */
class MailerClass {
    function welcomeScholar($email, $fname) {
        $to = $email;
        $subject = "Welcome to Ukwuoma";
        $message = "
<html>
<head>
<title>Welcome to Ukwuoma</title>
</head>
<body>
<center><img src='https://www.tutorkings.com/images/static.logo.png' height='100'></center>
<br>
<div style='margin-left:20%; margin-right:20%'>
<p style='text-align: justify'>Hi, " . $fname . "</p>
<p style='text-align: justify'>We're excited you're interested in becoming a TutorKings Tutor. The prospects are great.
In no time, you'll be making money from tutoring kids on subjects you know best.</p>
<p style='text-align: justify'>We'll contact you shortly to make arrangements for your tests. Once you scale through, 
we'll train you and you'll be fully on board</p>
<p style='text-align: justify'>Once more, welcome to TutorKings.</p>
<br>
<i>The TutorKings Team</i>
</body>
</html>
";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        // More headers
        $headers .= 'From: <admin@tutorkings.com>' . "\r\n";
        mail($to, $subject, $message, $headers);
        echo "mail sent!";
    }

    public function sendContactForm($email, $fname, $lname, $userSubject, $message, $contactEmail, $body){ 
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
        <strong>Message: </strong><br>".$body;
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <mail@tceers.com>' . "\r\n";
        if(mail($email, $subject, $headers)){
            header("location: contact.php?msg='messagesent'");
        }

    }
}
$sendMail = new MailerClass();
