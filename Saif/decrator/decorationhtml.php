<?php
include_once "decrationclass.php";
extract($_POST);
if(isset($_POST["Store"]))
{
    $dec = new dec();
    $dec->setName($Name);
    $dec->setPrice($price);
    $dec->Store();
    echo(" <script> location.replace('dec.php'); </script>");
}
if(isset($_POST["Update"]))
{
    $dec = new dec();
    $dec->setId($Id);
    $dec->setName($Name);
    $dec->setPrice($price);
    $dec->Update();
    echo(" <script> location.replace('dec.php'); </script>");
}
if(isset($_POST["Search"]))
{
    $dec = new dec();
    $dec->setId($Id);
    $dec->setName($Name);
    $dec->setPrice($price);
    $List = $dec->Search();
    DisplayTable($List);
    echo "<br><a href='dec.php'>Return To Menu</a> ";
}
if(isset($_POST["Delete"]))
{
    $dec = new dec();
    $dec->setId($Id);
    $dec->setName($Name);
    $dec->setPrice($price);
    $dec->Remove();
    echo(" <script> location.replace('dec.php'); </script>");
}
?>