<?php
error_reporting (E_ERROR | E_PARSE);
include_once "usertypeclass.php";
if(isset($_POST["Store"]))
{
    $obj = new Usertype();
    $obj->setName($_POST["Name"]);
    $obj->Store();
    echo(" <script> location.replace('UsertypeH.php?usertype=".$_POST["usertype"]."'); </script>");
}
if(isset($_POST["Update"]))
{
    $obj = new Usertype();
    $obj->setID($_POST["Id"]);
    $obj->setName($_POST["Name"]);
    $obj->Update();
    echo(" <script> location.replace('UsertypeH.php?usertype=".$_POST["usertype"]."'); </script>");
}
if(isset($_POST["Search"]))
{
    $obj = new Usertype();
    $obj->setID($_POST["Id"]);
    $obj->setName($_POST["Name"]);
    $List = $obj->Search();
    DisplayTable($List);
    echo "<br><a href='UsertypeH.php?usertype=".$_POST["usertype"]."'>Return To Menu</a> ";
}
if(isset($_POST["Delete"]))
{
    $obj = new Usertype();
    $obj->setID($_POST["Id"]);
    $obj->setName($_POST["Name"]);
    $obj->Remove();
    echo(" <script> location.replace('UsertypeH.php?usertype=".$_POST["usertype"]."'); </script>");
}