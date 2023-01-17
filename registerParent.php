<?php

  include ("headerMain.php");
?>

<head>
<script>

  function validateForm(){

    let password = document.forms["registerForm"]["password"].value;
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
            <h3>Register Parent</h3>
            
              <form name="registerForm" id="parent-settings" class="student-settings" method="post" action = "registerParentProcess.php"  onsubmit = "return validateForm();">

                <label>Name <input name="name" value="" type="text" required></label>
                <label>Identity Card <input name="ic" value="" type="text" required></label>
                <label>Address <input name="address" value="" type="text" required></label>
                <label>City <input name="city" value="" type="text" required></label>
                <label>Postcode<input name="postcode" value="" type="text" required></label>
                <label>State <input name="state" value="" type="text" required></label>
                <label>Occupation <input name="occupation" value="" type="text" required></label>
                <label>Email <input name="email" value="" type="text" required></label>
                <label>Password: <input name="password" value="" type="password" required></label>
                <label>Confirm Password: <input name="confirm_password" value="" type="password" required></label>

                <p>Already have an account? <a href="loginParent.php">Login to your account</a>!</p>
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


  