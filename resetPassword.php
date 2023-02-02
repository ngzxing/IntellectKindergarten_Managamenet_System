<?php
   session_start();

   if( !(isset($_SESSION["forget_email"]) && isset($_GET["token"]) && isset($_SESSION["forget_who"]) ) ){

	header("location:404-error.php");
	}

   include 'dbconnect.php';


$queryGot = "SELECT * FROM Token Where email = '$_SESSION[forget_email]' AND tokenID = '$_GET[token]' AND `time`>=NOW() ";
$result = mysqli_query($con, $queryGot);
$num = mysqli_num_rows($result);


if($num != 0){

	include 'headermain.php';

	echo"
	<div class='page-spacer clearfix'>
	<div id='primary' class='content-area'>
	<div class='container'>

	<div class='row'>
	<main id='main' class='site-main col-xs-12'>
	";

	if( isset($_SESSION["forget_confirm_state"]) ){

		echo "
		  <div class='alert alert-dismissible alert-danger'>
			<strong>Oh snap!</strong> <a href='#' class='alert-link'>Change a few things up</a> and try submitting again.
		  </div>
		  ";
	
		unset($_SESSION["forget_confirm_state"]);
	}


	if($_SESSION["forget_who"] == 'parent'){

		$queryPIC = "SELECT * FROM Parent WHERE pEmail = '$_SESSION[forget_email]' ";
		$IC = mysqli_fetch_array(mysqli_query($con, $queryPIC))['pIC'];

	}else{

		$querytIC = "SELECT * FROM Teacher WHERE tEmail = '$_SESSION[forget_email]' ";
		$IC = mysqli_fetch_array(mysqli_query($con, $querytIC))['tIC'];
	}
	
	
	echo "
	<div class='col-xs-12 col-sm-6 login-form form'>

	<h3>Reset Password</h3>
	<form  id='resetForm' method='post' action = 'resetPasswordProcess.php'>
		<label> New Password:
		<input name='newPassword' value='' type='password' required></label>
		<label> Confirm Password:
		<input name = 'confirmPassword' value='' type='password' required></label>
		<input type = 'hidden' name = 'IC'  value = '$IC'>
		<input type = 'hidden' name = 'tokenID'  value = '$_GET[token]'>
		<input name='submit' id='submit' class='btn btn-default' value='submit' type='submit'>
	</form>
	</div> 
	";


	$queryDelete = "DELETE FROM Token WHERE `time`<NOW() ";
	mysqli_query($con, $queryDelete);

	mysqli_close($con);


}else{

	header("location:404-error.php");
}

?>

</main>
</div> 
</div> 
</div>
</div>
  
   
<?php

include "footerMain.php";
?>