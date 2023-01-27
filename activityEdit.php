<?php

include "leftSideBarTeac.php";
include "dbconnect.php";
?>

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

    <main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Student List</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Announcement Editor</li>
				</ul>
			</div>	
			<div class="row">
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
                            
							<h4>Announcement Editor</h4>

                            <form id = "form-select" method = "post" action = "activityEditProcess.php" >
                            <div class = "row mt-5">
                            <div class = "col-lg-2"><label><select name = "clsName" id = "selectClass">

                            <?php
                            
                            $query = "SELECT DISTINCT clsName FROM SubjectsTeac WHERE tIC = $_SESSION[tIC]";
                            $result = mysqli_query($con, $query);

                            while( $row = mysqli_fetch_array($result)){

                                
                                echo"
                                
                                <option value = '$row[clsName]'> $row[clsName]</option>
                                ";
                                
                            }
                            
                           
                            ?>
                            </select></label></div>
                            </div>
                            


						</div>

                        <div class="widget-inner">                    
                        

                            <h1>Title</h1>
                            
                            <input id="title" name = "title" type = text class = "form-control">

						</div>

						<div class="widget-inner">                    
                        

                            <h1>Body</h1>
                            
                            <textarea id="tiny" name = "tiny">Hello, World!</textarea>
                            <button type="submit" class="mt-5 mx-3 btn btn-success">Submit</button>
        
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