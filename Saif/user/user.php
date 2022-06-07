<?php
include_once("userclass.php");
include_once("../Interface.php");
error_reporting (E_ERROR | E_PARSE);
extract($_POST);
if(isset($_POST["Store"]))
{
    $obj=new admissions();
    $obj->setname($username);
    $obj->setPhone_number($phone_number);
    $obj->setDate_of_birthday($date_of_birth);
    $obj->setfaculity_id($faculity);
    $obj->setUserid_type($userid_type);
    $obj->Store();
    $sub = new Subject();
    new NewUserN($sub);
    $mes = $obj->getId()." ".$obj->getName()." ".$obj->getEmail();
    $sub->notifyAllObserv($mes);
    echo(" <script> location.replace('User .php?user=".$_POST["user"]."'); </script>");
}
if(isset($_POST["Update"]))
{
    $obj=new admissions();
    $obj->setid($ID);
    $obj->setname($username);
    $obj->setPhone_number($phone_number);
    $obj->setDate_of_birthday($date_of_birth);
    $obj->setfaculity_id($faculity);
    $obj->setUserid_type($userid_type);
    $obj->Update();
    echo(" <script> location.replace('User .php?user=".$_POST["user"]."'); </script>");
}
if(isset($_POST["Search"]))
{
    $obj=new admissions();
    $obj->setid($ID);
    $obj->setname($username);
    $obj->setPhone_number($phone_number);
    $obj->setDate_of_birthday($date_of_birth);
    $obj->setfaculity_id($faculity);
    $obj->setUserid_type($userid_type);
    $obj = $obj->Search();
    DisplayTable($obj);
    echo "<br><a href='User .php?user=".$_POST["user"]."'>Return To Menu</a> ";
}
if(isset($_POST["Delete"]))
{
    $obj=new admissions();
    $obj->setid($ID);
    $obj->setname($username);
    $obj->setemail($email);
    $obj->setPhone_number($phone_number);
    $obj->setDate_of_birthday($date_of_birth);
    $obj->setfaculity_id($faculity);
    $obj->setUserid_type($userid_type);
    $obj->Remove();
    echo(" <script> location.replace('User .php?user=".$_POST["user"]."'); </script>");
}
?>