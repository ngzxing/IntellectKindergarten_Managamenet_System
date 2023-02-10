<?php

include "sessionAdmin.php";
include "sessionStaff.php";
include "dbconnect.php";

$feeDate = $_POST['fDate'];
$month = $_POST['month'];
$year = $_POST['year'];


$query = "SELECT * FROM Student s LEFT OUTER JOIN fee f ON s.stdMKN = f.stdMKN 
        WHERE stdRegStatus = 2 AND f.fDate = '$feeDate' ORDER BY s.prgName, s.clsName";
$result = mysqli_query($con, $query);
$count = mysqli_num_rows($result);

$payStatus = array("Unpaid", "Paid", "Processing");

?>

<script>    

        function approveFinn(id){
            
            $("#modal-finnView-approve".concat(id)).modal("show");
        }

        function rejectFinn(id){
            
            $("#modal-finnView-reject".concat(id)).modal("show");
        }

        function approveForm(id){
            
            document.getElementsByClassName("approve-finnView")[id].submit();
		}

        function rejectForm(id){
            
            document.getElementsByClassName("reject-finnView")[id].submit();
		}

</script>

<html>
<main class="ttr-wrapper">
<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Student Financial List</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Student Financial</li>
                    <li>Student Financial List</li>
				</ul>
			</div>	
			<div class="row">
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
                            <?php 
							echo "<h4>Student Financial</h4>";
                            ?>
						</div>
                        <div class="widget-inner">
                        <table class="table table-striped table-hover ">
                        <?php

                            echo "
                            <thead>
                            <tr>
                            <th>#</th>
                            <th>MyKid No</th>
                            <th>Student</th>
                            <th>Class</th>
                            <th>Program</th>
                            <th>Total Fee</th>
                            <th>Paid Status</th>
                            <th>Date Paid</th>
                            <th colspan = 2>Action</th>
                            <th>Manage Fee</th>
                            </tr>
                            </thead>
                            <tbody>
                            ";

                            $count = 1;
                            $countStd = 0;
                            while( $row = mysqli_fetch_array($result)){

                                $fDate = $row['fDate'];
                                $monthselect = date("m",strtotime($fDate));
                                $yearselect = date("Y",strtotime($fDate));
                                $payS = $row['payStatus'];

                                if(($monthselect == $month) && ($yearselect == $year)){
                                    echo "
                                    <tr>
                                    <td>$count</td>
                                    <td>$row[stdMKN]</td>
                                    <td>$row[stdName]</td>
                                    <td>$row[clsName]</td>
                                    <td>$row[prgName]</td>
                                    <td>$row[fTot]</td>
                                    ";
                                    
                                    if($payS != 0){
                                        echo"
                                        <td><a href='$row[fPhoto]' target='_blank'>$payStatus[$payS]</a></td>
                                        <td>$row[payDate]</td>
                                        <td>
                                        <form method = 'post' action = 'financialApprove.php' class = 'approve-finnView'>
                                        <input type = 'hidden' name = 'fDate' value = '$fDate' >
                                        <input type = 'hidden' name = 'fID' value = '$row[fID]'>
                                        <input type = 'hidden' name = 'month' value = '$month' >
                                        <input type = 'hidden' name = 'year' value = '$year' >
                                        <button type = 'button' class = 'btn green pull-left' onclick = 'approveFinn($countStd)'>Approve</button></td>
                                        </form>
                                        </td>
                                        <td>
                                        <form method = 'post' action = 'financialReject.php' class = 'reject-finnView'>
                                        <input type = 'hidden' name = 'fDate' value = '$fDate' >
                                        <input type = 'hidden' name = 'fID' value = '$row[fID]'>
                                        <input type = 'hidden' name = 'month' value = '$month' >
                                        <input type = 'hidden' name = 'year' value = '$year' >
                                        <button type = 'button' class = 'btn red pull-left' onclick = 'rejectFinn($countStd)'>Reject</button></td>
                                        </form>
                                        </td>
                                        <td>
                                        <form method = 'post' action = 'financialUpdate.php'>
                                        <input type = 'hidden' name = 'fDate' value = '$fDate' >
                                        <input type = 'hidden' name = 'fID' value = '$row[fID]'>
                                        <input type = 'hidden' name = 'stdMKN' value = '$row[stdMKN]' >
                                        <input type = 'submit' class = 'btn yellow pull-left' value = 'Manage' disabled></td>
                                        </form>
                                        </td>
                                        ";

                                        echo "
                                    
                                    <div class='modal' id = 'modal-finnView-approve$countStd'>
                                    <div class='modal-dialog' role='document'>
                                        <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title'>Confirmation</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'>
                                            <span aria-hidden='true'></span>
                                            </button>
                                        </div>
                                        <div class='modal-body'>
                                            <p>Are you confirm to approve this payment?</p>
                                        </div>
                                        <div class='modal-footer'>
                                            <button type='button' class='btn btn-primary' onclick = 'approveForm($countStd)'>Confirm</button>
                                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>

                                    <div class='modal' id = 'modal-finnView-reject$countStd'>
                                    <div class='modal-dialog' role='document'>
                                        <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title'>Confirmation</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'>
                                            <span aria-hidden='true'></span>
                                            </button>
                                        </div>
                                        <div class='modal-body'>
                                            <p>Are you confirm to reject this payment?</p>
                                        </div>
                                        <div class='modal-footer'>
                                            <button type='button' class='btn btn-primary' onclick = 'rejectForm($countStd)'>Confirm</button>
                                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    
                                    ";

                                    $countStd+=1;

                                    }else{
                                        echo"
                                        <td>$payStatus[$payS]</td>
                                        <td>$row[payDate]</td>
                                        <td>
                                        <form method = 'post' action = 'financialApprove.php'>
                                        <input type = 'hidden' name = 'fDate' value = '$fDate' >
                                        <input type = 'hidden' name = 'fID' value = '$row[fID]'>
                                        <input type = 'hidden' name = 'stdMKN' value = '$row[stdMKN]' >
                                        <input type = 'submit' class = 'btn red pull-left' value = 'Approve' disabled></td>
                                        </form>
                                        </td>
                                        <td>
                                        <form method = 'post' action = 'financialReject.php'>
                                        <input type = 'hidden' name = 'fDate' value = '$fDate' >
                                        <input type = 'hidden' name = 'fID' value = '$row[fID]'>
                                        <input type = 'hidden' name = 'stdMKN' value = '$row[stdMKN]' >
                                        <input type = 'submit' class = 'btn red pull-left' value = 'Reject' disabled></td>
                                        </form>
                                        </td>
                                        <td>
                                        <form method = 'post' action = 'financialUpdate.php'>
                                        <input type = 'hidden' name = 'fDate' value = '$fDate' >
                                        <input type = 'hidden' name = 'fID' value = '$row[fID]'>
                                        <input type = 'hidden' name = 'stdMKN' value = '$row[stdMKN]' >
                                        <input type = 'submit' class = 'btn yellow pull-left' value = 'Manage'></td>
                                        </form>
                                        </td>
                                        ";
                                    }

                                    echo "
                                    
                                    </tr>
                                    ";

                                    $count+=1;
                                }

                                 
                            }

                        ?>
                        </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>

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