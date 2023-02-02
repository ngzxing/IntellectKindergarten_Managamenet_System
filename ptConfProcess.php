<?php

include "dbconnect.php";


if( $_POST["operation"] == "Create"){

    $ptName = $_POST["ptName"];

    $queryInsert = "INSERT INTO performType VALUES('$ptName', '-')";
    mysqli_query($con, $queryInsert);


}elseif( $_POST["operation"] == "Delete"){

    $ptName = $_POST["ptName"];

    $queryDelete = "DELETE FROM performType WHERE ptName = '$ptName' ";
    mysqli_query($con, $queryDelete);


}elseif( $_POST["operation"] == "Add"){


    $ptName = $_POST["ptName"];
    $pIName = $_POST["pIName"];

    $queryAdd = "INSERT INTO performBased VALUES( NULL, '$pIName', '$ptName')";
    mysqli_query($con, $queryAdd);


}elseif( $_POST["operation"] == "Drop"){

    
    $ptName = $_POST["ptName"];
    $pIName = $_POST["pIName"];

    $queryDrop = "DELETE FROM performBased WHERE ptName = '$ptName' AND pIName = '$pIName' ";
    mysqli_query($con, $queryDrop);


}

// header("location:adminIndexConf.php");

echo "

<form method = 'post' action = 'adminIndexConf.php' id = 'form'>

    <input type = 'hidden' name = 'success' value = 'success'>
    

</form>

<script>

    document.getElementById('form').submit();

</script>

";

?>