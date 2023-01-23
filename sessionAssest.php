<?php

if(!session_id()){

    session_start();
}

echo "fuck";
if( !isset($_SESSION["assest_session_id"])) {
    header("location:assestSelect.php");
}

?>