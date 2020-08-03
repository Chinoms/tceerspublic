<?php
   require_once("inc/header.php");
   require_once("inc/sidebar.php");
   require_once("classes/journals.php");

?>

             

            <?php
            $userId = $userInfo['id'];
                if(isset($_REQUEST['articleid'])) {
                    $articleid = $_REQUEST['articleid'];
                    $getArticle = $conn->query("SELECT * FROM seers, paiditems WHERE seers.id = paiditems.item_id && paiditems.payer_id = '$userId' && seers.id = '$articleid'");
                    $articleData = $getArticle->fetch_assoc();
                    
                        echo '<div class="content-wrapper">
                        <!-- Content Header (Page header) -->
                        <section class="content-header">
                            <h1>
                                '.$articleData['title'].'
                                <small></small>
                            </h1>
                            
                        </section>
                    
                        <!-- Main content -->
                        <section class="content">
                    
                    <div class="row">
                            <div class="col-xs-12">
                              <div class="box">
                                <div class="box-header">
                                  <h3 class="box-title">Foreward</h3>
                    
                                  <div class="box-tools">
                                   
                                  </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body table-responsive" ">
                            '.$articleData['descr'].'
                            <br>
                            <h2>The Document:</h2>
                                <embed class="col-md-12" height="500" type="application/pdf" src="'.$baseURL.str_replace("..", "", $articleData["file_url"]).'">
</object>
                    ';
                    
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