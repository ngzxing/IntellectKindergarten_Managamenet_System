<?php

$period = $_POST["period"];
$year = $_POST["year"];
$ptName = $_POST["ptName"];
$clsName = $_POST["clsName"];

session_start();
$_SESSION["assest_session_id"] = session_id();
$_SESSION["period"] = $period;
$_SESSION["year"] = $year;
$_SESSION["clsName"] = $clsName;
$_SESSION["ptName"] = $ptName;


if($ptName == "subject"){

    header("location:assestSubject.php");
}
else{

    header("location:assestIndex.php");
}



?>