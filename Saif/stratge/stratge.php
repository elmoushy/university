<?php
error_reporting (E_ERROR | E_PARSE);
include_once "stratgeclass.php";
extract($_POST);
if(isset($_POST["Store"]))
{
    $dec = new stratge();
    $dec->setName($Name);
    $dec->Store();
    echo(" <script> location.replace('stratge.html'); </script>");
}
if(isset($_POST["Search"]))
{
    $dec = new stratge();
    $dec->setId($Id);
    $dec->setName($Name);
    $List = $dec->Search();
    DisplayTable($List);
    echo "<br><a href='stratge.html'>Return To Menu</a> ";
}
if(isset($_POST["Delete"]))
{
    $dec = new stratge();
    $dec->setId($Id);
    $dec->setName($Name);
    $dec->Remove();
    echo(" <script> location.replace('stratge.html'); </script>");
}
?>