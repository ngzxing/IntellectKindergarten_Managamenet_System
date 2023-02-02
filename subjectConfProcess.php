<?php

include "dbconnect.php";

if($_POST["operation"] == "Create"){

    $sbjName = $_POST["sbjName"];

    $queryInsert = "INSERT INTO Subjects VALUES('$sbjName', NULL)";
    mysqli_query($con, $queryInsert);


    $querySbjID = "SELECT * FROM Subjects WHERE sbjName = '$sbjName'";
    $sbjID = mysqli_fetch_array(mysqli_query($con, $querySbjID))["sbjID"];

    $queryEvalType = "SELECT * FROM evalType";
    $resultEvalType = mysqli_query( $con, $queryEvalType);

    while($rowEvalType = mysqli_fetch_array($resultEvalType)){

        $queryInsert = "INSERT INTO SbjPerformance VALUES(NULL, '$rowEvalType[evalID]', '$sbjID')";
        mysqli_query($con, $queryInsert);
    }

    $queryCls = "SELECT * FROM Class as c JOIN prgPerform as p WHERE c.prgName = p.prgName AND ptName = 'subject' ";
    $resultCls = mysqli_query($con, $queryCls);

    while( $rowCls = mysqli_fetch_array($resultCls) ){

        $queryInsert = "INSERT INTO subjectsTeac VALUES(NULL, '$sbjID', '$rowCls[clsName]')";
        mysqli_query($con, $queryInsert);
    }

}elseif($_POST["operation"] == "Delete"){

    $sbjID = $_POST["sbjID"];

    $queryDelete = "DELETE FROM Subjects WHERE sbjID = '$sbjID' ";
    mysqli_query($con, $queryDelete);

}elseif( $_POST["operation"] == "addTeac" ){


    $queryUpdate = "UPDATE subjectsTeac SET tIC = '$_POST[tIC]' WHERE sbjID  = '$_POST[sbjID]' AND clsName = '$_POST[clsName]' ";
    mysqli_query($con, $queryUpdate);


    mysqli_close($con);
    header("location:adminPerformConf.php?clsName=$_POST[clsName]#sbjConf");

}

mysqli_close($con);

header("location:adminPerformConf.php#sbjConf");

?>