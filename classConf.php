<?php

include "sessionAdmin.php";
include "sessionStaff.php";
include "dbconnect.php"
?>

<script>    

        function deleteClass(id){

            $("#modal-classConf-delete".concat(id)).modal("show");
        }

        function deleteForm(id){
            
            document.getElementsByClassName("clsDelete")[id].submit();
        }

</script>

	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Class Configuration</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Class Configuration</li>
				</ul>
			</div>	
			<div class="row">


                <script>

                    function changePrg(id){

                        document.getElementsByClassName("clsSelect")[id-1].submit();
                    }


                </script>




                <div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Class Configuration</h4>
						</div>
						<div class="widget-inner">

                            <form method = "post" action  = "classConfProcess.php" id = 'clsCreate'>
                            <div class = 'row mb-3'>
                                <div class = 'col-4'><input type = 'text' name = 'clsName' class = 'form-control'></div>
                                <div class = 'col-1'><input type = 'submit' name = 'operation' value = 'Create' class = 'form-control btn yellow'></div>
                            </div>
                            </form>

                            <div>
                                <table class = 'table table-striped table-hover'>
                                    <thead>
                                        <th>#</th>
                                        <th>Class Name</th>
                                        <th>Program</th>
                                        <th></th>
                                    </thead>
                                    <tbody>

                                <?php

                                    $queryCls =  "SELECT * FROM Class";
                                    $resultCls = mysqli_query($con, $queryCls);
                                    $count =  1;
                                    $countStd = 0;
                                    while ( $rowCls = mysqli_fetch_array($resultCls) ){
                                        

                                        echo"

                                        <tr>
                                            <td>$count</td>
                                            <td>$rowCls[clsName]</td>
                                            <td>
                                            <form method = 'post' action = 'classConfProcess.php' class = 'clsSelect' >
                                            <input type = 'hidden' name = 'clsName' value = '$rowCls[clsName]' >
                                            <input type = 'hidden' name = 'operation' value = 'selectCls'>
                                            <select name = 'prgName' class = 'form-control' onchange = 'changePrg($count);' >
                                        ";

                                        if( is_null($rowCls["prgName"]) ){

                                            echo "<option value = '-' selected>-</option>";
                                        }
                                        
                                        $queryPrg = "SELECT * FROM Program";
                                        $resultPrg = mysqli_query($con, $queryPrg);

                                        while( $rowPrg = mysqli_fetch_array($resultPrg)  ){
                                            
                                            
                                            if( $rowCls["prgName"] == $rowPrg["prgName"] ){

                                                echo "<option value = '$rowPrg[prgName]' selected >$rowPrg[prgName]</option>";
                                            }
                                            else{

                                                echo "<option value = '$rowPrg[prgName]' >$rowPrg[prgName]</option>";
                                            }
                                            
                                        }
                                        
                                        echo
                                        "   
                                            </select></form>
                                            </td>
                                            <td>
                                                <form method = 'post' action = 'classConfProcess.php' class = 'clsDelete'>
                                                    <input type = 'hidden' name = 'clsName' value = '$rowCls[clsName]'>
                                                    <input name = 'operation' type = 'hidden' value = 'Delete'>
                                                    <button type = 'button' class = 'btn red pull-right' onclick = 'deleteClass($countStd)'>Delete</button>
                                                </form>
                                            </td>

                                        </tr>
                                        
                                        ";

                                        echo "
                                    
                                    <div class='modal' id = 'modal-classConf-delete$countStd'>
                                    <div class='modal-dialog' role='document'>
                                        <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title'>Confirmation</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'>
                                            <span aria-hidden='true'></span>
                                            </button>
                                        </div>
                                        <div class='modal-body'>
                                            <p>Are you confirm to delete this class?</p>
                                        </div>
                                        <div class='modal-footer'>
                                            <button type='button' class='btn btn-primary' onclick = 'deleteForm($countStd)'>Confirm</button>
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