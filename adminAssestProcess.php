<?php

include "sessionAdmin.php";
include "dbconnect.php";

$period = $_POST["period"];
$date = $_POST["date"];
$year = $_POST["year"];

$query = "SELECT * FROM STUDENT WHERE stdRegStatus = 2";
$result = mysqli_query($con, $query);

if($_POST["operation"] == "Create"){

while( $row = mysqli_fetch_array($result) ){


    $queryInsert = "INSERT INTO Performance VALUES(NULL, '$row[stdMKN]', '$period', '$year', '$date')";
    mysqli_query($con, $queryInsert);

    $queryPt = "SELECT ptName FROM prgPerform WHERE prgName =  '$row[prgName]' ";
    $resultPt = mysqli_query($con, $queryPt);

    while( $rowPt = mysqli_fetch_array($resultPt)){

        $queryGetId = "SELECT * FROM Performance WHERE stdMKN = '$row[stdMKN]' AND spYear = '$year' AND spPeriod = '$period' ";
        $performID = mysqli_fetch_array(mysqli_query($con, $queryGetId) )["performanceID"];

        if($rowPt["ptName"] == 'subject'){

            $queryGetsbjPerId = "SELECT * FROM sbjperformance";
            $resultGetsbjPerId = mysqli_query($con, $queryGetsbjPerId);

            while( $sbjPerId = mysqli_fetch_array($resultGetsbjPerId)){

                $queryInsertPerformId = "INSERT INTO performRating VALUES('$performID', '$sbjPerId[sbjPerID]', NULL, NULL)";
                mysqli_query($con, $queryInsertPerformId);
            }
        }

        else{

            
            $queryGetpbID = "SELECT * FROM performBased WHERE ptName = '$rowPt[ptName]' ";
            $resultGetpbID = mysqli_query($con, $queryGetpbID);

            while( $pbID = mysqli_fetch_array($resultGetpbID)){
                

                $queryInsertPerformId = "INSERT INTO performComment VALUES('$performID', '$pbID[pbID]', NULL)";
                mysqli_query($con, $queryInsertPerformId);
            }
            

        }
    }
}

}
elseif($_POST["operation"] == "Delete"){

while( $row = mysqli_fetch_array($result) ){
    
    echo "$row[stdMKN] | ";
    echo "$year |";
    echo "$period |";
    echo "$date";
    $query = "DELETE FROM Performance WHERE stdMKN = '$row[stdMKN]' AND spYear ='$year' AND spPeriod = '$period' AND spDate = '$date'  ";
    mysqli_query($con, $query);
}


}
else
{
    if(isset($_POST["newPeriod"])){
        
        echo "$year $period $date";
        $query = "UPDATE Performance SET spPeriod = '$_POST[newPeriod]' WHERE  spYear ='$year' AND spPeriod = '$period' AND spDate = '$date'";
        mysqli_query($con, $query);
    }
    
}

mysqli_close($con);

header("location:adminAssestConf.php");

?>