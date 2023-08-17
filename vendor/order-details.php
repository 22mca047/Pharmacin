<?php
session_start();
require './class/atclass.php';
$orid = $_GET['oid'];
$ordersql = "SELECT
    `tbl_orderdetails`.`pro_ven_id`
    , `tbl_orderdetails`.`details_id`
    , `tbl_orderdetails`.`pro_qty`
    , `tbl_orderdetails`.`order_id`
    , `tbl_orderdetails`.`pro_price`
    , `tbl_orderdetails`.`status`
    , `tbl_product`.`pro_image`
    , `tbl_product`.`pro_name`
    , `tbl_product_vendor`.`vendor_id`
FROM
    `tbl_product_vendor`
    INNER JOIN `tbl_orderdetails` 
        ON (`tbl_product_vendor`.`pro_ven_id` = `tbl_orderdetails`.`pro_ven_id`)
    INNER JOIN `tbl_product` 
        ON (`tbl_product`.`pro_id` = `tbl_product_vendor`.`pro_id`) WHERE `tbl_orderdetails`.`order_id` = '{$orid}' AND `tbl_product_vendor`.`vendor_id`= '{$_SESSION['vi']}';";
$productq1 = mysqli_query($connection, $ordersql);
//$or= mysqli_fetch_array($selectq);

if ($_POST) {
    
}
?>
<!DOCTYPE html>
<html lang="en">


    <!-- Mirrored from medico.dexignzone.com/admin/all-patients.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Dec 2021 10:57:34 GMT -->
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>PHARMACIN - Order Details </title>
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="./../admin/upload/final.jpg">
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
            ?>
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
                <!-- row -->
                <div class="container-fluid">

                    <div class="row page-titles mx-0">
                        <div class="col-sm-6 p-md-0">
                            <div class="welcome-text">
                                <h4>Order Id :
                                    <?php
                                    echo "{$orid}";
                                    ?>
                                </h4>
                            </div>
                        </div>
                        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="manage-order.php">Manage Order</a></li>
                                <li class="breadcrumb-item active">Order Details</li>
                            </ol>
                        </div>
                    </div>

                    <div class="row">
                        <?php
                        while ($od = mysqli_fetch_array($productq1)) {
                            $total = $od['pro_price'] * $od['pro_qty'];
                            echo"<div class='col-xl-6 col-lg-4 col-md-6'>
                            <div class='card'>
                                <div class='text-center py-4 px-5 overlay-box' style='background-image: url(images/big/img1.jpg);'>
                                    <div class='profile-photo'>
                                        <img src='../admin/upload/product/{$od['pro_image']}' style='height:100px;width:100px;' class='img-fluid rounded-circle' alt=''>
                                    </div>
                                </div>
                                <ul class='list-group list-group-flush'>
                                    <li class='list-group-item d-flex justify-content-between'>
                                        <span class='mb-0'>Product Name :</span> 
                                        <strong class='text-muted'>{$od['pro_name']}</strong>
                                    </li>
                                    <li class='list-group-item d-flex justify-content-between'>
                                        <span class='mb-0'>Product Qty :</span> 		
                                        <strong class='text-muted'>{$od['pro_qty']}</strong>
                                    </li>
                                    <li class='list-group-item d-flex justify-content-between'>
                                        <span class='mb-0'>Product Price :</span> 		
                                        <strong class='text-muted'>{$od['pro_price']}</strong>
                                    </li>
                                     <li class='list-group-item d-flex justify-content-between'>
                                        <span class='mb-0'>Total :</span> 		
                                        <strong class='text-muted'>{$total}</strong>
                                    </li>
                                    <li class='list-group-item d-flex justify-content-between'>
                                        <span class='mb-0'>Status :</span> 		
                                        <strong class='text-muted'>{$od['status']}</strong>
                                    </li>
                                    <li class='list-group-item d-flex justify-content-between'>";
                            if ($od['status'] == 'Pending') {
                                echo " <span><a class='dropdown-item text-warning' href='change_order_status.php?oid={$od['order_id']}&details_id={$od['details_id']}&status=Accept'><img src='../admin/upload/signs/accept.jpg' style='height:50px; width:170px;'></a></span>                                        
                                               <span><a class='dropdown-item text-warning' href='change_order_status.php?oid={$od['order_id']}&details_id={$od['details_id']}&status=Cancel'><img src='../admin/upload/signs/Reject.jpg' style='height:50px; width:170px;'></a></span>";
                            } elseif ($od['status'] == 'Accept') {
                                echo "<span><a class='dropdown-item text-warning' href='change_order_status.php?oid={$od['order_id']}&details_id={$od['details_id']}&status=Completed'><img src='../admin/upload/signs/completed.jpg' style='height:50px; width:170px;'></a></span>
                                      <span><a class='dropdown-item text-warning' href='change_order_status.php?oid={$od['order_id']}&details_id={$od['details_id']}&status=Cancel'><img src='../admin/upload/signs/Reject.jpg' style='height:50px; width:170px;'></a></span>";
                            }
                            echo "</li>
                                  </ul>
                               </div>
                        </div>";
                        }
                        ?>

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
        <script src="js/deznav-init.js"></script>
        <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
        <script src="js/custom.min.js"></script>

        <!-- Svganimation scripts -->
        <script src="vendor/svganimation/vivus.min.js"></script>
        <script src="vendor/svganimation/svg.animation.js"></script>

    </body>

    <!-- Mirrored from medico.dexignzone.com/admin/all-patients.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Dec 2021 10:57:36 GMT -->
</html>