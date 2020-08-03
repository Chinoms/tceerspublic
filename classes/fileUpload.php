<?php
require_once("seers.php");

class fileUpload {

    function articleUpload($conn, $articleName) {
        global $output;
        global $fileDestination;
        global $validFile;
        
        if (!$_FILES['articlefile']['error']) {
            $prefix = mt_rand(0, 9999) . date('is');
            $newfilename = $prefix . strtolower($_FILES['articlefile']['name']); //rename file
            $newfilename = str_replace(" ", "_", $newfilename);
            if ($_FILES['articlefile']['size'] > (71457280)) { //can't be larger than 1 MB
                $validFile = false;
                echo "filetoolarge";
                return false;
            }
            $mime_filter = array(
                'application/pdf'
                );
            if (!in_array($_FILES['articlefile']['type'], $mime_filter)) {
                $validFile = false;
                echo "invalidfiletype";
                return false;
            } else {
                $validFile = true;
            }
            if($validFile !==false) {
               $fileDestination = "../res/ceers/";
               move_uploaded_file($_FILES['articlefile']['tmp_name'], $fileDestination . $newfilename);
               //echo "success";
               $finalDestination = $fileDestination.$newfilename;
               $saveArticle = $conn->prepare("INSERT INTO seers(file_url) VALUES(?)");
               $saveArticle->bind_param("s", $finalDestination);
               if($saveArticle->execute()) {
                   //echo $conn->insert_id;
               }
               $output =  $fileDestination.$newfilename; 

               echo "success"; 
               return $output;
               
            } else {
                //echo "failed";
                return false;
            }
        } else {
            //echo "error";
            return false;
        }
        //return $fileDestination;
    }

    function journalUpload($conn, $articleName) {
        global $output;
        global $fileDestination;
        global $validFile;
        
        if (!$_FILES['journalfile']['error']) {
            $prefix = mt_rand(0, 9999) . date('is');
            $newfilename = $prefix . strtolower($_FILES['journalfile']['name']); //rename file
            $newfilename = str_replace(" ", "_", $newfilename);
            if ($_FILES['journalfile']['size'] > (71457280)) { //can't be larger than 1 MB
                $validFile = false;
                echo "filetoolarge";
                return false;
            }
            $mime_filter = array(
                'application/pdf'
                );
            if (!in_array($_FILES['journalfile']['type'], $mime_filter)) {
                $validFile = false;
                echo "invalidfiletype";
                return false;
            } else {
                $validFile = true;
            }
            if($validFile !==false) {
               $fileDestination = "../res/journals/";
               move_uploaded_file($_FILES['journalfile']['tmp_name'], $fileDestination . $newfilename);
               //echo "success";
               $finalDestination = $fileDestination.$newfilename;
               $saveArticle = $conn->prepare("INSERT INTO journal_items(file_url) VALUES(?)");
               $saveArticle->bind_param("s", $finalDestination);
               if($saveArticle->execute()) {
                   //echo $conn->insert_id;
               }
               $output =  $fileDestination.$newfilename; 

               echo "success"; 
               return $output;
               
            } else {
                //echo "failed";
                return false;
            }
        } else {
            //echo "error";
            return false;
        }
        //return $fileDestination;
    }


    function journalUpdate($conn, $articleName, $description, $id) {
        global $output;
        global $fileDestination;
        global $validFile;
        
        if (!$_FILES['journalfile']['error']) {
            $prefix = mt_rand(0, 9999) . date('is');
            $newfilename = $prefix . strtolower($_FILES['journalfile']['name']); //rename file
            $newfilename = str_replace(" ", "_", $newfilename);
            if ($_FILES['journalfile']['size'] > (71457280)) { //can't be larger than 1 MB
                $validFile = false;
                echo "filetoolarge";
                return false;
            }
            $mime_filter = array(
                'application/pdf'
                );
            if (!in_array($_FILES['journalfile']['type'], $mime_filter)) {
                $validFile = false;
                echo "invalidfiletype";
                return false;
            } else {
                $validFile = true;
            }
            if($validFile !==false) {
               $fileDestination = "../res/journals/";
               move_uploaded_file($_FILES['journalfile']['tmp_name'], $fileDestination . $newfilename);
               //echo "success";
               $finalDestination = $fileDestination.$newfilename;
               $saveArticle = $conn->prepare("UPDATE journal_items SET file_url = ? WHERE id = ?");
               $saveArticle->bind_param("si", $finalDestination, $id);
               if($saveArticle->execute()) {
                   //echo $conn->insert_id;
               }
               $output =  $fileDestination.$newfilename; 

               //echo "success"; 
               return "success";
               
            } else {
                //echo "failed";
                return false;
            }
        } else {
            //echo "error";
            return false;
        }
        //return $fileDestination;
    }

    function articleUpdate($conn, $articleName, $description, $id) {
        global $output;
        global $fileDestination;
        global $validFile;
        
        if (!$_FILES['articlefile']['error']) {
            $prefix = mt_rand(0, 9999) . date('is');
            $newfilename = $prefix . strtolower($_FILES['articlefile']['name']); //rename file
            $newfilename = str_replace(" ", "_", $newfilename);
            if ($_FILES['articlefile']['size'] > (71457280)) { //can't be larger than 1 MB
                $validFile = false;
                echo "filetoolarge";
                return false;
            }
            $mime_filter = array(
                'application/pdf'
                );
            if (!in_array($_FILES['articlefile']['type'], $mime_filter)) {
                $validFile = false;
                echo "invalidfiletype";
                return false;
            } else {
                $validFile = true;
            }
            if($validFile !==false) {
               $fileDestination = "../res/ceers/";
               move_uploaded_file($_FILES['articlefile']['tmp_name'], $fileDestination . $newfilename);
               //echo "success";
               $finalDestination = $fileDestination.$newfilename;
               $saveArticle = $conn->prepare("UPDATE seers SET file_url = ? WHERE id = ?");
               $saveArticle->bind_param("si", $finalDestination, $id);
               if($saveArticle->execute()) {
                   //echo $conn->insert_id;
               }
               $output =  $fileDestination.$newfilename; 

              // echo "success"; 
               return "success";
               
            } else {
                //echo "failed";
                return false;
            }
        } else {
            //echo "error";
            return false;
        }
        //return $fileDestination;
    }


    

}

$file = new FileUpload;
