<?php

include "dbconnect.php";

$name = $_POST["name"];
$ic = $_POST["ic"];
$address = $_POST["address"];
$city = $_POST["city"];
$postcode = $_POST["postcode"];
$state = $_POST["state"];
$occupation = $_POST["occupation"];
$email = $_POST["email"];
$password = $_POST["password"];


$query = "SELECT * FROM Parent WHERE pIC = '$ic' ";
$result = mysqli_query($con, $query);
$count = mysqli_num_rows($result);

if($count != 0){

    mysqli_close($con);
    echo '

        <form id = "state" method = "post" action = "registerParent.php">
            <input name = "state" value = 1 type = "hidden"></input>
        </form>

        <script>
            document.getElementById("state").submit();
        </script>
    ';
}

$query = "INSERT INTO Parent VALUES('$ic', '$name', '$password', '$address', '$city', '$postcode', '$state', '$occupation', '$email')";
mysqli_query($con, $query);
mysqli_close($con);

echo "

        <form id = 'pass' method = 'post' action = 'registerStudent.php'>
            <input name = 'pIC' value = '$ic' type = 'hidden'></input>
            <input name = 'nextPage' value = 'dashboardParent.php' type = 'hidden'></input>
        </form>

        <script>
            document.getElementById('pass').submit();
        </script>
    ";

?>
