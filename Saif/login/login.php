<?php
session_start();
include_once("../functions.php");
include_once("loginclass.php");
extract($_POST);

    $obj=new login();
    $obj->setLogin($username);
    $obj->setPassword($password);
    $ID=$obj->login();
    if($ID){
        $_SESSION["id"]=$ID;
        echo(" <script> location.replace('../index.php'); </script>");
    }
    else
    {
        echo "Wrong information";
        exit;
    }

?>