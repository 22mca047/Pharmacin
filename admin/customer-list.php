<?php
session_start();
require './class/atclass.php';

$sql ="SELECT
    `tbl_customer`.`customer_id`
    , `tbl_customer`.`customer_name`
    , `tbl_customer`.`customer_gender`
    , `tbl_customer`.`customer_dob`
    , `tbl_customer`.`customer_image`
    , `tbl_customer`.`customer_mobileno`
    , `tbl_customer`.`customer_address`
    , `tbl_customer`.`customer_email`
    , `tbl_customer`.`customer_password`
    , `tbl_area`.`area_pincode`
FROM
    `tbl_area`
    INNER JOIN `tbl_customer` 
        ON (`tbl_area`.`area_id` = `tbl_customer`.`area_id`)";
$selectq = mysqli_query($connection, $sql) or die(mysqli_error($connection));
?>

<!DOCTYPE html>
<html lang="en">


    <!-- Mirrored from medico.dexignzone.com/admin/table-datatable-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Dec 2021 10:57:49 GMT -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>PHARMACIN - Customer list</title>
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="upload/final.jpg"><!-- Datatable -->
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
                                <h4>Customer-List</h4>
                            </div>
                        </div>
                        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Customer-List</li>
                                <li class="breadcrumb-item"><a href="add-customer.php">Add Customer</a></li>
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
                                                    <th>Image</th>
                                                    <th>Id</th>
                                                    <th>Name</th>
                                                    <th>Gender</th>
                                                    <th>DOB</th>
                                                    <th>Address</th>
                                                    <th>E-mail</th>
                                                    <th>Password</th>
                                                    <th>Pincode</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (isset($_GET['did'])) {
                                                    $did = $_GET['did'];
                                                    $deleteq = mysqli_query($connection, "delete from tbl_customer where customer_id='{$did}'") or die(mysqli_error($connection));
                                                    if ($deleteq) {
                                                        echo "<script>alert('Record Deleted');window.location='customer-list.php';</script>";
                                                    }
                                                }
                                                while ($customerrow = mysqli_fetch_array($selectq)) {
                                                    echo "<tr>";
                                                    echo "<td><img  style='height:100px;width:100px;' src='upload/customer/{$customerrow['customer_image']}'></td>";
                                                    echo "<td>{$customerrow['customer_id']}</td>";
                                                    echo "<td>{$customerrow['customer_name']}</td>";
                                                    echo "<td>{$customerrow['customer_gender']}</td>";
                                                    echo "<td>{$customerrow['customer_dob']}</td>";
                                                    echo "<td>{$customerrow['customer_address']}</td>";
                                                    echo "<td>{$customerrow['customer_email']}</td>";
                                                    echo "<td>{$customerrow['customer_password']}</td>";
                                                    echo "<td>{$customerrow['area_pincode']}</td>";

                                                    echo "<td><div class='dropdown custom-dropdown mb-0'>
                                                            <div data-toggle='dropdown'>
                                                                <i class='fa fa-ellipsis-v'></i>
                                                            </div>
                                                            <div class='dropdown-menu dropdown-menu-right'>
                                                                <a class='dropdown-item text-dark' href='customerprofile.php?eid={$customerrow['customer_id']}'><img src='upload/ani_icons/seemore.gif' style='height:34px;width:50px;' /> See More</a>
                                                                <a class='dropdown-item text-primary' href='edit-customer.php?cid={$customerrow['customer_id']}'><img src='upload/ani_icons/edit.gif' style='height:34px;width:50px;padding-left:7px;' /> Edit</a>
                                                                 <a class='dropdown-item text-danger' href='customer-list.php?did={$customerrow['customer_id']}'><img src='upload/ani_icons/delete.gif' style='height:34px;width:50px;' /> Delete</a>
                                                            </div>
                                                        </div></td>";
                                                    echo "</tr>";
                                                }
                                                ?>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Id</th>
                                                    <th>Name</th>
                                                    <th>Gender</th>
                                                    <th>DOB</th>
                                                    <th>Address</th>
                                                    <th>E-mail</th>
                                                    <th>Password</th>
                                                    <th>Pincode</th>
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

