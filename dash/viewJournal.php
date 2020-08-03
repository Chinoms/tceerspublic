<?php
require_once("inc/header.php");
require_once("inc/sidebar.php");
require_once("classes/journals.php");

?>



<?php
//$baseURL = "http://localhost/ukwuoma";
if (isset($_REQUEST['journalid'])) {
  $journalID = $_REQUEST['journalid'];
  //check to see if this person owns what he's trying to view
  $getJournal = $conn->query("SELECT * FROM journal_items WHERE id = '$journalID'");
  $journalData = $getJournal->fetch_assoc();
  //prepare some variables
  $item_id = $journalData['id'];
  $author_id = $journalData['item_author_id'];
  $userid = $userInfo['id'];

  //var_dump($journalData);
  //Check payment status
  $checkPay = $conn->query("SELECT * FROM paiditems WHERE payer_id = '$userid' AND item_id = '$item_id'");
  $payInfo = $checkPay->fetch_assoc();

  //var_dump($payInfo);
  if ($journalData['item_author_id'] === $userInfo['id'] || $checkUsers->userData($conn)['priv'] == "superadmin") {
    //die($journalData['item_author_id'] ."<br>".$userInfo['id']);
    echo '<div class="content-wrapper">
                        <!-- Content Header (Page header) -->
                        <section class="content-header">
                                
                        <a href="editJournal.php?journalid='.$item_id.'"><button style="position:fixed; z-index:3; margin-left:70%;" class="btn btn-primary btn-lg pull-right"><span class="fa fa-edit"></span>&nbsp; EDIT</button></a>
                            <h1>
                                ' . $journalData['item_name'] . '
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
                            ' . $journalData['item_desc'] . '
                            <br>
                            <h2>The Document:</h2>
                                <embed class="col-md-12" height="500" type="application/pdf" src="' . $baseURL . str_replace("..", "", $journalData["file_url"]) . '">
</object>
                    ';
    //  echo ;
  } elseif ($payInfo['payer_id'] === $userInfo['id']) {
    // die($payInfo['payer_id']. $userInfo['id']);
    echo '<div class="content-wrapper">
                        <!-- Content Header (Page header) -->
                        <section class="content-header">
                            <h1>
                                ' . $journalData['item_name'] . '
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
                            ' . $journalData['item_desc'] . '
                            <br>
                            <h2>The Document:</h2>
                                <embed class="col-md-12" height="500" type="application/pdf" src="' . $baseURL . str_replace("..", "", $journalData["file_url"]) . '">
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
//var_dump($journalData);

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