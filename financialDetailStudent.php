<?php

include "leftSideBarParent.php";
// include "sessionParent.php";
// include "dbconnect.php";

$stdMKN = $_POST["stdMKN"];
$fID = $_POST["fID"];
$payStatus = array("Unpaid", "Paid", "Processing");

?>

    <script>    

        function financialDetailSubmit(){

            $("#modal-financialDetailStudent-submit").modal("show");
            
        }

        function submitForm(){

            document.getElementById("financialDetailStudent-form").submit();
        }

    </script>

<div class="modal" id = "modal-financialDetailStudent-submit">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you confirm to submit this financial details?</p>
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
				<h4 class="breadcrumb-title">Financial Details</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Financial Status</li>
                    <li>Financial Details</li>
				</ul>
			</div>	

            <div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Financial Details</h4>
						</div>
                        <div class="widget-inner">

                        <?php
                        $sql = "SELECT * FROM Student s JOIN fee f ON s.stdMKN = f.stdMKN 
                        WHERE s.stdMKN = '$stdMKN' AND f.fID = '$fID'";
                        $resultsql = mysqli_query($con, $sql);
                        $rowsql = mysqli_fetch_array($resultsql);
                        $stdName = $rowsql['stdName'];
                        $fDate = $rowsql['fDate'];

                        echo "
                        <p>Student name: <b>$stdName</b></p>
                        <p>Student My Kid No.: <b>$stdMKN</b></p>
                        <p>Date: <b>$fDate</b></p>
                        ";

                        ?>

                        <table class="table table-striped table-hover ">
                        <thead>
                        <tr>
                        <th>No</th>
                        <th>Item</th>
                        <th>Note</th>
                        <th>Fee</th>
                        </tr>
                        <thead>
                        
                        <tbody>

                        <?php

                        $query = "SELECT * FROM fee f LEFT JOIN feesitem fi ON f.fID = fi.fID
                                LEFT JOIN programsyllabus p ON fi.prgsID = p.prgsID WHERE 
                                f.fID='$fID'";
                        $result = mysqli_query($con, $query);
                        $count = 1;
                        $countresult =  mysqli_num_rows($result);
                        // echo $countresult;
                        // $row = mysqli_fetch_array($result);
                        // echo '<pre>'; print_r($row); echo '</pre>';

                        while($row = mysqli_fetch_array($result)){

                            $fTot = $row['fTot'];
                            $payDate = $row['payDate'];
                            $payS = $row['payStatus'];

                            echo "
                            <tr>
                            <td>$count</td>
                            <td>$row[prgsItem]</td>
                            <td>$row[prgsDesc]</td>
                            <td>$row[prgsFee]</td>
                            </tr>
                            ";

                            $count++;
                        }


                        ?>
                        

                        <tr>
                        <td colspan = 3>Total Fee</td>
                        <td><?php echo $fTot; ?></td>
                        </tr>

                        <tr>
                        <td colspan = 3>Paid Status</td>
                        <td>
                            <?php 
                            echo "
                            $payStatus[$payS]
                            ";
                            ?>
                        </td>
                        </tr>
                        </tbody>
                        </table>


                        <?php
                        if($payDate == NULL){
                        
                        echo '
                        <hr>
                        <form class="edit-profile m-b30" name="payform" method="post" action="financialDetailProcess.php" enctype="multipart/form-data" id = "financialDetailStudent-form">
                        <h5>Upload Payment Receipt</h5>                            
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label"><b>Payment Receipt</b></label>
                        <div class="col-sm-8">
                        <input name="fPhoto" value="" type="file" required>
                        </div>
                        </div>

                        <input type = "hidden" name = "fID" value = '.$fID.'>
                        <input type = "hidden" name = "stdMKN" value = '.$stdMKN.'>

                        <div class="">
                        <div class="">
                        <div class="row">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-7">
                          <button type="button" class="btn green" onclick = "financialDetailSubmit()">Submit</button>
                          <button type="reset" class="btn-secondry">Cancel</button>
                        </div>
                        </div>
                        </div>
                        </div>
                        
                        </form>

                        ';
                        }
                        ?>



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