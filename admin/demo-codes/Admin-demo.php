<!DOCTYPE html>
<html lang="en">


    <!-- Mirrored from medico.dexignzone.com/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Dec 2021 10:57:05 GMT -->
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>PHARMACIN - Admin Dashboard </title>
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
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
                                            <svg id="icon-customers" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                            </svg>
                                        </span>
                                        <div class="media-body">
                                            <p class="mb-1">Customers</p>
                                            <h4 class="mb-0">3280</h4>
                                            <span class="badge badge-primary">+3.5%</span>
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
                                            <p class="mb-1">Vendors</p>
                                            <h4 class="mb-0">2570</h4>
                                            <span class="badge badge-warning">+3.5%</span>
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
                                            <p class="mb-1">Total Selling</p>
                                            <h4 class="mb-0">364.50K</h4>
                                            <span class="badge badge-danger">-3.5%</span>
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
                                            <p class="mb-1">Total Orders</p>
                                            <h4 class="mb-0">364.50K</h4>
                                            <span class="badge badge-success">-3.5%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-xxl-4 col-lg-4 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">
                                        <div class="profile-photo">
                                            <img src="images/profile/profile.png" width="100" class="img-fluid rounded-circle" alt="">
                                        </div>
                                        <h3 class="mt-4 mb-1">Deangelo Sena</h4>
                                            <p class="text-muted">Senior Doctor</p>
                                            <a class="btn btn-outline-primary btn-rounded mt-3 pl-5 pr-5" href="javascript:void()">Folllow</a>
                                    </div>
                                </div>
                                <div class="card-footer pt-0 pb-0 text-center">
                                    <div class="row">
                                        <div class="col-4 pt-3 pb-3 border-right">
                                            <h3 class="mb-1">150</h3><span>Follower</span>
                                        </div>
                                        <div class="col-4 pt-3 pb-3 border-right">
                                            <h3 class="mb-1">140</h3><span>Place Stay</span>
                                        </div>
                                        <div class="col-4 pt-3 pb-3">
                                            <h3 class="mb-1">45</h3><span>Reviews</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-xxl-8 col-lg-8 col-md-12 col-sm-12">
                            <div id="user-activity" class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Visitor Activity</h4>
                                    <div class="card-action">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#user" role="tab">
                                                    Day
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#session" role="tab">
                                                    Week
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#bounce" role="tab">
                                                    Month
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#session-duration" role="tab">
                                                    Year
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="tab-content mt-5" id="myTabContent">
                                        <div class="tab-pane fade show active" id="user" role="tabpanel">
                                            <canvas id="activity" class="chartjs"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-xxl-4 col-lg-4 col-md-12 col-sm-12">					
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Customer List</h4>
                                </div>
                                <div class="py-2">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <a class="timeline-panel text-muted d-flex align-items-center" href="javascript:void(0);">
                                                <img class="rounded-sm" alt="image" width="50" src="images/avatar/1.jpg">
                                                <div class="col pr-1">
                                                    <h5 class="mb-1">James Logan</h5>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <small class="d-block">Dentist - Specialist</small>
                                                        <div class="rating-bar">
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a class="timeline-panel text-muted d-flex align-items-center" href="javascript:void(0);">
                                                <img class="rounded-sm" alt="image" width="50" src="images/avatar/2.jpg">
                                                <div class="col pr-1">
                                                    <h5 class="mb-1">Muhammad Clay</h5>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <small class="d-block">Fever - Specialist</small>
                                                        <div class="rating-bar">
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a class="timeline-panel text-muted d-flex align-items-center" href="javascript:void(0);">
                                                <img class="rounded-sm" alt="image" width="50" src="images/avatar/3.jpg">
                                                <div class="col pr-1">
                                                    <h5 class="mb-1">Jacob Tucker</h5>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <small class="d-block">Dentist - Specialist</small>
                                                        <div class="rating-bar">
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a class="timeline-panel text-muted d-flex align-items-center" href="javascript:void(0);">
                                                <img class="rounded-sm" alt="image" width="50" src="images/avatar/4.jpg">
                                                <div class="col pr-1">
                                                    <h5 class="mb-1">Harry Parker</h5>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <small class="d-block">Fever - Specialist</small>
                                                        <div class="rating-bar">
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-xxl-4 col-lg-4 col-md-12 col-sm-12">					
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Vendor List</h4>
                                </div>
                                <div class="py-2">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <a class="timeline-panel text-muted d-flex align-items-center" href="javascript:void(0);">
                                                <img class="rounded-sm" alt="image" width="50" src="images/avatar/1.jpg">
                                                <div class="col pr-1">
                                                    <h5 class="mb-1">James Logan</h5>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <small class="d-block">Dentist - Specialist</small>
                                                        <div class="rating-bar">
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a class="timeline-panel text-muted d-flex align-items-center" href="javascript:void(0);">
                                                <img class="rounded-sm" alt="image" width="50" src="images/avatar/2.jpg">
                                                <div class="col pr-1">
                                                    <h5 class="mb-1">Muhammad Clay</h5>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <small class="d-block">Fever - Specialist</small>
                                                        <div class="rating-bar">
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a class="timeline-panel text-muted d-flex align-items-center" href="javascript:void(0);">
                                                <img class="rounded-sm" alt="image" width="50" src="images/avatar/3.jpg">
                                                <div class="col pr-1">
                                                    <h5 class="mb-1">Jacob Tucker</h5>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <small class="d-block">Dentist - Specialist</small>
                                                        <div class="rating-bar">
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a class="timeline-panel text-muted d-flex align-items-center" href="javascript:void(0);">
                                                <img class="rounded-sm" alt="image" width="50" src="images/avatar/4.jpg">
                                                <div class="col pr-1">
                                                    <h5 class="mb-1">Harry Parker</h5>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <small class="d-block">Fever - Specialist</small>
                                                        <div class="rating-bar">
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                            <i class="fa fa-star text-warning"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-xxl-4 col-lg-4 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Pharmacy Orders</h4>
                                    <div class="card-action">
                                        <div class="dropdown custom-dropdown">
                                            <div data-toggle="dropdown">
                                                <i class="ti-more-alt"></i>
                                            </div>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="javascript:void(0);">Option 1</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Option 2</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Option 3</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="chart-wrapper">
                                    <div class="mt-5 pt-2">
                                        <canvas id="chart_widget_9"></canvas>
                                    </div>								
                                </div>								
                            </div>
                        </div>
                        <div class="col-xl-4 col-xxl-4 col-lg-4 col-md-12 col-sm-12">
                            <div class="card active_users">
                                <div class="card-header">
                                    <h4 class="card-title">Active Users</h4>
                                    <span id="counter"></span>
                                </div>
                                <div class="card-body pt-0">
                                    <canvas id="activeUser"></canvas>
                                    <div class="list-group-flush mt-4">
                                        <div class="list-group-item bg-transparent d-flex justify-content-between px-0 py-1 font-weight-semi-bold border-top-0" style="border-color: rgba(255, 255, 255, 0.15)">
                                            <p class="mb-0">Top Active Pages</p>
                                            <p class="mb-0">Active Users</p>
                                        </div>
                                        <div class="list-group-item bg-transparent d-flex justify-content-between px-0 py-1" style="border-color: rgba(255, 255, 255, 0.05)">
                                            <p class="mb-0">/bootstrap-themes/</p>
                                            <p class="mb-0">3</p>
                                        </div>
                                        <div class="list-group-item bg-transparent d-flex justify-content-between px-0 py-1" style="border-color: rgba(255, 255, 255, 0.05)">
                                            <p class="mb-0">/tags/html5/</p>
                                            <p class="mb-0">3</p>
                                        </div>
                                        <div class="list-group-item bg-transparent d-xxl-flex justify-content-between px-0 py-1 d-none" style="border-color: rgba(255, 255, 255, 0.05)">
                                            <p class="mb-0">/</p>
                                            <p class="mb-0">2</p>
                                        </div>
                                        <div class="list-group-item bg-transparent d-xxl-flex justify-content-between px-0 py-1 d-none" style="border-color: rgba(255, 255, 255, 0.05)">
                                            <p class="mb-0">/preview/falcon/dashboard/</p>
                                            <p class="mb-0">2</p>
                                        </div>
                                        <div class="list-group-item bg-transparent d-flex justify-content-between px-0 py-1" style="border-color: rgba(255, 255, 255, 0.05)">
                                            <p class="mb-0">/100-best-themes...all-time/</p>
                                            <p class="mb-0">1</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-xxl-8 col-lg-8 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Recent Payments Queue</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive recentOrderTable">
                                        <table class="table verticle-middle table-responsive-md">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Ward No.</th>
                                                    <th scope="col">Patient</th>
                                                    <th scope="col">Dr Name</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Bills</th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>12</td>
                                                    <td>Mr. Bobby</td>
                                                    <td>Dr. Jackson</td>
                                                    <td>01 August 2020</td>
                                                    <td><span class="badge badge-rounded badge-primary">Checkin</span></td>
                                                    <td>$120</td>
                                                    <td>
                                                        <div class="dropdown custom-dropdown mb-0">
                                                            <div data-toggle="dropdown">
                                                                <i class="fa fa-ellipsis-v"></i>
                                                            </div>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="javascript:void(0);">Details</a>
                                                                <a class="dropdown-item text-danger" href="javascript:void(0);">Cancel</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>10 </td>
                                                    <td>Mr. Dexter</td>
                                                    <td>Dr. Charles</td>
                                                    <td>31 July 2020</td>
                                                    <td><span class="badge badge-rounded badge-warning">Panding</span></td>
                                                    <td>$540</td>
                                                    <td>
                                                        <div class="dropdown custom-dropdown mb-0">
                                                            <div data-toggle="dropdown">
                                                                <i class="fa fa-ellipsis-v"></i>
                                                            </div>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="javascript:void(0);">Details</a>
                                                                <a class="dropdown-item text-danger" href="javascript:void(0);">Cancel</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>03 </td>
                                                    <td>Mr. Nathan</td>
                                                    <td>Dr. Frederick</td>
                                                    <td>30 July 2020</td>
                                                    <td><span class="badge badge-rounded badge-danger">Canceled</span></td>
                                                    <td>$301</td>
                                                    <td>
                                                        <div class="dropdown custom-dropdown mb-0">
                                                            <div data-toggle="dropdown">
                                                                <i class="fa fa-ellipsis-v"></i>
                                                            </div>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="javascript:void(0);">Details</a>
                                                                <a class="dropdown-item text-danger" href="javascript:void(0);">Cancel</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>05</td>
                                                    <td>Mr. Aurora</td>
                                                    <td>Dr. Roman</td>
                                                    <td>29 July 2020</td>
                                                    <td><span class="badge badge-rounded badge-success">Checkin</span></td>
                                                    <td>$099</td>
                                                    <td>
                                                        <div class="dropdown custom-dropdown mb-0">
                                                            <div data-toggle="dropdown">
                                                                <i class="fa fa-ellipsis-v"></i>
                                                            </div>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="javascript:void(0);">Details</a>
                                                                <a class="dropdown-item text-danger" href="javascript:void(0);">Cancel</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>06</td>
                                                    <td>Mr. Matthew</td>
                                                    <td>Dr. Samantha</td>
                                                    <td>28 July 2020</td>
                                                    <td><span class="badge badge-rounded badge-success">Checkin</span></td>
                                                    <td>$520</td>
                                                    <td>
                                                        <div class="dropdown custom-dropdown mb-0">
                                                            <div data-toggle="dropdown">
                                                                <i class="fa fa-ellipsis-v"></i>
                                                            </div>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="javascript:void(0);">Details</a>
                                                                <a class="dropdown-item text-danger" href="javascript:void(0);">Cancel</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-3 col-xxl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="card">
                                <div class="social-graph-wrapper widget-facebook">
                                    <span class="s-icon"><i class="fa fa-facebook"></i></span>
                                </div>
                                <div class="row">
                                    <div class="col-6 border-right">
                                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                            <h4 class="m-1"><span class="counter">89</span> k</h4>
                                            <p class="m-0">Friends</p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                            <h4 class="m-1"><span class="counter">119</span> k</h4>
                                            <p class="m-0">Followers</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-xxl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="card">
                                <div class="social-graph-wrapper widget-linkedin">
                                    <span class="s-icon"><i class="fa fa-linkedin"></i></span>
                                </div>
                                <div class="row">
                                    <div class="col-6 border-right">
                                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                            <h4 class="m-1"><span class="counter">89</span> k</h4>
                                            <p class="m-0">Friends</p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                            <h4 class="m-1"><span class="counter">119</span> k</h4>
                                            <p class="m-0">Followers</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-xxl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="card">
                                <div class="social-graph-wrapper widget-googleplus">
                                    <span class="s-icon"><i class="fa fa-google-plus"></i></span>
                                </div>
                                <div class="row">
                                    <div class="col-6 border-right">
                                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                            <h4 class="m-1"><span class="counter">89</span> k</h4>
                                            <p class="m-0">Friends</p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                            <h4 class="m-1"><span class="counter">119</span> k</h4>
                                            <p class="m-0">Followers</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-xxl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="card">
                                <div class="social-graph-wrapper widget-twitter">
                                    <span class="s-icon"><i class="fa fa-twitter"></i></span>
                                </div>
                                <div class="row">
                                    <div class="col-6 border-right">
                                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                            <h4 class="m-1"><span class="counter">89</span> k</h4>
                                            <p class="m-0">Friends</p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                            <h4 class="m-1"><span class="counter">119</span> k</h4>
                                            <p class="m-0">Followers</p>
                                        </div>
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

    </body>

    <!-- Mirrored from medico.dexignzone.com/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Dec 2021 10:57:22 GMT -->
</html>