<?php

include "sessionStaff.php";
// include "dbconnect.php";



if(isset($_SESSION['clsName'])){
    $clsName = $_SESSION['clsName'];
    $attDate = $_SESSION['attDate'];
}else{
    $clsName = $_POST['clsName'];
    $attDate = $_POST['attDate'];
    $_SESSION['clsName'] = $clsName;
    $_SESSION['attDate'] = $attDate;
}

// echo "$attDate";
$currentDate = date('Y-m-d');


function attendanceExpect($attExpect){
    switch($attExpect){
        case 0: echo "<td style='color:Red;'>Absent</td>"; break;
        case 1: echo "<td style='color:Blue;'>Present</td>"; break;
        case 2: echo "<td style='color:Orange;'>Not Updated</td>"; break;
    }
}

function attendanceConfirm($attConfirm){
    switch($attConfirm){
        case 0: echo "<td style='color:Red;'>Absent</td>"; break;
        case 1: echo "<td style='color:Blue;'>Present</td>"; break;
    }
}


    $query1 = "SELECT * FROM student WHERE clsName = '$clsName'";
    $result1 = mysqli_query($con, $query1);
    $count1 = mysqli_num_rows($result1);

    while($row1 = mysqli_fetch_array($result1)){
        $stdMKN = $row1['stdMKN'];
        $query2 = "SELECT * FROM attendancestd WHERE stdMKN = '$stdMKN' AND attDate = '$attDate'";
        $result2 = mysqli_query($con, $query2);
        $count2 = mysqli_num_rows($result2);
        if($count2 == 0){
           $query3 = "INSERT INTO attendancestd (attDate, stdMKN, attExpect) 
                        VALUES('$attDate', '$stdMKN', 2) ";
           mysqli_query($con, $query3);
        }

    }

?>


<script>    

        function submitAtt(id){

            
            $("#modal-attView-submit".concat(id)).modal("show");
            


        }

        function submitForm(id){
            
            document.getElementsByClassName("submit-attView")[id].submit();
		}

</script>

<!-- <div class="modal" id = "modal-attView-submit">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you confirm to submit this student attendance?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick = "submitForm()">Confirm</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div> -->

<html>
<main class="ttr-wrapper">
<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Student Attendance</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Student Attendance</li>
				</ul>
			</div>	
			<div class="row">
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
                            <?php 
							echo "<h4>$clsName &nbsp $attDate</h4>";
                            ?>
						</div>

                        <div class="widget-inner">
                            <table class="table table-striped table-hover ">
                                <?php 
                                $count = 1;
                                $query = "SELECT * FROM Student
                                LEFT OUTER JOIN attendancestd ON Student.stdMKN = attendancestd.stdMKN
                                WHERE clsName = '$clsName' AND attDate = '$attDate'";
                                $result = mysqli_query($con, $query);

                                

                                if($attDate > $currentDate){


                                    $sql = "SELECT COUNT(*) AS 'StudentAbsent' FROM Student
                                    LEFT OUTER JOIN attendancestd ON Student.stdMKN = attendancestd.stdMKN
                                    WHERE clsName = '$clsName' AND attDate = '$attDate' AND attExpect = 0";
                                    $resultpresent = mysqli_query($con, $sql);
                                    $rowpresent = mysqli_fetch_array($resultpresent);

                                    echo "
                                    <thead>
                                    <tr>
                                    <th>#</th>
                                    <th>MyKid No</th>
                                    <th>Student</th>
                                    <th>Expect Attendance</th>
                                    <th>Reason</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    ";

                                    while( $row = mysqli_fetch_array($result)){
                                        echo "
                                        <tr>
                                        <td>$count</td>
                                        <td>$row[stdMKN]</td>
                                        <td>$row[stdName]</td>";
                                        attendanceExpect($row['attExpect']);
                                        echo " <td>$row[attReason]</td>";
                                        echo " </tr>
                                        ";
                                        $count+=1;
                                    }

                                    echo "
                                    </tbody>
                                    </table>
                                    <p>TOTAL STUDENT EXPECTED ABSENT = ".$rowpresent['StudentAbsent']. "</p>
                                    ";


                                }else{
                                    $sql = "SELECT COUNT(*) AS 'StudentPresent' FROM Student
                                    LEFT OUTER JOIN attendancestd ON Student.stdMKN = attendancestd.stdMKN
                                    WHERE clsName = '$clsName' AND attDate = '$attDate' AND attConfirm = 1";
                                    $resultpresent = mysqli_query($con, $sql);
                                    $rowpresent = mysqli_fetch_array($resultpresent);
                                    

                                    echo "
                                    <thead>
                                    <tr>
                                    <th>#</th>
                                    <th>MyKid No</th>
                                    <th>Student</th>
                                    <th>Actual Attendance</th>
                                    <th>Modify</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    ";
                                    $countStd = 0;
                                    while( $row = mysqli_fetch_array($result)){
                                        echo "
                                        <tr>
                                        <td>$count</td>
                                        <td>$row[stdMKN]</td>
                                        <td>$row[stdName]</td>
                                        <form method = 'post' action = 'attendanceViewProcess.php' class = 'submit-attView'>
                                        <td>
                                        <select name = 'attConfirm' value = '$row[attConfirm]' class = 'form-control' id='select'>
                                        ";
                                        if($row['attConfirm'] == 1){
                                            echo "
                                            <option value = '1' selected> Present </option>
                                            <option value = '0'> Absent </option>";
                                        }else{
                                            echo "
                                            <option value = '1'> Present </option>
                                            <option value = '0' selected> Absent </option>";
                                        }
                                        echo"
                                        </select>
                                        </td>
                                        
                                        ";
                                        
                                        echo " 
                                        <td>
                                        <input type = 'hidden' name = 'attID' value = '$row[attID]' >
                                        <button type = 'button' class = 'btn red pull-left' onclick = 'submitAtt($countStd)'>Submit</button></td>
                                        </form>
                                        </tr>
                                        ";

                                        echo "
                                    
                                    <div class='modal' id = 'modal-attView-submit$countStd'>
                                    <div class='modal-dialog' role='document'>
                                        <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title'>Confirmation</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'>
                                            <span aria-hidden='true'></span>
                                            </button>
                                        </div>
                                        <div class='modal-body'>
                                            <p>Are you confirm to submit this student attendance?</p>
                                        </div>
                                        <div class='modal-footer'>
                                            <button type='button' class='btn btn-primary' onclick = 'submitForm($countStd)'>Confirm</button>
                                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    
                                    ";
                                        $countStd+=1;
                                        $count+=1;
                                    }

                                    echo "
                                    </tbody>
                                    </table>
                                    <p>TOTAL STUDENT PRESENT = ".$rowpresent['StudentPresent']. "</p>
                                    ";
                                }
                                    
                                mysqli_close($con);
                            ?>
                                
                                

                            
                            
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