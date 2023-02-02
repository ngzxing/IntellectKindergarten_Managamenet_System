<?php

if(!session_id()){

    session_start();
}

if( !isset($_SESSION["teac_session_id"]) && !isset($_SESSION["admin_session_id"]) )  {

    header("location:login.php");
}

include "dbconnect.php";

if($_POST["operation"] == "editing"){

    $query = "UPDATE activity SET actTitle = '$_POST[title]', actDesc = '$_POST[tiny]', clsName = '$_POST[clsName]' WHERE actID = '$_POST[actID]'";
}
elseif ($_POST["operation"] == "deleting"){

    $query = "DELETE FROM activity WHERE actID = '$_POST[actID]'";
}
elseif($_POST["operation"] == "submitting"){

    $query = "INSERT INTO activity VALUES(NULL, NULL, '$_POST[title]', '$_POST[tiny]','$_SESSION[tIC]', '$_POST[clsName]')";
}

mysqli_query($con, $query);
mysqli_close($con);

header("location:activityPostTeac.php");

?>