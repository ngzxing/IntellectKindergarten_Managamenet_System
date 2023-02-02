<?php

include "dbconnect.php";

$prgsID = $_POST['prgsID'];

$query = "DELETE FROM programsyllabus WHERE prgsId = '$prgsID'";
mysqli_query($con, $query);

// header('location:feeManage.php');


echo "

<form method = 'post' action = 'feeManage.php' id = 'form'>

    <input type = 'hidden' name = 'success' value = 'success'>
    

</form>

<script>

    document.getElementById('form').submit();

</script>

";

?>