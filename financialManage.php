<?php

include "sessionAdmin.php";
include "sessionStaff.php";
include "dbconnect.php";

$currentDate = date('Y-m-d');

// $query = "SELECT * FROM Student s LEFT OUTER JOIN fee f ON s.stdMKN = f.stdMKN 
//         WHERE stdRegStatus = 2";
$query = "SELECT * FROM Student s WHERE stdRegStatus = 2";
$result = mysqli_query($con, $query);
$count = mysqli_num_rows($result);


?>

<html>
<main class="ttr-wrapper">
<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Student Financial</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Student Financial</li>
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
  

                        <form id ='filter' method = 'GET' action = 'financialManageProcess.php' onsubmit="return checkvalid();">
                            <div class = 'row'>
                            <label>Apply Financial</label>
                                <div class = 'col-lg-6'>
                                <input name="fDate" value=<?php echo $currentDate; ?> type="date" class = "form-control" id = 'fDate' required>
                                </div>
                                <div class = "col-lg-3 px-2">
                                <input type = 'submit' class = "btn yellow" value = "Apply">
                                </div>
                            </div>
                        </form>

                        <table class="table table-striped table-hover ">
                        <thead>
                        <tr>
                        <th>Year</th>
                        <th>Month</th>
                        <th>Student Financial</th>
                        </tr>
                        <thead>
                        <hr>
                        <?php
                        
                        $query2 = "SELECT * FROM fee ORDER BY fDate DESC";
                        $result2 = mysqli_query($con, $query2);
                        $count = mysqli_num_rows($result2);
                        
                        while($row = mysqli_fetch_array($result2)){
                            $fDate = $row['fDate'];
                            $month = date("m",strtotime($fDate));
                            $year = date("Y",strtotime($fDate));
                            
                            if(isset($monthset) && isset($yearset)){
                                if($monthset != $month || $yearset != $year){
                                    echo"
                                    <tr>
                                    <td>$year</td>
                                    <td>$month</td>
                                    <td>
                                    <form method = 'post' action = 'financialView.php'>
                                    <input type = 'hidden' name = 'month' value = '$month' >
                                    <input type = 'hidden' name = 'year' value = '$year' >
                                    <input type = 'submit' class = 'btn red pull-left' value = 'View'></td>
                                    </from>
                                    </td>
                                    </tr>
                                    ";
                                    $monthset = $month;
                                    $yearset = $year;
                                }
                            }else{
                                echo"
                                <tr>
                                <td>$year</td>
                                <td>$month</td>
                                <td>
                                <form method = 'post' action = 'financialView.php'>
                                <input type = 'hidden' name = 'month' value = '$month' >
                                <input type = 'hidden' name = 'year' value = '$year' >
                                <input type = 'submit' class = 'btn red pull-left' value = 'View'></td>
                                </from>
                                </td>
                                </tr>
                                ";
                                $monthset = $month;
                                $yearset = $year;
                            }

                            
                        }
                        
                        ?>
                        </table>





                        </div>
                    </div>
                </div>
            </div>
        </main>


<?php

$queryMax = 'SELECT max(fDate) as fDate FROM Fee';
$Date = mysqli_fetch_array(mysqli_query($con, $queryMax))['fDate'];
$month = date("m",strtotime($Date));
$year = date("Y",strtotime($Date));

echo "

<script>

function checkvalid(){

    let iYear = document.getElementById('fDate').value.slice(0,4);
    let iMonth = document.getElementById('fDate').value.slice(5,7);

    if( (iYear <= $year) && (iMonth <= $month) ){
        alert('This month and year fee was already created!');
        return false;
    }else{

        return true;
    }

}
</script>

";


?>



    

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