<?php

include "sessionStaff.php";
include "dbconnect.php"
?>

<script>    

        function submitAss(){

            $("#modal-assSelect-submit").modal("show");
            
        }

        function submitForm(){

            document.getElementById("filter").submit();
        }

</script>



<div class="modal" id = "modal-assSelect-submit">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you confirm to submit this assestment selection?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick = "submitForm()">Confirm</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Assessment Selection</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Assessment Selection</li>
				</ul>
			</div>	
			<div class="row">
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Assessment Selection</h4>
						</div>
						<div class="widget-inner">

						<script>

                            function changeFunc(){

                                document.getElementById('filter').submit();
                            }

							
                        </script>

					<div class="col-xs-12 col-sm-12 register-form form clearfix pt-5">


						<?php
                  
                    
                    echo "

                    <form method = 'POST' action = 'assestSelectProcess.php' id = 'filter'>

                    <label>Assessment Type: <select class = 'form-control student-settings' name = 'ptName' class='form-control' id='select'>";

					$query = "SELECT ptName FROM prgPerform JOIN class ON prgPerform.prgName = class.prgName WHERE class.clsName = '$_GET[clsName]' ";
					$result = mysqli_query($con, $query);

					 while( $row = mysqli_fetch_array($result) ){

							echo "<option value = '$row[ptName]'> $row[ptName] </option>";
					}
			
                    
                    echo " </select></label>" ;

                    $queryGetPeriod = "SELECT DISTINCT spPeriod FROM Performance";
                    $resultGetPeriod = mysqli_query($con, $queryGetPeriod);
                    
                    echo"<label>Period<select name = 'period' class='form-control' id='select' >";

                    while($rowGetPeriod = mysqli_fetch_array($resultGetPeriod)){

                        echo "<option value = '$rowGetPeriod[spPeriod]' >$rowGetPeriod[spPeriod]</option>";
                    }
                    
                    echo " </select></label>" ;

                   
                    $queryGetYear = "SELECT DISTINCT spYear FROM Performance";
                    $resultGetYear = mysqli_query($con, $queryGetYear);

                    echo"<label>Year<select name = 'year' class='form-control' id='select' >";

                    while($rowGetYear = mysqli_fetch_array($resultGetYear)){

                        echo "<option value = '$rowGetYear[spYear]' >$rowGetYear[spYear]</option>";
                    }

                    echo " </select></label>
					
					<input name = 'clsName' value = '$_GET[clsName]' type = 'hidden'>
					<label><button type='button' class='mt-4 btn-secondry right' onclick = 'submitAss()'>Submit</button></label>
					
					</form>";
					
					mysqli_close($con);
					?>
					
                        
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