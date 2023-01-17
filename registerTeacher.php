<?php

  include ("headerMain.php");
?>

<head>
<script>

  function validateForm(){

    let password = document.forms["registerForm"]["tPassword"].value;
    let confirm_password = document.forms["registerForm"]["confirm_password"].value;

    if( password != confirm_password){

      event.preventDefault();
      alert("Password Does Not Match!");
      return false;
    }

    return true;
  }

</script>
</head>

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
            <h3>Register Teacher</h3>
            
              <form name="registerForm" id="parent-settings" class="student-settings" method="post" action = "registerTeacherProcess.php"  onsubmit = "return validateForm();" enctype="multipart/form-data">

                <label>Name <input name="tName" value="" type="text" required></label>
                <label>Identity Card <input name="tIC" value="" type="text" required></label>
                <label>Address <input name="tAddress" value="" type="text" required></label>
                <label>City <input name="tCity" value="" type="text" required></label>
                <label>Postcode<input name="tPostcode" value="" type="text" required></label>
                <label>State <input name="tState" value="" type="text" required></label>
                <label>Phone <input name="tPhone" value="" type="text" required></label>
                <label>Email <input name="tEmail" value="" type="email" required></label>
                <label>Photo <input name="tPhoto" value="" type="file" class="form-control"  required></label>
                <label>Password <input name="tPassword" value="" type="password" required></label>
                <label>Confirm Password: <input name="confirm_password" value="" type="password" required></label>

                <p>Already have an account? <a href="login.php">Login to your account</a>!</p>
                <input name="submit" class="btn btn-default pull-right" value="Create an Account" type="submit">
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


  