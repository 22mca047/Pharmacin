<?php
session_start();

if (!isset($_SESSION['adminid'])) {
    header("location:../user/admin-login.php");
}

require './class/atclass.php';
$selectq = mysqli_query($connection, "select * from tbl_customer") or die(mysqli_errno($connection));
$countcustomer = mysqli_num_rows($selectq);
$selectq11 = mysqli_query($connection, "select * from tbl_vendor where is_verified=1 and is_blocked=1") or die(mysqli_errno($connection));
$countvendor = mysqli_num_rows($selectq11);
$orderyog = "SELECT
    `tbl_ordermaster`.`order_id`
    , `tbl_ordermaster`.`order_date`
    , `tbl_ordermaster`.`order_status`
    , `tbl_ordermaster`.`shipping_name`
    , `tbl_ordermaster`.`shipping_mobileno`
    , `tbl_ordermaster`.`shipping_address`
    , `tbl_vendor`.`vendor_name`
    , `tbl_customer`.`customer_name`
FROM
    `tbl_ordermaster`
    INNER JOIN `tbl_orderdetails` 
        ON (`tbl_ordermaster`.`order_id` = `tbl_orderdetails`.`order_id`)
    INNER JOIN `tbl_product_vendor` 
        ON (`tbl_product_vendor`.`pro_ven_id` = `tbl_orderdetails`.`pro_ven_id`)
    INNER JOIN `tbl_vendor` 
        ON (`tbl_vendor`.`vendor_id` = `tbl_product_vendor`.`vendor_id`)
    INNER JOIN `tbl_customer` 
        ON (`tbl_customer`.`customer_id` = `tbl_ordermaster`.`customer_id`);";
$selectq2 = mysqli_query($connection, $orderyog) or die(mysqli_errno($connection));
$countorder = mysqli_num_rows($selectq2);
$selectq3 = mysqli_query($connection, "select * from tbl_payment") or die(mysqli_errno($connection));
?>

<!DOCTYPE html>
<html lang="en">
    <!-- Mirrored from medico.dexignzone.com/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Dec 2021 10:57:05 GMT -->
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>PHARMACIN - Admin Dashboard</title>
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="upload/final.jpg">
        <link rel="stylesheet" href="vendor/jqvmap/css/jqvmap.min.css">
        <link rel="stylesheet" href="vendor/chartist/css/chartist.min.css">
        <link rel="stylesheet" href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css">
        <link rel="stylesheet" href="css/style.css">

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

            <!-- header --> 
            <?php
            include './themepart/header.php';
            ?>
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
                <!-- row -->
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-xl-3 col-xxl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="widget-stat card">
                                <div class="card-body">
                                    <div class="media ai-icon">
                                        <span class="mr-3">
                                                <!-- <i class="ti-user"></i> -->
                                            <svg id="icon-users2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                        </span>
                                        <div class="media-body">
                                            <p class="mb-1">Customers</p>
                                            <h4 class="mb-0"><?php echo $countcustomer; ?></h4>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-xxl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="widget-stat card">
                                <div class="card-body">
                                    <div class="media ai-icon">
                                        <span class="mr-3">
                                            <svg id="icon-customers" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                            </svg>
                                        </span>
                                        <div class="media-body">
                                            <p class="mb-1">Vendors</p>
                                            <h4 class="mb-0"><?php echo $countvendor; ?></h4>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-xxl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="widget-stat card">
                                <div class="card-body">
                                    <div class="media ai-icon">
                                        <span class="mr-3">
                                            <svg id="icon-revenue" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
                                            <line x1="12" y1="1" x2="12" y2="23"></line>
                                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                            </svg>
                                        </span>
                                        <div class="media-body">
                                            <p class="mb-1">Selling</p>
                                            <h4 class="mb-0"><?php
                                                $total = 0;
                                                while ($selling = mysqli_fetch_array($selectq3)) {
                                                    $total = $total + $selling['amount'];
                                                }
                                                echo "₹ " . $total;
                                                ?></h4>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-xxl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="widget-stat card">
                                <div class="card-body">
                                    <div class="media ai-icon">
                                        <span class="mr-3">
                                            <svg id="icon-database-widget" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database">
                                            <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                                            <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                                            <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                                            </svg>
                                        </span>
                                        <div class="media-body">
                                            <p class="mb-1">Orders</p>
                                            <h4 class="mb-0"><?php
                                                $selectq1 = mysqli_query($connection, "SELECT *from tbl_orderdetails GROUP BY order_id");
                                                $i = 0;
                                                while ($orderrow1 = mysqli_fetch_array($selectq1)) {
                                                    $selectq2 = mysqli_query($connection, "SELECT *from tbl_ordermaster where order_id='{$orderrow1['order_id']}'");
                                                    $orderrow2 = mysqli_fetch_assoc($selectq2);

                                                    $selectq3 = mysqli_query($connection, "SELECT *from tbl_product_vendor where pro_ven_id='{$orderrow1['pro_ven_id']}'");
                                                    $orderrow3 = mysqli_fetch_assoc($selectq3); {
                                                        $i++;
                                                    }
                                                }
                                                echo $i;
                                                ?>
                                            </h4>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-xxl-4 col-lg-4 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-body">

                                    <div class="profile-photo">
                                        <img src="upload/admin/<?php echo $_SESSION['adminimage']; ?>" width="100%" height="100%" alt="">
                                    </div>


                                </div>
                                <div class="card-footer pt-0 pb-0 text-center">
                                    <h3 class="mt-4 mb-1"><?php echo "Name : " . $_SESSION['adminname']; ?></h4>
                                        <p class="text-muted">Admin Id :<?php echo "" . $_SESSION['adminid']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-xxl-8 col-lg-8 col-md-12 col-sm-12">
                            <div id="user-activity" class="card">


                                <div class="card-body">
                                    <div class="tab-content mt-5" id="myTabContent">
                                        <div class="tab-pane fade show active" id="user" role="tabpanel">

                                            <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

                                            <!--<canvas id="activity" class="chartjs"></canvas> -->
                                        </div>
                                    </div>
                                </div>




                            </div>
                        </div>
                        <div class="col-xl-4 col-xxl-6 col-lg-6 col-md-12 col-sm-12">					
                            <div class="card" >
                                <div class="card-header">
                                    <h4 class="card-title">Customer List</h4>
                                </div>
                                <div class="py-2 scrollbar" id="style-3">
                                    <ul class="list-group list-group-flush force-overflow">
<?php
while ($cust = mysqli_fetch_array($selectq)) {
    echo '<li class="list-group-item" >';
    echo '<a class="timeline-panel text-muted d-flex align-items-center" href="javascript:void(0);">';
    echo '<div class="col pr-1">';
    echo "<h5 class='mb-1'>{$cust['customer_name']}</h5>";
    echo '<div class="d-flex align-items-center justify-content-between">';
    echo "<small class='d-block'>Customer Id :{$cust['customer_id']}</small>&nbsp;&nbsp;";
    echo "<small class='d-block'>Pincode :{$cust['area_id']}</small>";
    echo "<div class='btn btn-rounded btn-outline-dark'><a href='customerprofile.php?eid={$cust['customer_id']}'>See More</a></div>";
    echo '</div>';
    echo '</div>';
    echo '</a>';
    echo '</li>';
}
?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-xxl-6 col-lg-4 col-md-12 col-sm-12">					
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Vendor List</h4>
                                </div>
                                <div class="py-2 scrollbar" id="style-3">
                                    <ul class="list-group list-group-flush force-overflow">
<?php
while ($ven = mysqli_fetch_array($selectq11)) {
    echo '<li class="list-group-item">';
    echo '<a class="timeline-panel text-muted d-flex align-items-center" href="javascript:void(0);">';
    echo '<div class="col pr-1">';
    echo "<h5 class='mb-1'>{$ven['vendor_name']}</h5>";
    echo '<div class="d-flex align-items-center justify-content-between">';
    echo "<small class='d-block'>Vendor Id :{$ven['vendor_id']}</small><br/>&nbsp;&nbsp;";
    echo "<small class='d-block'>Pincode :{$ven['area_id']}</small>";
    echo "<div class='btn btn-rounded btn-outline-dark'><a href='vendorprofile.php?eid={$ven['vendor_id']}'>See More</a></div>";
    echo '</div>';
    echo '</div>';
    echo '</a>';
    echo '</li>';
}
?>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Order List</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive recentOrderTable scrollbar1"  id="style-3-3">
                                        <table class="table verticle-middle table-responsive-md force-overflow-1">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Order Id.</th>
                                                    <th scope="col">Customer Name</th>
                                                    <th scope="col">Vendor Name</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Shipping Name</th>
                                                    <th scope="col">Mobile No</th>
                                                    <th scope="col">Shipping Address</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php
$i = 0;
$selectq1 = mysqli_query($connection, "SELECT *from tbl_orderdetails GROUP BY order_id");
while ($orderrow1 = mysqli_fetch_array($selectq1)) {
    $selectq2 = mysqli_query($connection, "SELECT *from tbl_ordermaster where order_id='{$orderrow1['order_id']}'");
    $orderrow2 = mysqli_fetch_assoc($selectq2);

    $selectq3 = mysqli_query($connection, "SELECT *from tbl_product_vendor where pro_ven_id='{$orderrow1['pro_ven_id']}'");
    $orderrow3 = mysqli_fetch_assoc($selectq3);

    $selectq4 = mysqli_query($connection, "SELECT * from tbl_customer where customer_id='{$orderrow2['customer_id']}'");
    $orderrow4 = mysqli_fetch_assoc($selectq4);

    $selectq5 = mysqli_query($connection, "SELECT *from tbl_vendor where vendor_id='{$orderrow3['vendor_id']}'");
    $orderrow5 = mysqli_fetch_assoc($selectq5);
    $i++;
    echo "<tr>";
    echo "<td>{$i}</td>";
    echo "<td>{$orderrow4['customer_name']}</td>";
    echo "<td>{$orderrow5['vendor_name']}</td>";
    echo "<td>{$orderrow2['order_date']}</td>";
    echo "<td>{$orderrow2['order_status']}</td>";
    echo "<td>{$orderrow2['shipping_name']}</td>";
    echo "<td>{$orderrow2['shipping_mobileno']}</td>";
    echo "<td>{$orderrow2['shipping_address']}</td>";
    echo "</tr>";
}
?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th scope="col">Order Id.</th>
                                                    <th scope="col">Customer Name</th>
                                                    <th scope="col">Vendor Name</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Shipping Name</th>
                                                    <th scope="col">Mobile No</th><!-- comment -->
                                                    <th scope="col">Shipping Address</th>
                                                    <th scope="col"></th>
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

        </div>
        <!--**********************************
            Main wrapper end
        ***********************************-->

        <!--**********************************
            Scripts
        ***********************************-->
        <!-- Required vendors -->
        <script src="vendor/global/global.min.js"></script>
        <script src="js/deznav-init.js"></script>	
        <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
        <script src="js/custom.min.js"></script>

        <!-- Vectormap -->
        <script src="vendor/chart.js/Chart.bundle.min.js"></script>
        <script src="vendor/gaugeJS/dist/gauge.min.js"></script>

        <!-- Counter Up -->
        <script src="vendor/waypoints/jquery.waypoints.min.js"></script>
        <script src="vendor/jquery.counterup/jquery.counterup.min.js"></script>

        <!-- Demo scripts -->
        <script src="js/dashboard/dashboard.js"></script>

        <!-- Svganimation scripts -->
        <script src="vendor/svganimation/vivus.min.js"></script>
        <script src="vendor/svganimation/svg.animation.js"></script>

        <script type="text/javascript">
            $(function () {
                $('#container').highcharts({
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: 1, //null,
                        plotShadow: false
                    },
                    title: {
                        text: 'Category Wise Chart'
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                style: {
                                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                }
                            }
                        }
                    },
                    series: [{
                            type: 'pie',
                            name: 'Product',
                            data: [

<?php
require './class/atclass.php';
$q = mysqli_query($connection, "SELECT
    `tbl_product`.`pro_id`
    , COUNT(`tbl_product`.`pro_name`)
    , `tbl_category`.`category_name`
FROM
    `tbl_category`
    INNER JOIN `tbl_product` 
        ON (`tbl_category`.`category_id` = `tbl_product`.`category_id`)
GROUP BY `tbl_category`.`category_name`;") or die(mysql_error());
while ($data = mysqli_fetch_row($q)) {
    echo "['$data[2]',$data[1]],";
}
?>

                            ]
                        }]
                });
            });


        </script>
        <script src="highcharts.js"></script>
        <script src="exporting.js"></script>
    </body>

    <!-- Mirrored from medico.dexignzone.com/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Dec 2021 10:57:22 GMT -->
</html>