<?php

include "sessionAdmin.php";
include "dbconnect.php";

$fID = $_POST['fID'];
$prgsID = $_POST["prgsID"];

$query = "INSERT INTO feesitem VALUES ('$prgsID', '$fID')";
mysqli_query($con, $query);


//Calculate total fee
$fTot = 0;
$sql = "SELECT p.* FROM ProgramSyllabus as p RIGHT JOIN feesItem as f ON p.prgsID = f.prgsID  WHERE f.fID = '$fID'";
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_array($result)){
    $fTot += $row['prgsFee'];
}
$query2 = "UPDATE fee SET fTot='$fTot' WHERE fID='$fID'";
mysqli_query($con, $query2);


mysqli_close($con);

?>

<form method = "post" action = "financialUpdate.php" id = 'form'>
    <input type = 'hidden' value = '<?php echo $fID?>' name = 'fID'>
</form>

<script>
    document.getElementById('form').submit();
</script>
