<?php
session_start();
require './class/atclass.php';

$editvid=$_GET['vid'];
if(!isset($_GET['vid']) || empty($_GET['vid']))
{
    header("location:vendor-list.php");
}
$selectq = mysqli_query($connection, "select * from tbl_vendor where vendor_id='{$editvid}'") or die(mysqli_error($connection));
$selectrow = mysqli_fetch_array($selectq);
$msg="";
if($_POST)
{
    $id = $_POST['id'];
    $vname = mysqli_real_escape_string($connection, $_POST['vendorname']);
    $vphone = mysqli_real_escape_string($connection, $_POST['vendorphone']);
    $vaddress = mysqli_real_escape_string($connection, $_POST['vendoraddress']);
    $vdetails = mysqli_real_escape_string($connection, $_POST['vendordetails']);
    $vsname = mysqli_real_escape_string($connection, $_POST['vendorshopname']);
    $vstime = mysqli_real_escape_string($connection, $_POST['vendorshoptime']);
    $vareaid = mysqli_real_escape_string($connection, $_POST['vendorareaid']);
    $vemail = mysqli_real_escape_string($connection, $_POST['vendoremail']);
    $vpassword = mysqli_real_escape_string($connection, $_POST['vendorps']);
    
$query = mysqli_query($connection, "update tbl_vendor set vendor_name ='{$vname}',vendor_mobileno='{$vphone}',vendor_address='{$vaddress}',vendor_details ='{$vdetails}',vendor_email='{$vemail}',vendor_password='{$vpassword}',shop_name='{$vsname}',shop_timing='{$vstime}',area_id='{$vareaid}' where vendor_id='{$id}'") or die(mysqli_error($connection));
if($query)
{
  echo "<script>alert('Record Updated');window.location='vendor-list.php';</script>";
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
        <title>PHARMACIN - Edit Vendor</title>
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
                                <h4>Edit Vendor</h4>
                            </div>
                        </div>
                        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="vendor-list.php">Vendor List</a></li>
                                <li class="breadcrumb-item active">Edit Vendor</li>
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
                                    <h5 class="card-title">Edit Vendor Details</h5>
                                </div>
                                <div class="card-body">
                                    <form action="#" method="post" enctype="multipart/form-data" id="myform">
                                        <div class="col-xs-12">
                                           <input type="hidden" name="id" value="<?php echo $selectrow['vendor_id'] ?>" >
                                            <div class="form-group">
                                                <label class="form-label" for="add-name">Name</label>
                                                <input type="text" class="form-control" id="add-name" name="vendorname" value="<?php echo $selectrow['vendor_name'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="add-phone">Phone</label>
                                                <input type="number" class="form-control" id="add-phone" name="vendorphone" data-mask="phone" value="<?php echo $selectrow['vendor_mobileno'] ?>" required="">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="add-brief">Address</label>
                                                <textarea class="form-control" cols="5" id="add-address" name="vendoraddress" required><?php echo $selectrow['vendor_address'] ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="add-brief">Details</label>
                                                <textarea class="form-control" required cols="5" id="add-brief" name="vendordetails"><?php echo $selectrow['vendor_details'] ?></textarea>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="form-label" for="shop-name">Shop Name</label>
                                                <input type="text" class="form-control" id="shop-name" name="vendorshopname" value="<?php echo $selectrow['shop_name'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="add-name">Shop Timing</label>
                                                <input type="text" class="form-control" id="shop-time" name="vendorshoptime" value="<?php echo $selectrow['shop_timing'] ?>" required>
                                            </div>
                                            
                                             <div class="form-group">
                                                <label class="form-label" for="add-name" required>Area Id</label>
                                                <?php
                                                $areaq = mysqli_query($connection, "select * from  tbl_area") or die(mysqli_error($connection));
                                               echo "<select name='vendorareaid' class='form-control'>";
                                                while($row = mysqli_fetch_array($areaq))
                                                {
                                                    echo "<option value='{$row['area_id']}'>{$row['area_name']} :- {$row['area_pincode']}</option>";
                                                }
                                               echo "</select>"; 
                                                ?>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="add-email">Email</label>
                                                <input type="email" class="form-control" id="add-email" required name="vendoremail" value="<?php echo $selectrow['vendor_email'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="add-password">Password</label>
                                                <input type="password" class="form-control" id="add-password" required name="vendorps" value="<?php echo $selectrow['vendor_password'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="add-con-password">Confirm Password</label>
                                                <input type="password" class="form-control" id="add-con-password" name="vendorcps" value="<?php echo $selectrow['vendor_password'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <button type="submit" class="btn btn-success" style="margin-left: -1px;margin-right: -11px;">Update Details</button> 
                                            <button type="reset" class="btn btn-danger" style="margin-right: -12px;">Reset</button> 
                                            <button type="button" onclick="window.location = 'vendor-list.php';" class="btn btn-info">View</button>
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

</html>