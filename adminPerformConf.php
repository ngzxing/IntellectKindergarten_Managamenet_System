<?php

include "sessionAdmin.php";
include "sessionStaff.php";
include "dbconnect.php"
?>

<script>

    function changed(id){

        document.getElementsByClassName("evalRateConf")[id-1].submit();
    }

    function changeTeac(id){

        document.getElementsByClassName("sbjAddTeacConf")[id-1].submit();
    }

    function changeCls(){

        document.getElementById("selectClsForm").submit();
    }


</script>

<script>    

        function deleteEval(id){

            $("#modal-classConf-delete".concat(id)).modal("show");
        }

        function deleteEvalForm(id){
            
            document.getElementsByClassName("clsDelete")[id].submit();
        }

</script>

	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Performance Configuration</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Performance Configuration</li>
				</ul>
			</div>	
			<div class="row">


				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Rating Configuration</h4>
						</div>
						<div class="widget-inner">
                            <form method = "post" action = "ratingConfProcess.php" id = "ratingConf">
                            <div class = "row mb-5">
                                <div class = "col-4"><input name = "rateCtg" class = "form-control" type = "text"></div>
                                <div class = "col-2"><input name = "operation" value = "Create"  class = "btn yellow" type = "submit"></div>
                            </div>
                            </form>

                        
                            <div class = 'row'>    
                        <?php

                            $query = "SELECT * FROM ratingCtg";
                            $result = mysqli_query($con, $query);

                            while( $row = mysqli_fetch_array($result) ){
                            
                                $queryRating = "SELECT * FROM Rating WHERE rCategory = '$row[rateCtg]'";
                                $resultRating = mysqli_query($con, $queryRating);

                                echo "
                                
                                <div class = 'col-4 mt-3'>
                                <h4>$row[rateCtg]</h4>
                                <form method = 'post' action = 'ratingConfProcess.php' id = 'ratingAddConf'>
                                    <div class = 'row mb-3'>
                                        <input type = 'hidden' name = 'rateCtg' value = '$row[rateCtg]'>
                                        <div class = 'col-10'><input type = 'text' class = 'form-control' name = 'ratingName'></div>
                                        <div class = 'col-2'><input type = 'submit' class = 'btn yellow pull-right' value = 'Add' name = 'operation'></div>
                                    </div>
                                </form>
                                <table class='table table-striped table-hover '>
                                <thead>
                                    <tr>
                                    <th>#</th>
                                    <th>Rating Mark</th>
                                    <th>
                                        <form method = 'post' action = 'ratingConfProcess.php' id = 'ratingDeleteConf'>
                                            <input type = 'hidden' name = 'rateCtg' value = '$row[rateCtg]'>
                                            <input type = 'submit' class = 'btn red pull-right' value = 'Delete' name = 'operation'>
                                        </form>
                                    </th>
                                    </tr>
                                </thead>
                                <tbody>
                                ";
                                
                                $count = 1;
                                while( $rowRating = mysqli_fetch_array($resultRating) ){
                                    
                                echo"
                                    
                                    <tr>
                                    <td>$count</td>
                                    <td>$rowRating[ratingName]</td>
                                    <td>
                                        <form method = 'post' action = 'ratingConfProcess.php' id = 'ratingDropConf'>
                                            <input type = 'hidden' name = 'rateCtg' value = '$row[rateCtg]'>
                                            <input type = 'hidden' name = 'ratingName' value = '$rowRating[ratingName]'>
                                            <input type = 'submit' class = 'btn red pull-right' value = 'Drop' name = 'operation'>
                                        </form>
                                    </td>
                                    </tr>
                                ";

                                $count+=1;

                                }

                                echo"
                                </tbody>
                                </table>
                                </div>
                                ";

                            }

                        ?>
                            </div>


						</div>
					</div>
				</div>
                

                <div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title" id = 'evalType'>
							<h4>Evaluation Type Configuration</h4>
						</div>

						<div class="widget-inner">

                            <?php
                            
                            $queryRate = "SELECT * FROM ratingCtg";
                            $resultRate = mysqli_query($con, $queryRate);
                            $rate = array();
                            while( $rowRate = mysqli_fetch_array($resultRate) ){

                                array_push($rate, $rowRate["rateCtg"]);
                            }
                            
                            ?>    

                            <form method = "post" action = "evalConfProcess.php" id = "evalCreateConf">
                                <div class = "row mb-5">
                                    <div class = "col-4"><input type = "text" class = "form-control" name = "evalType"></div>
                                    <div class = "col-3"><select class = "form-control" name = "rateCtg">
                                    <?php

                                        foreach( $rate as $rt){

                                            echo "<option value = '$rt'> $rt </option>";
                                        }
                                    
                                    ?>
                                    </select></div>
                                    <div class = "col-2"><input type = "submit" class = "btn yellow" name = "operation" value = "Create"></div>
                                </div>
                            </form>

                            <table class='table table-striped table-hover '>
                                <thead>
                                    <tr>
                                    <th>#</th>
                                    <th>Evaluation Type</th>
                                    <th>Rating Category</th>
                                    <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    
                                <?php
                                
                                $query = "SELECT * FROM EvalType";
                                $result = mysqli_query($con, $query);
                                $count = 1;
                                $countStd = 0;
                                while( $row = mysqli_fetch_array($result)){

                                echo"
                                
                                    <tr>    
                                    <td>$count</td>
                                    <td>$row[evalType]</td>
                                    <td>
                                        <form method = 'post' action = 'evalConfProcess.php' class = 'evalRateConf'>
                                            <input type = 'hidden' value = '$row[evalID]' name = 'evalID'>
                                            <input type = 'hidden' value = 'Edit' name = 'operation'>
                                            <select name = 'rateCtg' onchange = 'changed($count);'>
                                ";
                                
                               foreach( $rate as $rt){

                                if( $row["rateCtg"] == $rt ){
                                    echo"
                                                <option value = '$rt' selected> $rt</option>
                                
                                    ";
                                }
                                else{

                                    echo"
                                                <option value = '$rt' > $rt</option>
                                
                                    ";

                                }

                                }

                                echo"
                                            </select>

                                        </form>
                                    </td>
                                    <td>
                                        <form method = 'post' action = 'evalConfProcess.php' class = 'evalDeleteConf' >
                                            <input type = 'hidden' value = '$row[evalID]' name = 'evalID'>
                                            <input type = 'submit' value = 'Delete' class = 'btn red pull-right' name = 'operation'>
                                        </form>
                                    </td>
                                    </tr>

                                ";

                                echo "
                                    
                                    <div class='modal' id = 'modal-eval-delete$countStd'>
                                    <div class='modal-dialog' role='document'>
                                        <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title'>Confirmation</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'>
                                            <span aria-hidden='true'></span>
                                            </button>
                                        </div>
                                        <div class='modal-body'>
                                            <p>Are you confirm to edit this evaluation?</p>
                                        </div>
                                        <div class='modal-footer'>
                                            <button type='button' class='btn btn-primary' onclick = 'deleteEvalForm($countStd)'>Confirm</button>
                                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    
                                    
                                    ";

                                $countStd+=1;
                                $count+=1;
                                }

                                
                                ?>
                                    
                                </tbody>
                            </table>
                        


						</div>
					</div>
				</div>

                <div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title" id = 'sbjConf'>
							<h4>Subject Configuration</h4>
						</div>

						<div class="widget-inner">
                   
                            <form method = "post" action = "subjectConfProcess.php" id = "sbjCreateConf">
                                <div class = "row mb-5">
                                    <div class = "col-4"><input type = "text" class = "form-control" name = "sbjName"></div>
                                    <div class = "col-2"><input type = "submit" class = "btn yellow" name = "operation" value = "Create"></div>
                                </div>
                            </form>

                            <table class='table table-striped table-hover '>
                                <thead>
                                    <tr>
                                    <th style = 'width: 5%'>#</th>
                                    <th style = 'width: 20%'>Subject</th>
                                    <th style = 'width: 20%'>
                                        <form method = "get" action = "adminPerformConf.php#sbjConf" id = 'selectClsForm'><select id = 'selectCls' name = 'clsName' onchange = 'changeCls();'>
                                        
                                    <?php
                                        
                                        $queryCls = "SELECT * FROM Class as c JOIN prgPerform as p ON c.prgName = p.prgName AND ptName = 'subject'";
                                        $resultCls = mysqli_query($con, $queryCls);
                                        $count = 0;

                                        while( $rowCls = mysqli_fetch_array($resultCls)){

                                        if(!isset($_GET["clsName"])){

                                            $_GET["clsName"] = $rowCls["clsName"];
                                        }

                                        echo"
                                        
                                            <option value = '$rowCls[clsName]'
                                        ";
                                        
                                        if($_GET["clsName"] == $rowCls["clsName"]){

                                        echo "
                                        selected
                                        ";
                                        }

                                        echo"
                                            
                                        >$rowCls[clsName]</option>
                                        ";

                                        $count+=1;

                                        }

                            
                                    ?>          
                                        </select></form>
                                    </th>
                                    <th>Status</th>
                                    <th style = 'width: 20%'></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    
                                <?php
                                
                                $query = "SELECT * FROM Subjects";
                                $result = mysqli_query($con, $query);
                                $count = 1;

                                while( $row = mysqli_fetch_array($result)){

                                echo"
                                
                                    <tr>    
                                    <td>$count</td>
                                    <td>$row[sbjName]</td>
                                    <td>
                                        <form method = 'post' action = 'subjectConfProcess.php' class = 'sbjAddTeacConf' onchange = 'changeTeac($count);'>
                                            <input type = 'hidden' name = 'operation' value = 'addTeac'>
                                            <input type = 'hidden' name = 'clsName' id = 'clsName' value = '$_GET[clsName]'>
                                            <input type = 'hidden' name = 'sbjID' value = '$row[sbjID]'>

                                            <select name = 'tIC' class = 'form-control'>
                                ";
                                
                                $queryTeac = "SELECT * FROM Teacher";
                                $resultTeac = mysqli_query($con, $queryTeac);
                                
                                $gotTeac = 0;
                                while($rowTeac = mysqli_fetch_array($resultTeac)){

                                    $queryTeacSbj = "SELECT * FROM subjectsTeac WHERE tIC = '$rowTeac[tIC]' AND sbjID = '$row[sbjID]' AND clsName = '$_GET[clsName]' ";
                                    $resultTeacSbj = mysqli_query($con, $queryTeacSbj);
                                    $numRow = mysqli_num_rows($resultTeacSbj);

                                    echo"

                                    <option value = '$rowTeac[tIC]'
                                    ";

                                    if($numRow != 0){

                                        $gotTeac = 1;
                                        echo "selected";
                                    }
                                    
                                    echo"
                                    
                                    > $rowTeac[tName]</option>
                                    ";
                                }
                                

                                if($gotTeac == 0){

                                echo "
                                    
                                <option value = '-' selected>-</option>
                                ";
                                }

                                echo"           
                                            </select>
                                        </form>
                                    </td>
                                ";

                                if($gotTeac == 1){

                                echo"
                                    <td>Specified</td>
                                ";
                                }
                                else{

                                echo"
                                    <td>unpecified</td>
                                ";
                                }

                                echo"
                                    <td>
                                        <form method = 'post' action = 'subjectConfProcess.php' class = 'sbjDeleteConf' >
                                            <input type = 'hidden' value = '$row[sbjID]' name = 'sbjID'>
                                            <input type = 'submit' value = 'Delete' class = 'btn red pull-right' name = 'operation'>
                                        </form>
                                    </td>
                                    </tr>

                                ";

                                $count+=1;
                                }

                                
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