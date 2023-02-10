<?php

include "sessionAssest.php";
include "sessionStaff.php";
include "dbconnect.php";

?>

<script>    

        function editAss(id){

            
            $("#modal-assIndex-edit".concat(id)).modal("show");
            


        }

        function editForm(id){
            
            document.getElementsByClassName("edit-assetSub")[id].submit();
        }

</script>


	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Assessment Index</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Assessment Index</li>
				</ul>
			</div>	
			<div class="row">
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Assessment Index</h4>
						</div>

                
						<div class="widget-inner">
                    
                            <table class="table table-striped table-hover ">
                                <thead>
                                    <tr>
                                    <th>Student</th>
                                    <th><?php echo "$_SESSION[ptName]" ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                        
                                <?php
                                
                                $query = "SELECT * FROM Student WHERE clsName = '$_SESSION[clsName]' ";
                                $result = mysqli_query($con, $query);
                                $count = 0;

                                
                                while($row = mysqli_fetch_array($result)){

                                

                                    echo "
                                    
                                    <tr>
                                    <td class = 'text-center'>$row[stdName]</td>
                                    <td><form method = 'POST' action = 'assestIndexStudent.php' class = 'form-group edit-assetSub'>
                                        <input type = 'hidden' value = '$row[stdMKN]' name = 'stdMKN' class = 'form-control'>
                                        <input type = 'hidden' value = '$row[stdName]' name = 'stdName' class = 'form-control'>
                                        <input type = 'submit' class = 'btn green pull-right' value = 'Edit'>
                                    </form></td>
                                    </tr>
                                    
                                    ";

                                    echo "
                                    
                                    <div class='modal' id = 'modal-assIndex-edit$count'>
                                    <div class='modal-dialog' role='document'>
                                        <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title'>Confirmation</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'>
                                            <span aria-hidden='true'></span>
                                            </button>
                                        </div>
                                        <div class='modal-body'>
                                            <p>Are you confirm to edit this assest subject?</p>
                                        </div>
                                        <div class='modal-footer'>
                                            <button type='button' class='btn btn-primary' onclick = 'editForm($count)'>Confirm</button>
                                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    
                                    
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