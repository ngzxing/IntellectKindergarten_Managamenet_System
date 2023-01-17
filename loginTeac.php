<?php

  include "headerMain.php";

?>

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

<div class="col-xs-12 col-sm-6 login-form form">

  <h3>Login</h3>
  <form name="loginForm" id="login" method="post" action = "loginTeacProcess.php">
    <label> Teacher IC:
    <input name="ic" value="" type="text" required></label>
    <label> Password:
    <input name="password" value="" type="password" required> </label>
    <p> Don't have an account? <a href="registerParent.php">Create an Account</a> now! </p>
    <label><a href="login.html#">Forgot Password?</a></label>

    <input name="submit" id="submit" class="btn btn-default" value="Log In" type="submit">
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