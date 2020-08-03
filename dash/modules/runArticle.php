<?php

require('../classes/config.php');
require_once("../classes/auth.php");
//require_once("../classes/seers.php");
require_once("../classes/fileUpload.php");

   global $articleName;
   $title = $_POST['title'];
   $author_id = $_POST['authorid'];
   $keywords = $_POST['keywords'];
   $author_name = $_POST['fname'] . " " . $_POST['lname'];
   $articleName = $_FILES['articlefile'];
   $description = $_POST['description'];
   
   if($file->articleUpload($conn, $articleName) !== "false"){
       $file_url = $output;
       $articleId = $conn->insert_id;
       $seersClass->addArticle($conn, $description, $title, $author_id, $keywords, $author_name, $file_url, $articleId);
   }
   //$seersClass->addArticle($conn, $title, $author_id, $keywords, $author_name);
?>
