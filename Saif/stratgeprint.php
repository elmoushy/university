<?php
include_once('stratge/Visa.php');
include_once('stratge/Cash.php');
include_once('stratge/Fawry.php');
include_once('stratge/Paybal.php');

include_once("stratge/stratgeclass.php");
include_once "functions.php";
session_start();
extract($_POST);
if(isset($_POST['submit']))
{
    $Idorder = $_SESSION['OrderId'];
    $line=$Idorder;
    $File = new filemanager();
    $File->setFilenames("stratge");
    $File->setSeparator("~");
    $s=$File->getSeparator();
    $List = $File->AllContents();
    $stratge = new stratge();
    for ($i=0; $i < count($List)  - 1; $i++)
    { 
        $Array = explode("~",$List[$i]);
        if($Array[0]==$no)
        {
            $way=$Array[1];
            $line.=$File->getSeparator();
            $line.=$Array[1];
            $line.=$File->getSeparator();
            $way =new $way();
            $stratge->setpay($way);
            $stratge->Trancaction($line);
            break;
        } 
    }

}
?>