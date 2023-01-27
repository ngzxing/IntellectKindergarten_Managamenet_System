<?php

include "dbconnect.php";
include "sessionAssest.php";

$iPerID = unserialize($_POST["iPerID"]);
$performanceID = $_POST["performanceID"];

$count = 0;
foreach( $iPerID as $id){

    $value = $_POST[$iPerID[$count]];
    $query = "UPDATE performComment SET pcComment = '$value'  WHERE iPerID = '$id' AND performanceID = '$performanceID' ";
    mysqli_query($con, $query);

    $count+=1;
}

?>