<?php
require './class/atclass.php';
session_start();
$venid = $_GET['vid'];
$venq = mysqli_query($connection, "select * from tbl_vendor where vendor_id='{$venid}'") or die(mysqli_error($connection));
$venrow = mysqli_fetch_array($venq);

$sqli = "SELECT
    `tbl_product`.`pro_name`
    , `tbl_product_vendor`.`pro_ven_price`
    , `tbl_product_vendor`.`pro_qty`
    , `tbl_product`.`pro_image`
    , `tbl_product`.`pro_id`
    , `tbl_product`.`pro_price`
FROM
    `tbl_product`
    INNER JOIN `tbl_product_vendor` 
        ON (`tbl_product`.`pro_id` = `tbl_product_vendor`.`pro_id`) where vendor_id='{$venid}';";
$products = mysqli_query($connection, $sqli) or die(mysqli_error($connection));
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
        <title>PHARMACIN - Vendor Profile</title>

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
                <div class="dez-bnr-inr overlay-black-middle" style="background-image:url(../admin/upload/posters/vendor-profile.jpg);">
                    <div class="container">
                        <div class="dez-bnr-inr-entry" style="text-align:right;padding-right: 80px;">
                            <h1 class="text-white">Vendor Details</h1>
                        </div>
                    </div>
                </div>
                <!-- inner page banner END -->
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <div class="container">
                        <ul class="list-inline">
                            <li><a href="home.php">Home</a></li>
                            <li>Vendor Details</li>
                        </ul>
                    </div>
                </div>
                <!-- Breadcrumb row END -->
                <!-- contact area -->
                <div class="content-area">
                    <!-- Product details -->
                    <div class="content-body">
                        <div class="container-fluid">
                            <!-- row -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="profile">
                                        <div class="profile-head">
                                            <div class="profile-info">
                                                <div class="row justify-content-center">
                                                    <div class="col-xl-12">
                                                        <div class="row">         
                                                            <div class="col-xl-3 col-sm-3 border-right-1 prf-col">
                                                                <?php
                                                                echo "<img src='../admin/upload/vendor/{$venrow['vendor_photo']}' alt='' style='height:160px;width:202px;'>";
                                                                ?>
                                                            </div>
                                                            <div class="col-xl-3 col-sm-3 border-right-1 prf-col" style="padding-top:60px;">
                                                                <div class="profile-name">
                                                                    <p>Vendor Name</p>
                                                                    <h4 class="text-primary"><?php echo "{$venrow['vendor_name']}"; ?></h4>

                                                                </div>
                                                            </div>
                                                            <div class="col-xl-3 col-sm-3 border-right-1 prf-col" style="padding-top:60px;">
                                                                <div class="profile-email">

                                                                    <p >Shop Name</p>
                                                                    <h4 class="text-primary"><?php echo "{$venrow['shop_name']}"; ?></h4>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-3 col-sm-3 prf-col" style="padding-top:60px;">
                                                                <div class="profile-call">
                                                                    <p>Phone No</p>
                                                                    <h4 class="text-primary"><?php echo "{$venrow['vendor_mobileno']}"; ?></h4>

                                                                </div>
                                                            </div> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="profile-tab">
                                                <div class="custom-tab-1">

                                                    <div class="tab-content">
                                                        <div class="profile-personal-info">
                                                            <h4 class="text-primary mb-4">Personal Information</h4>
                                                            <div class="row mb-4">
                                                                <div class="col-3">
                                                                    <h5 class="f-w-500">Name <span class="pull-right">:</span>
                                                                    </h5>
                                                                </div>
                                                                <div class="col-9"><span><?php echo "{$venrow['vendor_name']}"; ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-4">
                                                                <div class="col-3">
                                                                    <h5 class="f-w-500">Shop Name <span class="pull-right">:</span></h5>
                                                                </div>
                                                                <div class="col-9"><span><?php echo "{$venrow['shop_name']}"; ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-4">
                                                                <div class="col-3">
                                                                    <h5 class="f-w-500">Email <span class="pull-right">:</span>
                                                                    </h5>
                                                                </div>
                                                                <div class="col-9"><span><a href="https://medico.dexignzone.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="24415c454954484164415c4549544841480a474b49"><?php echo "{$venrow['vendor_email']}"; ?></a></span>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-4">
                                                                <div class="col-3">
                                                                    <h5 class="f-w-500">Address<span class="pull-right">:</span></h5>
                                                                </div>
                                                                <div class="col-9"><span><?php echo "{$venrow['vendor_address']}"; ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-4">
                                                                <div class="col-3">
                                                                    <h5 class="f-w-500">Shop Timing <span class="pull-right">:</span>
                                                                    </h5>
                                                                </div>
                                                                <div class="col-9"><span><?php echo "{$venrow['shop_timing']}"; ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-4">
                                                                <div class="col-3">
                                                                    <h5 class="f-w-500">Details <span class="pull-right">:</span></h5>
                                                                </div>
                                                                <div class="col-9"><span><?php echo "{$venrow['vendor_details']}"; ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="container">
                                <div class="row">
                                    <?php
                                    while ($productrow = mysqli_fetch_array($products)) {
                                        echo "<div class='col-lg-3 col-md-6 col-sm-6 m-b30'>
                        <div class='dez-box p-a20 border-1 bg-gray'>
                            <div class='dez-thum-bx dez-img-overlay1 dez-img-effect zoom'> <img src='../admin/upload/product/{$productrow['pro_image']}' style='width:300px;height:250px;' alt=''>
                                <div class='overlay-bx'>
                                    <div class='overlay-icon'> <a href='javascript:void(0)'></a>
                                                               <a href='product-vendor-details.php?pid={$productrow['pro_id']}&vid={$_GET['vid']}'> <i class='fa fa-search icon-bx-xs'></i> </a>
                                                               <a href='javascript:void(0)'></a> </div>
                                </div>
                            </div>
                            <div class='dez-info p-t20 text-center'>
                                <h3 class='dez-title m-t0'><a href='product-vendor-details.php?pid={$productrow['pro_id']}&vid={$_GET['vid']}'>{$productrow['pro_name']}</a></h3>
                                <h5 class='m-b0'>₹ {$productrow['pro_ven_price']} &nbsp;<strike><small>₹ {$productrow['pro_price']}</small></strike></h5>
                                <a href='product-vendor-details.php?pid={$productrow['pro_id']}&vid={$_GET['vid']}' class='site-button  m-t15'>See More</a> </div>
                        </div>
                    </div>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--**********************
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
