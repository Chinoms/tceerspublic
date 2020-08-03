<?php
require_once("../classes/config.php");
require_once("../classes/fileUpload.php");
require_once("../classes/journals.php");


if (isset($_REQUEST['editJournal'])) {
    $articleName = $_REQUEST['itemname'];
    $description = $_REQUEST['itemdescription'];
    $id = $_REQUEST['journalid'];
    $deletepermission = $_REQUEST['delete'];
    $oldFile = $_REQUEST['journalfile'];
    $approved = 1;
    $approvedDate = date("d-m-Y H:i");

    /**variable names for method updateJournal() */
    $itemName = $articleName;
    $keywords = $_REQUEST['keywords'];
    $journalid = $id;
    if ($file->journalUpdate($conn, $articleName, $description, $id) === "success") {
        $journalMethods->updateJournal($conn, $itemName, $keywords, $description, $approved, $journalid, $approvedDate);
        if ($deletepermission === "youcandelete") {
            unlink($oldFile);
            ?>
            <script>
                alert("Update completed.\n Redirecting you to the dashboard.");
                window.location.replace("../pendingJournals.php");
            </script>
        <?php
        }
    }
}

?>