<?php

include "sessionStaff.php";

$currentDate = date('Y-m-d');
?>

<style>
input[type="date"] { 
  padding: 5px;
}
</style>

<!--Main container start -->
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
							<h4>Student Covid Status</h4>
						</div>
						<div class="widget-inner">

                            <div class="col-xs-12 col-sm-12 register-form form clearfix pt-5">
                                
                                <form name="viewStudentCovid" method="post" action = "covidView.php">

                                    <label> Class
                                    <select name = 'clsName' id='select'>  
                                       
                            		<?php           
                                       $query = "SELECT clsName FROM class";
                                       $result = mysqli_query($con, $query);
   
                                        while( $row = mysqli_fetch_array($result) ){

   
                                               echo "<option value = '$row[clsName]'> $row[clsName] </option>";
                                       }
                           
                            		?>
                                    </select></label>
                                    
                                    <label>Date Start<br><input class = "col-sm-12 form-control" name="csStart" value="" type="date" max=<?php echo "$currentDate"; ?> required></label>
									<label>Date End<br><input class = "col-sm-12 form-control" name="csEnd" value="" type="date" max=<?php echo "$currentDate"; ?> required></label>

                                    <input name="submit" class="mt-4 btn green pull-right" value="Submit" type="submit">
                                </form>

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