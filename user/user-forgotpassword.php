<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './class/atclass.php';
$msg = "";
if ($_POST) {
    $email = $_POST['email'];

    $selectquery = mysqli_query($connection, "select * from tbl_customer  where customer_email='{$email}'") or die(mysqli_error($connection));
    $count = mysqli_num_rows($selectquery);
    $row = mysqli_fetch_array($selectquery);

    if ($count > 0) {
        //echo $row['admin_password'];   
        //Import PHPMailer classes into the global namespace
        //These must be at the top of your script, not inside a function
        //Load Composer's autoloader
        require 'forgotpass/autoload.php';

//Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
            $mail->Username = 'pharmacin2022@gmail.com';                     //SMTP username
            $mail->Password = 'Pharma@123';                               //SMTP password
            $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
            $mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            //Recipients
            $mail->setFrom('pharmacin2022@gmail.com', 'Pharmacin');
            $mail->addAddress($email, $email);     //Add a recipient           //Name is optional
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Forgot Password';
            $mail->Body = "Hi $email Your Password is {$row['customer_password']}";
            $mail->AltBody = "Hi $email Your Password is {$row['customer_password']}";

            $mail->send();
            $msg = '<center><div class="alert alert-success" role="alert">
                Your Password Has Been Sent To Your E-mail Address..
            </div></center>';
        } catch (Exception $e) {
            echo 'Message could not be sent.';
            echo ' Mailer Error:' .$mail->ErrorInfo;
        }
    } 
    else 
    {
     $msg = '<center><div class="alert alert-danger" role="alert">
                Invalid E-mail Address..
            </div></center>';   
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
        <title>PHARMACIN - Forgot Password</title>

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
                <div class="dez-bnr-inr overlay-black-middle" style="background-image:url(../admin/upload/posters/forget-password.jpg);">
                    <div class="container">
                        <div class="dez-bnr-inr-entry">
                            <h1 class="text-white">Forgot Password</h1>
                        </div>
                    </div>
                </div>
                <!-- inner page banner END -->
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <div class="container">
                        <ul class="list-inline">
                            <li><a href="home.php">Home</a></li>
                            <li><a href="user-login.php">Login</a></li>
                            <li>Forgot Password</li>
                        </ul>
                    </div>
                </div><br><br>
                <?php
                        echo $msg;
                        ?>
                <!-- Breadcrumb row END -->
                <!-- contact area -->
                <div class="section-full content-inner-1 bg-white contact-style-1">
                    <div class="container">
                        <div class="row">
                            <!-- Left part start -->
                            <div class="col-lg-12" >
                                <form id="myform" style="padding-left:450px; padding-right:450px;" method="post">
                                <div class="p-a30 m-b30 border-2 contact-area align-self-stretch">
                                    <h3 class="form-title m-t0" style="text-align:center;">User Forgot Password</h3>
                                    <div class="dez-separator-outer m-b5" style="text-align:center;">
                                        <div class="dez-separator bg-primary style-liner"></div>
                                    </div>
                                    <p>Enter Your E-mail</p>
                                    <div class="form-group">
                                        <input name="email" required="" class="form-control" placeholder="Enter Your Email" type="email">
                                    </div>
                                    <div class="form-group" style="margin-left:50px;">
                                        <button type="submit" class="site-button dz-xs-flex col-lg-5 text-center">Submit</button>
                                        <button type="button" class="site-button dz-xs-flex col-lg-5 text-center" onclick="window.location='user-login.php';">Back</button>
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
