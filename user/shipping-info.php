<?php
require './class/atclass.php';

session_start();
if ($_POST) {
    $date = date('Y-m-d');
    $name = $_POST['name'];
    $mobile = $_POST['mobileno'];
    $address = $_POST['address'];
    $custid = $_SESSION['ci'];

    $ordermasterq = mysqli_query($connection, "insert into tbl_ordermaster (order_date,order_status,shipping_name,shipping_mobileno,shipping_address,customer_id) values ('{$date}','Pending','{$name}','{$mobile}','{$address}','{$custid}')")or die(mysqli_error($connection));

    $orderid = mysqli_insert_id($connection);
    $total_amount = 0;
    foreach ($_SESSION['productcart'] as $key => $value) {
        $qty = $_SESSION['qtycart'][$key];
        $pro_price = $_SESSION['qtypricecart'][$key];
        $total_amount += ($qty * $pro_price);
        $orderdetailsq = mysqli_query($connection, "insert into tbl_orderdetails (order_id,pro_ven_id,pro_qty,pro_price) values ('{$orderid}','{$value}','{$qty}','{$pro_price}')")or die(mysqli_error($connection));
    }
    $amount = $total_amount;
    $_SESSION['total_amount_data'] = $amount;

    $method = mysqli_real_escape_string($connection, $_POST['payment_method']);
    $payq = mysqli_query($connection, "insert into tbl_payment (order_id,amount,method) values ('{$orderid}','{$amount}','{$method}')") or die(mysqli_error($connection));

//    exit();
    unset($_SESSION['productcart']);
   unset($_SESSION['qtypricecart']);
    unset($_SESSION['qtycart']);
    unset($_SESSION['counter']);
    if ($_POST['payment_method'] == "RazorPay") {
        echo "<script>window.location='payment.php?user_name={$name}&user_mobile={$mobile}&orderid={$orderid}'</script>";
    } else {
        echo "<script>alert('Order Accept Soon');window.location='user-order.php';</script>";
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
        <title>PHARMACIN - shipping Info</title>

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
            .bank_display,.card_display{
                display:none;
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
            include './themepart/header.php';
            ?>
            <!-- header END -->
            <!-- Content -->
            <div class="page-content">
                <!-- inner page banner -->
                <div class="dez-bnr-inr overlay-black-middle" style="background-image:url(../admin/upload/posters/shipping-info.jpg);">
                    <div class="container">
                        <div class="dez-bnr-inr-entry">
                            <h1 class="text-white" style="padding-left: 548px;padding-top: 185px;">Shipping Details </h1>
                        </div>
                    </div>
                </div>
                <!-- inner page banner END -->
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <div class="container">
                        <ul class="list-inline">
                            <li><a href="home.php">Home</a></li>
                            <li><a href="add-to-cart.php">Cart</a></li>
                            <li>Shipping Details</li>
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
                                        <h3 class="form-title m-t0" style="text-align:center;">Shipping Details</h3>
                                        <div class="dez-separator-outer m-b5" style="text-align:center;">
                                            <div class="dez-separator bg-primary style-liner"></div>
                                        </div>
                                        <p>Enter Shipping Details :</p>
                                        <div class="form-group">
                                            <input name="name" required="" class="form-control" placeholder="Enter Your Name" type="text">
                                        </div>
                                        <div class="form-group">
                                            <input name="mobileno" required="" class="form-control " placeholder="Enter Mobile No" type="number">
                                        </div>
                                        <div class="form-group">
                                            <textarea name="address" class="form-control" placeholder="Enter Shipping Address" required/></textarea>
                                        </div>
                                        <div class="form-group">
                                            <select name="payment_method" id="payment_method">
                                                <option value="COD">COD</option>
                                                <option value="RazorPay">Razor Pay</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group" style="margin-left:145px;">
                                        <button type="submit" class="site-button dz-xs-flex col-lg-8 text-center">Checkout</button>
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

