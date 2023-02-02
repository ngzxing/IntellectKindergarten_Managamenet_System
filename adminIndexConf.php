<?php

include "sessionAdmin.php";
include "sessionStaff.php";
include "dbconnect.php"
?>

<script>    

        function deleteIndex(id){

            
            $("#modal-indexConf-delete".concat(id)).modal("show");
        }

        function deletePerform(id){

            
            $("#performDeleteModal".concat(id)).modal("show");
        }

        function deleteProgram(id){

            
            $("#prgDeleteModal".concat(id)).modal("show");
        }

        function deleteIndexForm(id){
            
            document.getElementsByClassName("operation")[id].value = "Delete";
            document.getElementsByClassName("delete-indexConf")[id].submit();
        }

        function deletePerformForm(id){
            
            document.getElementsByClassName("performDeleteForm")[id].submit();
        }

        function deleteProgramForm(id){
            
            document.getElementsByClassName("prgDeleteForm")[id].submit();
        }


</script>

	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Index Configuration</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Index Configuration</li>
				</ul>
			</div>	
			<div class="row">

                <div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Index Configuration</h4>
						</div>
						<div class="widget-inner">

                            <form method = "post" action = "indexConfProcess.php" id = "pICreate">

                                <div class = "row">
                                    <div class = "col-5"><input type = "text" name = "pIName" class = "form-control"></div>
                                    <div class = "col-2"><input type = "submit" value = "Create" name = "operation" class = "btn yellow"></div>
                                </div>
                            </form>

                            <div class = "row">

                                <div class = 'col-4 mt-5'>
                                    <table class = 'table table-striped table-hover'>
    
                                        <thead>
                                            <tr>
                                            <th>#</th>
                                            <th>Index Name</th>
                                            <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                
                        
                                <?php

                                    $query = "SELECT * FROM indexSubject";
                                    $result = mysqli_query($con, $query);
                                    $count = 1;
                                    $countStd = 0;
                                    while( $row = mysqli_fetch_array($result) ){

                                        echo"
                                            <tr>
                                            <td>$count</td>
                                            <td>$row[iName]</td>
                                            <td>
                                                <form method = 'post' action = 'indexConfProcess.php' id = 'pIDelete' class = 'delete-indexConf'>
                                                    <input type = 'hidden' name = 'pIName' value = '$row[iName]'>
                                                    <input class = 'operation' type = 'hidden' name = 'operation'>
                                                    <button type = 'button' class = 'btn red' onclick = 'deleteIndex($countStd)'>Delete</button>
                                                </form>
                                            </td>

                                            </tr>
                                        ";

                                        echo "
                                    
                                    <div class='modal' id = 'modal-indexConf-delete$countStd'>
                                    <div class='modal-dialog' role='document'>
                                        <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title'>Confirmation</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'>
                                            <span aria-hidden='true'></span>
                                            </button>
                                        </div>
                                        <div class='modal-body'>
                                            <p>Are you confirm to delete this index?</p>
                                        </div>
                                        <div class='modal-footer'>
                                            <button type='button' class='btn btn-primary' onclick = 'deleteIndexForm($countStd)'>Confirm</button>
                                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    
                                    
                                    ";
                                        $countStd +=1;
                                        $count +=1;
                                        
                                    }
                                
                                ?>

                                </tbody>
                                </table>
                                </div>
                                    
                            </div>

						</div>
					</div>
				</div>


				<div class="col-lg-12 m-b30">
					<div class="widget-box" id = 'ptypeConf'>
						<div class="wc-title">
							<h4>Performance Type Configuration</h4>
						</div>
						<div class="widget-inner">

                            <form method = "post" action = "ptConfProcess.php" id = "ptAdd">

                                <div class = "row">
                                    <div class = "col-5"><input type = "text" name = "ptName" class = "form-control"></div>
                                    <div class = "col-2"><input type = "submit" value = "Create" name = "operation" class = "btn yellow"></div>
                                </div>
                            </form>

                            <div class = "row">
                                
                        
                                <?php

                                    $query = "SELECT * FROM PerformType WHERE ptName != 'subject'";
                                    $result = mysqli_query($con, $query);
                                    $countStd = 0;
                                    while( $row = mysqli_fetch_array($result) ){
                                    
                                    echo"
                                        
                                        <div class = 'col-4 mt-5'>
                                        
                                        <form method = 'post' action = 'ptConfProcess.php' id = 'ptSelect'>
                                        <div class = 'row mb-3'>
                                            <div class = 'col-8'>
                                                <select name = 'pIName' class = 'form-control'>
                                    ";

                                        $queryI = "SELECT * FROM indexPerformance";
                                        $resultI = mysqli_query($con, $queryI);
                                        
                                        while( $rowI = mysqli_fetch_array($resultI) ){

                                        echo"
                                            
                                            <option value = '$rowI[iPerID]'> $rowI[iName]</option>
                                        ";
                                        }

                                    echo"           
                                                </select>
                                            </div>
                                            <input type = 'hidden' name = 'ptName' value = '$row[ptName]' >
                                            <div class = 'col-4'><input type = 'submit' value = 'Add' name = 'operation' class = 'btn yellow pull-right'></div>
                                        </div>
                                        </form>

                                        <table class = 'table table-striped table-hover'>
    
                                        <thead>
                                            <tr>
                                            <th>#</th>
                                            <th>$row[ptName]</th>
                                            <th>
                                                <form method = 'post' action = 'ptConfProcess.php' id = 'ptDelete' class = 'performDeleteForm'>
                                                    <input type = 'hidden' name = 'ptName' value = '$row[ptName]'>
                                                    <input name = 'operation' type = 'hidden' value = 'Delete'>
                                                    <button type = 'button' class = 'btn red' onclick = 'deletePerform($countStd)'>Delete</button>
                                                </form>
                                            </th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                    ";

                                    echo "
                                    
                                    <div class='modal' id = 'performDeleteModal$countStd'>
                                    <div class='modal-dialog' role='document'>
                                        <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title'>Confirmation</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'>
                                            <span aria-hidden='true'></span>
                                            </button>
                                        </div>
                                        <div class='modal-body'>
                                            <p>Are you confirm to delete this performance?</p>
                                        </div>
                                        <div class='modal-footer'>
                                            <button type='button' class='btn btn-primary' onclick = 'deletePerformForm($countStd)'>Confirm</button>
                                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    
                                    
                                    ";
                                        $countStd +=1;

                                                                         
                                        $queryIndex = "SELECT * FROM PerformBased as pb JOIN indexPerformance as ip ON iPerID = pIName AND ptName = '$row[ptName]'";
                                        $resultIndex = mysqli_query($con, $queryIndex);
                                        $count = 1;

                                        while( $rowIndex = mysqli_fetch_array($resultIndex) ){

                                        echo"
                                            <tr>
                                            <td>$count</td>
                                            <td>$rowIndex[iName]</td>
                                            <td>
                                                <form method = 'post' action = 'ptConfProcess.php' id = 'ptDrop'>
                                                    <input type = 'hidden' name = 'ptName' value = '$row[ptName]'>
                                                    <input type = 'hidden' name = 'pIName' value = '$rowIndex[pIName]'> 
                                                    <input type = 'submit' name = 'operation' value = 'Drop' class = 'btn red'>
                                                </form>
                                            </td>

                                            </tr>
                                        ";

                                        $count +=1;
                                        }

                                    echo"

                                        </tbody>
                                        </table>
                                        </div>

                                    " ;
                                    
                                    $count += 1;
                                    }
                                
                                ?>
                                    
                            </div>

						</div>
					</div>
				</div>

                
                <div class="col-lg-12 m-b30">
					<div class="widget-box" id = 'prgConf'>
						<div class="wc-title">
							<h4>Program Configuration</h4>
						</div>
						<div class="widget-inner">

                            <form method = "post" action = "prgConfProcess.php" id = "prgCreate">

                                <div class = "row">
                                    <div class = "col-5"><input type = "text" name = "prgName" class = "form-control"></div>
                                    <div class = "col-2"><input type = "submit" value = "Create" name = "operation" class = "btn yellow"></div>
                                </div>
                            </form>

                            <div class = "row">
                                
                        
                                <?php

                                    $query = "SELECT * FROM Program";
                                    $result = mysqli_query($con, $query);
                                    
                                    $countStd = 0;
                                    while( $row = mysqli_fetch_array($result) ){
                                    
                                    echo"
                                        
                                        <div class = 'col-4 mt-5'>
                                        
                                        <form method = 'post' action = 'prgConfProcess.php' id = 'prgSelect'>
                                        <div class = 'row mb-3'>
                                            <div class = 'col-8'>
                                                <select name = 'ptName' class = 'form-control'>
                                    ";

                                        $queryPt = "SELECT * FROM PerformType";
                                        $resultPt = mysqli_query($con, $queryPt);
                                        while( $rowPt = mysqli_fetch_array($resultPt) ){

                                        echo"
                                            
                                            <option value = '$rowPt[ptName]'> $rowPt[ptName]</option>
                                        ";
                                        }

                                    echo"           
                                                </select>
                                            </div>
                                            <input type = 'hidden' name = 'prgName' value = '$row[prgName]' >
                                            <div class = 'col-4'><input type = 'submit' value = 'Add' name = 'operation' class = 'btn yellow pull-right'></div>
                                        </div>
                                        </form>

                                        <table class = 'table table-striped table-hover'>
    
                                        <thead>
                                            <tr>
                                            <th>#</th>
                                            <th>$row[prgName]</th>
                                            <th>
                                                <form method = 'post' action = 'prgConfProcess.php' id = 'prgDelete' class = 'prgDeleteForm'>
                                                    <input type = 'hidden' name = 'prgName' value = '$row[prgName]'>
                                                    <input type = 'hidden' name = 'operation' value = 'Delete'>
                                                    <button type = 'button' class = 'btn red' onclick = 'deleteProgram($countStd)'>Delete</button>
                                                </form>
                                            </th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                    ";

                                    echo "
                                    
                                    <div class='modal' id = 'prgDeleteModal$countStd'>
                                    <div class='modal-dialog' role='document'>
                                        <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title'>Confirmation</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'>
                                            <span aria-hidden='true'></span>
                                            </button>
                                        </div>
                                        <div class='modal-body'>
                                            <p>Are you confirm to delete this program?</p>
                                        </div>
                                        <div class='modal-footer'>
                                            <button type='button' class='btn btn-primary' onclick = 'deleteProgramForm($countStd)'>Confirm</button>
                                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    
                                    
                                    ";
                                        

                                                                         
                                        $queryPP= "SELECT * FROM prgPerform WHERE prgName =  '$row[prgName]'";
                                        $resultPP = mysqli_query($con, $queryPP);
                                        $count = 1;

                                        while( $rowPP = mysqli_fetch_array($resultPP) ){

                                        echo"
                                            <tr>
                                            <td>$count</td>
                                            <td>$rowPP[ptName]</td>
                                            <td>
                                                <form method = 'post' action = 'prgConfProcess.php' id = 'prgDrop'>
                                                    <input type = 'hidden' name = 'prgName' value = '$row[prgName]'>
                                                    <input type = 'hidden' name = 'ptName' value = '$rowPP[ptName]'> 
                                                    <input type = 'submit' name = 'operation' value = 'Drop' class = 'btn red'>
                                                </form>
                                            </td>

                                            </tr>
                                        ";

                                        $count +=1;
                                        }

                                    echo"

                                        </tbody>
                                        </table>
                                        </div>

                                    " ;
                                    
                                    $countStd +=1;
                                    }
                                
                                ?>
                                    
                            </div>

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