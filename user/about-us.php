<?php
require './class/atclass.php';

$admin = mysqli_query($connection, "select * from tbl_admin") or die(mysqli_error($connection));
$sql="SELECT
    `tbl_feedback`.`feedback_ratings`
    , `tbl_feedback`.`feedback_id`
    , `tbl_feedback`.`feedback_date`
    , `tbl_feedback`.`feedback_details`
    , `tbl_customer`.`customer_name`
    , `tbl_customer`.`customer_image`
    , `tbl_vendor`.`shop_name`
FROM
    `tbl_orderdetails`
    INNER JOIN `tbl_feedback` 
        ON (`tbl_orderdetails`.`details_id` = `tbl_feedback`.`details_id`)
    INNER JOIN `tbl_ordermaster` 
        ON (`tbl_ordermaster`.`order_id` = `tbl_orderdetails`.`order_id`)
    INNER JOIN `tbl_customer` 
        ON (`tbl_customer`.`customer_id` = `tbl_ordermaster`.`customer_id`)
    INNER JOIN `tbl_product_vendor` 
        ON (`tbl_product_vendor`.`pro_ven_id` = `tbl_orderdetails`.`pro_ven_id`)
    INNER JOIN `tbl_vendor` 
        ON (`tbl_vendor`.`vendor_id` = `tbl_product_vendor`.`vendor_id`);;";
$feedback = mysqli_query($connection, $sql) or die(mysqli_error($connection));

?>
<!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from medico.dexignzone.com/xhtml/about-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Jan 2022 11:14:19 GMT -->
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
        <link rel="icon" type="image/png" sizes="16x16" href="./../admin/upload/final.jpg">

        <!-- PAGE TITLE HERE -->
        <title>PHARMACIN - About Us</title>

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

        <style>
            @import url('https://fonts.googleapis.com/css?family=Hind:300,400,500,600,700|Lato:100,100i,300,300i,400,400i,700,700i,900,900i|Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|PT+Serif:400,400i,700,700i|Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Roboto+Slab:100,300,400,700|Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Rubik:300,300i,400,400i,500,500i,700,700i,900,900i');
        </style>

    </head>
    <body id="bg">
        <div id="loading-area"></div><div class="page-wraper">
            <!-- header -->
            <header class="site-header header header-style-2 dark mo-left">
                <!-- main header -->
                <?php
                include './themepart/header.php';
                ?>
                <!-- main header END -->
            </header>
            <!-- header END -->
            <!-- Content -->
            <div class="page-content">
                <!-- inner page banner -->
                <div class="dez-bnr-inr overlay-black-middle" style="background-image:url(../admin/upload/posters/aboutus.jpg);">
                   
                </div>
                <!-- inner page banner END -->
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <div class="container">
                        <ul class="list-inline">
                            <li><a href="home.php">Home</a></li>
                            <li>About us</li>
                        </ul>
                    </div>
                </div>
                <!-- Breadcrumb row END -->
                <!-- contact area -->
                <div class="clearfix">
                    <!-- Our Awesome Services -->
                    <!-- Team member -->
                    <div class="section-full bg-white content-inner">
                        <div class="container">
                            <div class="section-head text-center ">
                                <h3 class="h3">Meet our Team</h3>
                                <div class="dez-separator bg-primary"></div>
                            </div>
                            <div class="section-content ">
                                <div class="row">
                                    <?php
                                    while ($admininfo = mysqli_fetch_array($admin)) {
                                        echo "<div class='col-lg-4 col-md-4 m-b30'>
                                    <div class='dez-box'>
                                    <div class='dez-media'><img src='../admin/upload/admin/{$admininfo['admin_image']}' style='height:500px;width:400px;align:center;' alt=''></div>
                                    <div class='dez-info p-a20 p-t40 border-1'>
                                        <div class='bg-primary skew-content-box'>
                                            <ul class='dez-social-icon'>
                                                <li>{$admininfo['admin_name']}</li>
                                            </ul>
                                        </div>
                                        <span><center><h2>Admin</h2></center></span>
                                     </div>
                                </div>
                            </div>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Team member -->
                    <!-- Testimonials -->
                    <div class="section-full bg-img-fix content-inner overlay-black-dark testimonials" style="background-image:url(images/background/bg3.jpg);">
                        <div class="container">
                            <div class="section-head text-center text-white">
                                <h3 class="h3">Feedback</h3>
                            </div>
                            <div class="section-content">
                                <div class="testimonial-five owl-carousel owl-none">
                                    <?php
                                    while ($row = mysqli_fetch_array($feedback)) {
                                        echo " <div class='item'>
                                        <div class='testimonial-6'>
                                           <div class='testimonial-text bg-white quote-left quote-right'>
                                                <p>{$row['feedback_details']}</p>
                                            </div>
                                            <div class='testimonial-detail clearfix bg-primary text-white'>
                                                <h4 class='testimonial-name m-tb0'>{$row['customer_name']}</h4>
                                                <span class='testimonial-position'>{$row['shop_name']}</span>
                                                <div class='testimonial-pic radius'><img src='../admin/upload/customer/{$row['customer_image']}' alt='' style='height:100px;width:140px;'></div>
                                            </div>
                                        </div>
                                    </div>
                                    ";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <!-- Testimonials End -->
                    <!-- Our Awesome Services END -->


                </div>
                <!-- contact area END -->
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
    </body>

    <!-- Mirrored from medico.dexignzone.com/xhtml/about-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Jan 2022 11:14:19 GMT -->
</html>
