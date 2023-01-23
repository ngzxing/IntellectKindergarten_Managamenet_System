<?php

$period = $_POST["period"];
$year = $_POST["year"];
$ptName = $_POST["ptName"];
$clsName = $_GET["clsName"];

session_start();
$_SESSION["assest_session_id"] = session_id();
$_SESSION["year"] = $year;
$_SESSION["ptName"] = $ptName;
$_SESSION["clsName"] = $clsName;

if($ptName == "subject"){

    header("location:assestSubject.php");
}
else{

    header("location:assestIndex.php");
}



?>