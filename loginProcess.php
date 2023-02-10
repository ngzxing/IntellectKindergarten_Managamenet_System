<?php

session_start();

if( (isset($_SESSION["parent_session_id"]) || isset($_SESSION["teac_session_id"]) || isset($_SESSION["admin_session_id"])) && !isset($_POST["logOutFirst"]) ) {

    $continue = false;

    echo"
    
    <form id = 'logoutWarning' method = 'post' action = 'logoutWarning.php'>
    <input type = 'hidden' name = 'ic' value = '$_POST[ic]'>
    <input type = 'hidden' name = 'password' value = '$_POST[password]'>
    </form>

    <script>

        document.getElementById('logoutWarning').submit();
    </script>
    
    ";

   
}
else{

    $continue = true;
}

if(isset($_POST["logOutFirst"])){

    session_destroy();
}

if($continue){

include "dbconnect.php";


$ic = $_POST["ic"];
$password = $_POST["password"];
$query = "SELECT * FROM Parent WHERE pIC = '$ic'; ";
$result = mysqli_query($con, $query);
$count = mysqli_num_rows($result);
$countTeac = 0;


if($count == 0){

    $query = "SELECT * FROM Teacher WHERE tIC = '$ic'";
    $result = mysqli_query($con, $query);
    $countTeac = mysqli_num_rows($result);

}
else{

    $row = mysqli_fetch_array($result);

    if( password_verify($password, $row["pPassword"])  ){

        session_start();

        $_SESSION["parent_session_id"] = session_id();
        $_SESSION["pIC"] = $ic;

        mysqli_close($con);
        header("location:dashboardParent.php");
    }
}

if($countTeac != 0){

    $row = mysqli_fetch_array($result);

    if( password_verify($password, $row["tPassword"]) ){

        session_start();

        if($row["tPosition"] == 1){

            $_SESSION["admin_session_id"] = session_id();
            $_SESSION["tIC"] = $ic;
   
            mysqli_close($con);
            header("location:dashboardAdmin.php");
            
        }
        else{

            $_SESSION["teac_session_id"] = session_id();
            $_SESSION["tIC"] = $ic;

            mysqli_close($con);
            header("location:dashboardTeac.php");
        }
    }
    
}


    echo '

        <form id = "state" method = "post" action = "login.php">
            <input name = "state" value = 1 type = "hidden"></input>
        </form>

        <script>
            document.getElementById("state").submit();
        </script>
    ';

}

?>
