<?php 
if(include_once("Interface.php"))
{
    include_once("Interface.php"); 
}
else
{
    include_once("../Interface.php");
}
Class Visa implements Pay{
    public function Pay() {
        echo "Pay with Fawry";
    }
}
?>