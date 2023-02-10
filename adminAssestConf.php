<?php

include "sessionAdmin.php";
include "sessionStaff.php";
include "dbconnect.php"
?>

	<script>

		function changePeriod(id){

			let data = document.getElementsByClassName(id);

			document.getElementById('idate').value = data[0];
			document.getElementById('iperiod').value = data[1];
			document.getElementById('iyear').value = data[2];
			document.getElementById('ioperation').value = "Edit";

			document.getElementById('changePeriod').innerHTML = "<input name = 'newPeriod' type='text' class = 'form-control' autofocus onkeyup = 'enter()'>";
		}

		function enter(){
			
			if(key == 'Enter'){
				document.getElementById("formEdit").submit();
			}
		}

	</script>

<form method = 'post' action = 'adminAssestProcess.php' id = 'formEdit'>
	<input name = 'date' type = 'hidden' id = 'idate'>
	<input name = 'period'  type = 'hidden' id = 'iperiod'>
	<input name = 'year'  type = 'hidden' id = 'iyear'>
	<input name = 'operation'  type = 'hidden' id = 'ioperation'>
</form>

		
	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Assessment Configuration</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Assessment Configuration</li>
				</ul>
			</div>	
			<div class="row">
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Assessment Configuration</h4>
						</div>
						<div class="widget-inner">

                            <div class="col-xs-12 col-sm-12 register-form form clearfix pt-5">
                                
                                <form name="registerForm" id="parent-settings" class="student-settings" method="post" action = "adminAssestProcess.php" >

                                    <label>Date <input name="date" value="" type="date" required class = "form-control"></label>
                                    <label>Period <input name="period" value="" type="text" required class = "form-control"></label>
                                    <label>Year <input name="year" value="" type="text" required class = "form-control"></label>

                                    <input name="operation" class="pt-2 btn yellow" value="Create" type="submit">
                                </form>

                            </div> 

						</div>
					</div>
				</div>

				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Assessment History</h4>
						</div>
						<div class="widget-inner">

                            <div class="col-xs-12 col-sm-12 register-form form clearfix pt-5">

								<table class="table table-striped table-hover ">
                                	<thead>
										<tr>
										<th style = 'width:5%'>#</th>
										<th style = 'width:25%'>Date</th>
										<th style = 'width:25%'>Period</th>
										<th style = 'width:25%'>Year</th>
										<th></th>
										</tr>
                                	</thead>
                                	<tbody>

							<?php
									
								$query = "SELECT DISTINCT spPeriod, spYear, spDate FROM  Performance ORDER BY performanceID DESC;";
								$result = mysqli_query( $con, $query);
								$count = 1;

								while( $row = mysqli_fetch_array($result) ){
				
								echo"
									

									<tr>
									<td>$count</td>
									<td id = 'changeDate'><p ondblclick = 'changeDate($count);' class = '$count'>$row[spDate]</p></td>
									<td id = 'changePeriod'><p ondblclick = 'changePeriod($count);' class = '$count'>$row[spPeriod]</p></td>
									<td id = 'changeYear'><p ondblclick = 'changeYear($count);' class = '$count'>$row[spYear]</p></td>
									<td>
										<form method = 'post' action = 'adminAssestProcess.php' >
											<input type = 'hidden' name = 'date' value = '$row[spDate]' >
											<input type = 'hidden' name = 'period' value = '$row[spPeriod]'>
											<input type = 'hidden' name = 'year' value = '$row[spYear]'>
											<input type = 'submit' class = 'btn form-control red' value = 'Delete' name = 'operation'>
										</form>
									</td>
									</tr>
								
								";

								$count += 1;
								}
									
									
							?>
											
										
									</tbody>

                            </div> 

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