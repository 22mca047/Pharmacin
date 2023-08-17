<?php
session_start();
require './class/atclass.php';

$peid = $_GET['eid'];
$selectq = mysqli_query($connection, "select * from tbl_vendor where vendor_id='{$peid}'") or die(mysqli_error($connection));
$selectrow = mysqli_fetch_array($selectq);
$orderjoin = "SELECT
    `tbl_product`.`pro_image`
    , `tbl_product`.`pro_name`
    , `tbl_orderdetails`.`pro_qty`
    , `tbl_orderdetails`.`pro_price`
    , `tbl_ordermaster`.`order_id`
    , `tbl_ordermaster`.`order_date`
    , `tbl_ordermaster`.`customer_id`
    , `tbl_customer`.`customer_name`
FROM
    `tbl_ordermaster`
    INNER JOIN `tbl_orderdetails` 
        ON (`tbl_ordermaster`.`order_id` = `tbl_orderdetails`.`order_id`)
    INNER JOIN `tbl_product_vendor` 
        ON (`tbl_product_vendor`.`pro_ven_id` = `tbl_orderdetails`.`pro_ven_id`)
    INNER JOIN `tbl_customer` 
        ON (`tbl_customer`.`customer_id` = `tbl_ordermaster`.`customer_id`)
    INNER JOIN `tbl_product` 
        ON (`tbl_product`.`pro_id` = `tbl_product_vendor`.`pro_id`) WHERE `tbl_product_vendor`.`vendor_id`='{$peid}';";
$selectorder = mysqli_query($connection, $orderjoin) or die(mysqli_error($connection));

$sql = "SELECT
    `tbl_customer`.`customer_id`
    , `tbl_customer`.`customer_name`
    , `tbl_feedback`.`feedback_ratings`
    , `tbl_feedback`.`feedback_date`
    , `tbl_feedback`.`feedback_details`
    , `tbl_customer`.`customer_image`
    , `tbl_product_vendor`.`vendor_id`
FROM
    `tbl_orderdetails`
    INNER JOIN `tbl_feedback` 
        ON (`tbl_orderdetails`.`details_id` = `tbl_feedback`.`details_id`)
    INNER JOIN `tbl_ordermaster` 
        ON (`tbl_ordermaster`.`order_id` = `tbl_orderdetails`.`order_id`)
    INNER JOIN `tbl_customer` 
        ON (`tbl_customer`.`customer_id` = `tbl_ordermaster`.`customer_id`)
    INNER JOIN `tbl_product_vendor` 
        ON (`tbl_product_vendor`.`pro_ven_id` = `tbl_orderdetails`.`pro_ven_id`) WHERE `tbl_product_vendor`.`vendor_id`='{$peid}'";

$query1 = mysqli_query($connection, $sql) or die(mysqli_error($connection));

$projoinq = "SELECT
    `tbl_product`.`pro_image`
    , `tbl_product`.`pro_name`
    , `tbl_product_vendor`.`pro_ven_price`
    , `tbl_product_vendor`.`pro_qty`
FROM
    `tbl_product_vendor`
    INNER JOIN `tbl_product` 
        ON (`tbl_product_vendor`.`pro_id` = `tbl_product`.`pro_id`) where vendor_id='{$peid}' ;";
$productq = mysqli_query($connection, $projoinq) or die(mysqli_error($connection));

//print_r($selectrow);
?>
<!DOCTYPE html>
<html lang="en">


    <!-- Mirrored from medico.dexignzone.com/admin/doctor-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Dec 2021 10:57:34 GMT -->
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>PHARMACIN - Vendor Profile</title>
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="upload//final.jpg">
        <link rel="stylesheet" href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css">
        <link rel="stylesheet" href="css/style.css">


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

            <?php
            include './themepart/header.php';
            include './themepart/Sidebar.php';
            ?>

            <!--**********************************
                Content body start
            ***********************************-->
            <div class="content-body">
                <!-- row -->
                <div class="container-fluid">

                    <div class="row page-titles mx-0">
                        <div class="col-sm-6 p-md-0">
                            <div class="welcome-text">
                                <h4>Vendor Profile</h4>
                            </div>
                        </div>
                        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active"><a href="vendor-list.php">Vendor list</a></li>
                                <li class="breadcrumb-item active">Vendor Profile</li>
                            </ol>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-6 col-xxl-6 col-lg-6 col-md-12" style="height: 540px;">
                            <div class="card">
                                <div class="text-center p-3 overlay-box" style="background-image: url(images/big/img5.jpg); height:100%; background-repeat:no-repeat;">
                                    <?php echo "<img src='upload/vendor/{$selectrow['vendor_photo']}' style='padding-top: 30px; height: 50% ; width: 40%;' class='img-fluid  mt-2' alt=''>"; ?>
                                    <h3 class="mt-3 mb-0 text-white">
                                        <?php
                                        echo "<br><td>{$selectrow['vendor_name']}</td>";
                                        ?></h3>
                                    <p class="text-white mb-0 mt-2" >
                                        <?php
                                        echo "<td>Vendor id :- {$selectrow['vendor_id']}</td><br>";
                                        echo "<td> Name :- {$selectrow['vendor_name']}</td><br>";
                                        echo "<td>Mobile No :- {$selectrow['vendor_mobileno']}</td><br>";
                                        echo "<td>E-mail :- {$selectrow['vendor_email']}</td><br>";
                                        echo "<td>Address :- {$selectrow['vendor_address']}</td><br>";
                                        ?></p>
                                </div>

                            </div>
                        </div>
                        <div class="col-xl-6 col-xxl-6 col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Orders</h5>
                                </div>
                                <div class="card-body scrollbar" id="style-3">
                                    <div id="DZ_W_Message" class="widget-message dz-scroll" style="height:380px;">
                                        <div class="media mb-3">
                                            <div class="media-body">
                                                <?php
                                                $count = mysqli_num_rows($selectorder);
                                                if ($count == 0) {
                                                    echo '<center style="padding-top:25%;"><svg id="rocket-icon" class="my-2" viewBox="0 0 24 24" width="80" height="80" stroke="currentColor" stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round">
									<path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
									<line x1="3" y1="6" x2="21" y2="6"></line>
									<path d="M16 10a4 4 0 0 1-8 0"></path>
								</svg>
								<h4 class="my-2">No Order Yet</h4></center>
								';
                                                } else {
                                                    while ($order1 = mysqli_fetch_array($selectorder)) {
                                                        echo "<li>
                                                <div class='timeline-badge primary'></div>
                                                <a class='timeline-panel text-muted mb-3 d-flex align-items-center' href='javascript:void(0);'>
                                                    <img class='rounded-circle' alt='image' width='50' src='upload/product/{$order1['pro_image']}'>
                                                    <div class='col'>
                                                        <h5 class='mb-1'>{$order1['pro_name']}</h5>
                                                        <small class='d-block'>Price : {$order1['pro_price']} | QTY : {$order1['pro_qty']}</small>
                                                        <small class='d-block'>Customer Name : {$order1['customer_name']} ( {$order1['customer_id']} )</small>
                                                    </div>
                                                </a>
                                            </li>";
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-xxl-12 col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Products</h4>
                                </div>
                                <div class="card-body"> 
                                    <div id="DZ_W_Todo" class="widget-todo dz-scroll" style="height:380px;">
                                        <ul class="timeline">
                                            <?php
                                            $count1 = mysqli_num_rows($productq);
                                            if ($count1 == 0) {
                                                echo "<img src='./upload/ani_icons/noproduct.gif' style='padding-left: 369px;padding-top: 84px;' ><h4 class='my-2' style='padding-left: 382px;padding-top: 18px;'>No Product Added Yet</h4>";
                                            } else {
                                                while ($row1 = mysqli_fetch_array($productq)) {
                                                    echo "<li>
                                                <div class='timeline-badge primary'></div>
                                                <a class='timeline-panel text-muted mb-3 d-flex align-items-center' href='javascript:void(0);'>
                                                    <img class='rounded-circle' alt='image' width='50' src='upload/product/{$row1['pro_image']}'>
                                                    <div class='col'>
                                                        <h5 class='mb-1'>{$row1['pro_name']}</h5>
                                                        <small class='d-block'>Price : {$row1['pro_ven_price']} - QTY : {$row1['pro_qty']}</small>
                                                    </div>
                                                </a>
                                            </li>";
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Feedback</h4>
                                </div>
                                <?php
                                $count3 = mysqli_num_rows($query1);
                                if($count3 == 0)
                                {
                                    echo "<center><img src='./upload/ani_icons/nofeedback.gif' style='padding-top: 30px;height: 147px;width: 95px;' ><h4 class='my-2' style='padding-top: 18px;'>No Feedback Yet</h4></center>";
                                }
                                else
                                {
                                while ($row1 = mysqli_fetch_array($query1)) {
                                    echo "<div class='card-body'>
                                                <div class='media mb-3 align-items-center bg-white'>
                                                <img class='mr-3 rounded-circle' alt='image' style='height:60px;width:60px;' src='upload/customer/{$row1['customer_image']}'>
                                                <div class='media-body'>
                                                <h5 class='mb-0 text-pale-sky'> {$row1['customer_name']}<small class='text-primary'>( Rating : {$row1['feedback_ratings']})</small></h5>
                                                <small class='text-muted mb-0'>{$row1['feedback_details']}</small>
                                                </div>
                                                <div class='float-right d-inline btn-outline-dark btn btn-sm'>{$row1['feedback_date']}</div>
                                    </div>
                                </div>";
                                }
                                }
                                ?>
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
        <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="vendor/global/global.min.js"></script>
        <script src="js/deznav-init.js"></script>
        <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
        <script src="js/custom.min.js"></script>

        <!-- Demo scripts -->
        <script src="js/dashboard/dashboard-2.js"></script>

        <!-- Svganimation scripts -->
        <script src="vendor/svganimation/vivus.min.js"></script>
        <script src="vendor/svganimation/svg.animation.js"></script>

    </body>

    <!-- Mirrored from medico.dexignzone.com/admin/doctor-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Dec 2021 10:57:34 GMT -->
</html>