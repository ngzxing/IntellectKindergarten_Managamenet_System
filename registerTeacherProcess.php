<?php

include "dbconnect.php";

$name = $_POST["tName"];
$ic = $_POST["tIC"];
$address = $_POST["tAddress"];
$city = $_POST["tCity"];
$postcode = $_POST["tPostcode"];
$state = $_POST["tState"];
$occupation = $_POST["tOccupation"];
$email = $_POST["tEmail"];
$password = $_POST["tPassword"];
$phone  = $_POST["tPhone"];


$target_dir = "teacherImg/";
$target_file = $target_dir . basename($_FILES["tPhoto"]["name"]);
move_uploaded_file($_FILES["tPhoto"]["tmp_name"], $target_file);

$query = "SELECT * FROM Teacher WHERE tIC = '$ic' ";
$result = mysqli_query($con, $query);
$count = mysqli_num_rows($result);

if($count != 0){

    mysqli_close($con);
    echo '

        <form id = "state" method = "post" action = "registerTeacher.php">
            <input name = "state" value = 1 type = "hidden"></input>
        </form>

        <script>
            document.getElementById("state").submit();
        </script>
    ';
}

$query = "INSERT INTO Teacher VALUES('$ic', '$name', '$password','-', '-', '-', '$phone','$address', '$city', '$postcode', '$state', '$email', 0, 0 , '$target_file', 'T')";
mysqli_query($con, $query);
mysqli_close($con);

header("location:index.php");

?>
