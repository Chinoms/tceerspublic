<?php
//unlink("res/journals/77284414chinomnso_ugwuanya_-_cv_-_copy_2.pdf");

$articleName = $_REQUEST['itemname'];
$description = $_REQUEST['itemdescription'];
$id = $_REQUEST['journalid'];
$deletepermission = $_REQUEST['delete'];
$oldFile = $_REQUEST['journalfile'];

/**variable names for methodupdateJournal() */
$itemName = $articleName;
$keywords = $_REQUEST['keywords'];
$journalid = $id;

updateJournal($conn, $itemName, $keywords, $description, $journalid)
?>