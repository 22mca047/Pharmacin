<?php
require './class/atclass.php';
 session_start();
if(isset($_GET['search']))
{
    $search = $_GET['search'];
    $productsq = mysqli_query($connection, "select * from tbl_product where pro_name like '%$search%' ") or die(mysqli_error($connection));
}else{

    $productsq = mysqli_query($connection, "select * from tbl_product") or die(mysqli_error($connection));
    
}
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from medico.dexignzone.com/xhtml/product.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Jan 2022 11:14:26 GMT -->
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
	<title>PHARMACIN - Product List</title>
	
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
<body id="bg">
<div id="loading-area"></div><div class="page-wraper">
    <!-- header -->
    <?php
    include '../user/themepart/header.php';
    ?>
    <!-- header END -->
    <!-- Content -->
    <div class="page-content">
        <!-- inner page banner -->
        <div class="dez-bnr-inr overlay-black-middle" style="background-image:url(../admin/upload/posters/shopbanner1.jpg);">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">Products</h1>
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="#">Home</a></li>
                    <li>Products</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->
        <!-- contact area -->
        <div class="content-area">
            <!-- Product -->
            <div class="container">
                <div class="row">
                  <?php
                      while ($productrow = mysqli_fetch_array($productsq))
                      {
                        echo "<div class='col-lg-3 col-md-6 col-sm-6 m-b30'>
                        <div class='dez-box p-a20 border-1 bg-gray'>
                            <div class='dez-thum-bx dez-img-overlay1 dez-img-effect zoom'> <img src='../admin/upload/product/{$productrow['pro_image']}' style='width:300px;height:250px;' alt=''>
                                <div class='overlay-bx'>
                                    <div class='overlay-icon'> <a href='javascript:void(0)'>  </a>
                                                               <a href='product-details.php?pid={$productrow['pro_id']}'> <i class='fa fa-search icon-bx-xs'></i> </a>
                                                               <a href='javascript:void(0)'></a> </div>
                                </div>
                            </div>
                            <div class='dez-info p-t20 text-center'>
                                <h3 class='dez-title m-t0'><a href='product-details.php?pid={$productrow['pro_id']}'>{$productrow['pro_name']}</a></h3>
                                <h5 class='m-b0' style='padding-bottom:13px;'> ₹ {$productrow['pro_price']}</h5><br/>
                                <center><a href='product-details.php?pid={$productrow['pro_id']}' class='site-button'>See More</a ></center> </div>
                                    
                        </div>
                    </div>";
                      }
                  ?>
                </div>
            </div>
            <!-- Product END -->
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

</body>

<!-- Mirrored from medico.dexignzone.com/xhtml/product.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Jan 2022 11:14:27 GMT -->
</html>
