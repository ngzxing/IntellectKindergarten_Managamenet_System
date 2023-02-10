<?php

include "dbconnect.php";

$fID = $_POST["fID"];
$fDate = $_POST["fDate"];
$month = $_POST['month'];
$year = $_POST['year'];

$query = "UPDATE fee SET payStatus = '0', payDate = 'NULL' WHERE fID = '$fID'";
mysqli_query($con, $query);
mysqli_close($con);

?>


<form method = "post" action = "financialView.php" id = 'form'>
    <input type = 'hidden' name = 'fDate' value = '<?php echo"$fDate"?>' >
    <input type = 'hidden' name = 'month' value = '<?php echo"$month"?>' >
    <input type = 'hidden' name = 'year' value = '<?php echo"$year" ?>' >
</form>

<script>
    document.getElementById('form').submit();
</script>