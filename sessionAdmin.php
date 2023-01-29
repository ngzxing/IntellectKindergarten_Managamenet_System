<?php

if(!session_id()){

    session_start();
}

if( !isset($_SESSION["admin_session_id"])) {

    header("location:login.php");
}

?>