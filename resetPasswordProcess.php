<?php

session_start();
include "dbconnect.php";

$newPassword = $_POST["newPassword"];
$confirmPassword = $_POST["confirmPassword"];

if( $newPassword == $confirmPassword){

    $passwordHash = password_hash( $newPassword, PASSWORD_DEFAULT);

    if($_SESSION["forget_who"] == "parent" ){

        $queryUpdate = "UPDATE Parent SET pPassword = '$passwordHash' WHERE pIC = '$_POST[IC]' ";

    }else{

        $queryUpdate = "UPDATE Teacher SET tPassword = '$passwordHash' WHERE tIC = '$_POST[IC]' ";
    }

    mysqli_query($con, $queryUpdate);

    $queryDelete = "DELETE FROM Token WHERE email = '$_SESSION[forget_email]' AND tokenID = '$_POST[tokenID]' ";
    mysqli_query($con, $queryDelete);

    unset($_SESSION["forget_email"]);
    unset($_SESSION["forget_who"]);

    mysqli_close($con);
    header("location:login.php");

}else{

    $_SESSION['forget_confirm_state'] = 0;
    header("location:resetPassword.php?token=$_POST[tokenID]");
}

mysqli_close($con);


?>