<?php

include "sessionAdmin.php";
include "sessionStaff.php";
// include "leftSideBarAdmin.php";
// include "dbconnect.php";

if(isset($_GET['id']))
{
	$salID = $_GET['id'];
}


$query = "SELECT * FROM teacher LEFT OUTER JOIN salary ON teacher.tIC = salary.tIC
        WHERE salID = '$salID '";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);

?>

<style>
.btn-close {
  box-sizing: content-box;
  width: 1em;
  height: 1em;
  padding: 0.25em 0.25em;
  color: #fff;
  background: transparent url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath d='M.293.293a1 1 0 0 1 1.414 0L8 6.586 14.293.293a1 1 0 1 1 1.414 1.414L9.414 8l6.293 6.293a1 1 0 0 1-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L6.586 8 .293 1.707a1 1 0 0 1 0-1.414z'/%3e%3c/svg%3e") center/1em auto no-repeat;
  border: 0;
  border-radius: 0.375rem;
  opacity: 0.4;
}
</style>

    <script>    

        function salaryModifySubmit(){

            $("#modal-salaryModifyAdmin-submit").modal("show");
            
        }

        function submitForm(){

            document.getElementById("submitModifiedSalary-form").submit();
        }

    </script>

<div class="modal" id = "modal-salaryModifyAdmin-submit">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you confirm to modify this salary?</p>
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
				<h4 class="breadcrumb-title">Modify Salary</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
                    <li>My Teacher</li>
                    <li>Salary</li>
					<li>Modify Salary</li>
				</ul>
			</div>	

            <div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Create Salary</h4>
						</div>

                        <?php
                        if($row['salPaidStatus'] == 1){
                            echo'
                            <div class="form-group row">
                            <div class="col-sm-12">
                            <div class="alert alert-dismissible alert-warning">
                              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                              <h4 class="alert-heading">ALERT!</h4>
                              <p class="mb-0">This salary already paid! Do you sure you still want to modify?</p>
                            </div>
                            </div>
                            </div>
                            ';
                        }
                        ?>						

                        <form class="edit-profile m-b30" name="modifySalaryForm" method="post" action = "salaryModifyProcess.php" id = "submitModifiedSalary-form">
                        <div class="form-group row">
                        &nbsp 
						<label class="col-sm-2 col-form-label">Teacher Name</label>
						<div class="col-sm-8">
                            <input name="tName" type="text" value=<?php echo $row['tName']; ?> class="form-control" readonly>
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
                            <input name="salOTDay" value=<?php echo $row['salOTDay']; ?> type="number" step="1" min="0" class = "form-control" required>
                        </div>
						</div>

                        <div class="form-group row">
                        &nbsp 
						<label class="col-sm-2 col-form-label">Playschool Allowance</label>
						<div class="col-sm-8">
                            <input name="salPlayschoolAlw" value=<?php echo $row['salPlayschoolAlw']; ?> type="number" min="0" class = "form-control">
                        </div>
						</div>

                        <div class="form-group row">
                        &nbsp 
						<label class="col-sm-2 col-form-label">Public Holiday Allowance</label>
						<div class="col-sm-8">
                            <input name="salPublicHolidayAlw" value=<?php echo $row['salPublicHolidayAlw']; ?> type="number" min="0" class = "form-control">
                        </div>
						</div>

                        <div class="form-group row">
                        &nbsp 
						<label class="col-sm-2 col-form-label">Overtime Allowance</label>
						<div class="col-sm-8">
                            <input name="salOvertimeAlw" value=<?php echo $row['salOvertimeAlw']; ?> type="number" min="0" class = "form-control">
                        </div>
						</div>

                        <div class="form-group row">
                        &nbsp 
						<label class="col-sm-2 col-form-label">EPF</label>
						<div class="col-sm-8">
                            <input name="salEpf" value=<?php echo $row['salEpf']; ?> type="number" min="0" class = "form-control">
                        </div>
						</div>

                        <div class="form-group row">
                        &nbsp 
						<label class="col-sm-2 col-form-label">Leave Without Pay</label>
						<div class="col-sm-8">
                            <input name="salLeaveWithoutPay" value=<?php echo $row['salLeaveWithoutPay']; ?> type="number" min="0" class = "form-control">
                        </div>
						</div>

                        <div class="form-group row">
                        &nbsp 
						<label class="col-sm-2 col-form-label">Employer's EPF</label>
						<div class="col-sm-8">
                            <input name="salEmployerEPF" value=<?php echo $row['salEmployerEPF']; ?> type="number" min="0" class = "form-control">
                        </div>
						</div>

						<div class="form-group row">
                        &nbsp 
						<label class="col-sm-2 col-form-label">Paid Status</label>
						<div class="col-sm-8">
						<div class="form-check">
                            <?php
                            if($row['salPaidStatus']){
                                echo '
                                <input class="form-check-input" type="radio" name="salPaidStatus" value=0 required>
                                <label class="form-check-label" for="salPaidStatus">UNPAID</label>
                                &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                                <input class="form-check-input" type="radio" name="salPaidStatus" value=1 checked required>
                                <label class="form-check-label" for="salPaidStatus">PAID</label>
                                ';
                            }else{
                                echo'
                                <input class="form-check-input" type="radio" name="salPaidStatus" value=0 checked required>
                                <label class="form-check-label" for="salPaidStatus">UNPAID</label>
                                &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                                <input class="form-check-input" type="radio" name="salPaidStatus" value=1 required>
                                <label class="form-check-label" for="salPaidStatus">PAID</label>
                                ';
                            }
                            
                            ?>
                        </div>
						</div>
						</div>
                         
						<input name="salID" type="hidden" value=<?php echo $salID; ?>>
                        <input name="tIC" type="hidden" value=<?php echo $row['tIC']; ?>>

                        <div class="">
									<div class="">
										<div class="row">
											<div class="col-sm-2">
											</div>
											<div class="col-sm-7">
												<button type="button" class="btn green" onclick = "salaryModifySubmit()">Submit</button>
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