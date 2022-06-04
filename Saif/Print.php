<?php
//error_reporting (E_ERROR | E_PARSE);
session_start();
include_once("Register/Register.php");
include_once("user/userclass.php");
include_once("RegisterDetails/RegisterDetails.php");
$Rg = new Register();
$Res = new Register();
$Res = $Rg->getOneRegister($_GET["ID"]);
$_SESSION["OrderId"] = $_GET["ID"];
$iddd=$Rg->getOneRegister($_GET["ID"]);
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
<html>
<head>
<h1>Pays way</h1>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
<form action="stratgeprint.php" method="post">
<select name="no" >
                    <option value="0">Non</option>
                    <?php 
                        include_once "functions.php";
                        $File = new filemanager();
                        $File->setFilenames("stratge");
                        $List = $File->AllContents();
                        for ($i=0; $i < count($List)  - 1; $i++) { 
                            $Array = explode("~",$List[$i]);
                            $Id = $Array[0];
                            $Name = $Array[1];
                            echo "<option value='$Id'>$Name</option>";
                        }
                    ?>
                    <input type="submit" value="submit" name = "submit">
                    
</select>
</form>
</body>
</html>