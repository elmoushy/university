<?php

include_once("RegisterDetails.php");
include_once("RegisterDetailsH.php");
if(isset($_POST["Store"]))
{
    
    $Rd = new RegisterDetails();
    echo($_GET["ID"]);
    exit(0);
    $Rd->setRgID($_GET["ID"]);
    $Rd->setCrsID($_POST["Crs"]);
    $Rd->Store();
    
    echo(" <script> location.replace('RegisterDetailsH.php'); </script>");
}
if(isset($_POST["Update"]))
{
    $Rd = new RegisterDetails();
    $Rd->setID($_POST["ID"]);
    $Rd->setRgID($_POST["rgID"]);
    $Rd->setCrsID($_POST["CrsID"]);
    $Rd->Update();
    echo(" <script> location.replace('RegisterDetailsH.php'); </script>");
}
if(isset($_POST["Search"]))
{
    $Rd = new RegisterDetails();
    $Rd->setID($_POST["ID"]);
    $Rd->setRgID($_POST["rgID"]);
    $Rd->setCrsID($_POST["CrsID"]);
    $List = $Rd->Search();
    DisplayTable($List);
    echo "<br><a href='RegisterDetailsH.php'>Return To Menu</a> ";
}
if(isset($_POST["Delete"]))
{
    $Rd = new RegisterDetails();
    $Rd->setID($_POST["ID"]);
    $Rd->setRgID($_POST["rgID"]);
    $Rd->setCrsID($_POST["CrsID"]);
    $Rd->Remove(true);
    echo(" <script> location.replace('RegisterDetailsH.php'); </script>");
}
?>