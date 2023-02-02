<?php

include "dbconnect.php";
include "sessionTeac.php";

$stdMKN = $_POST["stdMKN"];
$pIC = $_POST["pIC"];
$datetime = $_POST["datetime"];

$convertDatetime = date("Y-m-d h:i:a", strtotime($datetime));
$aorp = date("a", strtotime($datetime));

$convertDatetime[17] = 0;
$convertDatetime[18] = 0;

if($aorp == "pm"){

    $hour = strval($convertDatetime[11]*10 + $convertDatetime[12] + 12);
    $convertDatetime[11] = $hour[0];
    $convertDatetime[12] = $hour[1];
}

$query = "INSERT INTO RegApp VALUES(NULL, '$_SESSION[tIC]', '$stdMKN', '$convertDatetime')";
mysqli_query($con, $query);

$query = "UPDATE Student SET stdRegStatus = 1 WHERE stdMKN = '$stdMKN'";
mysqli_query($con, $query);

mysqli_close($con);

header("location:appointment.php");

?>