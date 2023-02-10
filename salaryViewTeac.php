<?php

// include "leftSideBarTeac.php";
// include "dbconnect.php";
include "sessionStaff.php";

error_reporting(E_ERROR | E_PARSE);

$tIC = $_SESSION["tIC"];

$query = "SELECT * FROM teacher t LEFT OUTER JOIN salary s ON s.tIC = t.tIC 
            WHERE t.tIC = '$tIC' ORDER BY s.salDate DESC";
$result = mysqli_query($con, $query);
$count = mysqli_num_rows($result);

$salPaid = array("Unpaid", "Paid");
$salPaidColor = array("text-red", "text-green");

?>

<html>
<main class="ttr-wrapper">
<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Salary</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
                    <li>Salary</li>
				</ul>
			</div>	
			<div class="row">
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
                            <?php 
							echo "<h4>Salary History</h4>";
                            ?>
						</div>
                        <div class="widget-inner">
                            
                            <table class="table table-striped table-hover ">
                                <?php 

                                    echo "
                                    <thead>
                                    <tr>
                                    <th>&nbsp</th>
                                    <th colspan=5>Income</th>
                                    <th colspan=2>Deduction</th>
                                    <th>&nbsp</th>
                                    <th>&nbsp</th>
                                    <th>&nbsp</th>
                                    <th>&nbsp</th>
                                    </tr>
                                    </thead>
                                    <thead>
                                    <tr>
                                    <th>Last Updated</th>
                                    <th>Basic Salary</th>
                                    <th>Overtime</th>
                                    <th>Playschool Allowance</th>
                                    <th>Public Holiday Allowance</th>
                                    <th>Overtime Allowance</th>
                                    <th>EPF</th>
                                    <th>Leave Without Pay</th>
                                    <th>Employer's EPF</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>PaySlip</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    ";

                                    if( mysqli_num_rows( $result ) != 0){

                                    while( $row = mysqli_fetch_array($result)){
                                        $sPS = $row['salPaidStatus'];
                                        echo "
                                        <tr>
                                        <td>$row[salDate]</td>
                                        <td>$row[salBasic]</td>
                                        <td>$row[salOT]</td>
                                        <td>$row[salPlayschoolAlw]</td>
                                        <td>$row[salPublicHolidayAlw]</td>
                                        <td>$row[salOvertimeAlw]</td>
                                        <td>$row[salEpf]</td>
                                        <td>$row[salLeaveWithoutPay]</td>
                                        <td>$row[salEmployerEPF]</td>
                                        <td>$row[salNet]</td>
                                        <div class='$salPaidColor[$sPS]'><td>$salPaid[$sPS]</td></div>
                                        <td><a href='salaryViewDetailTeac.php?id=".$row['salID']."' class='btn btn-warning'>View</a></td>
                                        ";
                                    }

                                    }
                                
                                echo"
                                </tbody>
                                </table>
                                ";

                                mysqli_close($con);
                            ?>
 
                            
                            </div>
                        </div>
                    </div>
                </div>
            </main>

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