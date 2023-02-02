<?php

include "leftSideBarParent.php";
include "dbconnect.php";

// $pIC = $_SESSION["pIC"];
if(isset($_GET['id']))
{
	$stdMKN = $_GET['id'];
	$_SESSION["stdMKN"] = $stdMKN;
}else{
	$stdMKN = $_SESSION["stdMKN"];
}

// $stdMKN = $_POST["stdMKN"];

$query = "SELECT * FROM Student WHERE stdMKN = '$stdMKN'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);

$diapers = array('No', 'Yes');

?>

	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Student Profile</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Student Profile</li>
				</ul>
			</div>	
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Student Profile</h4>
						</div>
						<div class="widget-inner">
							<form class="edit-profile m-b30" name="profileForm" method="post" action="profileStudentProcess.php">
								<div class="">
                                    <div class="form-group ">
                                    <a href="<?php echo $row['stdPhoto']?>" ><img src="<?php echo $row['stdPhoto']?>" alt="Personal Photo" width="500" height="600"></a>
                                    </div>

									<div class="form-group row">
										<div class="col-sm-10  ml-auto">
											<h3>1. Personal Details</h3>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Full Name</label>
										<div class="col-sm-7">
											<input name="stdName" class="form-control" type="text" value = "<?php echo $row['stdName']?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">My Kids No.</label>
										<div class="col-sm-7">
											<input name="stdMKN" class="form-control" type="text" value="<?php echo $stdMKN ?>" disabled> 
										</div>
									</div>
									<input name="stdMKN" class="form-control" type="hidden" value="<?php echo $stdMKN?>">
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Gender</label>
                                        <div class="col-sm-7">
                                        <input name="stdGender" class="form-control" type="text" value="<?php echo $row['stdGender']?>">
                                        </div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Age</label>
										<div class="col-sm-7">
											<input name="stdAge" class="form-control" type="text" value="<?php echo $row['stdAge']?>">										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Date of Birth</label>
										<div class="col-sm-7">
											<input name="stdDOB" class="form-control" type="date" value="<?php echo $row['stdDOB']?>">
										</div>
									</div>
									
									<div class="seperator"></div>
									
									<div class="form-group row">
										<div class="col-sm-10 ml-auto">
											<h3>2. Playschool Details</h3>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Program</label>
										<div class="col-sm-7">
											<input name="prgName" class="form-control" type="text" value="<?php echo $row['prgName']?>" disabled>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Class</label>
										<div class="col-sm-7">
											<input name="clsName" class="form-control" type="text" value="<?php echo $row['clsName']?>" disabled>
										</div>
                                    </div>
                                    <div class="form-group row">
										<label class="col-sm-2 col-form-label">Session</label>
										<div class="col-sm-7">
											<input name="stdSession" class="form-control" type="text" value="<?php echo $row['stdSession']?>" disabled>
										</div>
                                    </div>
                                    <div class="form-group row">
										<label class="col-sm-2 col-form-label">Meal</label>
										<div class="col-sm-7">
											<input name="stdMeal" class="form-control" type="text" value="<?php echo $row['stdMeal']?>" disabled>
										</div>
                                    </div>

                                    <div class="seperator"></div>
									<div class="form-group row">
										<div class="col-sm-10 ml-auto">
											<h3 class="m-form__section">3. Condition</h3>
										</div>
									</div>
									<?php $stdDiapers = $row['stdDiapers']; ?>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Diapers</label>
										<div class="col-sm-7">
											<input name="stdDiapers" class="form-control" type="text" value="<?php echo $diapers[$stdDiapers]?>">
										</div>
									</div>
                                    </div>
									<?php
										$sql1 = "SELECT * FROM stdallergy WHERE stdMKN = '$stdMKN'";
										$result1 = mysqli_query($con, $sql1);
										$row1 = mysqli_fetch_array($result1);
									?>
                                    <div class="form-group row">
										<label class="col-sm-2 col-form-label">Allergy</label>
										<div class="col-sm-7">
											<input name="allergy" class="form-control" type="text" value="<?php 
											if(isset($row1['allergy'])){ echo $row1['allergy']; }?>">
										</div>
									</div>

                                    <div class="seperator"></div>
									<div class="form-group row">
										<div class="col-sm-10 ml-auto">
											<h3 class="m-form__section">4. Favourite</h3>
										</div>
									</div>
                                    <div class="form-group row">
										<label class="col-sm-2 col-form-label">Color</label>
										<div class="col-sm-7">
											<input name="stdFavorColor" class="form-control" type="text" value="<?php echo $row['stdFavorColor']?>">
										</div>
									</div>
									<?php
										$sql2 = "SELECT * FROM stdfavorfood WHERE stdMKN = '$stdMKN'";
										$result2 = mysqli_query($con, $sql2);
										$row2 = mysqli_fetch_array($result2);
									?>
                                    <div class="form-group row">
										<label class="col-sm-2 col-form-label">Food</label>
										<div class="col-sm-7">
											<input name="food" class="form-control" type="text" value="<?php 
											if(isset($row2['food'])){ echo $row2['food']; }?>">
										</div>
                                    </div>
									<?php
										$sql3 = "SELECT * FROM stdfavortoy WHERE stdMKN = '$stdMKN'";
										$result3 = mysqli_query($con, $sql3);
										$row3 = mysqli_fetch_array($result3);
									?>
                                    <div class="form-group row">
										<label class="col-sm-2 col-form-label">Toy</label>
										<div class="col-sm-7">
											<input name="toy" class="form-control" type="text" value="<?php 
											if(isset($row3['toy'])){ echo $row3['toy']; }?>">
										</div>
									</div>

									<div class="">
									<div class="">
										<div class="row">
											<div class="col-sm-2">
											</div>
											<div class="col-sm-7">
												<input type="submit" class="btn yellow" value="Save changes">
												<input type="reset" class="btn-secondry" value="Cancel">
											</div>
										</div>
									</div>
								</div>
                     
							</form>
							<!-- <form class="edit-profile">
								<div class="">
									<div class="form-group row">
										<div class="col-sm-10 ml-auto">
											<h3>4. Password</h3>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Current Password</label>
										<div class="col-sm-7">
											<input class="form-control" type="password" value="">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">New Password</label>
										<div class="col-sm-7">
											<input class="form-control" type="password" value="">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Re Type Password</label>
										<div class="col-sm-7">
											<input class="form-control" type="password" value="">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-2">
									</div>
									<div class="col-sm-7">
										<button type="reset" class="btn">Save changes</button>
										<button type="reset" class="btn-secondry">Cancel</button>
									</div>
								</div>
									
							</form> -->
						</div>
					</div>
				</div>
				<!-- Your Profile Views Chart END-->
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

<!-- Mirrored from educhamp.themetrades.com/demo/admin/user-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Feb 2019 13:11:35 GMT -->
</html>