<?php

include "dbconnect.php";

if( $_POST["operation"] == "Create"){

    $queryInsert = "INSERT INTO evalType VALUES( NULL, '$_POST[evalType]', '$_POST[rateCtg]')";
    mysqli_query($con, $queryInsert);

    $queryEval = "SELECT * FROM evalType WHERE evalType = '$_POST[evalType]' ";
    $evalID = mysqli_fetch_array(mysqli_query($con, $queryEval))['evalID'];

    $querySubject = "SELECT * FROM Subjects";
    $resultSubject = mysqli_query($con, $querySubject);

    while( $rowSubject = mysqli_fetch_array($resultSubject)){

        $queryInsert = "INSERT INTO sbjPerformance VALUES(NULL, '$evalID', '$rowSubject[sbjID]')";
        mysqli_query($con, $queryInsert);
    }


}elseif( $_POST["operation"] == "Edit"){

    $queryEdit = "UPDATE evalType SET rateCtg = '$_POST[rateCtg]' WHERE evalID = '$_POST[evalID]'";
    mysqli_query($con, $queryEdit);

}elseif( $_POST["operation"] == "Delete"){

    $queryDelete = "DELETE FROM evalType WHERE evalID = '$_POST[evalID]'";
    mysqli_query($con, $queryDelete);
}

header("location:adminPerformConf.php#evalType");
mysqli_close($con);
?>