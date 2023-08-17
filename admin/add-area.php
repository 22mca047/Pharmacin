<?php
session_start();
require './class/atclass.php';

$msg = "";

if ($_POST) {

    $aname = $_POST['aname'];
    $apincode = $_POST['apincode'];

    $query = mysqli_query($connection, " insert into tbl_area(area_name,area_pincode) values('{$aname}','{$apincode}')") or die(mysqli_error($connection));

    if ($query) {
        $msg = '<div class="alert alert-success" role="alert">
        Area Added Successfully
        </div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">


    <!-- Mirrored from medico.dexignzone.com/admin/table-datatable-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Dec 2021 10:57:49 GMT -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>PHARMACIN - Add-Area </title>
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="upload/final.jpg">
       <!-- Datatable -->
        <link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
        <!-- Custom Stylesheet -->
        <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">

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
                <div class="container-fluid">
                    <div class="row page-titles mx-0">
                        <div class="col-sm-6 p-md-0">
                            <div class="welcome-text">
                                <h4>Add Area</h4>
                            </div>

                        </div>
                        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item "><a href="manage-area.php">Manage Area</a></li>
                                <li class="breadcrumb-item ">Add Area</a></li>
                            </ol>
                        </div>
                    </div>
                    <!-- row -->
<?php
echo $msg;
?>

                    <div class="row">
                        <div class="col-xl-12 col-xxl-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Area Info</h5>
                                </div>
                                <div class="card-body">
                                    <form action="#" method="post" enctype="multipart/form-data" id="myform">
                                        <div class="col-xs-12">

                                            <div class="form-group">
                                                <label class="form-label" for="add-name">Area Name</label>
                                                <input type="text" class="form-control" id="area-name" name="aname" placeholder="Enter Area Name" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="add-name">Area Pincode</label>
                                                <input type="number" class="form-control" id="area-pincode" name="apincode" placeholder="Ex : 380051" required>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <button type="submit" class="btn btn-success" style="margin-left: -1px;margin-right: -11px;">Add Area</button>
                                            <button type="reset" class="btn btn-danger" style="margin-right: -12px;">Reset</button>
                                            <button type="button" class="btn btn-info" onclick="window.window.location = 'manage-area.php'">View</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div>		
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
                    <script type="text/javascript" src="js/jquery.validate.js"></script>
    <script>
        $(document).ready(function () {
            $('#myform').validate();
        });
    </script>
                </body>
                <!-- Mirrored from medico.dexignzone.com/admin/table-datatable-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Dec 2021 10:57:49 GMT -->
 </html>

