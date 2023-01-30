<?php

include "leftSideBarParent.php";
include "dbconnect.php";
$pIC = $_SESSION["pIC"];

$datemin = date('Y-m-d', strtotime(date("Y-m-d"). ' + 1 days'));
$datemax = date('Y-m-d', strtotime(date("Y-m-d"). ' + 7 days'));


?>


	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Attendance</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Attendance</li>
				</ul>
			</div>	

            <div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Attendance</h4>
						</div>
                        

                        <form class="edit-profile m-b30" name="attendanceForm" method="post" action = "attendanceStudentProcess.php" onsubmit="return checkvalidDate()">
                        <div class="form-group row">
                        &nbsp 
								<label class="col-sm-2 col-form-label">Select your kid/s</label>
								<div class="col-sm-8">
                                <select name = "stdMKN" class="form-control" id="select">
                                <?php

                                $query = "SELECT * FROM Student WHERE pIC = $pIC AND stdRegStatus = 2";
                                $result = mysqli_query($con, $query);

                                while( $row = mysqli_fetch_array($result) ){

                                    echo "<option value = $row[stdMKN]> $row[stdName] </option>";
                                }
                            
                                mysqli_close($con);
                                ?>                        
                                </select>
                                </div>
						</div>
                        
                        <div class="form-group row">
                        &nbsp 
                            <label class="col-sm-2 col-form-label">Attendance Date</label>
                            <div class="col-sm-8">
                            <input name="attDate" value="" type="date" min=<?php echo $datemin; ?>  
                            max=<?php echo $datemax; ?> class = "form-control" required>
                            </div>
                        </div>
                         
                        <div class="form-group row">
                        &nbsp 
                            <label class="col-sm-2 col-form-label">Attendance Status</label>
                            <span class="form-check">
                            &nbsp &nbsp <input class="form-check-input" type="radio" name="attExpect" value=1 checked>
                            <label class="form-check-label" for="attExpect">YES</label>
                            </span>
                            <span class="form-check">
                            &nbsp &nbsp <input class="form-check-input" type="radio" name="attExpect" value=0>
                            <label class="form-check-label" for="attExpect">NO</label>
                            </span>
                        </div>

                        <div class="form-group row">
                        &nbsp 
                            <label class="col-sm-2 col-form-label">Reason</label>
                            <div class="col-sm-8">
                           
                            <textarea name="attReason" placeholder="Reason if your student not attend class" type="text"  class = "form-control"></textarea>                            </div>
                        </div>
                        
                        <div class="">
									<div class="">
										<div class="row">
											<div class="col-sm-2">
											</div>
											<div class="col-sm-7">
												<button type="submit" class="btn">Submit</button>
												<button type="reset" class="btn-secondry">Cancel</button>
											</div>
										</div>
									</div>
								</div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </main>
        <div class="ttr-overlay"></div>


<script>
	function checkvalidDate(){
		let weekday = document.forms["attendanceForm"]["attDate"].value;
		let weekdate = new Date (weekday);
		if(weekdate.getDay() == 0 || weekdate.getDay() == 6){
			alert("Please select playschool day!");
			return false;
		}else{
            alert("Submit successfully");
        }
	}
</script>

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

