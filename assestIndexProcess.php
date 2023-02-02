<?php

include "dbconnect.php";
include "sessionAssest.php";

$iPerID = unserialize($_POST["iPerID"]);
$performanceID = $_POST["performanceID"];

$count = 0;
foreach( $iPerID as $id){

    $value = $_POST[$id];
    $query = "UPDATE performComment SET pcComment = '$value'  WHERE iPerID = '$id' AND performanceID = '$performanceID' ";
    mysqli_query($con, $query);


    $count+=1;
}


echo "

<form method = 'post' action = 'assestIndexStudent.php' id = 'form'>

    <input type = 'hidden' name = 'stdMKN' value = '$_POST[stdMKN]'>
    <input type = 'hidden' name = 'stdName' value = '$_POST[stdName]'>
    <input type = 'hidden' name = 'success' value = 'success'>
    

</form>

<script>

    document.getElementById('form').submit();

</script>

";





?>