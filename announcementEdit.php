<?php

include "leftSideBarTeac.php";
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
				<div class="col-lg-9 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Announcement Editor</h4>
						</div>

                        <form id = "editor" method="post" action = "announcementProcess.php" class="form-horizontal">
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

                <div class="col-lg-3 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Posting</h4>
						</div>

						<div class="widget-inner">                    
                        
                            <form id = "posting" method="post" action = "announcementPostingProcess.php">
                            <table class="table table-striped table-hover ">
                            <tr>

                                <th>Title</th>
                                <th>Post</th>
                            </tr>

                            <?php

                            $query = "SELECT * FROM Announcement ORDER BY annID DESC";
                            $result = mysqli_query($con, $query);

                            while( $row = mysqli_fetch_array($result) ){

                            echo "
                            
                            <tr><td><a btn btn-link href = 'announcement.php?annID=$row[annID]'>$row[annTitle]</a></td>

                            ";
                            
                            if($row["annStatus"] == 1){

                            echo "
                                <td><input type = 'checkbox' value = '$row[annID]' name = 'annStatus[] ' checked ></td></tr>
                            ";

                            }else{
                            
                            echo "
                                <td><input type = 'checkbox' value = '$row[annID]' name = 'annStatus[] ' ></td></tr>
                            ";
                            }

                            }

                            ?>
                            </table>
                            <button type="submit" class="mt-5 mx-3 btn btn-success">Submit</button>
                            </form>

                   

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