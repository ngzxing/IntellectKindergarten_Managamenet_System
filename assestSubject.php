<?php

include "sessionAssest.php";
include "sessionStaff.php";
include "dbconnect.php";
error_reporting(E_ERROR | E_PARSE);
?>

<script>    

        function submitAssSub(id){

            $("#modal-assSelect-submit".concat(id)).modal("show");
            
        }

        function submitForm(id){
            
            document.getElementsByClassName("submitAssSub")[id].submit();
        }

</script>



<!-- <div class="modal" id = "modal-assSelect-submit">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you confirm to submit this assestment subject?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick = "submitForm()">Confirm</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div> -->

	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Assessment Subject</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Assessment Subject</li>
				</ul>
			</div>	
			<div class="row">
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Assessment Subject</h4>
						</div>

                        <form id ='filter' method = 'GET' action = 'assestSubject.php'>
                            <div class = 'row'>
                                <div class = 'col-lg-6 px-5 pt-5'>
                                <select name = 'sbjName' class = 'form-control' id='select'>";
                        
                            <?php

                                $query = "SELECT sbjName, subjects.sbjID FROM subjectsTeac JOIN subjects ON subjectsTeac.sbjID = subjects.sbjID WHERE tIC = '$_SESSION[tIC]' AND clsName = '$_SESSION[clsName]' ";
                                $result = mysqli_query($con, $query);
                                $count = 0;
                                

                                while($row = mysqli_fetch_array($result)){
                                    
                                    if( !isset( $_GET["sbjName"] ) ){

                                        $_GET["sbjName"] = $row["sbjName"];
                                    }
                
                                    if($row['sbjName'] != $_GET["sbjName"]){
                
                                        if($count == 0){
                
                                            echo "<option value = '$_GET[sbjName]'> $_GET[sbjName] </option>";
                                        }
                
                                        echo "<option value = '$row[sbjName]'> $row[sbjName] </option>";
                                    }
                                    elseif($count == 0){
                                        
                                        echo "<option value = '$_GET[sbjName]'>  $_GET[sbjName] </option>";
                                    }

                
                                    $count += 1;
                                }   
                            ?>  
                                </select>
                                </div>
                                <div class = "col-lg-3 px-2 pt-5">
                                <input type = 'submit' class = "btn yellow" value = "Apply">
                                </div>
                            </div>
                        </form>
                        

						<div class="widget-inner">
                            <table class="table table-striped table-hover ">
                                <thead>
                                    <tr>
                                    <th>Student</th>
                                <?php
                                    $evalType = array();

                                    $querySbj = "SELECT sbjID FROM subjects WHERE sbjName = '$_GET[sbjName]' ";
                                    $resultSbj =  mysqli_query($con, $querySbj);
                                    $resultSbj = mysqli_fetch_array($resultSbj);

                                    $query = "SELECT * FROM sbjPerformance JOIN evalType ON evalType.evalID  = sbjPerformance.evalID AND sbjPerformance.sbjID = '$resultSbj[sbjID]'";
                                    $result = mysqli_query($con, $query);

                                    $queryPerId = array();

                                    while($row = mysqli_fetch_array($result)){
                                    
                                    array_push($evalType, $row["evalID"]);
                                    echo "

                                    <th>$row[evalType]</th>
                                    
                                    ";
                                    
                                    array_push($queryPerId, $row["sbjPerID"]);

                                    };

                                    $queryPerId2 = htmlentities(serialize($queryPerId));
                                ?>
                                    <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                            
                            <?php
                                
                                $query = "SELECT * FROM Student  WHERE clsName = '$_SESSION[clsName]' ";
                                $result = mysqli_query($con, $query);
                                
                                $countStd = 0;
                                while( $row = mysqli_fetch_array($result)){
                                    
                                    echo "
                                    
                                    <tr>
                                    <td>$row[stdName]</td>
                                    <form method = 'post' action = 'assestSubjectProcess.php' class = 'submitAssSub'>

                                    ";
                                    
                                    $count = 0;
                                    foreach( $evalType as $et){
                                    
                                    $query2 = "SELECT ratingName, ratingID, rCategory FROM rating JOIN evalType ON rCategory = rateCtg WHERE evalID = '$et'";
                                    $result2 = mysqli_query($con, $query2);

                                    $query3 = "SELECT * FROM sbjPerformance WHERE evalID = '$et' AND sbjID = $resultSbj[sbjID]";
                                    $result3 = mysqli_fetch_array(mysqli_query($con, $query3));

                                    $query4 = "SELECT * FROM performance WHERE stdMKN = '$row[stdMKN]' AND spPeriod = '$_SESSION[period]' AND spYear = '$_SESSION[year]'  ";
                                    $result4 = mysqli_fetch_array(mysqli_query($con, $query4));

                                    $query5 = "SELECT * FROM performRating WHERE performanceID = '$result4[performanceID]' AND sbjPerID = '$result3[sbjPerID]' ";
                                    $result5 = mysqli_fetch_array(mysqli_query($con, $query5));

                                    echo "
                                    
                                    <td>
                                        <select name = '$queryPerId[$count]' class = 'form-control' id='select'>

                                    ";
                                
                                    while( $row2 = mysqli_fetch_array($result2) ){


                                    if($result5["ratingID"] != $row2["ratingID"]){

                                    echo
                                    "
                                            <option value = '$row2[ratingID]'> $row2[ratingName] </option>

                                    ";
                                    }
                                    elseif( is_null($result5["ratingID"]) ){
                                        
                                        echo
                                    "
                                            <option value = '$result5[ratingID]'>-</option>

                                    ";
                                    }
                                    else{

                                        echo
                                        "
                                                <option value = '$row2[ratingID]' selected> $row2[ratingName] </option>
    
                                        "; 
                                    }

                                    }

                                    echo "
                                    
                                        </select>
                                    </td>
                                    ";
                                    
                                    $count+=1;

                                    }
                                    
                                    echo
                                    "
                                    <td>
                                    <input type = 'hidden' name = 'stdMKN' value = '$row[stdMKN]' >
                                    <input type='hidden' name='performance' value='$queryPerId2' />
                                    <button type = 'button' class = 'btn red pull-right' onclick = 'submitAssSub($countStd)'>Submit</button></td>
                                    </form>
                                    </tr>
                                    ";

                                    echo "
                                    
                                    <div class='modal' id = 'modal-assSelect-submit$countStd'>
                                    <div class='modal-dialog' role='document'>
                                        <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title'>Confirmation</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'>
                                            <span aria-hidden='true'></span>
                                            </button>
                                        </div>
                                        <div class='modal-body'>
                                            <p>Are you confirm to submit this assestment subject?</p>
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
    
                                }
                                
                                mysqli_close($con);
                            ?>
                                
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