<?php
session_start();
require './class/atclass.php';
$selectq = mysqli_query($connection, "select * from tbl_vendor where vendor_id='{$_SESSION['vi']}'") or die(mysqli_error($connection));
$selectrow = mysqli_fetch_array($selectq);
if (isset($_POST['btn'])) {
    $vname = mysqli_real_escape_string($connection, $_POST['vendorname']);
    $vphone = mysqli_real_escape_string($connection, $_POST['vendorphone']);
    $vaddress = mysqli_real_escape_string($connection, $_POST['vendoraddress']);
    $vdetails = mysqli_real_escape_string($connection, $_POST['vendordetails']);
    
    $vsname = mysqli_real_escape_string($connection, $_POST['vendorshopname']);
    $vstime = mysqli_real_escape_string($connection, $_POST['vendorshoptime']);
    
    $vemail = mysqli_real_escape_string($connection, $_POST['vendoremail']);
    $carea = mysqli_real_escape_string($connection, $_POST['carea']);
    $query = mysqli_query($connection, "update tbl_vendor set vendor_name ='{$vname}',vendor_mobileno='{$vphone}',vendor_address='{$vaddress}',vendor_details ='{$vdetails}',vendor_email='{$vemail}',shop_name='{$vsname}',shop_timing='{$vstime}',area_id='{$carea}' where vendor_id='{$_SESSION['vi']}'") or die(mysqli_error($connection));
    if ($query) {
        echo "<script>alert('Profile Updated Successfully');window.location='vendor-profile.php';</script>";
    }
}
if (isset($_POST['btnphoto'])) {
     $vimage = $_FILES['vimage']['name'];
     $vsimage = $_FILES['vsimage']['name'];
     move_uploaded_file($_FILES['vimage']['tmp_name'],"../admin/upload/vendor/". $vimage);
      move_uploaded_file($_FILES['vsimage']['tmp_name'],"../admin/upload/vendor-shop/". $vsimage);
   
     $query = mysqli_query($connection, "update tbl_vendor set vendor_photo ='{$vimage}',shop_image='{$vsimage}' where vendor_id='{$_SESSION['vi']}'") or die(mysqli_error($connection));
    if ($query) {
        echo "<script>alert('Photos Updated Successfully');window.location='vendor-profile.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <!-- Mirrored from medico.dexignzone.com/admin/app-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Dec 2021 10:57:26 GMT -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>PHARMACIN - Vendor Profile</title>
        <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../admin/upload/final.jpg">
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
                                <h4>Hi, <?php echo $_SESSION['vn'] ?></h4>
                            </div>
                        </div>
                        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div>
                    </div>
                    <!-- row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="profile">
                                <div class="profile-head">
                                    <div class="photo-content">
                                        <div class="cover-photo">
                                        <div class="profile-photo">
                                            <img src="../admin/upload/vendor/<?php echo "{$selectrow['vendor_photo']}"; ?>" class="img-fluid " alt="" style="padding-bottom: 109px;margin-left: -24px;">
                                        </div></div>
                                    </div>
                                    <div class="profile-info">
                                        <div class="row justify-content-center" style="margin-left: 193px;margin-top: -168px;">
                                            <div class="col-xl-8">
                                                <div class="row">
                                                    <div class="col-xl-4 col-sm-4 border-right-1 prf-col" style="padding: 30px 65px;">
                                                        <div class="profile-name" >
                                                           <h4 class="text-primary"><?php echo $selectrow['vendor_name'] ?></h4>
                                                            <p>Vendor Name</p>
                                                        </div>

                                                    </div>
                                                    <div class="col-xl-4 col-sm-4 border-right-1 prf-col" style="padding: 30px 2px;">
                                                        <div class="profile-name">
                                                            <h4 class="text-primary"><?php echo $selectrow['shop_name'] ?></h4>
                                                            <p>Shop Name</p>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="col-xl-4 col-sm-4 prf-col">
                                                        <div class="profile-call">
                                                            <h4 class="text-muted">(+1) 321-837-1030</h4>
                                                            <p>Phone No.</p>
                                                        </div>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="profile-tab">
                                        <div class="custom-tab-1">
                                            <ul class="nav nav-tabs">
                                                <li class="nav-item"><a href="#about-me" data-toggle="tab" class="nav-link active show">About Me</a>
                                                </li>
                                                <li class="nav-item"><a href="#profile-settings" data-toggle="tab" class="nav-link">Update Profile</a>
                                                </li>
                                                <li class="nav-item"><a href="#profile-settings1" data-toggle="tab" class="nav-link">Update Photo</a>
                                                </li>
                                               
                                            </ul>
                                            <div class="tab-content">
                                                <div id="about-me" class="tab-pane fade active show">
                                                    <div class="profile-personal-info">
                                                        <div class="pt-4 border-bottom-1 pb-4">
                                                            <h4 class="text-primary mb-4">Personal Information</h4>
                                                        </div>
                                                        <div class="row mb-4">
                                                            <div class="col-3">
                                                                <h5 class="f-w-500">Name <span class="pull-right">:</span>
                                                                </h5>
                                                            </div>
                                                            <div class="col-9"><span><?php echo "{$selectrow['vendor_name']}"; ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-4">
                                                            <div class="col-3">
                                                                <h5 class="f-w-500">Shop Name <span class="pull-right">:</span></h5>
                                                            </div>
                                                            <div class="col-9"><span><?php echo "{$selectrow['shop_name']}"; ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-4">
                                                            <div class="col-3">
                                                                <h5 class="f-w-500">Email <span class="pull-right">:</span>
                                                                </h5>
                                                            </div>
                                                            <div class="col-9"><span><a href="https://medico.dexignzone.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="24415c454954484164415c4549544841480a474b49"><?php echo "{$selectrow['vendor_email']}"; ?></a></span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-4">
                                                            <div class="col-3">
                                                                <h5 class="f-w-500">Address<span class="pull-right">:</span></h5>
                                                            </div>
                                                            <div class="col-9"><span><?php echo "{$selectrow['vendor_address']}"; ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-4">
                                                            <div class="col-3">
                                                                <h5 class="f-w-500">Shop Timing <span class="pull-right">:</span>
                                                                </h5>
                                                            </div>
                                                            <div class="col-9"><span><?php echo "{$selectrow['shop_timing']}"; ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-4">
                                                            <div class="col-3">
                                                                <h5 class="f-w-500">Details <span class="pull-right">:</span></h5>
                                                            </div>
                                                            <div class="col-9"><span><?php echo "{$selectrow['vendor_details']}"; ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="profile-settings" class="tab-pane fade">
                                                    <div class="pt-3">
                                                        <div class="settings-form">
                                                            <form method="post" enctype="multipart/form-data">
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <label>Vendor Name</label>
                                                                        <input type="text" placeholder="" class="form-control" name="vendorname" value="<?php echo $selectrow['vendor_name'] ?>">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label>Mobile No</label>
                                                                        <input type="text" placeholder="" class="form-control" name="vendorphone" value="<?php echo $selectrow['vendor_mobileno'] ?>">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label>Shop Name</label>
                                                                        <input type="text" placeholder="" class="form-control" name="vendorshopname" value="<?php echo $selectrow['shop_name'] ?>">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label>Shop Timing</label>
                                                                        <input type="text" placeholder="" class="form-control"   name="vendorshoptime" value="<?php echo $selectrow['shop_timing'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <label>Email</label>
                                                                    <input type="email" placeholder="" class="form-control" name="vendoremail" value="<?php echo $selectrow['vendor_email'] ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Address</label>
                                                                    <input type="text" placeholder="1234 Main St" class="form-control" name="vendoraddress" value="<?php echo $selectrow['vendor_address'] ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Details</label>
                                                                    <input type="text" placeholder="Apartment, studio, or floor" name="vendordetails" class="form-control" value="<?php echo $selectrow['vendor_details'] ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label" for="areaid">Area ID</label>
                                                                    <?php
                                                                    $areaq = mysqli_query($connection, "select * from  tbl_area") or die(mysqli_error($connection));
                                                                    echo "<select name='carea' class='form-control'>";
                                                                    while ($row = mysqli_fetch_array($areaq)) {
                                                                        echo "<option value='{$row['area_id']}'>{$row['area_name']} :- {$row['area_pincode']}</option>";
                                                                    }
                                                                    echo "</select>";
                                                                    ?>
                                                                </div>  
                                                                <button class="btn btn-primary" name="btn" type="submit"> Update Profile </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                
                                                
                                                
                                                 <div id="profile-settings1" class="tab-pane fade">
                                                    <div class="pt-3">
                                                        <div class="settings-form">
                                                            <form method="post" enctype="multipart/form-data">
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-12">
                                                                        <label>Vendor Photo</label>
                                                                        <input type="file" placeholder="" class="form-control" name="vimage"  value="<?php echo $selectrow['vendor_photo'] ?>">
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <label>Shop Photo</label>
                                                                        <input type="file" placeholder="" class="form-control" name="vsimage" value="<?php echo $selectrow['shop_image'] ?>">
                                                                    </div>
                                                                </div> 
                                                                <button class="btn btn-primary"  name="btnphoto" type="submit"> Update Photo</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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

        <!--removeIf(production)-->

        <!--**********************************
            Scripts
        ***********************************-->
        <!-- Required vendors -->
        <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="vendor/global/global.min.js"></script>
        <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
        <script src="js/deznav-init.js"></script>
        <script src="js/custom.min.js"></script>


        <!-- Svganimation scripts -->
        <script src="vendor/svganimation/vivus.min.js"></script>
        <script src="vendor/svganimation/svg.animation.js"></script>


    </body>


    <!-- Mirrored from medico.dexignzone.com/admin/app-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Dec 2021 10:57:28 GMT -->
</html>