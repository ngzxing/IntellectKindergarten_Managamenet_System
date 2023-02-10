<?php

include 'parentsession.php'; 
include("dbconnect.php");


  $pic = $_POST['pic'];
  $oldpassword = md5($_POST['oldpassword']);
  $ppassword = md5($_POST['ppassword']);
  $confirm_password = md5($_POST['confirm_password']);

  $sql = "SELECT parent_pwd FROM parent where parent_ic='$pic'";
  $result=mysqli_query($con,$sql);
  $row = mysqli_fetch_array($result);

  if($row["parent_pwd"] == $oldpassword)
  {
   $sql=mysqli_query($con,"UPDATE parent set parent_pwd=' $ppassword', parent_conPwd = '$confirm_password'  where parent_ic='$pic'");
    header('location: parentprofile.php');
  }
  else
  {
    echo 'fuck';
 
  }



  mysqli_close($con);

 

  ?>