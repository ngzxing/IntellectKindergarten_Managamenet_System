<?php

include "leftSideBarParent.php";

?>

	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">My Kids</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>My Kids</li>
				</ul>
			</div>	
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Your Kids</h4>
						</div>
						<div class="widget-inner">
							<form method = "post" action = "registerStudent.php">
								<?php echo "<input name = 'pIC' value = $_SESSION[pIC] type = 'hidden'>
											<input name = 'nextPage' value = 'myKids.php' type = 'hidden'>
								"; ?>							
								<label><input name = "submit" type = "submit" class = "btn yellow pull-right" value = "Add Your Child"></label>
							</form>
							
							
<?php



$pIC = $_SESSION["pIC"];
$gender = array("Girl", "Boy");
$regStatus = array("Unregister", "Processing", "Registered");
$regStatusColor = array("text-red", "text-yellow", "text-green");


$query = "SELECT * FROM Student WHERE pIC = $pIC";
$result = mysqli_query($con, $query);

while($row = mysqli_fetch_array($result)){

	$rS = $row["stdRegStatus"];
	echo
		"<div class='card-courses-list admin-courses'>

			<div class='card-courses-media'>
				<img src= '$row[stdPhoto]' alt=''/>
			</div>

			<div class='card-courses-full-dec'>

				<div class='card-courses-title'>
					<h2>$row[stdName]</h2>
				</div>

			<div class='card-courses-list-bx'>
				
				<ul class='card-courses-view'>

					<li class='card-courses-user'>
						<div class='card-courses-user-pic'>
							<img src='assets/images/testimonials/pic3.jpg' alt=''/>
						</div>

						<div class='card-courses-user-info'>
							<h5>MKN Number</h5>
							<h4>$row[stdMKN]</h4>
						</div>							
					</li>
					
					<li class='card-courses-user'>
						<div class='card-courses-user-info'>
							<h5>Gender</h5>
							<h4>$row[stdGender]</h4>
						</div>
					</li>
					
					<li class='card-courses-user'>
						<div class='card-courses-user-info'>
							<h5>Date Of Birth</h5>
							<h4>$row[stdDOB]</h4>
						</div>
					</li>

					<li class='card-courses-user'>
						<div class='card-courses-user-info'>
							<h5>Age</h5>
							<h4>$row[stdAge]</h4>
						</div>
					</li>
				</ul>
			</div>

			<div class='row card-courses-dec'>
				<div class='col-md-12'>
					<h4 class='mb-10'>Course Registration Info</h4>
				</div>
										
				<div class = 'col-md-12'>
					<div class = 'mb-10'>
					<ul class = 'card-courses-view'>
						<li class = 'card-courses-user'>
							<div class = 'card-courses-user-info'>
								<h5>Register Status<h5>
								<p class = '$regStatusColor[$rS]'>$regStatus[$rS]</p>
							</div>
						</li>
						<li class = 'card-courses-user'>
							<div class = 'card-courses-user-info'>
								<h5>Program<h5>
								<p>$row[prgName]</p>
							</div>
						</li>
						<li class = 'card-courses-user'>
							<div class = 'card-courses-user-info'>
								<h5>Session<h5>
								<p>$row[stdSession]</p>
							</div>
						</li>
						<li class = 'card-courses-user'>
							<div class = 'card-courses-user-info'>
								<h5>Meal<h5>
								<p>$row[stdMeal]</p>
							</div>
						</li>
						<li class = 'card-courses-user'>
							<div class = 'card-courses-user-info'>
								<h5>Class<h5>
								<p>$row[clsName]</p>
							</div>
						</li>
					</ul>
					</div>
				</div>

				<div class='col-md-12'>
					<a href='profileStudent.php?id=".$row['stdMKN']."' class='btn green outline radius-xl '>Edit Profile</a>
				</div>
			</div>
										
		</div>
	</div>" ;
}
?>

					
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

	<div class="ttr-overlay"></div>

<!-- External JavaScripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/vendors/bootstrap/js/popper.min.js"></script>
<script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
<script src="assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
<script src="assets/vendors/magnific-popup/magnific-popup.js"></script>
<script src="assets/vendors/counter/waypoints-min.js"></script>
<script src="assets/vendors/counter/counterup.min.js"></script>
<script src="assets/vendors/imagesloaded/imagesloaded.js"></script>
<script src="assets/vendors/masonry/masonry.js"></script>
<script src="assets/vendors/masonry/filter.js"></script>
<script src="assets/vendors/owl-carousel/owl.carousel.js"></script>
<script src='assets/vendors/scroll/scrollbar.min.js'></script>
<script src="assets/js/functions.js"></script>
<script src="assets/vendors/chart/chart.min.js"></script>
<script src="assets/js/admin.js"></script>
<script src='assets/vendors/switcher/switcher.js'></script>
</body>

<!-- Mirrored from educhamp.themetrades.com/demo/admin/courses.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Feb 2019 13:11:35 GMT -->
</html>