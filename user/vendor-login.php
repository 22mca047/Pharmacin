<?php
session_start();
include './class/atclass.php';
if($_POST)
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $selectq = mysqli_query($connection,"select * from tbl_vendor where vendor_email='{$email}' and vendor_password ='{$password}' and is_blocked = 1 and is_verified = 1 ") or die(mysqli_error($connection));
    $count = mysqli_num_rows($selectq);
    $row = mysqli_fetch_array($selectq);
    if($count>0)
    {
        $_SESSION['vi'] = $row['vendor_id'];
        $_SESSION['vn'] = $row['vendor_name'];
        $_SESSION['ve'] = $row['vendor_email'];
        $_SESSION['vimage'] = $row['vendor_photo'];
        $_SESSION['sn'] = $row['shop_name'];
        $_SESSION['st'] = $row['shop_timing'];
        echo "<script>alert('You Have Successfully Logged In..');window.location='../vendor/dashboard.php';</script>";
    }
    else
    {
        echo "<script>alert('Invalid Email-password');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="" />
        <meta name="author" content="" />
        <meta name="robots" content="" />
        <meta name="description" content="" />
        <meta property="og:title" content="MediCo. - Doctor HTML Template" />
        <meta property="og:description" content="" />
        <meta property="og:image" content="" />
        <meta name="format-detection" content="telephone=no">

        <!-- FAVICONS ICON -->
         <link rel="icon" href="images/final.jpg" type="image/x-icon" />
        <link rel="shortcut icon" type="image/x-icon" href="images/final.jpg" />

        <!-- PAGE TITLE HERE -->
        <title>PHARMACIN - Vendor Login</title>

        <!-- MOBILE SPECIFIC -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--[if lt IE 9]>
        <script src="js/html5shiv.min.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->

        <!-- STYLESHEETS -->
        <link rel="stylesheet" type="text/css" href="css/plugins.min.css">
        <link rel="stylesheet" type="text/css" href="plugins/fontawesome/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="plugins/flaticon/flaticon.css">
        <link rel="stylesheet" type="text/css" href="plugins/themify/themify-icons.css">
        <link rel="stylesheet" type="text/css" href="css/style.min.css">
        <link class="skin" rel="stylesheet" type="text/css" href="css/skin/skin-1.css">
        <link rel="stylesheet" type="text/css" href="css/templete.min.css">

        <style>
            @import url('https://fonts.googleapis.com/css?family=Hind:300,400,500,600,700|Lato:100,100i,300,300i,400,400i,700,700i,900,900i|Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|PT+Serif:400,400i,700,700i|Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Roboto+Slab:100,300,400,700|Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Rubik:300,300i,400,400i,500,500i,700,700i,900,900i');
        </style>
    </head>
    <style>
        .error{
            color: red;
        }
    </style>
    <body id="bg"><div id="loading-area"></div>
        <div class="page-wraper">
            <!-- header -->
            <?php
            include './themepart/login-header.php';
            ?>
            <!-- header END -->
            <!-- Content -->
            <div class="page-content">
                <!-- inner page banner -->
                <div class="dez-bnr-inr overlay-black-middle" style="background-image:url(../admin/upload/posters/login.jpg);">
                    
                </div>
                <!-- inner page banner END -->
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <div class="container">
                        <ul class="list-inline">
                            <li><a href="home.php">Home</a></li>
                            <li>Login</li>
                        </ul>
                    </div>
                </div>
                <!-- Breadcrumb row END -->
                <!-- contact area -->
                <div class="section-full content-inner-1 bg-white contact-style-1">
                    <div class="container">
                        <div class="row">
                            <!-- Left part start -->
                            <div class="col-lg-12" >
                                <form id="myform" style="padding-left:375px; padding-right:375px;" method="post">
                                <div class="p-a30 m-b30 border-2 contact-area align-self-stretch">
                                    <h3 class="form-title m-t0" style="text-align:center;">Vendor Login</h3>
                                    <div class="dez-separator-outer m-b5" style="text-align:center;">
                                        <div class="dez-separator bg-primary style-liner"></div>
                                    </div>
                                    <p>Enter your e-mail address and your password. </p>
                                    <div class="form-group">
                                        <input name="email" required="" class="form-control" placeholder="Enter Your Email" type="email">
                                    </div>
                                    <div class="form-group">
                                        <input name="password" required="" class="form-control " placeholder="Type Password" type="password">
                                    </div>
                                    <div class="form-group" style="margin-left:50px;">
                                        <button type="submit" class="site-button dz-xs-flex col-lg-5 text-center">Login </button>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="button" class="site-button dz-xs-flex col-lg-5 text-center" onclick="window.location='vendor-register.php';">Register </button>
                                    </div>
                                    
                                    
                                    <div class="form-group text-left pass-check">
                                        <a  href="forgotpassword.php" class="m-l15"><i class="fa fa-unlock-alt"></i> Forgot Password</a> 
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- contact area  END -->
            </div>
            <!-- Content END-->
            <!-- Footer -->
          <?php
          include './themepart/footer.php';
          ?>
            <!-- Footer END-->
            <!-- scroll top button -->
            <button class="scroltop fa fa-caret-up" ></button>
        </div>
        <!-- JavaScript  files ========================================= -->
        <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        <script src="js/combining.js"></script><!-- COMBINING JS  -->
    
    <script type="text/javascript" src="js/jquery.validate.js"></script>
    <script>
        $(document).ready(function () {
            $('#myform').validate();
        });
    </script>
    </body>
    
</html>
