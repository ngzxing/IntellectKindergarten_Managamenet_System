<?php

include "leftSideBarParent.php";
// include "sessionParent.php";
// include "dbconnect.php";

$pIC = $_SESSION["pIC"];

$payStatus = array("Unpaid", "Paid", "Processing");

?>

	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Financial Status</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Financial Status</li>
				</ul>
			</div>	

            <div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Financial Status</h4>
						</div>
                        <div class="widget-inner">

                        <script>
                            function changeFunc(){
                                document.getElementById('filter').submit();
                            }
                        </script>
                        
                        <?php

                        error_reporting(E_ERROR | E_PARSE);
                        $queryGetStd = "SELECT * FROM Student WHERE pIC = '$pIC' ";
                        $resultGetStd = mysqli_query($con, $queryGetStd);

                        echo "
                        <form class='edit-profile m-b30' name='financialForm' method='post' action='financialStudent.php' id='filter'>
                        <div class='form-group row'> 
								<label class='col-sm-2 col-form-label'>Select your kid/s</label>
								<div class='col-sm-8'>
                                <select name='stdMKN' class='form-control' id='select' onchange='changeFunc();'>
                        ";


                        while($rowGetStd = mysqli_fetch_array($resultGetStd)){
       
                            if(!isset($_POST["stdMKN"])){
    
                                $_POST["stdMKN"] = $rowGetStd["stdMKN"];
                            }
    
                            if($_POST["stdMKN" ] == $rowGetStd["stdMKN"]){
                                echo "<option value = '$rowGetStd[stdMKN]' selected>$rowGetStd[stdName]</option>";
                            }
                            else{
    
                                echo "<option value = '$rowGetStd[stdMKN]'>$rowGetStd[stdName]</option>";
                            }
                        }
                        
                        echo " 
                        </select></div>   
						</div>
                        </form>
                        ";

                        ?>

                        <table class="table table-striped table-hover ">
                        <thead>
                        <tr>
                        <th>Year</th>
                        <th>Month</th>
                        <th>Date</th>
                        <th>Total Fee</th>
                        <th>Paid Status</th>
                        <th>Detail/Upload Receipt</th>
                        </tr>
                        <thead>
                        
                        <tbody>
                        

                        <?php

                        $stdMKN = $_POST['stdMKN'];
                        $query1 = "SELECT * FROM fee WHERE stdMKN='$stdMKN' ORDER BY fDate DESC";
                        $result1 = mysqli_query($con, $query1);

                        while($row1 = mysqli_fetch_array($result1)){

                            $fDate = $row1['fDate'];
                            $month = date("m",strtotime($fDate));
                            $year = date("Y",strtotime($fDate));
                            $payS = $row1['payStatus'];
                        
                            echo "
                            <tr>
                            <td>$month</td>
                            <td>$year</td>
                            <td>$fDate</td>
                            <td>$row1[fTot]</td>
                            <td>$payStatus[$payS]</td>
                            <td>
                                <form method = 'post' action = 'financialDetailStudent.php'>
                                <input type = 'hidden' name = 'fID' value = '$row1[fID]'>
                                <input type = 'hidden' name = 'stdMKN' value = '$stdMKN' >
                                <input type = 'submit' class = 'btn red pull-left' value = 'GO'></td>
                                </form>
                            </td>
                            </tr>
                            ";
                        
                        }

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


