<?php

include "sessionStaff.php";
include "dbconnect.php";
?>

<!--Main container start -->
<main class="ttr-wrapper">
<div class="container-fluid">
    <div class="db-breadcrumb">
        <h4 class="breadcrumb-title">Activity</h4>
        <ul class="db-breadcrumb-list">
            <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
            <li>Activity</li>
        </ul>

    </div>	

    <div class="row">

            <div class='col-lg-12 m-b30'>

                <script>
                    
                    function changeClass(){

                        document.getElementById("form-select").submit();
                    }
                </script>

                <div class='widget-box '>
                    <div class='wc-title'>
                    <form id = "form-select" method = "post" action = "activityPostTeac.php" >
                    <div class=' row'> 
								<label class='col-sm-2 col-form-label'>Select Class</label>
								<div class='col-sm-8'><select name = "clsName" id = "selectClass" onchange = "changeClass();">

                            <?php
                            
                            $query = "SELECT DISTINCT clsName FROM SubjectsTeac WHERE tIC = $_SESSION[tIC]";
                            $result = mysqli_query($con, $query);

                            while( $row = mysqli_fetch_array($result)){

                                if(!isset($_POST["clsName"])){

                                    $_POST["clsName"] = $row["clsName"];
                                }

                                echo"
                                
                                    <option value = '$row[clsName]'
                                ";

                                if( $_POST["clsName"] == $row["clsName"]){

                                echo"
                                    
                                    selected
                                ";
                                }

                                echo"

                                > $row[clsName]</option>
                                ";
                                
                            }
                            
                           
                            ?>
                            </select></div>
                            
                            <div class = "col-lg-2">
                            <a class = "btn btn-primary" href = "activityEdit.php"> Add Activity</a>
                            </div>
         
        
                            
                    </form>
                    </div>
                </div>
            </div>   

                
        </div>

            <?php
                
            $queryPost = "SELECT * FROM Activity WHERE clsName = '$_POST[clsName]' ORDER BY actID DESC";
            $resultPost = mysqli_query($con, $queryPost);

            while( $rowPost = mysqli_fetch_array($resultPost)){

                echo "

                <div class='col-lg-12 m-b30'>
                <div class='widget-box'>
                    <div class='wc-title'>
                    <div class = 'row'>
                        <div class = 'col-lg-8'>
                        <h3>$rowPost[actTitle]</h3>
                        <time>$rowPost[actDate]</time>
                        </div>
                        <div class = 'col-lg-4 mt-2'>
                        <form method = 'post' action = 'activityEdit.php'>
                        <button class = 'btn red pull-right ' name = 'editing' value = '$rowPost[actID]' type = 'submit'>Edit</button>
                        </form>
                        </div>
                    </div>
                    </div>
                    <div class='widget-inner'>
                        $rowPost[actDesc]
                    </div>

                </div>
                </div>
                
                ";
            }
            
            ?>
                
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
<script src='assets/vendors/calendar/moment.min.js'></script>
<script src='assets/vendors/calendar/fullcalendar.js'></script>
<script src='assets/vendors/switcher/switcher.js'></script>
<script>

</body>

<!-- Mirrored from educhamp.themetrades.com/demo/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Feb 2019 13:09:05 GMT -->
</html>