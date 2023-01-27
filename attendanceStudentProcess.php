<?php

include "dbconnect.php";
include "sessionParent.php";

$stdMKN = $_POST["stdMKN"];
$attDate = $_POST["attDate"];
$attExpect = $_POST["attExpect"];
$attReason = $_POST["attReason"];
echo $attDate;

$query = "SELECT * FROM attendanceStd WHERE stdMKN = '$stdMKN' AND attDate = '$attDate'";
$result = mysqli_query($con, $query);
$count = mysqli_num_rows($result);

if($count != 0){
    $query2 = "UPDATE attendancestd 
               SET attReason = '$attReason', attExpect = '$attExpect', attConfirm = '$attExpect' 
               WHERE stdMKN = '$stdMKN' AND attDate = '$attDate'";
    
}else{
    $query2 = "INSERT INTO attendancestd(attDate, stdMKN, attReason, attExpect, attConfirm)
                VALUES ('$attDate', '$stdMKN', '$attReason', '$attExpect', '$attExpect')";
}

mysqli_query($con, $query2);
mysqli_close($con);


header("location:attendanceStudent.php"); 
?>