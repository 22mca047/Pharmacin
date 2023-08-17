<?php
require './class/atclass.php';
$catq = mysqli_query($connection, "select * from tbl_category") or die(mysqli_error($connection));
$comq = mysqli_query($connection, "select * from tbl_company") or die(mysqli_error($connection));
?>
<style>
    .bt-support-now {
        display: none;
    }
    .bt-buy-now {
        display: none;
    }
    .switch-btn{
        display: none;
    }
</style>
<header class="site-header header header-style-2 dark mo-left">
    <!-- top bar -->
    <div class="top-bar">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="dez-topbar-left">
                    <ul class="social-line text-center pull-right">
                        <?php
                        if (isset($_SESSION['ci'])) {
                            $custimage = $_SESSION['cimage'];
                            $custname = $_SESSION['cn'];

                            echo "<li><img src='../admin/upload/customer/$custimage' style='height:50px;width:50px;'></li>";

                            echo "<li style='padding-top:20px;padding-left:20px;'> Welcome, $custname</li>";
                        }
                        ?>
                    </ul>
                </div>
                <div class="dez-topbar-right pt-2 pb-2">
                    <ul class="social-line text-center pull-right">
                        <li><a href="vendor-login.php">Are you vendor?</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- top bar END-->
    <!-- main header -->
    <div class="sticky-header  main-bar-wraper navbar-expand-lg">
        <div class="main-bar clearfix " >
            <div class="container clearfix" >
                <!-- website logo -->
                <div class="logo-header mostion"><a href="home.php"><img src="images/Final1.png" width="193" height="89" alt=""></a></div>
                <!-- nav toggle button -->
                <button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <!-- extra nav -->
                <div class="extra-nav" >
                    <div class="extra-cell">
                        <button id="quik-search-btn"  type="button" class="site-button"><i class="fa fa-search"></i></button>
                    </div>
                </div> 
                <!-- Quik search -->
                <div class="dez-quik-search bg-primary ">
                    <form action="product-list.php" method="get">
                        <input name="search" value="" type="text" class="form-control" placeholder="Type to search"> 
                        <span  id="quik-search-remove"><i class="fa fa-remove"></i></span>
                    </form>
                </div>
                <!-- main nav -->
                <div class="header-nav navbar-collapse collapse justify-content-end" id="navbarNavDropdown" >
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="home.php" >Home</a>
                        </li>

                        <li>
                            <a href="product-list.php">Shop</a>
                        </li>
                        <li> <a href="javascript:;">Category<i class="fa fa-chevron-down"></i></a>
                            <ul class="sub-menu">
                                <?php
                                while ($cat = mysqli_fetch_array($catq)) {
                                    echo "<li> <a href='category_product.php?catid={$cat['category_id']}'>{$cat['category_name']}</a></li>";
                                }
                                ?>
                            </ul>
                        </li>
                        <li> <a href="javascript:;">Company<i class="fa fa-chevron-down"></i></a>
                            <ul class="sub-menu">
                                <?php
                                while ($com = mysqli_fetch_array($comq)) {
                                    echo "<li> <a href='company-product.php?cid={$com['company_id']}'>{$com['company_name']}</a></li>";
                                }
                                ?>
                            </ul>
                        </li>
                        <li> <a href="vendors-list.php">Near By Shops<i class="fa fa-chevron-down"></i></a>
                        </li>
                        <li> <a href="javascript:;">Pages<i class="fa fa-chevron-down"></i></a>
                            <ul class="sub-menu">
                                <li> 
                                    <a href="user-login.php">Login/Register</a>
                                </li>
                                <li> <a href="about-us.php">About us</a>
                                </li>
                                <li> <a href="add-to-cart.php">Cart</a>
                                </li>
                                <li> <a href="user-order.php">Your Orders</a>
                                </li>
                                <li> <a href="contact-us.php">Contact US</a>
                                </li>
                                <li> <a href="user-logout.php">Log Out</a>
                                </li>

                            </ul>
                        </li>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- main header END -->
</header>

<a href="add-to-cart.php"><img src="../admin/upload/ani_icons/shopping-cart.gif" class="pulse" style="height: auto; width: 64px;background:none; position: fixed;border-radius: 35px; bottom: 0; margin: 0 0 10px 10px; z-index: 9999;"></a>