<?php

//require_once("config.php");
require_once("mailerClass.php");

class Auth Extends MailerClass{
     function signup($conn, $fname, $lname, $email, $pass1, $pass2){
         //Run a query to check for the email address
        $checkEmail = $conn->query("SELECT * FROM scholars WHERE email = '$email'");
        //Check if the email address exixts on the database
        //If it exists, throw a message and end the function
        if($conn->affected_rows > 0 ) {
            echo "emailexists";
            die();
        } else {
            //proceed with signup
            //First, check if passwords are identical
            if($pass1 !== $pass2){
                //..if they're identical print a message and end the function
                echo "passwordmismatch";
                die();
            } else {
                $password = password_hash($pass1, PASSWORD_DEFAULT);
                $createAccount = $conn->prepare("INSERT INTO scholars (fname, lname, email, pword) VALUES (?, ?, ?, ?)");
                $createAccount->bind_param("ssss", $fname, $lname, $email, $password);
                if($createAccount->execute()) {
                   // $this->welcomeScholar($fname, $email);
                    echo "success";
                } else {
                    echo $conn->error;
                }
            }
            
        }
        
    }

    function login($conn, $email, $password) {
        $checkUser = $conn->query("SELECT * FROM scholars WHERE email = '$email'");
        if($conn->affected_rows == 1) {
            $userData = $checkUser->fetch_assoc();
            if(password_verify($password, $userData['pword'])){
                echo "success";
                session_start();
                $_SESSION['userid'] = $userData['id'];
            } else {
                echo "failed";
            }
        } else {
            echo "failed";
        }
    }

    function isLoggedIn() {
        session_start();
        if(!isset($_SESSION['userid'])) {
            header("location:logout.php");
        } 
    }
    public function userData($conn) {
        $session = $_SESSION['userid'];
        $userInfo = $conn->query("SELECT * FROM scholars WHERE id = '$session'");
        if($conn->affected_rows == 1) {
            $userProfile = $userInfo->fetch_assoc();
            return $userProfile;
        }
    }

    public function greet($name){
        print "Hello world!".$name;
    }

    public function forgotPassowrd($conn) {

    }

    public function logout() {
        session_start();
        session_destroy();
        header("location:logout.php");
    }

    public function showURLpriv($conn, $text){
        /*  
        *@param $text string = url to show in the menu


        */
        if($this->userData($conn)['priv'] == "superadmin"){
            echo $text;
        }
    }

    public function checkPriv($conn, $priv){
        /*
        *Fetch user's privilege.
        */
       $priv = $this->userData($conn)['priv'];
            return $priv;
        
    }
}

$checkUsers = new Auth();
?>