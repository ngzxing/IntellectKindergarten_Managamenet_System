<?php

  include ("headerMain.php");
  include "dbconnect.php";
?>

<script>    

        function addChild(){

            $("#modal-regStd-add").modal("show");
            
        }

        function addChildForm(){

            document.getElementById("parent-settings").submit();
        }

</script>



<div class="modal" id = "modal-regStd-add">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-labelledby="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you confirm to register this kid as student?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick = "addChildForm()">Confirm</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<div class="breadcrumb-section">
  <div class="container">
    <div class="row">
      <header class="entry-header">
        <h1 class="entry-title">Register</h1>
      </header>
    </div> 
  </div>
</div>

<div class="page-spacer clearfix">
  <div id="primary" class="content-area">
    <div class="container">
      <div class="row">
        <main id="main" class="site-main col-xs-12">

            <?php

            if(isset($_POST["state"])){

            echo '
                <div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Oh snap!</strong> <a href="#" class="alert-link">Change a few things up</a> and try submitting again.
                </div>';
            }

            ?>

          <div class="col-xs-12 col-sm-12 register-form form clearfix">
            <h3>Register Student</h3>

              <form name="registerForm" id="parent-settings" class="student-settings" method="post" action = "registerStudentProcess.php" enctype="multipart/form-data">
                
                <?php $pIC = $_POST['pIC']; echo " <input name = 'pIC' value = '$pIC' type = 'hidden'></input>"; ?>
                <label>My Kid Number <input name="stdMKN" value="" type="text" required></label>
                <label>Name <input name="stdName" value="" type="text" required></label>
                <label>Age 
                    <input name="stdAge" value="" type="number" class = "form-control" required>
                </label>
                <label>Gender
                    <select name = "stdGender" class="form-control" id="select">
                        <option value = 0> Female </option>
                        <option value = 1> Male </option>
                    </select>
                </label>
                <label>Date Of Birth
                    <input name="stdDOB" value="" type="date"  class = "form-control" required>
                </label>
                <label>Favor Color <input name="stdFavorColor" value="" type="text" required></label>
                <label>Diapers 
                    <select name = "stdDiapers" class="form-control" id="select">
                        <option value = 0> No </option>
                        <option value = 1> Yes </option>
                    </select>
                </label>
                <label>Program
                    <select name = "stdProgram" class="form-control" id="select">
                        <?php

                            $query = "SELECT prgName FROM Program";
                            $result = mysqli_query($con, $query);

                            while( $row = mysqli_fetch_array($result) ){

                                echo "<option value = $row[prgName]> $row[prgName] </option>";

                                echo "
                                

                                
                                ";
                            }
                            
                            mysqli_close($con);
                        ?>                        
                    </select>
                </label>
                <label>Session
                    <select name = "stdSession" class="form-control" id="select">
                        <option value = "M"> Morning </option>
                        <option value = "A"> Afternoon </option>
                        <option value = "MA"> Morning and Afternoon</option>
                    </select>
                </label>
                <label>Meal
                    <select name = "stdMeal" class = "form-control" id="select">
                        <option value = "M"> Morning </option>
                        <option value = "A"> Afternoon </option>
                        <option value = "MA"> Morning and Afternoon</option>
                        <option value = "N"> Don't Need</option>
                    </select>
                </label>
                <label>Photo <input name="stdPhoto" value="" type="file" class="form-control"  required></label>

                <?php echo "<input name = 'nextPage' value = $_POST[nextPage] type = 'hidden'>" ?>

                <button class="btn btn-default pull-right" type="button" onclick = "addChild()">Next</button>
              </form>


          </div> 
        </main>
      </div> 
    </div> 
  </div>
</div>



<?php

  include ("footerMain.php");

?>


<!-- External JavaScripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/vendors/bootstrap/js/popper.min.js"></script>
<script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
<!-- <script src="assets/vendors/bootstrap-select/bootstrap-select.min.js"></script> -->
<script src="assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
<script src="assets/vendors/magnific-popup/magnific-popup.js"></script>
<script src="assets/vendors/counter/waypoints-min.js"></script>
<script src="assets/vendors/counter/counterup.min.js"></script>
<script src="assets/vendors/imagesloaded/imagesloaded.js"></script>
<script src="assets/vendors/masonry/masonry.js"></script>
<script src="assets/vendors/masonry/filter.js"></script>
<script src="assets/vendors/owl-carousel/owl.carousel.js"></script>
<script src='assets/vendors/scroll/scrollbar.min.js'></script>
<!-- <script src="assets/js/functions.js"></script> -->
<script src="assets/vendors/chart/chart.min.js"></script>
<script src="assets/js/admin.js"></script>
<script src='assets/vendors/switcher/switcher.js'></script>