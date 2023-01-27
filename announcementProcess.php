<?php

include "sessionTeac.php";
include "dbconnect.php";

$query = "INSERT INTO Announcement VALUES(NULL,NULL, '$_POST[title]', '$_POST[tiny]', 0, '$_SESSION[tIC]') ";
mysqli_query($con, $query);
mysqli_close($con);

header("location:announcementEdit.php");

?>