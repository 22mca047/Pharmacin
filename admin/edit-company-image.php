<?php
session_start();
require './class/atclass.php';

$editcomi = $_GET['eiid'];
if (!isset($_GET['eiid']) || empty($_GET['eiid'])) {
    header("location:manage-company.php");
}
$selectq = mysqli_query($connection, "select * from tbl_company where company_id='{$editcomi}'") or die(mysqli_error($connection));
$selectrow = mysqli_fetch_array($selectq);
$msg = "";
if (isset($_POST['btnphoto']))
{
        $cimage = $_FILES['clogo']['name'];
     move_uploaded_file($_FILES['clogo']['tmp_name'],"./upload/company-logo/".$cimage);
   
     $query = mysqli_query($connection, "update tbl_company set company_logo ='{$cimage}' where company_id='{$editcomi}'") or die(mysqli_error($connection));
    if ($query) {
        echo "<script>alert('Photo Updated Successfully');window.location='manage-company.php';</script>";
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
        <title>PHARMACIN - Edit Company</title>
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

            <?php
            include './themepart/header.php';
            include './themepart/Sidebar.php';
            ?>	
            <!--**********************************
                Content body start
            ***********************************-->
            <div class="content-body">
                <!-- row -->
                <div class="container-fluid">

                    <div class="row page-titles mx-0">
                        <div class="col-sm-6 p-md-0">
                            <div class="welcome-text">
                                <h4>Edit Company Image</h4>
                            </div>
                        </div>
                        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="manage-company.php">Manage Company</a></li>
                                <li class="breadcrumb-item active">Edit Company Image</li>
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
                                    <h5 class="card-title">Edit Company Image</h5>
                                </div>
                                <div class="card-body">
                                    <form action="#" method="post" enctype="multipart/form-data" id="myform">
                                        <div class="col-xs-12">
                                            <input type="hidden" name="id" value="<?php echo $selectrow['company_id']; ?>">
                                            <div class="form-group">
                                                <label class="form-label" for="add-name">Company Logo</label>
                                                <input type="file" class="form-control" required id="company-logo"  name="clogo">
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <button type="submit"  name ="btnphoto" class="btn btn-success" style="margin-left: -1px;margin-right: -11px;">Update Company Image</button> 
                                            <button type="reset" class="btn btn-danger" style="margin-right: -12px;">Reset</button> 
                                            <button type="button" onclick="window.location = 'manage-company.php';" class="btn btn-info">View</button>
                                        </div>
                                    </form>
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