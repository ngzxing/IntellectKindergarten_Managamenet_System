<?php

include "sessionStaff.php";
include "dbconnect.php";

error_reporting(E_ERROR | E_PARSE);
?>


	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Student List</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Student List</li>
				</ul>
			</div>	
			<div class="row">
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Student List</h4>
						</div>

                            <form id ='filter' method = 'GET' action = 'myStd.php'>
                            <div class = 'row'>
                                <div class = 'col-lg-6 px-5 pt-5'>
                                <select name = 'clsName' class = 'form-control' id='select'>";
                        
                <?php

                $query = "SELECT DISTINCT clsName as clsName FROM subjectsTeac WHERE tIC = $_SESSION[tIC]";
                $result = mysqli_query($con, $query);
                $count = 0;

                while($row = mysqli_fetch_array($result)){
                    
                    if( !isset( $_GET["clsName"] ) ){

                        $_GET["clsName"] = $row["clsName"];
                    }

                    if($row['clsName'] != $_GET["clsName"]){

                        if($count == 0){

                            echo "<option value = '$_GET[clsName]'> $_GET[clsName] </option>";
                        }

                        echo "<option value = '$row[clsName]'> $row[clsName] </option>";
                    }
                    elseif($count == 0){

                        echo "<option value = '$_GET[clsName]'> $_GET[clsName] </option>";
                    }

                    $count += 1;
                }   
                ?>
                                </select>
                                </div>
                                <div class = "col-lg-3 px-2 pt-5">
                                <input type = 'submit' class = "btn yellow" value = "Apply">
                                </div>
                            </div>
                            </form>


						<div class="widget-inner">                    
                            <table class="table table-striped table-hover ">
                                <thead>
                                    <tr>
                                    <th>#</th>
                                    <th>Student</th>
                                    <th>My Kid Number</th>
                                    <th>Session</th>
                                    <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                            
                            <?php
                                $query = "SELECT * FROM Student WHERE Student.clsName = '$_GET[clsName]' AND Student.stdRegStatus = 2";
                                $result = mysqli_query($con, $query);
                                $count = 1;
                                while( $row = mysqli_fetch_array($result)){
                                    
                                    echo "

                                    <tr>
                                    <td>$count</td>
                                    <td><a href = '#'>$row[stdName]</a></td>
                                    <td><a href = '#'>$row[stdMKN]</a></td>
                                    <td><a href = '#'>$row[stdSession]<td>
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