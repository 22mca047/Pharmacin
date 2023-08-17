<?php
session_start();
require './class/atclass.php';

if (isset($_GET['statusid'])) {
    $statusid = $_GET['statusid'];
    $getstatusq = mysqli_query($connection, "select is_blocked from tbl_vendor where vendor_id='{$statusid}'") or die(mysqli_error($connection));
    $statusfromdb = mysqli_fetch_array($getstatusq);

    if ($statusfromdb['is_blocked'] == 1) {
        mysqli_query($connection, "update tbl_vendor set is_blocked='0' where vendor_id='{$statusid}'") or die(mysqli_error($connection));
    } else {
        mysqli_query($connection, "update tbl_vendor set is_blocked='1' where vendor_id='{$statusid}'") or die(mysqli_error($connection));
    }
}
$sql = "SELECT
    `tbl_vendor`.`vendor_id`
    , `tbl_vendor`.`vendor_name`
    , `tbl_vendor`.`vendor_mobileno`
    , `tbl_vendor`.`vendor_address`
    , `tbl_vendor`.`vendor_details`
    , `tbl_vendor`.`vendor_email`
    , `tbl_vendor`.`vendor_password`
    , `tbl_vendor`.`vendor_photo`
    , `tbl_area`.`area_pincode`
    , `tbl_vendor`.`is_blocked`
FROM
    `tbl_area`
    INNER JOIN `tbl_vendor` 
        ON (`tbl_area`.`area_id` = `tbl_vendor`.`area_id`) where `tbl_vendor`.`is_blocked` = 0 ";
$selectq = mysqli_query($connection, $sql) or die(mysqli_error($connection));
?> 
<!DOCTYPE html>
<html lang="en">


    <!-- Mirrored from medico.dexignzone.com/admin/table-datatable-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Dec 2021 10:57:49 GMT -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>PHARMACIN - Blacklisted </title>
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
                                <h4>Black Listed Vendors</h4>
                            </div>

                        </div>
                        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">BlackListed Vendors</li>
                            </ol>
                        </div>
                    </div>
                    <!-- row -->


                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="display" style="min-width: 845px">
                                            <thead>
                                                <tr>
                                                    <th>Photo</th>
                                                    <th>Id</th>
                                                    <th>Name</th>
                                                    <th>Mobile-No</th>
                                                    <th>Address</th>
                                                    <th>Details</th>
                                                    <th>Email</th>
                                                    <th>Password</th>
                                                    <th>Pincode</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (isset($_GET['did'])) {
                                                    $did = $_GET['did'];
                                                    $deleteq = mysqli_query($connection, "delete from tbl_vendor where vendor_id='{$did}'") or die(mysqli_error($connection));
                                                    if ($deleteq) {
                                                        echo "<script>alert('Record Deleted');window.location='vendor-list.php';</script>";
                                                    }
                                                }
                                                while ($vendorrow = mysqli_fetch_array($selectq)) {
                                                    $status = $vendorrow['is_blocked'];
                                                    if ($status == 1) {
                                                        $status = "<a href='?statusid=$vendorrow[0]'><img src='upload/signs/Active.png'></a>";
                                                    } else {
                                                        $status = "<a href='?statusid=$vendorrow[0]'><img src='upload/signs/InActive.png'></a>";
                                                    }
                                                    echo "<tr>";
                                                    echo "<td><img  style='height:100px;width:100px;' src='upload/vendor/{$vendorrow['vendor_photo']}'></td>";
                                                    echo "<td>{$vendorrow['vendor_id']}</td>";
                                                    echo "<td>{$vendorrow['vendor_name']}</td>";
                                                    echo "<td>{$vendorrow['vendor_mobileno']}</td>";
                                                    echo "<td>{$vendorrow['vendor_address']}</td>";
                                                    echo "<td>{$vendorrow['vendor_details']}</td>";
                                                    echo "<td>{$vendorrow['vendor_email']}</td>";
                                                    echo "<td>{$vendorrow['vendor_password']}</td>";
                                                    echo "<td>{$vendorrow['area_pincode']}</td>";
                                                    echo "<td>{$status}</td>";
                                                    echo "<td><div class='dropdown custom-dropdown mb-0'>
                                                            <div data-toggle='dropdown'>
                                                                <i class='fa fa-ellipsis-v'></i>
                                                            </div>
                                                            <div class='dropdown-menu dropdown-menu-right'>
                                                                <a class='dropdown-item text-danger' href='vendor-list.php?did={$vendorrow['vendor_id']}'><img src='upload/ani_icons/delete.gif' style='height:34px;width:50px;' />Delete</a>
                                                            </div>
                                                        </div></td>";
                                                    echo "</tr>";
                                                }
                                                ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Photo</th>
                                                    <th>Id</th>
                                                    <th>Name</th>
                                                    <th>Mobile-No</th>
                                                    <th>Address</th>
                                                    <th>Details</th>
                                                    <th>Email</th>
                                                    <th>Password</th>
                                                    <th>Pincode</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--**********************************
                Content body end
            ***********************************-->


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

