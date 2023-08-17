<?php
session_start();
require './class/atclass.php';

$aid = $_GET['eid'];
$sql = "SELECT
    `tbl_vendor`.`vendor_name`
    , `tbl_vendor`.`vendor_photo`
    , `tbl_vendor`.`shop_name`
    , `tbl_vendor`.`shop_timing`
    , `tbl_area`.`area_pincode`
FROM
    `tbl_vendor`
    INNER JOIN `tbl_area` 
        ON (`tbl_vendor`.`area_id` = `tbl_area`.`area_id`) where area_pincode='{$aid}' and is_blocked=1 and is_verified=1;";
$selectq = mysqli_query($connection, $sql) or die(mysqli_error($connection));
$sql1 = "SELECT
    `tbl_customer`.`customer_name`
    , `tbl_customer`.`customer_image`
    , `tbl_customer`.`customer_id`
    , `tbl_area`.`area_pincode`
FROM
    `tbl_customer`
    INNER JOIN `tbl_area` 
        ON (`tbl_customer`.`area_id` = `tbl_area`.`area_id`) where area_pincode='{$aid}';";
$selectq1 = mysqli_query($connection, $sql1) or die(mysqli_error($connection));
?>
<!DOCTYPE html>
<html lang="en">


    <!-- Mirrored from medico.dexignzone.com/admin/table-datatable-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Dec 2021 10:57:49 GMT -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>PHARMACIN - Area Details </title>
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="upload/final.jpg">
        <!-- Datatable -->
        <link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
        <!-- Custom Stylesheet -->
        <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">

    </head>

    <body>

        <!--*******************
            Preloader start
        ********************-->
        <div id="preloader">
            <div class="sk-three-bounce">
                <div class="sk-child sk-bounce1"></div>
                <div class="sk-child sk-bounce2"></div>
                <div class="sk-child sk-bounce3"></div>
            </div>
        </div>
        <!--*******************
            Preloader end
        ********************-->


        <!--**********************************
            Main wrapper start
        ***********************************-->
        <div id="main-wrapper">

            <!--**********************************
                Nav header start
            ***********************************-->
            <div class="nav-header">
                <a href="index.html" class="brand-logo">
                    <img class="logo-abbr" src="images/logo-white.png" alt="">
                    <img class="logo-compact" src="images/logo-text-white.png" alt="">
                    <img class="brand-title" src="images/logo-text-white.png" alt="">
                </a>

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="line"></span><span class="line"></span><span class="line"></span>
                    </div>
                </div>
            </div>
            <!--**********************************
                Nav header end
            ***********************************-->

            <!--**********************************
                Header start
            ***********************************-->
            <?php
            include './themepart/header.php';
            ?>
            <!--**********************************
                Header end ti-comment-alt
            ***********************************-->

            <!--**********************************
                Sidebar start
            ***********************************-->
            <?php
            include './themepart/Sidebar.php';
            ?>
            <!--**********************************
                Sidebar end
            ***********************************-->

            <!--**********************************
                Content body start
            ***********************************-->
            <div class="content-body">
                <div class="container-fluid">
                    <div class="row page-titles mx-0">
                        <div class="col-sm-6 p-md-0">
                            <div class="welcome-text">
                                <h4>Area Details</h4>
                            </div>

                        </div>
                        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="manage-area.php">Manage-Area</a></li>
                                <li class="breadcrumb-item">Area Details</a></li>
                            </ol>
                        </div>
                    </div>
                    <!-- row -->

                    <!--**********************************
                        Content body end
                    ***********************************-->



                    <div class="row">
                        <div class="col-6">
                            <div class="card" >
                                <div class="card-body "  style="border: solid 2px; box-shadow: 0px 0px 15px 5px black;">
                                    <div class="table-responsive" >
                                        <h5><b>Vendors List</b></h5>
                                        <div class="card-body " >
                                                <?php
                                                while ($row = mysqli_fetch_array($selectq)) {
                                                    echo "<div id='DZ_W_Todo' class=' dz-scroll' >
                                        <ul class='timeline'>
                                            <li>
                                                <div class='timeline-badge primary'></div>
                                                
                                                <a class='timeline-panel text-muted mb-3 d-flex align-items-center' href='javascript:void(0);'>
                                                    <img style='height:50px;width:60px;' class='rounded-circle'  alt='' src='upload/vendor/{$row['vendor_photo']}'>
                                                    <div class='col'>
                                                        <h5 class='mb-1'>{$row['vendor_name']}</h5>
                                                        <small class='d-block'>{$row['shop_name']} ( {$row['shop_timing']} )</small>
                                                    </div>
                                                    </a>
                                            </li>
                                        </ul>
                                    </div>";
                                                }
                                                ?>
                                                
                                </div>      
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="card">
                                <div class="card-body" style="border: solid 2px; box-shadow: 0px 0px 15px 5px black;">
                                    <div class="table-responsive">
                                        <h5><b>Customers List</b></h5>
                                            <div class="card-body"> 
                                                 <?php
                                                while ($row1 = mysqli_fetch_array($selectq1)) {
                                                    echo "<div id='DZ_W_Todo' class=' dz-scroll' >
                                        <ul class='timeline'>
                                            <li>
                                                <div class='timeline-badge primary'></div>
                                                
                                                <a class='timeline-panel text-muted mb-3 d-flex align-items-center' href='javascript:void(0);'>
                                                    <img style='height:50px;width:60px;' class='rounded-circle'  alt='' src='upload/customer/{$row1['customer_image']}'>
                                                    <div class='col'>
                                                        <h5 class='mb-1'>{$row1['customer_name']}</h5>
                                                        <small class='d-block'>{$row1['customer_id']}</small>
                                                    </div>
                                                    </a>
                                            </li>
                                        </ul>
                                    </div>";
                                                }
                                                ?>
                                                
                                </div>      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--**********************************
                Footer start
            ***********************************-->
            <?php
            include './themepart/footer.php';
            ?>
            <!--**********************************
                Footer end
            ***********************************-->

            <!--**********************************
               Support ticket button start
            ***********************************-->

            <!--**********************************
               Support ticket button end
            ***********************************-->


        </div>
        <!--**********************************
            Main wrapper end
        ***********************************-->

        <!--**********************************
            Scripts
        ***********************************-->
        <!-- Required vendors -->
        <script src="vendor/global/global.min.js"></script>
        <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
        <script src="js/deznav-init.js"></script>
        <script src="js/custom.min.js"></script>



        <!-- Datatable -->
        <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="js/plugins-init/datatables.init.js"></script>

        <!-- Svganimation scripts -->
        <script src="vendor/svganimation/vivus.min.js"></script>
        <script src="vendor/svganimation/svg.animation.js"></script>
    </body>


    <!-- Mirrored from medico.dexignzone.com/admin/table-datatable-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Dec 2021 10:57:49 GMT -->
</html>

