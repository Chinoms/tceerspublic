<?php
require_once("inc/header.php");
require_once("inc/sidebar.php");
require_once("classes/seers.php");

?>



<?php
//$baseURL = "http://localhost/ukwuoma";
if (isset($_REQUEST['articleid'])) {
  $journalID = $_REQUEST['articleid'];
  //check to see if this person owns what he's trying to view
  $getArticle = $conn->query("SELECT * FROM seers WHERE id = '$journalID'");
  $articleData = $getArticle->fetch_assoc();
  //prepare some variables
  $item_id = $articleData['id'];
  $author_id = $articleData['author_id'];
  $userid = $userInfo['id'];

  //var_dump($articleData);
  //Check payment status
  $checkPay = $conn->query("SELECT * FROM paiditems WHERE payer_id = '$userid' AND item_id = '$item_id'");
  $payInfo = $checkPay->fetch_assoc();

  //var_dump($payInfo);
  if ($articleData['author_id'] === $userInfo['id'] || $checkUsers->userData($conn)['priv'] == "superadmin") {
    //die($articleData['item_author_id'] ."<br>".$userInfo['id']);
    echo '<div class="content-wrapper">
                        <!-- Content Header (Page header) -->
                        <section class="content-header">
                                
                        
                        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit journal</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="modules/updateArticle.php" method="POST" enctype="multipart/form-data">
              <div class="box-body">
                
                <br>
                <br>
                <div class="form-group">
                  <label">Journal title</label>
                  <input type="text" class="form-control" value="' . $articleData['title'] . '" name="itemname" required="required">
                </div>

                <div class="form-group">
                <label for="exampleInputEmail1">Keywords</label>
                <input type="text" class="form-control" value="' . $articleData['keywords'] . '" name="keywords" required="required">
              </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Foreward</label>
                  <textarea class="form-control" id="description" name="itemdescription">' . $articleData['descr'] . '</textarea>
                </div>
                <div class="form-group">
                <strong>Delete old file?</strong> This would prevent us from having useless files on the server.<br>
                <input type="radio" name="delete" value="youcandelete" required="required"> Yes
                </div>
                <div class="form-group">
                <input type="radio" name="delete" name="donotdelete"> No
                </div>
                <br>
                  <label for="exampleInputFile">Update file</label>
                  <input type="file" name="articlefile" class="form-control" required="required">
                </div>
               <!----Server-side stuff goes here----->
               <input type="hidden" value="' . $articleData['id'] . '" name="articleid">
               <input type="hidden" value="' . $articleData['file_url'] . '" name="articlefile">

               <div class="form-control">
                <input type="submit" class="btn btn-primary pull-right" value="Update Journal" name="editJournal">
              </div>
              </div>

              <!-- /.box-body -->

              
            </form>
          </div>
                        ';
    //  echo ;
  } elseif ($payInfo['payer_id'] === $userInfo['id']) {
    // die($payInfo['payer_id']. $userInfo['id']);
    echo '<div class="content-wrapper">
                        <!-- Content Header (Page header) -->
                        <section class="content-header">
                            <h1>
                                ' . $articleData['item_name'] . '
                                <small></small>
                            </h1>
                            
                        </section>
                    
                        <!-- Main content -->
                        <section class="content">
                    
                    
                                 
                    
                        <div class="row">
                            <div class="col-xs-12">
                              <div class="box">
                                <div class="box-header">
                                  <h2>Foreward</h2>
                    
                                  <div class="box-tools">
                                   
                                  </div>
                                </div>

                                
                                <!-- /.box-header -->
                                <div class="box-body table-responsive" ">
                            ' . $articleData['item_desc'] . '
                            <br>
                            <h2>The Document:</h2>
                                <embed class="col-md-12" height="500" type="application/pdf" src="' . $baseURL . str_replace("..", "", $articleData["file_url"]) . '">
</object>';
  } else {
    ?>
    <script>
      alert("This article does not belong to you.");
      window.history.back();
    </script>
  <?php
    // echo $userInfo['id'];
  }
}
//var_dump($articleData);

?>

</div>
<!-- /.box-body -->
</div>
<!-- /.box -->
</div>
</div>
</section>
<!-- /.content -->




<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
require_once("inc/footer.php");
?>