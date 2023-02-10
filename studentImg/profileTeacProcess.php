<?php

include "dbconnect.php";

$tName = $_POST['tName'];
$tIC = $_POST['tIC'];
$tPhone = $_POST['tPhone'];
$tEmail = $_POST['tEmail'];
$tAddress = $_POST['tAddress'];
$tCity = $_POST['tCity'];
$tState = $_POST['tState'];
$tPostcode = $_POST['tPostcode'];
$tBank = $_POST['tBank'];
$tBankAccount = $_POST['tBankAccount'];
$tEPF = $_POST['tEPF'];


$query = "UPDATE teacher SET 
        tName = '$tName', tPhone = '$tPhone', tEmail = '$tEmail', tAddress = '$tAddress', 
        tCity = '$tCity', tState = '$tState', tPostcode = '$tPostcode', tBank = '$tBank', 
        tBankAccount = '$tBankAccount', tEPF = '$tEPF' WHERE tIC = '$tIC'";
mysqli_query($con, $query);

header('location:profileTeac.php');

?>