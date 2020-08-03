<?php
require_once "inc/header.php";
require_once "inc/sidebar.php";
require_once "classes/journals.php";

?>



            <?php

if (isset($_REQUEST['articleid'])) {
    $articleid = $_REQUEST['articleid'];
    $getArticle = $conn->query("SELECT * FROM seers WHERE id = '$articleid'");
    $articleData = $getArticle->fetch_assoc();

    $item_id = $articleid;
    $author_id = $articleData['author_id'];
    $userid = $userInfo['id'];

    #check payment status
    $checkPay = $conn->query("SELECT * FROM paiditems WHERE payer_id = '$userid' AND item_id = '$item_id'");
    $payInfo = $checkPay->fetch_assoc();

    if ($articleData['author_id'] === $userInfo['id']  || $checkUsers->userData($conn)['priv'] == "superadmin") {
        echo '<div class="content-wrapper">
                        <!-- Content Header (Page header) -->
                        <section class="content-header">
                        <a href="editArticle.php?articleid='.$item_id.'"><button style="position:fixed; z-index:3; margin-left:70%;" class="btn btn-primary btn-lg pull-right"><span class="fa fa-edit"></span>&nbsp; EDIT</button></a>
                            <h1>
                                ' . $articleData['title'] . '
                                <small></small>
                            </h1>

                        </section>

                        <!-- Main content -->
                        <section class="content">

                    <div class="row">
                            <div class="col-xs-12">
                              <div class="box">
                                <div class="box-header">
                                  <h3 class="box-title">Abstract</h3>

                                  <div class="box-tools">

                                  </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body table-responsive" ">
                            ' . $articleData['descr'] . '
                            <br>
                            <h2>The Document:</h2>
                                <embed class="col-md-12" height="500" type="application/pdf" src="' . $baseURL . str_replace("..", "", $articleData["file_url"]) . '">
</object>';
        //  echo ;
    } elseif ($payInfo['payer_id'] === $userInfo['id']) {
        echo '<div class="content-wrapper">
                        <!-- Content Header (Page header) -->
                        <section class="content-header">
                            <h1>
                                ' . $articleData['title'] . '
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
                            ' . $articleData['descr'] . '
                            <br>
                            <h2>The Document:</h2>
                                <embed class="col-md-12" height="500" type="application/pdf" src="' . $baseURL . str_replace("..", "", $articleData["file_url"]) . '">
</object>';
    } else {
        ?>
                            <script>alert("This article does not belong to you."); window.history.back();</script>
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
require_once "inc/footer.php";
?>