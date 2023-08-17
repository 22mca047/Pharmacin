<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
session_start();
require './class/atclass.php';


$msg = "";
if (isset($_GET['statusid'])) {
    $statusid = $_GET['statusid'];
    $getstatusq = mysqli_query($connection, "select is_verified from tbl_vendor where vendor_id='{$statusid}'") or die(mysqli_error($connection));
    $statusfromdb = mysqli_fetch_array($getstatusq);

    if ($statusfromdb['is_verified'] == 1) {
        mysqli_query($connection, "update tbl_vendor set is_verified='0' where vendor_id='{$statusid}'") or die(mysqli_error($connection));
    } else {
        $accept = mysqli_query($connection, "update tbl_vendor set is_verified='1' where vendor_id='{$statusid}'") or die(mysqli_error($connection));

        if ($accept) {
            echo "<script>alert('You Accept The Request ');</script>";
            $qacc = mysqli_query($connection, "select * from tbl_vendor where vendor_id='{$statusid}'");
            $count = mysqli_num_rows($qacc);
            $acc1 = mysqli_fetch_array($qacc);
            if ($count > 0) {
                //echo $row['admin_password'];   
                //Import PHPMailer classes into the global namespace
                //These must be at the top of your script, not inside a function
                //Load Composer's autoloader
                require 'acceptvendor/autoload.php';

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
                    $mail->addAddress($acc1['vendor_email'], $acc1['vendor_email']);     //Add a recipient           //Name is optional
                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Join Pharmacin';
                    $mail->Body = "Hi {$acc1['vendor_email']} You Request To Join Pharmacin Is Accepted Now You Can Login With Your Email Address And Password <br><br>TEAM <b>PHARMACIN</b>";
                    $mail->AltBody = "";

                    $mail->send();
                    $msg = '<center><div class="alert alert-success" role="alert">
                Request Accepted Mail Send Successfully..
            </div></center>';
                } catch (Exception $e) {
                    echo 'Message could not be sent.';
                    echo ' Mailer Error:' . $mail->ErrorInfo;
                }
            } else {
                $msg = '<center><div class="alert alert-danger" role="alert">
                Request Rejected..
            </div></center>';
            }
        }
    }
}
$sql = "SELECT
    `tbl_vendor`.`vendor_id`
    , `tbl_vendor`.`vendor_name`
    , `tbl_vendor`.`vendor_mobileno`
    , `tbl_vendor`.`vendor_address`
    , `tbl_vendor`.`vendor_details`
    , `tbl_vendor`.`vendor_email`
    , `tbl_vendor`.`vendor_password`
    , `tbl_vendor`.`vendor_photo`
    , `tbl_area`.`area_pincode`
    , `tbl_vendor`.`is_blocked`
    , `tbl_vendor`.`is_verified`
FROM
    `tbl_area`
    INNER JOIN `tbl_vendor` 
        ON (`tbl_area`.`area_id` = `tbl_vendor`.`area_id`) where `tbl_vendor`.`is_verified` = 0 ";
$selectq = mysqli_query($connection, $sql) or die(mysqli_error($connection));
?> 
<!DOCTYPE html>
<html lang="en">


    <!-- Mirrored from medico.dexignzone.com/admin/table-datatable-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Dec 2021 10:57:49 GMT -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>PHARMACIN - Vendor Requests </title>
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="upload/final.jpg">
        <!-- Datatable -->
        <link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
        <!-- Custom Stylesheet -->
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
            include './themepart/Sidebar.php';
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
                                <h4>Vendor Requests</h4>
                            </div>

                        </div>
                        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Vendor Requests</li>
                            </ol>
                        </div>
                    </div>
                    <!-- row -->


                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="display" style="min-width: 845px">
                                            <thead>
                                                <tr>
                                                    <th>Photo</th>
                                                    <th>Id</th>
                                                    <th>Name</th>
                                                    <th>Mobile-No</th>
                                                    <th>Address</th>
                                                    <th>Details</th>
                                                    <th>Email</th>
                                                    <th>Password</th>
                                                    <th>Pincode</th>
                                                    <th>Accept</th>
                                                    <th>Reject</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (isset($_GET['did'])) {
                                                    $did = $_GET['did'];
                                                    $deleteq = mysqli_query($connection, "delete from tbl_vendor where vendor_id='{$did}'") or die(mysqli_error($connection));
                                                    if ($deleteq) {
                                                        echo "<script>alert('Request Rejected');window.location='vendor-list.php';</script>";
                                                    }
                                                }
                                                while ($vendorrow = mysqli_fetch_array($selectq)) {
                                                    $status = $vendorrow['is_verified'];
                                                    if ($status == 1) {
                                                        $status = "<a href='?statusid=$vendorrow[0]'><img src='upload/signs/Reject.jpg' style='height:50px; width:200px;'></a>";
                                                    } else {
                                                        $status = "<a href='?statusid=$vendorrow[0]'><img src='upload/signs/accept.jpg' style='height:50px; width:200px;'></a>";
                                                    }
                                                    echo "<tr>";
                                                    echo "<td><img  style='height:100px;width:100px;' src='upload/vendor/{$vendorrow['vendor_photo']}'></td>";
                                                    echo "<td>{$vendorrow['vendor_id']}</td>";
                                                    echo "<td>{$vendorrow['vendor_name']}</td>";
                                                    echo "<td>{$vendorrow['vendor_mobileno']}</td>";
                                                    echo "<td>{$vendorrow['vendor_address']}</td>";
                                                    echo "<td>{$vendorrow['vendor_details']}</td>";
                                                    echo "<td>{$vendorrow['vendor_email']}</td>";
                                                    echo "<td>{$vendorrow['vendor_password']}</td>";
                                                    echo "<td>{$vendorrow['area_pincode']}</td>";
                                                    echo "<td>{$status}</td>";
                                                    echo "<td>
                                                                <a class='dropdown-item text-warning' href='vendor-list.php?did={$vendorrow['vendor_id']}'><img src='upload/signs/Reject.jpg' style='height:50px; width:200px;'></a>
                                                         </td>";
                                                    echo "</tr>";
                                                }
                                                ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Photo</th>
                                                    <th>Id</th>
                                                    <th>Name</th>
                                                    <th>Mobile-No</th>
                                                    <th>Address</th>
                                                    <th>Details</th>
                                                    <th>Email</th>
                                                    <th>Password</th>
                                                    <th>Pincode</th>
                                                    <th>Accept</th>
                                                    <th>Reject</th>
                                                </tr>
                                            </tfoot>
                                        </table>
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

        <!--**********************************
            Scripts
        ***********************************-->
        <!-- Required vendors -->
        <script src="vendor/global/global.min.js"></script>
        <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
        <script src="js/deznav-init.js"></script>
        <script src="js/custom.min.js"></script>



        <!-- Datatable -->
        <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="js/plugins-init/datatables.init.js"></script>

        <!-- Svganimation scripts -->
        <script src="vendor/svganimation/vivus.min.js"></script>
        <script src="vendor/svganimation/svg.animation.js"></script>
    </body>


    <!-- Mirrored from medico.dexignzone.com/admin/table-datatable-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Dec 2021 10:57:49 GMT -->
</html>

