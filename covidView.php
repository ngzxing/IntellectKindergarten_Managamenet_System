<?php

include "sessionStaff.php";
// include "dbconnect.php";

$clsName = $_POST['clsName'];
$csStart = $_POST['csStart'];
$csEnd = $_POST['csEnd'];


$query = "SELECT * FROM student 
            LEFT OUTER JOIN stdcovid ON student.stdMKN = stdcovid.stdMKN
            WHERE clsName = '$clsName' AND (csDate BETWEEN '$csStart' AND '$csEnd')";
$result = mysqli_query($con, $query);
$count = mysqli_num_rows($result);


?>


<html>
<main class="ttr-wrapper">
<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Student Covid Status</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Student Covid Status</li>
				</ul>
			</div>	
			<div class="row">
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
                            <?php 
							echo "<h4>$clsName &nbsp ($csStart - $csEnd)</h4>";
                            ?>
						</div>

                        <div class="widget-inner">
                            <table class="table table-striped table-hover ">
                                <?php
                                    $count = 1;
                                    echo "
                                    <thead>
                                    <tr>
                                    <th>#</th>
                                    <th>MyKid No</th>
                                    <th>Student</th>
                                    <th>Temperature</th>
                                    <th>Covid Status</th>
                                    <th>RTK Result</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    ";

                                    while( $row = mysqli_fetch_array($result)){
                                        echo "
                                        <tr>
                                        <td>$count</td>
                                        <td>$row[stdMKN]</td>
                                        <td>$row[stdName]</td>
                                        <td>$row[csTemperature]</td>
                                        <td>$row[csStatus]</td>
                                        <td><a href='$row[csPhoto]' target='_blank'>$row[csPhoto]</a></td>
                                        </tr>
                                        ";
                                        $count++;
                                    }

                                    echo "
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