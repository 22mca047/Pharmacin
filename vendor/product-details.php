<?php
session_start();
require './class/atclass.php';
$proid = $_GET['eid'];
$sql12 = "SELECT
    `tbl_product`.`pro_image`
    , `tbl_product`.`pro_name`
    , `tbl_product_vendor`.`pro_ven_price`
    , `tbl_product`.`pro_details`
FROM
    `tbl_product`
    INNER JOIN `tbl_product_vendor` 
        ON (`tbl_product`.`pro_id` = `tbl_product_vendor`.`pro_id`) where `tbl_product_vendor`.`pro_ven_id`='{$proid}';";
$proq = mysqli_query($connection, $sql12) or die(mysqli_error($connection));
$prorow = mysqli_fetch_array($proq);
$category = "SELECT
    `tbl_category`.`category_name`
    , `tbl_product`.`pro_name`
    , `tbl_product`.`pro_id`
    , `tbl_product_vendor`.`pro_ven_id`
FROM
    `tbl_product`
    INNER JOIN `tbl_product_vendor` 
        ON (`tbl_product`.`pro_id` = `tbl_product_vendor`.`pro_id`)
    INNER JOIN `tbl_category` 
        ON (`tbl_category`.`category_id` = `tbl_product`.`category_id`) WHERE `tbl_product_vendor`.`pro_ven_id`='{$proid}';";
$catq = mysqli_query($connection, $category);
$catrow = mysqli_fetch_array($catq);
$company = "SELECT
    `tbl_company`.`company_name`
    , `tbl_company`.`company_logo`
    , `tbl_product`.`pro_id`
    , `tbl_product_vendor`.`pro_ven_id`
FROM
    `tbl_product`
    INNER JOIN `tbl_product_vendor` 
        ON (`tbl_product`.`pro_id` = `tbl_product_vendor`.`pro_id`)
    INNER JOIN `tbl_company` 
        ON (`tbl_company`.`company_id` = `tbl_product`.`company_id`) WHERE `tbl_product_vendor`.`pro_ven_id`='{$proid}';";
$comq = mysqli_query($connection, $company);
$comrow = mysqli_fetch_array($comq);

$sql1 = "SELECT
    `tbl_vendor`.`vendor_name`
    , `tbl_vendor`.`shop_name`
    , `tbl_product_vendor`.`pro_ven_price`
    , `tbl_product_vendor`.`pro_qty`
    , `tbl_area`.`area_pincode`
FROM
    `tbl_vendor`
    INNER JOIN `tbl_product_vendor` 
        ON (`tbl_vendor`.`vendor_id` = `tbl_product_vendor`.`vendor_id`)
    INNER JOIN `tbl_area` 
        ON (`tbl_vendor`.`area_id` = `tbl_area`.`area_id`) where `tbl_product_vendor`.`pro_ven_id`='{$proid}';";
$vendorproductq = mysqli_query($connection, $sql1);
$proprice = mysqli_fetch_array($vendorproductq);
?>
<!DOCTYPE html>
<html lang="en">


    <!-- Mirrored from medico.dexignzone.com/admin/table-datatable-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Dec 2021 10:57:49 GMT -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>PHARMACIN - Product Details</title>
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
                <a href="#" class="brand-logo">
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
                                <h4>Product Details</h4>
                            </div>
                        </div>
                        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="manage-product.php">Manage-Product</a></li>
                                <li class="breadcrumb-item active">Product-details</li> 
                            </ol>
                        </div>
                    </div>
                    <!-- row -->


                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
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
                                <h3 class="m-tb10"><?php echo "₹ {$proprice['pro_ven_price']}"; ?></h3>
                                <div class="dez-post-text">
                                    <p class="m-b10"><?php echo "{$prorow['pro_details']}"; ?></p>
                                </div>
                                <table class="table table-bordered" >
                                    <tr>
                                        <td>Pricing</td>
                                        <td><?php echo "₹ {$proprice['pro_ven_price']}"; ?></td>
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
                        </div><br/><br/>
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
                                                    <td><?php echo "₹ {$proprice['pro_ven_price']}"; ?></td>
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
                        <br/><br/><br/>
                    </div>
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

