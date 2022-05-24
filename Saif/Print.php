<?php
include_once("Register/Register.php");
include_once("user/userclass.php");
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
<html>
<head>
<h1>Pays way</h1>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
<form method="post">
	<input value="Cash" name="Name" class="shopitem-list" type="checkbox">Pay by Cash <br>
    <input value="Fawry" name="Name" class="shopitem-list" type="checkbox">Pay by Fawry  <br>
    <input value="visa" name="Name" class="shopitem-list" type="checkbox">Pay by Visa <br><br>
    <script type="text/javascript">
	    $('.shopitem-list').on('change', function() {
		    $('.shopitem-list').not(this).prop('checked', false);  
		});
    </script>
    <input type="submit" value="submit" name="submit">
</form>
</body>
</html>
<?php
include_once("user/Visa.php");
include_once("user/Cash.php");
include_once("user/Fawry.php");
if(isset($_POST['submit']))
{
    extract($_POST);
    $User = new Admissions();
    if($Name == "Cash") $User->setPay(new Cash());
    if($Name == "visa") $User->setPay(new visa());
    if($Name == "Fawry") $User->setPay(new Fawry());
    $User->Trancaction();
}
?>