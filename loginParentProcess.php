<?php

session_start();

include "dbconnect.php";

$ic = $_POST["ic"];
$password = $_POST["password"];

$query = "SELECT * FROM Parent WHERE pIC = '$ic'; ";
$result = mysqli_query($con, $query);
$count = mysqli_num_rows($result);

if($count == 0){

    mysqli_close($con);
    echo '

        <form id = "state" method = "post" action = "loginParent.php">
            <input name = "state" value = 1 type = "hidden"></input>
        </form>

        <script>
            document.getElementById("state").submit();
        </script>
    ';

}
else{

    $row = mysqli_fetch_array($result);

    if($row["pPassword"] != $password){

        mysqli_close($con);
        echo '

        <form id = "state" method = "post" action = "loginParent.php">
            <input name = "state" value = 1 type = "hidden"></input>
        </form>

        <script>
            document.getElementById("state").submit();
        </script>
    ';

    }
    else{
        
        $_SESSION["parent_session_id"] = session_id();
        $_SESSION["pIC"] = $ic;

        mysqli_close($con);
        header("location:dashboardParent.php");
        
    }
}

?>
