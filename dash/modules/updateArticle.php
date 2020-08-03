<?php
require_once("../classes/config.php");
require_once("../classes/fileUpload.php");
require_once("../classes/seers.php");


if (isset($_REQUEST['editJournal'])) {
    $itemName = $_REQUEST['itemname'];
    $description = $_REQUEST['itemdescription'];
    $id = $_REQUEST['articleid'];
    $deletepermission = $_REQUEST['delete'];
    $oldFile = $_REQUEST['articlefile'];
    $approved = 1;
    $approvedDate = date("d-m-Y H:i");

    /**variable names for method updateArticle() */
    //$itemName = $articleName;
    $keywords = $_REQUEST['keywords'];
    $articleid = $id;
    if ($file->articleUpdate($conn, $itemName, $description, $id) === "success") {
        $seersClass->updateArticle($conn, $itemName, $keywords, $description, $approved, $articleid, $approvedDate);
        if ($deletepermission === "youcandelete") {
            unlink($oldFile);
            ?>
            <script>
                alert("Update completed.\n Redirecting you to the dashboard.");
                window.location.replace("../pendingArticles.php");
            </script>
        <?php
        } else {
            ?>
            <script>
                alert("Update completed.\n Redirecting you to the dashboard.");
                window.location.replace("../pendingArticles.php");
            </script>
        <?php
        }
    }
}

?>