<?php
session_start();

require './class/atclass.php';
$vendorid = $_SESSION['vi'];
$sql = "SELECT
    `tbl_customer`.`customer_image`
    , `tbl_customer`.`customer_name`
    , `tbl_orderdetails`.`order_id`
    , `tbl_product_vendor`.`vendor_id`
    , `tbl_ordermaster`.`shipping_name`
FROM
    `tbl_product_vendor`
    INNER JOIN `tbl_orderdetails` 
        ON (`tbl_product_vendor`.`pro_ven_id` = `tbl_orderdetails`.`pro_ven_id`)
    INNER JOIN `tbl_ordermaster` 
        ON (`tbl_ordermaster`.`order_id` = `tbl_orderdetails`.`order_id`)
    INNER JOIN `tbl_customer` 
        ON (`tbl_customer`.`customer_id` = `tbl_ordermaster`.`customer_id`) WHERE `tbl_product_vendor`.`vendor_id`=$vendorid GROUP BY `tbl_orderdetails`.`order_id` DESC LIMIT 0,5;";
$q = mysqli_query($connection, $sql);
?>
<!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img class="brand-title" src="images/pharma.jpg" alt="">
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
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            
                        </div>
                        <ul class="navbar-nav header-right">
                            <li style="padding-top: 30px;">Hello,<?php echo $_SESSION['vn'] ?>
                        </li>
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell ai-icon" href="#" role="button" data-toggle="dropdown">
                                    <svg id="icon-user" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
										<path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
										<path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
									</svg>
                                    <div class="pulse-css"></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="list-unstyled">
                                        
                                        <?php
                                        while ($row = mysqli_fetch_array($q))
                                        {
                                            echo "<li class='media dropdown-item'>
                                            <span class='success'><i class='ti-user'></i></span>
                                            <div class='media-body'>
                                                <a href='#'>
                                                    <p><strong>{$row['shipping_name']}</strong> has Order Something<strong>customer</strong>
                                                    </p>
                                                </a>
                                            </div>
                                            <span class='notify-time'>Order Id :{$row['order_id']}</span>
                                        </li>";
                                            
                                        }
                                        ?>
                                        
                                    </ul>
                                    <a class="all-notification" href="manage-order.php">See all notifications <i
                                            class="ti-arrow-right"></i></a>
                                </div>
                            </li>
                             <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <img src="../admin/upload/vendor/<?php echo $_SESSION['vimage']; ?>" width="20" alt=""/>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="vendor-profile.php" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="change-password.php" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ml-2">Change Password</span>
                                    </a>
                                    <a href="log-out.php" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->
