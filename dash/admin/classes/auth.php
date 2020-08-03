<?php

//require_once("config.php");

class Auth{

    public function login($conn, $email, $password) {
        $checkUser = $conn->query("SELECT * FROM admins WHERE email = '$email' AND pword = '$password'");
        if($conn->affected_rows == 1) {
            $userData = $checkUser->fetch_assoc();
            session_start();
            $_SESSION['userid'] = $userData['id'];
            echo $_SESSION['id'];
        } else {
            echo "loginerror";
        }
    }

    public function addAdmin() {
       // $addAdmin = 
    }
}
?>