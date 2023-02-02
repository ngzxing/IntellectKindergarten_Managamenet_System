<?php

include "sessionAdmin.php";
include "dbconnect.php";

$fDate = date('Y-m-d', strtotime($_GET['fDate']));

$query = "SELECT * FROM Student s WHERE stdRegStatus = 2";
$result = mysqli_query($con, $query);
$count = mysqli_num_rows($result);

while($row = mysqli_fetch_array($result)){
    $stdMKN = $row['stdMKN'];
    $query1 = "INSERT INTO fee (stdMKN, fDate) VALUES ('$stdMKN', '$fDate')";
    mysqli_query($con, $query1);

    $query2 = "SELECT * FROM fee WHERE stdMKN = '$stdMKN' AND fDate = '$fDate'";
    $result2 = mysqli_query($con, $query2);
    $row2 = mysqli_fetch_array($result2);
    $fID = $row2['fID'];
    echo $fID;

    if($row['stdSession'] == 'MA'){
        $monthlyFee = 2;
    }else{
        $monthlyFee = 1;
    }


    // if($row['stdMeal'] == 'MA'){
    //     $monthlyMeal = 16;
    // }else if($row['stdMeal'] == 'N'){
    //     $monthlyMeal = 0;
    // }else{
    //     $monthlyMeal = 15;
    // }

    $sql1 = "INSERT INTO feesitem(prgsID, fID) VALUES($monthlyFee, $fID)";
    mysqli_query($con, $sql1);

    // if($monthlyMeal != 0){
    //     $sql2 = "INSERT INTO feesitem(prgsID, fID) VALUES($monthlyMeal, $fID)";
    //     mysqli_query($con, $sql2);
    // }

    //Calculate total fee
    $fTot = 0;
    $sqlTot = "SELECT p.* FROM ProgramSyllabus as p RIGHT JOIN feesItem as f ON p.prgsID = f.prgsID  WHERE f.fID = '$fID'";
    $resultTot = mysqli_query($con, $sqlTot);
    while($rowTot = mysqli_fetch_array($resultTot)){
        $fTot += $rowTot['prgsFee'];
    }
    $queryTot = "UPDATE fee SET fTot='$fTot' WHERE fID='$fID'";
    mysqli_query($con, $queryTot);

}


header("location:financialManage.php");
?>