<?php
require_once("fileUpload.php");
require_once("auth.php");
/**
 *This class handles all functionality relating to the journals
 **/
class journals extends fileUpload
{
    public function addJournal($conn, $itemName, $itemAuthor, $itemAuthorId, $parentJournal, $keywords, $description, $journalid)
    {
        $saveJournal = $conn->prepare("UPDATE journal_items SET item_name = ?, item_author = ?, item_author_id = ?, parent_journal = ?, keywords = ?, item_desc = ? WHERE id = ?");
        $saveJournal->bind_param("sssissi", $itemName, $itemAuthor, $itemAuthorId, $parentJournal, $keywords, $description, $journalid);
        if ($saveJournal->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function createJournal()
    {
        /*
       * This method is an admin function. It creates new nournals in the ```journals``` table
       */
        $newJournal = $conn->prepare("INSERT INTO journals(journal_name, journal_descr) VALUES(?, ?)");
        $newJournal->bind_param("ss", $journalName, $jounalDescription);
        if ($newJournal->exeute()) {
            return true;
        } else {
            return false;
        }
    }

    public function approveJournal()
    {
        $approveJournal = $conn->prepare("UPDATE journal_items SET approval_status = ?");
        $approveJournal->bind_param("i", 1);
        if ($approveJournal->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function fetchApprovedJournals($conn, $userId, $checkUsers)
    {
        global $pendingJournals;
        if ($checkUsers->userData($conn)['priv'] == "superadmin") {
            $returnJournals = $conn->query("SELECT * FROM journal_items WHERE approval_status = 1");
        } else {
            $returnJournals = $conn->query("SELECT * FROM journal_items WHERE item_author_id = '$userId' AND approval_status = 1");
        }
        $serialNumber = 0;
        $approvedJournals = $returnJournals->fetch_assoc();
        if (empty($approvedJournals)) {
            echo "<h3>Uhm . . . You don't seem to have any of your journals approved yet. 🙂";
        }

        while ($approvedJournals = $returnJournals->fetch_assoc()) {
            $serialNumber++;
            echo " <tr>
        <td>" . $serialNumber . "</td>
        <td>" . $approvedJournals['item_name'] . "</td>
        <td>" . $approvedJournals['item_date'] . "</td>
        <td><span class='label label-warning'>Pending</span></td>
        <td>" . substr($approvedJournals['item_desc'], 0, 30) . " . . .</td>
        <td><a href = 'viewJournal.php?journalid=" . $approvedJournals['id'] . "'><button class='btn btn-primary'>View <i class='fa fa-eye'></i></button></a> &nbsp; <a href='#!' readonly='readonly'><button class='btn btn-danger'>Delete <i class='fa fa-trash'></i></button></a></td>
      </tr>";
        }
    }


    public function fetchPendingJournals($conn, $userId, $checkUsers)
    {
        global $pendingJournals;
        if ($checkUsers->userData($conn)['priv'] == "superadmin") {
            $returnJournals = $conn->query("SELECT * FROM journal_items WHERE approval_status = 0");
        } else {
            $returnJournals = $conn->query("SELECT * FROM journal_items WHERE item_author_id = '$userId' AND approval_status = 0");
        }
        $serialNumber = 0;
        if (!mysqli_num_rows($returnJournals)) {
            echo "<h3>Uhm . . . None of your journals is pending. Or haven't you written any yet? 🙂.";
        }
        while ($pendingJournals = $returnJournals->fetch_assoc()) {
            $serialNumber++;
            echo " <tr>
            <td>" . $serialNumber . "</td>
            <td>" . $pendingJournals['item_name'] . "</td>
            <td>" . $pendingJournals['item_author'] . "</td>
            <td>" . $pendingJournals['item_date'] . "</td>
            <td><span class='label label-warning'>Pending</span></td>
            <td style='width:auto'><a href = 'viewJournal.php?journalid=" . $pendingJournals['id'] . "'><button class='btn btn-primary'>View <i class='fa fa-eye'></i>
            <!--/button></a> &nbsp; <a href='#'><button class='btn btn-danger'>Delete <i class='fa fa-trash'></i></button></a></td-->
            </tr>";
        }

        //return $pendingJournals;
    }

    function deleteJournalItem($conn, $journalid)
    {
        $checkJournalStatus = $conn->query("SELECT * FROM journal_items WHERE id = '$journalid'");
    }
    /** 

    function editJournal($conn, $journal_id)
    {
        $this->f
    }
     **/


    public function updateJournal($conn, $itemName, $keywords, $description, $approved, $journalid, $approvedDate)
    {
        $saveJournal = $conn->prepare("UPDATE journal_items SET item_name = ?, keywords = ?, item_desc = ?, approval_status = ?, approval_date = ? WHERE id = ?");
        $saveJournal->bind_param("sssiss", $itemName, $keywords, $description, $approved, $approvedDate, $journalid);
        if ($saveJournal->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

$journalMethods = new journals();
