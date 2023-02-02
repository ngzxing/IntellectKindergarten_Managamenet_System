<?php

include "sessionAdmin.php";
include "sessionStaff.php";
include "dbconnect.php";

$tIC = $_SESSION['$tIC'];

?>

	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Teacher List</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Teacher List</li>
				</ul>
			</div>	
			<div class="row">
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Teacher List</h4>
						</div>

                    
						<div class="widget-inner">
                            <form method = "post" action = "registerTeacher.php">
                                <?php 
                                echo "<input name = 'nextPage' value = 'myTeac.php' type = 'hidden'>"; 
                                ?>							
                                <label><input name = "submit" type = "submit" class = "btn yellow pull-right" value = "Add Teacher"></label>
                            </form>

                            <table class="table table-striped table-hover ">
                                <thead>
                                    <tr>
                                    <th>#</th>
                                    <th>Teacher</th>
                                    <th>IC Number</th>
                                    <th>Phone no.</th>
                                    <th>Basic Salary</th>
                                    <th>Position</th>
                                    <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                            
                            <?php
                                $query = "SELECT * FROM Teacher WHERE tIC != '$tIC'";
                                $result = mysqli_query($con, $query);
                                $count = 1;                                
                                while( $row = mysqli_fetch_array($result)){
                                    
                                    echo "

                                    <tr>
                                    <td>$count</td>
                                    <td><a href = '#'>$row[tName]</a></td>
                                    <td><a href = '#'>$row[tIC]</a></td>
                                    <td><a href = '#'>$row[tPhone]</a></td>
                                    <td>
                                    <form method = 'post' action = 'salaryViewAdmin.php'>
                                    <input name = 'tIC1' value = $row[tIC] type = 'hidden'>
                                    <label><input name = 'submit' type = 'submit' value = '$row[tBasicSalpHour]'></label>
                                    </form>
                                    </td>
                                    <td><a href = '#'>$row[tPosition]<td>
                                    </tr>
                                
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