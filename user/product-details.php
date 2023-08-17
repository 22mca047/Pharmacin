<?php
require './class/atclass.php';
 session_start();
$proid = $_GET['pid'];
$proq = mysqli_query($connection, "select * from tbl_product where pro_id='{$proid}'") or die(mysqli_error($connection));
$prorow = mysqli_fetch_array($proq);
$category = "SELECT
    `tbl_category`.`category_name`
    , `tbl_product`.`pro_name`
FROM
    `tbl_category`
    INNER JOIN `tbl_product` 
        ON (`tbl_category`.`category_id` = `tbl_product`.`category_id`) where pro_id='{$proid}';";
$catq = mysqli_query($connection, $category);
$catrow = mysqli_fetch_array($catq);
$company = "SELECT
    `tbl_company`.`company_name`
    , `tbl_company`.`company_logo`
    , `tbl_product`.`pro_id`
FROM
    `tbl_company`
    INNER JOIN `tbl_product` 
        ON (`tbl_company`.`company_id` = `tbl_product`.`company_id`) where pro_id='{$proid}';";
$comq = mysqli_query($connection, $company);
$comrow = mysqli_fetch_array($comq);

$sql1 = "SELECT
    `tbl_vendor`.`vendor_name`
    , `tbl_vendor`.`vendor_id`
    , `tbl_vendor`.`shop_name`
    , `tbl_product_vendor`.`pro_ven_price`
    , `tbl_product_vendor`.`pro_qty`
    , `tbl_product_vendor`.`pro_ven_id`
    , `tbl_area`.`area_pincode`
FROM
    `tbl_vendor`
    INNER JOIN `tbl_product_vendor` 
        ON (`tbl_vendor`.`vendor_id` = `tbl_product_vendor`.`vendor_id`)
    INNER JOIN `tbl_area` 
        ON (`tbl_vendor`.`area_id` = `tbl_area`.`area_id`) where pro_id='{$proid}' and is_blocked = 1 and is_verified = 1;";
$vendorproductq = mysqli_query($connection, $sql1);
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
        <title>PHARMACIN - Product-Details</title>

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
                <div class="dez-bnr-inr overlay-black-middle" style="background-image:url(../admin/upload/posters/shopbanner1.jpg);">
                    <div class="container">
                        <div class="dez-bnr-inr-entry">
                            <h1 class="text-white">Product Details</h1>
                        </div>
                    </div>
                </div>
                <!-- inner page banner END -->
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <div class="container">
                        <ul class="list-inline">
                            <li><a href="home.php">Home</a></li>
                            <li>Product Details</li>
                        </ul>
                    </div>
                </div>
                <!-- Breadcrumb row END -->
                <!-- contact area -->
                <div class="content-area">
                    <!-- Product details -->
                    <div class="container woo-entry">
                        <div class="row blog-post blog-md date-style-2">
                            <div class="col-md-4 col-lg-4 m-b30">
                                <?php
                                echo "<img src='../admin/upload/product/{$prorow['pro_image']}' alt=''>";
                                ?>
                            </div>
                            <div class="col-md-8 col-lg-8">
                                <div class="dez-post-title ">
                                    <h2 class="post-title"><?php echo "{$prorow['pro_name']}"; ?></h2>
                                </div>
                                <h3 class="m-tb10"><?php echo "₹ {$prorow['pro_price']}"; ?></h3>
                                <div class="dez-post-text">
                                    <p class="m-b10"><?php echo "{$prorow['pro_details']}"; ?></p>
                                </div>
                                <table class="table table-bordered" >
                                    <tr>
                                        <td>Pricing</td>
                                        <td><?php echo "₹ {$prorow['pro_price']}"; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Stock Availability</td>
                                        <td>AVAILABLE</td>
                                    </tr>
                                    <tr>
                                        <td>Manufacture By</td>
                                        <td><?php echo "{$comrow['company_name']} &nbsp; | &nbsp; <img src='../admin/upload/company-logo/{$comrow['company_logo']}' style='width:100px;height:60px;'> "; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div><!-- comment -->
                        <div><h3> <b>Sellers Near You :- </b></h3></div>
                        <table class="table table-bordered" style="text-align:center;">
                            <tr>
                                <th>Shop Name</th>
                                <th>Vendor Name</th>
                                <th>Area Pincode</th> 
                                <th>Product Price</th>
                                <th>Product Qty</th>
                                <th>Action</th>
                            </tr>
                            <script>
                                
                            </script>
                            <?php
                            while ($proven = mysqli_fetch_array($vendorproductq))
                            {
                                echo "<tr>
                                    <td>{$proven['shop_name']}</td>
                                    <td>{$proven['vendor_name']}</td>
                                    <td>{$proven['area_pincode']}</td>
                                    <td>{$proven['pro_ven_price']}</td>
                                    <td>{$proven['pro_qty']}</td>
                                    <td><form method='get' class='cart' action='add-to-cart-process.php' enctype='multipart/form-data'>
                                    <div class='quantity btn-quantity pull-left m-r10' >
                                        <input type='hidden' name='pro_id' value='{$proven['pro_ven_id']}'>
                                        <input type='hidden' name='vendorid' value='{$proven['vendor_id']}'>

                                        <div style='padding-left:20px;'><input id='demo_vertical2' type='number' value='1' name='demo_vertical2' min='1' max='{$proven['pro_qty']}'/>
                                        <input id='demo_vertical3' type='text' value='{$proven['pro_ven_price']}' hidden name='demo_vertical3'/>
                                    </div></div>
                                    <button type='submit' class='btn btn-primary site-button pull-left'><i class='fa fa-cart-plus'></i> Add To Cart</button>
                                </form>
                                </td>

                                </tr>";
                            }
                            ?>
                        </table>
                        <div class = "row">
                            <div class = "col-md-12">
                                <div class = "dez-tabs border-tp product-description bg-tabs">
                                    <ul class = "nav nav-tabs">
                                        <li class = "nav-item"><a class = "nav-link active" data-toggle = "tab" href = "#web-design-1"><i class = "fa fa-globe"></i><span class = "title-head">Description</span></a></li>
                                        <li class = "nav-item"><a class = "nav-link" data-toggle = "tab" href = "#graphic-design-1"><i class = "fa fa-photo"></i> <span class = "title-head">Additional Information</span></a></li>
                                    </ul>
                                    <div class = "tab-content">
                                        <div id = "web-design-1" class = "tab-pane active">
                                            <p class = "m-b10"><strong><em><?php echo "{$prorow['pro_name']}";
                            ?></em></strong><br>
                                                        <?php echo "{$prorow['pro_details']}"; ?></p>
                                        </div>
                                        <div id="graphic-design-1" class="tab-pane">
                                            <table class="table table-bordered" >
                                                <tr>
                                                    <td>Pricing</td>
                                                    <td><?php echo "₹ {$prorow['pro_price']}"; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Stock Availability</td>
                                                    <td>AVAILABLE</td>
                                                </tr>
                                                <tr>
                                                    <td>Manufacture By</td>
                                                    <td><?php echo "{$comrow['company_name']}"; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Company Logo</td>
                                                    <td><?php echo "<img src='../admin/upload/company-logo/{$comrow['company_logo']}' style='width:400px;height:250px;'> "; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
