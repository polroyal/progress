<?php

echo "ka stuff haka";
session_start();
if (!isset($_SESSION['leave_pj'])) {
    ?>
    <script type="text/javascript">
        window.location = "login.php";
    </script>
    <?php
}
include("includes/db.php");
include("includes/functions.php");

$page = "home";
if (isset($_GET['p'])) {
    $page = strtolower($_GET['p']);
}
if (false) {//$page == "home"){
    ?>
    <script type="text/javascript">
        window.location = "calendar.php";
    </script> 
    <?php
}
?>

<?php include("includes/header.php"); ?>
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span> Progress Reporting</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <?php include("includes/quick_info.php"); ?>
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
                <?php include("includes/sidebar.php"); ?>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <?php include("includes/footer_buttons.php"); ?>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <?php include("includes/top_navigation.php"); ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <?php include("pages/$page.php"); ?>
        </div>
        <!-- /page content -->
        <?php
        include("includes/footer.php");
        
