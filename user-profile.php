<?php

include "leftSideBarParent.php";
?>

<script>    

        function saveUserProf(){
            
            $("#modal-userProf-save").modal("show");
        }

		function cancelUserProf(){
            
            $("#modal-userProf-cancel").modal("show");
        }

        function saveForm(){
            
            document.getElementById("submit-asset").submit();
        }

		function cancelForm(){
            
            document.getElementById("submit-asset").submit();
        }

</script>

<div class="modal" id = "modal-assIndexStd-submit">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you confirm to save changes?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick = "saveForm()">Confirm</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" id = "modal-assIndexStd-submit">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you confirm to cancel the changes?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick = "cancelForm()">Confirm</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">User Profile</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>User Profile</li>
				</ul>
			</div>	
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>User Profile</h4>
						</div>
						<div class="widget-inner">
							<form class="edit-profile m-b30">
								<div class="">
									<div class="form-group row">
										<div class="col-sm-10  ml-auto">
											<h3>1. Personal Details</h3>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Full Name</label>
										<div class="col-sm-7">
											<input class="form-control" type="text" value = "LOO ZHI YUAN">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">IC</label>
										<div class="col-sm-7">
											<input class="form-control" type="text" value="020707011234">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Position</label>
										<p>Teacher</p>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">E-mail</label>
										<div class="col-sm-7">
											<input class="form-control" type="text" value="looyuan@graduate.utm.my">
											<!-- <span class="help">If you want your invoices addressed to a company. Leave blank to use your full name.</span> -->
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Phone No.</label>
										<div class="col-sm-7">
											<input class="form-control" type="text" value="60162756776">
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
											<input class="form-control" type="text" value="5-Lorong Yew Rui Xiang">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">City</label>
										<div class="col-sm-7">
											<input class="form-control" type="text" value="Bangan Serai">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">State</label>
										<div class="col-sm-7">
											<input class="form-control" type="text" value="Kedah">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Postcode</label>
										<div class="col-sm-7">
											<input class="form-control" type="text" value="00000">
										</div>
									</div>

									<div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>

									<div class="form-group row">
										<div class="col-sm-10 ml-auto">
											<h3 class="m-form__section">3. Salary</h3>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Bank Account</label>
										<div class="col-sm-7">
											<input class="form-control" type="text" value="7000612567">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Bank</label>
										<div class="col-sm-7">
											<input class="form-control" type="text" value="CIMB">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">EPF</label>
										<div class="col-sm-7">
											<input class="form-control" type="text" value="">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Basic Salary Per Hour</label>
										<div class="col-sm-7">
											<p>RM 75</p>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">OT Salary Per Hour</label>
										<div class="col-sm-7">
											<p>RM 90</p>
										</div>
									</div>
									
								</div>
								<div class="">
									<div class="">
										<div class="row">
											<div class="col-sm-2">
											</div>
											<div class="col-sm-7">
												<button type="button" class="btn" onclick = "saveUserProf()">Save changes</button>
												<button type="reset" class="btn-secondry" onclick = "cancelUserProf()">Cancel</button>
											</div>
										</div>
									</div>
								</div>
							</form>
							<form class="edit-profile">
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
									
							</form>
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