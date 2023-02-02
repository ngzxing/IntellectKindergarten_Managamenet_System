<?php
   session_start();
   include 'headermain.php';
?>


<div class="page-spacer clearfix">
<div id="primary" class="content-area">
<div class="container">

<div class="row">
<main id="main" class="site-main col-xs-12">

<?php

  if( isset($_SESSION["reset_sending_state"]) ){

    if( $_SESSION["reset_sending_state"] == 1 ){

    echo '
      <div class="alert alert-dismissible alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Oh snap!</strong> <a href="#" class="alert-link">Change a few things up</a> and try submitting again.
      </div>';

    }elseif( $_SESSION["reset_sending_state"] == 0 ){

    echo '
      <div class="alert alert-dismissible alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Oh snap!</strong> <a href="#" class="alert-link">Change a few things up</a> and try submitting again.
      </div>';


    }

    unset($_SESSION["reset_sending_state"]);
  }

  
?>

<div class="col-xs-12 col-sm-6 login-form form">

  <h3>Reset Password</h3>
  <form id = 'forgetForm' method="post" action = "resetProcess.php">
    <label> Your Password:
    <input name="password" value="" type="password" required></label>
    <input name="submit" id="submit" class="btn btn-default" value="submit" type="submit">
  </form>
</div> 
</main>
</div> 
</div> 
</div>
</div>
  
   
<?php

include "footerMain.php";
?>