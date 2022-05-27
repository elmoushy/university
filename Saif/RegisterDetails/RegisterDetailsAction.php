<?php

include_once("RegisterDetails.php");
//include_once("RegisterDetailsH.php");
if(isset($_POST["Store"]))
{
    
    $Rd = new RegisterDetails();
    $Rd->setRgID($_POST["rgID"]);
    $Rd->setCrsID($_POST["Crs"]);
    $Rd->Store();
    
    echo(" <script> location.replace('RegisterDetailsH.php?ID=".$_POST["rgID"]."'); </script>");
}
if(isset($_POST["Update"]))
{
    $Rd = new RegisterDetails();
    $Rd->setID($_POST["ID"]);
    $Rd->setRgID($_POST["rgID"]);
    $Rd->setCrsID($_POST["Crs"]);
    $Rd->Update();
    echo(" <script> location.replace('RegisterDetailsH.php?ID=".$_POST["rgID"]."'); </script>");
}
if(isset($_POST["Search"]))
{
    echo $_GET["ID"]."<br>";
    exit();
    $Rd = new RegisterDetails();
    $Rd->setID($_POST["ID"]);
    $Rd->setRgID($_POST["rgID"]);
    $Rd->setCrsID($_POST["Crs"]);
    $List = $Rd->Search();
    DisplayTable($List);
    echo "<br><a href='RegisterDetailsH.php?ID=".$_POST["rgID"]."'>Return To Menu</a> ";
}
if(isset($_POST["Delete"]))
{
    $Rd = new RegisterDetails();
    $Rd->setID($_POST["ID"]);
    $Rd->setRgID($_POST["rgID"]);
    $Rd->setCrsID($_POST["Crs"]);
    $Rd->Remove(true);
    echo(" <script> location.replace('RegisterDetailsH.php?ID=".$_POST["rgID"]."'); </script>");
}
?>