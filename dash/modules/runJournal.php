<?php

require('../classes/config.php');
require_once("../classes/auth.php");
//require_once("../classes/seers.php");
require_once("../classes/journals.php");

   global $journalName;
   $itemName = $_POST['title'];
   $itemAuthorId = $_POST['authorid'];
   $keywords = $_POST['keywords'];
   $itemAuthor = $_POST['fname'] . " " . $_POST['lname'];
   $journalName = $_FILES['journalfile'];
   $description = $_POST['description'];
   $parentJournal = $_POST['parentjournal'];
   
   if($file->journalUpload($conn, $journalName) !== "false"){
       $file_url = $output;
       $journalid = $conn->insert_id;
       $journalMethods->addJournal($conn, $itemName, $itemAuthor, $itemAuthorId, $parentJournal, $keywords, $description, $journalid);
   }
   //$seersClass->addArticle($conn, $title, $author_id, $keywords, $author_name);
?>
