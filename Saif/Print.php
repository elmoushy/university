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
$objectpay= new Admissions();
$price=$Res->getTotalPriceHr();
$objectpay->setPay($price);
?>
<html>
<head>
<h1>Pays way</h1>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
<form method="post">
	<input value="1" name="cash" class="shopitem-list" type="checkbox">Pay by Cash <br>
    <input value="2" name="fawry" class="shopitem-list" type="checkbox">Pay by Fawry  <br>
    <input value="3" name="visa" class="shopitem-list" type="checkbox">Pay by Visa <br><br>
    <script type="text/javascript">
	    $('.shopitem-list').on('change', function() {
		    $('.shopitem-list').not(this).prop('checked', false);  
		});
    </script>
    <input type="submit" value="Submit">
</form>
</body>
</html>
<?php
if(isset($_POST['Submit']))
{
    
}

?>