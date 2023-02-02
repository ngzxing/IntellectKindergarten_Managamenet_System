<?php

include "sessionAdmin.php";
include "sessionStaff.php";
include "dbconnect.php";

$fID = $_POST["fID"];

?>

    <script>    

        function financialUpdateSubmit(){

            $("#modal-financialUpdate-submit").modal("show");
            
        }

        function submitForm(){

            document.getElementById("financialUpdate-form").submit();
        }

    </script>

<div class="modal" id = "modal-financialUpdate-submit">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you confirm to submit this fee description?</p>
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
				<h4 class="breadcrumb-title">Update Financial</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Student Financial</li>
                    <li>Student Financial List</li>
                    <li>Update Financial</li>
				</ul>
			</div>	

            <div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Update Financial</h4>
						</div>
                        <div class = "widget-inner">

                        <form method = "post" action = "financialUpdate.php" onsubmit="updateFeeDesc();" id = "financialUpdate-form">

                        <?php
                        $sql = "SELECT * FROM fee WHERE fID='$fID'";
                        $resultsql = mysqli_query($con, $sql);
                        $rowsql = mysqli_fetch_array($resultsql);

                        ?>
                        <div class = "row">
                        <label>Fee Description</label>
                        <div class = "col-8">

                        <input type = 'text' name = 'fDesc' class="form-control" value = <?php echo $rowsql['fDesc'];?> >
                        </div>
                        <input type = 'hidden' name = 'fID' value = '<?php echo $fID?>' >
                        <div class = 'col-2'><button type = "button" class = "btn red " onclick = "financialUpdateSubmit()">Submit</button></div>
                        </div>
                        </form>

                        <br>
                        <form method = "post" action = "financialUpdateAdd.php">
                        <div class = "row">
                        <label>Add Item</label>
                            <div class = "col-8">
                            <select name="prgsID" class="form-control" id="select">

                        <?php

                                $query1 = "SELECT p.* FROM ProgramSyllabus as p LEFT JOIN feesItem as f ON p.prgsID = f.prgsID AND fID = '$fID' WHERE f.prgsID is NULL ";
                                $result1 = mysqli_query($con, $query1);
                                
                                while($row1 = mysqli_fetch_array($result1)){

                                    // echo '<option value = ';
                                    // echo $row1['prgsID'];
                                    // echo '>';
                                    // echo $row1['prgsItem'].'  (RM'.$row1['prgsFee'].')';
                                    // echo ' </option>';

                                    echo "
                                    <option value= '$row1[prgsID]'>$row1[prgsItem]  (RM $row1[prgsFee])</option>
                                    ";
                                    
                                }  
                                

                        ?>
                        </select>
                            </div>
                        <input type = 'hidden' name = 'fID' value = '<?php echo $fID?>' >
                        <div class = 'col-2'><input type = "submit" class = "btn red " value = "ADD"></div>
                            </div>
                        
                        </form>
                 
                        <hr>
                        </div>

                    <div class = "widget-inner">
                        <table>
                        <thead>
                        <h4>Item Bag</h4>
                        <tr>
                        <th>#</th>
                        <th>Item</th>
                        <th>Program Fee</th>
                        <th>Note</th>
                        <th>Drop</th>
                        </tr>
                        </thead>

                        <?php

                            $query2 = "SELECT p.* FROM ProgramSyllabus as p RIGHT JOIN feesItem as f ON p.prgsID = f.prgsID  WHERE f.fID = '$fID'";
                            $result2 = mysqli_query($con, $query2);

                            while($row2 = mysqli_fetch_array($result2)){
                                
                                    echo "
                                    <tr>
                                    <td>$row2[prgsID]</td>
                                    <td>$row2[prgsItem]</td>
                                    <td>$row2[prgsFee]</td>
                                    <td>$row2[prgsDesc]</td>
                                    <td>
                                    <form method = 'post' action = 'financialUpdateDrop.php'>
                                    <input type = 'hidden' name = 'prgsID' value = '$row2[prgsID]'>
                                    <input type = 'hidden' name = 'fID' value = '$fID'>
                                    <input type = 'submit' class = 'btn red pull-left' value = 'GO'>
                                    </form>
                                    </td>
                                    </tr>
                                    ";
                                }
                                
                            
                        ?>
                        </tbody>
                        </table>
                        <hr>
                        <?php
                        $sqlTot = "SELECT * FROM fee WHERE fID = '$fID'";
                        $resultTot = mysqli_query($con, $sqlTot);
                        $rowTot = mysqli_fetch_array($resultTot);
                        ?>
                        <p>Total Fee = <?php echo $rowTot['fTot']; ?></p>

                    </div>




                    </div>
                </div>
            </div>
            </div>
        </main>
        <div class="ttr-overlay"></div>

<script>

function updateFeeDesc(){

    <?php 
    $fDesc = $_POST['fDesc'];
    $fID = $_POST['fID'];

    $sql = "UPDATE fee SET fDesc = '$fDesc' WHERE fID='$fID'";
    mysqli_query($con, $sql);

    ?>
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