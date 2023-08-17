<?php
session_start();
require './class/atclass.php';

$editpro = $_GET['eid'];
if (!isset($_GET['eid']) || empty($_GET['eid'])) {
    header("location:manage-product.php");
}
$selectq = mysqli_query($connection, "select * from tbl_product where pro_id='{$editpro}'") or die(mysqli_error($connection));
$selectrow = mysqli_fetch_array($selectq);
$msg = "";
if ($_POST) {
    $id = $_POST['id'];
    $pn = mysqli_real_escape_string($connection, $_POST['pn']);
    $pp = mysqli_real_escape_string($connection, $_POST['pp']);
    $pd = mysqli_real_escape_string($connection, $_POST['pd']);
    $ci = mysqli_real_escape_string($connection, $_POST['ci']);
    $cati = mysqli_real_escape_string($connection, $_POST['cati']);

    $query = mysqli_query($connection, "update tbl_product set pro_name ='{$pn}',pro_price='{$pp}',pro_details ='{$pd}',company_id='{$ci}',category_id='{$cati}' where pro_id='{$id}'") or die(mysqli_error($connection));
    if ($query) {
        echo "<script>alert('Record Updated');window.location='manage-product.php';</script>";
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
        <title>PHARMACIN - Edit Product</title>
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
                                <h4>Edit Product</h4>
                            </div>
                        </div>
                        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="manage-product.php">Manage Product</a></li>
                                <li class="breadcrumb-item active">Edit Product</li>
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
                                    <h5 class="card-title">Edit Product Info</h5>
                                </div>
                                <div class="card-body">
                                    <form action="#" method="post" enctype="multipart/form-data" id="myform">
                                        <div class="col-xs-12">
                                            <input type="hidden" name="id" value="<?php echo $selectrow['pro_id'] ?>" >
                                            <div class="form-group">
                                                <label class="form-label" for="add-name">Product Name</label>
                                                <input type="text" class="form-control" required  id="add-name" value="<?php echo $selectrow['pro_name'] ?>" name="pn">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="add-date">Product Price</label>
                                                <input type="number" id="add-price" class="form-control" required value="<?php echo $selectrow['pro_price'] ?>" name="pp">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="add-brief">Product Details</label>
                                                <textarea class="form-control" cols="5" id="add-brief" required name="pd"><?php echo $selectrow['pro_details'] ?></textarea>
                                            </div>
                                           
                                            <div class="form-group">
                                                <label class="form-label" for="add-name" required>Company Id</label>        
<?php
$comq = mysqli_query($connection, "select * from  tbl_company") or die(mysqli_error($connection));
echo "<select name='ci' class='form-control'>";
while ($row = mysqli_fetch_array($comq)) {
    echo "<option value='{$row['company_id']}'>{$row['company_id']} :- {$row['company_name']}</option>";
}
echo "</select>";
?>
                                            </div><!-- comment -->
                                            <div class="form-group">
                                                <label class="form-label" for="add-name" required>Category Id</label>
<?php
$catq = mysqli_query($connection, "select * from  tbl_category") or die(mysqli_error($connection));
echo "<select name='cati' class='form-control'>";
while ($row = mysqli_fetch_array($catq)) {
    echo "<option value='{$row['category_id']}'>{$row['category_id']} :- {$row['category_name']}</option>";
}
echo "</select>";
?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <button type="submit" class="btn btn-success" style="margin-left: -1px;margin-right: -11px;">Update Product</button> 
                                            <button type="reset" class="btn btn-danger" style="margin-right: -12px;">Reset</button> 
                                            <button type="button" onclick="window.location = 'manage-product.php';" class="btn btn-info">View</button>
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