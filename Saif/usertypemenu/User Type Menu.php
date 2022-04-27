<?php
include_once "UserTypeMenuClass.php";
include_once "../functions.php";
if(isset($_POST["Add"]))
{
    if($_POST["TypeId"] == 0) die("Type Name is required");
    if($_POST["MenuId"] == 0) die("Menu Name is required");
    $UserTypeMenu = new UserTypeMenu(0,intval($_POST["TypeId"]),intval($_POST["MenuId"]));
    $UserTypeMenu->Store();
        echo(" <script> location.replace('UserTypeMenu.php'); </script>");

}
if(isset($_POST["Update"]))
{
    if($_POST["Id"] == 0) die("Id is required");
    $UserTypeMenu = new UserTypeMenu(intval($_POST["Id"]),intval($_POST["TypeId"]),intval($_POST["MenuId"]));
    $UserTypeMenu->Update();
    echo(" <script> location.replace('UserTypeMenu.php'); </script>");

}
if(isset($_POST["Delete"]))
{
    if($_POST["Id"] == 0) die("Id is required");
    $UserTypeMenu = new UserTypeMenu(intval($_POST["Id"]),intval($_POST["TypeId"]),intval($_POST["MenuId"]));
    $UserTypeMenu->Remove();
    echo(" <script> location.replace('UserTypeMenu.php'); </script>");

}
if(isset($_POST["Search"]))
{
    $UserTypeMenu = new UserTypeMenu(intval($_POST["Id"]),intval($_POST["TypeId"]),intval($_POST["MenuId"]));
    $List = $UserTypeMenu->Search();
    DisplayTable($List);
}