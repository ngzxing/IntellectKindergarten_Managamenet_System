<?php

include "dbconnect.php";


if(isset($_POST["editing"])){

    $query = "UPDATE Announcement SET annTitle = '$_POST[title]', annText = '$_POST[tiny]' WHERE annID = '$_POST[editing]' ";
}
else{

    $query = "INSERT INTO Announcement VALUES(NULL,NULL, '$_POST[title]', '$_POST[tiny]', 0, '$_SESSION[tIC]') ";
}

mysqli_query($con, $query);
mysqli_close($con);

header("location:announcementEdit.php");

?>