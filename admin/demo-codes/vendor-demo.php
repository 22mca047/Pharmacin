<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from medico.dexignzone.com/admin/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Dec 2021 10:57:29 GMT -->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Medico - Bootstrap Admin Dashboard </title>
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
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                                <div class="dropdown-menu p-0 m-0">
                                    <form>
                                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                    </form>
                                </div>
                            </div>
                        </div>

                        <ul class="navbar-nav header-right">
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
                                        <li class="media dropdown-item">
                                            <span class="success"><i class="ti-user"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Martin</strong> has added a <strong>customer</strong> Successfully
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="primary"><i class="ti-shopping-cart"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Jennifer</strong> purchased Light Dashboard 2.0.</p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="danger"><i class="ti-bookmark"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Robin</strong> marked a <strong>ticket</strong> as unsolved.
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="primary"><i class="ti-heart"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>David</strong> purchased Light Dashboard 1.0.</p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="success"><i class="ti-image"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong> James.</strong> has added a<strong>customer</strong> Successfully
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                    </ul>
                                    <a class="all-notification" href="#">See all notifications <i
                                            class="ti-arrow-right"></i></a>
                                </div>
                            </li>
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <img src="images/profile/pic1.jpg" width="20" alt=""/>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="app-profile.html" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="email-inbox.html" class="dropdown-item ai-icon">
                                        <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                        <span class="ml-2">Inbox </span>
                                    </a>
                                    <a href="page-login.html" class="dropdown-item ai-icon">
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

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <li><a class="ai-icon" href="index.html" aria-expanded="false">
						<svg id="icon-home" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
							<span class="nav-text">Dashboard</span>
						</a>
                    </li>
					<li><a class="ai-icon" href="index-2.html" aria-expanded="false">
						<svg id="icon-heart" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
							<span class="nav-text">Patient Dashboard</span>
						</a>
                    </li>
					<li><a class="ai-icon" href="index-3.html" aria-expanded="false">
						<svg id="icon-database" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>
							<span class="nav-text">Doctor Dashboard</span>
						</a>
                    </li>
					<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<svg id="icon-user-doctors" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
							<span class="nav-text">Doctors</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="all-doctors.html">All Doctors</a></li>
                            <li><a href="add-doctor.html">Add Doctor</a></li>
                            <li><a href="edit-doctor.html">Edit Doctor</a></li>
                            <li><a href="doctor-profile.html">Doctor Profile</a></li>
                        </ul>
                    </li>
					<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<svg id="icon-users" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
							<span class="nav-text">Patients</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="all-patients.html">All Patients</a></li>
                            <li><a href="add-patient.html">Add Patient</a></li>
                            <li><a href="edit-patient.html">Edit Patient</a></li>
                            <li><a href="patient-profile.html">Patient Profile</a></li>
                        </ul>
                    </li>
					<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<svg id="icon-file-text" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
							<span class="nav-text">Appointments</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="doctor-schedule.html">Doctor Schedule</a></li>
                            <li><a href="book-appointment.html">Book Appointment</a></li>
                        </ul>
                    </li>
					<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<svg id="icon-dollar-sign" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
							<span class="nav-text">Billing</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="payments.html">Payments</a></li>
                            <li><a href="add-payment.html">Add Payment</a></li>
                            <li><a href="patient-invoice.html">Patient Invoice</a></li>
                        </ul>
                    </li>
					<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<svg id="icom-headphones" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-headphones"><path d="M3 18v-6a9 9 0 0 1 18 0v6"></path><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"></path></svg>
							<span class="nav-text">Support</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="faq.html">FAQ</a></li>
                            <li><a href="help-center.html">Help center</a></li>
                        </ul>
                    </li>					
                    <li class="nav-label">Apps</li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<svg id="icon-apps" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
							<span class="nav-text">Apps</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="app-profile.html">Profile</a></li>
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Email</a>
                                <ul aria-expanded="false">
                                    <li><a href="email-compose.html">Compose</a></li>
                                    <li><a href="email-inbox.html">Inbox</a></li>
                                    <li><a href="email-read.html">Read</a></li>
                                </ul>
                            </li>
                            <li><a href="app-calender.html">Calendar</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<svg id="icon-charts" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart"><line x1="12" y1="20" x2="12" y2="10"></line><line x1="18" y1="20" x2="18" y2="4"></line><line x1="6" y1="20" x2="6" y2="16"></line></svg>
							<span class="nav-text">Charts</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="chart-flot.html">Flot</a></li>
                            <li><a href="chart-morris.html">Morris</a></li>
                            <li><a href="chart-chartjs.html">Chartjs</a></li>
                            <li><a href="chart-chartist.html">Chartist</a></li>
                            <li><a href="chart-sparkline.html">Sparkline</a></li>
                            <li><a href="chart-peity.html">Peity</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Components</li>
                    <li class="mega-menu mega-menu-xl"><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<svg id="icon-bootstrap" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
							<span class="nav-text">Bootstrap</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="ui-accordion.html">Accordion</a></li>
                            <li><a href="ui-alert.html">Alert</a></li>
                            <li><a href="ui-badge.html">Badge</a></li>
                            <li><a href="ui-button.html">Button</a></li>
                            <li><a href="ui-modal.html">Modal</a></li>
                            <li><a href="ui-button-group.html">Button Group</a></li>
                            <li><a href="ui-list-group.html">List Group</a></li>
                            <li><a href="ui-media-object.html">Media Object</a></li>
                            <li><a href="ui-card.html">Cards</a></li>
                            <li><a href="ui-carousel.html">Carousel</a></li>
                            <li><a href="ui-dropdown.html">Dropdown</a></li>
                            <li><a href="ui-popover.html">Popover</a></li>
                            <li><a href="ui-progressbar.html">Progressbar</a></li>
                            <li><a href="ui-tab.html">Tab</a></li>
                            <li><a href="ui-typography.html">Typography</a></li>
                            <li><a href="ui-pagination.html">Pagination</a></li>
                            <li><a href="ui-grid.html">Grid</a></li>
                        </ul>
                    </li>
                    <li><a href="widget-basic.html" class="ai-icon" aria-expanded="false">
							<svg id="icon-widget" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg>
							<span class="nav-text">Widget</span>
						</a></li>
                    <li class="nav-label">Forms</li>
                    <li><a class="ai-icon" href="form-element.html" aria-expanded="false">
							<svg id="icon-forms" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
							<span class="nav-text">Forms</span>
						</a>
                    </li>
                    <li class="nav-label">Table</li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<svg id="icon-table" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-server"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6" y2="6"></line><line x1="6" y1="18" x2="6" y2="18"></line></svg>
							<span class="nav-text">Table</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="table-bootstrap-basic.html">Bootstrap</a></li>
                            <li><a href="table-datatable-basic.html">Datatable</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Extra</li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<svg id="icon-pages" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
							<span class="nav-text">Pages</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="page-register.html">Register</a></li>
                            <li><a href="page-login.html">Login</a></li>
                            <li><a href="page-error-404.html" aria-expanded="false">Error</a></li>
                            <li><a href="page-lock-screen.html">Lock Screen</a></li>
                        </ul>
                    </li>
				</ul>
            </div>


        </div>
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
					<div class="col-xl-4 col-xxl-4 col-lg-6 col-md-12">
						<div class="card">
							<div class="text-center p-3 overlay-box" style="background-image: url(images/big/img5.jpg);">
								<img src="images/profile/profile.png" width="100" class="img-fluid rounded-circle mt-2" alt="">
								<h3 class="mt-3 mb-0 text-white">Deangelo Sena</h3>
								<p class="text-white mb-0 mt-2">Dentist</p>
							</div>
                            <div class="card-body">
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard..</p>
								<div class="row align-items-center">
									<div class="col-6">
										<div class="rating-bar">
											<i class="fa fa-star text-warning"></i>
											<i class="fa fa-star text-warning"></i>
											<i class="fa fa-star text-warning"></i>
											<i class="fa fa-star text-warning"></i>
											<i class="fa fa-star text-warning"></i>
											<span class="badge border-dark border ml-3">4.9</span>
										</div>
									</div>
									<div class="col-6">
										<a href="javascript:void(0);" class="d-block my-2"><strong><span class="__cf_email__" data-cfemail="640d0a020b24011c05091408014a070b09">[email&#160;protected]</span></strong></a>
									</div>
								</div>
                            </div>
							<div class="card-footer mt-0">								
								<button class="btn btn-primary btn-lg btn-block">Send Message</button>		
                            </div>
                        </div>
					</div>
					<div class="col-xl-4 col-xxl-4 col-lg-6 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Messages</h5>
                            </div>
                            <div class="card-body">
								<div id="DZ_W_Message" class="widget-message dz-scroll" style="height:380px;">
									<div class="media mb-3">
										<img class="mr-3 rounded-circle" alt="image" width="50" src="images/patients/pic1.jpg">
										<div class="media-body">
											<h5>Jacob Tucker<small class="text-primary">April 29, 2018</small></h5>
											<p class="mb-2">I shared this on my fb wall a few months back, and I thought.</p>
											<a href="javascript:void()" class="btn btn-primary btn-sm d-inline-block px-3">Reply</a>
											<a href="javascript:void()" class="btn btn-outline-danger btn-sm d-inline-block px-3">Delete</a>
										</div>
									</div>
									<div class="media mb-3">
										<img class="mr-3 rounded-circle" alt="image" width="50" src="images/patients/pic2.jpg">
										<div class="media-body">
											<h5>Noah Baldon <small class="text-primary">April 28, 2018</small></h5>
											<p class="mb-2">I shared this on my fb wall a few months back, and I thought.</p>
											<a href="javascript:void()" class="btn btn-primary btn-sm d-inline-block px-3">Reply</a>
											<a href="javascript:void()" class="btn btn-outline-danger btn-sm d-inline-block px-3">Delete</a>
										</div>
									</div>
									<div class="media mb-3">
										<img class="mr-3 rounded-circle" alt="image" width="50" src="images/patients/pic3.jpg">
										<div class="media-body">
											<h5>Muhammad Clay <small class="text-primary">March 24, 2020</small></h5>
											<p class="mb-2">I shared this on my fb wall a few months back, and I thought.</p>
											<a href="javascript:void()" class="btn btn-primary btn-sm d-inline-block px-3">Reply</a>
											<a href="javascript:void()" class="btn btn-outline-danger btn-sm d-inline-block px-3">Delete</a>
										</div>
									</div>
									<div class="media">
										<img class="mr-3 rounded-circle" alt="image" width="50" src="images/patients/pic4.jpg">
										<div class="media-body">
											<h5>William Logan <small class="text-primary">Dec 24, 2019</small></h5>
											<p class="mb-2">I shared this on my fb wall a few months back, and I thought.</p>
											<a href="javascript:void()" class="btn btn-primary btn-sm d-inline-block px-3">Reply</a>
											<a href="javascript:void()" class="btn btn-outline-danger btn-sm d-inline-block px-3">Delete</a>
										</div>
									</div>
								</div>
                            </div>
                        </div>
                    </div>
					<div class="col-xl-4 col-xxl-4 col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Notifications</h4>
                            </div>
                            <div class="card-body"> 
                                <div class="widget-todo dz-scroll" style="height:370px;" id="DZ_W_Notifications">
                                    <ul class="timeline">
                                        <li>
                                            <div class="timeline-badge primary"></div>
                                            <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="javascript:void(0);">
                                                <img class="rounded-circle" alt="image" width="50" src="images/avatar/1.jpg">
												<div class="col">
													<h5 class="mb-1">Dr sultads Send you Photo</h5>
													<small class="d-block">29 July 2020 - 02:26 PM</small>
												</div>
											</a>
                                        </li>
                                        <li>
                                            <div class="timeline-badge warning"></div>
                                            <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="javascript:void(0);">
                                                <img class="rounded-circle" alt="image" width="50" src="images/avatar/2.jpg">
												<div class="col">
													<h5 class="mb-1">Resport created successfully</h5>
													<small class="d-block">29 July 2020 - 02:26 PM</small>
												</div>
											</a>
                                        </li>
                                        <li>
                                            <div class="timeline-badge danger"></div>
                                            <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="javascript:void(0);">
                                                <img class="rounded-circle" alt="image" width="50" src="images/avatar/3.jpg">
												<div class="col">
													<h5 class="mb-1">Reminder : Treatment Time!</h5>
													<small class="d-block">29 July 2020 - 02:26 PM</small>
												</div>
											</a>
                                        </li>
										<li>
                                            <div class="timeline-badge success"></div>
											<a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="javascript:void(0);">
                                                <img class="rounded-circle" alt="image" width="50" src="images/avatar/4.jpg">
												<div class="col">
													<h5 class="mb-1">Dr sultads Send you Photo</h5>
													<small class="d-block">29 July 2020 - 02:26 PM</small>
												</div>
											</a>
                                        </li>
                                        <li>
                                            <div class="timeline-badge warning"></div>
											<a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="javascript:void(0);">
                                                <img class="rounded-circle" alt="image" width="50" src="images/avatar/1.jpg">
												<div class="col">
													<h5 class="mb-1">Resport created successfully</h5>
													<small class="d-block">29 July 2020 - 02:26 PM</small>
												</div>
											</a>
                                        </li>
                                        <li>
                                            <div class="timeline-badge dark"></div>
                                            <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="javascript:void(0);">
                                                <img class="rounded-circle" alt="image" width="50" src="images/avatar/2.jpg">
												<div class="col">
													<h5 class="mb-1">Reminder : Treatment Time!</h5>
													<small class="d-block">29 July 2020 - 02:26 PM</small>
												</div>
											</a>
                                        </li>
                                        <li>
                                            <div class="timeline-badge info"></div>
                                            <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="javascript:void(0);">
                                                <img class="rounded-circle" alt="image" width="50" src="images/avatar/3.jpg">
												<div class="col">
													<h5 class="mb-1">Dr sultads Send you Photo</h5>
													<small class="d-block">29 July 2020 - 02:26 PM</small>
												</div>
											</a>
                                        </li>
										<li>
                                            <div class="timeline-badge danger"></div>
                                            <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="javascript:void(0);">
                                                <img class="rounded-circle" alt="image" width="50" src="images/avatar/4.jpg">
												<div class="col">
													<h5 class="mb-1">Resport created successfully</h5>
													<small class="d-block">29 July 2020 - 02:26 PM</small>
												</div>
											</a>
                                        </li>
                                        <li>
                                            <div class="timeline-badge success"></div>
                                            <a class="timeline-panel text-muted mb-3 d-flex align-items-center" href="javascript:void(0);">
                                                <img class="rounded-circle" alt="image" width="50" src="images/avatar/1.jpg">
												<div class="col">
													<h5 class="mb-1">Reminder : Treatment Time!</h5>
													<small class="d-block">29 July 2020 - 02:26 PM</small>
												</div>
											</a>
                                        </li>
										<li>
                                            <div class="timeline-badge warning"></div>
											<a class="timeline-panel text-muted d-flex align-items-center" href="javascript:void(0);">
                                                <img class="rounded-circle" alt="image" width="50" src="images/avatar/2.jpg">
												<div class="col">
													<h5 class="mb-1">Dr sultads Send you Photo</h5>
													<small class="d-block">29 July 2020 - 02:26 PM</small>
												</div>
											</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
						</div>
					</div>
					<div class="col-lg-12">
                        <div class="card">
							<div class="card-header">
                                <h4 class="card-title">Patients List </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm mb-0 table-striped">
                                        <thead>
                                            <tr>
                                                <th class=" pr-3">
													<div class="custom-control custom-checkbox mx-2">
														<input type="checkbox" class="custom-control-input" id="checkAll">
														<label class="custom-control-label" for="checkAll"></label>
													</div>
                                                </th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th class=" pl-5" style="min-width: 200px;">Billing Address
                                                </th>
                                                <th>Joined</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="customers">
                                            <tr class="btn-reveal-trigger">
                                                <td class="py-2">
                                                    <div class="custom-control custom-checkbox mx-2">
														<input type="checkbox" class="custom-control-input" id="checkbox1">
														<label class="custom-control-label" for="checkbox1"></label>
													</div>
                                                </td>
                                                <td class="py-3">
                                                    <a href="javascript:void(0);">
                                                        <div class="media d-flex align-items-center">
                                                            <div class="avatar avatar-xl mr-2">
                                                                <div class=""><img class="rounded-circle img-fluid"
                                                                        src="images/avatar/5.png" width="30" alt="" />
                                                                </div>
                                                            </div>
                                                            <div class="media-body">
                                                                <h5 class="mb-0 fs--1">Ricky Antony</h5>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td class="py-2"><a href="https://medico.dexignzone.com/cdn-cgi/l/email-protection#2b59424840526b4e534a465b474e05484446"><span class="__cf_email__" data-cfemail="fd8f949e9684bd98859c908d9198d39e9290">[email&#160;protected]</span></a></td>
                                                <td class="py-2"> <a href="tel:2012001851">(201) 200-1851</a></td>
                                                <td class="py-2 pl-5">2392 Main Avenue, Penasauka, New Jersey 02139</td>
                                                <td class="py-2">30/03/2018</td>
                                                <td class="py-2">
                                                    <div class="dropdown"><button class="btn btn-link mr-3"
                                                            type="button"
                                                            data-toggle="dropdown"><span
                                                                class="fa fa-ellipsis-h fs--1"></span></button>
                                                        <div class="dropdown-menu dropdown-menu-right border py-0"
                                                            >
                                                            <div class="py-2"><a class="dropdown-item"
                                                                    href="#!">Edit</a><a
                                                                    class="dropdown-item text-danger"
                                                                    href="#!">Delete</a></div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="btn-reveal-trigger">
                                                <td class="py-2">
                                                    <div class="custom-control custom-checkbox mx-2">
														<input type="checkbox" class="custom-control-input" id="checkbox2">
														<label class="custom-control-label" for="checkbox2"></label>
													</div>
                                                </td>
                                                <td class="py-3">
                                                    <a href="javascript:void(0);">
                                                        <div class="media d-flex align-items-center">
                                                            <div class="avatar avatar-xl mr-2">
                                                                <img class="rounded-circle img-fluid"
                                                                    src="images/avatar/1.png" alt="" width="30" />
                                                            </div>
                                                            <div class="media-body">
                                                                <h5 class="mb-0 fs--1">Emma Watson</h5>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td class="py-2"><a href="https://medico.dexignzone.com/cdn-cgi/l/email-protection#c5a0a8a8a485a0bda4a8b5a9a0eba6aaa8"><span class="__cf_email__" data-cfemail="56333b3b3716332e373b263a337835393b">[email&#160;protected]</span></a>
                                                </td>
                                                <td class="py-2"> <a href="tel:2122288403">(212) 228-8403</a></td>
                                                <td class="py-2 pl-5">2289 5th Avenue, New York, New York, 10037
                                                </td>
                                                <td class="py-2">11/07/2017</td>
                                                <td class="py-2">
                                                    <div class="dropdown"><button class="btn btn-link mr-3"
                                                            type="button"
                                                            data-toggle="dropdown"><span
                                                                class="fa fa-ellipsis-h fs--1"></span></button>
                                                        <div class="dropdown-menu dropdown-menu-right border py-0"
                                                            >
                                                            <div class="py-2"><a class="dropdown-item"
                                                                    href="#!">Edit</a><a
                                                                    class="dropdown-item text-danger"
                                                                    href="#!">Delete</a></div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="btn-reveal-trigger">
                                                <td class="py-2">
                                                    <div class="custom-control custom-checkbox mx-2">
														<input type="checkbox" class="custom-control-input" id="checkbox3">
														<label class="custom-control-label" for="checkbox3"></label>
													</div>
                                                </td>
                                                <td class="py-3">
                                                    <a href="javascript:void(0);">
                                                        <div class="media d-flex align-items-center">
                                                            <div class="avatar avatar-xl mr-2">
                                                                <div class=""><img class="rounded-circle img-fluid"
                                                                        src="images/avatar/5.png" width="30" alt="" />
                                                                </div>
                                                            </div>
                                                            <div class="media-body">
                                                                <h5 class="mb-0 fs--1">Rowen Atkinson</h5>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td class="py-2"><a href="https://medico.dexignzone.com/cdn-cgi/l/email-protection#d7a5b8a0b997b2afb6baa7bbb2f9b4b8ba"><span class="__cf_email__" data-cfemail="3d4f524a537d58455c504d5158135e5250">[email&#160;protected]</span></a>
                                                </td>
                                                <td class="py-2"> <a href="tel:2012001851">(201) 200-1851</a></td>
                                                <td class="py-2 pl-5">112 Bostwick Avenue, Jersey City, New Jersey, 0730
                                                </td>
                                                <td class="py-2">05/04/2016</td>
                                                <td class="py-2">
                                                    <div class="dropdown"><button class="btn btn-link mr-3"
                                                            type="button"
                                                            data-toggle="dropdown"><span
                                                                class="fa fa-ellipsis-h fs--1"></span></button>
                                                        <div class="dropdown-menu dropdown-menu-right border py-0"
                                                            >
                                                            <div class="py-2"><a class="dropdown-item"
                                                                    href="#!">Edit</a><a
                                                                    class="dropdown-item text-danger"
                                                                    href="#!">Delete</a></div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="btn-reveal-trigger">
                                                <td class="py-2">
                                                    <div class="custom-control custom-checkbox mx-2">
														<input type="checkbox" class="custom-control-input" id="checkbox4">
														<label class="custom-control-label" for="checkbox4"></label>
													</div>
                                                </td>
                                                <td class="py-3">
                                                    <a href="javascript:void(0);">
                                                        <div class="media d-flex align-items-center">
                                                            <div class="avatar avatar-xl mr-2">
                                                                <img class="rounded-circle img-fluid"
                                                                    src="images/avatar/1.png" alt="" width="30" />
                                                            </div>
                                                            <div class="media-body">
                                                                <h5 class="mb-0 fs--1">Antony Hopkins</h5>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td class="py-2"><a href="https://medico.dexignzone.com/cdn-cgi/l/email-protection#eb8a859f848592ab8e938a869b878ec5888486"><span class="__cf_email__" data-cfemail="f899968c979681b89d80999588949dd69b9795">[email&#160;protected]</span></a></td>
                                                <td class="py-2"> <a href="tel:9013243127">(901) 324-3127</a></td>
                                                <td class="py-2 pl-5">3448 Ile De France St #242, Fort Wainwright,
                                                    Alaska, 99703</td>
                                                <td class="py-2">05/04/2018</td>
                                                <td class="py-2">
                                                    <div class="dropdown"><button class="btn btn-link mr-3"
                                                            type="button"
                                                            data-toggle="dropdown"><span
                                                                class="fa fa-ellipsis-h fs--1"></span></button>
                                                        <div class="dropdown-menu dropdown-menu-right border py-0"
                                                            >
                                                            <div class="py-2"><a class="dropdown-item"
                                                                    href="#!">Edit</a><a
                                                                    class="dropdown-item text-danger"
                                                                    href="#!">Delete</a></div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="btn-reveal-trigger">
                                                <td class="py-2">
                                                    <div class="custom-control custom-checkbox mx-2">
														<input type="checkbox" class="custom-control-input" id="checkbox5">
														<label class="custom-control-label" for="checkbox5"></label>
													</div>
                                                </td>
                                                <td class="py-3">
                                                    <a href="javascript:void(0);">
                                                        <div class="media d-flex align-items-center">
                                                            <div class="avatar avatar-xl mr-2">
                                                                <img class="rounded-circle img-fluid"
                                                                    src="images/avatar/1.png" alt="" width="30" />
                                                            </div>
                                                            <div class="media-body">
                                                                <h5 class="mb-0 fs--1">Jennifer Schramm</h5>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td class="py-2"><a href="https://medico.dexignzone.com/cdn-cgi/l/email-protection#a1cbc4cfcfc8c7c4d3e1c4d9c0ccd1cdc48fc2cecc"><span class="__cf_email__" data-cfemail="204a454e4e49464552604558414d504c450e434f4d">[email&#160;protected]</span></a></td>
                                                <td class="py-2"> <a href="tel:8283829631">(828) 382-9631</a></td>
                                                <td class="py-2 pl-5">659 Hannah Street, Charlotte, NC 28273
                                                </td>
                                                <td class="py-2">17/03/2016</td>
                                                <td class="py-2">
                                                    <div class="dropdown"><button class="btn btn-link mr-3"
                                                            type="button"
                                                            data-toggle="dropdown"><span
                                                                class="fa fa-ellipsis-h fs--1"></span></button>
                                                        <div class="dropdown-menu dropdown-menu-right border py-0"
                                                            >
                                                            <div class="py-2"><a class="dropdown-item"
                                                                    href="#!">Edit</a><a
                                                                    class="dropdown-item text-danger"
                                                                    href="#!">Delete</a></div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="btn-reveal-trigger">
                                                <td class="py-2">
													<div class="custom-control custom-checkbox mx-2">
														<input type="checkbox" class="custom-control-input" id="checkbox6">
														<label class="custom-control-label" for="checkbox6"></label>
													</div>
                                                </td>
                                                <td class="py-3">
                                                    <a href="javascript:void(0);">
                                                        <div class="media d-flex align-items-center">
                                                            <div class="avatar avatar-xl mr-2">
                                                                <div class=""><img class="rounded-circle img-fluid"
                                                                        src="images/avatar/5.png" width="30" alt="" />
                                                                </div>
                                                            </div>
                                                            <div class="media-body">
                                                                <h5 class="mb-0 fs--1">Raymond Mims</h5>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td class="py-2"><a href="https://medico.dexignzone.com/cdn-cgi/l/email-protection#304251495d5f5e54705548515d405c551e535f5d"><span class="__cf_email__" data-cfemail="a5d7c4dcc8cacbc1e5c0ddc4c8d5c9c08bc6cac8">[email&#160;protected]</span></a></td>
                                                <td class="py-2"> <a href="tel:5624685646">(562) 468-5646</a></td>
                                                <td class="py-2 pl-5">2298 Locust Court, Artesia, CA 90701
                                                </td>
                                                <td class="py-2">12/07/2014</td>
                                                <td class="py-2">
                                                    <div class="dropdown"><button class="btn btn-link mr-3"
                                                            type="button"
                                                            data-toggle="dropdown"><span
                                                                class="fa fa-ellipsis-h fs--1"></span></button>
                                                        <div class="dropdown-menu dropdown-menu-right border py-0"
                                                            >
                                                            <div class="py-2"><a class="dropdown-item"
                                                                    href="#!">Edit</a><a
                                                                    class="dropdown-item text-danger"
                                                                    href="#!">Delete</a></div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="btn-reveal-trigger">
                                                <td class="py-2">
                                                    <div class="custom-control custom-checkbox mx-2">
														<input type="checkbox" class="custom-control-input" id="checkbox7">
														<label class="custom-control-label" for="checkbox7"></label>
													</div>
                                                </td>
                                                <td class="py-3">
                                                    <a href="javascript:void(0);">
                                                        <div class="media d-flex align-items-center">
                                                            <div class="avatar avatar-xl mr-2">
                                                                <img class="rounded-circle img-fluid"
                                                                    src="images/avatar/1.png" alt="" width="30" />
                                                            </div>
                                                            <div class="media-body">
                                                                <h5 class="mb-0 fs--1">Michael Jenkins</h5>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td class="py-2"><a href="https://medico.dexignzone.com/cdn-cgi/l/email-protection#2e444b404547405d6e4b564f435e424b004d4143"><span class="__cf_email__" data-cfemail="0a606f64616364794a6f726b677a666f24696567">[email&#160;protected]</span></a></td>
                                                <td class="py-2"> <a href="tel:3026138829">(302) 613-8829</a></td>
                                                <td class="py-2 pl-5">4678 Maud Street, Philadelphia, DE 19103
                                                </td>
                                                <td class="py-2">15/06/2014</td>
                                                <td class="py-2">
                                                    <div class="dropdown"><button class="btn btn-link mr-3"
                                                            type="button"
                                                            data-toggle="dropdown"><span
                                                                class="fa fa-ellipsis-h fs--1"></span></button>
                                                        <div class="dropdown-menu dropdown-menu-right border py-0"
                                                            >
                                                            <div class="py-2"><a class="dropdown-item"
                                                                    href="#!">Edit</a><a
                                                                    class="dropdown-item text-danger"
                                                                    href="#!">Delete</a></div>
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
					<div class="col-xl-4 col-xxl-4 col-lg-6 col-md-12 col-sm-12">
						<div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Recent Visits</h4>
                            </div>
                            <div class="card-body">
								<div class="media mb-3 align-items-center bg-white">
                                    <img class="mr-3 rounded-circle" alt="image" width="50" src="images/avatar/1.jpg">
                                    <div class="media-body">
                                        <h5 class="mb-0 text-pale-sky">Theodore Handle <small class="text-primary">( Blood Check )</small></h5>
                                        <small class="text-muted mb-0">Blood Check</small>
									</div>
									<div class="float-right d-inline btn-outline-dark btn btn-sm">29 July</div>
                                </div>
								<div class="media mb-3 align-items-center bg-white">
                                    <img class="mr-3 rounded-circle" alt="image" width="50" src="images/avatar/2.jpg">
                                    <div class="media-body">
                                        <h5 class="mb-0 text-pale-sky">Bess Willis <small class="text-primary">( Medicine  )</small></h5>
                                        <small class="text-muted mb-0">Thryoid Test</small>
									</div>
									<div class="float-right d-inline btn-outline-dark btn btn-sm">28 July</div>
                                </div>
								<div class="media mb-3 align-items-center bg-white">
                                    <img class="mr-3 rounded-circle" alt="image" width="50" src="images/avatar/3.jpg">
                                    <div class="media-body">
                                        <h5 class="mb-0 text-pale-sky">James Jones <small class="text-primary">( Pathology  )</small></h5>
                                        <small class="text-muted mb-0">Full Blood image</small>
									</div>
									<div class="float-right d-inline btn-outline-dark btn btn-sm">27 July</div>
                                </div>
								<div class="media mb-3 align-items-center bg-white">
                                    <img class="mr-3 rounded-circle" alt="image" width="50" src="images/avatar/4.jpg">
                                    <div class="media-body">
                                        <h5 class="mb-0 text-pale-sky">Smith Watson <small class="text-primary">( Medicine  )</small></h5>
                                        <small class="text-muted mb-0">Full Blood image</small>
									</div>
									<div class="float-right d-inline btn-outline-dark btn btn-sm">26 July</div>
                                </div>
								<div class="media align-items-center bg-white">
                                    <img class="mr-3 rounded-circle" alt="image" width="50" src="images/avatar/1.jpg">
                                    <div class="media-body">
                                        <h5 class="mb-0 text-pale-sky">Morese Sharpe <small class="text-primary">( Routine Visit )</small></h5>
                                        <small class="text-muted mb-0">Full Body Test</small>
									</div>
									<div class="float-right d-inline btn-outline-dark btn btn-sm">25 July</div>
                                </div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-xxl-4 col-lg-6 col-md-12 col-sm-12">
						<div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Patients Notes</h4>
                            </div>
                            <div class="card-body">
                                <div class="widget-timeline">
                                    <ul class="timeline">
                                        <li>
                                            <div class="timeline-badge primary"></div>
                                           	<a class="timeline-panel text-muted d-flex" href="javascript:void(0);">
												<div class="col pl-0">
													<h5 class="mb-0">Meditation</h5>
													<small>I feel better Now Theodore Handle</small>
												</div>
												<div class="col-3 pr-0">
													<div class="float-right d-inline btn-outline-primary btn btn-sm">OPEN</div>
												</div>
											</a>
                                        </li>
                                        <li>
                                            <div class="timeline-badge warning"></div>
                                           	<a class="timeline-panel text-muted d-flex" href="javascript:void(0);">
												<div class="col pl-0">
													<h5 class="mb-0">Unhappy</h5>
													<small class="mb-1">My hair is gone!</small>
												</div>
												<div class="col-3 pr-0">
													<div class="float-right d-inline btn-outline-danger btn btn-sm">CLOSE</div>
												</div>
											</a>
                                        </li>
										<li>
                                            <div class="timeline-badge danger"></div>
                                           	<a class="timeline-panel text-muted d-flex" href="javascript:void(0);">
												<div class="col pl-0">
													<h5 class="mb-0">Join Pain</h5>
													<small>Mediacal Care is just a click away</small>
												</div>
												<div class="col-3 pr-0">
													<div class="float-right d-inline btn-outline-primary btn btn-sm">OPEN</div>
												</div>
											</a>
                                        </li>
                                        <li>
                                            <div class="timeline-badge info"></div>
                                           	<a class="timeline-panel text-muted d-flex" href="javascript:void(0);">
												<div class="col pl-0">
													<h5 class="mb-0">Unhappy</h5>
													<small>My hair is gone!</small>
												</div>
												<div class="col-3 pr-0">
													<div class="float-right d-inline btn-outline-primary btn btn-sm">OPEN</div>
												</div>
											</a>
                                        </li>
										<li>
                                            <div class="timeline-badge success"></div>
                                           	<a class="timeline-panel text-muted d-flex" href="javascript:void(0);">
												<div class="col pl-0">
													<h5 class="mb-0">Thyroid Test</h5>
													<small>Treatment was good!</small>
												</div>
												<div class="col-3 pr-0">
													<div class="float-right d-inline btn-outline-danger btn btn-sm">CLOSE</div>
												</div>
											</a>
                                        </li>
										<li>
                                            <div class="timeline-badge success"></div>
                                           	<a class="timeline-panel text-muted d-flex" href="javascript:void(0);">
												<div class="col pl-0">
													<h5 class="mb-0">Heart Surgery</h5>
													<small>Treatment was good!</small>
												</div>
												<div class="col-3 pr-0">
													<div class="float-right d-inline btn-outline-danger btn btn-sm">CLOSE</div>
												</div>
											</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
					</div>
					<div class="col-xl-4 col-xxl-4 col-lg-12 col-md-12 col-sm-12">
						<div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Speciality</h4>
                            </div>
                            <div class="card-body dz-scroll" style="height:350px;" id="DZ_W_Speciality">
								<div class="media mb-3 align-items-center bg-white dz-scroll" id="DZ_W_Speciality">
                                    <img class="mr-3 p-2 border" alt="image" width="40" src="images/icons/20.png">
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-1 text-pale-sky">Certified</h5>
                                        <span class="text-muted mb-0">Cold Laser Therapy</span>
									</div>
                                </div>
								<div class="media mb-3 align-items-center bg-white">
                                    <img class="mr-3 p-2 border" alt="image" width="40" src="images/icons/21.png">
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-1 text-pale-sky">Medication Laser</h5>
                                        <span class="text-muted mb-0">Hair Lose Product</span>
									</div>
                                </div>
								<div class="media mb-3 align-items-center bg-white">
                                    <img class="mr-3 p-2 border" alt="image" width="40" src="images/icons/22.png">
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-1 text-pale-sky">Professional</h5>
                                        <span class="text-muted mb-0">Certified Hair Lose Surgery</span>
									</div>
                                </div>
								<div class="media mb-3 align-items-center bg-white">
                                    <img class="mr-3 p-2 border" alt="image" width="40" src="images/icons/23.png">
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-1 text-pale-sky">Dentist Certified</h5>
                                        <span class="text-muted mb-0">Dentist </span>
									</div>
                                </div>
								<div class="media mb-3 align-items-center bg-white">
                                    <img class="mr-3 p-2 border" alt="image" width="40" src="images/icons/21.png">
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-1 text-pale-sky">Medication Laser</h5>
                                        <span class="text-muted mb-0">Hair Lose Product</span>
									</div>
                                </div>
								<div class="media mb-3 align-items-center bg-white">
                                    <img class="mr-3 p-2 border" alt="image" width="40" src="images/icons/22.png">
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-1 text-pale-sky">Professional</h5>
                                        <span class="text-muted mb-0">Certified Hair Lose Surgery</span>
									</div>
                                </div>
								<div class="media mb-3 align-items-center bg-white">
                                    <img class="mr-3 p-2 border" alt="image" width="40" src="images/icons/23.png">
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-1 text-pale-sky">Dentist Certified</h5>
                                        <span class="text-muted mb-0">Dentist </span>
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
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">DexignZone</a> 2020</p>
            </div>
        </div>
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
    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="vendor/global/global.min.js"></script>
	<script src="js/deznav-init.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/custom.min.js"></script>

    <!-- Vectormap -->
    <script src="vendor/jqvmap/js/jquery.vmap.min.js"></script>
    <script src="vendor/jqvmap/js/jquery.vmap.world.js"></script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="vendor/gaugeJS/dist/gauge.min.js"></script>

    <!-- Chartist -->
    <script src="vendor/chartist/js/chartist.min.js"></script>
    <script src="vendor/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>
	
    <!-- Flot -->
    <script src="vendor/flot/jquery.flot.js"></script>
    <script src="vendor/flot/jquery.flot.resize.js"></script>
    <script src="vendor/flot-spline/jquery.flot.spline.min.js"></script>
	
    <!-- Counter Up -->
    <script src="vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="vendor/jquery.counterup/jquery.counterup.min.js"></script>

	<!-- Demo scripts -->
    <script src="js/dashboard/dashboard-2.js"></script>
	
	<!-- Svganimation scripts -->
    <script src="vendor/svganimation/vivus.min.js"></script>
    <script src="vendor/svganimation/svg.animation.js"></script>
	
</body>

<!-- Mirrored from medico.dexignzone.com/admin/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Dec 2021 10:57:33 GMT -->
</html>