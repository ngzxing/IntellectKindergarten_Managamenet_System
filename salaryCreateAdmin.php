<?php

include "sessionAdmin.php";
include "sessionStaff.php";
// include "leftSideBarAdmin.php";
// include "dbconnect.php";

$tIC = $_POST["tIC"];

$datemin = date('Y-m-d', strtotime(date("Y-m-d"). '- 28 days'));
$currentDate = date('Y-m-d');
$month = date("n", strtotime($currentDate));
$year = date('Y', strtotime($currentDate));

$query = "SELECT * FROM teacher WHERE tIC = '$tIC'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
$employeeEPF = $row['tBasicSalpHour'] * 0.11;
$employerEPF = $row['tBasicSalpHour'] * 0.13;

$query1 = "SELECT * FROM salary WHERE tIC = '$tIC' ORDER BY salDate DESC";
$result1 = mysqli_query($con, $query1);
$row1 = mysqli_fetch_array($result1);
$lastmonth = date("n", strtotime($row1['salDate']));
$lastyear = date('Y', strtotime($row1['salDate']));
while($row1 = mysqli_fetch_array($result1)){
	if(($lastmonth == $month) && ($lastyear == $year)){
		$lastmonth = $month;
		$lastyear = $year;
	}
}

?>

    <script>    

        function salaryCreateSubmit(){

            $("#modal-salaryCreateAdmin-submit").modal("show");
            
        }

        function submitForm(){

            document.getElementById("submitCreatedSalary-form").submit();
        }

    </script>

<div class="modal" id = "modal-salaryCreateAdmin-submit">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you confirm to create this salary?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick = "submitForm()">Confirm</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<!--Main container start -->
<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Create Salary</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
                    <li>My Teacher</li>
                    <li>Salary</li>
					<li>Create Salary</li>
				</ul>
			</div>	

            <div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Create Salary</h4>
						</div>
                        
						

                        <form class="edit-profile m-b30" name="createSalaryForm" method="post" action = "salaryCreateProcess.php" onsubmit="return checklastUpdateDate()" id = "submitCreatedSalary-form">
						<div class="form-group row">
                        &nbsp 
						<label class="col-sm-2 col-form-label">Teacher Name</label>
						<div class="col-sm-8">
                            <input name="tName" type="text" value=<?php echo $row['tName']; ?> class="form-control" readonly>
                        </div>
						</div>

						<div class="form-group row">
                        &nbsp 
						<label class="col-sm-2 col-form-label">Date Created</label>
						<div class="col-sm-8">
                            <input name="salDate" type="date" value=<?php echo $currentDate; ?> min=<?php echo $datemin; ?> max=<?php echo $currentDate; ?> class = "form-control" required>
                        </div>
						</div>

                        <div class="form-group row">
                        &nbsp 
						<label class="col-sm-2 col-form-label">Basic/Montly Salary</label>
						<div class="col-sm-8">
                            <input name="tBasicSalpHour" type="number" value=<?php echo $row['tBasicSalpHour']; ?> min="0" class = "form-control" required>
                        </div>
						</div>

                        <div class="form-group row">
                        &nbsp 
						<label class="col-sm-2 col-form-label">OT Salary per Day</label>
						<div class="col-sm-8">
                            <input name="tOTSalpHour" type="number" value=<?php echo $row['tOTSalpHour']; ?> min="0" class = "form-control" required>
                        </div>
						</div>
                        <hr>

                        <div class="form-group row">
                        &nbsp 
						<label class="col-sm-2 col-form-label">OT Day/s</label>
						<div class="col-sm-8">
                            <input name="salOTDay" value="0" type="number" step="1" min="0" class = "form-control" required>
                        </div>
						</div>

                        <div class="form-group row">
                        &nbsp 
						<label class="col-sm-2 col-form-label">Playschool Allowance</label>
						<div class="col-sm-8">
                            <input name="salPlayschoolAlw" value="" type="number" min="0" class = "form-control">
                        </div>
						</div>

                        <div class="form-group row">
                        &nbsp 
						<label class="col-sm-2 col-form-label">Public Holiday Allowance</label>
						<div class="col-sm-8">
                            <input name="salPublicHolidayAlw" value="" type="number" min="0" class = "form-control">
                        </div>
						</div>

                        <div class="form-group row">
                        &nbsp 
						<label class="col-sm-2 col-form-label">Overtime Allowance</label>
						<div class="col-sm-8">
                            <input name="salOvertimeAlw" value="" type="number" min="0" class = "form-control">
                        </div>
						</div>

                        <div class="form-group row">
                        &nbsp 
						<label class="col-sm-2 col-form-label">EPF</label>
						<div class="col-sm-8">
                            <input name="salEpf" value=<?php echo $employeeEPF; ?> type="number" min="0" class = "form-control">
                        </div>
						</div>

                        <div class="form-group row">
                        &nbsp 
						<label class="col-sm-2 col-form-label">Leave Without Pay</label>
						<div class="col-sm-8">
                            <input name="salLeaveWithoutPay" value="" type="number" min="0" class = "form-control">
                        </div>
						</div>

                        <div class="form-group row">
                        &nbsp 
						<label class="col-sm-2 col-form-label">Employer's EPF</label>
						<div class="col-sm-8">
                            <input name="salEmployerEPF" value=<?php echo $employerEPF; ?> type="number" min="0" class = "form-control">
                        </div>
						</div>		

						<div class="form-group row">
                        &nbsp 
						<label class="col-sm-2 col-form-label">Paid Status</label>
						<div class="col-sm-8">
						<div class="form-check">
                            <input class="form-check-input" type="radio" name="salPaidStatus" value=0 checked required>
                            <label class="form-check-label" for="salPaidStatus">UNPAID</label>
							&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                            <input class="form-check-input" type="radio" name="salPaidStatus" value=1 required>
                        	<label class="form-check-label" for="salPaidStatus">PAID</label>
                        </div>
						</div>
						</div>
                         
						<input name="tIC" type="hidden" value=<?php echo $tIC; ?>>
                        <div class="">
									<div class="">
										<div class="row">
											<div class="col-sm-2">
											</div>
											<div class="col-sm-7">
												<button type="button" class="btn green" onclick = "salaryCreateSubmit()">Submit</button>
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
	function checklastUpdateDate(){
		let monthnow = <?php echo "$month"; ?>;
		let yearnow = <?php echo "$year"; ?>;
		let monthlast = <?php echo "$lastmonth"; ?>;
		let yearlast = <?php echo "$lastyear"; ?>;
		if((monthnow == monthlast) && (yearnow == yearlast)){
			alert("The salary for this month and year already created!");
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