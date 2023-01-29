<?php


if(!session_id()){

    session_start();
}

if( !isset($_SESSION["teac_session_id"]) && !isset($_SESSION["admin_session_id"]) )  {

    header("location:login.php");
}

if( isset($_SESSION["teac_session_id"]) ){

    include "leftSideBarTeac.php";

}else{

    include "leftSideBarAdmin.php";
}
?>