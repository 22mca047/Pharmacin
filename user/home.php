<?php
session_start();
require './class/atclass.php';

$logoq = mysqli_query($connection, "select * from tbl_company") or die(mysqli_error($connection));

$proq = mysqli_query($connection, "select * from tbl_product where pro_price<=150") or die(mysqli_error($connection));

$venq = mysqli_query($connection, "select * from tbl_vendor where is_blocked = 1 and is_verified = 1") or die(mysqli_error($connection));

?>
<!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from medico.dexignzone.com/xhtml/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Jan 2022 11:14:02 GMT -->
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
        <title>Pharmacin </title>

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

        <!-- Revolution Slider Css -->
        <link rel="stylesheet" type="text/css" href="plugins/revolution/revolution/css/layers.css">
        <link rel="stylesheet" type="text/css" href="plugins/revolution/revolution/css/settings.css">
        <link rel="stylesheet" type="text/css" href="plugins/revolution/revolution/css/navigation.css">

        <style>
            @import url('https://fonts.googleapis.com/css?family=Hind:300,400,500,600,700|Lato:100,100i,300,300i,400,400i,700,700i,900,900i|Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|PT+Serif:400,400i,700,700i|Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Roboto+Slab:100,300,400,700|Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Rubik:300,300i,400,400i,500,500i,700,700i,900,900i');
        </style>
        <style>
            .owl-next,.owl-prev
            {
                display : none;
            }
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
                <!-- Slider -->
                <div class="main-slider style-two default-banner">
                    <div class="tp-banner-container">
                        <div class="tp-banner" >
                            <div id="rev_slider_1058_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="agency" data-source="gallery" style="background-color:#222222;padding:0px;">
                                <!-- START REVOLUTION SLIDER 5.3.0.2 fullscreen mode -->
                                <div id="slider_01" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.3.0.2">
                                    <ul>
                                        <!-- SLIDE  -->
                                        <li data-index="rs-2971" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="Power2.easeInOut" data-easeout="default" data-masterspeed="2000"  data-rotate="0"  data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                            <!-- MAIN IMAGE -->
                                            <img src="images/main-slider/slide5.jpg"  alt=""  data-bgposition="center center" data-kenburns="on" data-duration="10000" data-ease="Linear.easeNone" data-scalestart="140" data-scaleend="100" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="3" class="rev-slidebg" data-no-retina>
                                            <!-- LAYERS -->
                                            <!-- LAYER NR. 1 -->
                                            <div class="tp-caption tp-shape tp-shapewrapper " id="slide-100-layer-1" 
                                                 data-x="['center','center','center','center']" 
                                                 data-hoffset="['0','0','0','0']" 
                                                 data-y="['middle','middle','middle','middle']" 
                                                 data-voffset="['0','0','0','0']" 
                                                 data-width="full" data-height="full" 
                                                 data-whitespace="nowrap" 
                                                 data-type="shape" 
                                                 data-basealign="slide" 
                                                 data-responsive_offset="off" 
                                                 data-responsive="off" 
                                                 data-frames='[{"from":"opacity:0;","speed":1000,"to":"o:1;","delay":0,"ease":"Power4.easeOut"},{"delay":"wait","speed":1000,"to":"opacity:0;","ease":"Power4.easeOut"}]' 
                                                 data-textAlign="['left','left','left','left']" 
                                                 data-paddingtop="[0,0,0,0]" 
                                                 data-paddingright="[0,0,0,0]" 
                                                 data-paddingbottom="[0,0,0,0]" 
                                                 data-paddingleft="[0,0,0,0]" 
                                                 style="z-index: 2;background-color:rgba(0, 0, 0, 0.2);border-color:rgba(0, 0, 0, 0);border-width:0px;"> </div>

                                            <!-- LAYER NR. 2 -->
                                            <div class="tp-caption tp-shape tp-shapewrapper " 
                                                 id="slide-2971-layer-19" 
                                                 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                                                 data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
                                                 data-width="full"
                                                 data-height="full"
                                                 data-whitespace="nowrap"

                                                 data-type="shape" 
                                                 data-basealign="slide" 
                                                 data-responsive_offset="off" 
                                                 data-responsive="off"
                                                 data-frames='[{"from":"opacity:0;","speed":2000,"to":"o:1;","delay":"bytrigger","ease":"Power2.easeInOut"},{"delay":"bytrigger","speed":500,"to":"opacity:0;","ease":"nothing"}]'
                                                 data-textAlign="['left','left','left','left']"
                                                 data-paddingtop="[0,0,0,0]"
                                                 data-paddingright="[0,0,0,0]"
                                                 data-paddingbottom="[0,0,0,0]"
                                                 data-paddingleft="[0,0,0,0]"
                                                 data-lasttriggerstate="reset"
                                                 style="z-index: 6;text-transform:left;background-color:rgba(0, 0, 0, 0.5);border-color:rgba(0, 0, 0, 0);border-width:0px;"> 
                                            </div>
                                            <!-- LAYER NR. 3 -->
                                            <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme" 
                                                 id="slide-2971-layer-6" 
                                                 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                                                 data-y="['middle','middle','middle','middle']" data-voffset="['-156','-156','-156','-156']" 
                                                 data-width="100"
                                                 data-height="2"
                                                 data-whitespace="nowrap"

                                                 data-type="shape" 
                                                 data-responsive_offset="on" 

                                                 data-frames='[{"from":"x:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;","speed":2000,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                                                 data-textAlign="['left','left','left','left']"
                                                 data-paddingtop="[0,0,0,0]"
                                                 data-paddingright="[0,0,0,0]"
                                                 data-paddingbottom="[0,0,0,0]"
                                                 data-paddingleft="[0,0,0,0]"

                                                 style="z-index: 7;text-transform:left;background-color:#35373E;border-color:rgba(0, 0, 0, 0);border-width:0px;"> </div>
                                            <!-- LAYER NR. 4 -->
                                            <div class="tp-caption Agency-Title   tp-resizeme" 
                                                 id="slide-2971-layer-2" 
                                                 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                                                 data-y="['middle','middle','middle','middle']" data-voffset="['-80','-101','-108','-107']" 
                                                 data-fontsize="['90','70','50','50']"
                                                 data-lineheight="['90','70','50','50']"
                                                 data-width="none"
                                                 data-height="none"
                                                 data-whitespace="nowrap"

                                                 data-type="text" 
                                                 data-responsive_offset="on" 

                                                 data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;","speed":2000,"to":"o:1;","delay":1250,"ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                                                 data-textAlign="['left','left','left','left']"
                                                 data-paddingtop="[0,0,0,0]"
                                                 data-paddingright="[0,0,0,0]"
                                                 data-paddingbottom="[0,0,0,0]"
                                                 data-paddingleft="[0,0,0,0]"

                                                 style="z-index: 9; white-space: nowrap; font-family:rubik; text-transform:uppercase; color:#002939; font-weight:700;">pregnancy </div>
                                            <!-- LAYER NR. 5 -->
                                            <div class="tp-caption Agency-SubTitle   tp-resizeme" 
                                                 id="slide-2971-layer-4" 
                                                 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                                                 data-y="['middle','middle','middle','middle']" data-voffset="['-10','-41','-46','-45']" 
                                                 data-width="['none','none','480','360']"
                                                 data-height="none"
                                                 data-whitespace="['nowrap','nowrap','normal','normal']"
                                                 data-type="text" 
                                                 data-responsive_offset="on" 
                                                 data-frames='[{"from":"y:50px;opacity:0;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                                                 data-textAlign="['center','center','center','center']"
                                                 data-paddingtop="[0,0,0,0]"
                                                 data-paddingright="[0,0,0,0]"
                                                 data-paddingbottom="[0,0,0,0]"
                                                 data-paddingleft="[0,0,0,0]"
                                                 style="z-index: 13; white-space: nowrap; text-transform:left; font-size:18px;  color:#35373E; font-family:rubik; font-weight:700;">We Provide Best Services  </div>

                                            <div class="tp-caption " 
                                                 id="slide-2971-layer-5" 
                                                 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                                                 data-y="['middle','middle','middle','middle']" data-voffset="['50','10','10','10']" 
                                                 data-width="['none','none','480','360']"
                                                 data-height="none"
                                                 data-whitespace="['nowrap','nowrap','normal','normal']"
                                                 data-type="text" 
                                                 data-responsive_offset="on" 
                                                 data-frames='[{"from":"y:50px;opacity:0;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                                                 data-textAlign="['center','center','center','center']"
                                                 data-paddingtop="[0,0,0,0]"
                                                 data-paddingright="[0,0,0,0]"
                                                 data-paddingbottom="[0,0,0,0]"
                                                 data-paddingleft="[0,0,0,0]"
                                                 style="z-index: 13;">
                                                <a href="#" class="site-button">Read More</a>
                                            </div>
                                        </li>

                                    </ul>
                                    <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
                                </div>
                            </div>
                            <!-- END REVOLUTION SLIDER -->
                        </div>
                    </div>
                </div>
                <!-- Slider END -->
                <!-- About -->
                <div class="section-full overlay-primary-dark  bg-img-fix content-inner-1" style="padding-top: 10px; padding-bottom: 10px;">
                    <div class="container" >
                        <div class="section-content" >
                            <div class="owl-carousel owl-theme owl-btn-center-lr testimonial-one  btn-white owl-dots-black-full">
                                <a href="product-list.php"><img src="../admin/upload/posters/all-products.jpg" alt="alt"/></a>
                                <a href="company-product.php?cid=3"><img src="../admin/upload/posters/mamaearth.jpg" alt="alt"/></a>
                                <a href="company-product.php?cid=13"><img src="../admin/upload/posters/dettol-product.jpeg" alt="alt"/></a>
                                <a href="company-product.php?cid=8"><img src="../admin/upload/posters/Fair&Lovely-product.jpeg" alt="alt"/></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- About END -->
                <!-- About Company -->
                <div class="section-full content-inner-1 bg-gray">
                    <div class="container">
                        <div  >
                            <h5 class="h5 text-uppercase">Lightning Deals</h5>
                        </div>
                        <div class="section-content">
                            <div class="owl-carousel testimonial-one blog-carousel owl-btn-1 primary owl-btn-center-lr">
                                <?php
                                while ($prorow1 = mysqli_fetch_array($proq)) {
                                    echo "<div class='item'>
                                    <div class='dez-box'>
                                        <div class='dez-media'> 
                                            <a href='product-details.php?pid={$prorow1['pro_id']}'><center><img src='../admin/upload/product/{$prorow1['pro_image']}' style='width:255px;height:250px;' alt=''></img></a> 
                                        </div>
                                        <div class='dez-info p-t20'>
                                            <h4 class='dez-title m-t17'><a href='product-details.php?pid={$prorow1['pro_id']}'>{$prorow1['pro_name']}</a></h4>
                                            <h5 class='dez-title m-t15'>₹ {$prorow1['pro_price']}</h5>
                                            <div class='frame'><a href='product-details.php?pid={$prorow1['pro_id']}' class='custom-btn btn-12'><span>Click!</span><span> See More</span></a> </div>
                                        </div>
                                    </div>
                                </div>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- About Company END -->
                <!-- Get A Quote -->
                <div class="section-full bg-img-fix overlay-primary-dark content-inner-1 dez-support" style="background-image:url(../admin/upload/posters/support1.jpg);">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 text-center text-white ">
                                <h2 class="m-b15 m-t0" style="padding-top:75px;color: black;">We provide 24/7 customer support.</h2>
                                <h3 class="m-t0 m-b20" style="color: black;">Please feel free to contact us at pharmacin2022@gmail.com</h3>
                            </div> 
                        </div>
                    </div>
                </div>
                <!-- Get A Quote END -->
                <!-- Our Projects  -->
                <div class="section-full content-inner-2 bg-gray gallery-projects">
                    <div class="section-head  text-center text-black">
                        <h3 class="h3 text-uppercase text-primary"><span >Our Categories</span></h3>
                    </div>
                    <div class="site-filters clearfix center  m-b40">
                        <ul class="filters" data-toggle="buttons">


<?php
$q = mysqli_query($connection, "select * from tbl_category") or die(mysqli_error($connection));
while ($data = mysqli_fetch_array($q)) {
    echo "<li data-filter='{$data['category_id']}' class='btn '>
                                <input type='radio' >
                                <a href='#' class='site-button-secondry' ><span>{$data['category_name']}</span></a> </li>";
}
?>
                        </ul>
                    </div>
                    <div class="clearfix">
                        <ul id="masonry" class="dez-gallery-listing gallery-grid-4 gallery lightgallery m-b0">


<?php
$qq = mysqli_query($connection, "select  *  from tbl_product ") or die(mysqli_error($connection));
while ($data = mysqli_fetch_array($qq)) {

    echo "<li class='{$data['category_id']} card-container col-lg-3 col-md-3 col-sm-6 p-a0'>
                                <div class='dez-box dez-gallery-box'>
                                    <div class='dez-media dez-img-overlay1 dez-img-effect zoom-slow'><img src='../admin/upload/product/{$data['pro_image']}' style='width:300px;height:250px;' alt=''>
                                        <div class='overlay-bx'>
                                            <div class='overlay-icon'> 
                                                <a href='product-details.php?pid={$data['pro_id']}'> <i class='fa fa-link icon-bx-xs'></i> </a> 
                                                 </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            ";
}
?>






                        </ul>
                    </div>
                </div><br>
                <!-- Our Projects END -->

                <!-- Latest blog -->
                <div class="section-full content-inner-1 bg-gray">
                    <div class="container">
                        <div class="section-head text-center">
                            <h3 class="h3 text-uppercase">Nearest <span class="text-primary">Shops</span></h3>
                        </div>
                        <div class="section-content ">
                            <div class="owl-carousel testimonial-one blog-carousel owl-btn-1 primary owl-btn-center-lr">
<?php
while ($ourven = mysqli_fetch_array($venq)) {
    echo " <div class='item'>
                                    <div class='dez-box'>
                                        <div class='dez-media'> 
                                            <a href='vendor-profile.php?vid={$ourven['vendor_id']}'><center><img src='../admin/upload/vendor-shop/{$ourven['shop_image']}' style='width:250px;height:250px;' alt=''></a> 
                                        </div>
                                       <div class='dez-info p-t20'>
                                            <div class='dez-post-meta'>
                                                <center><ul>
                                                    <li class='post-author'><i class='fa fa-user'></i><a href='#'>{$ourven['vendor_name']}</a> </li>
                                                     <li class=''> <i class='fa fa-calendar'></i><strong>{$ourven['shop_timing']}</strong></li>
                                                </ul></center>
                                            </div>
                                            <center>
                                            <h4 class='dez-title m-t15'><a href='vendor-profile.php?vid={$ourven['vendor_id']}'>{$ourven['shop_name']}</a></h4>
                                            <div class='frame'><a href='vendor-profile.php?vid={$ourven['vendor_id']}' class='custom-btn btn-12'><span>Click!</span><span>See More</span></i></a> </div></center>
                                        </div>
                                    </div>
                                </div>";
}
?>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- Latest blog END -->
                <!-- Client logo -->
                <div class="section-full dez-we-find bg-img-fix p-t50 p-b50 ">
                    <div class="container">
                        <div class="section-content">
                            <div class="owl-carousel client-logo-carousel owl-btn-center-lr owl-btn-1 primary">
<?php
while ($row = mysqli_fetch_array($logoq)) {
    echo "  <div class='item'>";
    echo "<div class='ow-client-logo'>";
    echo "<div class='client-logo'><a href='company-product.php?cid={$row['company_id']}'><img src='../admin/upload/company-logo/{$row['company_logo']}' alt=''></a></div>";
    echo "</div>";
    echo "</div>";
}
?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Client logo END -->
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
        <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        <script src="js/combining.js"></script><!-- COMBINING JS  -->
        <!-- revolution JS FILES -->
        <script src="plugins/revolution/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script src="plugins/revolution/revolution/js/jquery.themepunch.revolution.min.js"></script>
        <script src="js/rev.slider.js"></script>
        <script>
            jQuery(document).ready(function () {
                'use strict';
                dz_rev_slider_1();

            });	/*ready*/
        </script>
    </body>

    <!-- Mirrored from medico.dexignzone.com/xhtml/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Jan 2022 11:14:07 GMT -->
</html>
