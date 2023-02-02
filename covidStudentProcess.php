<?php

include "dbconnect.php";
include "sessionParent.php";

$stdMKN = $_POST["stdMKN"];
$csDate = $_POST["csDate"];
$csTemperature = $_POST["csTemperature"];
$csStatus = $_POST["csStatus"];

$target_dir = "covidStatusImg/";
$target_file = $target_dir . basename($_FILES["csPhoto"]["name"]);
move_uploaded_file($_FILES["csPhoto"]["tmp_name"], $target_file);


$sql = "SELECT * FROM stdcovid WHERE stdMKN = '$stdMKN' AND csDate = '$csDate'";
$result = mysqli_query($con, $sql);
$count = mysqli_num_rows($result);

if($count != 0){
    $query = "UPDATE stdcovid 
            SET csTemperature = '$csTemperature', csStatus = '$csStatus', csPhoto = '$target_file'
            WHERE stdMKN = '$stdMKN' AND csDate = '$csDate'";
}else{
    $query = "INSERT INTO stdcovid VALUES('', '$csDate', '$stdMKN' ,'$target_file', '$csTemperature',  '$csStatus')";
}

mysqli_query($con, $query);
mysqli_close($con);


header("location: covidStudent.php");
?>