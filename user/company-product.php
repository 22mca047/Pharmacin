<?php
require './class/atclass.php';
 session_start();
$comid = $_GET['cid'];
$proq = "SELECT * from tbl_product where company_id='{$comid}';";
$selectq = mysqli_query($connection, $proq) or die(mysqli_error($connection));
$catq = mysqli_query($connection, "select * from tbl_company where company_id='{$comid}'") or die(mysqli_error($connection));
$catarr = mysqli_fetch_array($catq);
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from medico.dexignzone.com/xhtml/services-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Jan 2022 11:14:19 GMT -->
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
	<title>PHARMACIN - Company Product</title>
	
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
  include './themepart/header.php';
  ?>
    <!-- header END -->
    <!-- Content -->
    <div class="page-content">
        <!-- inner page banner -->
        <div class="dez-bnr-inr overlay-black-middle" style="background-image:url(../admin/upload/posters/shopbanner1.jpg);">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white"><?php echo "{$catarr['company_name']}"; ?></h1>
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="home.php">Home</a></li>
                    <li><?php echo "{$catarr['company_name']}"; ?></li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->
        <!-- contact area -->
        <div class="content-area">
            <!-- Services  -->
            <div class="container">
                <div class="row ">
                    <?php
                    while ($catproduct = mysqli_fetch_array($selectq))
                    {
                        echo "<div class='col-md-6 col-lg-6 col-sm-6 m-b30'>
                        <center><div class='dez-box'>
                            <div class='dez-media'><a href='product-details.php?pid={$catproduct['pro_id']}'><img src='../admin/upload/product/{$catproduct['pro_image']}' alt='' style='width:250px;height:200px;'></a> </div>
                            <div class='dez-info p-a30 border-1'>
                                <h4 class='dez-title m-t0'><a href='product-details.php?pid={$catproduct['pro_id']}'>{$catproduct['pro_name']}</a></h4>
                                <p>₹ {$catproduct['pro_price']}</p>
                                <a href='product-details.php?pid={$catproduct['pro_id']}' class='site-button'>Read More</a> </div>
                        </div></center>
                    </div>";
                    }
                    ?>
                </div>
            </div>
            <!-- Services END -->
        </div>
        <!-- contact area END -->
    </div>
    <!-- Content END-->
    <!-- Footer -->
   <?php
    include './themepart/footer.php';
   ?>
    <!-- Footer END-->
    <!-- scroll top button -->
    <button class="scroltop fa fa-chevron-up" ></button>
</div>
<!-- JavaScript  files ========================================= -->
<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/combining.js"></script><!-- COMBINING JS  -->

</body>

<!-- Mirrored from medico.dexignzone.com/xhtml/services-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Jan 2022 11:14:20 GMT -->
</html>



