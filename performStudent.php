<?php

include "leftSideBarParent.php";
include "dbconnect.php"
?>

	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Performance</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Performance</li>
				</ul>
			</div>	
			<div class="row">
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Performance</h4>
						</div>
						<div class="widget-inner">
                        

                        <script>

                            function changeFunc(){
                            
                                document.getElementById('filter').submit();
                            }
                        </script>

                    
                    <?php

                    error_reporting(E_ERROR | E_PARSE);
                    $queryGetStd = "SELECT * FROM Student WHERE pIC = '$_SESSION[pIC]' ";
                    $resultGetStd = mysqli_query($con, $queryGetStd);
                    
                    echo "

                    <form method = 'POST' action = 'performStudent.php' id = 'filter'>
                    <div class = 'row'>

                    <div class = 'col-lg-4'><label>Student Name: <select class = 'form-control student-settings' name = 'stdMKN' class='form-control' id='select' onchange = 'changeFunc();'>";

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
                    
                    echo " </select></label></div>" ;

                    $queryGetPeriod = "SELECT DISTINCT spPeriod FROM Performance WHERE stdMKN = '$_POST[stdMKN]'";
                    $resultGetPeriod = mysqli_query($con, $queryGetPeriod);
                    
                    echo"<div class = 'col-lg-4'><label>Period<select name = 'period' class='form-control' id='select' onchange = 'changeFunc();'>";

                    while($rowGetPeriod = mysqli_fetch_array($resultGetPeriod)){
                        
                        if(!isset($_POST["period"])){

                            $_POST["period"] = $rowGetPeriod["spPeriod"];
                        }

                        if($_POST["period"] == $rowGetPeriod["spPeriod"]){
                            echo "<option value = '$rowGetPeriod[spPeriod]' selected>$rowGetPeriod[spPeriod]</option>";
                        }
                        else{

                            echo "<option value = '$rowGetPeriod[spPeriod]'>$rowGetPeriod[spPeriod]</option>";
                        }
                    }
                    
                    echo " </select></label></div>" ;

                   
                    $queryGetYear = "SELECT DISTINCT spYear FROM Performance WHERE stdMKN = '$_POST[stdMKN]'";
                    $resultGetYear = mysqli_query($con, $queryGetYear);

                    echo"<div class = 'col-lg-4'><label>Year<select name = 'year' class='form-control' id='select' onchange = 'changeFunc();'>";

                    while($rowGetYear = mysqli_fetch_array($resultGetYear)){

                        if(!isset($_POST["year"])){

                            $_POST["year"] = $rowGetYear["spYear"];
                        }

                        if($_POST["year"] = $rowGetYear["spYear"]){
                            echo "<option value = '$rowGetYear[spYear]' selected>$rowGetYear[spYear]</option>";
                        }
                        else{

                            echo "<option value = '$rowGetYear[spYear]'>$rowGetYear[spYear]</option>";
                        }
                    }
                    
                    echo " </select></label></div></div></form>" ;

                    $queryGetStdName = "SELECT * FROM Student WHERE stdMKN = '$_POST[stdMKN]' ";
                    $stdName = mysqli_fetch_array( mysqli_query($con, $queryGetStdName) )["stdName"];
                    echo "<h2>$stdName</h2>";

                    $queryGetPt = "SELECT * FROM prgPerform JOIN Student ON prgPerform.prgName = Student.prgName WHERE stdMKN = '$_POST[stdMKN]' ";
                    $resultGetPt = mysqli_query($con, $queryGetPt);

                    while( $rowGetPt = mysqli_fetch_array($resultGetPt) ){

                        if($rowGetPt["ptName"] == "subject"){

                        echo "
                        
                        <h3>Subjects</h3>
                        <table class='mt-5 table table-striped table-hover '>
                            <thead>
                                <tr> 
                                    <td> Subject </td> 
                        ";
                            
                        $queryGetEvalType = "SELECT * FROM evalType";
                        $resultGetEvalType = mysqli_query($con, $queryGetEvalType);
                        
                        $evalType = array();
                        $evalName = array();
                        while($rowGetEvalType = mysqli_fetch_array($resultGetEvalType)){

                        echo "
                                    <td>$rowGetEvalType[evalType]</td>
                        ";
                        array_push( $evalType, $rowGetEvalType['evalID']);
                        array_push( $evalName, $rowGetEvalType['evalType']);

                        }

                        echo"
                                </tr>
                            </thead>

                            <body>
                        ";

                        $queryGetSubject = "SELECT * FROM Subjects";
                        $resultGetSubject = mysqli_query($con, $queryGetSubject);

                        $queryGetPerformanceID = "SELECT * FROM Performance WHERE spPeriod = '$_POST[period]' AND spYear = '$_POST[year]' AND stdMKN = '$_POST[stdMKN]' ";
                        $performanceID = mysqli_fetch_array( mysqli_query($con, $queryGetPerformanceID) )['performanceID'];
                        
                        $count = 0;
                        while($rowGetSubject = mysqli_fetch_array($resultGetSubject)){

                            
                            echo "
                            
                            <tr>
                                <td>$rowGetSubject[sbjName]</td>

                            ";
                        
                            foreach( $evalType as $et ){

                                $queryGetSbjPerID = "SELECT * FROM sbjPerformance WHERE evalID = '$et' AND sbjID = '$rowGetSubject[sbjID]' ";
                                $resultGetSbjPerID = mysqli_fetch_array(mysqli_query($con, $queryGetSbjPerID));

                                $queryGetPer = "SELECT * FROM performRating JOIN rating ON rating.ratingID = performRating.ratingID WHERE performanceId = '$performanceID' AND sbjPerID = '$resultGetSbjPerID[sbjPerID]' ";
                                $resultGetPer = mysqli_fetch_array(mysqli_query($con, $queryGetPer));
                                
                                if(!isset($resultGetPer["ratingID"])){

                                echo "<td>-</td>";
                                }else{

                                echo "<td>$resultGetPer[ratingName]</td>";
                                }
                            }

                            echo "

                            </tr>

                            ";

                            $count += 1;

                        
                        }
                        }
                        else{

                            echo "
                            
                            <h3>$rowGetPt[ptName]</h3>
                            <table class='mt-5 table table-striped table-hover '>
                                <thead>
                                    <tr> 
                                        <th> Subject </th> 
                            ";
                                
                            $queryGetiType = "SELECT * FROM iType";
                            $resultGetiType = mysqli_query($con, $queryGetiType);
                            
                            $iType = array();
                            while($rowGetiType = mysqli_fetch_array($resultGetiType)){
    
                            echo "
                                        <th>$rowGetiType[iType]</th>
                            ";
                            array_push( $iType, $rowGetiType['iType']);
    
                            }
    
                            echo"
                                    </tr>
                                </thead>
    
                                <body>
                            ";
    
                            $queryGetiName = "SELECT * FROM performbased JOIN indexPerformance ON pIName = iPerID WHERE ptName = '$rowGetPt[ptName]' ";
                            $resultGetiName = mysqli_query($con, $queryGetiName);
    
                            $queryGetPerformanceID = "SELECT * FROM Performance WHERE spPeriod = '$_POST[period]' AND spYear = '$_POST[year]' AND stdMKN = '$_POST[stdMKN]' ";
                            $performanceID = mysqli_fetch_array( mysqli_query($con, $queryGetPerformanceID) )['performanceID'];
                            
                            $count = 0;
                            while($rowGetiName = mysqli_fetch_array($resultGetiName)){
    
                                
                                echo "
                                
                                <tr>
                                    <td>$rowGetiName[iName]</td>
    
                                ";
                                error_reporting(E_ERROR | E_PARSE);
                                foreach( $iType as $it ){
    
    
                                    $queryGetPer = "SELECT * FROM performComment WHERE performanceId = '$performanceID' AND iPerID = '$rowGetiName[pbID]' ";
                                    $resultGetPer = mysqli_fetch_array(mysqli_query($con, $queryGetPer));
                                    
                                    if(!isset($resultGetPer["pcComment"])){
    
                                    echo "<td>-</td>";
                                    }else{
    
                                    echo "<td>$resultGetPer[pcComment]</td>";
                                    }
                                }
    
                                echo "
    
                                </tr>
    
                                ";
                            
                                $count += 1;
                            }

                        }

                        echo"
                                </body>
                            </table>
                        ";
                    }

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