<?php

include "sessionAdmin.php";
include "dbconnect.php";

$period = $_POST["period"];
$date = $_POST["date"];
$year = $_POST["year"];

$query = "SELECT stdMKN FROM STUDENT WHERE stdRegStatus = 2";
$result = mysqli_query($con, $query);

while( $row = mysqli_fetch_array($result) ){


    $queryInsert = "INSERT INTO Performance VALUES(NULL, '$row[stdMKN]', '$period', '$year', '$date')";
    mysqli_query($con, $queryInsert);
}

mysqli_close($con);

header("location:adminAssestConf.php");

?>