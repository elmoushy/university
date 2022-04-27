<?php
include_once("Register/Register.php");
include_once("RegisterDetails/RegisterDetails.php");
$Rg = new Register();
$Res = new Register();
$Res = $Rg->getOneRegister($_GET["ID"]);

echo "Register ID: ".$Res->getID()."</br>";
echo "Student ID: ".$Res->getStID()."</br>";
echo "Date: ".$Res->getDate()."</br>";

$Rd = new RegisterDetails();
$Rd->setID("");
$Rd->setRgID($_GET["ID"]);
$Rd->setCrsID("");
$List = $Rd->Search();
DisplayTable($List);
echo("</br>");

echo "Total Hour: ".$Res->getTotalHr()."</br>";
echo "Total Hour Price: ".$Res->getTotalPriceHr()."</br>";

?>