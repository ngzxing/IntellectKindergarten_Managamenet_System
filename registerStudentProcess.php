<?php

include "dbconnect.php";

$stdMKN = $_POST["stdMKN"];
$stdName = $_POST["stdName"];
$stdGender = $_POST["stdGender"];
$stdAge = $_POST["stdAge"];
$stdDOB = $_POST["stdDOB"];
$stdFavorColor = $_POST["stdFavorColor"];
$stdDiapers = $_POST["stdDiapers"];
$stdSession = $_POST["stdSession"];
$stdMeal = $_POST["stdMeal"];
$pIC = $_POST["pIC"];
$stdProgram = $_POST["stdProgram"];


$target_dir = "studentImg/";
$target_file = $target_dir . basename($_FILES["stdPhoto"]["name"]);
move_uploaded_file($_FILES["stdPhoto"]["tmp_name"], $target_file);


$query = "SELECT * FROM Student WHERE stdMKN = '$stdMKN' ";
$result = mysqli_query($con, $query);
$count = mysqli_num_rows($result);

if($count != 0){

    mysqli_close($con);
    echo "

        <form id = 'state' method = 'post' action = 'registerStudent.php'>
            <input name = 'state' value = 1 type = 'hidden'></input>
            <input name = 'pIC' value = '$pIC' type = 'hidden'></input>
            <input name = 'nextPage' value = '$_POST[nextPage]' type = 'hidden'>
        </form>

        <script>
            document.getElementById('state').submit();
        </script>
    ";
}


$query = "INSERT INTO Student VALUES('$stdMKN', '$stdName', '$stdGender', '$stdAge', '$stdDOB', '$stdFavorColor', '$stdDiapers', '$stdSession', '$stdMeal', '$target_file', 0 , '$pIC', NULL, '$stdProgram')";
mysqli_query($con, $query);
mysqli_close($con);

header("location:$_POST[nextPage]");


?>
