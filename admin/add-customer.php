<?php
session_start();
require './class/atclass.php';

$msg = "";
if (isset($_POST['submit'])) {
    $cname = mysqli_real_escape_string($connection, $_POST['cname']);
    $cgender = mysqli_real_escape_string($connection, $_POST['cgender']);
    $cdob = mysqli_real_escape_string($connection, $_POST['cdob']);
    $cuimage = $_FILES['cimage']['name'];
    $cmobileno = mysqli_real_escape_string($connection, $_POST['cmobileno']);
    $caddress = mysqli_real_escape_string($connection, $_POST['caddress']);
    $cemail = mysqli_real_escape_string($connection, $_POST['cemail']);
    $cpassword = mysqli_real_escape_string($connection, $_POST['cpassword']);
    $ccpassword = mysqli_real_escape_string($connection, $_POST['cconfirmpassword']);
    $carea = mysqli_real_escape_string($connection, $_POST['carea']);
    move_uploaded_file($_FILES['cimage']['tmp_name'],"upload/customer/". $cuimage);
    if($cpassword == $ccpassword)
    {
        $query = mysqli_query($connection, "insert into tbl_customer (customer_name,customer_gender,customer_dob,customer_image,customer_mobileno,customer_address,customer_email,customer_password,area_id) values('{$cname}','{$cgender}','{$cdob}','{$cuimage}','{$cmobileno}','{$caddress}','{$cemail}','{$cpassword}','{$carea}')") or die(mysqli_error($connection));
    }
    else
    {
        echo "<script>alert('Password And Conform Password Must Be Same..');window.location='add-customer.php';</script>";
    }
    if ($query) {
        $msg = '<div class="alert alert-success" role="alert">
            Customer added Successfully
            </div>';
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
        <title>PHARMACIN - Add Customer</title>
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
                                <h4>Add Customer</h4>
                            </div>
                        </div>
                        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="customer-list.php">Customer List</a></li>
                                <li class="breadcrumb-item active">Add Customer</li>
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
                                    <h5 class="card-title">Add Customer Info</h5>
                                </div>
                                <div class="card-body">
                                    <form action="#" method="post" enctype="multipart/form-data" id="myform">
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                <label class="form-label" for="add-name">Customer Name</label>
                                                <input type="text" class="form-control" name="cname" id="add-name" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="add-gender" required>Gender</label>
                                                <select class="form-control" name="cgender">
                                                    <option></option>
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                    <option>Other</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="add-date">Date of Birth</label>
                                                <input type="date" name="cdob" id="add-date" required class="form-control datepicker" data-format="mm/dd/yyyy" value="">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="add-profile">Customer Image</label>
                                                <input type="file" class="form-control" required name="cimage" id="add-profile">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="add-date">Mobile No</label>
                                                <input type="number" name="cmobileno" id="add-mobileno" required class="form-control datepicker" data-format="mm/dd/yyyy" value="">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="add-brief">Address</label>
                                                <textarea class="form-control" name="caddress" required cols="5" id="add-address"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="add-date">Email</label>
                                                <input type="email" name="cemail" id="add-email" required class="form-control datepicker" data-format="mm/dd/yyyy" value="">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="add-date">Password</label>
                                                <input type="password" name="cpassword" id="add-password" required class="form-control datepicker" data-format="mm/dd/yyyy" value="">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="add-date">Confirm Password</label>
                                                <input type="password" name="cconfirmpassword" id="add-password" required class="form-control datepicker" data-format="mm/dd/yyyy" value="">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="add-date" required>Area ID</label>
                                                  <?php
                                                $areaq = mysqli_query($connection, "select * from  tbl_area") or die(mysqli_error($connection));
                                               echo "<select name='carea' class='form-control'>";
                                                while($row = mysqli_fetch_array($areaq)){
                                                    echo "<option value='{$row['area_id']}'>{$row['area_name']} :- {$row['area_pincode']}</option>";
                                                }
                                               echo "</select>"; 
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <button type="submit" name="submit" class="btn btn-success" style="margin-left: -1px;margin-right: -11px;">Add Customer</button> 
                                            <button type="reset" class="btn btn-danger" style="margin-right: -12px;">Reset</button> 
                                            <button type="button" onclick="window.location = 'customer-list.php';" class="btn btn-info">View</button>
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