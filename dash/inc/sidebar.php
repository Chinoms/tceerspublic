 <?php
          
            ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php //echo $baseURL."/".$imgLink; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $userInfo['fname'] ." ".$userInfo['lname']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#!"><i class="fa fa-circle-o"></i>Dashboard</a></li>
            <!--li class="active"><a href="index2.html"><i class="fa fa-circle-o"></i></a></li-->
          </ul>
          </li>
          <!----New List Starts here-->
          <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>My Journals</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addJournal.php"><i class="fa fa-circle-o"></i> Submit Journal</a></li>
            <li><a href="pendingJournals.php"><i class="fa fa-circle-o"></i> View Pending Journals</a></li>
            <li><a href="approvedJournals.php"><i class="fa fa-circle-o"></i> View Accepted Journals</a></li>
          </ul>
        </li>


        <!----New List Starts here-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Serials</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addArticle.php"><i class="fa fa-circle-o"></i> Submit Serial</a></li>
            <li><a href="pendingArticles.php"><i class="fa fa-circle-o"></i> View Pending Serials</a></li>
            <li><a href="approvedArticles.php"><i class="fa fa-circle-o"></i> View Accepted Serials</a></li>
          </ul>
        </li>


        <!----New List Starts here-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Paid Materials</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="paidItems.php"><i class="fa fa-circle-o"></i> View Premium Materials</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Profile and Security</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Edit Profile</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Change Password</a></li>
            <?php  $checkUsers->showURLpriv($conn, "google.com"); ?>
          </ul>
        </li>

        <?php 
        if($checkUsers->userData($conn)['priv'] === "superadmin") {
          echo '
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Administration</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pendingJournals.php"><i class="fa fa-circle-o"></i> View Pending Journals</a></li>
          </ul>
        </li>';
        }
         ?>
    </section>
    <!-- /.sidebar -->
  </aside>
