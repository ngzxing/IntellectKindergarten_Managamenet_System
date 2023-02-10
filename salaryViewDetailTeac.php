<?php

// include "leftSideBarTeac.php";
// include "dbconnect.php";
include "sessionStaff.php";

error_reporting(E_ERROR | E_PARSE);

$tIC = $_SESSION["tIC"];
if(isset($_GET['id']))
{
	$salID = $_GET['id'];
}


$query = "SELECT * FROM teacher LEFT OUTER JOIN salary ON teacher.tIC = salary.tIC
        WHERE salID = '$salID '";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);

$year = date('Y', strtotime($row["salDate"]));
$salPaid = array("Unpaid", "Paid");
$salPaidColor = array("text-red", "text-green");

?>

<html>
<main class="ttr-wrapper">
<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Salary Details</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>My Teacher</li>
                    <li>Salary</li>
                    <li>Salary Details</li>
				</ul>
			</div>	
			<div class="row">
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
                            <?php 
							echo "<h4>Salary Details</h4>";
                            ?>
						</div>
                        <div class="widget-inner">
                        <table class="table table-striped table-hover ">

                                    <h3>PaySlip <?php echo $year; ?></h3>
                                    <h4>Ria Villa Intellectual Kindergarten, Johor Bahru</h4>

                                    <p><b>Staff Name:</b> <?php echo $row['tName']; ?></p>
                                    <p><b>Date:</b> <?php echo $row['salDate']; ?></p>
                                    <p><b>Position:</b> Teacher</p>
                            
                                <?php 

                                    echo "
                                    
                                    <thead>
                                    <tr>
                                    <th style='width:50%' colspan=3>Income</th>
                                    <th style='width:50%' colspan=3>Deduction</th>
                                    </tr>
                                    <tr>
                                    <th style='width:10%'>No.</th>
                                    <th style='width:25%'>Details</th>
                                    <th style='width:15%'>Total (RM)</th>
                                    <th style='width:10%'>No.</th>
                                    <th style='width:25%'>Details</th>
                                    <th style='width:15%'>Total (RM)</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    ";

                                        $sPS = $row['salPaidStatus'];
                                        echo "
                                        <tr>
                                        <td>1</td>
                                        <td>Basic Salary</td>
                                        <td>$row[salBasic]</td>
                                        <td>1</td>
                                        <td>EPF</td>
                                        <td>$row[salEpf]</td>
                                        </tr>

                                        <tr>
                                        <td>2</td>
                                        <td>Overtime</td>
                                        <td>$row[salOT]</td>
                                        <td>2</td>
                                        <td>LeaveWithoutPay</td>
                                        <td>$row[salEmployerEPF]</td>
                                        </tr>

                                        <tr>
                                        <td>3</td>
                                        <td>Playschool Allowance</td>
                                        <td>$row[salPlayschoolAlw]</td>
                                        <td>&nbsp</td>
                                        <td>&nbsp</td>
                                        <td>&nbsp</td>
                                        </tr>

                                        <tr>
                                        <td>4</td>
                                        <td>Public Holiday Allowance</td>
                                        <td>$row[salPublicHolidayAlw]</td>
                                        <td>&nbsp</td>
                                        <td>&nbsp</td>
                                        <td>&nbsp</td>
                                        </tr>

                                        <tr>
                                        <td>4</td>
                                        <td>Overtime Allowance</td>
                                        <td>$row[salOvertimeAlw]</td>
                                        <td>&nbsp</td>
                                        <td>&nbsp</td>
                                        <td>&nbsp</td>
                                        </tr>

                                        <tr>
                                        <td colspan=2>Total Income</td>
                                        <td>$row[salTotIncome]</td>
                                        <td colspan=2>Total Deduction</td>
                                        <td>$row[salTotDeduction]</td>
                                        </tr>

                                        <tr>
                                        <td colspan=3>&nbsp</td>
                                        <td colspan=2>Employer's EPF</td>
                                        <td>$row[salEmployerEPF]</td>
                                        </tr>

                                        <tr>
                                        <td colspan=3>&nbsp</td>
                                        <td colspan=3>Net Salary</td>
                                        </tr>

                                        <tr>
                                        <td colspan=3>&nbsp</td>
                                        <td colspan=3>$row[salNet]</td>
                                        </tr>
                                        
                                        ";
                                    
                                $sPS = $row['salPaidStatus'];
                                echo"
                                </tbody>
                                </table>
                                <p>Status = $salPaid[$sPS]</p>
                                <button onclick='window.print()'>Print PaySlip</button>
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