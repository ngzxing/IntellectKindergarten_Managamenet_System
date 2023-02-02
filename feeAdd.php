<?php

include "dbconnect.php";

$prgsItem = $_POST['prgsItem'];
$prgsFee = $_POST['prgsFee'];
$prgsDesc = $_POST['prgsDesc'];

$query = "INSERT INTO programsyllabus VALUES('NULL', '$prgsItem', '$prgsFee', '$prgsDesc')";
mysqli_query($con, $query);

header('location:feeManage.php');

?>