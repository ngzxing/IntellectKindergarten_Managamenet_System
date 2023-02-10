<?php

include "dbconnect.php";

$attID = $_POST["attID"];
$attConfirm = $_POST["attConfirm"];
$attDate = $_POST["attDate"];
$clsName = $_POST["clsName"];

$query = "UPDATE attendancestd SET attConfirm = '$attConfirm' WHERE attID = '$attID'";
mysqli_query($con, $query);
mysqli_close($con);

// header("location:attendanceView.php");

echo "

<form method = 'post' action = 'attendanceView.php' id = 'form'>

    <input type = 'hidden' name = 'success' value = 'success'>
    <input type = 'hidden' name = 'attDate' value = '$attDate'>
    <input type = 'hidden' name = 'clsName' value = '$clsName'>
    

</form>

<script>

    document.getElementById('form').submit();

</script>

";

?>