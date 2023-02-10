<?php

include "dbconnect.php";

?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from educhamp.themetrades.com/demo/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Feb 2019 13:08:15 GMT -->
<head>

	<!-- META ============================================= -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	
	<!-- DESCRIPTION -->
	<meta name="description" content="EduChamp : Education HTML Template" />
	
	<!-- OG -->
	<meta property="og:title" content="EduChamp : Education HTML Template" />
	<meta property="og:description" content="EduChamp : Education HTML Template" />
	<meta property="og:image" content="" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- FAVICONS ICON ============================================= -->
	<link rel="icon" href="../error-404.html" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png" />
	
	<!-- PAGE TITLE HERE ============================================= -->
	<title>Intellect Qalil IQ Playschool System</title>
	
	<!-- MOBILE SPECIFIC ============================================= -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.min.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
	
	<!-- All PLUGINS CSS ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/assets.css">
	<link rel="stylesheet" type="text/css" href="assets/vendors/calendar/fullcalendar.css">
	
	<!-- TYPOGRAPHY ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/typography.css">
	
	<!-- SHORTCODES ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/shortcodes/shortcodes.css">
	
	<!-- STYLESHEETS ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/dashboard.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap5.min.css">
	<link class="skin" rel="stylesheet" type="text/css" href="assets/css/color/color-1.css">

	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


	
</head>
<body class="ttr-opened-sidebar ttr-pinned-sidebar">
	
	<!-- header start -->
	<header class="ttr-header">
		<div class="ttr-header-wrapper">
			<!--sidebar menu toggler start -->
			<div class="ttr-toggle-sidebar ttr-material-button">
				<i class="ti-close ttr-open-icon"></i>
				<i class="ti-menu ttr-close-icon"></i>
			</div>
			<!--sidebar menu toggler end -->
			<!--logo start -->
			<div class="ttr-logo-box">
				<div>
					<a href="dashboardAdmin.php" class="ttr-logo">
						<img class="ttr-logo-mobile" alt="" src="images/intellect_playschool.png" width="30" height="5">
						<img class="ttr-logo-desktop" alt="" src="images/intellect_playschool.png" width="80" height="5">
					</a>
				</div>
			</div>
			<!--logo end -->
			<div class="ttr-header-menu">
				<!-- header left menu start -->
				<ul class="ttr-header-navigation">
					<li>
						<a href="dashboardAdmin.php" class="ttr-material-button ttr-submenu-toggle">HOME</a>
					</li>
				</ul>
				<!-- header left menu end -->
			</div>
			<div class="ttr-header-right ttr-with-seperator">
				<!-- header right menu start -->
				<ul class="ttr-header-navigation">
					
					<li>
						<a href="#" class="ttr-material-button ttr-submenu-toggle"><span class="ttr-user-avatar"><img alt="" src="images/profileicon.jpg" width="32" height="32"></span></a>
						<div class="ttr-header-submenu">
							<ul>
								<li><a href="profileTeac.php">My profile</a></li>
								<li><a href="logoutProcess.php">Logout</a></li>
							</ul>
						</div>
					</li>
				
				</ul>
				<!-- header right menu end -->
			</div>
			<!--header search panel start -->
			<div class="ttr-search-bar">
				<form class="ttr-search-form">
					<div class="ttr-search-input-wrapper">
						<input type="text" name="qq" placeholder="search something..." class="ttr-search-input">
						<button type="submit" name="search" class="ttr-search-submit"><i class="ti-arrow-right"></i></button>
					</div>
					<span class="ttr-search-close ttr-search-toggle">
						<i class="ti-close"></i>
					</span>
				</form>
			</div>
			<!--header search panel end -->
		</div>
	</header>
	<!-- header end -->
	<!-- Left sidebar menu start -->
	<div class="ttr-sidebar">
		<div class="ttr-sidebar-wrapper content-scroll">
			<!-- side menu logo start -->
			<div class="ttr-sidebar-logo">
				<a href="#"><img alt="" src="images/intellect_playschool.png" width="75" height="5"></a>
				<!-- <div class="ttr-sidebar-pin-button" title="Pin/Unpin Menu">
					<i class="material-icons ttr-fixed-icon">gps_fixed</i>
					<i class="material-icons ttr-not-fixed-icon">gps_not_fixed</i>
				</div> -->
				<div class="ttr-sidebar-toggle-button">
					<i class="ti-arrow-left"></i>
				</div>
			</div>
			<!-- side menu logo end -->
			<!-- sidebar menu start -->
			<nav class="ttr-sidebar-navi">
				<ul>
					<li>
						<a href="dashboardAdmin.php" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-home"></i></span>
		                	<span class="ttr-label">Dashboard</span>
		                </a>
		            </li>
					<li>
						<a href="appointment.php" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-calendar"></i></span>
		                	<span class="ttr-label">Appointment</span>
		                </a>
		            </li>
					<li>
						<a href="regApproval.php" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-bookmark-alt"></i></span>
		                	<span class="ttr-label">Registration Approvement</span>
		                </a>
		            </li>
					<li>
						<a href="#" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-announcement"></i></span>
		                	<span class="ttr-label">Post</span>
		                	<span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
		                </a>
		                <ul>
		                	<li>
		                		<a href="announcementEdit.php" class="ttr-material-button"><span class="ttr-label">Announcement</span></a>
		                	</li>
		                	<li>
		                		<a href="activityPostTeac.php" class="ttr-material-button"><span class="ttr-label">Activity</span></a>
		                	</li>
		                </ul>
		            </li>
					<li>
						<a href="#" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-receipt"></i></span>
		                	<span class="ttr-label">Finance</span>
		                	<span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
		                </a>
		                <ul>
		                	<li>
		                		<a href="financialManage.php" class="ttr-material-button"><span class="ttr-label">Student Financial</span></a>
		                	</li>
		                	<li>
		                		<a href="salaryTeac.php" class="ttr-material-button"><span class="ttr-label">Teacher Salary</span></a>
		                	</li>
							<li>
		                		<a href="feeManage.php" class="ttr-material-button"><span class="ttr-label">Fee Item</span></a>
		                	</li>
		                </ul>
		            </li>
					<li>
						<a href="#" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-book"></i></span>
		                	<span class="ttr-label">Playschool Configuration</span>
		                	<span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
		                </a>
		                <ul>
							<li>
		                		<a href="classConf.php" class="ttr-material-button"><span class="ttr-label">Class Configuration</span></a>
		                	</li>
		                	<li>
		                		<a href="adminAssestConf.php" class="ttr-material-button"><span class="ttr-label">Assessment Configuration</span></a>
		                	</li>
							<li>
		                		<a href="adminPerformConf.php" class="ttr-material-button"><span class="ttr-label">Performance Configuration</span></a>
		                	</li>
							<li>
		                		<a href="adminIndexConf.php" class="ttr-material-button"><span class="ttr-label">Index Configuration</span></a>
		                	</li>
		                </ul>
		            </li>
					<li>
						<a href="add-listing.php" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-marker-alt"></i></span>
		                	<span class="ttr-label">Student Assessment</span>
		                	<span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
		                </a>
		                <ul>

					<?php	
						include "dbconnect.php";

						$query = "SELECT DISTINCT clsName as clsName FROM subjectsTeac WHERE tIC = $_SESSION[tIC]";
                		$result = mysqli_query($con, $query);

						while($row = mysqli_fetch_array($result)){

						echo"
		                	<li>
		                		<a href='assestSelect.php?clsName=$row[clsName]' class='ttr-material-button'><span class='ttr-label'>$row[clsName]</span></a>
		                	</li>
							";
						}
					?>
		                </ul>
		            </li>
					<li>
						<a href="#" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-blackboard"></i></span>
		                	<span class="ttr-label">Student Status</span>
		                	<span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
		                </a>
		                <ul>
							<li>
		                		<a href="attendanceSelect.php" class="ttr-material-button"><span class="ttr-label">Student Attendance</span></a>
		                	</li>
		                	<li>
		                		<a href="covidSelect.php" class="ttr-material-button"><span class="ttr-label">Student Covid Status</span></a>
		                	</li>
		                </ul>
		            </li>
					<li>
						<a href="profileTeac.php" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-user"></i></span>
		                	<span class="ttr-label">My Profile</span>
		                </a>
		            </li>
		            <li class="ttr-seperate"></li>
				</ul>
				<!-- sidebar menu end -->
			</nav>
			<!-- sidebar menu end -->
		</div>
	</div>
	<!-- Left sidebar menu end -->