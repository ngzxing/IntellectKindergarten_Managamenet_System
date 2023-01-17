<?php

if(!session_id()){

    session_start();
}

if( !isset($_SESSION["teac_session_id"])) {

    header("location:loginTeac.php");
}

?>