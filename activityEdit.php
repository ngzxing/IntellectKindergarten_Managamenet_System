<?php

include "sessionStaff.php";
include "dbconnect.php";
?>

<script>    

    function submittedAct(){

        $("#modal-actEdit-submit").modal("show");

    }

    function edittedAct(){

        $("#modal-actEdit-edit").modal("show");

    }

    function deletedAct(){

        $("#modal-actEdit-delete").modal("show");

    }

    function submittedForm(){
        document.getElementById("operation").value = "submitting";
        document.getElementById("form-select").submit();
    }

    function edittedForm(){
        document.getElementById("operation").value = "editing";
        document.getElementById("form-select").submit();
    }

    function deletedForm(){

        document.getElementById("operation").value = "deleting";
        document.getElementById("form-select").submit();
    }

</script>

        <script src="js/tinymce.min.js" referrerpolicy="origin"></script>

        <script>
            
            tinymce.init({
            selector: 'textarea#tiny'
            });

            // Prevent Bootstrap dialog from blocking focusin
            document.addEventListener('focusin', (e) => {
            
                if (e.target.closest(".tox-tinymce, .tox-tinymce-aux, .moxman-window, .tam-assetmanager-root") !== null) {
                        e.stopImmediatePropagation();
                }
            });

          
           
        </script>

<div class="modal" id = "modal-actEdit-submit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you confirm to submit this activity?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick = "submittedForm()">Confirm</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Cancel</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id = "modal-actEdit-edit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you confirm to edit this activity?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick = "edittedForm()">Confirm</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Cancel</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id = "modal-actEdit-delete">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you confirm to delete this activity?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick = "deletedForm()">Confirm</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Cancel</button>
            </div>
        </div>
    </div>
</div>


    <body>

    <main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Activity Editor</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Activity Editor</li>
				</ul>
			</div>	
            <div class="row">
				<div class="col-lg-9 m-b30" style="width:100%;">
					<div class="widget-box" >
						<div class="wc-title" >
							<h4>Activity Editor</h4>
						</div>

                            <div class="widget-inner">
                            <form id = 'form-select' method = 'post' action = 'activityEditProcess.php' >

                            <?php
                            

                            $query = "SELECT DISTINCT clsName FROM SubjectsTeac WHERE tIC = $_SESSION[tIC]";
                            $result = mysqli_query($con, $query);

                            echo "
                            
                            
                            <div class=' row'> 
								<label class='col-sm-2 col-form-label'>Select Class</label>
								<div class='col-sm-8'><select name = 'clsName' id = 'selectClass'>
                            
                            ";

                            while( $row = mysqli_fetch_array($result)){

                                
                                echo"
                                
                                <option value = '$row[clsName]'> $row[clsName]</option>
                                ";
                                
                            }
                            
                            echo"
                            
                            </select></div></div>
                            
                            ";
                            
                            ?>
                        
                        </div>
                            
                        <div class="widget-inner">                    
                        

                            <h1>Title</h1>
                            
                        <?php
                            
                            if(!isset($_POST["editing"])){

                            echo"

                            <input id='title' name = 'title' type = text class = 'form-control'>
                            ";
                            }
                            else{
                            
                            $query = " SELECT * FROM Activity WHERE actID = '$_POST[editing]' ";
                            $result = mysqli_fetch_array(mysqli_query($con, $query));
                            
                            echo"

                                <input id='title' name = 'title' type = text class = 'form-control' value = '$result[actTitle]'>
                            ";
                            
                            }

                        ?>
						</div>

						<div class="widget-inner">                    
                        

                            <h1>Body</h1>
                            
                        <?php
                            if(!isset($_POST["editing"])){

                            echo "

                            <textarea id = 'tiny' name = 'tiny'>Hello, World!</textarea>
                            ";
                            }
                            else{

                            echo "
                            
                            <textarea id = 'tiny' name = 'tiny'>$result[actDesc]</textarea>
                            ";
                            }
                        
                        ?>
                        
                        <?php

                            if(!isset($_POST["editing"])){
                            
                            echo "
                            <input name = 'operation' id = 'operation' type = 'hidden'> 
                            <button type='button' class='mt-5 mx-3 btn btn-success' onclick = 'submittedAct()'>Submit</button>
                            ";
                            }
                            else{
                            
                            echo "
                            
                            <input name = 'operation' id = 'operation' type = 'hidden'>
                            <input name = 'actID' value = '$result[actID]' type = 'hidden'>
                            <button type='button' class = 'btn blue mt-5 mx-3' onclick = 'edittedAct()'>Edit</button>
                            <button type='button' class = 'btn red mt-5 mx-3'  onclick = 'deletedAct()'>Delete</button>
                            ";

                            }

                        ?>

						</div>
                        </form>

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


</html>