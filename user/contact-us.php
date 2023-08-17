<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './class/atclass.php';
$msg = "";
if (isset($_POST['submit'])) 
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
   
    $msg1 = "Hi My Name is $name <br/>, Email is $email <br/> Phone is $phone <br/> I Would Like To Know About $subject.<br><br>$message";
    if($msg1)
    {
        echo "<script>alert('Email Send Successfully');</script>";
    }
    
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
            $mail->Username = "pharmacin2022@gmail.com";                     //SMTP username
            $mail->Password = "Pharma@123";                               //SMTP password
            $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
            $mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            //Recipients
            $mail->setFrom('pharmacin2022@gmail.com', 'Pharmacin');
//            $mail->addAddress($email, $email);  
            $mail->addAddress('pareshshihsindha@gmail.com');//Add a recipient  
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = "$subject";
            $mail->Body = $msg1;
            $mail->AltBody = "$message";

            if($mail->send())
            {
            $msg = '<center><div class="alert alert-success" role="alert">
                Mail Send
            </div></center>';
            }
        } catch (Exception $e) {
            echo 'Message could not be sent.';
            echo ' Mailer Error:' . $mail->ErrorInfo;
        }
}
        
?>

<!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from medico.dexignzone.com/xhtml/contact-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Jan 2022 11:14:33 GMT -->
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
        <title>PHARMACIN - Contact Us</title>

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
    <body id="bg"><div id="loading-area"></div>
        <div class="page-wraper">
<?php
include './themepart/header.php';
?>
            <!-- Content -->
            <div class="page-content">
                <!-- inner page banner -->
                <div class="dez-bnr-inr overlay-black-middle" style="background-image:url(../admin/upload/posters/contactus.jpg);">
                   
                </div>
                <!-- inner page banner END -->
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <div class="container">
                        <ul class="list-inline">
                            <li><a href="#">Home</a></li>
                            <li>Contact Us</li>
                        </ul>
                    </div>
                </div>
                <!-- Breadcrumb row END -->
                <!-- contact area -->
                <div class="section-full content-inner bg-white contact-style-1">
                    <div class="container">

                        <div class="row">
                            <!-- Left part start -->
                            <div class="col-lg-12 m-b30">
                                <div class="p-a30 bg-gray clearfix">
                                    <h2>Send Message Us</h2>
                                    <div class="dzFormMsg"></div>
                                    <form method="post" class="dzForm1">
                                        <input type="hidden" value="Contact" name="dzToDo" >
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input name="name" type="text" required class="form-control" placeholder="Your Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="input-group"> 
                                                        <input name="email" type="email" class="form-control" required  placeholder="Your Email Id" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input name="phone" type="text" required class="form-control" placeholder="Phone">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input name="subject" type="text" required class="form-control" placeholder="Subject">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <textarea name="message" rows="4" class="form-control" required placeholder="Your Message..."></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <button name="submit" type="submit" value="Submit" class="site-button "> <span>Submit</span> </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Left part END -->

                            <!-- right part END -->
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-6 m-b30">
                                <div class="icon-bx-wraper bx-style-1 p-a30 center">
                                    <div class="icon-xl text-primary m-b20"> <a href="#" class="icon-cell"><i class="fa fa-map-marker"></i></a> </div>
                                    <div class="icon-content">
                                        <h5 class="dez-tilte text-uppercase">Address</h5>
                                        <p>K9 Shree Krishna Center, Mithakhali, Ahmedabad, Gujarat 380009 </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 m-b30">
                                <div class="icon-bx-wraper bx-style-1 p-a30 center">
                                    <div class="icon-xl text-primary m-b20"> <a href="#" class="icon-cell"><i class="fa fa-envelope"></i></a> </div>
                                    <div class="icon-content">
                                        <h5 class="dez-tilte text-uppercase">Email</h5>
                                        <p><br>Pharmacin2022@gmail.com</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 m-b30">
                                <div class="icon-bx-wraper bx-style-1 p-a30 center">
                                    <div class="icon-xl text-primary m-b20"> <a href="#" class="icon-cell"><i class="fa fa-phone"></i></a> </div>
                                    <div class="icon-content">
                                        <h5 class="dez-tilte text-uppercase">Phone</h5>
                                        <p><br>095862 48516</p>
                                    </div>
                                </div>
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
            <button class="scroltop fa fa-arrow-up" ></button>
        </div>
        <!-- JavaScript  files ========================================= -->
        <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/combining.js"></script><!-- COMBINING JS  -->
        <script src='../../www.google.com/recaptcha/api.js'></script> <!-- Google API For Recaptcha  -->

    </body>

    <!-- Mirrored from medico.dexignzone.com/xhtml/contact-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Jan 2022 11:14:33 GMT -->
</html>
