<?php
include_once("userclass.php");
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
    echo(" <script> location.replace('User .php'); </script>");
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
    echo(" <script> location.replace('User .php'); </script>");
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
    echo "<br><a href='User.html'>Return To Menu</a> ";
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
    echo(" <script> location.replace('User .php'); </script>");
}
?>