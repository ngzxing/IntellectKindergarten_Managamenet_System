<?php

include "dbconnect.php";
include "sessionAssest.php";

$period = $_SESSION["period"];
$year = $_SESSION["year"];
$stdMKN = $_POST["stdMKN"];
$queryPer = unserialize($_POST["performance"]);

foreach( $queryPer as $qp ){

    $query = "SELECT * FROM performance WHERE stdMKN = '$stdMKN' AND spPeriod = '$period' AND spYear = '$year'";
    $result = mysqli_fetch_array( mysqli_query($con, $query));
    $insert = "UPDATE performRating SET ratingID = '$_POST[$qp]' WHERE performanceID = '$result[performanceID]' AND sbjPerID = '$qp' ";
    mysqli_query($con, $insert);
}

// header("location:assestSubject.php");

mysqli_close($con);

echo "

<form method = 'post' action = 'assestSubject.php' id = 'form'>

    <input type = 'hidden' name = 'success' value = 'success'>
    

</form>

<script>

    document.getElementById('form').submit();

</script>

";
?>