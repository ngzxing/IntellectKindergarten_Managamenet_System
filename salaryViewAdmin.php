<?php

include "sessionAdmin.php";
include "sessionStaff.php";
// include "leftSideBarAdmin.php";
// include "dbconnect.php";


// $tIC = $_POST["tIC1"];
// $tIC = $_SESSION["tICselected"];
if(isset($_SESSION["tICselected"])){
    $tIC = $_SESSION["tICselected"];
    $_SESSION["tICselected"] = NULL;
}else{
    $tIC = $_POST["tIC1"];
}

$query = "SELECT * FROM teacher t LEFT OUTER JOIN salary s ON s.tIC = t.tIC 
            WHERE t.tIC = '$tIC' ORDER BY s.salDate DESC";
$result = mysqli_query($con, $query);

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
					<li>My Teacher</li>
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
							<form method = "post" action = "salaryCreateAdmin.php">
								<?php 
                                $sql = "SELECT * FROM teacher WHERE tIC = '$tIC'";
                                $resultsql = mysqli_query($con, $sql);
                                $rowsql = mysqli_fetch_array($resultsql);
                                
                                echo"
                                    <p>Name = $rowsql[tName]<br>IC No. = $rowsql[tIC]
                                    <br>Bank = $rowsql[tBank]<br>Bank Account = $rowsql[tBankAccount]
                                    <br>EPF Account = $rowsql[tEPF]</p><hr>
                                ";
                                
                                echo "<input name = 'tIC' value = $tIC type = 'hidden'>
								"; ?>							
								<label><input name = "submit" type = "submit" class = "btn yellow pull-right" value = "Create Salary"></label>
							</form>

                            
                            <table class="table table-striped table-hover ">
                                <?php 

                                    echo "
                                    <thead>
                                    <tr>
                                    <th>&nbsp</th>
                                    <th colspan=5>Income</th>
                                    <th colspan=2>Deduction</th>
                                    <th colspan=5>&nbsp</th>
                                    </tr>
                                    </thead>
                                    <thead>
                                    <tr>
                                    <th>Date Created</th>
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
                                    <th>Modify</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    ";

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
                                        <td>$salPaid[$sPS]</td>
                                        <td><a href='salaryModifyAdmin.php?id=".$row['salID']."' class='btn btn-warning'>GO</a></td>
                                        ";
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