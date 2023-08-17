<?php
session_start();
require './class/atclass.php';
if (!isset($_SESSION['adminid'])) {
    header("location:../user/admin-login.php");
}
if ($_POST) {
    $opass = $_POST['opass'];
    $npass = $_POST['npass'];
    $cnpass = $_POST['cnpass'];

    $oldpassq = mysqli_query($connection, "select admin_password from tbl_admin where admin_id='{$_SESSION['adminid']}'") or die(mysqli_error($connection));
    $oldpassdb = mysqli_fetch_array($oldpassq);
    //old password condition
    if ($oldpassdb['admin_password'] == $opass) {
        //new and confirm password condition
        if ($npass == $cnpass) {
            //old password and new password condition
            if ($opass == $npass) {
                echo "<script>alert('Old Password And New Password Must Be Different');window.location='change-password.php';</script>";
            } else {
                $updateq = mysqli_query($connection, "update tbl_admin set admin_password='{$npass}' where admin_id='{$_SESSION['adminid']}'") or die(mysqli_error($connection));
                if ($updateq) {
                    echo "<script>alert('Password Changed');window.location='Logout.php';</script>";
                }
            }
        } else {
            echo "<script>alert('New Password And Confirm Password Must Be Same');window.location='change-password.php';</script>";
        }
    } else {
        echo "<script>alert('Old password does not match');window.location='change-password.php';</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">


    <!-- Mirrored from medico.dexignzone.com/admin/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Dec 2021 10:57:29 GMT -->
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>PHARMACIN -  Change password </title>
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="upload/final.jpg">
        <link rel="stylesheet" href="vendor/jqvmap/css/jqvmap.min.css">
        <link rel="stylesheet" href="vendor/chartist/css/chartist.min.css">
        <link rel="stylesheet" href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css">
        <link rel="stylesheet" href="css/style.css">


    </head>
    <style>
        .error{
            color: red;
        }
    </style>
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
            <!--sidebar-->

            <?php
            include './themepart/Sidebar.php';
            ?>

            <!--**********************************
                Content body start
            ***********************************-->

            <div class="content-body" style="padding-left: 10px;">
                <div class="container-fluid">
                    <div class="row page-titles mx-0">
                        <div class="col-sm-6 p-md-0">
                            <div class="welcome-text">
                                <h4>Change Password</h4>
                            </div>
                        </div>
                        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Change Password</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- row --> <form method="post" enctype="multipart/form-data" id="myform">
                    <div class="form-group col-md-12">
                        <label style="margin-left:15px;">Current Password</label>
                        <input type="password" placeholder="" name="opass" class="form-control" style="width:97%;margin-left:12px;" value="" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label style="margin-left:15px;">New Password</label>
                        <input type="password" placeholder=""  name="npass" class="form-control" style="width:97%;margin-left:12px;" value="" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label style="margin-left:15px;">Confirm Password</label>
                        <input type="password" placeholder="" name="cnpass" class="form-control" style="width:97%;margin-left:12px;" value="" required>
                    </div>
                    <div style="padding-left:17px;"><button class="btn btn-primary" type="submit" > Change Password </button></div>
                </form>  
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

        <!-- Vectormap -->
        <script src="vendor/jqvmap/js/jquery.vmap.min.js"></script>
        <script src="vendor/jqvmap/js/jquery.vmap.world.js"></script>
        <script src="vendor/circle-progress/circle-progress.min.js"></script>
        <script src="vendor/chart.js/Chart.bundle.min.js"></script>
        <script src="vendor/gaugeJS/dist/gauge.min.js"></script>

        <!-- Chartist -->
        <script src="vendor/chartist/js/chartist.min.js"></script>
        <script src="vendor/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>

        <!-- Flot -->
        <script src="vendor/flot/jquery.flot.js"></script>
        <script src="vendor/flot/jquery.flot.resize.js"></script>
        <script src="vendor/flot-spline/jquery.flot.spline.min.js"></script>

        <!-- Counter Up -->
        <script src="vendor/waypoints/jquery.waypoints.min.js"></script>
        <script src="vendor/jquery.counterup/jquery.counterup.min.js"></script>

        <!-- Demo scripts -->
        <script src="js/dashboard/dashboard-2.js"></script>

        <!-- Svganimation scripts -->
        <script src="vendor/svganimation/vivus.min.js"></script>
        <script src="vendor/svganimation/svg.animation.js"></script>
        <script type="text/javascript" src="js/jquery.validate.js"></script>
        <script>
            $(document).ready(function () {
                $('#myform').validate();
            });
        </script>
    </body>

    <!-- Mirrored from medico.dexignzone.com/admin/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Dec 2021 10:57:33 GMT -->
</html>