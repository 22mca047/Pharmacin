<?php
session_start();
require './class/atclass.php';
$editpro = $_GET['eid'];
if (!isset($_GET['eid']) || empty($_GET['eid'])) {
    header("location:manage-product.php");
}
$selectq = mysqli_query($connection, "select * from tbl_product_vendor where pro_ven_id='{$editpro}'") or die(mysqli_error($connection));
$selectrow = mysqli_fetch_array($selectq);
$msg = "";
if ($_POST) {
    $id = $_POST['id'];
    $pn = mysqli_real_escape_string($connection, $_POST['pn']);
    $pp = mysqli_real_escape_string($connection, $_POST['pp']);
    $pq = mysqli_real_escape_string($connection, $_POST['pq']);
    $query = mysqli_query($connection, "update tbl_product_vendor set pro_id ='{$pn}',pro_ven_price='{$pp}',pro_qty ='{$pq}' where pro_ven_id='{$id}'") or die(mysqli_error($connection));
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
        <link rel="icon" type="image/png" sizes="16x16" href="./../admin/upload/final.jpg">
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
            include './themepart/sidebar.php';
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
                                            <input type="hidden" name="id" value="<?php echo $selectrow['pro_ven_id'] ?>" >
                                            <div class="form-group">
                                                <label class="form-label" for="add-name" required>Product Name</label>
                                                <?php
                                                $pro = mysqli_query($connection, "select * from  tbl_product") or die(mysqli_error($connection));
                                                echo "<select name='pn' class='form-control'>";
                                                while ($row = mysqli_fetch_array($pro)) {
                                                    echo "<option value='{$row['pro_id']}'>{$row['pro_name']}</option>";
                                                }
                                                echo "</select>";
                                                ?>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="add-date">Product Price</label>
                                                <input type="number" id="add-price" required class="form-control" value="<?php echo $selectrow['pro_ven_price'] ?>" name="pp">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="add-brief">Product Qty</label>
                                                <textarea class="form-control" cols="5" required id="add-brief" name="pq"><?php echo $selectrow['pro_qty'] ?></textarea>
                                            </div>

                                        </div>
                                </div>
                                <div class="col-xs-12" style="padding-bottom: 25px;padding-left: 27px">
                                    <button type="submit" class="btn btn-success">Update Product</button> 
                                    <button type="reset" class="btn btn-danger" style="margin-left: 13px">Reset</button> 
                                    <button type="button" style="margin-left: 13px" onclick="window.location = 'manage-product.php';" class="btn btn-info">View</button>
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