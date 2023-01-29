<?php

include "sessionAssest.php";
include "sessionStaff.php";
include "dbconnect.php";

?>

	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Assest Subject</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Assest Subject</li>
				</ul>
			</div>	
			<div class="row">
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Assest Subject</h4>
						</div>

						<div class="widget-inner">
                            <?php echo "<h3 class = 'mb-5'>$_POST[stdName]</h3>" ?>
                            <table class="table table-striped table-hover ">
                                <thead>
                                    <tr>
                                    <th>Assestment Index</th>
                                    <th>Comment</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <form method = 'POST' action = 'assestIndexProcess.php' class = 'form-group'>
                                <?php
                                
                                $query = "SELECT * FROM indexPerformance JOIN performBased ON pIName = iperID WHERE ptName = '$_SESSION[ptName]' ";
                                $result = mysqli_query($con, $query);

                                $query2 = "SELECT * FROM performance WHERE stdMKN = '$_POST[stdMKN]' AND spPeriod = '$_SESSION[period]' AND spYear = '$_SESSION[year]'";
                                $result2 = mysqli_query($con, $query2);
                                $performanceID = mysqli_fetch_array($result2)["performanceID"];

                                $iPerIDList = array();

                                while($row = mysqli_fetch_array($result)){
                                    $query3 = "SELECT * FROM performComment WHERE performanceID = '$performanceID' AND iPerID = '$row[pbID]' ";
                                    $pcComment = mysqli_fetch_array(mysqli_query($con, $query3))['pcComment'];

                                    echo "

                                    <tr>
                                    <td class = 'text-center'>$row[iName]</td>
                                    <td>
                                        <input type = 'text' value = '$pcComment'  name = '$row[pbID]' class = 'form-control'>
                                    </td>
                                    </tr>
                                    
                                    ";

                                    array_push($iPerIDList, $row['pbID']);
                                }

                                $iPerIDList = htmlentities(serialize($iPerIDList));

                                echo "

                                    <input type = 'hidden' value = '$performanceID' name = 'performanceID'>
                                    <input type = 'hidden' value = '$iPerIDList' name = 'iPerID'>
                                
                                "
                                ?>    

                                <tr><td><input type = 'submit' class = 'btn green pull-right' value = 'Submit'><td></tr>
                                </form>
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