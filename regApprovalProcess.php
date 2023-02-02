<?php

include "sessionTeac.php";
include "dbconnect.php";

$operation = $_POST["operation"];
$rID = $_POST["rID"];
$stdMKN = $_POST["stdMKN"];

if($operation == "Cancel" ){

    $query = "  UPDATE Student SET stdRegStatus = 0 WHERE stdMKN = '$stdMKN' ";
    mysqli_query($con, $query);
    $query = "DELETE FROM RegApp WHERE rID = '$rID'";
    mysqli_query($con, $query);

}elseif($operation == "Reject"){

    $query = " DELETE FROM Student WHERE stdMKN = '$stdMKN' ";
    mysqli_query($con, $query);
    $query = "DELETE FROM RegApp WHERE rID = '$rID'";
    mysqli_query($con, $query);

}elseif($operation == "Accept"){

    $clsName = $_POST["clsName"];
    echo $clsName;
    $query = "DELETE FROM RegApp WHERE rID = '$rID' ";
    mysqli_query($con, $query);
    $query = "UPDATE Student SET stdRegStatus = 2, clsName = '$clsName' WHERE stdMKN = '$stdMKN' ";
    mysqli_query($con, $query);

}

mysqli_close($con);
header("location:regApproval.php");

?>