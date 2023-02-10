<?php

include "sessionAssest.php";
include "sessionStaff.php";
include "dbconnect.php";

error_reporting(E_ERROR | E_PARSE);

?>

<script>    

        function submitAss(){

            
            $("#modal-assIndexStd-submit").modal("show");
            


        }

        function submitForm(){
            
            document.getElementById("submit-asset").submit();
        }

</script>

<div class="modal" id = "modal-assIndexStd-submit">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you confirm to submit this assestment?</p>
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
				<h4 class="breadcrumb-title">Assessment Index</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Assessment Index</li>
				</ul>
			</div>	
			<div class="row">
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Assessment Index</h4>
						</div>

						<div class="widget-inner">

                        <?php

                        if(isset($_POST["success"])){

                        echo "

                        <div class='alert alert-dismissible alert-success'>
                            <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                            <strong>Well done!</strong> You have successfully submit this assestment.</a>
                        </div>

                        ";
                        }
                        ?>

                            <?php echo "<h5 class = 'mb-5'>Student Name: $_POST[stdName]</h5>" ?>
                            <table class="table table-striped table-hover ">
                                <thead>
                                    <tr>
                                    <th>Assessment Index</th>
                                    <th>Comment</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <form method = 'POST' action = 'assestIndexProcess.php' class = 'form-group' id = 'submit-asset'>
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
                                    <input type = 'hidden' value = '$_POST[stdMKN]' name = 'stdMKN'>
                                    <input type = 'hidden' value = '$_POST[stdName]' name = 'stdName'>
                                
                                "
                                ?>    

                                <tr><td></td><td><button type = 'button' class = 'btn green pull-left' onclick = 'submitAss()'>Submit</button><td></tr>
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