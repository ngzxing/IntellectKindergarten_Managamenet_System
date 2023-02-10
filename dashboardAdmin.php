<?php

include "sessionAdmin.php";
include "sessionStaff.php";
include "dbconnect.php";

$tIC = $_SESSION['tIC'];

$pos = array("Teacher", "Admin");

?>

	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">My Playschool</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>My Playschool</li>
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
                                    <th>Position</th>
                                    <th>Basic Salary</th>
                                    </tr>
                                </thead>
                                <tbody>
                            
                            <?php
                                $query = "SELECT * FROM Teacher";
                                $result = mysqli_query($con, $query);
                                $count = 1;                                
                                while( $row = mysqli_fetch_array($result)){

                                    $position = $row["tPosition"];
                                    
                                    echo "

                                    <tr>
                                    <td>$count</td>
                                    <td><a href = '#'>$row[tName]</a></td>
                                    <td>$row[tIC]</td>
                                    <td>$row[tPhone]</td>
                                    <td>$pos[$position]</td>
                                    <td>$row[tBasicSalpHour]</td>
                                    </tr>
                                
                                    ";

                                    $count+=1;
    
                                }
                                
                                
                            ?>
                                
                                </tbody>
                            </table>

						</div>
					</div>
				</div>
			</div>

            <div class="row">
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Student List</h4>
						</div>

                            <form id ='filter' method = 'GET' action = 'dashboardAdmin.php'>
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
                                    <th>Parent</th>
                                    <th>Contact No.</th>
                                    <th>Session</th>
                                    <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                            
                            <?php
                                $query = "SELECT * FROM Student s LEFT JOIN Parent p ON s.pIC = p.pIC
                                WHERE s.clsName = '$_GET[clsName]' AND s.stdRegStatus = 2";
                                $result = mysqli_query($con, $query);
                                $count = 1;
                                while( $row = mysqli_fetch_array($result)){

                                    $parentIC = $row['pIC'];
                                    $sql = "SELECT * FROM parent p LEFT JOIN pphone pn ON p.pIC = pn.pIC
                                    WHERE p.pIC = '$parentIC'";
                                    $resultsql = mysqli_query($con, $sql);
                                    $rowsql = mysqli_fetch_array($resultsql);
                                    
                                    echo "

                                    <tr>
                                    <td>$count</td>
                                    <td><a href = '#'>$row[stdName]</a></td>
                                    <td>$row[stdMKN]</td>
                                    <td>$row[pName]</td>
                                    <td>$rowsql[phone]</td>
                                    <td>$row[stdSession]<td>
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