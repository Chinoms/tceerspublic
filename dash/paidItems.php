<?php
   require_once("inc/header.php");
   require_once("inc/sidebar.php");
   require_once("classes/fetchData.php");

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Premium items
            <small></small>
        </h1>
        <!--ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol-->
    </section>

    <!-- Main content -->
    <section class="content">


             

<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Items you've paid for</h3>

              <div class="box-tools">
               
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>SN</th>
                  <th>Title</th>
                  <th>Date/Time</th>
                  <th>Type</th>
                  <th>Action</td>
                  <!----th>Action</th-->
                </tr>
                <?php
                $userId = $userInfo['id'];
                $dataMethods->fetchPaidItems($conn, $userId, $baseURL);
                ?>
               
              </table>
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