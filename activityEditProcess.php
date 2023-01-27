<?php

include "sessionTeac.php";
include "dbconnect.php";

$query = "INSERT INTO activity VALUES(NULL, NULL, '$_POST[title]', '$_POST[tiny]','$_SESSION[tIC]', '$_POST[clsName]')";
mysqli_query($con, $query);
mysqli_close($con);

header("location:activityEdit.php");

?>