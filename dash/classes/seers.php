<?php
require_once("fileUpload.php");
require_once("auth.php");

class seers Extends fileUpload{
    public function addArticle($conn, $description, $title, $author_id, $keywords, $author_name, $file_url, $articleId) {
       $saveArticle = $conn->prepare("UPDATE seers SET title = ?, author_id = ?, keywords = ?, descr = ?, file_url = ?, author_name = ? WHERE id = '$articleId'");
       $saveArticle->bind_param("sissss", $title, $author_id, $keywords, $description, $file_url, $author_name);
       if($saveArticle->execute()) {
           return true;
       } else {
        return false;
    }
}

    public function approveArticle($conn, $status, $id, $approvedTime) {
        $updateMaterial = $conn->query("UPDATE seers SET approved_status = '$status', date_approved = '$approvedTime' WHERE id = '$id'");
        $approveMaterial = $conn->prepare("UPDATE seers SET approved_status = ?, date_approved = ? WHERE id = ?");
        $approveMaterial->bind_param("isi", $status, $id, $approvedTime);
        if($approveMaterial == TRUE) {
            echo "updated";

        } else {
            echo "failed";
        }
    }


    public function fetchPendingArticles($conn, $userId, $checkUsers) {
        global $pendingArticles;
        if ($checkUsers->userData($conn)['priv'] == "superadmin") {
            $returnArticles = $conn->query("SELECT * FROM seers WHERE approved_status = 0");
        } else {
        $returnArticles = $conn->query("SELECT * FROM seers WHERE author_id = '$userId' AND approved_status = 0");
        }
        $serialNumber = 0;
        if(!mysqli_num_rows($returnArticles)) {
            echo "<h3>Uhm . . . None of your articles is pending. Or haven't you written any yet? 🙂.";
        }
        while($pendingArticles = $returnArticles->fetch_array()){
            $serialNumber++;
            echo 
            "<tr>
            <td>".$serialNumber."</td>
            <td>".$pendingArticles['title']."</td>
            <td>".$pendingArticles['date_added']."</td>
            <td><span class='label label-warning'>Pending</span></td>
            
            <td><a href = 'viewArticle.php?articleid=".$pendingArticles['id']."'><button class='btn btn-primary'>View <i class='fa fa-eye'></i></button></a> &nbsp; <a href='#'><button class='btn btn-danger'>Delete <i class='fa fa-trash'></i></button></a></td>
          </tr>";
        }
        
        //return $pendingArticles;
    }



    public function fetchApprovedArticles($conn, $userId) {
        global $pendingArticles;
        $returnArticles = $conn->query("SELECT * FROM seers WHERE author_id = '$userId' AND approved_status = 1");
        
        $serialNumber = 0;
        if(! mysqli_num_rows($returnArticles)) {
            echo "<h3>Uhm . . . You don't seem to have any of your articles approved yet. 🙂";
        }
    
        while($approvedArticles = $returnArticles->fetch_assoc()){
            $serialNumber++;
            echo " <tr>
            <td>".$serialNumber."</td>
            <td>".$approvedArticles['title']."</td>
            <td>".$approvedArticles['date_added']."</td>
            <td><span class='label label-warning'>Pending</span></td>
            <td><a href = 'viewArticle.php?articleid=".$approvedArticles['id']."'><button class='btn btn-primary'>View <i class='fa fa-eye'></i></button></a> &nbsp; <a href='#!'><button class='btn btn-danger' disabled>Delete <i class='fa fa-trash'></i></button></a></td>
          </tr>";
        }
        
    }


    public function updateArticle($conn, $itemName, $keywords, $description, $approved, $articleid, $approvedDate)
    {
        $saveJournal = $conn->prepare("UPDATE seers SET title = ?, keywords = ?, descr = ?, approved_status = ?, date_approved = ? WHERE id = ?");
        echo $conn->error;
        $saveJournal->bind_param("sssisi", $itemName, $keywords, $description, $approved, $approvedDate, $articleid) or die($conn->error);
        if ($saveJournal->execute()) {
            return true;
        } else {
            die($conn->error);
            return false;
        } 
    }
}

$seersClass = new seers();
