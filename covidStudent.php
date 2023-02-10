<?php

include "leftSideBarParent.php";

$pIC = $_SESSION["pIC"];

$datemin = date('Y-m-d', strtotime(date("Y-m-d"). ' - 1 days'));
$datemax = date("Y-m-d");


?>

    <script>    

        function submitCovidStd(){

            $("#modal-covidStd-submit").modal("show");
            
        }

        function submitForm(){

            document.getElementById("submitCovidStd-form").submit();
        }

    </script>

<div class="modal" id = "modal-covidStd-submit">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you confirm to submit this covid status?</p>
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
				<h4 class="breadcrumb-title">Covid Status</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Covid Status</li>
				</ul>
			</div>	

            <div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Covid Status</h4>
						</div>
                        

                        <form class="edit-profile m-b30" name="covidForm" method="post" action="covidStudentProcess.php" enctype="multipart/form-data" onsubmit="successSubmit()" id = "submitCovidStd-form">
                        <div class="form-group row">
						<label class="col-sm-2 col-form-label">Select your kid/s</label>
						<div class="col-sm-8">
                                <select name = "stdMKN" class="form-control" id="select">
                                <?php

                                $query = "SELECT * FROM Student WHERE pIC = $pIC AND stdRegStatus = 2";
                                $result = mysqli_query($con, $query);

                                while( $row = mysqli_fetch_array($result) ){

                                    echo "<option value = $row[stdMKN]> $row[stdName] </option>";
                                }
                            
                                ?>                        
                                </select>
                        </div>
						</div>
 
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Date Of Covid Testing</label>
                            <div class="col-sm-8">
                            <input name="csDate" value="" type="date" class = "form-control" min=<?php echo $datemin; ?> max=<?php echo $datemax; ?> required>
                            </div>
                        </div>

                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Temperature</label>
                        <div class="col-sm-8">
                        <input name="csTemperature" type="number"  class = "form-control" min=35 max=42 step=0.1 required>
                        </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Covid Status</label>
                            <span class="col-sm-8 form-check">
                            &nbsp &nbsp 
                                <label class="form-check-label" for="attExpect">
                                <input class="form-check-input" type="radio" name="csStatus" value=0 checked>NO</label>
                            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                                <label class="form-check-label" for="attExpect">
                                <input class="form-check-input" type="radio" name="csStatus" value=1>YES</label>
                            </span>
                        </div>
                        
                        <br>
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label">RTK Result</label>
                        <div class="col-sm-8">
                        <input name="csPhoto" value="" type="file" class = 'form-control' required>
                        </div>
                        </div>

                        <div class="">
                        <div class="">
                        <div class="row">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-7">
                          <button type="button" class="btn green" onclick = "submitCovidStd()">Submit</button>
                          <button type="reset" class="btn-secondry">Cancel</button>
                        </div>
                        </div>
                        </div>
                        </div>
                        
                        </form>
                          
                    </div>
                </div>
            </div>
            </div>
        </main>
        <div class="ttr-overlay"></div>

<script>
	function successSubmit(){
		alert('Successfully submit');
	}
</script>

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


  