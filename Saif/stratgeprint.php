<?php
include_once('stratge/Fawery.php');
include_once('stratge/Vodafone .php');
include_once('stratge/vodafone cash.php');
include_once('stratge/Cash.php');

error_reporting (E_ERROR | E_PARSE);
include_once("stratge/stratgeclass.php");
include_once "functions.php";
include_once("Interface.php");
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
    $l="";
    $stratge = new stratge();
    for ($i=0; $i < count($List)  - 1; $i++)
    { 
        $Array = explode("~",$List[$i]);
        if($Array[0]==$no)
        {
            $way=$Array[1];
            $w=explode(" ",$way);
            $line.=$File->getSeparator();
            for ($i=0; $i < count($w);$i++)
            {
                $line.=$w[$i];
                $l.=$w[$i];
            }
            $line.=$File->getSeparator();
            $way=$l;
            $way =new $way();
            $stratge->setpay($way);
            $stratge->Trancaction($line);
            break;
        } 
    }
    $sub = new Subject();
    new NewRegister($sub);
    $sub->notifyAllObserv("");
    echo "Done";
}
?>