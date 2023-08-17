<?php
session_start();

require './class/atclass.php';
$sql = "SELECT
    `tbl_orderdetails`.`order_id`
    , `tbl_ordermaster`.`order_date`
    , `tbl_ordermaster`.`order_status`
    , `tbl_ordermaster`.`shipping_name`
    , `tbl_ordermaster`.`shipping_mobileno`
    , `tbl_ordermaster`.`shipping_address`
    , `tbl_orderdetails`.`pro_price`
    , `tbl_orderdetails`.`pro_qty`
    , `tbl_orderdetails`.`details_id`
    , `tbl_product_vendor`.`vendor_id`
    , `tbl_payment`.`method`
    , `tbl_ordermaster`.`shipping_name`
    , `tbl_ordermaster`.`shipping_mobileno`
FROM
    `tbl_ordermaster`
    INNER JOIN `tbl_orderdetails` 
        ON (`tbl_ordermaster`.`order_id` = `tbl_orderdetails`.`order_id`)
    INNER JOIN `tbl_payment` 
        ON (`tbl_ordermaster`.`order_id` = `tbl_payment`.`order_id`)
    INNER JOIN `tbl_product_vendor` 
        ON (`tbl_product_vendor`.`pro_ven_id` = `tbl_orderdetails`.`pro_ven_id`)
    WHERE `tbl_product_vendor`.`vendor_id` = '{$_SESSION['vi']}'";

$selectq = mysqli_query($connection, $sql) or die(mysqli_error($connection));
?>
<!DOCTYPE html>
<html lang="en">


    <!-- Mirrored from medico.dexignzone.com/admin/table-datatable-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Dec 2021 10:57:49 GMT -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>PHARMACIN - Payment List</title>
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="../admin/upload/final.jpg">
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
            include './themepart/sidebar.php';
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
                                <h4>Payment List</h4>
                            </div>

                        </div>
                        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Payment List</li>
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
                                                    <th>No.</th>
                                                    <th>Customer Name</th>
                                                    <th>Customer Mobile No</th>
                                                    <th>Order Date</th>
                                                    <th>Amount</th>
                                                    <th>Method</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (isset($_GET['pid'])) {
                                                    $did = $_GET['pid'];
                                                    $deleteq = mysqli_query($connection, "delete from tbl_orderdetails where details_id='{$did}'") or die(mysqli_error($connection));
                                                    if ($deleteq) {
                                                        echo "<script>alert('Record Deleted');window.location='manage-payment.php';</script>";
                                                    }
                                                }
                                                $i = 1;
                                                while ($paymentrow = mysqli_fetch_array($selectq)) {
                                                    $price = $paymentrow['pro_price'] * $paymentrow['pro_qty'];
                                                    echo "<tr>";
                                                    echo "<td>$i</td>";
                                                    echo "<td>{$paymentrow['shipping_name']}</td>";
                                                    echo "<td>{$paymentrow['shipping_mobileno']}</td>";
                                                    echo "<td>{$paymentrow['order_date']}</td>";
                                                    echo "<td>{$price}</td>";
                                                    echo "<td>{$paymentrow['method']}</td>";
                                                    echo "<td><div class='dropdown custom-dropdown mb-0'>
                                                            <div data-toggle='dropdown'>
                                                                <i class='fa fa-ellipsis-v'></i>
                                                            </div>
                                                            <div class='dropdown-menu dropdown-menu-right'>
                                                                 <a class='dropdown-item text-danger' href='manage-payment.php?pid={$paymentrow['details_id']}'><img src='../admin/upload/ani_icons/delete.gif' style='height:34px;width:50px;' /> Delete</a>
                                                            </div>
                                                        </div></td>";
                                                    echo "</tr> ";
                                                    $i++;
                                                }
                                                ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Customer Name</th>
                                                    <th>Customer Mobile No</th>
                                                    <th>Order Date</th>
                                                    <th>Amount</th>
                                                    <th>Method</th>
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

