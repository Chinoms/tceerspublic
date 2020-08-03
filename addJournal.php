<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
require_once 'classes/fetchData.php';

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Submit a journal for review
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

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">


                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <!--button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button-->
                </div>
            </div>
            <div class="box-body">
            <div id = "formsuccess" style="display:none; margin-bottom:100px;" class="alert alert-success">Success! Your article has been uploaded and is pending review.</div>
 
                <div class="row">
                   <div class="col-md-6">
                    <div id="forminfo"></div>
                        <form onsubmit="uploadJournal()" id="journalform" enctype="multipart/form-data">
                           
                            <div class="form-group">
                               <label>Select journal</label>
                               <select id="parentjournal" name="parentjournal" class="form-control"><?php $dataMethods->fetchJournals($conn); ?> </select>
                            </div>
                            <div class="form-group">
                                <label>Journal Title</label>
                                <input type="text" class="form-control" name="title" id="title">
                            </div>

                            <div class="form-group">
                                <label>Keywords</label>
                                <input type="text" class="form-control" name="keywords" id="keywords" placeholder="Enter keywords here. Seperate with commas">
                            </div>
                            <div class="form-group">
                                <label>File</label>
                                <input type="file" name="journalfile" class="form-control" id="journalfile" required = "required">
                            </div>


                           

                    </div>


                    <div class="col-md-6">
                        <!---Pass server side variables-->
                        <input type="hidden" name ="authorid" id="authorid" value="<?php echo $checkUsers->userData($conn)['id'];?>">
                        <input type="hidden" name="fname"id="fname" value ="<?php echo $checkUsers->userData($conn)['fname'];?>">
                        <input type="hidden" name="lname" id="lname" value = "<?php echo $checkUsers->userData($conn)['lname'] ?>">
                        <!--Pass server side variables-->
                        <div class="form-group">
                        <label>Description</label>
                            <textarea name="description" id="description" placeholder="Type description here . . ."></textarea>
                        </div>
                        <div class="progress" style="display:none" id="progress_bar">
                        <div class="progress-bar progress-bar-striped progress-bar-success active" aria-valuenow = "100" role="progressbar" style="width:100%">
                            Loading . . .
                        </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="sendjournal" id="sendjournal" class="btn btn-primary pull-right" value="Submit">
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">

            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
require_once 'inc/footer.php';
?>