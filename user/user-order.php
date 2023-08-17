<?php
session_start();
if (!isset($_SESSION['ci']))
{
    header("location:user-login.php");
}
require './class/atclass.php';

$msg = "";

$custid = $_SESSION['ci'];
$sql = "SELECT
    `tbl_product`.`pro_name`
    , `tbl_product`.`pro_details`
    , `tbl_product`.`pro_image`
    , `tbl_product_vendor`.`pro_ven_price`
    , `tbl_ordermaster`.`order_date`
    , `tbl_ordermaster`.`order_status`
    , `tbl_ordermaster`.`shipping_name`
    , `tbl_ordermaster`.`shipping_mobileno`
    , `tbl_orderdetails`.`order_id`
    , `tbl_orderdetails`.`details_id`
    , `tbl_orderdetails`.`status`
    , `tbl_orderdetails`.`pro_qty`
    , `tbl_orderdetails`.`pro_price`
    ,`tbl_orderdetails`.`pro_ven_id`
    
FROM
    `tbl_ordermaster`
    INNER JOIN `tbl_orderdetails` 
        ON (`tbl_ordermaster`.`order_id` = `tbl_orderdetails`.`order_id`)
    INNER JOIN `tbl_product_vendor` 
        ON (`tbl_product_vendor`.`pro_ven_id` = `tbl_orderdetails`.`pro_ven_id`)
    INNER JOIN `tbl_product` 
        ON (`tbl_product`.`pro_id` = `tbl_product_vendor`.`pro_id`) where customer_id = $custid;";
$orderq = mysqli_query($connection, $sql);
?>
<!-- comment --><!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from medico.dexignzone.com/xhtml/product-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Jan 2022 11:14:28 GMT -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="" />
        <meta name="author" content="" />
        <meta name="robots" content="" />
        <meta name="description" content="" />
        <meta property="og:title" content="MediCo. - Doctor HTML Template" />
        <meta property="og:description" content="" />
        <meta property="og:image" content="" />
        <meta name="format-detection" content="telephone=no">

        <!-- FAVICONS ICON -->
         <link rel="icon" href="images/final.jpg" type="image/x-icon" />
        <link rel="shortcut icon" type="image/x-icon" href="images/final.jpg" />

        <!-- PAGE TITLE HERE -->
        <title>PHARMACIN - Order</title>

        <!-- MOBILE SPECIFIC -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--[if lt IE 9]>
        <script src="js/html5shiv.min.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->

        <!-- STYLESHEETS -->
        <link rel="stylesheet" type="text/css" href="css/plugins.min.css">
        <link rel="stylesheet" type="text/css" href="plugins/fontawesome/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="plugins/flaticon/flaticon.css">
        <link rel="stylesheet" type="text/css" href="plugins/themify/themify-icons.css">
        <link rel="stylesheet" type="text/css" href="css/style.min.css">
        <link class="skin" rel="stylesheet" type="text/css" href="css/skin/skin-1.css">
        <link rel="stylesheet" type="text/css" href="css/templete.min.css">
        <link rel="stylesheet" type="text/css" href="css/star-rating-svg.css">

        <style>
            @import url('https://fonts.googleapis.com/css?family=Hind:300,400,500,600,700|Lato:100,100i,300,300i,400,400i,700,700i,900,900i|Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|PT+Serif:400,400i,700,700i|Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Roboto+Slab:100,300,400,700|Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Rubik:300,300i,400,400i,500,500i,700,700i,900,900i');
        </style>

    </head>
    <body id="bg">
        <div id="loading-area"></div><div class="page-wraper">
            <!-- header -->
            <?php
            include './themepart/header.php';
            ?>
            <!-- header END -->
            <!-- Content -->
            <div class="page-content bg-white">
                <!-- inner page banner -->
                <div class="dez-bnr-inr overlay-black-middle" style="background-image:url(../admin/upload/posters/order.jpg);">
                    <div class="container" style="padding-left:80px;">
                        <div class="dez-bnr-inr-entry">
                            <h1 class="text-white">Orders</h1>
                        </div>
                    </div>
                </div>
                <!-- inner page banner END -->
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <div class="container">
                        <ul class="list-inline">
                            <li><a href="home.php">Home</a></li>
                            <li>Order</li>
                        </ul>
                    </div>
                </div>
                <!-- Breadcrumb row END -->
                <!-- contact area -->
                <div class="content-area">
                    <!-- Product details -->  
                    <?php
                    
                    while ($row = mysqli_fetch_array($orderq))
                    {
                        $qq = mysqli_query($connection, "SELECT
    `tbl_vendor`.`vendor_id`
    , `tbl_vendor`.`vendor_name`
    , `tbl_vendor`.`shop_name`
    , `tbl_product_vendor`.`pro_ven_id`
FROM
    `tbl_vendor`
    INNER JOIN `tbl_product_vendor` 
        ON (`tbl_vendor`.`vendor_id` = `tbl_product_vendor`.`vendor_id`) WHERE `tbl_product_vendor`.`pro_ven_id` = {$row['pro_ven_id']}");
                        $ordertotal = $row['pro_qty'] * $row['pro_price'];
                    
                        $dddata = mysqli_fetch_array($qq);
                       
                        
                        echo "<h3>Order ID : {$row['order_id']}</h3> "; 
                    echo "<div class='container woo-entry'>";
                    echo "<div class='row blog-post blog-md date-style-2'>";
                    echo "<div class='col-md-4 col-lg-4 m-b30'>";
                    echo "<img src='../admin/upload/product/{$row['pro_image']}' alt=''>";
                    echo "</div>";
                    echo "<div class='col-md-8 col-lg-8'>";
                    echo "<div class='dez-post-title'>";
                    echo "<h2 class='post-title'>{$row['pro_name']}</h2>";
                    echo "</div>";
                    echo "<h3 class='m-tb10'>₹ {$row['pro_ven_price']}</h3>";
                    echo "<table class='table table-bordered'>";
                    echo "<tr>";
                    echo "<th>Product Price</th>";
                    echo "<td>₹{$row['pro_ven_price']}</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<th>qty</th>";
                    echo "<td>{$row['pro_qty']}</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<th>Product Total</th>";
                    echo "<td>₹ $ordertotal  </td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<th>Vendor Name </th>";
                    echo "<td>{$dddata['vendor_name']}</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<th>Shop Name </th>";
                    echo "<td>{$dddata['shop_name']}</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<th>Order Status</th>";
                    echo "<td>{$row['status']}</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<th>Order Date</th>";
                    echo "<td>{$row['order_date']}</td>";
                    echo "</tr>";
                    echo "</table>";
                    echo "<a class='btn btn-danger site-button' style='width:200px;' href='cancel-order.php?odid={$row['details_id']}' role='button'>Cancel Order</a>";
                    echo "<a class='btn btn-danger site-button' style='width:200px;margin-left: 20px;' href='feedback.php?did={$row['details_id']}' role='button'>Give Feedback</a>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    }
                    ?>
                    <!-- Product details -->
                </div>
                <!-- contact area  END -->
            </div>
            <!-- Content END-->
            <!-- Footer -->
            <?php
            include './themepart/footer.php';
            ?>
            <!-- Footer END-->
            <button class="scroltop fa fa-chevron-up" ></button>
        </div>
        <!-- JavaScript  files ========================================= -->
        <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/combining.js"></script><!-- COMBINING JS  -->
        <script src="js/jquery.star-rating-svg.js"></script>
    </body>

    <!-- Mirrored from medico.dexignzone.com/xhtml/product-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Jan 2022 11:14:28 GMT -->
</html>
