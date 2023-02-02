<?php

include "dbconnect.php";


if( $_POST["operation"] == "Create"){

    $prgName = $_POST["prgName"];

    $queryInsert = "INSERT INTO Program VALUES('$prgName', '-')";
    mysqli_query($con, $queryInsert);


}elseif( $_POST["operation"] == "Delete"){

    $prgName = $_POST["prgName"];

    $queryDelete = "DELETE FROM Program WHERE prgName = '$prgName' ";
    mysqli_query($con, $queryDelete);


}elseif( $_POST["operation"] == "Add"){


    $ptName = $_POST["ptName"];
    $prgName = $_POST["prgName"];

    $queryAdd = "INSERT INTO prgPerform VALUES( '$ptName', '$prgName')";
    mysqli_query($con, $queryAdd);


}elseif( $_POST["operation"] == "Drop"){

    
    $ptName = $_POST["ptName"];
    $prgName = $_POST["prgName"];

    $queryDrop = "DELETE FROM prgPerform WHERE ptName = '$ptName' AND prgName = '$prgName' ";
    mysqli_query($con, $queryDrop);


}

// header("location:adminIndexConf.php");

echo "

<form method = 'post' action = 'adminIndexConf.php#prgConf' id = 'form'>

    <input type = 'hidden' name = 'success' value = 'success'>
    

</form>

<script>

    document.getElementById('form').submit();

</script>

";

?>