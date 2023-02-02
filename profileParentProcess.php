<?php

include "dbconnect.php";

$pName = $_POST['pName'];
$pIC = $_POST['pIC'];
$phone = $_POST['phone'];
$pEmail = $_POST['pEmail'];
$pOccupation = $_POST['pOccupation'];
$pAddress = $_POST['pAddress'];
$pCity = $_POST['pCity'];
$pState = $_POST['pState'];
$pPostCode = $_POST['pPostCode'];

$query = "UPDATE parent SET 
        pName = '$pName', pEmail = '$pEmail', pOccupation = '$pOccupation', pAddress = '$pAddress', 
        pCity = '$pCity', pState = '$pState', pPostCode = '$pPostCode' WHERE pIC = '$pIC'";
mysqli_query($con, $query);


$sql = "SELECT * FROM pPhone WHERE pIC = '$pIC'";
$result = mysqli_query($con, $sql);
$count = mysqli_num_rows($result);

if($count == 0){
        $query2 = "INSERT INTO pPhone VALUES('$phone', '$pIC')";
}else{
        $query2 = "UPDATE pPhone SET phone = '$phone' WHERE pIC = '$pIC'";
}
mysqli_query($con, $query2);



header('location:profileParent.php');

?>