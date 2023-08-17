<?php
session_start();
require './class/atclass.php';

$peid = $_GET['eid'];
$selectq = mysqli_query($connection, "select * from tbl_customer where customer_id='{$peid}'") or die(mysqli_error($connection));
$selectrow = mysqli_fetch_array($selectq);
//print_r($selectrow);
//feedback join vendor
$feed = "SELECT
    `tbl_feedback`.`feedback_id`
    , `tbl_feedback`.`feedback_ratings`
    , `tbl_feedback`.`feedback_date`
    , `tbl_feedback`.`feedback_details`
    , `tbl_vendor`.`vendor_photo`
    , `tbl_vendor`.`vendor_name`
    , `tbl_ordermaster`.`customer_id`
FROM
    `tbl_orderdetails`
    INNER JOIN `tbl_feedback` 
        ON (`tbl_orderdetails`.`details_id` = `tbl_feedback`.`details_id`)
    INNER JOIN `tbl_ordermaster` 
        ON (`tbl_ordermaster`.`order_id` = `tbl_orderdetails`.`order_id`)
    INNER JOIN `tbl_product_vendor` 
        ON (`tbl_product_vendor`.`pro_ven_id` = `tbl_orderdetails`.`pro_ven_id`)
    INNER JOIN `tbl_vendor` 
        ON (`tbl_vendor`.`vendor_id` = `tbl_product_vendor`.`vendor_id`) WHERE `tbl_ordermaster`.`customer_id`='{$peid}'";
$custfeedback = mysqli_query($connection, $feed) or die(mysqli_error($connection));

//order join vendor
$order = "SELECT
    `tbl_orderdetails`.`order_id`
    , `tbl_orderdetails`.`status`
    , `tbl_ordermaster`.`order_date`
    , `tbl_vendor`.`vendor_name`
    , `tbl_ordermaster`.`customer_id`
    , `tbl_ordermaster`.`order_status`
FROM
    `tbl_ordermaster`
    INNER JOIN `tbl_orderdetails` 
        ON (`tbl_ordermaster`.`order_id` = `tbl_orderdetails`.`order_id`)
    INNER JOIN `tbl_product_vendor` 
        ON (`tbl_product_vendor`.`pro_ven_id` = `tbl_orderdetails`.`pro_ven_id`)
    INNER JOIN `tbl_vendor` 
        ON (`tbl_vendor`.`vendor_id` = `tbl_product_vendor`.`vendor_id`) 
    WHERE `tbl_ordermaster`.`customer_id` =  '{$peid}'";
$custorder = mysqli_query($connection, $order) or die(mysqli_error($connection));
$count = mysqli_num_rows($custorder);
?>
<!DOCTYPE html>
<html lang="en">


    <!-- Mirrored from medico.dexignzone.com/admin/doctor-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Dec 2021 10:57:34 GMT -->
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>PHARMACIN - Customer Profile</title>
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="upload/final.jpg">
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
                                <h4>Customer Profile</h4>
                            </div>
                        </div>
                        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="customer-list.php">Customer-list</a></li>
                                <li class="breadcrumb-item active">Customer Profile</li>
                            </ol>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-6 col-xxl-6 col-lg-6 col-md-12">
                            <div class="card" style="height: 500px;">
                                <div class="text-center p-3 overlay-box" style="background-image: url(images/big/img5.jpg); height:100%; background-repeat:no-repeat;">
                                    <?php echo "<img src='upload/customer/{$selectrow['customer_image']}' style='padding-top: 30px; height: 50% ; width: 40%;' class='img-fluid  mt-2' alt=''><br>"; ?>
                                    <h3 class="mt-3 mb-0 text-white" >
                                        <?php
                                        echo "<br><br><td>{$selectrow['customer_name']}</td>";
                                        ?></h3>
                                    <p class="text-white mb-0 mt-2">
                                        <?php
                                        echo "<td>Customer_ID :{$selectrow['customer_id']}</td><br>";
                                        echo "<td>Gendor :{$selectrow['customer_gender']}</td><br>";
                                        echo "<td>Date Of Birth :{$selectrow['customer_dob']}</td><br>";
                                        echo "<td>E-mail :{$selectrow['customer_email']}</td><br>";
                                        ?></p>
                                </div>

                            </div>
                        </div>
                        <div class="col-xl-6 col-xxl-6 col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-header" >
                                    <h5 class="card-title">Orders</h5>
                                </div>
                                <?php
                                if ($count == 0) {
                                    echo '<center style="padding-top:25%;"><svg id="rocket-icon" class="my-2" viewBox="0 0 24 24" width="80" height="80" stroke="currentColor" stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round">
									<path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
									<line x1="3" y1="6" x2="21" y2="6"></line>
									<path d="M16 10a4 4 0 0 1-8 0"></path>
								</svg>
								<h4 class="my-2">No Order Yet</h4></center>
								';
                                } else {
                                    echo "<div class='card-body scrollbar' id='style-3'>";
                                    while ($custorderrow = mysqli_fetch_array($custorder)) {
                                        echo "
                                    <div id='DZ_W_Message' class='widget-message dz-scroll' >
                                        <div class='media mb-3'><div class='media-body'>
                                        <h5>{$custorderrow['vendor_name']}<small class='text-primary'> (Order Id : {$custorderrow['order_id']} )</small><div class='float-right d-inline btn-outline-dark btn btn-sm'>{$custorderrow['order_date']}</div></h5>";
                                        if ($custorderrow['status'] == 'Completed') {
                                            echo "<div class='btn btn-success btn-sm d-inline-block px-3'>{$custorderrow['status']}</div>";
                                        } elseif ($custorderrow['status'] == 'Pending') {
                                            echo "<div class='btn btn-warning btn-sm d-inline-block px-3'>{$custorderrow['status']}</div>";
                                        } elseif ($custorderrow['status'] == 'Accept') {
                                            echo "<div class='btn btn-primary btn-sm d-inline-block px-3'>{$custorderrow['status']}</div>";
                                        } else {
                                            echo "<div class='btn btn-danger btn-sm d-inline-block px-3'>{$custorderrow['status']}</div>";
                                        }
                                        echo"</div>
                                        </div>
                                    </div>
                                ";
                                    }
                                    echo "</div>";
                                }
                                ?>
                            </div>
                        </div>

                        <div class="col-xl-6 col-xxl-12 col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Feedback</h4>
                                </div>
                                <?php
                                $count3 = mysqli_num_rows($custfeedback);
                                 if($count3 == 0)
                                {
                                    echo "<center><img src='./upload/ani_icons/nofeedback.gif' style='padding-top: 30px;height: 147px;width: 95px;' ><h4 class='my-2' style='padding-top: 18px;'>No Feedback Yet</h4></center>";
                                } else {
                                    while ($feedrow = mysqli_fetch_array($custfeedback)) {
                                        echo "<div class='card-body'>
                                    <div class='media mb-3 align-items-center bg-white'>
                                        <img class='mr-3 rounded-circle' alt='image' style='height:60px;width:60px;' src='upload/vendor/{$feedrow['vendor_photo']}'>
                                        <div class='media-body'>
                                            <h5 class='mb-0 text-pale-sky'>{$feedrow['vendor_name']}<small class='text-primary'>(Ratings : {$feedrow['feedback_ratings']})</small></h5>
                                            <small class='text-muted mb-0'>{$feedrow['feedback_details']}</small>
                                        </div>
                                        <div class='float-right d-inline btn-outline-dark btn btn-sm'>{$feedrow['feedback_date']}</div>
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