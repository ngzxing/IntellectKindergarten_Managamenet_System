<?php

include "dbconnect.php";

$fID = $_POST["fID"];
$stdMKN = $_POST["stdMKN"];

$target_dir = "financialImg/";
$target_file = $target_dir . basename($_FILES["fPhoto"]["name"]);
move_uploaded_file($_FILES["fPhoto"]["tmp_name"], $target_file);

$query = "UPDATE fee 
        SET payDate = CURRENT_TIMESTAMP, fPhoto = '$target_file', payStatus = '2'
        WHERE fID = '$fID'";

mysqli_query($con, $query);
mysqli_close($con);


?>

<form method = "post" action = "financialDetailStudent.php" id = 'form'>
    <input type = 'hidden' value = '<?php echo $fID?>' name = 'fID'>
    <input type = 'hidden' value = '<?php echo $stdMKN?>' name = 'stdMKN'>
</form>

<script>
    document.getElementById('form').submit();
</script>