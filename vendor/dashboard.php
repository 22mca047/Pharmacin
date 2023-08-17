<?php
session_start();

if (!isset($_SESSION['vi'])) {
    header("location:../user/vendor-login.php");
}

require './class/atclass.php';

$vendorq = mysqli_query($connection, "select * from tbl_vendor where vendor_id = '{$_SESSION['vi']}'") or die(mysqli_error($connection));
$venrow = mysqli_fetch_array($vendorq);

$selectq = mysqli_query($connection, "select * from tbl_product_vendor where vendor_id = '{$_SESSION['vi']}'") or die(mysqli_error($connection));
$countproven = mysqli_num_rows($selectq);

$ordermaster = "SELECT
    `tbl_ordermaster`.`order_id`
    , `tbl_ordermaster`.`order_date`
    , `tbl_ordermaster`.`order_status`
    , `tbl_ordermaster`.`shipping_name`
    , `tbl_ordermaster`.`shipping_mobileno`
    , `tbl_ordermaster`.`shipping_address`
    , `tbl_customer`.`customer_name`
FROM
    `tbl_customer`
    INNER JOIN `tbl_ordermaster` 
        ON (`tbl_customer`.`customer_id` = `tbl_ordermaster`.`customer_id`)
    INNER JOIN `tbl_orderdetails` 
        ON (`tbl_ordermaster`.`order_id` = `tbl_orderdetails`.`order_id`)
    INNER JOIN `tbl_product_vendor` 
        ON (`tbl_orderdetails`.`pro_ven_id` = `tbl_product_vendor`.`pro_ven_id`)
    INNER JOIN `tbl_vendor` 
        ON (`tbl_vendor`.`vendor_id` = `tbl_product_vendor`.`vendor_id`) where `tbl_vendor`.`vendor_id` = '{$_SESSION['vi']}'";
$selectql = mysqli_query($connection, $ordermaster) or die(mysqli_error($connection));
$countordermas = mysqli_num_rows($selectql);

$feed = "SELECT
    `tbl_feedback`.`feedback_id`
    , `tbl_product_vendor`.`vendor_id`
FROM
    `tbl_orderdetails`
    INNER JOIN `tbl_feedback` 
        ON (`tbl_orderdetails`.`details_id` = `tbl_feedback`.`details_id`)
    INNER JOIN `tbl_product_vendor` 
        ON (`tbl_product_vendor`.`pro_ven_id` = `tbl_orderdetails`.`pro_ven_id`) WHERE `tbl_product_vendor`.`vendor_id`='{$_SESSION['vi']}'";
$selectq2 = mysqli_query($connection, $feed) or die(mysqli_error($connection));
$countfeedback = mysqli_num_rows($selectq2);

$selectq3 = "SELECT
    `tbl_orderdetails`.`order_id`
    , `tbl_ordermaster`.`order_date`
    , `tbl_ordermaster`.`order_status`
    , `tbl_ordermaster`.`shipping_name`
    , `tbl_ordermaster`.`shipping_mobileno`
    , `tbl_ordermaster`.`shipping_address`
    , `tbl_orderdetails`.`pro_price`
    , `tbl_orderdetails`.`pro_qty`
    , `tbl_product_vendor`.`vendor_id`
    , `tbl_payment`.`method`
    , `tbl_ordermaster`.`shipping_name`
    , `tbl_ordermaster`.`shipping_mobileno`
    , `tbl_orderdetails`.`status`
FROM
    `tbl_ordermaster`
    INNER JOIN `tbl_orderdetails` 
        ON (`tbl_ordermaster`.`order_id` = `tbl_orderdetails`.`order_id`)
    INNER JOIN `tbl_payment` 
        ON (`tbl_ordermaster`.`order_id` = `tbl_payment`.`order_id`)
    INNER JOIN `tbl_product_vendor` 
        ON (`tbl_product_vendor`.`pro_ven_id` = `tbl_orderdetails`.`pro_ven_id`)
    WHERE `tbl_product_vendor`.`vendor_id` = '{$_SESSION['vi']}' and `tbl_orderdetails`.`status`='Completed' ";

$sellingq = mysqli_query($connection, $selectq3) or die(mysqli_error($connection));

$sql = "SELECT
    `tbl_ordermaster`.`order_id`
    , `tbl_ordermaster`.`order_date`
    , `tbl_ordermaster`.`order_status`
    , `tbl_ordermaster`.`shipping_name`
    , `tbl_ordermaster`.`shipping_mobileno`
    , `tbl_ordermaster`.`shipping_address`
    , `tbl_product_vendor`.`vendor_id`
FROM
    `tbl_ordermaster`
    INNER JOIN `tbl_orderdetails` 
        ON (`tbl_ordermaster`.`order_id` = `tbl_orderdetails`.`order_id`)
    INNER JOIN `tbl_product_vendor` 
      ON (`tbl_product_vendor`.`pro_ven_id` = `tbl_orderdetails`.`pro_ven_id`)   WHERE `tbl_product_vendor`.`vendor_id`
= '{$_SESSION['vi']}'  GROUP BY `tbl_product_vendor`.`vendor_id`;";
$selectq4 = mysqli_query($connection, $sql) or die(mysqli_error($connection));
?>
<!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from medico.dexignzone.com/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Dec 2021 10:57:05 GMT -->
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>PHARMACIN - dashboard </title>
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="../admin/upload/final.jpg">
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
            include './themepart/sidebar.php';
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
                                            <svg id="icon-customers" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                            </svg>
                                        </span>
                                        <div class="media-body">	
                                            <p class="mb-1">Total Product</p>
                                            <h4 class="mb-0"><?php echo $countproven; ?></h4>
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
                                            <svg id="icon-orders" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
                                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                            <polyline points="14 2 14 8 20 8"></polyline>
                                            <line x1="16" y1="13" x2="8" y2="13"></line>
                                            <line x1="16" y1="17" x2="8" y2="17"></line>
                                            <polyline points="10 9 9 9 8 9"></polyline>
                                            </svg>
                                        </span>
                                        <div class="media-body">
                                            <p class="mb-1">Total Orders</p>
                                            <h4 class="mb-0">
                                                <?php
                                                $selectq1 = mysqli_query($connection, "SELECT
    `tbl_ordermaster`.`order_status`
    , `tbl_ordermaster`.`shipping_name`
    , `tbl_ordermaster`.`shipping_mobileno`
    , `tbl_ordermaster`.`shipping_address`
    , `tbl_orderdetails`.`order_id`
    , `tbl_ordermaster`.`order_date`
    , `tbl_product_vendor`.`vendor_id`
FROM
    `tbl_ordermaster`
    INNER JOIN `tbl_orderdetails` 
        ON (`tbl_ordermaster`.`order_id` = `tbl_orderdetails`.`order_id`)
    INNER JOIN `tbl_product_vendor` 
        ON (`tbl_product_vendor`.`pro_ven_id` = `tbl_orderdetails`.`pro_ven_id`)
    WHERE `tbl_product_vendor`.`vendor_id` = '{$_SESSION['vi']}'
GROUP BY `tbl_orderdetails`.`order_id`;");
                                                $i = 0;
                                                while ($orderrow1 = mysqli_fetch_array($selectq1)) {
                                                    $i++;
                                                }
                                                echo $i;
                                                ?>
                                            </h4>
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
                                                $countselling = 0;
                                                while ($selling = mysqli_fetch_array($sellingq)) {
                                                    $countselling = $countselling + ($selling['pro_price'] * $selling['pro_qty']);
                                                }
                                                echo " ₹ $countselling";
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
                                            <svg id="-database-widgiconet" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database">
                                            <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                                            <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                                            <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                                            </svg>
                                        </span>
                                        <div class="media-body">
                                            <p class="mb-1">Total Feedback</p>
                                            <h4 class="mb-0"><?php echo $countfeedback; ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="col-xl-8 col-xxl-12 col-lg-8 col-md-12 col-sm-12">
                            <div id="user-activity" class="card">

                                <div class="card-body">
                                    <div class="tab-content mt-5" id="myTabContent">
                                        <div class="tab-pane fade show active" id="user" role="tabpanel">

                                            <?php
                                            require './class/atclass.php';
                                            $q = mysqli_query($connection, "SELECT
    `tbl_orderdetails`.`details_id`
    , `tbl_orderdetails`.`order_id`
    ,  SUM(`tbl_orderdetails`.`pro_qty`)
    ,`tbl_orderdetails`.`pro_price`
    , `tbl_orderdetails`.`pro_ven_id`
    , `tbl_product_vendor`.`vendor_id`
    , `tbl_product`.`pro_name`
FROM
    `tbl_product_vendor`
    INNER JOIN `tbl_orderdetails` 
        ON (`tbl_product_vendor`.`pro_ven_id` = `tbl_orderdetails`.`pro_ven_id`)
    INNER JOIN `tbl_product` 
        ON (`tbl_product`.`pro_id` = `tbl_product_vendor`.`pro_id`) where `tbl_product_vendor`.`vendor_id`='{$_SESSION['vi']}' and `tbl_orderdetails`.`status`='Completed' 
GROUP BY `tbl_orderdetails`.`pro_ven_id` ;") or die(mysql_error());
                                            $ordercount = mysqli_num_rows($q);

                                            if ($ordercount < 1) {
                                                echo "<center><h3>No Selling Yet</h3></center>";
                                            } else {
                                                ?>
                                                <div id="container" style="min-width: 900px; height: 400px; max-width: 600px; margin: 0 auto"></div>


                                                <?php
                                            }
                                            ?>


                                        <!--<canvas id="activity" class="chartjs"></canvas> -->
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Order list</h4>
                                </div>
                                <div class="card-body scrollbar1" id="style-3-3">
                                    <div class="table-responsive recentOrderTable">
                                        <table class="table verticle-middle table-responsive-md">
                                            <tr>
                                                <th scope="col">Order Id.</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Shipping Name</th>
                                                <th scope="col">Mobile No</th>
                                                <th scope="col">Shipping Address</th>
                                            </tr>
                                            <tbody>
                                                <?php
                                                $selectq1 = mysqli_query($connection, "SELECT
    `tbl_ordermaster`.`order_status`
    , `tbl_ordermaster`.`shipping_name`
    , `tbl_ordermaster`.`shipping_mobileno`
    , `tbl_ordermaster`.`shipping_address`
    , `tbl_orderdetails`.`order_id`
    , `tbl_ordermaster`.`order_date`
    , `tbl_product_vendor`.`vendor_id`
FROM
    `tbl_ordermaster`
    INNER JOIN `tbl_orderdetails` 
        ON (`tbl_ordermaster`.`order_id` = `tbl_orderdetails`.`order_id`)
    INNER JOIN `tbl_product_vendor` 
        ON (`tbl_product_vendor`.`pro_ven_id` = `tbl_orderdetails`.`pro_ven_id`)
    WHERE `tbl_product_vendor`.`vendor_id` = '{$_SESSION['vi']}'
GROUP BY `tbl_orderdetails`.`order_id`;");
                                                $count = mysqli_num_rows($selectq1);
                                                if ($count < 1) {
                                                    echo "<tr>";
                                                    echo "<td style='text-align:center;' colspan=6>No Record Found</td>";
                                                    echo "</tr>";
                                                } else {
                                                    $i = 1;
                                                    while ($orderrow1 = mysqli_fetch_array($selectq1)) {
                                                        echo "<tr>";
                                                        echo "<td>$i</td>";
                                                        echo "<td>{$orderrow1['order_date']}</td>";
                                                        echo "<td>{$orderrow1['order_status']}</td>";
                                                        echo "<td>{$orderrow1['shipping_name']}</td>";
                                                        echo "<td>{$orderrow1['shipping_mobileno']}</td>";
                                                        echo "<td>{$orderrow1['shipping_address']}</td>";
                                                        echo "</tr>";
                                                        $i++;
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th scope="col">Order Id.</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Shipping Name</th>
                                                    <th scope="col">Mobile No</th>
                                                    <th scope="col">Shipping Address</th>
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
                        text: 'Product Wise Selling'
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
                            name: 'Selling',
                            data: [

<?php
while ($data = mysqli_fetch_row($q)) {
    echo "['$data[6]',$data[2]],";
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