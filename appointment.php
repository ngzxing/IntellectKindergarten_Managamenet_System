<?php

include "sessionStaff.php";
include "dbconnect.php"
?>
    <script>    

        function confirm(id){

            $("#modal-appointment-confirmation".concat(id) ).modal("show");
            
        }

        function submitForm(id){

            document.getElementsByClassName("form")[id-1].submit();
        }

    </script>

	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Appointment</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Appointment</li>
				</ul>
			</div>	
			<div class="row">
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Appointment</h4>
						</div>
						<div class="widget-inner">
                            <table class="table table-striped table-hover ">
                                <thead>
                                    <tr>
                                    <th>#</th>
                                    <th>Parent</th>
                                    <th>Student</th>
                                    <th>Date Appoinment</th>
                                    <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                            
                            <?php
                                
                                $query = "SELECT stdMKN, stdName, pName, Student.pIC FROM Student JOIN Parent ON Student.pIC = Parent.pIC WHERE Student.stdRegStatus = 0";
                                $result = mysqli_query($con, $query);
                                $count = 1;
                                while( $row = mysqli_fetch_array($result)){
                                    
                                    echo "

                                    <tr>
                                    <td>$count</td>
                                    <td><a href = '#'>$row[pName]</a></td>
                                    <td><a href = '#'>$row[stdName]</a></td>
                                    <form method = 'post' action = 'appointmentProcess.php' class = 'form'>
                                        <input type = 'hidden' name = 'pIC' value = $row[pIC]>
                                        <input type = 'hidden' name = 'stdMKN' value = $row[stdMKN]>
                                        <td><div class = 'form-group'><input type = 'datetime-local' name = 'datetime' class = 'form-control' required></div></td>
                                        <td><div class = 'form-group'><button type = 'button' class = 'btn green pull-right' onclick = 'confirm($count);'>Submit</button></div></td>
                                    </form>
                                    </tr>
                                
                                    ";

                                    echo "
                                    
                                    <div class='modal' id = 'modal-appointment-confirmation$count'>
                                    <div class='modal-dialog' role='document'>
                                      <div class='modal-content'>
                                        <div class='modal-header'>
                                          <h5 class='modal-title'>Confirmation</h5>
                                          <button type='button' class='btn-close' data-dismiss='modal' aria-label='Close'>
                                            <span aria-hidden='true'></span>
                                          </button>
                                        </div>
                                        <div class='modal-body'>
                                          <p>Are you confirm to submit this appointment?</p>
                                        </div>
                                        <div class='modal-footer'>
                                          <button type='button' class='btn btn-primary' onclick = 'submitForm($count)'>Confirm</button>
                                          <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                    
                                    ";

                                    $count+=1;
    
                                }
                                
                                mysqli_close($con);
                            ?>
                                
                                </tbody>
                            </table>

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

<!-- Mirrored from educhamp.themetrades.com/demo/admin/user-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Feb 2019 13:11:35 GMT -->
</html>