<?php
session_start();
require './class/atclass.php';

$ecatid = $_GET['catid'];
if (!isset($_GET['catid']) || empty($_GET['catid'])) {
    header("location:manage-category.php");
}
$selectq = mysqli_query($connection, "select * from tbl_category where category_id='{$ecatid}'") or die(mysqli_error($connection));
$selectrow = mysqli_fetch_array($selectq);
$msg = "";
if ($_POST) {
    $catid = $_POST['catid'];
    $catname = mysqli_real_escape_string($connection, $_POST['catname']);

    $query = mysqli_query($connection, "update tbl_category set category_name ='{$catname}'  where category_id='{$catid}'") or die(mysqli_error($connection));
    if ($query) {
        echo "<script>alert('Record Updated');window.location='manage-category.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">


    <!-- Mirrored from medico.dexignzone.com/admin/add-patient.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Dec 2021 10:57:36 GMT -->
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>PHARMACIN  - Edit Category</title>
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="upload/final.jpg">
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

            <!--**********************************
                Nav header start
            ***********************************-->
            <div class="nav-header">
                <a href="index.html" class="brand-logo">
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
                                <h4>Edit Category</h4>

                            </div>
                        </div>
                        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="manage-category.php">Manage Category</a></li>
                                <li class="breadcrumb-item active">Edit Category</li>
                            </ol>
                        </div>
                    </div>
                    <div style="width: 100%">
<?php
echo $msg;
?>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-xxl-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Edit customer Info</h5>
                                </div>
                                <div class="card-body">
                                    <form action="#" method="post" enctype="multipart/form-data" id="myform">
                                        <div class="col-xs-12">
                                            <input type ="hidden" name="catid" value="<?php echo $selectrow['category_id'] ?>">
                                            <div class="form-group">
                                                <label class="form-label" for="add-name">Category Name</label>
                                                <input type="text" class="form-control" name="catname" required id="add-name" value="<?php echo $selectrow['category_name'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <button type="submit" class="btn btn-success" style="margin-left: -1px;margin-right: -11px;">Update
                                            </button>
                                            <button type="reset" class="btn btn-danger" style="margin-right: -12px;">Reset
                                            </button>
                                            <button type="button" onclick="window.location = 'customer-list.php'"; class="btn btn-info">view
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php
include './themepart/footer.php';
?>
        </div>

        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
      
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
   Support ticket button start
***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->

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
    <script type="text/javascript" src="js/jquery.validate.js"></script>
    <script>
                                                $(document).ready(function () {
                                                    $('#myform').validate();
                                                });
    </script>
</body>

<!-- Mirrored from medico.dexignzone.com/admin/add-patient.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Dec 2021 10:57:36 GMT -->
</html>
