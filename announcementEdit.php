<?php

include "sessionStaff.php";

?>

<script>    

    function submittedAnn(){

        $("#modal-annEdit-submit").modal("show");

    }

    function edittedAnn(){

        $("#modal-annEdit-edit").modal("show");

    }

    function postedAnn(){

        $("#modal-annEdit-post").modal("show");

    }

    function deletedAnn(){

        $("#modal-annEdit-delete").modal("show");

    }

    function submittedForm(){

        document.getElementById("editor").submit();
    }

    function edittedForm(){

        document.getElementById("editor").submit();
    }

    function deletedForm(){

        document.getElementById("operation").value = "delete";
        document.getElementById("formposting").submit();
    }

    function postedForm(){
        
        document.getElementById("operation").value = "post";
        document.getElementById("formposting").submit();
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


    <body>

<div class="modal" id = "modal-annEdit-submit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you confirm to submit this announcement?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick = "submittedForm()">Confirm</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Cancel</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id = "modal-annEdit-edit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you confirm to edit this announcement?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick = "edittedForm()">Confirm</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Cancel</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id = "modal-annEdit-post">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you confirm to post this announcement?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick = "postedForm()">Confirm</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Cancel</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id = "modal-annEdit-delete">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you confirm to reject this announcement?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick = "deletedForm()">Confirm</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Cancel</button>
            </div>
        </div>
    </div>
</div>

    <main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Announcement Editor</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Announcement Editor</li>
				</ul>
			</div>	
			<div class="row">
				<div class="col-lg-9 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Announcement Editor</h4>
						</div>

                        <form id = "editor" method="post" action = "announcementProcess.php" class="form-horizontal">
                        <div class="widget-inner">                    
                        

                            <h1>Title</h1>

                            <?php
                            
                            if(!isset($_GET["annID"])){

                            echo "
                            
                            <input id='title' name = 'title' type = text class = 'form-control'>
                            ";
                            }
                            else{

                            $queryAnn = "SELECT * FROM Announcement WHERE annID = '$_GET[annID]'";
                            $resultAnn = mysqli_fetch_array(mysqli_query($con, $queryAnn));

                            echo "
                            
                            <input id='title' name = 'title' type = text class = 'form-control' value = '$resultAnn[annTitle]'>
                            ";

                            }
                            
                            ?>
                            
                            

						</div>

						<div class="widget-inner">                    
                        

                            <h1>Body</h1>

                            <?php
                            
                            if(!isset($_GET["annID"])){

                            echo "
                            <textarea id='tiny' name = 'tiny'>Hello, World!</textarea>
                            <button type = 'button' class='mt-5 mx-3 btn btn-success' onclick = 'submittedAnn()'>Submit</button>
                            ";
                            }
                            else{
                            
                            echo "
                            <textarea id='tiny' name = 'tiny'>$resultAnn[annText]</textarea>
                            <input name = 'editing' value = '$_GET[annID]' type = 'hidden'> 
                            <button type='button' class='mt-5 mx-3 btn blue' value = '$_GET[annID]' onclick = 'edittedAnn()'>Edit</button>
                            ";

                            }

                            ?>
        
						</div>
                        </form>

					</div>
				</div>

                <script>

                    function unchecking(){

                        
                        let list = document.getElementsByClassName("checking")
                        for(let i = 0; i<list.length; i++){

                            list[i].checked = false;
                        }
                    }
                </script>

                <div class="col-lg-3 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Posting</h4>
						</div>

						<div id ="post-delete" class="widget-inner">

                            <label>uncheck&nbsp<input class ="checking" type = "radio" onchange = "unchecking()"></input></label>

                            <?php

                            echo "
                            
                            <form method='post' action = 'announcementPostingProcess.php' id = 'formposting'>
                            <table class='table table-striped table-hover '>
                            <tr>
                                <th>Title</th>
                                <th></th>
                            </tr>
                            ";

                            $query = "SELECT * FROM Announcement ORDER BY annID DESC";
                            $result = mysqli_query($con, $query);

                            while( $row = mysqli_fetch_array($result) ){

                            echo "
                            
                            <tr><td><a btn btn-link href = 'announcementEdit.php?annID=$row[annID]'>$row[annTitle]</a></td>
                            ";
                            
                            if($row["annStatus"] == 1){

                            echo "
                                <td><input class = 'checking' type = 'checkbox' value = '$row[annID]' name = 'annStatus[] ' checked ></td></tr>
                            ";

                            }else{
                            
                            echo "
                                <td><input class = 'checking' type = 'checkbox' value = '$row[annID]' name = 'annStatus[] ' ></td></tr>
                            ";
                            }

                            }

                            echo "</table>
                            
                            <div class = 'row'>
                                <input id = 'operation' type = 'hidden' name = 'operation'>
                                <div class = 'col-5'><button type = 'button' class = 'mt-5 btn green' onclick = 'postedAnn()'>Post</button></div>
                                <div class = 'col-7'><button  type = 'button' class = 'mt-5 btn red' onclick = 'deletedAnn()'>Delete</button></div>
                                
                            </div>
                            </form>
                            
                            "

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


</html>