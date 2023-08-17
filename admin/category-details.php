<?php
session_start();
require './class/atclass.php';

$categoryid = $_GET['eid'];
$proq = "SELECT * from tbl_product where category_id='{$categoryid}';";
$selectq = mysqli_query($connection, $proq) or die(mysqli_error($connection));
$catq = mysqli_query($connection, "select * from tbl_category where category_id='{$categoryid}'") or die(mysqli_error($connection));
$catarr = mysqli_fetch_array($catq);

?>
<!DOCTYPE html>
<html lang="en">


    <!-- Mirrored from medico.dexignzone.com/admin/all-patients.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Dec 2021 10:57:34 GMT -->
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>PHARMACIN - Category Details</title>
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
            ?>
            <!--**********************************
                Sidebar start
            ***********************************-->
            <?php
            include './themepart/Sidebar.php';
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
                                <h4>Category Name :
                                    <?php
                                    echo "{$catarr['category_name']}";
                                    ?>
                                </h4>
                            </div>
                        </div>
                        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="manage-category.php">Manage Category</a></li>
                                <li class="breadcrumb-item active">Category Prodcuts</li>
                            </ol>
                        </div>
                    </div>

                    <div class="row">
                       <?php
                    while ($catproduct = mysqli_fetch_array($selectq))
                    {
                        echo "<div class='col-md-6 col-lg-6 col-sm-6 m-b30'  style='padding:15px;'>
                        <div class='dez-box'style='outline: 2px solid black; box-shadow: 0px 0px 15px 5px black;'><br>
                            <div class='dez-media'><center><img src='../admin/upload/product/{$catproduct['pro_image']}' alt='' style='width:250px;height:200px;'></center></div>
                            <div class='dez-info p-a30 border-1'>
                                <center><h4 class='dez-title m-t0'>{$catproduct['pro_name']}</h4></center>
                                <center><p>₹ {$catproduct['pro_price']}</p></center>
                                 <div class='buttons-coll'><center><a href='product-details.php?eid={$catproduct['pro_id']}' class='site-button custom-btn btn-5'><span>Read More</span></a></center></div></div><br>
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