<?php

include "dbconnect.php";


if( $_POST["operation"] == "Create"){

    $queryInsert = "INSERT INTO Class VALUES( '$_POST[clsName]', NULL )";
    mysqli_query($con, $queryInsert);

}elseif( $_POST["operation"] == "Delete"){

    $queryDelete = "DELETE FROM Class WHERE clsName = '$_POST[clsName]' ";
    mysqli_query($con, $queryDelete);

    
}elseif( $_POST["operation"] == "selectCls"){

    $queryGotSbjOld = "SELECT * FROM prgPerform as p JOIN Class as c ON p.prgName = c.prgName  AND clsName = '$_POST[clsName]' WHERE ptName = 'subject' ";
    $resultGotSbjOld = mysqli_query($con, $queryGotSbjOld);
    $numRowOld = mysqli_num_rows($resultGotSbjOld);

    $queryUpdate = "UPDATE Class SET prgName = '$_POST[prgName]' WHERE clsName = '$_POST[clsName]' ";
    mysqli_query($con, $queryUpdate);

    $queryGotSbj = "SELECT * FROM prgPerform WHERE prgName = '$_POST[prgName]' AND ptName = 'subject' ";
    $resultGotSbj = mysqli_query($con, $queryGotSbj);
    $numRow = mysqli_num_rows($resultGotSbj);

    if($numRowOld == 0 && $numRow == 0){


        
    }elseif( $numRowOld == 1 && $numRow == 0 ){

        $querySbj = "SELECT * FROM Subjects";
        $resultSbj = mysqli_query($con, $querySbj);

        while( $sbj = mysqli_fetch_array($resultSbj) ){
    
            $queryDelete = "DELETE FROM subjectsTeac WHERE sbjID = '$sbj[sbjID]' AND clsName = '$_POST[clsName]' ";
            mysqli_query($con, $queryDelete);
         
        }

    }elseif( $numRowOld == 0 && $numRow == 1 ){


        $querySbj = "SELECT * FROM Subjects";
        $resultSbj = mysqli_query($con, $querySbj);

        
        while( $sbj = mysqli_fetch_array($resultSbj) ){

            $queryInsert = "INSERT INTO subjectsTeac VALUES(NULL, '$sbj[sbjID]', '$_POST[clsName]' )";
            mysqli_query($con, $queryInsert);
        }

    }elseif( $numRowOld == 1 && $numRow == 1 ){

      
    }

    
    


}

mysqli_close($con);
header("location:classConf.php")


?>