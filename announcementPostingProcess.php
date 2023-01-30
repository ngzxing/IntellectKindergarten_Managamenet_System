<?php

if(!session_id()){

    session_start();
}

if( !isset($_SESSION["teac_session_id"]) && !isset($_SESSION["admin_session_id"]) )  {

    header("location:login.php");
}
include "dbconnect.php";

$query = "UPDATE Announcement SET annStatus = 0 ";
mysqli_query($con, $query);

if( isset($_POST["post"]) ){

foreach( $_POST["annStatus"] as $annID){

    $query = "UPDATE Announcement SET annStatus = 1 WHERE annID = '$annID' ";
    mysqli_query($con, $query);
}

}
else{

    foreach( $_POST["annStatus"] as $annID){

        $query = "DELETE FROM Announcement WHERE annID = '$annID' ";
        mysqli_query($con, $query);
    }

    
}
mysqli_close($con);
header("location:announcementEdit.php");

?>