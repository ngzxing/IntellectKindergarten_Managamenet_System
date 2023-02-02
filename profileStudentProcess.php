<?php

include "dbconnect.php";

$stdName = $_POST['stdName'];
$stdMKN  = $_POST['stdMKN'];
$stdGender = $_POST['stdGender'];
$stdAge = $_POST['stdAge'];
$stdDOB = $_POST['stdDOB'];
$stdDiapers = $_POST['stdDiapers'];
$allergy = $_POST['allergy'];
$stdFavorColor = $_POST['stdFavorColor'];
$food = $_POST['food'];
$toy = $_POST['toy'];


$query = "UPDATE student SET 
        stdName = '$stdName', stdGender = '$stdGender', stdAge = '$stdAge', stdDOB = '$stdDOB', 
        stdDiapers = '$stdDiapers', stdFavorColor = '$stdFavorColor' WHERE stdMKN = '$stdMKN'";
mysqli_query($con, $query);

$sql = "SELECT * FROM stdallergy WHERE stdMKN = '$stdMKN'";
$result = mysqli_query($con, $sql);
$count = mysqli_num_rows($result);

if($count == 0){
        $query2 = "INSERT INTO stdallergy VALUES('$stdMKN', '$allergy')";
}else{
        $query2 = "UPDATE stdallergy SET allergy = '$allergy' WHERE stdMKN = '$stdMKN'";
}
mysqli_query($con, $query2);


$sql1 = "SELECT * FROM stdfavorfood WHERE stdMKN = '$stdMKN'";
$result1 = mysqli_query($con, $sql1);
$count1 = mysqli_num_rows($result1);

if($count1 == 0){
        $query3 = "INSERT INTO stdfavorfood VALUES('$stdMKN', '$food')";
}else{
        $query3 = "UPDATE stdfavorfood SET food = '$food' WHERE stdMKN = '$stdMKN'";
}
mysqli_query($con, $query3);


$sql2 = "SELECT * FROM stdfavortoy WHERE stdMKN = '$stdMKN'";
$result2 = mysqli_query($con, $sql2);
$count2 = mysqli_num_rows($result2);

if($count2 == 0){
        $query4 = "INSERT INTO stdfavortoy VALUES('$stdMKN', '$toy')";
}else{
        $query4 = "UPDATE stdfavortoy SET toy = '$toy' WHERE stdMKN = '$stdMKN'";
}
mysqli_query($con, $query4);



header('location:profileStudent.php');

?>