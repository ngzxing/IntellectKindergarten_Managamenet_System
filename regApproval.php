<?php

include "leftSideBarTeac.php";
include "dbconnect.php"
?>

	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Registration Approvement</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Registration Approvement</li>
				</ul>
			</div>	
			<div class="row">
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Registration Appointment</h4>
						</div>
						<div class="widget-inner">
                            <table class="table table-striped table-hover ">
                                <thead>
                                    <tr>
                                    <th>Reg ID</th>
                                    <th>Student</th>
                                    <th>Appoinment Date</th>
                                    <th></th>
                                    <th></th>
                                    <th>Class</th>
                                    <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                            
                            <?php
                                
                                $query = "SELECT rID, Student.stdMKN, stdName, rTime, prgName  FROM RegApp JOIN Student ON Student.stdMKN = RegApp.stdMKN WHERE tIC = '$_SESSION[tIC]' AND stdRegStatus = 1";
                                $result = mysqli_query($con, $query);
                                while( $row = mysqli_fetch_array($result)){
                                    
                                    echo "

                                    <tr>
                                    <td>$row[rID]</td>
                                    <td><a href = '#'>$row[stdName]</a></td>
                                    <td><a href = '#'>$row[rTime]</a></td>
                                    <form method = 'post' action = 'regApprovalProcess.php'>
                                        <input type = 'hidden' name = 'rID' value = $row[rID]>
                                        <input type = 'hidden' name = 'stdMKN' value = $row[stdMKN]>
                                        <td><div class = 'form-group'><input type = 'submit' class = 'form-control btn yellow' name = 'operation' value = 'Cancel'></div></td>
                                        <td><div class = 'form-group'><input type = 'submit' class = 'form-control btn red' name = 'operation' value = 'Reject'></div></td>
                                        <td>
                                        <select name = 'clsName' id='select'>  
                                       
                                    ";

                                    $queryClass = "SELECT * FROM Class Where prgName = '$row[prgName]' ";
                                    $resultClass = mysqli_query($con, $queryClass);

                                        while( $rowClass = mysqli_fetch_array($resultClass) ){

                                            echo "<option value = '$rowClass[clsName]'> $rowClass[clsName] </option>";
                                    }
                            
                                    
                                    echo "
                                        </select>
                                        </td>
                                        <td><div class = 'form-group'><input type = 'submit' class = 'form-control btn green' name = 'operation' value = 'Accept'></div></td>
                                    </form>
                                    </tr>
                                    ";
    
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