
<?php
require './class/atclass.php';
session_start();
$msg = "";

if (isset($_SESSION['productcart']) && !empty($_SESSION['productcart']))
{

    $msg = "<span style='padding-left:75%;'><a class='btn btn-danger site-button navbar-brand mb-0 h5' style='width:300px;' href='shipping-info.php' role='button'>Proceed To Buy</a></span>";
} 

if(!isset($_SESSION['ci']) && isset($_SESSION['productcart']))
{
    if(count($_SESSION['productcart']))
    {
   $msg = "<span style='padding-left:70%;'><a class='btn btn-danger site-button navbar-brand mb-0 h5' style='width:400px;' href='user-login.php' role='button'>Please Login To Place Order </a></span>";
    }
}
?>
<!-- comment --><!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from medico.dexignzone.com/xhtml/product-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Jan 2022 11:14:28 GMT -->
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
        <title>PHARMACIN - Cart</title>

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
        <link rel="stylesheet" type="text/css" href="css/star-rating-svg.css">

        <style>
            @import url('https://fonts.googleapis.com/css?family=Hind:300,400,500,600,700|Lato:100,100i,300,300i,400,400i,700,700i,900,900i|Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|PT+Serif:400,400i,700,700i|Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Roboto+Slab:100,300,400,700|Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Rubik:300,300i,400,400i,500,500i,700,700i,900,900i');
        </style>

    </head>
    <body id="bg">
        <div id="loading-area"></div><div class="page-wraper">
            <!-- header -->
            <?php
            include './themepart/header.php';
            ?>
            <!-- header END -->
            <!-- Content -->
            <div class="page-content bg-white">
                <!-- inner page banner -->
                <div class="dez-bnr-inr overlay-black-middle" style="background-image:url(../admin/upload/posters/addtocart.jpg);">
                    <div class="container">
                        <div class="dez-bnr-inr-entry">
                            <h1 class="text-white">Cart</h1>
                        </div>
                    </div>
                </div>
                <!-- inner page banner END -->
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <div class="container">
                        <ul class="list-inline">
                            <li><a href="home.php">Home</a></li>
                            <li>Cart</li>
                        </ul>
                    </div>
                </div>
                <!-- Breadcrumb row END -->
                <!-- contact area -->
                <div class="content-area">
                    <!-- Product details -->  
                    <?php
                    echo $msg;
                    $carttotal = array();
                    $i = 0;
                        
                  if(isset($_SESSION['productcart'])){
                    foreach ($_SESSION['productcart'] as $key => $value) {
                        $i++;
                        $productq = mysqli_query($connection, "SELECT
    `tbl_product`.`pro_name`
    , `tbl_product`.`pro_price`
    , `tbl_product`.`pro_details`
    , `tbl_product`.`pro_image`
    , `tbl_product_vendor`.`pro_ven_price`
    , `tbl_product_vendor`.`vendor_id`
    , `tbl_product_vendor`.`pro_qty`
    , `tbl_product_vendor`.`pro_ven_id`
    , `tbl_product`.`pro_id`
FROM
    `tbl_product`
    INNER JOIN `tbl_product_vendor` 
        ON (`tbl_product`.`pro_id` = `tbl_product_vendor`.`pro_id`) where pro_ven_id='{$value}'") or die(mysqli_error($connection));
                        $prorow = mysqli_fetch_array($productq);
                        $qty = $_SESSION['qtycart'][$key];
                        $producttotal = $prorow['pro_ven_price'] * $qty;
                        $carttotal[] = $producttotal;
                        $finalsum = array_sum($carttotal);
                        $_SESSION['total'] = $finalsum;
                    }
                    if ($i > 0) {
                        echo "<nav class='navbar navbar-light bg-light'>";
                        echo "<div class='container-fluid'>";
                        echo "<span class='navbar-brand mb-0 h5'>Cart Total : ₹ $finalsum </span>";
                        echo "<span class='navbar-brand mb-0 h5'>Total Products : $i </span>";
                        echo "</div>";
                        echo "</nav>";
                        echo "<br/>";
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            unset($_SESSION['productcart'] [$id]);
                            unset($_SESSION['qtycart'] [$id]);
                            echo "<script>window.location='add-to-cart.php'</script>";
                        }
                    }
                    if (isset($_SESSION['productcart']) && !empty($_SESSION['productcart'])) {
                        $i = 0;
                        foreach ($_SESSION['productcart'] as $key => $value) {
                            $i++;
                            $productq = mysqli_query($connection, "SELECT
    `tbl_product`.`pro_name`
    , `tbl_product`.`pro_price`
    , `tbl_product`.`pro_details`
    , `tbl_product`.`pro_image`
    , `tbl_product_vendor`.`pro_ven_price`
    , `tbl_product_vendor`.`vendor_id`
    , `tbl_product_vendor`.`pro_qty`
    , `tbl_product_vendor`.`pro_ven_id`
    , `tbl_product`.`pro_id`
FROM
    `tbl_product`
    INNER JOIN `tbl_product_vendor` 
        ON (`tbl_product`.`pro_id` = `tbl_product_vendor`.`pro_id`) where pro_ven_id='{$value}'") or die(mysqli_error($connection));
                            $prorow = mysqli_fetch_array($productq);
                            $qty = $_SESSION['qtycart'][$key];
                            $producttotal = $prorow['pro_ven_price'] * $qty;

                            echo "Cart Product No : $i ";
                            echo "<div class='container woo-entry'>";
                            echo "<div class='row blog-post blog-md date-style-2'>";
                            echo "<div class='col-md-4 col-lg-4 m-b30'>";
                            echo "<img src='../admin/upload/product/{$prorow['pro_image']}' alt=''>";
                            echo "</div>";
                            echo "<div class='col-md-8 col-lg-8'>";
                            echo "<div class='dez-post-title'>";
                            echo "<h2 class='post-title'>{$prorow['pro_name']}</h2>";
                            echo "</div>";
                            echo "<h3 class='m-tb10'>₹ {$prorow['pro_ven_price']}</h3>";
                            echo "<table class='table table-bordered'>";
                            echo "<tr>";
                            echo "<td>Pricing</td>";
                            echo "<td>₹{$prorow['pro_ven_price']}</td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td>qty</td>";
                            echo "<td>$qty</td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td>Product Total</td>";
                            echo "<td>₹ $producttotal </td>";
                            echo "</tr>";
                            echo "</table>";
                            echo "<a class='btn btn-danger site-button' style='width:100px;' href='?id=$key' role='button'>Remove</a>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                        }
                    } else {
                        echo '<center ><svg id="rocket-icon" class="my-2" viewBox="0 0 24 24" width="80" height="80" stroke="currentColor" stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round">
									<path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
									<line x1="3" y1="6" x2="21" y2="6"></line>
									<path d="M16 10a4 4 0 0 1-8 0"></path>
								</svg>
								<h4 class="my-2">Your Shopping Cart is Empty.</h4></center>
								';
                        echo "<center><a class='btn btn-primary site-button' style='width:300px;' href='product-list.php' role='button'>Buy Now</a></center>";
                    }
                    
                  }else
                  {
                      echo '<center ><svg id="rocket-icon" class="my-2" viewBox="0 0 24 24" width="80" height="80" stroke="currentColor" stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round">
									<path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
									<line x1="3" y1="6" x2="21" y2="6"></line>
									<path d="M16 10a4 4 0 0 1-8 0"></path>
								</svg>
								<h4 class="my-2">Your Shopping Cart is Empty.</h4></center>';
                      echo "<center><a class='btn btn-primary site-button' style='width:300px;' href='product-list.php' role='button'>Buy Now</a></center>";
                 
                  }
                    ?>
                    <!-- Product details -->
                </div>
                <!-- contact area  END -->
            </div>
            <!-- Content END-->
            <!-- Footer -->
            <?php
            include './themepart/footer.php';
            ?>
            <!-- Footer END-->
            <button class="scroltop fa fa-chevron-up" ></button>
        </div>
        <!-- JavaScript  files ========================================= -->
        <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/combining.js"></script><!-- COMBINING JS  -->
        <script src="js/jquery.star-rating-svg.js"></script>
    </body>

    <!-- Mirrored from medico.dexignzone.com/xhtml/product-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Jan 2022 11:14:28 GMT -->
</html>
