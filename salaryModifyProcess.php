<?php

include "dbconnect.php";
include "sessionAdmin.php";

$tIC = $_POST["tIC"];
// $tIC = $_SESSION["tICselected"];
$salID = $_POST["salID"];
$tBasicSalpHour = $_POST["tBasicSalpHour"];
$tOTSalpHour = $_POST["tOTSalpHour"];
$salOTDay = $_POST["salOTDay"];
$salOT = $salOTDay*$tOTSalpHour;
$salPlayschoolAlw = $_POST["salPlayschoolAlw"];
$salPublicHolidayAlw = $_POST["salPublicHolidayAlw"];
$salOvertimeAlw = $_POST["salOvertimeAlw"];
$salEpf = $_POST["salEpf"];
$salLeaveWithoutPay = $_POST["salLeaveWithoutPay"];
$salEmployerEPF = $_POST["salEmployerEPF"];
$salTotIncome = (float)$tBasicSalpHour + (float)$salOT + (float)$salPlayschoolAlw + (float)$salPublicHolidayAlw + (float)$salOvertimeAlw;
$salTotDeduction = (float)$salEpf + (float)$salLeaveWithoutPay;
$salNet = (float)$salTotIncome - (float)$salTotDeduction;
$salPaidStatus = $_POST["salPaidStatus"];

    
$query = "UPDATE salary
        SET salBasic='$tBasicSalpHour', salOTDay='$salOTDay', salOT='$salOT', salPlayschoolAlw='$salPlayschoolAlw', salPublicHolidayAlw='$salPublicHolidayAlw', 
        salOvertimeAlw='$salOvertimeAlw', salEpf='$salEpf', salLeaveWithoutPay='$salLeaveWithoutPay', 
        salEmployerEPF='$salEmployerEPF', salTotIncome='$salTotIncome', salTotDeduction='$salTotDeduction', salNet='$salNet',
        salPaidStatus='$salPaidStatus'
        WHERE salID='$salID'";
mysqli_query($con, $query);

$query1 = "UPDATE teacher
        SET tBasicSalpHour='$tBasicSalpHour', tOTSalpHour='$tOTSalpHour'
        WHERE tIC='$tIC'";
mysqli_query($con, $query1);


mysqli_close($con);

$_SESSION["tICselected"] = $tIC;
echo $_SESSION['tICselected'];
header("location:salaryViewAdmin.php"); 

?>

