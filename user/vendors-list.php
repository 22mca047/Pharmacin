<?php
require './class/atclass.php';
session_start();

if (isset($_GET['carea'])) {
    $pin = $_GET['carea'];
    $vendor = mysqli_query($connection, "select * from tbl_vendor where area_id like '%$pin%' and is_blocked = 1 and is_verified = 1") or die(mysqli_error($connection));
} else {

    $vendor = mysqli_query($connection, "select * from tbl_vendor where is_blocked = 1 and is_verified = 1 ") or die(mysqli_error($connection));
}
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
        <title>PHARMACIN - Vendor List</title>

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
                <div class="dez-bnr-inr overlay-black-middle" style="background-image:url(../admin/upload/posters/vendordetailsposter.jpg);">
                    <div class="container">
                        <div class="dez-bnr-inr-entry">
                            <h1 class="text-white" style="padding-top:180px; padding-left:220px;">Vendor List</h1>
                        </div>
                    </div>
                </div>
                <!-- inner page banner END -->
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <div class="container">
                        <ul class="list-inline">
                            <li><a href="home.php">Home</a></li>
                            <li>Vendor List</li>
                        </ul>
                    </div>
                </div><br>
                <div>
                    <?php
                    $areaq = mysqli_query($connection, "select * from  tbl_area") or die(mysqli_error($connection));
                    echo "<form method='get'>";
                    echo "<table style='background-color: gainsboro;'>";
                    echo "<tr>";
                    echo "<td width='10%' style='padding-left:50px;'><b>Select Area</b></td>";
                    echo "<td width='30%'>";
                    echo "<select name='carea' class='form-control'>";
                    while ($row = mysqli_fetch_array($areaq)) {
                        echo "<option value='{$row['area_id']}'>{$row['area_name']} :- {$row['area_pincode']}</option>";
                    }
                    echo "</select>";
                    echo "</td>";
                    echo "<td><div class='extra-cell'>
                        <button id='quik-search-btn' type='submit' class='site-button' value='submit'><i class='fa fa-search'></i></button>
                    </div>";
                    echo "</tr>";
                    echo "</table>";
                    echo "</form>";
                    ?>
                </div>
                <!-- Breadcrumb row END -->
                <!-- contact area -->
                <div class="content-area" style="padding-top: 15px;">
                    <!-- Product details -->
                    <div class="container woo-entry">
                        <div class="row blog-post blog-md date-style-2">
                            <?php
                            while ($venlist = mysqli_fetch_array($vendor)) {
                                echo
                                "<div class = 'col-xl-3 col-lg-4 col-md-6' style='margin-bottom:20px;'>
                                <div class = 'card'>
                                <table>
                                    <tr>
                                        <td colspan='2'><div class = 'text-center overlay-box profile-photo'> <img src='../admin/upload/vendor-shop/{$venlist['shop_image']}' style='width:300px;height:250px;padding-top:20px;padding-bottom:20px;' alt=''></td>
                                     </tr>
                                     <tr>
                                        <td>Name :-</td>
                                        <td>{$venlist['vendor_name']}</td>
                                     </tr>
                                      <tr>
                                        <td>Shop Name :-</td>
                                        <td>{$venlist['shop_name']}</td>
                                     </tr>
                                      <tr>
                                        <td colspan='2'><a href='vendor-profile.php?vid={$venlist['vendor_id']}' class = 'm-0 text-white btn btn-primary btn-lg btn-block'>View Profile</td>
                                     </tr>
                                 </table>
                                 </div>
                                 </div>
                                ";
                            }
                            ?>
                            <!-- comment -->
                        </div>
                        <!-- Product details -->
                    </div>
                    <!-- contact area  END -->
                </div>
                <!-- Content END-->
                <!-- Footer -->
                
                <!-- Footer END-->
                <button class="scroltop fa fa-chevron-up" ></button>
            </div>
            <?php
                include './themepart/footer.php';
                ?>
            <!-- JavaScript  files ========================================= -->
            <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/combining.js"></script><!-- COMBINING JS  -->
            <script src="js/jquery.star-rating-svg.js"></script>
    </body>

    <!-- Mirrored from medico.dexignzone.com/xhtml/product-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Jan 2022 11:14:28 GMT -->
</html>
