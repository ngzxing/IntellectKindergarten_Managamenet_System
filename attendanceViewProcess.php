<?php

include "dbconnect.php";

$attID = $_POST["attID"];
$attConfirm = $_POST["attConfirm"];

$query = "UPDATE attendancestd SET attConfirm = '$attConfirm' WHERE attID = '$attID'";
mysqli_query($con, $query);
mysqli_close($con);

// header("location:attendanceView.php");

echo "

<form method = 'post' action = 'attendanceView.php' id = 'form'>

    <input type = 'hidden' name = 'success' value = 'success'>
    

</form>

<script>

    document.getElementById('form').submit();

</script>

";

?>