<?php
require './class/atclass.php';
if (isset($_POST['submit']))
{
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
    move_uploaded_file($_FILES['cimage']['tmp_name'],"../admin/upload/customer/". $cuimage);
    if($cpassword == $ccpassword)
    {
        $query = mysqli_query($connection, "insert into tbl_customer (customer_name,customer_gender,customer_dob,customer_image,customer_mobileno,customer_address,customer_email,customer_password,area_id) values ('{$cname}','{$cgender}','{$cdob}','{$cuimage}','{$cmobileno}','{$caddress}','{$cemail}','{$cpassword}','{$carea}')") or die(mysqli_error($connection));
    }
    else
    {
        echo "<script>alert('Password And Conform Password Must Be Same..');window.location='user-register.php';</script>";
    }
    if ($query)
    {
         echo "<script>alert('You Registered Successfully Now You Have To Login.');window.location='user-login.php';</script>";
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
        <title>PHARMACIN - User-Registation</title>

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
            
            .form-group .bootstrap-select.btn-group, .form-horizontal .bootstrap-select.btn-group, .form-inline .bootstrap-select.btn-group{
                padding:10px 0px !important;
            }
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
                <div class="dez-bnr-inr overlay-black-middle" style="background-image:url(../admin/upload/posters/register.jpg);">
                </div>
                <!-- inner page banner END -->
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <div class="container">
                        <ul class="list-inline">
                            <li><a href="home.php">Home</a></li>
                            <li><a href="user-login.php">Login</a></li>
                            <li>Registration</li>
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
                                <form id="myform" style="padding-left:375px; padding-right:375px;" enctype="multipart/form-data" method="post">
                                    <div class="p-a30 m-b30 border-2 contact-area align-self-stretch">
                                        <h3 class="form-title m-t0" style="text-align:center;">User Registration</h3>
                                        <div class="dez-separator-outer m-b5" style="text-align:center;">
                                            <div class="dez-separator bg-primary style-liner"></div>
                                        </div>
                                        <p>Enter Your Details Below:</p>
                                        <div class="form-group">
                                            <input name="cname"  class="form-control" placeholder="Enter Full Name" type="text" required/>
                                        </div>
                                         <div class="form-group">
                                            <select class="form-control"  name="cgender" >
                                                    <option value="">Select Gender</option>
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                    <option>Other</option>
                                                </select>
                                            </div>
                                        <div class="form-group">
                                            <input name="cdob"  class="form-control" placeholder="Enter DOB" type="date" required/>
                                        </div>
                                        <div class="form-group">
                                           <input type="file" class="form-control" name="cimage" id="add-profile">
                                        </div>
                                         <div class="form-group">
                                             <input type="number" name="cmobileno" id="add-mobileno" class="form-control" placeholder="Enter Your Mobile No" required/>
                                             </div>
                                        
                                        <div class="form-group">
                                            <textarea name="caddress" class="form-control" placeholder="Enter Your Address" required/></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input name="cemail"  class="form-control" placeholder="Email" type="email" required/>
                                        </div>
                                        <div class="form-group">
                                            <input name="cpassword"  class="form-control" placeholder="Password" type="password" required/>
                                        </div>
                                        <div class="">
                                            <input name="cconfirmpassword" class="form-control" placeholder="Re-type Your Password" type="password" required/>
                                        </div>
                                        <div class="form-group">
                                                <label class="form-label" for="add-date">Area ID :-</label>
                                                  <?php
                                                $areaq = mysqli_query($connection, "select * from  tbl_area") or die(mysqli_error($connection));
                                               echo "<select name='carea' class='form-control'>";
                                                while($row = mysqli_fetch_array($areaq)){
                                                    echo "<option value='{$row['area_id']}'>{$row['area_name']} :- {$row['area_pincode']}</option>";
                                                }
                                               echo "</select>"; 
                                                ?>
                                            </div>
                                       
                                        <div class="form-group" style="margin-left:52px;">
                                            <button type="submit" name="submit" class="site-button dz-xs-flex col-lg-10 text-center">Register</button>
                                        </div>
                                        <div class="form-group" style="margin-left:31px;">
                                            <button type="button" class="site-button col-lg-5" data-toggle="tab" onclick="window.location='home.php';">Back</button>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="reset" class="site-button col-lg-5 text-center">Reset</button>
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
