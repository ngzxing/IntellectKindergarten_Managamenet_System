<?php

include "sessionStaff.php";
include "dbconnect.php";

$tIC = $_SESSION['tIC'];

$query = "SELECT * FROM Teacher WHERE tIC = '$tIC'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);

?>

	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Teacher Profile</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Teacher Profile</li>
				</ul>
			</div>	
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Teacher Profile</h4>
						</div>
						<div class="widget-inner">
							<form class="edit-profile m-b30" name="profileForm" method="post" action="profileTeacProcess.php">
								<div class="">
                                    <div class="form-group ">
                                    <a href="<?php echo $row['tPhoto']?>" ><img src="<?php echo $row['tPhoto']?>" alt="Personal Photo" width="500" height="600"></a>
                                    </div>

									<div class="form-group row">
										<div class="col-sm-10  ml-auto">
											<h3>1. Personal Details</h3>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Full Name</label>
										<div class="col-sm-7">
											<input name="tName" class="form-control" type="text" value = "<?php echo $row['tName']?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">IC</label>
										<div class="col-sm-7">
											<input name="tIC" class="form-control" type="text" value="<?php echo $tIC?>" disabled>
										</div>
									</div>
                                    <input name="tIC" class="form-control" type="hidden" value="<?php echo $tIC?>">
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Phone No.</label>
                                        <div class="col-sm-7">
                                        <input name="tPhone" class="form-control" type="text" value="<?php echo $row['tPhone']?>">
                                        </div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Email</label>
										<div class="col-sm-7">
											<input name="tEmail" class="form-control" type="text" value="<?php echo $row['tEmail']?>">										
                                        </div>
									</div>
									
									<div class="seperator"></div>
									
									<div class="form-group row">
										<div class="col-sm-10 ml-auto">
											<h3>2. Address</h3>
										</div>
									</div>
                                    <div class="form-group row">
										<label class="col-sm-2 col-form-label">Address</label>
										<div class="col-sm-7">
											<input name="tAddress" class="form-control" type="text" value="<?php echo $row['tAddress']?>" >
										</div>
                                    </div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">City</label>
										<div class="col-sm-7">
											<input name="tCity" class="form-control" type="text" value="<?php echo $row['tCity']?>" >
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">State</label>
										<div class="col-sm-7">
											<input name="tState" class="form-control" type="text" value="<?php echo $row['tState']?>" >
										</div>
                                    </div>
                                    <div class="form-group row">
										<label class="col-sm-2 col-form-label">Postcode</label>
										<div class="col-sm-7">
											<input name="tPostcode" class="form-control" type="text" value="<?php echo $row['tPostcode']?>" >
										</div>
                                    </div>
                                    

                                    <div class="seperator"></div>
									<div class="form-group row">
										<div class="col-sm-10 ml-auto">
											<h3 class="m-form__section">3. Salary</h3>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Bank Name</label>
										<div class="col-sm-7">
											<input name="tBank" class="form-control" type="text" value="<?php echo $row['tBank']?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Bank Account</label>
										<div class="col-sm-7">
											<input name="tBankAccount" class="form-control" type="text" value="<?php echo $row['tBankAccount']?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">EPF Account</label>
										<div class="col-sm-7">
											<input name="tEPF" class="form-control" type="text" value="<?php echo $row['tEPF']?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Basic/Monthly Salary</label>
										<div class="col-sm-7">
											<input name="tBasicSalpHour" class="form-control" type="text" value="<?php echo $row['tBasicSalpHour']?>" disabled>
										</div>
									</div>
                                    </div>
                                    <div class="form-group row">
										<label class="col-sm-2 col-form-label">Daily OT Salary</label>
										<div class="col-sm-7">
											<input name="tOTSalpHour" class="form-control" type="text" value="<?php echo $row['tOTSalpHour']?>" disabled>
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