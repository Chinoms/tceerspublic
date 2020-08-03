<?php
require_once("classes/config.php");
require_once("publicinc/header.php");
require_once("classes/fetchData.php");

if (isset($_REQUEST['searchstring'])) {
  $searchQuery = $_REQUEST['searchstring'];
  //echo $searchQuery;
}
?>
<section class="fdb-block py-0" style="background-color:#118187; height:200px;" id="hero" class="searchheader">
  <div class="row">

    <div class="col-12 col-sm-12 col-md-12 text-center text-sm-left" style="padding-top:100px">
      <!--h1>Froala Design Blocks</h1-->
      <p class="lead whitetext searchlead">Search results for "<?php echo $_REQUEST['searchstring']; ?>"</p>
    </div>
  </div>

</section>

<!-- Contents 30 -->
<section class="fdb-block">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-12 col-lg-12 pt-3">
        <?php
        $dataMethods->searchItems($conn, $searchQuery);
        ?>
      </div>
    </div>
  </div>
</section>




<?php

require_once("publicinc/footer.php");
?>