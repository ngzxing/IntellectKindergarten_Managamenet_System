<?php

include "dbconnect.php";


if($_POST["operation"] == "Create" ){

    $pIName = $_POST["pIName"];

    $queryInsert = "INSERT INTO indexSubject VALUES('$pIName')";
    mysqli_query($con, $queryInsert);

    $queryInsert = "INSERT INTO indexPerformance VALUES( NULL, '$pIName', 'comment')";
    mysqli_query($con, $queryInsert);


}elseif( $_POST["operation"] == "Delete"){


    $pIName = $_POST["pIName"];

    $queryDelete = "DELETE FROM indexSubject WHERE iName = '$pIName'";
    mysqli_query($con, $queryDelete);

}

// header("location:adminIndexConf.php");

echo "

<form method = 'post' action = 'adminIndexConf.php#ptypeConf' id = 'form'>

    <input type = 'hidden' name = 'success' value = 'success'>
    

</form>

<script>

    document.getElementById('form').submit();

</script>

";

?>