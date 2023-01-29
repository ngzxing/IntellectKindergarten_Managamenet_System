<?php

include "dbconnect.php";

if(isset($_POST["editing"])){

    $query = "UPDATE activity SET actTitle = '$_POST[title]', actDesc = '$_POST[tiny]', clsName = '$_POST[clsName]' WHERE actID = '$_POST[editing]'";
}
elseif (isset($_POST["deleting"])){

    $query = "DELETE FROM activity WHERE actID = '$_POST[deleting]' ";
}
else{

    $query = "INSERT INTO activity VALUES(NULL, NULL, '$_POST[title]', '$_POST[tiny]','$_SESSION[tIC]', '$_POST[clsName]')";
}

mysqli_query($con, $query);
mysqli_close($con);

header("location:activityPostTeac.php");

?>