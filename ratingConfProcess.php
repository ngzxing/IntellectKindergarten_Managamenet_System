<?php

include "dbconnect.php";

if($_POST["operation"] == "Create"){

    $rateCtg = $_POST["rateCtg"];

    $query = "INSERT INTO ratingCtg VALUES('$rateCtg')";
    mysqli_query($con, $query);

}elseif($_POST["operation"] == "Add"){

    $rateCtg = $_POST["rateCtg"];
    $ratingName = $_POST["ratingName"];

    $query = "INSERT INTO Rating VALUES(NULL, '$rateCtg', '$ratingName')";
    mysqli_query($con, $query);
}
elseif($_POST["operation"] == 'Delete'){

    $rateCtg = $_POST["rateCtg"];

    $query = "DELETE FROM ratingCtg WHERE rateCtg = '$rateCtg' ";
    mysqli_query($con, $query);

}elseif($_POST["operation"] == 'Drop'){

    $rateCtg = $_POST["rateCtg"];
    $ratingName = $_POST["ratingName"];

    $query = "DELETE FROM Rating WHERE rCategory = '$rateCtg' AND ratingName = '$ratingName' ";
    mysqli_query($con, $query);
}

mysqli_close($con);

header("location:adminPerformConf.php");

?>