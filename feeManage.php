<?php

include "sessionAdmin.php";
include "sessionStaff.php";
include "dbconnect.php";


?>

<script>    

function dropItem(id){

    $("#modal-feeManage-drop".concat(id)).modal("show");
    
}

function addItem(){

    $("#modal-feeManage-add").modal("show");

}

function dropForm(id){

    if(!checkvalid(id)){

        alert("unable to drop");
    }else{

        alert('Drop Successfully');
    document.getElementsByClassName("dropItem-form")[id].submit()
    };
}

function addForm(){

    document.getElementById("addItem-form").submit();
}

</script>

<div class="modal" id = "modal-feeManage-add">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you confirm to add this item?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick = "addForm()">Confirm</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Fee</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Fee</li>
				</ul>
			</div>	
			<div class="row">
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Fee Item List</h4>
						</div>

                    
						<div class="widget-inner">

                            <table class="table table-striped table-hover ">

                                <thead>
                                    <tr>
                                    <th>#</th>
                                    <th>Item no.</th>
                                    <th>Item</th>
                                    <th>Fee</th>
                                    <th>Description</th>
                                    <th>Drop Item</th>
                                    </tr>
                                </thead>
                                <tbody>
                            
                            <?php
                                $query = "SELECT * FROM programsyllabus";
                                $result = mysqli_query($con, $query);
                                $count = 1;    
                                $countStd = 0;                            
                                while( $row = mysqli_fetch_array($result)){
                                    
                                    echo "

                                    <tr>
                                    <td>$count</td>
                                    <td>$row[prgsID]</td>
                                    <td>$row[prgsItem]</td>
                                    <td>$row[prgsFee]</td>
                                    <td>$row[prgsDesc]</td>
                                    <td>
                                    ";

                                    if($count>17){

                                    echo "
                                    <form name = 'dropItemForm' method = 'post' action = 'feeDrop.php'  class = 'dropItem-form'>
                                    <input name = 'prgsID' value = '$row[prgsID]' type = 'hidden' class = 'prgsID'>
                                    <label><button type = 'button' class = 'btn btn-danger' onclick = 'dropItem($countStd)'>DROP</button></label>
                                    </form>
                                    ";

                                    }

                                    echo"
                                    </td>                                    
                                    </tr>
                                
                                    ";

                                    echo "
                                    
                                    <div class='modal' id = 'modal-feeManage-drop$countStd'>
                                    <div class='modal-dialog' role='document'>
                                        <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title'>Confirmation</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'>
                                            <span aria-hidden='true'></span>
                                            </button>
                                        </div>
                                        <div class='modal-body'>
                                            <p>Are you confirm to drop this item?</p>
                                        </div>
                                        <div class='modal-footer'>
                                            <button type='button' class='btn btn-primary' onclick = 'dropForm($countStd)' >Confirm</button>
                                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    
                                    ";
                                    $countStd+=1;
                                    $count+=1;
    
                                }
                                
                                mysqli_close($con);
                            ?>
                                
                                </tbody>
                            </table>
                            
                            <hr>
                            <form method = "post" action = "feeAdd.php" id = "addItem-form">
                                
                            <h5>ADD Item</h5>
                                <div class="form-group row"> 
                                <label class="col-sm-2 col-form-label">Item</label>
                                <div class="col-sm-8">
                                <input name="prgsItem" type="text" class = "form-control">
                                </div>
                                </div>

                                <div class="form-group row"> 
                                <label class="col-sm-2 col-form-label">Item Price</label>
                                <div class="col-sm-8">
                                <input name="prgsFee" type="number" step="0.01" class = "form-control">
                                </div>
                                </div>

                                <div class="form-group row"> 
                                <label class="col-sm-2 col-form-label">Item Description</label>
                                <div class="col-sm-8">
                                <textarea name="prgsDesc" type="text" class = "form-control"></textarea>
                                </div>
                                </div>

                                <div class="">
									<div class="">
										<div class="row">
											<div class="col-sm-2">
											</div>
											<div class="col-sm-7">
												<button type="button" class="btn green" onclick = "addItem()">Add Item</button>
												<button type="reset" class="btn-secondry">Cancel</button>
											</div>
										</div>
									</div>
								</div>
                            </form>

						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<div class="ttr-overlay"></div>


<script>
function checkvalid(id){

    let prgsID = document.getElementsByClassName('prgsID')[id].value;

    if((prgsID <= 17) && (prgsID >= 1)){
        
        return false;
    }else{
        
        return true;
    }
}

</script>

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